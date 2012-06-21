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

class PostCache extends BaseCache {
    const RP_PREFIX = "rp_";
    const RP_PRO_PREFIX = "rpp_";
    const SPLASH_PREFIX = "splash_";
    const POST_MOST_VIEWED_PREFIX = "pmv";
    const POSTS_USER = "posusers_";
    const POSTS_FOUNDER_OFFSET = "pfo_";
    const POST_IDS_FOR_OLOGY = "pidfo_";
    const NB_POSTS_OFFSET = "nbpooff";
    
    function __construct(EntityManager $em, Client $redis, $dbConnection) {
        parent::__construct($em, $redis, $dbConnection);
    }

    public function cacheRelatedPostsPreview($offset, $n, $proPostsOnly = false, $withImagesOnly = false) {
        $labels = $this->em->createQueryBuilder()
                        ->add('select', 'l.id')
                        ->from('OlogySocialBundle:Label', 'l')
                        ->getQuery()
                        ->getResult();
        
        foreach ($labels as $label) {
            $this->cacheRelatedPostsPreviewByLabelId($label['id'], $offset, $n, $proPostsOnly, $withImagesOnly);
        }
        $this->cacheRelatedPostsPreviewByLabelId(0, $offset, $n, $proPostsOnly, $withImagesOnly);
    }
    
    public function cacheRelatedPostsPreviewByLabelId($labelId, $offset, $n, $proPosts = false, $withImagesOnly = false) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p.id')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->innerJoin('p.firstOlogy', 'o')
                        ->innerJoin('o.ologylabels', 'ol')
                        ->innerJoin('ol.label', 'l')
                        ->where('p.isDraft <> 1');

        if ($labelId != 0)
            $qb->andWhere('l.id = ?1');

        if ($withImagesOnly)
            $qb->andWhere('p.imageUrl IS NOT NULL');

        if ($proPosts)
            $qb->andWhere('p.isProfessional = 1');
        else
            $qb->andWhere('p.isProfessional <> 1');

        $qb->orderBy('p.creationDate', 'DESC');

        $query = $qb->getQuery();
        if ($labelId != 0)
            $query->setParameter(1, $labelId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $posts = $query->getResult();

        $postIds = array();
        foreach ($posts as $post) {
            $postIds[] = $post['id'];
        }

        if ($proPosts)
            $this->redis->set(self::RP_PRO_PREFIX . $labelId, implode(CacheDAO::SEP, $postIds));
        else
            $this->redis->set(self::RP_PREFIX . $labelId, implode(CacheDAO::SEP, $postIds));
    }
    
    public function getPostsPreviewByLabel($labelId, $offset, $n, $proPostsOnly, $excludePostId = NULL) {
        $ids = $this->redis->get((($proPostsOnly) ? self::RP_PRO_PREFIX : self::RP_PREFIX) . $labelId);
        $idArray = explode(CacheDAO::SEP, $ids);
        $nbElements = count($idArray);
        $posts = array();
        
        $cpt = 0;
        for ($i = $offset; $i < $nbElements && $cpt < $n; $i++) {
            $id = $idArray[$i];
            if ($this->redis->get(CacheDAO::POST_PREFIX . $id) == NULL)
                continue;
            if ($excludePostId != NULL && $id == $excludePostId)
                continue;
            
            $u = new User();
            $u->setFirstName($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_FN));
            $u->setLastName($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_LN));
            $u->setImageUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_IMG));
            $u->setId($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_ID));
            
            $p = new Post();
            $p->setId($id);
            $p->setTimesCommented($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBCOMMENTS));
            $p->setFirstOlogy($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_FO_NAME));
            $p->setFirstOlogyId($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_FO_ID));
            $p->setCreationDate($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_DATE));
            $p->setAuthor($u);
            
            $p->setTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TITLE));
            $p->setHtmlTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TITLE));
            $p->setImageUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_IMAGE));
            $p->setSlug($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_SLUG));
            $p->setIsProfessional($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_PRO));
            
            $posts[] = $p;
            
            $cpt++;
        }
        return $posts;
    }
    
    public function changeNbViews($id, $n) {
        $cmd = $this->redis->createCommand('incr', array(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBVIEW));
        $this->redis->executeCommand($cmd);
    }
    
    public function cacheMostViewed() {
        $sql = 'SELECT id as post_id FROM Posts p WHERE p.is_pro = 1';
        $array = $this->dbConnection->fetchAll($sql);
        
        $posts = array(-1, -1, -1, -1, -1);
        $nbviews = array(-1, -1, -1, -1, -1);
        
        foreach ($array as $p) {
            $postId = $p['post_id'];
            $nbView = $this->redis->get(CacheDAO::POST_PREFIX . $postId . CacheDAO::POST_NBVIEW);

            if ($nbView == NULL)
                $nbView = 0;
            
            if ($nbView < $nbviews[0]) {
                continue;
            }
            if ($nbView < $nbviews[1]) {
                $nbviews[0] = $nbView;
                $posts[0] = $postId;
                continue;
            }
            if ($nbView < $nbviews[2]) {
                $nbviews[0] = $nbviews[1];
                $nbviews[1] = $nbView;
                $posts[0] = $posts[1];
                $posts[1] = $postId;
                continue;
            }
            if ($nbView < $nbviews[3]) {
                $nbviews[0] = $nbviews[1];
                $nbviews[1] = $nbviews[2];
                $nbviews[2] = $nbView;
                $posts[0] = $posts[1];
                $posts[1] = $posts[2];
                $posts[2] = $postId;
                continue;
            }
            if ($nbView < $nbviews[4]) {
                $nbviews[0] = $nbviews[1];
                $nbviews[1] = $nbviews[2];
                $nbviews[2] = $nbviews[3];
                $nbviews[3] = $nbView;
                $posts[0] = $posts[1];
                $posts[1] = $posts[2];
                $posts[2] = $posts[3];
                $posts[3] = $postId;
                continue;
            }
            $nbviews[0] = $nbviews[1];
            $nbviews[1] = $nbviews[2];
            $nbviews[2] = $nbviews[3];
            $nbviews[3] = $nbviews[4];
            $nbviews[4] = $nbView;
            $posts[0] = $posts[1];
            $posts[1] = $posts[2];
            $posts[2] = $posts[3];
            $posts[3] = $posts[4];
            $posts[4] = $postId;
        }
        $res = implode(CacheDAO::SEP, $posts);
        $this->redis->set(self::POST_MOST_VIEWED_PREFIX, $res);
        
        return $res; 
    }
    
    public function getMostViewed() {
        $ids = $this->redis->get(self::POST_MOST_VIEWED_PREFIX);
        $idArray = explode(CacheDAO::SEP, $ids);
        
        $posts = array();
        for ($i = 0; $i < 5; $i++) {
            if (!array_key_exists($i, $idArray))
                continue;
            $id = $idArray[$i];
            if ($this->redis->get(CacheDAO::POST_PREFIX . $id) == NULL)
                continue;
            
            $p = $this->getCachedPost($id);
            $posts[] = $p;
        }
        
        return $posts;
    }
      
    // Function which returns the post of an ologyfounder for a specific post
    public function getPostsForUser($postFounderId, $postId){
        $sql_founderPosts = "SELECT p.author_id, p.creation_date,p.id,p.html_title as htmlTitle, p.slug,
                             p.times_commented as post_nbcomments, p.image_url as imageUrl
                             FROM Posts p
                             WHERE (p.is_pro = 1) and (p.author_id = $postFounderId)
                             ORDER BY p.creation_date DESC
                             LIMIT 0, 3";       
        
        $array = $this->dbConnection->fetchAll($sql_founderPosts);
        $posts = array();
        
        foreach($array as $po){
            $id = $po['id'];
            if ($id != $postId){
                $p = new Post();
                $p->setHtmlTitle($po['htmlTitle']);
                $p->setSlug($po['slug']);
                $p->setId($id);
                $p->setTimesCommented($po['post_nbcomments']);
                $p->setImageUrl($po['imageUrl']);
                $posts[] = $p;
            }
        }
        return $posts;
    }
      
    
    
    public function getCachedPostsCardsForOlogy($ologyId, $offset, $n) {
        $ids = $this->redis->get(OlogyCache::POSTS_OLOGY . $ologyId);
        $idArray = explode(CacheDAO::SEP, $ids);
        $nbElements = count($idArray);
        $posts = array();
        $cpt = 0;
        for ($i = $offset; $i < $nbElements && $cpt < $n; $i++) {
            $cpt++;
            $id = $idArray[$i];
            if ($this->redis->get(CacheDAO::POST_PREFIX . $id) == NULL)
                continue;
            
            $p = new Post();
            $p->setId($id);
            $p->setTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TITLE));
            $p->setHtmlTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TITLE));
            $p->setAudioUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUDIO));
            $p->setImageUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_IMAGE));
            $p->setVideoUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_VIDEO));
            $p->setSummary($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_SUMMARY));
            
            $p->setTimesLoved($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBLOVE));
            $p->setTimesHated($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBHATE));
            $p->setTimesHmm($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBHMM));
            
            $p->setTextContent($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_SUMMARY));
            $p->setSlug($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_SLUG));
            $p->setCreationDate($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_DATE));
            $p->setIsProfessional($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_PRO));
            
            $pt = new PostType();
            $pt->setId(intval($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TYPE)));
            $p->setPostType($pt);
            
            $author = new User();
            $author->setId($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_ID));
            $author->setImageUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_IMG));
            $author->setFirstname($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_FN));
            $author->setLastname($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_LN));
            
            if ($p->getIsProfessional())
                $author->setEditorTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_TI));
            $p->setAuthor($author);
            
            $firstOlogy = new Ology();
            $firstOlogy->setId($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_FO_ID));
            $firstOlogy->setName($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_FO_NAME));
            $p->setFirstOlogy($firstOlogy);
            
            $posts[] = $p;
        }

        return $posts;
    }
}
?>
