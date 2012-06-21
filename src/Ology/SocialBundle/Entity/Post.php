<?php

namespace Ology\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Posts")
 */
class Post {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable="true")
     */
    protected $author;
    /**
     * @ORM\ManyToOne(targetEntity="Ology", cascade={"persist"})
     * @ORM\JoinColumn(name="first_ology_id", referencedColumnName="id", nullable="true")
     */
    protected $firstOlogy;
    protected $firstOlogyId;
    /**
     * @ORM\Column(name="title", type="string", length=255, nullable="true")
     */
    protected $title;
    /**
     * @ORM\Column(name="html_content", type="text", nullable="true")
     */
    protected $htmlContent;
    /**
     * @ORM\Column(name="text_content", type="text", nullable="true")
     */
    protected $textContent;
    protected $isTextContentStripped;
    /**
     * @ORM\Column(name="image_url", type="string", length=255, nullable="true")
     */
    protected $imageUrl;
    /**
     * @ORM\Column(name="image_source_url", type="string", length=255, nullable="true")
     */
    protected $imageSourceUrl;    
    /**
     * @Assert\File
     */
    protected $imageFile;
    
    /**
     * @ORM\Column(name="image_url_alt1", type="string", length=255, nullable="true")
     */
    protected $image1Url;
    /**
     * @Assert\File
     */
    protected $image1File;
    
    /**
     * @ORM\Column(name="image_url_alt2", type="string", length=255, nullable="true")
     */
    protected $image2Url;
    /**
     * @Assert\File
     */
    protected $image2File;
    
    /**
     * @ORM\Column(name="image_caption", type="string", length=1000, nullable="true")
     */
    protected $imageCaption;
    
    /**
     * @ORM\Column(name="image_alt", type="string", length=1000, nullable="true")
     */
    protected $imageAltText;
    
    /**
     * @ORM\Column(name="audio_url", type="string", length=255, nullable="true")
     */
    protected $audioUrl;
    /**
     * @Assert\File
     */
    protected $audioFile;
    
    /**
     * @ORM\Column(name="slug", type="string", length="500", nullable="true")
     */
    protected $slug;
    
    /**
     * @ORM\Column(name="video_url", type="string", length=255, nullable="true")
     */
    protected $videoUrl;
    /**
     * @ORM\ManyToOne(targetEntity="PostType")
     * @ORM\JoinColumn(name="post_type_id", referencedColumnName="id")
     */
    protected $postType;
    protected $postTypeId;
    /**
     * @ORM\Column(name="creation_date", type="integer")
     */
    protected $creationDate;
    /**
     * @ORM\Column(name="update_date", type="integer", nullable="true")
     */
    protected $updateDate;
    /**
     * @ORM\Column(name="times_ologized", type="integer")
     */
    protected $timesOlogized;
    /**
     * @ORM\Column(name="times_commented", type="integer")
     */
    protected $timesCommented;
    /**
     * @ORM\Column(name="times_loved", type="integer")
     */
    protected $timesLoved;
    /**
     * @ORM\Column(name="times_hated", type="integer")
     */
    protected $timesHated;
    /**
     * @ORM\Column(name="times_hmm", type="integer")
     */
    protected $timesHmm;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="PostsOlogies", mappedBy="post", cascade={"persist"})
     */
    protected $ologyposts;
    
    /**
     * @ORM\Column(name="last_saved", type="integer", nullable="true")
     */
    protected $lastSaved;
    
    /**
     * @ORM\Column(name="meta_keywords", type="string", length=1000, nullable="true")
     */
    protected $metaKeywords;
    
    /**
     * @ORM\Column(name="meta_description", type="string", length=1000, nullable="true")
     */
    protected $metaDescription;
    
    /**
     * @ORM\Column(name="html_title", type="string", length=1000, nullable="true")
     */
    protected $htmlTitle;
    
    /**
     * @ORM\Column(name="meta_title", type="string", length=1000, nullable="true")
     */
    protected $metaTitle;
    
    /**
     * @ORM\ManyToOne(targetEntity="Channel", cascade={"persist"})
     * @ORM\JoinColumn(name="first_channel_id", referencedColumnName="id", nullable="true")
     */
    protected $firstChannel;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="PostsChannels", mappedBy="post", cascade={"persist"})
     */
    protected $channelposts;
    
    /**
     * @ORM\Column(name="cite_title", type="string", length=1000, nullable="true")
     */
    protected $citeTitle;
    
    /**
     * @ORM\Column(name="cite_url", type="string", length=1000, nullable="true")
     */
    protected $citeUrl;
    
    /**
     * @ORM\Column(name="cite_image_url", type="string", length=1000, nullable="true")
     */
    protected $citeImageUrl;
    
    /**
     * @Assert\File
     */
    protected $citeImage;
    
    /**
     * @ORM\Column(name="summary", type="string", length=2000, nullable="true")
     */
    protected $summary;
    
    /**
     * @ORM\Column(name="scheduled_publish", type="integer", nullable="true")
     */
    protected $scheduledPublish;
    
    /**
     * @ORM\Column(name="scheduled_unpublish", type="integer", nullable="true")
     */
    protected $scheduleUnpublish;
    
    /**
     * @ORM\Column(name="tags", type="string", length=1000, nullable="true")
     */
    protected $tags;
    
    /**
     * @ORM\Column(name="priority", type="integer", nullable="true")
     */
    protected $priority;
    
    /**
     * @ORM\Column(name="is_pro", type="integer", nullable="true")
     */
    protected $isProfessional;
    
    /**
     * @ORM\Column(name="is_draft", type="integer", nullable="true")
     */
    protected $isDraft;
    
    protected $isPostPublishEdit;
    
    /**
     * @ORM\ManyToOne(targetEntity="Rating")
     * @ORM\JoinColumn(name="rating_id", referencedColumnName="id", nullable="true")
     */
    protected $rating;
    
    /**
     * @ORM\Column(name="movie_director", type="string", length=300, nullable="true")
     */
    protected $movieDirector;
    
    /**
     * @ORM\Column(name="movie_starring", type="string", length=1000, nullable="true")
     */
    protected $movieStarring;
    
    /**
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumn(name="movie_genre_id", referencedColumnName="id", nullable="true")
     */
    protected $movieGenre;
    
    /**
     * @ORM\Column(name="movie_open_date", type="integer", nullable="true")
     */
    protected $movieOpeningDate;
    
    /**
     * @ORM\Column(name="movie_runtime", type="integer", nullable="true")
     */
    protected $movieRuntime;
    
    /**
     * @ORM\ManyToOne(targetEntity="ParentalRating")
     * @ORM\JoinColumn(name="movie_parent_rating", referencedColumnName="id", nullable="true")
     */
    protected $movieParentalRating;
    
    /**
     * @ORM\Column(name="album_artist", type="string", length=300, nullable="true")
     */
    protected $albumArtist;
    
    /**
     * @ORM\Column(name="album_title", type="string", length=300, nullable="true")
     */
    protected $albumTitle;
    
    /**
     * @ORM\Column(name="album_label", type="string", length=300, nullable="true")
     */
    protected $albumLabel;
    
    /**
     * @ORM\Column(name="album_release_date", type="integer", nullable="true")
     */
    protected $albumReleaseDate;
    
    protected $reOlogizedInfo;
    
    /**
     * @ORM\Column(name="old_id", type="integer", unique="true", nullable="true")
     */
    protected $oldId;
     
    /**
     * @ORM\Column(name="old_alias", type="string", length=200, unique="true", nullable="true")
     */
    protected $oldAlias;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="MostViewedPost", mappedBy="post")
     */
    protected $mostViewed;
    
    protected $canUnreOlogize = false;
    protected $postLink = NULL;

    function __construct() {
        $this->creationDate = time();
        $this->timesCommented = 0;
        $this->timesLoved = 0;
        $this->timesHated = 0;
        $this->timesHmm = 0;
        $this->timesOlogized = 1;
        $this->isTextContentStripped = false;
    }

    public function update($author, $postType, $title, $htmlContent, $timesOlogized) {
        $this->author = $author;
        $this->postType = $postType;
        $this->title = $title;
        $this->htmlContent = $htmlContent;
        $this->timesOlogized = $timesOlogized;
    }

    public function setCanUnreOlogize($canUnreOlogize)
    {
        $this->canUnreOlogize = $canUnreOlogize;
    }
    
    public function getCanUnreOlogize()
    {
        return $this->canUnreOlogize;
    }
    
    /**
     * @param IPostLink $postLink 
     */
    public function setPostLink(IPostLink $postLink = null)
    {
        $this->postLink = $postLink;
    }
    
    /**
     * @return IPostLink 
     */
    public function getPostLink()
    {
        return $this->postLink;
    }
    
    public function addMostViewed(\Ology\SocialBundle\Entity\MostViewedPost $mostViewed)
    {
        $this->mostViewed[] = $mostViewed;
    }

    public function getMostViewed()
    {
        return $this->mostViewed;
    }
    
    public function getReOlogizedInfo() {
        return $this->reOlogizedInfo;
    }
    public function getHtmlContent() {
        return $this->htmlContent;
    }

    public function getIsProfessional() {
        return $this->isProfessional;
    }
    
    public function setIsProfessional($isProfessional) {
        $this->isProfessional = $isProfessional;
    }
    
    public function getIsDraft() {
        return $this->isDraft;
    }
    
    public function setIsDraft($isDraft) {
        $this->isDraft = $isDraft;
    }
    
    public function getFirstOlogyId() {
        return $this->firstOlogyId;
    }

    public function getFirstOlogy() {
        return $this->firstOlogy;
    }
   

    public function getTextContent() {
        return $this->textContent;
    }
    
    public function getIsTextContentStripped() {
        return $this->isTextContentStripped;
    }

    public function stripTextContent($length) {
        if (strlen($this->textContent) > $length) {
            $this->textContent = substr($this->textContent, 0, $length);
            $this->isTextContentStripped = true;
        }
    }
    
    public function getImageUrl() {
        return $this->imageUrl;
    }
    public function getImageSourceUrl() {
        return $this->imageSourceUrl;
    }    
    public function getImage1Url() {
        return $this->image1Url;
    }
    public function getImage2Url() {
        return $this->image2Url;
    }
    public function getImageAltText() {
        return $this->imageAltText;
    }
    public function getImageCaption() {
        return $this->imageCaption;
    }
    public function setImageAltText($a) {
        $this->imageAltText = $a;
    }
    public function setImageCaption($a) {
        $this->imageCaption = $a;
    }
    public function getImageFile() {
        return $this->imageFile;
    }
    public function getImage1File() {
        return $this->image1File;
    }
    public function getImage2File() {
        return $this->image2File;
    }

    public function getIsPostPublishEdit() {
        return $this->isPostPublishEdit;
    }
    public function setIsPostPublishEdit($pp) {
        $this->isPostPublishEdit = $pp;
    }
    public function getAudioUrl() {
        return $this->audioUrl;
    }

    public function getAudioFile() {
        return $this->audioFile;
    }

    public function getVideoUrl() {
        return $this->videoUrl;
    }

    public function setFirstOlogyId($firstOlogyId) {
        $this->firstOlogyId = $firstOlogyId;
    }

    public function setFirstOlogy($firstOlogy = NULL) {
        $this->firstOlogy = $firstOlogy;
    }

    
    public function setHtmlContent($htmlContent) {
        $this->htmlContent = $htmlContent;
    }

    public function setTextContent($textContent) {
        $this->textContent = $textContent;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }
    public function setImageSourceUrl($imageSourceUrl) {
        $this->imageSourceUrl = $imageSourceUrl;
    }
    public function setImage1Url($imageUrl) {
        $this->image1Url = $imageUrl;
    }
    public function setImage2Url($imageUrl) {
        $this->image2Url = $imageUrl;
    }
    public function setImage1File($imageFile) {
        $this->image1File = $imageFile;
    }
    public function setImage2File($imageFile) {
        $this->image2File = $imageFile;
    }
    public function setImageFile($imageFile) {
        $this->imageFile = $imageFile;
    }

    public function setAudioUrl($audioUrl) {
        $this->audioUrl = $audioUrl;
    }

    public function setAudioFile($audioFile) {
        $this->audioFile = $audioFile;
    }

    public function setVideoUrl($videoUrl) {
        $this->videoUrl = $videoUrl;
    }

    public function incrTimeCommented() {
        $this->timesCommented++;
    }

    public function decrTimeCommented() {
        $this->timesCommented--;
    }

    public function getTimesCommented() {
        return $this->timesCommented;
    }

    public function setTimesCommented($timesCommented) {
        $this->timesCommented = $timesCommented;
    }
    public function incrTimeLoved() {
        $this->timesLoved++;
    }

    public function decrTimeLoved() {
        $this->timesLoved--;
    }

    public function getTimesLoved() {
        return $this->timesLoved;
    }

    public function setTimesLoved($timesLoved) {
        $this->timesLoved = $timesLoved;
    }
    public function incrTimeHated() {
        $this->timesHated++;
    }

    public function decrTimeHated() {
        $this->timesHated--;
    }

    public function getTimesHated() {
        return $this->timesHated;
    }

    public function setTimesHated($timesHated) {
        $this->timesHated = $timesHated;
    
    }
    
    public function incrTimeHmm() {
        $this->timesHmm++;
    }

    public function decrTimeHmm() {
        $this->timesHmm--;
    }

    public function getTimesHmm() {
        return $this->timesHmm;
    }

    public function setTimesHmm($timesHmm) {
        $this->timesHmm = $timesHmm;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Set title
     *
     * @param text $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return text 
     */
    public function getTitle() {
        return $this->title;
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
        $this->updateDate = $updateDate;
    }

    public function getUpdateDate() {
        return $this->updateDate;
    }

    public function getSlug()  
    {
        return $this->slug;
    }
    
    public function setSlug($slug)
    {
        $this->slug = $slug;  
    }
    
    /**
     * Set timesOlogized
     *
     * @param integer $timesOlogized
     */
    public function setTimesOlogized($timesOlogized) {
        $this->timesOlogized = $timesOlogized;
    }

    /**
     * Get timesOlogized
     *
     * @return integer 
     */
    public function getTimesOlogized() {
        return $this->timesOlogized;
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
     * Set post_type
     *
     * @param Ology\SocialBundle\Entity\PostType $postType
     */
    public function setPostType(\Ology\SocialBundle\Entity\PostType $postType) {
        $this->postType = $postType;
    }

    public function setPostTypeId($postTypeId) {
        $this->postTypeId = $postTypeId;
    }

    /**
     * Get post_type
     *
     * @return Ology\SocialBundle\Entity\PostType 
     */
    public function getPostType() {
        return $this->postType;
    }

    public function getPostTypeId() {
        return $this->postTypeId;
    }
    
    public function setReOlogizedInfo($newOlogyId) {
        foreach ($this->ologyposts as $op) {
            if ($this->firstOlogy->getId() != $newOlogyId 
                    && $op->getOlogy()->getId() == $newOlogyId) {
                $this->reOlogizedInfo = $op;
                $this->creationDate = $op->getPostedAt();
                break;
            }
        }
    }


    /**
     * Set lastSaved
     *
     * @param integer $lastSaved
     */
    public function setLastSaved($lastSaved)
    {
        $this->lastSaved = $lastSaved;
    }

    /**
     * Get lastSaved
     *
     * @return integer 
     */
    public function getLastSaved()
    {
        return $this->lastSaved;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set htmlTitle
     *
     * @param string $htmlTitle
     */
    public function setHtmlTitle($htmlTitle)
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * Get htmlTitle
     *
     * @return string 
     */
    public function getHtmlTitle()
    {
        return $this->htmlTitle;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set citeTitle
     *
     * @param string $citeTitle
     */
    public function setCiteTitle($citeTitle)
    {
        $this->citeTitle = $citeTitle;
    }

    /**
     * Get citeTitle
     *
     * @return string 
     */
    public function getCiteTitle()
    {
        return $this->citeTitle;
    }

    /**
     * Set citeUrl
     *
     * @param string $citeUrl
     */
    public function setCiteUrl($citeUrl)
    {
        $this->citeUrl = $citeUrl;
    }

    /**
     * Get citeUrl
     *
     * @return string 
     */
    public function getCiteUrl()
    {
        return $this->citeUrl;
    }

    /**
     * Set citeImage
     *
     * @param string $citeImage
     */
    public function setCiteImage($citeImage)
    {
        $this->citeImage = $citeImage;
    }
    public function setCiteImageUrl($citeImage)
    {
        $this->citeImageUrl = $citeImage;
    }

    /**
     * Get citeImage
     *
     * @return string 
     */
    public function getCiteImage()
    {
        return $this->citeImage;
    }
    public function getCiteImageUrl()
    {
        return $this->citeImageUrl;
    }

    /**
     * Set summary
     *
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set scheduledPublish
     *
     * @param integer $scheduledPublish
     */
    public function setScheduledPublish($scheduledPublish)
    {
        $this->scheduledPublish = $scheduledPublish;
    }

    /**
     * Get scheduledPublish
     *
     * @return integer 
     */
    public function getScheduledPublish()
    {
        return $this->scheduledPublish;
    }

    /**
     * Set scheduleUnpublish
     *
     * @param integer $scheduleUnpublish
     */
    public function setScheduleUnpublish($scheduleUnpublish)
    {
        $this->scheduleUnpublish = $scheduleUnpublish;
    }

    /**
     * Get scheduleUnpublish
     *
     * @return integer 
     */
    public function getScheduleUnpublish()
    {
        return $this->scheduleUnpublish;
    }

    /**
     * Set tags
     *
     * @param string $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    public function addPostsOlogies(\Ology\SocialBundle\Entity\PostsOlogies $ologyposts)
    {
        $this->ologyposts[] = $ologyposts;
    }
    
    public function setChannelposts($pc)
    {
        $this->channelposts = $pc;
    }
    
    public function addChannelposts(\Ology\SocialBundle\Entity\PostsChannels $pc)
    {
        $this->channelposts[] = $pc;
    }

    public function getOlogyposts()
    {
        return $this->ologyposts;
    }
    public function getChannelposts()
    {
        return $this->channelposts;
    }
    
    /**
     * Set movieDirector
     *
     * @param string $movieDirector
     */
    public function setMovieDirector($movieDirector)
    {
        $this->movieDirector = $movieDirector;
    }

    /**
     * Get movieDirector
     *
     * @return string 
     */
    public function getMovieDirector()
    {
        return $this->movieDirector;
    }

    /**
     * Set movieStarring
     *
     * @param string $movieStarring
     */
    public function setMovieStarring($movieStarring)
    {
        $this->movieStarring = $movieStarring;
    }

    /**
     * Get movieStarring
     *
     * @return string 
     */
    public function getMovieStarring()
    {
        return $this->movieStarring;
    }

    /**
     * Set movieOpeningDate
     *
     * @param integer $movieOpeningDate
     */
    public function setMovieOpeningDate($movieOpeningDate)
    {
        $this->movieOpeningDate = $movieOpeningDate;
    }

    /**
     * Get movieOpeningDate
     *
     * @return integer 
     */
    public function getMovieOpeningDate()
    {
        return $this->movieOpeningDate;
    }

    /**
     * Set movieRuntime
     *
     * @param integer $movieRuntime
     */
    public function setMovieRuntime($movieRuntime)
    {
        $this->movieRuntime = $movieRuntime;
    }

    /**
     * Get movieRuntime
     *
     * @return integer 
     */
    public function getMovieRuntime()
    {
        return $this->movieRuntime;
    }

    /**
     * Set albumArtist
     *
     * @param string $albumArtist
     */
    public function setAlbumArtist($albumArtist)
    {
        $this->albumArtist = $albumArtist;
    }

    /**
     * Get albumArtist
     *
     * @return string 
     */
    public function getAlbumArtist()
    {
        return $this->albumArtist;
    }

    /**
     * Set albumTitle
     *
     * @param string $albumTitle
     */
    public function setAlbumTitle($albumTitle)
    {
        $this->albumTitle = $albumTitle;
    }

    /**
     * Get albumTitle
     *
     * @return string 
     */
    public function getAlbumTitle()
    {
        return $this->albumTitle;
    }

    /**
     * Set albumLabel
     *
     * @param string $albumLabel
     */
    public function setAlbumLabel($albumLabel)
    {
        $this->albumLabel = $albumLabel;
    }

    /**
     * Get albumLabel
     *
     * @return string 
     */
    public function getAlbumLabel()
    {
        return $this->albumLabel;
    }

    /**
     * Set albumReleaseDate
     *
     * @param integer $albumReleaseDate
     */
    public function setAlbumReleaseDate($albumReleaseDate)
    {
        $this->albumReleaseDate = $albumReleaseDate;
    }

    /**
     * Get albumReleaseDate
     *
     * @return integer 
     */
    public function getAlbumReleaseDate()
    {
        return $this->albumReleaseDate;
    }

    /**
     * Set firstChannel
     *
     * @param Ology\SocialBundle\Entity\Channel $firstChannel
     */
    public function setFirstChannel(\Ology\SocialBundle\Entity\Channel $firstChannel = null)
    {
        $this->firstChannel = $firstChannel;
    }

    /**
     * Get firstChannel
     *
     * @return Ology\SocialBundle\Entity\Channel 
     */
    public function getFirstChannel()
    {
        return $this->firstChannel;
    }

    /**
     * Set movieRating
     *
     * @param Ology\SocialBundle\Entity\Rating $movieRating
     */
    public function setRating(\Ology\SocialBundle\Entity\Rating $rating)
    {
        $this->rating = $rating;
    }

    /**
     * Get movieRating
     *
     * @return Ology\SocialBundle\Entity\Rating 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set movieGenre
     *
     * @param Ology\SocialBundle\Entity\Genre $movieGenre
     */
    public function setMovieGenre(\Ology\SocialBundle\Entity\Genre $movieGenre)
    {
        $this->movieGenre = $movieGenre;
    }

    /**
     * Get movieGenre
     *
     * @return Ology\SocialBundle\Entity\Genre 
     */
    public function getMovieGenre()
    {
        return $this->movieGenre;
    }

    /**
     * Set movieParentalRating
     *
     * @param Ology\SocialBundle\Entity\ParentalRating $movieParentalRating
     */
    public function setMovieParentalRating(\Ology\SocialBundle\Entity\ParentalRating $movieParentalRating)
    {
        $this->movieParentalRating = $movieParentalRating;
    }

    /**
     * Get movieParentalRating
     *
     * @return Ology\SocialBundle\Entity\ParentalRating 
     */
    public function getMovieParentalRating()
    {
        return $this->movieParentalRating;
    }

    /**
     * Set oldId
     *
     * @param integer $oldId
     */
    public function setOldId($oldId)
    {
        $this->oldId = $oldId;
    }
    
     /**
     * Get oldId
     *
     * @return integer
     */
    public function getOldId()
    {
        return $this->oldId;
    }
    
     /**
     * Set oldAlaias
     *
     * @param string $oldAlias
     */
    public function setOldAlias($oldAlias)
    {
        $this->oldAlias = $oldAlias;
    }
    
     /**
     * Get oldId
     *
     * @return string
     */
    public function getOldAlias()
    {
        return $this->oldAlias;
    }
}