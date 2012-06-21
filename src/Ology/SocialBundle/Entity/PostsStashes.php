<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PostsStashes")
 */
class PostsStashes {
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Post", cascade={"persist"})
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id") 
     */
    protected $post;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Stash", cascade={"persist"})
     * @ORM\JoinColumn(name="stash_id", referencedColumnName="id") 
     */
    protected $stash;
    
    /**
     * @ORM\Column(type="integer", name="date_stashed")
     */
    protected $stashedAt;
    
    /**
     * Set stashedAt
     *
     * @param datetime $stashedAt
     */
    public function setStashedAt($stashedAt)
    {
        $this->stashedAt = $stashedAt;
    }

    /**
     * Get stashedAt
     *
     * @return datetime 
     */
    public function getStashedAt()
    {
        return $this->stashedAt;
    }

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
     * Set stash
     *
     * @param Ology\SocialBundle\Entity\Stash $stash
     */
    public function setStash(\Ology\SocialBundle\Entity\Stash $stash)
    {
        $this->stash = $stash;
    }

    /**
     * Get stash
     *
     * @return Ology\SocialBundle\Entity\Stash
     */
    public function getStash()
    {
        return $this->stash;
    }
}