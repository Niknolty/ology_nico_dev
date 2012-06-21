<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ology\SocialBundle\Entity\Stash
 *
 * @ORM\Entity
 * @ORM\Table(name="Stashes")
 */
class Stash
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="founder_id", referencedColumnName="id", nullable="true")
     */
    protected $founder;
    
    /**
     * @ORM\Column(name="creation_date", type="integer")
     */
    protected $creationDate;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="TagStash", mappedBy="stash", cascade={"persist"})
     */
    protected $tagsStashes;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="PostsStashes", mappedBy="stash", cascade={"persist"})
     */
    protected $postsStashes;
    
    // Non-persistent.
    // Used to display certain posts of the stash on pages (e.g. profile)
    protected $posts;
    
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
    
    public function getPosts()
    {
        return $this->posts;
    }
    
    public function getPostsStashes() {
        return $this->postsStashes;
    }
    
    public function setPostsStashes($ps) {
        $this->postsStashes = $ps;
    }
    
    public function setPosts($posts) {
        $this->posts = $posts;
    }
    
    public function addPostsStashes(\Ology\SocialBundle\Entity\PostsStashes $ps)
    {
        $this->postsStashes[] = $ps;
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

    /**
     * Set founder
     *
     * @param integer $founder
     */
    public function setFounder($founder)
    {
        $this->founder = $founder;
    }

    /**
     * Get founder
     *
     * @return integer 
     */
    public function getFounder()
    {
        return $this->founder;
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
    
    public function setTagsStashes($tagsStashes)
    {
        $this->tagsStashes = $tagsStashes;
    }
    
    public function getTagsStashes()
    {
        return $this->tagsStashes;
    }
    
    public function getTags()
    {
        $tags = array();
        if (empty($this->tagsStashes) || $this->tagsStashes->count() == 0)
            return $tags;
        $tagsStashes = $this->tagsStashes->toArray();
        foreach ($tagsStashes as $tagStash) {
            $tags[] = $tagStash->getTag()->getName();
        }
        return $tags;
    }
}