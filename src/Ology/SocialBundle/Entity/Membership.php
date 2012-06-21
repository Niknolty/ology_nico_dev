<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Memberships")
 */
class Membership {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var Membership2
     * @ORM\ManyToOne(targetEntity="User", inversedBy="memberships", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    protected $user;
    
    /**
     * @var Membership
     * @ORM\ManyToOne(targetEntity="Ology", inversedBy="memberships", cascade={"persist"})
     * @ORM\JoinColumn(name="ology_id", referencedColumnName="id") 
     */
    protected $ology;
    
    /**
     * @ORM\ManyToOne(targetEntity="MembershipType")
     * @ORM\JoinColumn(name="membership_type_id", referencedColumnName="id") 
     */
    protected $membershipType;

    /**
     * @ORM\Column(name="creation_date", type="integer", nullable="true")
     */
    protected $creationDate;

    function __construct()
    {
        $this->creationDate = time();
    }
    
    public function update($user, $ology, $membershipType) {
        $this->user = $user;
        $this->ology = $ology;
        $this->membershipType = $membershipType;
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
     * Set ology
     *
     * @param Ology\SocialBundle\Entity\Ology $ology
     */
    public function setOlogy(\Ology\SocialBundle\Entity\Ology $ology)
    {
        $this->ology = $ology;
    }

    /**
     * Get ology
     *
     * @return Ology\SocialBundle\Entity\Ology 
     */
    public function getOlogy()
    {
        return $this->ology;
    }

    /**
     * Set membershipType
     *
     * @param Ology\SocialBundle\Entity\MembershipType $membershipType
     */
    public function setMembershipType(\Ology\SocialBundle\Entity\MembershipType $membershipType)
    {
        $this->membershipType = $membershipType;
    }

    /**
     * Get membershipType
     *
     * @return Ology\SocialBundle\Entity\MembershipType 
     */
    public function getMembershipType()
    {
        return $this->membershipType;
    }
    
       /**
     * Set creationDate
     *
     * @param datetime $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * Get creationDate
     *
     * @return datetime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
}