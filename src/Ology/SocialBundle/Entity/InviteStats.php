<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class InviteStats {
    protected $nbTotal;
    protected $nbAccepted;
    protected $nbPending;
    
    // array(ologyID => array(accepted => xxx, pending => yyy))
    protected $arrayNbInvites;
    protected $ologies;
    
    function __construct() {
        $this->ologies = array();
        $this->arrayNbInvites = array();
        
        $this->nbTotal = 0;
        $this->nbAccepted = 0;
        $this->nbPending = 0;
    }
    
    public function incNbInvites($ologyId, $n, $isAccepted) {
        if (!array_key_exists($ologyId, $this->arrayNbInvites)) {
            $this->arrayNbInvites[$ologyId] = array();
            $this->arrayNbInvites[$ologyId]['accepted'] = 0;
            $this->arrayNbInvites[$ologyId]['pending'] = 0;
            $this->arrayNbInvites[$ologyId]['total'] = 0;
        }
        
        if ($isAccepted)
            $this->arrayNbInvites[$ologyId]['accepted'] += $n;
        else
            $this->arrayNbInvites[$ologyId]['pending'] += $n;
        $this->arrayNbInvites[$ologyId]['total'] += 1;
    }
    
    public function getNbTotal() {
        return $this->nbTotal;
    }
    
    public function setNbTotal($nbTotal) {
        $this->nbTotal = $nbTotal;
    }
    
    public function incNbTotal($n) {
        $this->nbTotal += $n;
    }
    
    public function incNbAccepted($n) {
        $this->nbAccepted += $n;
    }
    
    public function incNbPending($n) {
        $this->nbPending += $n;
    }
    
    public function getNbAccepted() {
        return $this->nbAccepted;
    }
    
    public function setNbAccepted($nbAccepted) {
        $this->nbAccepted = $nbAccepted;
    }
    
    public function getNbPending() {
        return $this->nbPending;
    }
    
    public function setNbPending($nbPending) {
        $this->nbPending = $nbPending;
    }
    
    public function setArrayNbInvites($arrayNbInvites)
    {
        $this->arrayNbInvites = $arrayNbInvites;
    }

    public function getArrayNbInvites()
    {
        return $this->arrayNbInvites;
    }
    
    public function addOlogy($ology)
    {
        if (!array_key_exists($ology->getId(), $this->ologies))
            $this->ologies[$ology->getId()] = $ology;
    }

    public function getOlogies()
    {
        return $this->ologies;
    }
}