<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Comments")
 */
class Comment {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    protected $post;
    // Used for forms
    protected $postId;
    protected $parentCommentId;

     /**
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @ORM\ManyToOne(targetEntity="Comment")
     * @ORM\JoinColumn(name="parent_comment_id", referencedColumnName="id")
     * @ORM\Column(type="integer" ,nullable="true")
     */
    protected $parentComment;

    /**
     * @ORM\Column(name="creation_date", type="integer")
     */
    protected $creationDate;

    /**
     * @ORM\Column(name="update_date", type="integer", nullable="true")
     */
    protected $updateDate;

    /**
     * @ORM\Column(name="hostname", type="string", length="128",nullable="true")
     */
    protected $hostIP;

    /**
     * @ORM\Column(name="times_commented", type="integer")
     */
    protected $timesCommented;

    function __construct($content = NULL) {
        $this->content = "Comment";
        $this->creationDate = time();
        $this->timesCommented = 0;
    }

    public function update($post, $author, $content, $parentComment) {
        $this->author = $author;
        $this->post = $post;
        $this->content = $content;
        $this->parentComment = $parentComment;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function setPostId($postId) {
        $this->postId = $postId;
    }

    public function getParentCommentId() {
        return $this->parentCommentId;
    }

    public function setParentCommentId($parentCommentId) {
        $this->parentCommentId = $parentCommentId;
    }

    public function getHostIP() {
        return $this->hostIP;
    }

    public function setHostIP($hostIP) {
        $this->hostIP = $hostIP;
    }
    
    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set parentComment
     *
     * @param string $parentComment
     */
    public function setParentComment($parentComment) {
        $this->parentComment = $parentComment;
    }

    /**
     * Get parentComment
     *
     * @return string 
     */
    public function getParentComment() {
        return $this->parentComment;
    }

    /**
     * Set creationDate
     *
     * @param datetime $creationDate
     */
    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    /**
     * Get creationDate
     *
     * @return datetime 
     */
    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setUpdateDate($updateDate) {
        $this->creationDate = $updateDate;
    }

    public function getUpdateDate() {
        return $this->updateDate;
    }

    /**
     * Set timesCommented
     *
     * @param integer $timesCommented
     */
    public function setTimesCommented($timesCommented) {
        $this->timesCommented = $timesCommented;
    }

    /**
     * Get timesCommented
     *
     * @return integer 
     */
    public function getTimesCommented() {
        return $this->timesCommented;
    }

    /**
     * Set author
     *
     * @param Ology\SocialBundle\Entity\User $author
     */
    public function setAuthor(\Ology\SocialBundle\Entity\User $author) {
        $this->author = $author;
    }

    /**
     * Get author
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * Set post
     *
     * @param Ology\SocialBundle\Entity\Post $post
     */
    public function setPost(\Ology\SocialBundle\Entity\Post $post) {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return Ology\SocialBundle\Entity\Post 
     */
    public function getPost() {
        return $this->post;
    }

    public function incrTimeCommented() {
        $this->timesCommented++;
    }

    public function decrTimeCommented() {
        $this->timesCommented--;
    }

}