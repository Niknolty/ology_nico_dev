<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\DAO\PostsStashesDAO;
use Ology\SocialBundle\DAO\StashDAO;
use Ology\SocialBundle\DAO\TagStashDAO;
use Ology\SocialBundle\Service\TagService;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Stash;

/**
 * Description of StashService
 *
 * @author raphael
 */
class StashService {
    protected $stashDAO;
    protected $postStashesDAO;
    protected $tagService;
    
    function __construct(StashDAO $dao, PostsStashesDAO $postStashesDAO, TagStashDAO $tagStashDAO, TagService $tagService) {
        $this->stashDAO = $dao;
        $this->postStashesDAO = $postStashesDAO;
        $this->tagStashDAO = $tagStashDAO;
        $this->tagService = $tagService;
    }

    /**
     * Create a stash then create tags linked to this stash.
     * 
     * @param int $founderId
     * @param string $name
     * @param array $tagsStashes
     * @return Stash 
     */
    public function createStash($founderId, $name, $tagsStashes) {
        $stash = $this->stashDAO->createStash($founderId, $name);
        foreach ($tagsStashes as $tagname) {
            $this->tagService->createTagStash($stash, $tagname);
        }
        return $stash;
    }
    
    public function getStash($id) {
        return $this->stashDAO->getStash($id);
    }
    
    public function getRecentStashesForUser($userId, $nbStashes, $nbPostsPerStash) {
        $stashes = $this->stashDAO->getRecentStashesForUser($userId, $nbStashes);
        foreach ($stashes as $stash) {
            $posts = $this->postStashesDAO->getPostsForStash($stash->getId(), 0, 4);
            $stash->setPosts($posts);
        }
        
        return $stashes;
    }
    
    public function getStashesForUser($userId) {
        return $stashes = $this->stashDAO->getRecentStashesForUser($userId, 0);
    }
    
    public function getStashesIdsForUser($userId, $offset = 0, $n = -1) {
        return $this->stashDAO->getStashesIdsForUser($userId, $offset = 0, $n = -1);
    }
    
    public function editStash(User $user, Stash $stash, $newTags) {
        if ($this->isAuthorizedToEditOrDelete($user, $stash)) {
            $this->stashDAO->editStash($stash->getId());
            $this->tagService->updateTagStash($stash, $newTags);
        }
    }
    
    public function isAuthorizedToEditOrDelete(User $user, $stash) {
        $roles = $user->getRoles();
        if (in_array('ROLE_SUPER_ADMIN', $roles, true))
            return true;

        $founder = $stash->getFounder()->getId();
        if ($founder == $user->getId())
            return true;

        return false;
    }
    
    public function unStash(User $user, $stashId, $postId) {
        $stash = $this->getStash($stashId);
        if (!$this->isAuthorizedToEditOrDelete($user, $stash))
            return false;
        
        $this->postStashesDAO->deletePostsStashes($stashId, $postId);
        return true;
    }
    
    public function deleteStash(User $user, $stashId) {
        $stash = $this->getStash($stashId);
        if (!$this->isAuthorizedToEditOrDelete($user, $stash))
            return false;

        $this->postStashesDAO->deletePostsStashesForStash($stashId);
        $this->tagStashDAO->deleteTagsStashesForStash($stashId);
        $this->stashDAO->deleteStash($stashId);
        
        return true;
    }
    
    public function isTheOwnerOfStash($userId, $stashId) {
        $stash = $this->getStash($stashId);
        return $stash->getFounder()->getId() == $userId;
    }
    
    public function getAllStashesIds() {
        return $this->stashDAO->getAllStashesIds();
    }
    
    public function getUserIdForStash($stashId) {
        $stash = $this->getStash($stashId);
        return $stash->getFounder()->getId();
    }
    
}

?>
