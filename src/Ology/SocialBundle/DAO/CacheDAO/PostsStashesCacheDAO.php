<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;
use Ology\SocialBundle\Entity\PostsStashes;
use Ology\SocialBundle\DAO\PostDAO;

/**
 * Description of PostsStashesCacheDAO
 *
 * @author raphael
 */
class PostsStashesCacheDAO extends BaseCacheDAO {
    
    /**
     * @var Ology\SocialBundle\DAO\PostDAO
     */
    protected $postDAO;
    
    function __construct(Client $redis, PostDAO $postDAO) {
        parent::__construct($redis);
        $this->postDAO = $postDAO;
    }
    
    /**
     * Add the postId in the stash list
     * Redis key = post_stash:stash:[stashId]
     * @return return 1 if added, 0 if updated
     */
    public function createPostStash($postId, $stashId, $creationDate) {
        return $this->ZADD(parent::POST_STASHES_PREFIX. parent::STASH_PREFIX . $stashId, $creationDate, $postId);
    }
    
    /**
     * Redis key = post_stash:stash:[stashId]
     * @return array post stashes ids 
     */
    public function getPostsIdsForStash($stashId, $offset = 0, $n = 0) {
        return $this->ZREVRANGE(parent::POST_STASHES_PREFIX. parent::STASH_PREFIX . $stashId, $offset, $offset + $n - 1);
    }
    
    /**
     * Redis key = post_stash:home:user:[userId]
     * Compute the union of posts ids in each stash id if set to TRUE.
     * This function removes duplicates and sorts posts ids by date.
     * @param int $userId
     * @param array $stashIdsArray
     * @param boolean $compute
     * @return string redis key 
     */
    public function getPostsIdsByStashesKey($stashIdsArray, $userId, $compute) {
        // This key is just a temp key, overwritten each time
        $postByStashesKey = parent::POST_STASHES_PREFIX . parent::HOME_PREFIX . parent::USER_PREFIX . $userId;

        // If it's the first time, we should compute posts ids
        if ($compute) {
            $keys = array();
            foreach ($stashIdsArray as $stashId) {
                $keys[] = parent::POST_STASHES_PREFIX. parent::STASH_PREFIX . $stashId;
            }
            $this->ZUNIONSTORE($postByStashesKey, sizeof($keys), $keys, array(), 'MAX');                
        }
        return $postByStashesKey;
    }
    
    /**
     * Get the key are stored posts ids in Redis.
     * Then load each post and return it.
     * @return array Posts 
     */
    public function getPostByStashes($stashIdsArray, $userId, $offset = 0, $n = 0) {
        if (!empty($stashIdsArray)) {
            $postsIdsByStashesKey = $this->getPostsIdsByStashesKey($userId, $ologyIdsArray, $offset > 0 ? FALSE : TRUE);
            // Else we already compute that, the result is already stored in $destinationKey
            $postsIds = $this->ZREVRANGE($postsIdsByStashesKey, $offset, $offset + $n - 1);

            return $this->postDAO->getPostsCard($postsIds);
        }
        return array();
    }
    
    /**
     * Load and return Posts from a Stash
     * @return array Posts 
     */
    public function getPostsForStash($stashId, $offset = 0, $n = 0) {
        $postsIds = $this->getPostsIdsForStash($stashId, $offset, $n);
        return $this->postDAO->getPostsCard($postsIds);
    }
    
    /**
     * Redis key = post_stash:stash:[stashId]
     * @return int number of deleted posts
     */
    public function deletePostsForStash($stashId) {
        $nbDeletedPosts = 0;
        $postsIds = $this->getPostsIdsForStash($stashId);
        foreach ($postsIds as $postId) {
            $nbDeletedPosts += $this->deletePostForStash($stashId, $postId);
        }
        return $nbDeletedPosts;
    }
    
    /**
     * Redis key = post_stash:stash:[stashId]
     * @return int boolean indicating success, or not 
     */
    public function deletePostForStash($stashId, $postId) {
        return $this->ZREM(parent::POST_STASHES_PREFIX. parent::STASH_PREFIX . $stashId, $postId);
    }
}

?>
