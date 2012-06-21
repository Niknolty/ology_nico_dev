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

class SplashCache extends BaseCache {
    
    function __construct(EntityManager $em, Client $redis, $dbConnection) {
        parent::__construct($em, $redis, $dbConnection);
    }
    
    public function cacheSplashPosts($offset, $n) {
        $labels = $this->em->createQueryBuilder()
                        ->add('select', 'l')
                        ->from('OlogySocialBundle:Label', 'l')
                        ->getQuery()
                        ->getResult();
        
        $res = "";
        foreach ($labels as $label) {
            $res = $res . $this->cacheSplashPostsByLabelId($label->getId(), $offset, $n);
        }
        $res = $res . $this->cacheSplashPostsByLabelId(0, $offset, $n);
        
        return $res;
    }
    
    public function cacheSplashPostsByLabelId($labelId, $offset, $n) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Ology\SocialBundle\Entity\Post', 'p');
        $rsm->addFieldResult('p', 'post_id', 'id');
        
        if ($labelId != 0) {
            $sql = "SELECT p.id as post_id
                    FROM PostsOlogies po 
                    INNER JOIN Posts p ON po.post_id = p.id 
                    INNER JOIN Ologies o ON o.id = p.first_ology_id 
                    INNER JOIN LabelsOlogies lo ON lo.ology_id = o.id
                    WHERE lo.label_id = " . intval($labelId) . " AND p.is_draft <> 1 AND o.blacklisted IS NULL 
                    ORDER BY date_ologized DESC
                    LIMIT " . intval($offset) . ", " . intval($n);
        } else {
            $sql = "SELECT p.id as post_id
                    FROM PostsOlogies po 
                    INNER JOIN Posts p ON po.post_id = p.id 
                    INNER JOIN Ologies o ON o.id = p.first_ology_id 
                    WHERE p.is_draft <> 1 AND o.blacklisted IS NULL 
                    ORDER BY date_ologized DESC
                    LIMIT " . intval($offset) . ", " . intval($n);
        }
        $query = $this->em->createNativeQuery($sql, $rsm);
        $posts = $query->getResult();
        
        $postIds = array();
        foreach ($posts as $post) {
            $postIds[] = $post->getId();
        }
        $postIds = array_unique($postIds);
        
        $sid = implode(CacheDAO::SEP, $postIds);
        $this->redis->set(self::SPLASH_PREFIX . $labelId, $sid);
        
        return self::SPLASH_PREFIX . $labelId . "==" . $sid . ';';
    }
    
    public function getPostsCardsByLabel($label, $offset, $n) {
        $ids = $this->redis->get(self::SPLASH_PREFIX . $label);
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
