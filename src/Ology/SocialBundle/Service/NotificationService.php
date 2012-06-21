<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\NotificationDAO;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\Service\OlogyService;
use Ology\SocialBundle\Service\PostService;
use Ology\SocialBundle\Service\UserService;
use Ology\SocialBundle\Service\StashService;


class NotificationService {
    protected $notificationDAO;
    protected $cacheDAO;
    protected $ologyService;
    protected $postService;
    protected $commentService;
    protected $userService;
    protected $membershipService;
    protected $stashService;

    function __construct(NotificationDAO $notificationDAO, CacheDAO $cacheDAO, OlogyService $ologyService, PostService $postService, CommentService $commentService, UserService $userService, MembershipService $membershipService, StashService $stashService) {
        $this->notificationDAO = $notificationDAO;
        $this->cacheDAO = $cacheDAO;
        $this->ologyService = $ologyService;
        $this->postService = $postService;
        $this->commentService = $commentService;
        $this->userService = $userService;
        $this->membershipService = $membershipService;
        $this->stashService = $stashService;
    }
    
    public function notifJoinOlogy($ologyId, $newMemberId) {
        $newMember = $this->userService->getUser($newMemberId);
        $ology = $this->ologyService->getOlogy($ologyId);
        $founder = $ology->getFounder();
        
        if ($newMemberId != $founder->getId()) {
            $content = $newMember->getUsername() . " joined your ology " . $ology->getName();
            $notif = $this->notificationDAO->createJoinOlogyNotification($ologyId, $founder->getId(), $newMember->getId(), $content);
            $this->setIsNotifInvalid($founder->getId(), true);
            return $notif;
        } else {
            return NULL;
        }
    }
    
    public function notifFollowUserInOlogy($ologyId, $followerId, $followeeId) {
        $follower = $this->userService->getUser($followerId);
        $followee = $this->userService->getUser($followeeId);
        $ology = $this->ologyService->getOlogy($ologyId);
        
        if ($followerId != $followeeId) {
            $content = $follower->getUsername() . " follows you in ology " . $ology->getName();
            $notif = $this->notificationDAO->createFollowUserInOlogyNotification($ologyId, $followee->getId(), $follower->getId(), $content);
            $this->setIsNotifInvalid($followee->getId(), true);
            return $notif;
        } else {
            return NULL;
        }
    }
    
    public function notifPostOlogyReologized($postId, $sharerId, $ologyId) {
        $sharer = $this->userService->getUser($sharerId);
        $ology = $this->ologyService->getOlogy($ologyId);
        $post = $this->postService->getPost($postId);
        $ownerId = $post->getAuthor()->getId();
        
        if ($sharerId != $ownerId) {
            $content = "One of your posts has been reologized by " . $sharer->getUsername() . " in " . $ology->getName();
            $notif = $this->notificationDAO->createPostOlogyReologizedNotification($sharerId, $ologyId, $postId, $ownerId, $content);
            $this->setIsNotifInvalid($ownerId, true);
            return $notif;
        } else {
            return NULL;
        }
    }
    
    public function notifPostStashReologized($postId, $sharerId, $stashId) {
        $sharer = $this->userService->getUser($sharerId);
        $stash = $this->ologyService->getOlogy($stashId);
        $post = $this->postService->getPost($postId);
        $ownerId = $post->getAuthor()->getId();
        
        if ($sharerId != $ownerId) {
            $content = "One of your posts has been reologized by " . $sharer->getUsername() . " in " . $stash->getName();
            $notif = $this->notificationDAO->createPostStashReologizedNotification($sharerId, $stashId, $postId, $ownerId, $content);
            $this->setIsNotifInvalid($ownerId, true);
            return $notif;
        } else {
            return NULL;
        }
    }
    
    public function notifNewPostInOlogy($ologyId, $posterId, $postId) {
        $members = $this->membershipService->getUsersForOlogy($ologyId, NULL);
        $poster = $this->userService->getUser($posterId);
        $post = $this->postService->getPost($postId);
        
        $usersIdToNotify = array();
        foreach ($members as $member) {
            if ($member->getId() != $poster->getId()) {
                $usersIdToNotify[] = $member->getId();
                $this->setIsNotifInvalid($member->getId(), true);
            }
        }
        
        $content = $poster->getUsername() . " posted in an ology you follow";

        $notifs = $this->notificationDAO->createPostInOlogyNotifications($posterId, $ologyId, $post->getId(), $usersIdToNotify, $content);
        return $notifs;
    }
    
    public function notifNewCommentOnPost($postId, $commenterId) {
        $post = $this->postService->getPost($postId);
        $commenter = $this->userService->getUser($commenterId);
        $content_all = $commenter->getUsername() . " commented on the post " . $post->getTitle();
        $content_auth = $commenter->getUsername() . " commented on your post " . $post->getTitle();
        $authorId = $post->getAuthor()->getId();

        $usersId = $this->cacheDAO->cache_post_getSubscribedUsersForPost($postId);
        $usersIdToNotify = array();
        foreach ($usersId as $userId) {
            if (($userId != $commenterId) &&($userId != $authorId)) {
                $usersIdToNotify[] = $userId;
                $this->setIsNotifInvalid($userId, true);
            }
        }
        
        $notifs = $this->notificationDAO->createCommentOnCommentedPostNotificationForUsers($post->getFirstOlogy()->getId(), $post->getId(), $commenter->getId(), $usersIdToNotify, $content_all);
        if ($commenter->getId() != $authorId) {
            $authorNotif = $this->notificationDAO->createCommentOnOwnPostNotification($post->getFirstOlogy()->getId(), $post->getId(), $commenter->getId(), $post->getAuthor()->getId(), $content_auth);
            $notifs[] = $authorNotif;
        }
        
        return $notifs;
    }
    
    public function notifFollowStash($followerId, $stashId) {
        $newMember = $this->userService->getUser($followerId);
        $stash = $this->stashService->getStash($stashId);
        $founder = $stash->getFounder();
        
        if ($followerId != $founder->getId()) {
            $content = $newMember->getUsername() . " follows your stash " . $stash->getName();
            $notif = $this->notificationDAO->createFollowStashNotification($stashId, $founder->getId(), $newMember->getId(), $content);
            $this->setIsNotifInvalid($founder->getId(), true);
            return $notif;
        } else {
            return NULL;
        }
    }
    
    /* NOT YET NEEDED
    public function notifNewCommentOnComment($commentId, $commenterId) {
        $comment = $this->commentService->getComment($commentId);
        $authorId = $comment->getAuthor()->getId();
        $commenter = $this->userService->getUser($commenterId);
        $content = $commenter->getUsername() . " commented on your comment to the post " . $comment->getPost()->getTitle();
        
        $notif = $this->notificationDAO->createPostNotification($post->getId(), $authorId, $content);
        return $notif;
    }
     */
    
    public function deleteNotificationForOlogy($ologyId) {
        $result = $this->notificationDAO->deleteNotificationForOlogy($ologyId);
        return $result;
    }

    public function deleteNotificationForComment($commentId) {
        $result = $this->notificationDAO->deleteNotificationForComment($commentId);
    }

    public function deleteNotificationsForPost($postId) {
        return  $this->notificationDAO->deleteNotificationsForPost($postId);
    }
    
    public function getNotification($id) {
        $notif = $this->notificationDAO->getNotification($id);
        return $notif;
    }
    
    public function deleteNotification($id) {
        $notif = $this->notificationDAO->deleteNotification($id);
        return $notif;
    }
    
    public function getNotificationsForUser($userId, $n = 0) {
        $isInvalid = $this->isNotifInvalid($userId);
        if ($isInvalid != NULL) {
            $notifications = $this->notificationDAO->getNotificationsForUser($userId, $n);
            $this->cacheDAO->cache_notif_store($userId, $notifications);
        }
        
        return $this->cacheDAO->cache_notif_get($userId);
    }
    
    public function isNotifInvalid($userId) {
        return $this->cacheDAO->cache_user_get_invalidate_notifs($userId);
    }
    
    public function setIsNotifInvalid($userId, $bool) {
        $this->cacheDAO->cache_user_set_invalidate_notifs($userId, $bool);
    }    
}