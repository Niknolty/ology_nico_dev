<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PostsChannels")
 */
class PostsChannels {
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Post", cascade={"persist"})
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id") 
     */
    protected $post;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Channel", cascade={"persist"})
     * @ORM\JoinColumn(name="channel_id", referencedColumnName="id") 
     */
    protected $channel;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    protected $promotedBy;
    
    /**
     * @ORM\Column(type="integer", name="position", nullable="true")
     */
    protected $position;
    
    
    /**
     * Set post
     *
     * @param Ology\SocialBundle\Entity\Post $post
     */
    public function setPost(\Ology\SocialBundle\Entity\Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return Ology\SocialBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set ology
     *
     * @param Ology\SocialBundle\Entity\Channel $channel
     */
    public function setChannel(\Ology\SocialBundle\Entity\Channel $channel)
    {
        $this->channel = $channel;
    }

    /**
     * Get ology
     *
     * @return Ology\SocialBundle\Entity\Channel 
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set postedBy
     *
     * @param Ology\SocialBundle\Entity\User $postedBy
     */
    public function setPromotedBy(\Ology\SocialBundle\Entity\User $promotedBy)
    {
        $this->promotedBy = $promotedBy;
    }

    /**
     * Get postedBy
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getPromotedBy()
    {
        return $this->promotedBy;
    }
}