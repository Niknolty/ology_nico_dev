<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Messages")
 */
class Message {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Inbox", inversedBy="messages")
     * @ORM\JoinColumn(name="inbox_id", referencedColumnName="user_id")
     */
    protected $inbox;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id") 
     */
    protected $sender;
    
    /**
     * @ORM\Column(name="subject", type="string", length="150")
     */
    protected $subject;
    
    /**
     * @ORM\Column(name="body", type="text")
     */
    protected $body;
    
    /**
     * @ORM\Column(type="datetime", name="date_received")
     */
    protected $dateReceived;
    
    /**
     * @ORM\Column(type="datetime", name="date_read", nullable="true")
     */
    protected $readDate;


    function __construct()
    {
        $this->dateReceived = new \DateTime('now');
    }
    
    public function update($inbox, $sender, $subject, $body) {
        $this->inbox = $inbox;
        $this->sender = $sender;
        $this->subject = $subject;
        $this->body = $body;
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
     * Set subject
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set dateReceived
     *
     * @param datetime $dateReceived
     */
    public function setDateReceived($dateReceived)
    {
        $this->dateReceived = $dateReceived;
    }

    /**
     * Get dateReceived
     *
     * @return datetime 
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * Set readDate
     *
     * @param datetime $readDate
     */
    public function setReadDate($readDate)
    {
        $this->readDate = $readDate;
    }

    /**
     * Get readDate
     *
     * @return datetime 
     */
    public function getReadDate()
    {
        return $this->readDate;
    }

    /**
     * Set inbox
     *
     * @param Ology\SocialBundle\Entity\Inbox $inbox
     */
    public function setInbox(\Ology\SocialBundle\Entity\Inbox $inbox)
    {
        $this->inbox = $inbox;
    }

    /**
     * Get inbox
     *
     * @return Ology\SocialBundle\Entity\Inbox 
     */
    public function getInbox()
    {
        return $this->inbox;
    }

    /**
     * Set sender
     *
     * @param Ology\SocialBundle\Entity\User $sender
     */
    public function setSender(\Ology\SocialBundle\Entity\User $sender)
    {
        $this->sender = $sender;
    }

    /**
     * Get sender
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }
}