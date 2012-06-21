<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="TagsStashes")
 */
class TagStash {
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Tag")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id") 
     */
    protected $tag;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Stash", inversedBy="tagstashes", cascade={"persist"})
     * @ORM\JoinColumn(name="stash_id", referencedColumnName="id") 
     */
    protected $stash;

    /**
     * @ORM\Column(type="datetime", name="date_tagged")
     */
    protected $taggedAt;
    
    function __construct()
    {
        $this->taggedAt = new \DateTime('now');
    }
    
    /**
     * Set taggedAt
     *
     * @param datetime $taggedAt
     */
    public function setTaggedAt($taggedAt)
    {
        $this->taggedAt = $taggedAt;
    }

    /**
     * Get taggedAt
     *
     * @return datetime 
     */
    public function getTaggedAt()
    {
        return $this->taggedAt;
    }

    /**
     * Set tag
     *
     * @param Ology\SocialBundle\Entity\Tag $tag
     */
    public function setTag(\Ology\SocialBundle\Entity\Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Get tag
     *
     * @return Ology\SocialBundle\Entity\Tag
     */
    public function getTag()
    {
        return $this->tag;
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