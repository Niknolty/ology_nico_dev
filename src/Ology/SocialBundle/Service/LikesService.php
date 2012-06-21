<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\LikesDAO;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\PostDAO;
use Ology\SocialBundle\Entity\Likes;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Controller\Website\BaseWebController;
use Ology\SocialBundle\Service\UserService;


class LikesService extends BaseWebController{
  protected $likesDAO;
  protected $cacheDAO;
  protected $userService;
 
    function __construct(LikesDAO $dao, CacheDAO $cacheDAO, UserService $userService) {
        $this->likesDAO = $dao;
        $this->cacheDAO = $cacheDAO;
        $this->userService = $userService;
    }
    
    public function createLikes($authorId, $postId, $like_type) {
        
        if ($this->userService->getUser($authorId) != "temp_user@ology.com"){    
            if ($this->isHeLovingPost($authorId, $postId, "love"))
                $this->deleteLikes($authorId, $postId, "love");
            else if ($this->isHeLovingPost($authorId, $postId, "hate"))
                $this->deleteLikes($authorId, $postId, "hate");
            else if ($this->isHeLovingPost($authorId, $postId, "hmm"))
                $this->deleteLikes($authorId, $postId, "hmm");
        }
        $like = $this->likesDAO->createLikes($authorId, $postId, $like_type);
        $this->cacheDAO->cache_post_setSubscribedUserForPost($authorId, $postId);
        return $like;
    }
    
    public function deleteLikes($author_id, $postId, $likeType){
        $this->likesDAO->deleteLikes($author_id, $postId, $likeType);
    }
    
    public function isHeLovingPost($userId, $postId, $likeType){
        return $this->likesDAO->isHeLovingPost($userId, $postId, $likeType);
    }
    
    public function getNumberOfLoveHateHmm($postId, $likeType){
        return $this->likesDAO->getNumberOfLoveHateHmm($postId, $likeType);
    }
    
    public function getFirstUser($postId, $LikeType){
        return $this->likesDAO->getFirstUser($postId, $LikeType);
    }
    
    public function getListUsersLike($postId, $likeType){
        return $this->likesDAO->getListUsersLike($postId, $likeType);
    }
    
    /**
     * This will return an array which holds 3 arrays : isHating, isLoving and isHmm
     */
    public function getLikesForPosts($posts, $userId) {
        $isLoving = array();
        $isHating = array();
        $isHmm = array();
        
        foreach ($posts as $po) {
            // Post $po can be a Post entity OR a PostChannel OR a PostOlogy so we do this check
            if (method_exists($po, "getPost"))
                $po = $po->getPost();
            
            $postId = $po->getId();

            if ($this->isHeLovingPost($userId, $postId, "love"))
                $isLoving[$postId] = true;
            else
                $isLoving[$postId] = false;
            if ($this->isHeLovingPost($userId, $postId, "hate"))
                $isHating[$postId] = true;
            else
                $isHating[$postId] = false;
            if ($this->isHeLovingPost($userId, $postId, "hmm"))
                $isHmm[$postId] = true;
            else
                $isHmm[$postId] = false;
        }
        
        return array("isLoving" => $isLoving, "isHating" => $isHating, "isHmm" => $isHmm);
    }
}

?>
