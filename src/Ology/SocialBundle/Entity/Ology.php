<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Ologies")
 */
class Ology
{
    const READ_WRITE = false;
    const READ_ONLY = true;
    
    const NOT_VISIBLE = false;
    const VISIBLE = true;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="founder_id", referencedColumnName="id", nullable="true")
     */
    protected $founder;

    /**
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\Column(name="image_url", type="string", length="255", nullable="true")
     */
    protected $imageUrl;
    
    /**
     * @Assert\File
     */
    protected $imageFile;
    
    /**
     * @ORM\Column(name="creation_date", type="integer")
     */
    protected $creationDate;
    
    /**
     * @ORM\Column(name="update_date", type="integer", nullable="true")
     */
    protected $updateDate;    
    
    /**
     * @ORM\Column(name="visibility", type="integer")
     */
    protected $visibility;
    
    /**
     * @ORM\Column(name="read_only", type="integer")
     */
    protected $readOnly;
    
    /**
     * @ORM\Column(name="slug", type="string", length="500", nullable="true")
     */
    protected $slug;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="LabelsOlogies", mappedBy="ology", cascade={"persist", "remove"})
     */
    protected $ologylabels;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Membership", mappedBy="ology", cascade={"persist", "remove"})
     */
    protected $memberships;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="PostsOlogies", mappedBy="ology", cascade={"persist"})
     */
    protected $ologyposts;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="FeaturedOlogy", mappedBy="ology", cascade={"persist", "remove"})
     */
    protected $featured;
    
    /**
     * @ORM\Column(name="blacklisted", type="boolean", nullable="true")
     */
    protected $blacklisted;
    
    protected $firstLabel;
    
    function __construct()
    {
        $this->creationDate = time();
    }    
    
    function update($id, $name, $founder, $description, $imageUrl, $visibility, $readOnly)
    {
        $this->id = $id;
        $this->name = $name;
        $this->founder = $founder;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->visibility = $visibility;
        $this->readOnly = $readOnly;
        $this->updateDate = time();
    }
    
    public function getFirstLabel() {
        return $this->firstLabel;
    }
    
    public function setFirstLabel($firstLabel) {
        $this->firstLabel = $firstLabel;
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
    
    public function setId($id)
    {
        $this->id = $id;
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
    
    public function getBlacklisted() {
        return $this->blacklisted;
    }
    
    public function setBlacklisted($blacklisted) {
        $this->blacklisted = $blacklisted;
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
    
    public function getOlogylabels() {
        return $this->ologylabels;
    }
    
    public function getOlogyposts() {
        return $this->ologyposts;
    }
    

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * Get imageUrl
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
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

    public function getUpdateDate()
    {
        return $this->updateDate;
    }    
    
    /**
     * Set visibility
     *
     * @param integer $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * Get visibility
     *
     * @return integer 
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set readOnly
     *
     * @param integer $readOnly
     */
    public function setReadOnly($readOnly)
    {
        $this->readOnly = $readOnly;
    }

    /**
     * Get readOnly
     *
     * @return integer 
     */
    public function getReadOnly()
    {
        return $this->readOnly;
    }

    /**
     * Set founder
     *
     * @param Ology\SocialBundle\Entity\User $founder
     */
    public function setFounder(\Ology\SocialBundle\Entity\User $founder = NULL)
    {
        $this->founder = $founder;
    }

    /**
     * Get founder
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getFounder()
    {
        return $this->founder;
    }
    
    public function getImageFile()
    {
        return $this->imageFile;
    }
    
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }
    
    public function getSlug()
    {
        return $this->slug;
    }
    
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
    
    public function toArray() {
        $arr = array();
        $arr["id"] = $this->id;
        $arr["name"] = $this->name;
        return $arr;
    }

    /**
     * Set updateDate
     *
     * @param integer $updateDate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * Add ologylabels
     *
     * @param Ology\SocialBundle\Entity\LabelsOlogies $ologylabels
     */
    public function addLabelsOlogies(\Ology\SocialBundle\Entity\LabelsOlogies $ologylabels)
    {
        $this->ologylabels[] = $ologylabels;
    }

    /**
     * Add memberships
     *
     * @param Ology\SocialBundle\Entity\Membership $memberships
     */
    public function addMembership(\Ology\SocialBundle\Entity\Membership $memberships)
    {
        $this->memberships[] = $memberships;
    }

    /**
     * Get memberships
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMemberships()
    {
        return $this->memberships;
    }

    /**
     * Add ologyposts
     *
     * @param Ology\SocialBundle\Entity\PostsOlogies $ologyposts
     */
    public function addPostsOlogies(\Ology\SocialBundle\Entity\PostsOlogies $ologyposts)
    {
        $this->ologyposts[] = $ologyposts;
    }

    /**
     * Add featured
     *
     * @param Ology\SocialBundle\Entity\FeaturedOlogy $featured
     */
    public function addFeaturedOlogy(\Ology\SocialBundle\Entity\FeaturedOlogy $featured)
    {
        $this->featured[] = $featured;
    }

    /**
     * Get featured
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFeatured()
    {
        return $this->featured;
    }
    
    public function __toString()
    { 
      return (string) $this->id;
    }
}