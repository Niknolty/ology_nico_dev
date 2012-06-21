<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\PostType;

/**
 * Description of PostType
 *
 * @author erwan
 */
class PostTypeDAO {
  protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createPostType($name) {

        $postType = new PostType();
        $postType->setName($name);

        $this->em->persist($postType);
        $this->em->flush();

        return $postType;
    }

    public function updatePostType($postTypeId, $name) {
        
        $postType = $this->em->getRepository('OlogySocialBundle:PostType')
                ->find($postTypeId);
        
        if (!$postType)
        {
            throw new DAOException('No post type found for id ' . $postTypeId);            
        }
        
        $postType->setName($name);
        
        $this->em->flush();
        
        return $postType;
    }

    public function getPostType($postTypeId) {
        
        $postType = $this->em->getRepository('OlogySocialBundle:PostType')
                ->find($postTypeId);

        if (!$postType) {
            throw new DAOException('No post type found for id ' . $posttypeId);
        }

        return $postType;
    }

    public function deletePostType($postTypeId) {

        $postType = $this->em->getRepository('OlogySocialBundle:PostType')
                ->find($postTypeId);

        if (!$postType) {
            return false;
        }

        $this->em->remove($postType);
        $this->em->flush();

        return true;
    }

}

?>
