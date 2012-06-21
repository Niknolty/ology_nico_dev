<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PostTypes")
 */
class PostType {
    const HTML = 1;
    const TEXT = 2;
    const IMAGE = 3;
    const VIDEO = 4;
    const AUDIO = 5;
    
    const RECAP = 6;
    const GEN_REVIEW = 7;
    const MOV_REVIEW = 8;
    const ALB_REVIEW = 9;
    
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

    public function setId($id)
    {
        $this->id = $id;
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