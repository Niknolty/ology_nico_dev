<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\LabelsOlogies;
use Ology\SocialBundle\Exceptions\DAOException;

/**
 * Description of LabelOlogyDAO
 *
 * @author erwan
 */
class LabelOlogyDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createLabelOlogy($labelId, $ologyId, $userId) {
        
        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $label = $this->em->getReference('OlogySocialBundle:Label', $labelId);
        
        $labelology = new LabelsOlogies();
        $labelology->setLabel($label);
        $labelology->setOlogy($ology);
        $labelology->setTaggedBy($user);
        $labelology->setTimesTagged(1);

        $this->em->persist($labelology);
        $this->em->flush();

        return $labelology;
    }

    public function updateLabelOlogy($labelId, $ologyId, $userId, $timesTagged) {
        
        $labelology = $this->em->getRepository('OlogySocialBundle:LabelsOlogies')
                ->findOneBy(array ('label' => $labelId, 'ology' => $ologyId));
        
        if (!$labelology)
        {
            throw new DAOException('No labelologyfound for the user id ' . $labelology);            
        }
        
        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        
        $labelology->setTaggedBy($user);
        $labelology->setTimesTagged($timesTagged);
        
        $this->em->persist($labelology);
        $this->em->flush();
        
        return $labelology;
    }

    public function getLabelOlogy($labelId, $ologyId) {
        $labelology = $this->em->getRepository('OlogySocialBundle:LabelsOlogies')
                ->findOneBy(array ('label' => $labelId, 'ology' => $ologyId));

        return $labelology;
    }

    public function deleteLabelOlogy($labelId, $ologyId) {
        $labelology = $this->em->getRepository('OlogySocialBundle:LabelsOlogies')
                ->findOneBy(array ('label' => $labelId, 'ology' => $ologyId));

        if (!$labelology) {
            return false;
        }

        $this->em->remove($labelology);
        $this->em->flush();

        return true;
    }
    
    public function getOlogiesForLabels($labelId) {
        $ologies = $this->em->getRepository('OlogySocialBundle:LabelsOlogies')
                ->findBy(array ('label' => $labelId));
        
        return $ologies;
    }
    
    public function getLabelsForOlogy($ologyId) {
        $labels = $this->em->getRepository('OlogySocialBundle:LabelsOlogies')
                ->findBy(array ( 'ology' => $ologyId));        
        
        return $labels;
    }
    
    public function deleteLabelOlogyForOlogy($ologyId) {
        $query = $this->em->createQuery('DELETE Ology\SocialBundle\Entity\LabelsOlogies u WHERE u.ology = ?1');
        $query->setParameter(1, $ologyId);
        $result = $query->getResult();
    }
    
    public function incTimesTagged($labelId, $ologyId, $userId) {
        $lo = $this->em->getRepository('OlogySocialBundle:LabelsOlogies')
                ->findOneBy(array ('label' => $labelId, 'ology' => $ologyId));
        
        if (!$lo) {
            throw new DAOException('No labelologyfound for id ' . $id);            
        }
        
        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        $lo->setTaggedBy($user);
        $lo->setTaggedAt(new \DateTime('now'));
        $lo->incTimesTagged();
        $this->em->persist($lo);
        $this->em->flush();
    }
}

?>
