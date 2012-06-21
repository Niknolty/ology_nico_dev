<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="MostViewedPosts")
 */
class MostViewedPost {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id") 
     */
    protected $post;
    
    /**
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;
    
    protected $list;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setPost(\Ology\SocialBundle\Entity\Post $post)
    {
        $this->post = $post;
    }

    public function getPost()
    {
        return $this->post;
    }
    
    public function setList($list)
    {
        $this->list = $list;
    }

    public function getList()
    {
        return $this->list;
    }
    
    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }
}