<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Subscriptions")
 */
class Subscription
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subscriptions", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Channel", inversedBy="subscriptions", cascade={"persist"})
     * @ORM\JoinColumn(name="channel_id", referencedColumnName="id") 
     */
    protected $channel;
    
    /**
     * @ORM\Column(name="creation_date", type="integer", nullable="true")
     */
    protected $creationDate;

    function __construct()
    {
        $this->creationDate = time();
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
     * Set channel
     *
     * @param Ology\SocialBundle\Entity\Channel $channel
     */
    public function setChannel(\Ology\SocialBundle\Entity\Channel $channel)
    {
        $this->channel = $channel;
    }

    /**
     * Get channel
     *
     * @return Ology\SocialBundle\Entity\Channel 
     */
    public function getChannel()
    {
        return $this->channel;
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

?>
