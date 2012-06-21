<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Interests")
 */
class Interest {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="name", type="string", length="255")
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    protected $user;

    /**
     * @ORM\Column(type="integer", name="date_created")
     */
    protected $dateCreated;
    
    function __construct() {
        $this->dateCreated = time();
    }
    
    /**
     * Set user
     *
     * @param Ology\SocialBundle\Entity\User $user
     */
    public function setUser(\Ology\SocialBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set postedAt
     *
     * @param datetime $postedAt
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * Get postedAt
     *
     * @return datetime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
}