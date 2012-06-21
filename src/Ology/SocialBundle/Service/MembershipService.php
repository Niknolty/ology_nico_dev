<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Membership;
use Ology\SocialBundle\Entity\MembershipType;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Exceptions\ServiceException;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\MembershipDAO;
use Ology\SocialBundle\DAO\UserDAO;
use Ology\SocialBundle\DAO\OlogyDAO;
use Ology\SocialBundle\DAO\StatsDAO;

class MembershipService {
    protected $notificationService;
    protected $mailService;
    protected $membershipDAO;
    protected $userDAO;
    protected $ologyDAO;
    protected $cacheDAO;
    protected $statsDAO;

    function __construct(membershipDAO $dao, CacheDAO $cacheDAO, EMailService $mailService, UserDAO $userDAO, OlogyDAO $ologyDAO, StatsDAO $statsDAO) {
        $this->membershipDAO = $dao;
        $this->mailService = $mailService;
        $this->cacheDAO = $cacheDAO;
        $this->userDAO = $userDAO;
        $this->ologyDAO = $ologyDAO;
        $this->statsDAO = $statsDAO;
    }
    
    public function setNotificationService(NotificationService $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function joinOlogy($userId, $ologyId, $founder = false) {
        $this->setIsMembershipInvalid($userId, true);
        $membership = $this->membershipDAO->getMembershipByUserAndOlogy($userId, $ologyId);
        if ($membership == NULL) {
            $this->membershipDAO->createMembership($userId, $ologyId, MembershipType::BASIC);
            if (!$founder) {
                $notif = $this->notificationService->notifJoinOlogy($ologyId, $userId);
                $this->mailService->emailNotification($notif);
            }
            return $ologyId;
        }
        return -1;
    }
    
    public function leaveOlogy($userId, $ologyId) {
        $this->setIsMembershipInvalid($userId, true);
        $membership = $this->membershipDAO->getMembershipByUserAndOlogy($userId, $ologyId);
        if ($membership == NULL)
            throw new ServiceException("MembershipService: User $userId is not a member of ology $ologyId");
        
        return $this->membershipDAO->deleteMembership($membership->getId());
    }
    
    public function suggestOlogiesUsingInterests($userId, $n) {
        $interests = $this->userDAO->getInterests($userId);
        shuffle($interests);
        
        $ologies = array();
        $ids = array();
        foreach ($interests as $interest) {
            $ology = $this->ologyDAO->getByName($interest->getName());
            if ($ology == NULL || $this->isMemberOfOlogy($userId, $ology->getId()))
                continue;
            if ($n-- == 0)
                break;
            if ($ology != NULL && !(in_array($ology->getId(), $ids))) {
                $ologies[] = $ology;
                $ids[] = $ology->getId();
            }
        }
        
        return $ologies;
    }
    
    /**
     * This function is not used anymore.
     * It was before the new on boarding process.
     * We dont force the user to join ologies by default anymore.
     */
    public function autoJoinOlogies($userId) {
        $fbOlogies = array();
        $top3Ologies = array();
        $topOlogies = array();
        $relatedOlogies = array();
        
        $user = $this->userDAO->getUser($userId);
        
        // Auto join ologies in TOP3
        if (($user->getTop1() != NULL) && ($user->getTop1() != NULL) && ($user->getTop1() != NULL)) {
            $top3Ologies = $this->autoJoinOlogiesByTop3($user);
        }
        
        $ologies = $this->getOlogiesForUser($user->getId());
        $nbOlogies = count($ologies);
        
        // Auto join facebook likes
        if ($user->getFbId()) {
            $ologies = $this->suggestOlogiesUsingInterests($userId, 5);
            foreach ($ologies as $ology) {
                $this->joinOlogy($userId, $ology->getId());
                $fbOlogies[] = $ology->getId();
            }
        } else {
            if ($nbOlogies == 0) {
                $topOlogies = $this->autoJoinTopOlogies($user);
            }
            if ($nbOlogies == 1) {
                $relatedOlogies = $this->autoJoinOlogiesByCurrentOlogiesLabels($user);
            }
        }
        
        $autoJoinedOlogies = array_merge($fbOlogies, $top3Ologies, $topOlogies, $relatedOlogies);
        return $autoJoinedOlogies;
    }
    
    private function autoJoinOlogiesByTop3($user) {
        $res = array();
        if ($user->getTop1() != NULL && $user->getTop1() != "") {
            $ology1 = $this->ologyDAO->getByName($user->getTop1());
            if ($ology1 != NULL) {
                if ($this->joinOlogy($user->getId(), $ology1->getId()) != -1)
                    $res[] = $ology1->getId();
            }
        }

        if ($user->getTop2() != NULL && $user->getTop2() != "") {
            $ology2 = $this->ologyDAO->getByName($user->getTop2());
            if ($ology2 != NULL) {
                if ($this->joinOlogy($user->getId(), $ology2->getId()) != -1)
                    $res[] = $ology2->getId();
            }
        }

        if ($user->getTop3() != NULL && $user->getTop3() != "") {
            $ology3 = $this->ologyDAO->getByName($user->getTop3());
            if ($ology3 != NULL) {
                if ($this->joinOlogy($user->getId(), $ology3->getId()) != -1)
                    $res[] = $ology3->getId();
            }
        }
        return $res;
    }
    
    private function autoJoinOlogiesByCurrentOlogiesLabels($user) {
        $ids = array();
        $userOlogies = $this->getOlogiesForUser($user->getId(), 5);
        $nbJoined = 0;
        foreach ($userOlogies as $userOlogy) {
            if ($nbJoined >= 3)
                break;
            $ologyLabels = $userOlogy->getOlogylabels();
            $suggestedOlogies = $this->statsDAO->getOlogiesWithMostPostsByLabel($ologyLabels[0]->getLabel(), 3);
            foreach ($suggestedOlogies as $suggestedOlogy) {
                if ($nbJoined >= 3)
                    break;
                if ($this->joinOlogy($user->getId(), $suggestedOlogy->getId()) != -1) {
                    $nbJoined++;
                    $ids[] = $suggestedOlogy->getId();
                }
            }
        }
        return $ids;
    }
    
    private function autoJoinTopOlogies($user) {
        $ids = array();
        $topOlogiesIds = $this->cacheDAO->cache_getTopOlogies();
        foreach ($topOlogiesIds as $topOlogyId) {
            if ($this->joinOlogy($user->getId(), $topOlogyId) != -1)
                $ids[] = $topOlogyId;
        }
        
        return $ids;
    }

    public function isMembershipsInvalid($userId) {
        return $this->cacheDAO->cache_user_get_invalidate_memberships($userId);
    }
    
    public function setIsMembershipInvalid($userId, $bool) {
        $this->cacheDAO->cache_user_set_invalidate_memberships($userId, $bool);
    }
    
    public function updateMembership($membershipId, $ologyId, $membershipTypeId) {
        $membership = $this->membershipDAO->updateMembership($membershipId, $ologyId, $membershipTypeId);
        return $membership;
    }

    public function getMembershipById($membershipId) {
        $membership = $this->membershipDAO->getMembership($membershipId);
        return $membership;
    }

    public function deleteMembershipById($membershipId) {
        $result = $this->membershipDAO->deleteMembership($membershipId);
        return $result;
    }

    public function getUsersForOlogy($ologyId, $n = NULL, $withPictureOnly = false) {
        $users = $this->membershipDAO->getUsersForOlogy($ologyId, $n, $withPictureOnly);
        return $users;
    }

    public function getOlogiesForUser($userId, $n = NULL) {
        $ologies = $this->membershipDAO->getOlogiesForUser($userId, $n);
        return $ologies;
    }
    
    public function getOlogiesIdsForUser($userId, $n = NULL) {
        $ologiesIds = $this->membershipDAO->getOlogiesIdsForUser($userId, $n);
        return $ologiesIds;
    }

    public function isMemberOfOlogy($userId, $ologyId) {
        return $this->membershipDAO->isMemberOfOlogy($userId, $ologyId);
    }

    public function isAuthorizedToEditOrDelete(User $user, $membershipId) {
        $roles = $user->getRoles();
        If ($roles == 'ROLE_SUPER_ADMIN')
            return true;

        $founder = $this->membershipDAO->getMembership($membershipId)->getUser()->getId();
        if ($founder == $user->getId())
            return true;

        return false;
    }
    
    public function deleteMembershipsForOlogy($ologyId) {
        $this->membershipDAO->deleteMembershipsForOlogy($ologyId);
    }
    
    /**
     * Used to store in session info to display ologies.
     * Return ology's name slug id creation date and imageUrl only.
     */
    public function getOlogiesInfosForUser($userId, $n = NULL) {
        $ologiesInfos = $this->membershipDAO->getMembershipOlogiesInfosByUser($userId, $n);
        
        return $ologiesInfos;
    }
    
}

?>
