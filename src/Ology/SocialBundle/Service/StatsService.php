<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\DAO\StatsDAO;

class StatsService {
    protected $statsDAO;
    protected $stashService;
    protected $followService;
    protected $userService;
    
    function __construct(StatsDAO $statsDAO, StashService $stashService, FollowService $followService, UserService $userService) {
        $this->statsDAO = $statsDAO;
        $this->stashService = $stashService;
        $this->followService = $followService;
        $this->userService = $userService;
    }
    
    public function getGeneralStats() {
        return $this->statsDAO->getGeneralStats();
    }
    
    public function getAllInviteStats() {
        $total = $this->statsDAO->getInviteStatsPerOlogy();
        $perUser = $this->statsDAO->getInviteStatsPerUser(30);
        
        return array('total' => $total, 'perUser' => $perUser);
    }
    
    public function getPostsStats() {
        return $this->statsDAO->getPostsStats();
    }
    
    public function getCommentsStats() {
        return $this->statsDAO->getCommentsStats();
    }
    
    public function getLabelsStats() {
        return $this->statsDAO->getLabelsStats();
    }
    
    public function getNotifsStats() {
        return $this->statsDAO->getNotifsStats();
    }
    
    public function getUsersStats($n) {
        return $this->statsDAO->getUsersStats($n);
    }
    
    public function getAllUsersStats($n) {
        return $this->statsDAO->getAllUsersStats($n);
    }
    
    public function getPostsStatsForOlogy($ologyId) {
        return $this->statsDAO->getPostsStatsForOlogy($ologyId);
    }
    
    public function getAverageCommentsNbForOlogy($ologyId) {
        return $this->statsDAO->getAverageCommentsNbForOlogy($ologyId);
    }
    
    public function getOlogiesStats($n, $withOlogies = false) {
        return $this->statsDAO->getOlogiesStats($n, $withOlogies);
    }
    
    public function getTopUsersFollowers(array $usersIds, $maxResult = 15) {
        $users = array();
        $index = $this->followService->getTopUsersFollowers($usersIds, $maxResult);
        
        foreach ($index as $key => $value) {
            if ($value > 0) {
                $users[] = array('id' => $usersIds[$key],
                                'name' => $this->userService->getUser($usersIds[$key])->getFirstName(),
                                'nbFollowers' => $value);
            }
        }
        
        return $users;
    }
    
    public function getTopUsersFollowees(array $usersIds, $maxResult = 15) {
        $users = array();
        $index = $this->followService->getTopUsersFollowees($usersIds, $maxResult);
        
        foreach ($index as $key => $value) {
            if ($value > 0) {
                $users[] = array('id' => $usersIds[$key],
                                'name' => $this->userService->getUser($usersIds[$key])->getFirstName(),
                                'nbFollowees' => $value);
            }
        }
        
        return $users;
    }
    
    public function getTopStashesIds($maxResult = 15) {
        $topStashes = array();
        $stashIds = $this->stashService->getAllStashesIds();
        foreach ($stashIds as $stashId) {
            $stash = $this->stashService->getStash($stashId);
            $topStashes[] = array('id' => $stashId,
                                  'name' => $stash->getName(),
                                  'nbFollowers' => $this->followService->getNbFollowersForStash($stashId));
        }
        usort($topStashes, function ($a, $b) {
            return ($a['nbFollowers'] < $b['nbFollowers']);
        });
        return array_slice($topStashes, 0, $maxResult);
    }
    
    public function getNbTotalFollowees(array $usersIds) {
        $followeesIds = array();
        foreach ($usersIds as $userId) {
            $userFolloweesIds = $this->followService->getUserFolloweesIds($userId);
            $followeesIds = array_merge($followeesIds, $userFolloweesIds);
        }
        return sizeof( array_unique($followeesIds) );
    }
    
    public function getNbTotalFollowers(array $usersIds) {
        $followersIds = array();
        foreach ($usersIds as $userId) {
            $userFollowersIds = $this->followService->getUserFollowersIds($userId);
            $followersIds = array_merge($followersIds, $userFollowersIds);
        }
        return sizeof( array_unique($followersIds) );
    }
    
}

?>
