<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\DAO\CacheDAO\FollowUserCacheDAO;
use Ology\SocialBundle\Service\MembershipService;
use Ology\SocialBundle\Service\NotificationService;
use Ology\SocialBundle\Service\EmailService;

/**
 * Description of FollowService
 *
 * @author raphael
 */
class FollowService {
    
    protected $followUserCacheDAO;
    protected $stashService;
    protected $ologyService;
    protected $userService;
    protected $membershipService;
    protected $notificationService;
    protected $emailService;
    
    function __construct(FollowUserCacheDAO $followUserCacheDAO, StashService $stashService, OlogyService $ologyService, UserService $userService, MembershipService $membershipService, NotificationService $notificationService, EmailService $emailService) {
        $this->followUserCacheDAO = $followUserCacheDAO;
        $this->stashService = $stashService;
        $this->ologyService = $ologyService;
        $this->userService = $userService;
        $this->membershipService = $membershipService;
        $this->notificationService = $notificationService;
        $this->emailService = $emailService;
    }
    
    /**
     * Set user following an user in a specific ology;
     * Send a notofication to with the old notification system.
     * @return boolean success
     */
    public function addUserFollowingUserOlogy($followerId, $followeeId, $ologyId) {
        // TODO Add a condition here to test if $followeeId exists in ology:followers key
        // This means if the followee is really following the ologyId. if not return false.
        // This means the followee can't post in the ology so the follower shouldnt be able to follow him in this ology
        if ($followeeId == $followerId)
            return false;
        
        $this->followUserCacheDAO->addUserOlogyFollower($followeeId, $followerId, $ologyId);
        $success = $this->followUserCacheDAO->addUserFollowingUserOlogy($followerId, $followeeId, $ologyId);
        
        if ($success) {
            $notif = $this->notificationService->notifFollowUserInOlogy ($ologyId, $followerId, $followeeId);
            $this->emailService->emailNotification($notif);
        }
        
        return $success;
    }
    
    public function updateUserFollowingUserOlogies($followerId, $followeeId, $ologiesIds) {
        $currentOlogiesIds = $this->getUserFollowingOlogiesIds($followerId);
        $missingOlogiesIds = array_diff($currentOlogiesIds, $ologiesIds);
        
        foreach ($ologiesIds as $ologyId) {
            $this->addUserFollowingUserOlogy($followerId, $followeeId, $ologyId);
        }
        
        foreach ($missingOlogiesIds as $ologyId) {
            $this->removeUserFollowingUserOlogy($followerId, $followeeId, $ologyId);
        }
    }
    
    /**
     * Remove following user in an ology
     * @return boolean success
     */
    public function removeUserFollowingUserOlogy($followerId, $followeeId, $ologyId) {
        $this->followUserCacheDAO->removeUserFollowingUserOlogy($followerId, $followeeId, $ologyId);
        return $this->followUserCacheDAO->removeUserOlogyFollower($followeeId, $followerId, $ologyId);
    }
    
    /**
     * @return array of array followee id following by user + the associate ologiesIds
     */
    public function getUserFolloweesOlogies($userId, $offset = 0, $n = -1) {
        $followeesAndOlogiesIds = array();
        $followeesIds = $this->followUserCacheDAO->getUserFolloweesIds($userId, $offset, $n);
        foreach ($followeesIds as $followeeId) {
            $followeeOlogiesIds = $this->followUserCacheDAO->getUserFolloweeOlogies($userId, $followeeId, $offset, $n);
            if (!empty($followeeOlogiesIds))
                $followeesAndOlogiesIds[] = array('followeeId' => $followeeId, 'ologiesIds' => $followeeOlogiesIds);
        }
        return $followeesAndOlogiesIds;
    }
    
    /**
     * Set user following a specific user stash;
     * Send a notofication to with the old notification system.
     * @return Boolean success
     */
    public function addUserFollowingStash($followerId, $followeeId, $stashId) {
        if (!$this->stashService->isTheOwnerOfStash($followeeId, $stashId) || $followeeId == $followerId)
            return false;
        
        $this->followUserCacheDAO->addUserStashFollower($followeeId, $followerId, $stashId);
        $success = $this->followUserCacheDAO->addUserFollowingStash($followerId, $followeeId, $stashId);
        
        if ($success) {
            $notif = $this->notificationService->notifFollowStash($followerId, $stashId);
            $this->emailService->emailNotification($notif);
        }
            
        return $success;
    }
    
    public function updateUserFollowingStashes($followerId, $followeeId, $stashesIds) {
        $currentStashesIds = $this->getUserFollowingStashesIds($followerId);
        $missingStashesIds = array_diff($currentStashesIds, $stashesIds);
        
        foreach ($stashesIds as $stashId) {
            $this->addUserFollowingStash($followerId, $followeeId, $stashId);
        }
        
        foreach ($missingStashesIds as $stashId) {
            $this->removeUserFollowingStash($followerId, $followeeId, $stashId);
        }
    }
    
    /**
     * Remove following user in a stash
     * @return boolean success
     */
    public function removeUserFollowingStash($followerId, $followeeId, $stashId) {
        $this->followUserCacheDAO->removeUserFollowingStash($followerId, $followeeId, $stashId);
        return $this->followUserCacheDAO->removeUserStashFollower($followeeId, $followerId, $stashId);
    }
    
    /**
     * @return array stashes ids following by user
     */
    public function getUserFollowingStashesIds($userId, $offset = 0, $n = -1) {
        $stashesIds = array();
        $followeesIds = $this->followUserCacheDAO->getUserFolloweesIds($userId, $offset, $n);
        foreach ($followeesIds as $followeeId) {
            $followeeStashesIds = $this->followUserCacheDAO->getUserFolloweeStashes($userId, $followeeId, $offset, $n);
            foreach ($followeeStashesIds as $followeeStashId) {
                $stashesIds[] = $followeeStashId;
            }
        }
        return $stashesIds;
    }
    
    /**
     * @return array ologies ids following by user
     */
    public function getUserFollowingOlogiesIds($userId, $offset = 0, $n = -1) {
        $ologiesIds = array();
        $followeesIds = $this->followUserCacheDAO->getUserFolloweesIds($userId, $offset, $n);
        foreach ($followeesIds as $followeeId) {
            $followingOlogiesIds = $this->followUserCacheDAO->getUserFolloweeOlogies($userId, $followeeId, $offset, $n);
            foreach ($followingOlogiesIds as $followingOlogyId) {
                $ologiesIds[] = intval($followingOlogyId);
            }
        }
        return $ologiesIds;
    }
    
    /**
     * @return array followee ologies ids
     */
    public function getUserFolloweeOlogiesIds($followerId, $followeeId, $offset = 0, $n = -1) {
        return $this->followUserCacheDAO->getUserFolloweeOlogies($followerId, $followeeId, $offset, $n);
    }
    
    /**
     * Get user followees
     * @return array User
     */
    public function getUserFollowees($userId, $offset = 0, $n = -1) {
        $followeeArray = array();
        $followeesIds = $this->followUserCacheDAO->getUserFolloweesIds($userId, $offset, $n);
        
        foreach ($followeesIds as $followeeId) {
            $followeeArray[] = $this->userService->getUser($followeeId);
        }
        
        return $followeeArray;
    }
    
    /**
     * Get user followees ids
     * @return array ids User
     */
    public function getUserFolloweesIds($userId, $offset = 0, $n = -1) {
        return $this->followUserCacheDAO->getUserFolloweesIds($userId, $offset, $n);
    }
    
    /**
     * @return int number of followees an user is following
     */
    public function getUserNbFollowees($userId) {
        return $this->followUserCacheDAO->getUserNbFollowees($userId);
    }
    
    /**
     * @return int number of unique followers in stashes and ologies for an user
     */
    public function getUserNbFollowers($userId) {
        return sizeof( $this->getUserFollowers($userId) );
    }
    
    /**
     * Get user followers
     * @return array User
     */
    public function getUserFollowers($userId, $offset = 0, $n = -1) {
        $followers = array();
        $followersIds = array();
        $stashesIds = $this->stashService->getStashesIdsForUser($userId);
        $ologiesIds = $this->membershipService->getOlogiesIdsForUser($userId);
        
        foreach ($stashesIds as $stashId) {
            $stashFollowersIds = $this->followUserCacheDAO->getUserStashFollowersIds($userId, $stashId);
            foreach ($stashFollowersIds as $stashFollowerId) {
                $follower = $this->userService->getUser($stashFollowerId);
                if (!in_array($follower->getId(), $followersIds)){
                    $followers[] = $follower;
                    $followersIds[] = $follower->getId();
                }
            }
        }
        
        foreach ($ologiesIds as $ologyId) {
            $ologyFollowersIds = $this->followUserCacheDAO->getUserOlogyFollowersIds($userId, $ologyId['id']);
            foreach ($ologyFollowersIds as $ologyFollowerId) {
                $follower = $this->userService->getUser($ologyFollowerId);
                if (!in_array($follower->getId(), $followersIds)){
                    $followers[] = $follower;
                    $followersIds[] = $follower->getId();
                }
            }
        }

        return $followers;
    }
    
    public function getUserFollowersIds($userId, $offset = 0, $n = -1) {
        $followersIds = array();
        $stashesIds = $this->stashService->getStashesIdsForUser($userId);
        $ologiesIds = $this->membershipService->getOlogiesIdsForUser($userId);
        
        foreach ($stashesIds as $stashId) {
            $stashFollowersIds = $this->followUserCacheDAO->getUserStashFollowersIds($userId, $stashId);
            foreach ($stashFollowersIds as $stashFollowerId) {
                $follower = $this->userService->getUser($stashFollowerId);
                if (!in_array($follower->getId(), $followersIds)){
                    $followersIds[] = $follower->getId();
                }
            }
        }
        
        foreach ($ologiesIds as $ologyId) {
            $ologyFollowersIds = $this->followUserCacheDAO->getUserOlogyFollowersIds($userId, $ologyId['id']);
            foreach ($ologyFollowersIds as $ologyFollowerId) {
                $follower = $this->userService->getUser($ologyFollowerId);
                if (!in_array($follower->getId(), $followersIds)){
                    $followersIds[] = $follower->getId();
                }
            }
        }

        return $followersIds;
    }
    
    /**
     * @return array User followers for stash
     */
    public function getUserFollowersForStash($userId, $stashId, $offset = 0, $n = -1) {
        $followers = array();
        $followersIds = $this->followUserCacheDAO->getUserStashFollowersIds($userId, $stashId, $offset, $n);
        
        foreach ($followersIds as $followerId) {
            $followers[] = $this->userService->getUser($followerId);
        }
        
        return $followers;
    }
    
    /**
     * @return int number of followers for a given stash id
     */
    public function getNbFollowersForStash($stashId) {
        $stash = $this->stashService->getStash($stashId);
        $followersIds = $this->followUserCacheDAO->getUserStashFollowersIds($stash->getFounder()->getId(), $stashId);
        
        return sizeof($followersIds);
    }
    
    /**
     * Computes which user has the most followers
     * @return array the key is the userId, the value is the number of followers 
     */
    public function getTopUsersFollowers($usersIds, $maxResults) {
        return $this->followUserCacheDAO->getTopUsersFollowers($usersIds, $maxResults);
    }
    
    /**
     * Computes which user has the most followees
     * @return array the key is the userId, the value is the number of followees 
     */
    public function getTopUsersFollowees($usersIds, $maxResults) {
        return $this->followUserCacheDAO->getTopUsersFollowees($usersIds, $maxResults);
    }
    
    /**
     * @return array User followers for ology
     */
    public function getUserFollowersForOlogy($userId, $ologyId, $offset = 0, $n = -1) {
        $followers = array();
        $followersIds = $this->followUserCacheDAO->getUserOlogyFollowersIds($userId, $ologyId, $offset, $n);
        
        foreach ($followersIds as $followerId) {
            $followers[] = $this->userService->getUser($followerId);
        }
        
        return $followers;
    }
    
    /**
     * Check if the user if following followee somewhere (stash or ology)
     * @return boolean
     */
    public function isUserFollowing($userId, $followeeId) {
        return $this->followUserCacheDAO->isFollowing($userId, $followeeId);
    }
    
    /**
     * Check if the user if following followee somewhere (stash or ology)
     * @return array of boolean in the order of given $followeeIds
     */
    public function isUserFollowingUsers($userId, array $followeesIds) {
        $isFollowingArray = array();
        foreach ($followeesIds as $followeeId) {
            $isFollowingArray[] = $this->followUserCacheDAO->isFollowing($userId, $followeeId);
        }
        return $isFollowingArray;
    }
    
    /**
     * Get followee stashes and following ologies, then follow all of it
     */
    public function followEverything($userId, $followeeId) {
        $userStashes = $this->stashService->getStashesIdsForUser($followeeId);
        $userOlogies = $this->membershipService->getOlogiesIdsForUser($followeeId);
        
        foreach ($userStashes as $userStashId) {
            $this->addUserFollowingStash($userId, $followeeId, intval($userStashId));
        }
        
        foreach ($userOlogies as $userOlogyId) {
            $this->addUserFollowingUserOlogy($userId, $followeeId, intval($userOlogyId['id']));
        }
    }
    
    /**
     * Unfollow all stashes & followee ologies.
     * This is just an alias to the update functions.
     */
    public function unfollowEverything($userId, $followeeId) {
        $this->updateUserFollowingUserOlogies($userId, $followeeId, array());
        $this->updateUserFollowingStashes($userId, $followeeId, array());
    }
    
    /**
     * Take all followers from old user and add them to the new user.
     * Then we remove all followers from the old user.
     */
    public function mergeFollowers($userId, $oldUserId) {
        $userStashes = $this->stashService->getStashesIdsForUser($oldUserId);
        $userOlogies = $this->membershipService->getOlogiesIdsForUser($oldUserId);
        
        foreach ($userStashes as $userStashId) {
            $stashFollowers = $this->getUserFollowersForStash($oldUserId, $userStashId);
            foreach ($stashFollowers as $stashFollower) {
                $this->addUserFollowingStash($stashFollower->getId(), $userId, $userStashId);
                $this->removeUserFollowingStash($stashFollower->getId(), $oldUserId, $userStashId);
            }
        }
        
        foreach ($userOlogies as $userOlogyId) {
            $ologyFollowers = $this->getUserFollowersForOlogy($oldUserId, $userOlogyId);
            foreach ($ologyFollowers as $ologyFollower) {
                $this->addUserFollowingUserOlogy($ologyFollower->getId(), $userId, $userOlogyId);
                $this->removeUserFollowingUserOlogy($ologyFollower->getId(), $oldUserId, $userOlogyId);
            }
        }
    }
    
    /**
     * Take all following users ids from old user and add them to the new user.
     * Then we remove all followed users from the old user.
     */
    public function mergeFollowees($userId, $oldUserId) {
        $oldOlogiesFollowees = $this->getUserFolloweesOlogies($oldUserId);
        $oldFollowedStashesIds = $this->getUserFollowingStashesIds($oldUserId);
        
        foreach ($oldOlogiesFollowees as $oldOlogiesFollowee) {
            $followeeId = $oldOlogiesFollowee['followeeId'];
            $ologiesIds = $oldOlogiesFollowee['ologiesIds'];
            foreach ($ologiesIds as $ologyId) {
                $this->addUserFollowingUserOlogy($userId, $followeeId, $ologyId);
                $this->removeUserFollowingUserOlogy($oldUserId, $followeeId, $ologyId);
            }
        }
        
        foreach ($oldFollowedStashesIds as $oldFollowedStashId) {
            $followedUserId = $this->stashService->getUserIdForStash($oldFollowedStashId);
            $this->addUserFollowingStash($userId, $followedUserId, $oldFollowedStashId);
            $this->removeUserFollowingStash($oldUserId, $followedUserId, $oldFollowedStashId);
        }

    }
    
}

?>
