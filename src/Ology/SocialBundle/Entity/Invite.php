<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Invites")
 */
class Invite {
    
    const SVC_FACEBOOK = "facebook";
    const SVC_GMAIL = "gmail";
    const SVC_OLOGY = "ology";
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="from_user", referencedColumnName="id")
     */
    protected $fromUser;
    
    /**
     * @ORM\ManyToOne(targetEntity="InviteType")
     * @ORM\JoinColumn(name="type", referencedColumnName="id")
     */
    protected $type;
    
    /**
     * @ORM\Column(name="service", type="string", length=100, nullable="true")
     */
    protected $service;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ology")
     * @ORM\JoinColumn(name="ology_id", referencedColumnName="id")
     */
    protected $ology;
    
    /**
     * @ORM\Column(name="to_email", type="string", length=100, nullable="true")
     */
    protected $toEmail;
    
    /**
     * @ORM\Column(name="to_fb_id", type="string", length=100, nullable="true")
     */
    protected $toFbId;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="to_user", referencedColumnName="id")
     */
    protected $toUser;
    
    /**
     * @ORM\Column(name="date_first_sent", type="datetime")
     */
    protected $dateFirstSent;
    
    /**
     * @ORM\Column(name="date_last_sent", type="datetime", nullable="true")
     */
    protected $dateLastSent;
    
    /**
     * @ORM\Column(name="date_accepted", type="datetime", nullable="true")
     */
    protected $dateAccepted;
    
    /**
     * @ORM\Column(name="times_sent", type="integer")
     */
    protected $timesSent;
    
    /**
     * @ORM\Column(name="message", type="string", length=1000, nullable="true")
     */
    protected $message;
    
    /**
     * @ORM\Column(name="times_accepted", type="integer")
     */
    protected $timesAccepted;
    
    function __construct() {   
        $now = new \DateTime('now');
        $this->dateFirstSent = $now;
        $this->dateLastSent = $now;
        $this->timesSent = 1;
        $this->timesAccepted = 0;
    }
    
    public function update($fromUser, $toEmail, $timesSent) {
        $this->fromUser = $fromUser;
        $this->toEmail = $toEmail;
        if ($timesSent != $this->timesSent)
            $this->dateLastSent = new \DateTime('now');
        $this->timesSent = $timesSent;
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
     * Set toEmail
     *
     * @param string $toEmail
     */
    public function setToEmail($toEmail)
    {
        $this->toEmail = $toEmail;
    }
    
    public function setToFbId($toFbId)
    {
        $this->toFbId = $toFbId;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function setType($type)
    {
        $this->type = $type;
    }
    
    public function getType()
    {
        return $this->type;
    }
    public function setOlogy($ology)
    {
        $this->ology = $ology;
    }
    
    public function getOlogy()
    {
        return $this->ology;
    }
    public function setService($service)
    {
        $this->service = $service;
    }
    
    public function getService()
    {
        return $this->service;
    }
    
    public function getToEmail()
    {
        return $this->toEmail;
    }
    
    public function getToFbId()
    {
        return $this->toFbId;
    }

    /**
     * Set dateFirstSent
     *
     * @param datetime $dateFirstSent
     */
    public function setDateFirstSent($dateFirstSent)
    {
        $this->dateFirstSent = $dateFirstSent;
    }

    /**
     * Get dateFirstSent
     *
     * @return datetime 
     */
    public function getDateFirstSent()
    {
        return $this->dateFirstSent;
    }

    /**
     * Set dateLastSent
     *
     * @param datetime $dateLastSent
     */
    public function setDateLastSent($dateLastSent)
    {
        $this->dateLastSent = $dateLastSent;
    }

    /**
     * Get dateLastSent
     *
     * @return datetime 
     */
    public function getDateLastSent()
    {
        return $this->dateLastSent;
    }

    /**
     * Set dateAccepted
     *
     * @param datetime $dateAccepted
     */
    public function setDateAccepted($dateAccepted)
    {
        $this->dateAccepted = $dateAccepted;
    }

    /**
     * Get dateAccepted
     *
     * @return datetime 
     */
    public function getDateAccepted()
    {
        return $this->dateAccepted;
    }

    /**
     * Set timesSent
     *
     * @param integer $timesSent
     */
    public function setTimesSent($timesSent)
    {
        $this->timesSent = $timesSent;
    }
    
    public function setTimesAccepted($timesSent)
    {
        $this->timesAccepted = $timesSent;
    }

    /**
     * Get timesSent
     *
     * @return integer 
     */
    public function getTimesSent()
    {
        return $this->timesSent;
    }

    public function getTimesAccepted()
    {
        return $this->timesAccepted;
    }
    
    /**
     * Set fromUser
     *
     * @param Ology\SocialBundle\Entity\User $fromUser
     */
    public function setFromUser(\Ology\SocialBundle\Entity\User $fromUser)
    {
        $this->fromUser = $fromUser;
    }
    
    public function setToUser(\Ology\SocialBundle\Entity\User $toUser)
    {
        $this->toUser = $toUser;
    }

    /**
     * Get fromUser
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }
    
    public function getToUser()
    {
        return $this->toUser;
    }
}