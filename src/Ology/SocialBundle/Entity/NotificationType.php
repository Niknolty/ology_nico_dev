<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="NotificationTypes")
 */
class NotificationType {
    
    const JOIN_OLOGY = 1;
    const LEAVE_OLOGY = 2;
    const POST_IN_OLOGY = 3;
    const COMMENT_ON_OWN_POST = 4;
    const COMMENT_ON_COMMENTED_POST = 5;
    const COMMENT_ON_COMMENT = 6;
    const SITE = 7;
    const FOLLOW_STASH = 8;
    const FOLLOW_USER_IN_OLOGY = 9;
    const POST_REOLOGIZED_IN_OLOGY = 10;
    const POST_REOLOGIZED_IN_STASH = 11;
    
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
}