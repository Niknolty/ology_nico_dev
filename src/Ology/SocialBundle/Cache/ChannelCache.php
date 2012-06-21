<?php
namespace Ology\SocialBundle\Cache;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\User;
use Predis\Client;

class ChannelCache extends BaseCache {
    
    function __construct(EntityManager $em, Client $redis, $dbConnection) {
        parent::__construct($em, $redis, $dbConnection);
    }
    
    public function cachePostsChannels($offset, $n) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Ology\SocialBundle\Entity\Channel', 'c');
        $rsm->addFieldResult('c', 'channel_id', 'id');
        
        $sql = "SELECT c.id as channel_id
                FROM Channels c
                WHERE c.display = 1";

        $query = $this->em->createNativeQuery($sql, $rsm);
        $channels = $query->getResult();
        
        $res = "";
        foreach ($channels as $channel) {
            $res = $res . $this->cachePostsChannelsForChannel($channel->getId(), $offset, $n);
        }
        
        return $res;
    }
    
    public function cachePostsChannelsForChannel($channelId, $offset, $n) {
        $channelId = intval($channelId);
        $offset = intval($offset);
        $n = intval($n);
        
        $sql = "SELECT pc.post_id as post_id
                FROM PostsChannels pc
                INNER JOIN Posts p ON p.id = pc.post_id
                WHERE pc.channel_id = $channelId
                AND p.is_draft <> 1
                ORDER BY p.creation_date DESC
                LIMIT $n OFFSET $offset";

        $rows = $this->dbConnection->fetchAll($sql);
        $postIds = array();
        foreach ($rows as $row) {
            $postIds[] = $row['post_id'];
        }
                
        $sid = implode(CacheDAO::SEP, $postIds);
        $this->redis->set(self::PC_PREFIX . $channelId, $sid);
        
        return self::PC_PREFIX . $channelId . "==" . $sid . ';';
    }
    
    public function getPostsForChannel($channelId, $offset, $n) {
        $ids = $this->redis->get(self::PC_PREFIX . $channelId);
        $idArray = explode(CacheDAO::SEP, $ids);
        $nbElements = count($idArray);
        $posts = array();
        
        $cpt = 0;
        for ($i = $offset; $i < $nbElements && $cpt < $n; $i++) {
            $id = $idArray[$i];
            if ($this->redis->get(CacheDAO::POST_PREFIX . $id) == NULL)
                continue;
            
            $p = $this->getCachedPost($id);
            $posts[] = $p;
            
            $cpt++;
        }
        
        return $posts;
    }
}
?>
