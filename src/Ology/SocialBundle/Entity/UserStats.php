<?php

namespace Ology\SocialBundle\Entity;

class UserStats {
    protected $nbPosts;
    protected $nbComments;
    protected $nbCommentsForAllPosts;
    protected $nbReologize;
    protected $nbReologized;
    protected $nbLike;
    protected $nbHate;
    protected $nbHmmm;
    
    function __construct($nbPosts, $nbComments, $nbReologize, $nbReologized, $nbLike, $nbHate, $nbHmmm, $nbCommentsForAllPosts) {
        $this->nbPosts = $nbPosts;
        $this->nbComments = $nbComments;
        $this->nbReologize = $nbReologize;
        $this->nbReologized = $nbReologized;
        $this->nbLike = $nbLike;
        $this->nbHate = $nbHate;
        $this->nbHmmm = $nbHmmm;
        $this->nbCommentsForAllPosts = $nbCommentsForAllPosts;
    }
    
    
    public function getNbCommentsForAllPosts(){
        return $this->nbCommentsForAllPosts;
    }
    
    public function getNbLike()
    {
        return $this->nbLike;
    }
    public function getNbHate()
    {
        return $this->nbHate;
    }
    public function getNbHmmm()
    {
        return $this->nbHmmm;
    }
    public function setNbLike($n)
    {
        $this->nbLike = $n;
    }
    public function setNbHate($n)
    {
        $this->nbHate = $n;
    }
    public function setNbHmmm($n)
    {
        $this->nbHmmm = $n;
    }
    
    public function getNbPosts() {
        return $this->nbPosts;
    }
    
    public function getNbComments() {
        return $this->nbComments;
    }
    
    public function getNbReologized() {
        return $this->nbReologized;
    }
    
    public function getNbReologize() {
        return $this->nbReologize;
    }
}