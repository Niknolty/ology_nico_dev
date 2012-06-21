<?php

namespace Ology\SocialBundle\Entity;


class OlogyStats {
    protected $ologyId;
    protected $ology;
    protected $nbMembers;
    protected $nbPosts;
    protected $nbComments;
    
    function __construct($ologyId, $nbMembers, $nbPosts, $nbComments) {
        $this->ologyId = $ologyId;
        $this->nbMembers = $nbMembers;
        $this->nbPosts = $nbPosts;
        $this->nbComments = $nbComments;
    }
    
    public function getOlogyId() {
        return $this->ologyId;
    }
    
    public function getOlogy() {
        return $this->ology;
    }
    
    public function getNbMembers() {
        return $this->nbMembers;
    }
    
    public function getNbPosts() {
        return $this->nbPosts;
    }
    
    public function getNbComments() {
        return $this->nbComments;
    }
    
    public function setOlogy($ology) {
        $this->ology = $ology;
    }
}