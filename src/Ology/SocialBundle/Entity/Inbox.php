<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Inboxes")
 */
class Inbox {
    
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    protected $user;
    
    /**
     * @ORM\Column(type="datetime", nullable="true", name="date_last_message")
     */
    protected $dateLastMessage;
    
    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="inbox")
     */
    protected $messages;
    
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function update($user, $dateLastMessage) {
        $this->user = $user;
        $this->dateLastMessage = $dateLastMessage;
    } 

    /**
     * Set dateLastMessage
     *
     * @param datetime $dateLastMessage
     */
    public function setDateLastMessage($dateLastMessage)
    {
        $this->dateLastMessage = $dateLastMessage;
    }

    /**
     * Get dateLastMessage
     *
     * @return datetime 
     */
    public function getDateLastMessage()
    {
        return $this->dateLastMessage;
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
     * Add messages
     *
     * @param Ology\SocialBundle\Entity\Message $messages
     */
    public function addMessage(\Ology\SocialBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    }

    /**
     * Get messages
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
}