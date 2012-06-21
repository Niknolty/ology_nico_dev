<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="FeaturedOlogies")
 */
class FeaturedOlogy {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ology")
     * @ORM\JoinColumn(name="ology_id", referencedColumnName="id") 
     */
    protected $ology;
    
    /**
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;
    
    protected $list;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setOlogy(\Ology\SocialBundle\Entity\Ology $ology)
    {
        $this->ology = $ology;
    }

    public function getOlogy()
    {
        return $this->ology;
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