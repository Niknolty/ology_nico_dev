<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Likes;
use Ology\SocialBundle\Service\UserService;
use Ology\SocialBundle\Exceptions\DAOException;
use Ology\SocialBundle\Resources\config\config_path;
use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\DAO\CacheDAO\LikesCacheDAO;

class LikesDAO {

    protected $em;
    protected $userService;
    protected $likesCacheDAO;

    function __construct(EntityManager $em, UserService $userService, LikesCacheDAO $likesCacheDAO) {
        $this->em = $em;
        $this->userService = $userService;
        $this->likesCacheDAO = $likesCacheDAO;
    }

    public function createLikes($authorId, $postId, $like_type) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);

        if (!$post)
            throw new DAOException('LikesDAO: No post found for id ' . $postId);
        
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($authorId);

        $query = $this->em->createQueryBuilder()
                    ->add('select', 'l')
                    ->from('OlogySocialBundle:Likes', 'l')
                    ->where('l.author_id = ?1 AND l.postId = ?2 AND l.like_type = ?3')
                    ->getQuery();

        $query->setParameter(1, $authorId);
        $query->setParameter(2, $postId);
        $query->setParameter(3, $like_type);
        $res = $query->getResult();
           
        if ((sizeof($res) == 0) || ($user == "temp_user@ology.com")){ 
            $like = new Likes();
            $like->setAuthorId($authorId);
            $like->setLikeType($like_type);
            $like->setPostId($postId);
            
            $this->em->persist($like);
            if ($like_type == "love")
                $post->incrTimeLoved();
            elseif ($like_type == "hate")
                $post->incrTimeHated();
            elseif ($like_type == "hmm")
                $post->incrTimeHmm();
            $this->em->persist($post);
            $this->em->flush();
            
            // Save in parallele in REDIS
            $this->likesCacheDAO->createLike($authorId, $postId, $like_type, $like->getDateLike());
            
            return $like;
        }
        else
            return 0;
    }
    
    public function deleteLikes($author_id, $postId, $likeType){
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);

        if ($likeType == "love")
            $post->decrTimeLoved();
        elseif ($likeType == "hate")
            $post->decrTimeHated();
        elseif ($likeType == "hmm")
            $post->decrTimeHmm();
        
        $this->em->persist($post);
        $like = $this->em->getRepository('OlogySocialBundle:Likes')
                ->findOneBy(array('author_id' => $author_id, 'postId' => $postId, 'like_type' => $likeType));
        
        if (!$like) {
            return false;
        }
        $this->em->remove($like);
        $this->em->flush();
        
        // Delete in parallele in REDIS
        $this->likesCacheDAO->deleteLike($author_id, $postId, $likeType);
        
        return true;
    }
    
    public function isHeLovingPost($userId, $postId, $likeType){
        return $this->likesCacheDAO->isHeLovingPost($userId, $postId, $likeType);
    }
    
    // TODO get this info in the new post cache DAO
    public function getNumberOfLoveHateHmm($postId, $likeType){
        $query = $this->em->createQueryBuilder()
                    ->add('select', 'l')
                    ->from('OlogySocialBundle:Likes', 'l')
                    ->where('l.postId = ?1 AND l.like_type = ?2')
                    ->getQuery();

        $query->setParameter(1, $postId);
        $query->setParameter(2, $likeType);
        $res = $query->getResult();
        return sizeof($res);    
    }
    
    public function getFirstUser($postId, $LikeType){
        $sql = "SELECT u.id, u.postId, u.author_id, u.like_type, u.date_like 
                FROM OlogySocialBundle:Likes u 
                WHERE u.postId = ?1
                AND u.like_type = ?2";
        $query = $this->em->createQuery($sql);
        $query->setParameter(1, $postId);
        $query->setParameter(2, $LikeType);
        $res = $query->getResult();
        $min = 0;
        $userId = -1;
        foreach ($res as $line) {
            $min = $line['date_like'];
            break;
         }
        foreach ($res as $line) {
            if ($min > $line['date_like'])
                $min = $line['date_like'];
        }

        $sql = "SELECT u.author_id
                FROM OlogySocialBundle:Likes u 
                WHERE u.postId = ?1 AND u.like_type = ?2 AND u.date_like = ?3";
     
        $getUserId = $this->em->createQuery($sql);
        $getUserId->setParameter(1, $postId);
        $getUserId->setParameter(2, $LikeType);
        $getUserId->setParameter(3, $min);
        $res = $getUserId->getResult();
        if (sizeof($res) > 0){
            foreach ($res as $line){
            $userId = ($line['author_id']);
            }
        }
        return $userId;
    }
    
    public function getListUsersLike($postId, $likeType){
        
        $sql_id = "SELECT u.author_id
                   FROM OlogySocialBundle:Likes u 
                   WHERE u.postId = ?1 AND u.like_type = ?2";
        $query = $this->em->createQuery($sql_id);
        $query->setParameter(1, $postId);
        $query->setParameter(2, $likeType);
        $res = $query->getResult();
        
        $sql_url = "SELECT u.imageUrl, u.firstName, u.lastName
                    FROM OlogySocialBundle:User u 
                    WHERE u.id = ?1";
        $query1 = $this->em->createQuery($sql_url);
        
        $UsersIdTab = array(array());
        $id = 0;
        $cpt = 0;
        
        foreach($res as $line){
                $UsersIdTab[$id][0] = $line['author_id'];
                $query1->setParameter(1, $line['author_id']);  
                $res1 = $query1->getResult();
                foreach($res1 as $line1){
                    if (!$line1['imageUrl']){
                        $img = $this->userService->get_random_user_image();             
                        $UsersIdTab[$id][1] = $img;
                        $UsersIdTab[$id][0] = 0;
                    }
                    else
                        $UsersIdTab[$id][1] = $line1['imageUrl'];
                }
            $id++;
        }
        
        
        $cpt = 0;
        $index = 0;
        $PriorityUsers = array(array());
        while(!empty($UsersIdTab[$cpt])){
            if ($index == 7)
                break;
            if (!empty($UsersIdTab[$cpt])){
                // Test if the id is different from anonymous
                if ($UsersIdTab[$cpt][0] != 0){
                    $user_id = $UsersIdTab[$cpt][0];
                    $user_img = $UsersIdTab[$cpt][1];

                    // Stock the info to be replace by the one above
                    $stock_id = $UsersIdTab[$index][0];
                    $stock_img = $UsersIdTab[$index][1];

                    $UsersIdTab[$cpt][0] = $stock_id;
                    $UsersIdTab[$cpt][1] = $stock_img;

                    $UsersIdTab[$index][0] = $user_id;
                    $UsersIdTab[$index][1] = $user_img;                   
                    $index++;
                }   
            }
            $cpt++;
        }
        
        $index = 0;
        $cpt = 0;
        while(!empty($UsersIdTab[$cpt])){
            if ($index == 7)
                break;
            $PriorityUsers[$index][0] = $UsersIdTab[$cpt][0];
            $PriorityUsers[$index][1] = $UsersIdTab[$cpt][1];
            $index++;
            $cpt++;
        }
        
        unset($UsersIdTab);
        
        return $PriorityUsers;
    }
}

?>
