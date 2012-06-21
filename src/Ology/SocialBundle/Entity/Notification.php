<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Notifications")
 */
class Notification {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="NotificationType")
     * @ORM\JoinColumn(name="notification_type_id", referencedColumnName="id")
     */
    protected $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="recipient_id", referencedColumnName="id")
     */
    protected $recipient;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ology")
     * @ORM\JoinColumn(name="ology_id", referencedColumnName="id")
     */
    protected $ology;
    
    /**
     * @ORM\ManyToOne(targetEntity="Stash")
     * @ORM\JoinColumn(name="stash_id", referencedColumnName="id")
     */
    protected $stash;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    protected $post;
    
    /**
     * @ORM\ManyToOne(targetEntity="Comment")
     * @ORM\JoinColumn(name="comment_id", referencedColumnName="id")
     */
    protected $comment;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
    
    /**
     * @ORM\Column(name="creation_date", type="datetime")
     */
    protected $creationDate;
    
    /**
     * @ORM\Column(name="content", type="text")
     */
    protected $content;
    
    /**
     * @ORM\Column(name="date_read", type="datetime", nullable="true")
     */
    protected $dateRead;

    // Data for cache
    protected $ologyId;
    protected $ologyName;
    protected $stashId;
    protected $stashName;
    protected $ologyImage;
    protected $ologySlug;
    protected $postId;
    protected $postTitle;
    protected $postImage;
    protected $postSlug;
    protected $userId;
    protected $userFirstName;
    protected $userImage;
    protected $typeId;
    
    public function getTypeId() {
        return $this->typeId;
    }
    
    public function setTypeId($typeId) {
        $this->typeId = $typeId;
    }
    
    public function getOlogyId() {
        return $this->ologyId;
    }
    public function setOlogyId($ologyId) {
        $this->ologyId = $ologyId;
    }
    public function getStashId() {
        return $this->stashId;
    }
    public function setStashId($stashId) {
        $this->stashId = $stashId;
    }
    public function getOlogySlug() {
        return $this->ologySlug;
    }
    public function setOlogySlug($ologySlug) {
        $this->ologySlug = $ologySlug;
    }
    public function getPostSlug() {
        return $this->postSlug;
    }
    public function setPostSlug($postSlug) {
        $this->postSlug = $postSlug;
    }
    public function getOlogyName() {
        return $this->ologyName;
    }
    public function setOlogyName($ologyName) {
        $this->ologyName = $ologyName;
    }
    public function getStashName() {
        return $this->stashName;
    }
    public function setStashName($stashName) {
        $this->stashName = $stashName;
    }
    public function getOlogyImage() {
        return $this->ologyImage;
    }
    public function setOlogyImage($ologyImage) {
        $this->ologyImage = $ologyImage;
    }
    public function getPostId() {
        return $this->postId;
    }
    public function setPostId($postId) {
        $this->postId = $postId;
    }
    public function getPostTitle() {
        return $this->postTitle;
    }
    public function setPostTitle($postTitle) {
        $this->postTitle = $postTitle;
    }
    public function getPostImage() {
        return $this->postImage;
    }
    public function setPostImage($postImage) {
        $this->postImage = $postImage;
    }
    public function getUserId() {
        return $this->userId;
    }
    public function setUserId($userId) {
        $this->userId = $userId;
    }
    public function getUserFirstName() {
        return $this->userFirstName;
    }
    public function setUserFirstName($userFirstName) {
        $this->userFirstName = $userFirstName;
    }
    public function getUserImage() {
        return $this->userImage;
    }
    public function setUserImage($userImage) {
        $this->userImage = $userImage;
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

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateRead
     *
     * @param datetime $dateRead
     */
    public function setDateRead($dateRead)
    {
        $this->dateRead = $dateRead;
    }

    /**
     * Get dateRead
     *
     * @return datetime 
     */
    public function getDateRead()
    {
        return $this->dateRead;
    }

    /**
     * Set type
     *
     * @param Ology\SocialBundle\Entity\NotificationType $type
     */
    public function setType(\Ology\SocialBundle\Entity\NotificationType $type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return Ology\SocialBundle\Entity\NotificationType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set ology
     *
     * @param Ology\SocialBundle\Entity\Ology $ology
     */
    public function setOlogy(\Ology\SocialBundle\Entity\Ology $ology)
    {
        $this->ology = $ology;
    }

    /**
     * Get ology
     *
     * @return Ology\SocialBundle\Entity\Ology 
     */
    public function getOlogy()
    {
        return $this->ology;
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

    /**
     * Set post
     *
     * @param Ology\SocialBundle\Entity\Post $post
     */
    public function setPost(\Ology\SocialBundle\Entity\Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return Ology\SocialBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set comment
     *
     * @param Ology\SocialBundle\Entity\Comment $comment
     */
    public function setComment(\Ology\SocialBundle\Entity\Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return Ology\SocialBundle\Entity\Comment 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user
     *
     * @param Ology\SocialBundle\Entity\User $user
     */
    public function setUser(\Ology\SocialBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set recipient
     *
     * @param Ology\SocialBundle\Entity\User $user
     */
    public function setRecipient(\Ology\SocialBundle\Entity\User $recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * Get user
     *
     * @return Ology\SocialBundle\Entity\User 
     */
    public function getRecipient()
    {
        return $this->recipient;
    }
}