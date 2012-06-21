<?php

namespace Ology\SocialBundle\Entity;

class Stats {

    protected $nbUsers;
    protected $nbOlogies;
    protected $nbPosts;
    protected $nbComments;
    protected $startDate;
    protected $endDate;
    
    public function setNbUsers($nbUsers)
    {
        $this->nbUsers = $nbUsers;
    }

    /**
     * Get nbUser
     *
     * @return integer 
     */
    public function getNbUsers()
    {
        return $this->nbUsers;
    }
    
    /**
     * Set nbOlogies
     *
     * @param integer $nbOlogies
     */
    public function setNbOlogies($nbOlogies)
    {
        $this->nbOlogies = $nbOlogies;
    }

    /**
     * Get nbOlogies
     *
     * @return integer 
     */
    public function getNbOlogies()
    {
        return $this->nbOlogies;
    }

    /**
     * Set nbPosts
     *
     * @param integer $nbPosts
     */
    public function setNbPosts($nbPosts)
    {
        $this->nbPosts = $nbPosts;
    }

    /**
     * Get nbPosts
     *
     * @return integer 
     */
    public function getNbPosts()
    {
        return $this->nbPosts;
    }

    /**
     * Set nbComments
     *
     * @param integer $nbComments
     */
    public function setNbComments($nbComments)
    {
        $this->nbComments = $nbComments;
    }

    /**
     * Get nbComments
     *
     * @return integer 
     */
    public function getNbComments()
    {
        return $this->nbComments;
    }

    /**
     * Set startDate
     *
     * @param integer $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Get startDate
     *
     * @return integer 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param integer $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Get endDate
     *
     * @return integer 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}