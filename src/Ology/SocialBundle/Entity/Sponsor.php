<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Sponsors")
 */
class Sponsor {   
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="name", type="string", length="250", nullable="true")
     */
    protected $name;
    
    /**
     * @ORM\Column(name="image_url", type="string", length="1500", nullable="true")
     */
    protected $imageUrl;
    
    /**
     * @ORM\Column(name="tag", type="string", length="1500", nullable="true")
     */
    protected $tag;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
    
    public function getTag()
    {
        return $this->tag;
    }
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
}
?>
