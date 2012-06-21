<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PostsOlogies")
 */
class PostsOlogies implements IPostLink {
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Post", cascade={"persist"})
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id") 
     */
    protected $post;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Ology", cascade={"persist"})
     * @ORM\JoinColumn(name="ology_id", referencedColumnName="id") 
     */
    protected $ology;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    protected $postedBy;
    
    /**
     * @ORM\Column(type="integer", name="date_ologized")
     */
    protected $postedAt;
    
    /**
     * Set postedAt
     *
     * @param datetime $postedAt
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;
    }

    /**
     * Get postedAt
     *
     * @return datetime 
     */
    public function getPostedAt()
    {
        return $this->postedAt;
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
     * Set postedBy
     *
     * @param Ology\SocialBundle\Entity\User $postedBy
     */
    public function setPostedBy(\Ology\SocialBundle\Entity\User $postedBy)
    {
        $this->postedBy = $postedBy;
    }

    /**
     * Get postedBy
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getPostedBy()
    {
        return $this->postedBy;
    }

    public function getContainerId() {
        return $this->ology->getId();
    }

    public function getUser() {
        return $this->postedBy;
    }
}