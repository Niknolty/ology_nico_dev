<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Channels")
 */
class Channel {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="image_logo", type="string", length="255", nullable="true")
     */
    protected $imageLogo;
    
    /**
     * @ORM\Column(name="image_title", type="string", length="255", nullable="true")
     */
    protected $imageTitle;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable="true")
     */
    protected $managedBy;
    
    /**
     * @ORM\Column(name="name", type="string", length="255")
     */
    protected $name;
    
    /**
     * @ORM\Column(name="stub", type="string", length="255")
     */
    protected $stub;

    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="featured_post1_id", referencedColumnName="id", nullable="true")
     */
    protected $featuredPost1;
    protected $featuredPost1id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="featured_post2_id", referencedColumnName="id", nullable="true")
     */
    protected $featuredPost2;
    protected $featuredPost2id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="featured_post3_id", referencedColumnName="id", nullable="true")
     */
    protected $featuredPost3;
    protected $featuredPost3id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="featured_post4_id", referencedColumnName="id", nullable="true")
     */
    protected $featuredPost4;
    protected $featuredPost4id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="featured_post5_id", referencedColumnName="id", nullable="true")
     */
    protected $featuredPost5;
    protected $featuredPost5id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_post1_id", referencedColumnName="id", nullable="true")
     */
    protected $specialPost1;
    protected $specialPost1id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_post2_id", referencedColumnName="id", nullable="true")
     */
    protected $specialPost2;
    protected $specialPost2id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_post3_id", referencedColumnName="id", nullable="true")
     */
    protected $specialPost3;
    protected $specialPost3id;
    
    /**
     * @ORM\Column(name="ad0", type="string", length="1500", nullable="true")
     */
    protected $ad0;
    
    /**
     * @ORM\Column(name="ad1", type="string", length="1500", nullable="true")
     */
    protected $ad1;
    
    /**
     * @ORM\Column(name="ad2", type="string", length="1500", nullable="true")
     */
    protected $ad2;
    
    /**
     * @ORM\Column(name="ad3", type="string", length="1500", nullable="true")
     */
    protected $ad3;
    
    /**
     * @ORM\Column(name="ad4", type="string", length="1500", nullable="true")
     */
    protected $ad4;
    
    /**
     * @ORM\Column(name="ad5", type="string", length="1500", nullable="true")
     */
    protected $ad5;
    
    /**
     * @ORM\Column(name="ad6", type="string", length="1500", nullable="true")
     */
    protected $ad6;
    
    /**
     * @ORM\Column(name="display", type="integer", nullable="true")
     */
    protected $display;
    
    /**
     * @ORM\Column(name="video", type="string", length="1500", nullable="true")
     */
    protected $video;
    
    /**
     * @ORM\Column(name="special_posts_title", type="string", length="1000", nullable="true")
     */
    protected $specialTitle;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="channel", cascade={"persist", "remove"})
     */
    protected $subscriptions;
    
    public function getSubscriptions() {
        return $this->subscriptions;
    }
    public function setSubscriptions($subscriptions) {
        $this->subscriptions = $subscriptions;
    }
    public function getSpecialTitle() {
        return $this->specialTitle;
    }
    public function setSpecialTitle($specialTitle) {
        $this->specialTitle = $specialTitle;
    }
    public function getDisplay() {
        return $this->display;
    }
    public function getVideo() {
        return $this->video;
    }
    public function setVideo($v) {
        $this->video = $v;
    }
    public function getImageLogo() {
        return $this->imageLogo;
    }
    public function getImageTitle() {
        return $this->imageTitle;
    }
    public function getManagedBy() {
        return $this->managedBy;
    }
    public function setImageLogo($i) {
        $this->imageLogo = $i;
    }
    public function setImageTitle($i) {
        $this->imageTitle = $i;
    }
    public function setManagedBy($i) {
        $this->managedBy = $i;
    }
    public function setDisplay($display) {
        $this->display = $display;
    }
    
    public function getStub() {
        return $this->stub;
    }
    public function getAd0() {
        return $this->ad0;
    }
    public function getAd1() {
        return $this->ad1;
    }
    public function getAd2() {
        return $this->ad2;
    }
    public function getAd3() {
        return $this->ad3;
    }
    public function getAd4() {
        return $this->ad4;
    }
    public function getAd5() {
        return $this->ad5;
    }
    public function getAd6() {
        return $this->ad6;
    }
    public function setAd0($ad) {
        return $this->ad0 = $ad;
    }
    public function setAd1($ad) {
        return $this->ad1 = $ad;
    }
    public function setAd2($ad) {
        return $this->ad2 = $ad;
    }
    public function setAd3($ad) {
        return $this->ad3 = $ad;
    }
    public function setAd4($ad) {
        return $this->ad4 = $ad;
    }
    public function setAd5($ad) {
        return $this->ad5 = $ad;
    }
    public function setAd6($ad) {
        return $this->ad6 = $ad;
    }
    public function setStub($s) {
        return $this->stub = $s;
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

    public function setSpecialPost1(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->specialPost1 = $featuredPost;
    }
    public function setSpecialPost2(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->specialPost2 = $featuredPost;
    }
    public function setSpecialPost3(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->specialPost3 = $featuredPost;
    }
    public function setFeaturedPost1(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->featuredPost1 = $featuredPost;
    }
    public function setFeaturedPost2(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->featuredPost2 = $featuredPost;
    }
    public function setFeaturedPost3(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->featuredPost3 = $featuredPost;
    }
    public function setFeaturedPost4(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->featuredPost4 = $featuredPost;
    }
    public function setFeaturedPost5(\Ology\SocialBundle\Entity\Post $featuredPost)
    {
        $this->featuredPost5 = $featuredPost;
    }
    public function getFeaturedPost1()
    {
        return $this->featuredPost1;
    }
    public function getSpecialPost1()
    {
        return $this->specialPost1;
    }
    public function getSpecialPost2()
    {
        return $this->specialPost2;
    }
    public function getSpecialPost3()
    {
        return $this->specialPost3;
    }
    public function getSpecialPost1id()
    {
        return $this->specialPost1id;
    }
    public function getSpecialPost2id()
    {
        return $this->specialPost2id;
    }
    public function getSpecialPost3id()
    {
        return $this->specialPost3id;
    }
    public function getFeaturedPost1id()
    {
        return $this->featuredPost1id;
    }
    public function getFeaturedPost2id()
    {
        return $this->featuredPost2id;
    }
    public function getFeaturedPost3id()
    {
        return $this->featuredPost3id;
    }
    public function getFeaturedPost4id()
    {
        return $this->featuredPost4id;
    }
    public function getFeaturedPost5id()
    {
        return $this->featuredPost5id;
    }
    public function getFeaturedPost2()
    {
        return $this->featuredPost2;
    }
    public function getFeaturedPost3()
    {
        return $this->featuredPost3;
    }
    public function getFeaturedPost4()
    {
        return $this->featuredPost4;
    }
    public function getFeaturedPost5()
    {
        return $this->featuredPost5;
    }
    public function setSpecialPost1id($id)
    {
        $this->specialPost1id = $id;
    }
    public function setSpecialPost2id($id)
    {
        $this->specialPost2id = $id;
    }
    public function setSpecialPost3id($id)
    {
        $this->specialPost3id = $id;
    }
    public function setFeaturedPost1id($id)
    {
        $this->featuredPost1id = $id;
    }
    public function setFeaturedPost2id($id)
    {
        $this->featuredPost2id = $id;
    }
    public function setFeaturedPost3id($id)
    {
        $this->featuredPost3id = $id;
    }
    public function setFeaturedPost4id($id)
    {
        $this->featuredPost4id = $id;
    }
    public function setFeaturedPost5id($id)
    {
        $this->featuredPost5id = $id;
    }
}