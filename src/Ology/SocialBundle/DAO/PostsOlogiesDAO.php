<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Cache\OlogyCache;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\PostsOlogies;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\DAO\CacheDAO\PostsOlogiesCacheDAO;


class PostsOlogiesDAO {

    protected $em;
    protected $postsOlogiesCacheDAO;

    function __construct(PostsOlogiesCacheDAO $postsOlogiesCacheDAO, EntityManager $em) {
        $this->postsOlogiesCacheDAO = $postsOlogiesCacheDAO;
        $this->em = $em;
    }

    public function createPostsOlogies($post, $ologyId, $sharerId) {
        $sharer = $this->em->getReference('OlogySocialBundle:User', $sharerId);
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $po = $this->em->getRepository('OlogySocialBundle:PostsOlogies')
                ->findBy(array('post' => $post->getId(),
                               'ology' => $ologyId));
        if (count($po) == 0) {
            $postOlogies = new PostsOlogies();
            $postOlogies->setOlogy($ology);
            $postOlogies->setPost($post);
            $postOlogies->setPostedAt(time());
            $postOlogies->setPostedBy($sharer);

            $this->em->persist($postOlogies);
            $this->em->flush();
            
            // Save in parallele in REDIS
            $this->postsOlogiesCacheDAO->createPostsOlogies($post->getId(), $ologyId, $sharerId, $postOlogies->getPostedAt());

            return $postOlogies;
        }
        return $po[0];
    }
    
    public function deletePostsOlogies($postId, $ologyId, $sharerId) {
        $ops = $this->em->createQueryBuilder()
            ->add('select', 'op')
            ->from('OlogySocialBundle:PostsOlogies', 'op')
            ->innerJoin('op.ology', 'o')
            ->innerJoin('op.post', 'p')
            ->innerJoin('op.postedBy', 'u')
            ->where('o.id = ?1')
            ->andWhere('p.id = ?2')
            ->andWhere('u.id = ?3')
            ->getQuery()
            ->setParameter(1, $ologyId)
            ->setParameter(2, $postId)
            ->setParameter(3, $sharerId)
            ->getResult();
        
        foreach ($ops as $op)
            $this->em->remove($op);
        $this->em->flush();
        
        // Delete from REDIS too
        $this->postsOlogiesCacheDAO->deletePostsOlogies($postId, $ologyId, $sharerId);
    }

    public function getPostsOlogiesForOlogy($ologyId) {
        $query = $this->em->createQuery('SELECT u FROM Ology\SocialBundle\Entity\PostsOlogies u WHERE u.ology = ?1');
        $query->setParameter(1, $ologyId);
        $result = $query->getResult();

        return $result;
    }

    public function getPostsOlogiesForPost($postId) {
        $ologies = $this->em->getRepository('OlogySocialBundle:PostsOlogies')->findOneBy(array('post' => $postId));
        return $ologies;
    }

    public function deletePostsOlogiesForPost($postId) {
        $postology_array = $this->em->getRepository('OlogySocialBundle:PostsOlogies')->findBy(array('post' => $postId));

        foreach ($postology_array as $postology) {
            $ologyId = $postology->getOlogy()->getId();
            $postedById = $postology->getPostedBy()->getId();
            $this->em->remove($postology);
            
            // Delete from REDIS too
            $this->postsOlogiesCacheDAO->deletePostsOlogiesForPost($ologyId, $postId, $postedById);
        }
        $this->em->flush();
        
        return true;
    }

    public function deletePostsOlogiesOfOlogy($ologyId) {
        $postology_array = $em->getRepository('OlogySocialBundle:PostsOlogies')->findBy(array('ology' => $ologyId));

        foreach ($postology_array as $postology) {
            $this->em->remove($postology);
        }
        $this->em->flush();
        
        // Delete from REDIS too
        $this->postsOlogiesCacheDAO->deletePostsOlogiesOfOlogy($ologyId);

        return true;
    }
    
    public function getPostsOlogiesByOlogies($ologyIds, $offset, $n) {
        if (count($ologyIds) == 0)
            return array();
        
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'po')
                        ->from('OlogySocialBundle:PostsOlogies', 'po')
                        ->innerJoin('po.ology', 'o')
                        ->innerJoin('po.post', 'p')
                        ->where('o.id IN (?1)')
                        ->andWhere('p.isDraft <> 1')
                        ->orderBy('po.postedAt', 'DESC');

        $query = $qb->getQuery();
        $query->setParameter(1, $ologyIds);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $postsOlogies = $query->getResult();

        return $postsOlogies;
    }

    public function getPostsIdsForUsersByOlogiesKey($followedUsersAndOlogiesArray, $userId, $compute) {
        return $this->postsOlogiesCacheDAO->getPostsIdsForUsersByOlogiesKey($followedUsersAndOlogiesArray, $userId, $compute);
    }
    

    public function getPostForUsersByOlogies($followedUsersAndOlogiesArray, $userId, $offset, $n) {
        // Try getting posts from REDIS cache, else loading DB then cache it
        $posts = $this->postsOlogiesCacheDAO->getPostForUsersByOlogies($followedUsersAndOlogiesArray, $userId, $offset, $n);
        if (!empty($posts))
            return $posts;

        $postsCard = array();
        foreach ($followedUsersAndOlogiesArray as $userAndOlogies) {
            $followeeId = $userAndOlogies['followeeId'];
            $ologiesIds = $userAndOlogies['ologiesIds'];
            
            foreach ($ologiesIds as $ologyId) {
                $posts = $this->getPostsForUserByOlogy($ologyId, $followeeId, $offset, $n);
                if (sizeof($posts) > 0) {
                    foreach ($posts as $post) {
                        $postsCard[] = $post;
                    }
                }
            }
        }
        
        return $postsCard;
    }

    public function getPostsForUserByOlogy($ologyId, $userId, $offset, $n){
        // Try getting posts from REDIS cache, else loading DB then cache it
        $posts = $this->postsOlogiesCacheDAO->getPostsForUserByOlogy($ologyId, $userId, $offset, $n);
        if (!empty($posts))
            return $posts;

        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'po')
                        ->from('OlogySocialBundle:PostsOlogies', 'po')
                        ->innerJoin('po.ology', 'o')
                        ->innerJoin('po.postedBy', 'u')
                        ->where('o.id = ?1')
                        ->andWhere('u.id = ?2');

        $query = $qb->getQuery();
        $query->setParameter(1, $ologyId);
        $query->setParameter(2, $userId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $postsOlogies = $query->getResult();
        
        $posts = array();
        foreach ($postsOlogies as $po) {
            // Save in parallele in REDIS
            $this->postsOlogiesCacheDAO->createPostsOlogies($po->getPost()->getId(), $ologyId, $userId, $po->getPostedAt());
            $posts[] = $po->getPost();
        }
        return $posts;
    }
    
    /**
     * Compute the union of posts ids in each ology id.
     * This function removes duplicates and sorts posts ids by date.
     * @return array Posts
     */
    public function getPostByOlogies($ologyIdsArray, $userId, $offset, $n) {
        // Try getting posts from REDIS cache, else loading DB then cache it
        $posts = $this->postsOlogiesCacheDAO->getPostByOlogies($ologyIdsArray, $userId, $offset, $n);
        if (!empty($posts))
            return $posts;
        
        $postsCard = array();
        foreach ($ologyIdsArray as $ologyId) {
            $posts = $this->getPostsForOlogy($ologyId, $offset, $n);
            if (sizeof($posts) > 0) {
                foreach ($posts as $post) {
                    $postLink = $this->postsOlogiesDAO->getPostLink($ologyId, $post->getId());
                    $post->setPostLink($postLink);
                    $postsCard[] = $post;
                }
            }
        }
        return $postsCard;
    }
    
    public function getPostsIdsByOlogiesKey($ologyIdsArray, $userId, $compute) {
        return $this->postsOlogiesCacheDAO->getPostsIdsByOlogiesKey($userId, $ologyIdsArray, $compute);
    }
    
    public function getPostsForOlogy($ologyId, $offset, $n) {
        // Try getting posts from REDIS cache, else loading DB then cache it
        $posts = $this->postsOlogiesCacheDAO->getPostsForOlogy($ologyId, $offset, $n);
        if (!empty($posts))
            return $posts;
        
        $postOlogies = $this->getPostsOlogiesByOlogies($ologyId, $offset, $n);

        $posts = array();
        foreach ($postOlogies as $postOlogy) {
            // Save in parallele in REDIS
            $this->postsOlogiesCacheDAO->createPostsOlogies($postOlogy->getPost()->getId(), $ologyId, $postOlogy->getPostedBy()->getId(), $postOlogy->getPostedAt());
            $posts[] = $postOlogy->getPost();
        }
        return $posts;
    }
    
    public function getPostLink($ologyId, $postId) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'po')
                        ->from('OlogySocialBundle:PostsOlogies', 'po')
                        ->innerJoin('po.ology', 'o')
                        ->innerJoin('po.post', 'p')
                        ->where('o.id = ?1')
                        ->andWhere('p.id = ?2');

        $query = $qb->getQuery();
        $query->setParameter(1, $ologyId);
        $query->setParameter(2, $postId);
        $query->setMaxResults(1);
        $postsOlogies = $query->getResult();

        if (empty($postsOlogies))
            return null;
        
        return $postsOlogies[0]; 
    }
    
    public function getPreviousAndNextPostInfos($ologyId, $postId){
        return $this->postsOlogiesCacheDAO->getPreviousAndNextPostInfos($ologyId, $postId);
    }

}

?>
