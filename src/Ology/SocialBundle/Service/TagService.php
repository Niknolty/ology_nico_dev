<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\DAO\TagDAO;
use Ology\SocialBundle\DAO\TagStashDAO;

/**
 * Description of TagService
 *
 * @author raphael
 */
class TagService {

    protected $tagDAO;
    protected $tagStashDAO;
    
    function __construct(TagDAO $dao, TagStashDAO $tagStashDAO) {
        $this->tagDAO = $dao;
        $this->tagStashDAO = $tagStashDAO;
    }

    public function createTag($tag) {
        return $this->tagDAO->createTag($tag);
    }
    
    /**
     * Create tags from the given array
     * @param Array $tagArray 
     */
    public function createTags($tagArray) {
        foreach ($tagArray as $tag) {
            $this->tagDAO->createTag($tag);
        }
    }
    
    public function createTagStash($stashId, $tagname) {
        $tag = $this->createTag($tagname);
        $this->tagStashDAO->createTagStash($stashId, $tag);
    }
    
    public function updateTagStash($stash, $newTags) {
        $this->tagStashDAO->deleteAllTagsForStash($stash->getId());
        foreach ($newTags as $tagName) {
            $tag = $this->createTag($tagName);
            $this->tagStashDAO->createTagStash($stash, $tag);
        }
    }
    
    public function getTagsForStash($stashId) {
        return $this->tagStashDAO->getTagsForStash($stashId);
    }
    
    public function getAllTags() {
        return $this->tagDAO->getAllTags();
    }
    
    public function getTagsByPrefix($prefix) {
        return $this->tagDAO->getTagsByPrefix($prefix);
    }

}

?>
