<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;
use Ology\SocialBundle\Entity\PostsOlogies;
use Ology\SocialBundle\DAO\PostDAO;

/**
 * Description of PostsOlogiesCacheDAO
 *
 * @author raphael
 */
class PostsOlogiesCacheDAO extends BaseCacheDAO {
    
    /**
     * @var Ology\SocialBundle\DAO\PostDAO
     */
    protected $postDAO;
    
    const FOLLOWEES = "followees:";
    
    function __construct(Client $redis, PostDAO $postDAO) {
        parent::__construct($redis);
        $this->postDAO = $postDAO;
    }
    
    /**
     * Add the postId in the ology list
     * Redis key = post_ology:ology:[ologyId]
     * Redis key = post_ology:ology:[ologyId]:user:[userId]
     * Redis key = post_ology:ology:[ologyId]:user:pool
     * @return return 1 if added, 0 if updated
     */
    public function createPostsOlogies($postId, $ologyId, $sharerId, $creationDate) {
        $this->ZADD(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId .':'. parent::USER_PREFIX . $sharerId, $creationDate, $postId);
        $this->ZADD(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId .':'. parent::USER_PREFIX . parent::POOL, $creationDate, $sharerId);
        return $this->ZADD(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId, $creationDate, $postId);
    }
    
    /**
     * Redis key = post_ology:ology:[ologyId]
     * @return int boolean indicating success, or not 
     */
    public function deletePostsOlogies($postId, $ologyId, $sharerId) {
        $this->ZREM(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId .':'. parent::USER_PREFIX . $sharerId, $postId);
        return $this->ZREM(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId, $postId);
    }
    
    /**
     * Redis key = post_ology:ology:[ologyId]:user:pool
     */
    public function getPostOlogiesUsers($ologyId) {
        return $this->ZREVRANGE(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId .':'. parent::USER_PREFIX . parent::POOL, 0, -1);
    }
    
    /**
     * Redis key = post_ology:ology:[ologyId]*
     * @return int boolean indicating success, or not 
     */
    public function deletePostsOlogiesOfOlogy($ologyId) {
        $sharersIds = $this->getPostOlogiesUsers($ologyId);
        
        foreach ($sharersIds as $sharerId) {
            $this->DEL( array(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId .':'. parent::USER_PREFIX . $sharerId ) );
        }
        
        $this->DEL( array(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId .':'. parent::USER_PREFIX . parent::POOL ) );
        
        return $this->DEL( array(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId ) );
    }
    
    /**
     * Redis key = post_ology:ology:[ologyId]
     * @return boolean succes
     */
    // FIXME this is the same function as above, please merge them
    public function deletePostsOlogiesForPost($ologyId, $postId, $sharerId) {
        $this->ZREM(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId .':'. parent::USER_PREFIX . $sharerId, $postId);
        return $this->ZREM(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId, $postId);
    }
    
    /**
     * Redis key = post_ology:ology:[ologyId]
     * @return array post ologies ids 
     */
    public function getPostsIdsForOlogy($ologyId, $offset = 0, $n = 0) {
        return $this->ZREVRANGE(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId, $offset, $offset + $n - 1);
    }
    
    /**
     * Redis key = post_ology:home:user:[userId]
     * Compute the union of posts ids in each ology id if set to TRUE.
     * This function removes duplicates and sorts posts ids by date.
     * 
     * @param int $userId
     * @param array $ologyIdsArray
     * @param boolean $compute
     * @return string redis key 
     */
    public function getPostsIdsByOlogiesKey($userId, $ologyIdsArray, $compute = TRUE) {
        // This key is just a temp key, overwritten each time
        $postsIdsByOlogiesKey = parent::POST_OLOGIES_PREFIX . parent::HOME_PREFIX . parent::USER_PREFIX . $userId;

        // If it's the first time, we should compute posts ids
        if ($compute) {
            $keys = array();
            foreach ($ologyIdsArray as $ologyId) {
                $keys[] = parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId;
            }
            $this->ZUNIONSTORE($postsIdsByOlogiesKey, sizeof($keys), $keys, array(), 'MAX');                
        }
        return $postsIdsByOlogiesKey;
    }
    
    /**
     * Get the key are stored posts ids in Redis.
     * Then load each post and return it.
     * @return array Posts 
     */
    public function getPostByOlogies($ologyIdsArray, $userId, $offset = 0, $n = 0) {
        if (!empty($ologyIdsArray)) {
            // We ask to compute the key the first time, then for paginated request, we dont need to compute again
            $postsIdsByOlogiesKey = $this->getPostsIdsByOlogiesKey($userId, $ologyIdsArray, $offset > 0 ? FALSE : TRUE);
            $postsIds = $this->ZREVRANGE($postsIdsByOlogiesKey, $offset, $offset + $n - 1);

            return $this->postDAO->getPostsCard($postsIds);
        }
        return array();
    }
    
    /**
     * Load and return Posts from an Ology
     * @return array Posts 
     */
    public function getPostsForOlogy($ologyId, $offset = 0, $n = 0) {
        $postsIds = $this->getPostsIdsForOlogy($ologyId, $offset, $n);
        return $this->postDAO->getPostsCard($postsIds);
    }
    
    /**
     * Redis key = post_ology:ology:[ologyId]:user:[userId]
     * @return PostsOlogies 
     */
    public function getPostsForUserByOlogy($ologyId, $userId, $offset = 0, $n = 0) {
        $postsIds = $this->ZREVRANGE(parent::POST_OLOGIES_PREFIX . parent::OLOGY_PREFIX . $ologyId . ':' . parent::USER_PREFIX . $userId, $offset, $offset + $n - 1);
        return $this->postDAO->getPostsCard($postsIds);
    }
    
    /**
     * Redis key = post_ology:home:followees:[userId]
     * Compute the union of posts ids in each ology id.
     * This function removes duplicates and sorts posts ids by date.
     * @return string Redis key
     */
    public function getPostsIdsForUsersByOlogiesKey($followedUsersAndOlogiesArray, $userId, $compute) {
        // This key is just a temp key, overwritten each time
        $postsIdsForUsersByOlogiesKey = parent::POST_OLOGIES_PREFIX . parent::HOME_PREFIX . self::FOLLOWEES . $userId;

        // If it's the first time, we should compute posts ids
        if ($compute) {
            $keys = array();
            foreach ($followedUsersAndOlogiesArray as $userAndOlogies) {
                $followeeId = $userAndOlogies['followeeId'];
                $ologiesIds = $userAndOlogies['ologiesIds'];
                foreach ($ologiesIds as $ologyId) {
                    $keys[] = parent::POST_OLOGIES_PREFIX . parent::OLOGY_PREFIX . $ologyId . ':' . parent::USER_PREFIX . $followeeId;
                }
            }
            $this->ZUNIONSTORE($postsIdsForUsersByOlogiesKey, sizeof($keys), $keys, array(), 'MAX');                
        }
        return $postsIdsForUsersByOlogiesKey;
    }
            
    /**
     * @return array Posts from user ologies 
     */
    public function getPostForUsersByOlogies($followedUsersAndOlogiesArray, $userId, $offset = 0, $n = 0) {
        if (!empty($followedUsersAndOlogiesArray)) {
            $postsIdsForUsersByOlogiesKey = $this->getPostsIdsForUsersByOlogiesKey($followedUsersAndOlogiesArray, $userId, $offset > 0 ? FALSE : TRUE);
            // Else we already compute that, the result is already stored in $destinationKey
            $postsIds = $this->ZREVRANGE($postsIdsForUsersByOlogiesKey, $offset, $offset + $n - 1);

            return $this->postDAO->getPostsCard($postsIds);
        }
        return array();
    }
    
    /*
     * Return the previous and the next post infos
     */
    public function getPreviousAndNextPostInfos($ologyId, $postId){
        $postIdsOfOlogy = $this->ZREVRANGE(parent::POST_OLOGIES_PREFIX. parent::OLOGY_PREFIX . $ologyId, 0, -1);
        $currentKey = array_search($postId, $postIdsOfOlogy);
        $nextKey = $currentKey + 1;
        $previousKey = $currentKey - 1;
        
        if (!empty($postIdsOfOlogy[$nextKey])){
            $nextPostId = $postIdsOfOlogy[$nextKey];
            $nextPost = $this->postDAO->getPost($nextPostId);
            $nextPostTitle = $nextPost->getTitle();
            $nextPostSlug = $nextPost->getSlug();
            $getNextPostInfos = array("nextPostId" => $nextPostId,
                                      "nextPostTitle" => $nextPostTitle,
                                      "nextPostSlug" => $nextPostSlug,
                                      "nextPostExist" => "true");
        }
        else
            $getNextPostInfos = array("nextPostExist" => "false");
            
        if (!empty($postIdsOfOlogy[$previousKey])){
            $previousPostId = $postIdsOfOlogy[$previousKey];
            $previousPost = $this->postDAO->getPost($previousPostId);
            $previousPostTitle = $previousPost->getTitle();
            $previousPostSlug = $previousPost->getSlug();
            $getPreviousPostInfos = array("previousPostId" => $previousPostId,
                                          "previousPostTitle" => $previousPostTitle,
                                          "previousPostSlug" => $previousPostSlug,
                                          "previousPostExist" => "true");
        }
        else
            $getPreviousPostInfos = array("previousPostExist" => "false");
        
        
        $getPreviousAndNextPostInfos = array_merge($getPreviousPostInfos, $getNextPostInfos);
        
        return $getPreviousAndNextPostInfos; 
    }
    
}

?>
