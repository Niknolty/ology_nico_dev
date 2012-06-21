<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\ChannelDAO;
use Ology\SocialBundle\DAO\PostsChannelsDAO;

class ChannelService {
    protected $channelDAO;
    protected $postsChannelsDAO;
 
    function __construct(ChannelDAO $channelDAO, PostsChannelsDAO $postsChannelsDAO) {
        $this->channelDAO = $channelDAO;
        $this->postsChannelsDAO = $postsChannelsDAO;
    }
    
    public function getChannel($stub) {
        $channel = $this->channelDAO->getChannel($stub);
        
        if ($channel->getFeaturedPost1())
            $channel->setFeaturedPost1id($channel->getFeaturedPost1()->getId());
        if ($channel->getFeaturedPost2())
            $channel->setFeaturedPost2id($channel->getFeaturedPost2()->getId());
        if ($channel->getFeaturedPost3())
            $channel->setFeaturedPost3id($channel->getFeaturedPost3()->getId());
        if ($channel->getFeaturedPost4())
            $channel->setFeaturedPost4id($channel->getFeaturedPost4()->getId());
        if ($channel->getFeaturedPost5())
            $channel->setFeaturedPost5id($channel->getFeaturedPost5()->getId());
        
        if ($channel->getSpecialPost1())
            $channel->setSpecialPost1id($channel->getSpecialPost1()->getId());
        if ($channel->getSpecialPost2())
            $channel->setSpecialPost2id($channel->getSpecialPost2()->getId());
        if ($channel->getSpecialPost3())
            $channel->setSpecialPost3id($channel->getSpecialPost3()->getId());
        
        return $channel;
    }
    
    public function getChannels() {
        return $this->channelDAO->getChannels();
    }
    
    public function getCoreOlogies() {
        $allChannels = $this->channelDAO->getChannels();
        return array_slice($allChannels, 0, 9);
    }
    
    public function storeChannel($stub, $ad0, $ad1, $ad2, $ad3, $ad4, $ad5, $ad6, $video, $p1, $p2, $p3, $p4, $p5, $sPostTitle, $sPostId1, $sPostId2, $sPostId3) {
        return $this->channelDAO->storeChannel($stub, $ad0, $ad1, $ad2, $ad3, $ad4, $ad5, $ad6, $video, $p1, $p2, $p3, $p4, $p5, $sPostTitle, $sPostId1, $sPostId2, $sPostId3);
    }
    
    public function getPostsChannelsForChannel($channelId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        return $this->postsChannelsDAO->getPostsChannelsForChannel($channelId, $offset, $n);
    }
    
    public function curatePost($postId, $channelId, $userId) {
        return $this->postsChannelsDAO->createPostsChannels($postId, $channelId, $userId);
    }
    
    public function unCuratePost($postId, $channelId) {
        return $this->postsChannelsDAO->deletePostsChannels($postId, $channelId);
    }
    
}
?>
