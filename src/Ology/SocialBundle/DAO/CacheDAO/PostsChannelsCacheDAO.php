<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;
use Ology\SocialBundle\DAO\PostDAO;

/**
 * Description of PostsChannelsCacheDAO
 *
 * @author raphael
 */
class PostsChannelsCacheDAO extends BaseCacheDAO {
    
    /**
     * @var Ology\SocialBundle\DAO\PostDAO
     */
    protected $postDAO;
    
    function __construct(Client $redis, PostDAO $postDAO) {
        parent::__construct($redis);
        $this->postDAO = $postDAO;
    }
    
    /**
     * Add the postId in the channel list
     * Redis key = post_channel:channel:[channelId]
     * @return return 1 if added, 0 if updated
     */
    public function createPostChannel($postId, $channelId, $creationDate) {
        return $this->ZADD(parent::POST_CHANNELS_PREFIX. parent::CHANNEL_PREFIX . $channelId, $creationDate, $postId);
    }
    
    /**
     * Load and return Posts from a Channel
     * @return array Posts 
     */
    public function getPostsForChannel($channelId, $offset, $n) {
        $postsIds = $this->getPostsIdsForChannel($channelId, $offset, $n);
        return $this->postDAO->getPostsCard($postsIds);
    }
    
    /**
     * Redis key = post_channel:channel:[channelId]
     */
    public function getPostsIdsForChannel($channelId, $offset, $n) {
        return $this->ZREVRANGE(parent::POST_CHANNELS_PREFIX. parent::CHANNEL_PREFIX . $channelId, $offset, $offset + $n - 1);
    }
    
    /**
     * Redis key = post_channel:channel:[channelId]
     * @return int boolean indicating success, or not 
     */
    public function deletePostForChannel($channelId, $postId) {
        return $this->ZREM(parent::POST_CHANNELS_PREFIX. parent::CHANNEL_PREFIX . $channelId, $postId);
    }
    
    /**
     * Redis key = post_channel:channel:[channelId]
     * @return int number of deleted posts
     */
    public function deletePostsForChannel($channelId) {
        $nbDeletedPosts = 0;
        $postsIds = $this->getPostsIdsForChannel($channelId);
        foreach ($postsIds as $postId) {
            $nbDeletedPosts += $this->deletePostForChannel($channelId, $postId);
        }
        return $nbDeletedPosts;
    }
    
    /**
     * Redis key = post_channel:home:user:[userId]
     * Compute the union of posts ids in each channel id if set to TRUE.
     * This function removes duplicates and sorts posts ids by date.
     * @param int $userId
     * @param array $channelsIdsArray
     * @param boolean $compute
     * @return string redis key 
     */
    public function getPostsIdsByChannelsKey($channelsIdsArray, $userId, $compute) {
        // This key is just a temp key, overwritten each time
        $postsIdsByChannelsKey = parent::POST_CHANNELS_PREFIX . parent::HOME_PREFIX . parent::USER_PREFIX . $userId;

        // If it's the first time, we should compute posts ids
        if ($compute) {
            $keys = array();
            foreach ($channelsIdsArray as $channelId) {
                $keys[] = parent::POST_CHANNELS_PREFIX. parent::CHANNEL_PREFIX . $channelId;
            }
            $this->ZUNIONSTORE($postsIdsByChannelsKey, sizeof($keys), $keys, array(), 'MAX');
        }
        return $postsIdsByChannelsKey;
    }
    
}

?>
