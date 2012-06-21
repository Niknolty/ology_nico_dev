<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\CommentDAO;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\PostDAO;
use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Entity\User;

class CommentService {
  protected $commentDAO;
  protected $cacheDAO;
  protected $notificationService;
  protected $mailService;
  protected $n;
 
    function __construct(CommentDAO $dao, CacheDAO $cacheDAO, EmailService $mailService, $default_com_number) {
        $this->commentDAO = $dao;
        $this->cacheDAO = $cacheDAO;
        $this->mailService = $mailService;
        $this->n = $default_com_number;
    }
    
    public function setNotificationService(NotificationService $notificationService) {
        $this->notificationService = $notificationService;
    }
    
    public function createComment($authorId, $postId, $content, $parentComment = NULL) {
        $comment = $this->commentDAO->createComment($authorId, $postId, $content, $parentComment);
        $notifs = $this->notificationService->notifNewCommentOnPost($postId, $authorId);
        $this->mailService->emailNotifications($notifs);
        $this->cacheDAO->cache_post_setSubscribedUserForPost($authorId, $postId);
        
        $userIds = $this->cacheDAO->cache_post_getSubscribedUsersForPost($postId);
        foreach ($userIds as $userId) {
            $this->notificationService->setIsNotifInvalid($userId, true);
        }
        return $comment;
    }
    
    public function updateComment($commentId, $postId, $content, $parentComment)
    {
        $comment = $this->commentDAO->updateComment($commentId,$postId, $content, $parentComment);
        
        return $comment;        
    }
    
    public function getComment($commentId) {
        $comment = $this->commentDAO->getComment($commentId);
        return $comment;
    }
    
    public function deleteComment(User $user, $commentId) {
        if ($this->isAuthorizedToEditOrDelete($user, $commentId)) {
            $userId = $user->getId();
            $postId = $this->commentDAO->getComment($commentId)->getPost()->getId();
            $this->commentDAO->deleteComment($commentId);
            $n = $this->commentDAO->getNumberOfCommentsOnPostForUser($userId, $postId);
            if ($n <= 0)
                $this->cacheDAO->cache_post_unsubscribeUserForPost($userId, $postId);
            return true;
        }
        return false;
    }
    
    public function getCommentForPost($postId, $n, $offset) {
        $result = $this->commentDAO->getCommentForPost($postId, $n, $offset);
        return $result;        
    }
    
    public function getCommentForUser($userId, $n, $offset) {
       $result = $this->commentDAO->getCommentForUser($userId, $n, $offset);
       return $result;           
    }
    
    public function deleteCommentForPost($postId) {
        $comments = $this->commentDAO->getCommentsForPost($postId);
        foreach ($comments as $comment) {
            $this->commentDAO->deleteComment($comment->getId());
        }
    }
     
    public function getDefaultCommentNumber() {
        return $this->n;
    }

    public function isAuthorizedToEditOrDelete(User $user, $commentId) {
       $roles = $user->getRoles();

        if (in_array('ROLE_SUPER_ADMIN', $roles, true))
            return true;

       $authorId = $this->commentDAO->getComment($commentId)->getAuthor()->getId();
       if ($authorId == $user->getId())
           return true;

       return false;
    }
}

?>
