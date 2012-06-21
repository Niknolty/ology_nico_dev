<?php

namespace Ology\SocialBundle\DAO;

/**
 * Description of TagStashDAO
 *
 * @author raphael
 */
use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\TagStash;
use Ology\SocialBundle\Exceptions\DAOException;

class TagStashDAO {

    protected $stashDAO;
    
    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createTagStash($stash, $tag) {
        $tagStashExist = $this->em->getRepository('OlogySocialBundle:TagStash')->findOneBy(array('tag' => $tag->getId(), 'stash' => $stash->getId()));
        if (!empty($tagStashExist))
            return $tagStashExist;
        
        $newTagStash = new TagStash();
        $newTagStash->setStash($stash);
        $newTagStash->setTag($tag);

        $this->em->persist($newTagStash);
        $this->em->flush();

        return $newTagStash;
    }

    /**
     * Return an array of string tags.
     * 
     * @param id $stashId
     * @return array 
     */
    public function getTagsForStash($stashId) {
        $tagsStash = $this->em->getRepository('OlogySocialBundle:TagStash')->findBy(array('stash' => $stashId));
        $tags = array();
        
        foreach ($tagsStash as $tagStash) {
            $tags[] = $tagStash->getTag()->getName();
        }
        
        return $tags;
    }
    
    public function deleteAllTagsForStash($stashId) {
        $tagsStash = $this->em->getRepository('OlogySocialBundle:TagStash')->findBy(array('stash' => $stashId));
        foreach ($tagsStash as $tagStash) {
            $this->em->remove($tagStash);
        }
        $this->em->flush();
    }

    public function deleteTagsStashesForStash($stashId) {
        $query = $this->em->createQuery('DELETE OlogySocialBundle:TagStash ts WHERE ts.stash = ?1');
        $query->setParameter(1, $stashId);
        $result = $query->getResult();
    }
}

?>
