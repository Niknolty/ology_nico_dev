<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\LabelOlogy;
use Ology\SocialBundle\DAO\LabelOlogyDAO;
use Ology\SocialBundle\DAO\LabelDAO;

/**
 * Description of LabelOlogyService
 *
 * @author babour
 */
class LabelOlogyService {

    protected $labelologyDAO;
    protected $labelDAO;

    function __construct(LabelOlogyDAO $dao, LabelDAO $labelDAO) {
        $this->labelologyDAO = $dao;
        $this->labelDAO = $labelDAO;
    }

    public function createLabelOlogy($labelId, $ologyId, $userId) {
        $labelology = $this->labelologyDAO->createLabelOlogy($labelId, $ologyId, $userId);
        return $labelology;
    }

    public function getLabelOlogy($labelId, $ologyId) {
        $labelology = $this->labelologyDAO->getLabelOlogy($labelId, $ologyId);
        return $labelology;
    }

    public function updateLabelOlogy($labelId, $ologyId, $userId, $timesTagged) {
        $labelology = $this->labelologyDAO->updateLabelOlogy($labelId, $ologyId, $userId, $timesTagged);
        return $labelology;
    }

    public function deleteLabelOlogy($labelId, $ologyId) {
        $result = $this->labelologyDAO->deleteLabelOlogy($labelId, $ologyId);
        return $result;
    }

    public function deleteLabelOlogyForOlogy($ologyId) {
        $this->labelologyDAO->deleteLabelOlogyForOlogy($ologyId);
    }

    public function createLabelOlogyWithLabelName($label, $ologyId, $userId) {
        $label = strtolower($label);
        $newLabel = $this->labelDAO->getLabelByName($label);
        if (!$newLabel) {
            $newLabel = $this->labelDAO->createLabel($label);
        }
        
        $labelOlogy = $this->labelologyDAO->getLabelOlogy($newLabel->getId(), $ologyId);
        if ($labelOlogy) {
            $this->labelologyDAO->incTimesTagged($newLabel->getId(), $ologyId, $userId);
        } else {
            $this->labelologyDAO->createLabelOlogy($newLabel->getId(), $ologyId, $userId);
        }
        return $newLabel;
    }

    public function getAllLabels() {
        return $this->labelDAO->getAllLabels();
    }

}

?>
