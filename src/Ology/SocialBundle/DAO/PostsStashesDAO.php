<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\PostsStashes;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\DAO\CacheDAO\PostsStashesCacheDAO;

class PostsStashesDAO {

    protected $em;
    protected $postsStashesCacheDAO;

    function __construct(EntityManager $em, PostsStashesCacheDAO $postsStashesCacheDAO) {
        $this->em = $em;
        $this->postsStashesCacheDAO = $postsStashesCacheDAO;
    }

    public function createPostsStashes($post, $stashId) {
        $stash = $this->em->getReference('OlogySocialBundle:Stash', $stashId);

        $po = $this->em->getRepository('OlogySocialBundle:PostsStashes')
                ->findBy(array( 'post' => $post->getId(),
                                'stash' => $stashId));
        if (count($po) == 0) {
            $postStashes = new PostsStashes();
            $postStashes->setStash($stash);
            $postStashes->setPost($post);
            $postStashes->setStashedAt(time());

            $this->em->persist($postStashes);
            $this->em->flush();

            // Save in parallele in REDIS
            $this->postsStashesCacheDAO->createPostStash($post->getId(), $stashId, $postStashes->getStashedAt());
            
            return $postStashes;
        }
        return $po[0];
    }

    public function getPostsStashesForStash($stashId, $offset, $n) {
        $query = $this->em->createQuery('SELECT u FROM Ology\SocialBundle\Entity\PostsStashes u WHERE u.stash = ?1');
        $query->setParameter(1, $stashId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $result = $query->getResult();

        return $result;
    }
    
    public function getPostsIdsByStashesKey($stashIdsArray, $userId, $compute) {
        return $this->postsStashesCacheDAO->getPostsIdsByStashesKey($stashIdsArray, $userId, $compute);
    }
    
    /**
     * Compute the union of posts ids in each stash id.
     * This function removes duplicates and sorts posts ids by date.
     * @return array Posts
     */
    public function getPostByStashes($stashIdsArray, $userId, $offset, $n) {
        // Try getting posts from REDIS cache, else loading DB then cache it
        $posts = $this->postsStashesCacheDAO->getPostByStashes($stashIdsArray, $userId, $offset, $n);
        if (!empty($posts))
            return $posts;
        
        $postsCard = array();
        foreach ($stashIdsArray as $stashId) {
            $posts = $this->getPostsForStash($stashId, $offset, $n);
            if (sizeof($posts) > 0) {
                foreach ($posts as $post) {
                    $postsCard[] = $post;
                }
            }
        }
        return $postsCard;
    }
    
    public function getPostsForStash($stashId, $offset, $n) {
        // Try getting posts from REDIS cache, else loading DB then cache it
        $posts = $this->postsStashesCacheDAO->getPostsForStash($stashId, $offset, $n);
        if (!empty($posts))
            return $posts;
        
        $pss = $this->em->createQueryBuilder()
                    ->add('select', 'ps')
                    ->from('OlogySocialBundle:PostsStashes', 'ps')
                    ->innerJoin('ps.post', 'p')
                    ->where('ps.stash = ?1')
                    ->andWhere('p.imageUrl IS NOT NULL')
                    ->getQuery()
                    ->setParameter(1, $stashId)
                    ->setFirstResult($offset)
                    ->setMaxResults($n)
                    ->getResult();

        $posts = array();
        foreach ($pss as $ps) {
            // Save in parallele in REDIS
            $this->postsStashesCacheDAO->createPostStash($ps->getPost()->getId(), $stashId, $ps->getStashedAt());
            $posts[] = $ps->getPost();
        }
        return $posts;
    }
    
    public function deletePostsStashesForStash($stashId) {
        $query = $this->em->createQuery('DELETE OlogySocialBundle:PostsStashes ps WHERE ps.stash = ?1');
        $query->setParameter(1, $stashId);
        $result = $query->getResult();
        
        // Delete from REDIS too
        $this->postsStashesCacheDAO->deletePostsForStash($stashId);
        
        return $result;
    }
    
    public function deletePostsStashes($stashId, $postId) {
        $query = $this->em->createQuery('DELETE OlogySocialBundle:PostsStashes ps WHERE ps.stash = ?1 AND ps.post = ?2');
        $query->setParameter(1, $stashId);
        $query->setParameter(2, $postId);
        $result = $query->getResult();
        
        // Delete from REDIS too
        $this->postsStashesCacheDAO->deletePostForStash($stashId, $postId);
        
        return $result;
    }

}

?>
