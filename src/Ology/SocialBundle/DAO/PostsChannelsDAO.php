<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Cache\ChannelCache;
use Ology\SocialBundle\Entity\Channel;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\PostsChannels;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\DAO\CacheDAO\PostsChannelsCacheDAO;

class PostsChannelsDAO {
    protected $channelCache;
    protected $postsChannelsCacheDAO;
    protected $em;

    function __construct(ChannelCache $channelCache, PostsChannelsCacheDAO $postsChannelsCacheDAO, EntityManager $em) {
        $this->channelCache = $channelCache;
        $this->postsChannelsCacheDAO = $postsChannelsCacheDAO;
        $this->em = $em;
    }
    
    public function createPostsChannels($postId, $channelId, $promoterId) {
        $pcs = $this->em->getRepository('OlogySocialBundle:PostsChannels')
                        ->findBy(array('post' => $postId, 'channel' => $channelId));
        $promoter = $this->em->getReference('OlogySocialBundle:User', $promoterId);
        $channel = $this->em->getReference('OlogySocialBundle:Channel', $channelId);
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        if (count($pcs) == 0) {
            $pc = new PostsChannels();
            $pc->setChannel($channel);
            $pc->setPost($post);
            $pc->setPromotedBy($promoter);

            $this->em->persist($pc);
            $this->em->flush();

            // Save in parallele in REDIS
            $this->postsChannelsCacheDAO->createPostChannel($post->getId(), $channelId, $post->getCreationDate());
            
            return $pc;
        } else {
            $pc = $pcs[0];
            $pc->setPromotedBy($promoter);
            
            return $pc;
        }
    }
    
    public function deletePostsChannels($postId, $channelId) {
        $pcs = $this->em->createQueryBuilder()
            ->add('select', 'pc')
            ->from('OlogySocialBundle:PostsChannels', 'pc')
            ->innerJoin('pc.channel', 'c')
            ->innerJoin('pc.post', 'p')
            ->innerJoin('pc.promotedBy', 'u')
            ->where('c.id = ?1')
            ->andWhere('p.id = ?2')
            ->getQuery()
            ->setParameter(1, $channelId)
            ->setParameter(2, $postId)
            ->getResult();
        
        foreach ($pcs as $pc)
            $this->em->remove($pc);
        $this->em->flush();
        
        // Delete from REDIS too
        $this->postsChannelsCacheDAO->deletePostForChannel($channelId, $postId);
    }

    public function deletePostsChannelsForPost($postId) {
        $postchannelArray = $this->em->getRepository('OlogySocialBundle:PostsChannels')->findBy(array('post' => $postId));
        foreach ($postchannelArray as $pc) {
            $this->em->remove($pc);
            
            // Delete from REDIS too
            $this->postsChannelsCacheDAO->deletePostForChannel($pc->getChannel()->getId(), $postId);
        }
        $this->em->flush();

        return true;
    }

    public function deletePostsChannelsOfChannel($channelId) {
        $postchannelArray = $em->getRepository('OlogySocialBundle:PostsChannels')->findBy(array('channel' => $channelId));
        foreach ($postchannelArray as $pc) {
            $this->em->remove($pc);
        }
        $this->em->flush();
        
        // Delete from REDIS too
        $this->postsChannelsCacheDAO->deletePostsForChannel($channelId);

        return true;
    }
    
    public function getPostsForChannel($channelId, $offset, $n) {
        return $this->postsChannelsCacheDAO->getPostsForChannel($channelId, $offset, $n);
    }
    
    public function getPostsIdsByChannelsKey($channelsIdsArray, $userId, $compute) {
        return $this->postsChannelsCacheDAO->getPostsIdsByChannelsKey($channelsIdsArray, $userId, $compute);
    }
    
}

?>
