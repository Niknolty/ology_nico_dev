<?php

namespace Ology\SocialBundle\DAO;

/**
 * Description of TagDAO
 *
 * @author raphael
 */
use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Tag;
use Ology\SocialBundle\Exceptions\DAOException;

class TagDAO {

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * Create tag if it doesnt already exists.
     * 
     * @param string $tag
     * @return \Ology\SocialBundle\Entity\Tag 
     */
    public function createTag($tag) {
        $tagExist = $this->em->getRepository('OlogySocialBundle:Tag')->findOneBy(array('name' => $tag));
        if (!empty($tagExist))
            return $tagExist;
        
        $newTag = new Tag();
        $newTag->setName($tag);

        $this->em->persist($newTag);
        $this->em->flush();

        return $newTag;
    }

    /**
     * Return all tags
     * 
     * @return array 
     */
    public function getAllTags() {
        return $this->em->getRepository('OlogySocialBundle:Tag')->findAll();
    }
    
    /*
     * TODO This is dirty, waiting to implement the new cache system!
     */
    public function getTagsByPrefix($prefix) {
        $q = $this->em->getRepository('OlogySocialBundle:Tag')->findAll();

        foreach ($q as $tag) {
            $tags[] = $tag->getName();
        }
        
        $tagsPrefixed = preg_grep("/.*".$prefix.".*/", $tags);
        
        return $tagsPrefixed;
    }

}

?>
