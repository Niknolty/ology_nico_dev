<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\MergeAccountDAO;

class MergeService {

    protected $em;
    protected $mergeAccountDAO;
    protected $userService;
    protected $cacheService;
    protected $followService;

    function __construct(EntityManager $em, UserService $userService, CacheService $cacheService, FollowService $followService, MergeAccountDAO $mergeAccountDAO) {
        $this->em = $em;
        $this->userService = $userService;
        $this->mergeAccountDAO = $mergeAccountDAO;
        $this->cacheService = $cacheService;
        $this->followService = $followService;
    }

    public function mergeAccounts($userId, $oldUserId) {
        $user = $this->userService->getUser($userId);
        $oldUser = $this->userService->getUser($oldUserId);
        
        $rowUpdated = 0;
        $rowUpdated += $this->mergeAccountDAO->updateChannels($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateComments($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateInboxes($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateInterests($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateInvites($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateLabelsOlogies($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateLikes($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateMemberships($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateMessages($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateNotifications($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateOlogies($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updatePosts($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updatePostsChannels($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updatePostsOlogies($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateStashes($user, $oldUser);
        $rowUpdated += $this->mergeAccountDAO->updateSubscriptions($user, $oldUser);
        
        $this->userService->disableUser($oldUserId);
        $this->cacheService->cachePostsOlogies($userId);
        $this->cacheService->cachePostsChannels(0, 0, $userId);
        $this->cacheService->cachePostsStashes($userId);
        
        // Moves followers and followees
        $this->followService->mergeFollowers($userId, $oldUserId);
        $this->followService->mergeFollowees($userId, $oldUserId);
        
        return $rowUpdated;
    }

}

?>
