<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Likes")
 */
class Likes
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $postId
     *
     * @ORM\Column(name="postId", type="integer")
     */
    private $postId;

    /**
     * @var integer $author_id
     *
     * @ORM\Column(name="author_id", type="integer")
     */
    private $author_id;

    /**
     * @var string $like_type
     *
     * @ORM\Column(name="like_type", type="string", length=255)
     */
    private $like_type;

    /**
     * @var datetime $date_like
     *
     * @ORM\Column(name="date_like", type="integer")
     */
    private $date_like;

    function __construct(){
        $this->date_like = time();
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
     * Set postId
     *
     * @param integer $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    /**
     * Get postId
     *
     * @return integer 
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set author_id
     *
     * @param integer $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->author_id = $authorId;
    }

    /**
     * Get author_id
     *
     * @return integer 
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * Set like_type
     *
     * @param string $likeType
     */
    public function setLikeType($likeType)
    {
        $this->like_type = $likeType;
    }

    /**
     * Get like_typeuse
     *
     * @return string 
     */
    public function getLikeType()
    {
        return $this->like_type;
    }

    /**
     * Set date_like
     *
     * @param datetime $dateLike
     */
    public function setDateLike($dateLike)
    {
        $this->date_like = $dateLike;
    }

    /**
     * Get date_like
     *
     * @return datetime 
     */
    public function getDateLike()
    {
        return $this->date_like;
    }
}