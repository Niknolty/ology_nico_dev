<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Label;

/**
 * Description of LabelOlogyDAO
 *
 * @author erwan
 */
class LabelDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createLabel($name) {

        $label = new Label();
        $label->setName($name);

        $this->em->persist($label);
        $this->em->flush();

        return $label;
    }

    public function updateLabel($labelId, $name) {
        
        $label = $this->em->getRepository('OlogySocialBundle:Label')
                ->find($labelId);
        
        if (!$label)
        {
            throw new DAOException('No label found for id ' . $labelId);            
        }
        
        $label->setName($name);
        
        $this->em->flush();
        
        return $label;
    }

    public function getLabel($labelId) {
        
        $label = $this->em->getRepository('OlogySocialBundle:Label')
                ->find($labelId);

        if (!$label) {
            throw new DAOException('No label found for id ' . $labelId);
        }

        return $label;
    }

    public function deleteLabel($labelId) {

        $label = $this->em->getRepository('OlogySocialBundle:Label')
                ->find($labelId);

        if (!$label) {
            return false;
        }

        $this->em->remove($label);
        $this->em->flush();

        return true;
    }
    

    public function getLabelByName($name)
    {
        $label = $this->em->getRepository('OlogySocialBundle:Label')
                ->findOneBy(array ('name' => $name));
        
        return $label;
    }

    public function getAllLabels() {
        $query = $this->em->createQueryBuilder()
                    ->add('select', 'l')
                    ->from('OlogySocialBundle:Label', 'l')
                    ->getQuery();
        
        return $query->getResult();
    }
}

?>
