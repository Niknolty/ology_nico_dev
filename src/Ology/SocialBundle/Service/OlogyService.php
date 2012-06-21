<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\OlogyDAO;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Exceptions\NotYetCodedException;
use Ology\SocialBundle\Service\LabelOlogyService;
use Ology\SocialBundle\Service\MembershipService;
use Ology\SocialBundle\Service\NotificationService;
use Ology\SocialBundle\Service\PostService;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class OlogyService {

    protected $ologyDAO;
    protected $membershipService;
    protected $postService;
    protected $labelOlogyService;
    protected $notificationService;
    protected $cacheDAO;

    function __construct(OlogyDAO $dao, MembershipService $membershipService, PostService $postService, LabelOlogyService $labelOlogyService, CacheDAO $cacheDAO) {
        $this->ologyDAO = $dao;
        $this->membershipService = $membershipService;
        $this->postService = $postService;
        $this->labelOlogyService = $labelOlogyService;
        $this->cacheDAO = $cacheDAO;
    }

    public function setNotificationService(NotificationService $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function createOlogy($founderId, $name, $desc, $labelName, UploadedFile $image = NULL, $visible, $readOnly) {
        if ($image != NULL) {
            $allowed = array('image/jpeg', 'image/gif', 'image/png');
            if (!\in_array($image->getClientMimeType(), $allowed))
                throw new \Exception("Invalid image file in createOlogy Service", 200);
        }
        $ology = $this->ologyDAO->createOlogy($founderId, $name, $desc, $image, $visible, $readOnly);
        $this->tagOlogy($labelName, $ology->getId(), $founderId);
        $this->membershipService->joinOlogy($founderId, $ology->getId(), true);

        return $ology;
    }

    public function updateOlogy($ologyId, $editorId, $name, $description, $labelName, UploadedFile $image = NULL, $visible, $readOnly) {
        if ($image != NULL) {
            $allowed = array('image/jpeg', 'image/gif', 'image/png');
            if (!\in_array($image->getClientMimeType(), $allowed))
                throw new \Exception("Invalid image file in updateOlogy Service", 200);
        }
        
        $newology = $this->ologyDAO->updateOlogy($ologyId, $name, $description, $image, $visible, $readOnly);
        $this->labelOlogyService->deleteLabelOlogyForOlogy($ologyId);
        $this->tagOlogy($labelName, $ologyId, $editorId);

        return $newology;
    }

    public function deleteOlogy($ologyId) {
        $users = $this->membershipService->getUsersForOlogy($ologyId);
        foreach ($users as $user) {
            $this->notificationService->setIsNotifInvalid($user->getId(), true);
        }

        // delete label
        $this->labelOlogyService->deleteLabelOlogyForOlogy($ologyId);
        // delete membership
        $this->membershipService->deleteMembershipsForOlogy($ologyId);
        // deletepostnotification
        $this->notificationService->deleteNotificationForOlogy($ologyId);
        // delete postologies
        $this->postService->deletePostsForOlogy($ologyId);

        $result = $this->ologyDAO->deleteOlogy($ologyId);
        return $result;
    }

    public function getOlogy($ologyId) {
        $ology = $this->ologyDAO->getOlogy($ologyId);
        return $ology;
    }

    public function getOlogies() {
        $ologies = $this->ologyDAO->getOlogies();
        return $ologies;
    }

    public function multiTagOlogy($labels, $ologyId, $userId) {
        foreach ($labels as $label) {
            $this->labelOlogyService->createLabelOlogyWithLabelName($label, $ologyId, $userId);
        }
    }

    public function tagOlogy($labelName, $ologyId, $userId) {
        $label = $this->labelOlogyService->createLabelOlogyWithLabelName($labelName, $ologyId, $userId);
        return $label;
    }

    public function getMostRecent($pageOffset, $n) {
        $offset = $pageOffset * $n;
        return $this->ologyDAO->getMostRecent($offset, $n);
    }

    public function getByFounder($founderId, $n = -1) {
        return $this->ologyDAO->getByFounder($founderId, $n);
    }
    
    public function getOlogiesIdsForUser($founderId, $n = -1) {
        return $this->ologyDAO->getOlogiesIdsForUser($founderId, $n);
    }

    public function getMostRecentByLabels($arrayLabels, $offset, $n) {
        return $this->ologyDAO->getMostRecentByLabels($arrayLabels, $offset, $n);
    }
    
    public function getMostRecentByInterests($interests, $offset, $number) {
        return $this->ologyDAO->getMostRecentByInterests($interests, $offset, $number);
    }

    public function getMostUsers($n) {
        return $this->ologyDAO->getMostOlogist($n);
    }

    public function checkOlogyName($name) {
        // @TODO Suggest ologies with similar names when creating an ology
        throw new NotYetCodedException();
    }

    public function getFounder($ologyId) {
        return $this->ologyDAO->getFounder($ologyId);
    }

    public function getFeaturedOlogies() {
        return $this->ologyDAO->getFeaturedOlogies();
    }
    
    public function setFeaturedOlogies($ologyIdsArray) {
        return $this->ologyDAO->setFeaturedOlogies(array_filter($ologyIdsArray, "is_numeric"));
    }

    public function getBlacklistedOlogies() {
        return $this->ologyDAO->getBlacklistedOlogies();
    }
    
    public function setBlacklistedOlogies($ologyIdsArray) {
        return $this->ologyDAO->setBlacklistedOlogies($ologyIdsArray);
    }
    
    public function isAuthorizedToEditOrDelete(User $user, $ologyId) {
        $roles = $user->getRoles();
        if (in_array('ROLE_SUPER_ADMIN', $roles, true))
            return true;

        $founder = $this->ologyDAO->getOlogy($ologyId)->getFounder()->getId();
        if ($founder == $user->getId())
            return true;

        return false;
    }

    public function getStats($ologyId) {
        return $this->cacheDAO->cache_getOlogyStats($ologyId);
    }

    public function resizeAction($file) {
        $this->ologyDAO->resizeAction($file);
    }
    
    public function getOlogiesByPrefix($prefix) {
        return $this->ologyDAO->getOlogiesByPrefix($prefix);
    }
    
    public function getOlogiesForSitemap() {
        return $this->ologyDAO->getOlogiesForSitemap();
    }
    
    public function getOlogiesById($arrayId) {
        return $this->ologyDAO->getOlogiesById($arrayId);
    }
    
    public function getTopOlogistList($ologyId){
        return $this->ologyDAO->getTopOlogistList($ologyId);
    }
    
    public function isTheOwnerOfOlogy($userId, $ologyId) {
        $ology = $this->getOlogy($ologyId);
        return $ology->getFounder()->getId() == $userId;
    }
}