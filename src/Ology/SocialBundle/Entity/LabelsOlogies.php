<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="LabelsOlogies")
 */
class LabelsOlogies {
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Label")
     * @ORM\JoinColumn(name="label_id", referencedColumnName="id") 
     */
    protected $label;
    
    /**
     * @ORM\Id
     * @var LabelsOlogies
     * @ORM\ManyToOne(targetEntity="Ology", inversedBy="labelologies", cascade={"persist"})
     * @ORM\JoinColumn(name="ology_id", referencedColumnName="id") 
     */
    protected $ology;


    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    protected $taggedBy;
    
    /**
     * @ORM\Column(type="datetime", name="date_tagged")
     */
    protected $taggedAt;
    
    /**
     * @ORM\Column(type="integer", name="times_tagged")
     */
    protected $timesTagged;

    function __construct()
    {
        $this->taggedAt = new \DateTime('now');
    }
    
    /**
     * Set taggedAt
     *
     * @param datetime $taggedAt
     */
    public function setTaggedAt($taggedAt)
    {
        $this->taggedAt = $taggedAt;
    }

    /**
     * Get taggedAt
     *
     * @return datetime 
     */
    public function getTaggedAt()
    {
        return $this->taggedAt;
    }

    /**
     * Set timesTagged
     *
     * @param integer $timesTagged
     */
    public function setTimesTagged($timesTagged)
    {
        $this->timesTagged = $timesTagged;
    }
    
    /**
     * Inc timesTagged
     *
     * @param integer $timesTagged
     */
    public function incTimesTagged()
    {
        $this->timesTagged = $this->timesTagged + 1;
    }

    /**
     * Get timesTagged
     *
     * @return integer 
     */
    public function getTimesTagged()
    {
        return $this->timesTagged;
    }

    /**
     * Set label
     *
     * @param Ology\SocialBundle\Entity\Label $label
     */
    public function setLabel(\Ology\SocialBundle\Entity\Label $label)
    {
        $this->label = $label;
    }

    /**
     * Get label
     *
     * @return Ology\SocialBundle\Entity\Label 
     */
    public function getLabel()
    {
        return $this->label;
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
     * Set taggedBy
     *
     * @param Ology\SocialBundle\Entity\User $taggedBy
     */
    public function setTaggedBy(\Ology\SocialBundle\Entity\User $taggedBy)
    {
        $this->taggedBy = $taggedBy;
    }

    /**
     * Get taggedBy
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getTaggedBy()
    {
        return $this->taggedBy;
    }
}