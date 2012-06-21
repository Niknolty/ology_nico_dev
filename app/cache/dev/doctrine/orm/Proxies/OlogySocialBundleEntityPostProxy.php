<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class OlogySocialBundleEntityPostProxy extends \Ology\SocialBundle\Entity\Post implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function update($author, $postType, $title, $htmlContent, $timesOlogized)
    {
        $this->__load();
        return parent::update($author, $postType, $title, $htmlContent, $timesOlogized);
    }

    public function setCanUnreOlogize($canUnreOlogize)
    {
        $this->__load();
        return parent::setCanUnreOlogize($canUnreOlogize);
    }

    public function getCanUnreOlogize()
    {
        $this->__load();
        return parent::getCanUnreOlogize();
    }

    public function setPostLink(\Ology\SocialBundle\Entity\IPostLink $postLink = NULL)
    {
        $this->__load();
        return parent::setPostLink($postLink);
    }

    public function getPostLink()
    {
        $this->__load();
        return parent::getPostLink();
    }

    public function addMostViewed(\Ology\SocialBundle\Entity\MostViewedPost $mostViewed)
    {
        $this->__load();
        return parent::addMostViewed($mostViewed);
    }

    public function getMostViewed()
    {
        $this->__load();
        return parent::getMostViewed();
    }

    public function getReOlogizedInfo()
    {
        $this->__load();
        return parent::getReOlogizedInfo();
    }

    public function getHtmlContent()
    {
        $this->__load();
        return parent::getHtmlContent();
    }

    public function getIsProfessional()
    {
        $this->__load();
        return parent::getIsProfessional();
    }

    public function setIsProfessional($isProfessional)
    {
        $this->__load();
        return parent::setIsProfessional($isProfessional);
    }

    public function getIsDraft()
    {
        $this->__load();
        return parent::getIsDraft();
    }

    public function setIsDraft($isDraft)
    {
        $this->__load();
        return parent::setIsDraft($isDraft);
    }

    public function getFirstOlogyId()
    {
        $this->__load();
        return parent::getFirstOlogyId();
    }

    public function getFirstOlogy()
    {
        $this->__load();
        return parent::getFirstOlogy();
    }

    public function getTextContent()
    {
        $this->__load();
        return parent::getTextContent();
    }

    public function getIsTextContentStripped()
    {
        $this->__load();
        return parent::getIsTextContentStripped();
    }

    public function stripTextContent($length)
    {
        $this->__load();
        return parent::stripTextContent($length);
    }

    public function getImageUrl()
    {
        $this->__load();
        return parent::getImageUrl();
    }

    public function getImageSourceUrl()
    {
        $this->__load();
        return parent::getImageSourceUrl();
    }

    public function getImage1Url()
    {
        $this->__load();
        return parent::getImage1Url();
    }

    public function getImage2Url()
    {
        $this->__load();
        return parent::getImage2Url();
    }

    public function getImageAltText()
    {
        $this->__load();
        return parent::getImageAltText();
    }

    public function getImageCaption()
    {
        $this->__load();
        return parent::getImageCaption();
    }

    public function setImageAltText($a)
    {
        $this->__load();
        return parent::setImageAltText($a);
    }

    public function setImageCaption($a)
    {
        $this->__load();
        return parent::setImageCaption($a);
    }

    public function getImageFile()
    {
        $this->__load();
        return parent::getImageFile();
    }

    public function getImage1File()
    {
        $this->__load();
        return parent::getImage1File();
    }

    public function getImage2File()
    {
        $this->__load();
        return parent::getImage2File();
    }

    public function getIsPostPublishEdit()
    {
        $this->__load();
        return parent::getIsPostPublishEdit();
    }

    public function setIsPostPublishEdit($pp)
    {
        $this->__load();
        return parent::setIsPostPublishEdit($pp);
    }

    public function getAudioUrl()
    {
        $this->__load();
        return parent::getAudioUrl();
    }

    public function getAudioFile()
    {
        $this->__load();
        return parent::getAudioFile();
    }

    public function getVideoUrl()
    {
        $this->__load();
        return parent::getVideoUrl();
    }

    public function setFirstOlogyId($firstOlogyId)
    {
        $this->__load();
        return parent::setFirstOlogyId($firstOlogyId);
    }

    public function setFirstOlogy($firstOlogy = NULL)
    {
        $this->__load();
        return parent::setFirstOlogy($firstOlogy);
    }

    public function setHtmlContent($htmlContent)
    {
        $this->__load();
        return parent::setHtmlContent($htmlContent);
    }

    public function setTextContent($textContent)
    {
        $this->__load();
        return parent::setTextContent($textContent);
    }

    public function setImageUrl($imageUrl)
    {
        $this->__load();
        return parent::setImageUrl($imageUrl);
    }

    public function setImageSourceUrl($imageSourceUrl)
    {
        $this->__load();
        return parent::setImageSourceUrl($imageSourceUrl);
    }

    public function setImage1Url($imageUrl)
    {
        $this->__load();
        return parent::setImage1Url($imageUrl);
    }

    public function setImage2Url($imageUrl)
    {
        $this->__load();
        return parent::setImage2Url($imageUrl);
    }

    public function setImage1File($imageFile)
    {
        $this->__load();
        return parent::setImage1File($imageFile);
    }

    public function setImage2File($imageFile)
    {
        $this->__load();
        return parent::setImage2File($imageFile);
    }

    public function setImageFile($imageFile)
    {
        $this->__load();
        return parent::setImageFile($imageFile);
    }

    public function setAudioUrl($audioUrl)
    {
        $this->__load();
        return parent::setAudioUrl($audioUrl);
    }

    public function setAudioFile($audioFile)
    {
        $this->__load();
        return parent::setAudioFile($audioFile);
    }

    public function setVideoUrl($videoUrl)
    {
        $this->__load();
        return parent::setVideoUrl($videoUrl);
    }

    public function incrTimeCommented()
    {
        $this->__load();
        return parent::incrTimeCommented();
    }

    public function decrTimeCommented()
    {
        $this->__load();
        return parent::decrTimeCommented();
    }

    public function getTimesCommented()
    {
        $this->__load();
        return parent::getTimesCommented();
    }

    public function setTimesCommented($timesCommented)
    {
        $this->__load();
        return parent::setTimesCommented($timesCommented);
    }

    public function incrTimeLoved()
    {
        $this->__load();
        return parent::incrTimeLoved();
    }

    public function decrTimeLoved()
    {
        $this->__load();
        return parent::decrTimeLoved();
    }

    public function getTimesLoved()
    {
        $this->__load();
        return parent::getTimesLoved();
    }

    public function setTimesLoved($timesLoved)
    {
        $this->__load();
        return parent::setTimesLoved($timesLoved);
    }

    public function incrTimeHated()
    {
        $this->__load();
        return parent::incrTimeHated();
    }

    public function decrTimeHated()
    {
        $this->__load();
        return parent::decrTimeHated();
    }

    public function getTimesHated()
    {
        $this->__load();
        return parent::getTimesHated();
    }

    public function setTimesHated($timesHated)
    {
        $this->__load();
        return parent::setTimesHated($timesHated);
    }

    public function incrTimeHmm()
    {
        $this->__load();
        return parent::incrTimeHmm();
    }

    public function decrTimeHmm()
    {
        $this->__load();
        return parent::decrTimeHmm();
    }

    public function getTimesHmm()
    {
        $this->__load();
        return parent::getTimesHmm();
    }

    public function setTimesHmm($timesHmm)
    {
        $this->__load();
        return parent::setTimesHmm($timesHmm);
    }

    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function setTitle($title)
    {
        $this->__load();
        return parent::setTitle($title);
    }

    public function getTitle()
    {
        $this->__load();
        return parent::getTitle();
    }

    public function setCreationDate($creationDate)
    {
        $this->__load();
        return parent::setCreationDate($creationDate);
    }

    public function getCreationDate()
    {
        $this->__load();
        return parent::getCreationDate();
    }

    public function setUpdateDate($updateDate)
    {
        $this->__load();
        return parent::setUpdateDate($updateDate);
    }

    public function getUpdateDate()
    {
        $this->__load();
        return parent::getUpdateDate();
    }

    public function getSlug()
    {
        $this->__load();
        return parent::getSlug();
    }

    public function setSlug($slug)
    {
        $this->__load();
        return parent::setSlug($slug);
    }

    public function setTimesOlogized($timesOlogized)
    {
        $this->__load();
        return parent::setTimesOlogized($timesOlogized);
    }

    public function getTimesOlogized()
    {
        $this->__load();
        return parent::getTimesOlogized();
    }

    public function setAuthor(\Ology\SocialBundle\Entity\User $author)
    {
        $this->__load();
        return parent::setAuthor($author);
    }

    public function getAuthor()
    {
        $this->__load();
        return parent::getAuthor();
    }

    public function setPostType(\Ology\SocialBundle\Entity\PostType $postType)
    {
        $this->__load();
        return parent::setPostType($postType);
    }

    public function setPostTypeId($postTypeId)
    {
        $this->__load();
        return parent::setPostTypeId($postTypeId);
    }

    public function getPostType()
    {
        $this->__load();
        return parent::getPostType();
    }

    public function getPostTypeId()
    {
        $this->__load();
        return parent::getPostTypeId();
    }

    public function setReOlogizedInfo($newOlogyId)
    {
        $this->__load();
        return parent::setReOlogizedInfo($newOlogyId);
    }

    public function setLastSaved($lastSaved)
    {
        $this->__load();
        return parent::setLastSaved($lastSaved);
    }

    public function getLastSaved()
    {
        $this->__load();
        return parent::getLastSaved();
    }

    public function setMetaKeywords($metaKeywords)
    {
        $this->__load();
        return parent::setMetaKeywords($metaKeywords);
    }

    public function getMetaKeywords()
    {
        $this->__load();
        return parent::getMetaKeywords();
    }

    public function setMetaDescription($metaDescription)
    {
        $this->__load();
        return parent::setMetaDescription($metaDescription);
    }

    public function getMetaDescription()
    {
        $this->__load();
        return parent::getMetaDescription();
    }

    public function setHtmlTitle($htmlTitle)
    {
        $this->__load();
        return parent::setHtmlTitle($htmlTitle);
    }

    public function getHtmlTitle()
    {
        $this->__load();
        return parent::getHtmlTitle();
    }

    public function setMetaTitle($metaTitle)
    {
        $this->__load();
        return parent::setMetaTitle($metaTitle);
    }

    public function getMetaTitle()
    {
        $this->__load();
        return parent::getMetaTitle();
    }

    public function setCiteTitle($citeTitle)
    {
        $this->__load();
        return parent::setCiteTitle($citeTitle);
    }

    public function getCiteTitle()
    {
        $this->__load();
        return parent::getCiteTitle();
    }

    public function setCiteUrl($citeUrl)
    {
        $this->__load();
        return parent::setCiteUrl($citeUrl);
    }

    public function getCiteUrl()
    {
        $this->__load();
        return parent::getCiteUrl();
    }

    public function setCiteImage($citeImage)
    {
        $this->__load();
        return parent::setCiteImage($citeImage);
    }

    public function setCiteImageUrl($citeImage)
    {
        $this->__load();
        return parent::setCiteImageUrl($citeImage);
    }

    public function getCiteImage()
    {
        $this->__load();
        return parent::getCiteImage();
    }

    public function getCiteImageUrl()
    {
        $this->__load();
        return parent::getCiteImageUrl();
    }

    public function setSummary($summary)
    {
        $this->__load();
        return parent::setSummary($summary);
    }

    public function getSummary()
    {
        $this->__load();
        return parent::getSummary();
    }

    public function setScheduledPublish($scheduledPublish)
    {
        $this->__load();
        return parent::setScheduledPublish($scheduledPublish);
    }

    public function getScheduledPublish()
    {
        $this->__load();
        return parent::getScheduledPublish();
    }

    public function setScheduleUnpublish($scheduleUnpublish)
    {
        $this->__load();
        return parent::setScheduleUnpublish($scheduleUnpublish);
    }

    public function getScheduleUnpublish()
    {
        $this->__load();
        return parent::getScheduleUnpublish();
    }

    public function setTags($tags)
    {
        $this->__load();
        return parent::setTags($tags);
    }

    public function getTags()
    {
        $this->__load();
        return parent::getTags();
    }

    public function setPriority($priority)
    {
        $this->__load();
        return parent::setPriority($priority);
    }

    public function getPriority()
    {
        $this->__load();
        return parent::getPriority();
    }

    public function addPostsOlogies(\Ology\SocialBundle\Entity\PostsOlogies $ologyposts)
    {
        $this->__load();
        return parent::addPostsOlogies($ologyposts);
    }

    public function setChannelposts($pc)
    {
        $this->__load();
        return parent::setChannelposts($pc);
    }

    public function addChannelposts(\Ology\SocialBundle\Entity\PostsChannels $pc)
    {
        $this->__load();
        return parent::addChannelposts($pc);
    }

    public function getOlogyposts()
    {
        $this->__load();
        return parent::getOlogyposts();
    }

    public function getChannelposts()
    {
        $this->__load();
        return parent::getChannelposts();
    }

    public function setMovieDirector($movieDirector)
    {
        $this->__load();
        return parent::setMovieDirector($movieDirector);
    }

    public function getMovieDirector()
    {
        $this->__load();
        return parent::getMovieDirector();
    }

    public function setMovieStarring($movieStarring)
    {
        $this->__load();
        return parent::setMovieStarring($movieStarring);
    }

    public function getMovieStarring()
    {
        $this->__load();
        return parent::getMovieStarring();
    }

    public function setMovieOpeningDate($movieOpeningDate)
    {
        $this->__load();
        return parent::setMovieOpeningDate($movieOpeningDate);
    }

    public function getMovieOpeningDate()
    {
        $this->__load();
        return parent::getMovieOpeningDate();
    }

    public function setMovieRuntime($movieRuntime)
    {
        $this->__load();
        return parent::setMovieRuntime($movieRuntime);
    }

    public function getMovieRuntime()
    {
        $this->__load();
        return parent::getMovieRuntime();
    }

    public function setAlbumArtist($albumArtist)
    {
        $this->__load();
        return parent::setAlbumArtist($albumArtist);
    }

    public function getAlbumArtist()
    {
        $this->__load();
        return parent::getAlbumArtist();
    }

    public function setAlbumTitle($albumTitle)
    {
        $this->__load();
        return parent::setAlbumTitle($albumTitle);
    }

    public function getAlbumTitle()
    {
        $this->__load();
        return parent::getAlbumTitle();
    }

    public function setAlbumLabel($albumLabel)
    {
        $this->__load();
        return parent::setAlbumLabel($albumLabel);
    }

    public function getAlbumLabel()
    {
        $this->__load();
        return parent::getAlbumLabel();
    }

    public function setAlbumReleaseDate($albumReleaseDate)
    {
        $this->__load();
        return parent::setAlbumReleaseDate($albumReleaseDate);
    }

    public function getAlbumReleaseDate()
    {
        $this->__load();
        return parent::getAlbumReleaseDate();
    }

    public function setFirstChannel(\Ology\SocialBundle\Entity\Channel $firstChannel = NULL)
    {
        $this->__load();
        return parent::setFirstChannel($firstChannel);
    }

    public function getFirstChannel()
    {
        $this->__load();
        return parent::getFirstChannel();
    }

    public function setRating(\Ology\SocialBundle\Entity\Rating $rating)
    {
        $this->__load();
        return parent::setRating($rating);
    }

    public function getRating()
    {
        $this->__load();
        return parent::getRating();
    }

    public function setMovieGenre(\Ology\SocialBundle\Entity\Genre $movieGenre)
    {
        $this->__load();
        return parent::setMovieGenre($movieGenre);
    }

    public function getMovieGenre()
    {
        $this->__load();
        return parent::getMovieGenre();
    }

    public function setMovieParentalRating(\Ology\SocialBundle\Entity\ParentalRating $movieParentalRating)
    {
        $this->__load();
        return parent::setMovieParentalRating($movieParentalRating);
    }

    public function getMovieParentalRating()
    {
        $this->__load();
        return parent::getMovieParentalRating();
    }

    public function setOldId($oldId)
    {
        $this->__load();
        return parent::setOldId($oldId);
    }

    public function getOldId()
    {
        $this->__load();
        return parent::getOldId();
    }

    public function setOldAlias($oldAlias)
    {
        $this->__load();
        return parent::setOldAlias($oldAlias);
    }

    public function getOldAlias()
    {
        $this->__load();
        return parent::getOldAlias();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'title', 'htmlContent', 'textContent', 'imageUrl', 'imageSourceUrl', 'image1Url', 'image2Url', 'imageCaption', 'imageAltText', 'audioUrl', 'slug', 'videoUrl', 'creationDate', 'updateDate', 'timesOlogized', 'timesCommented', 'timesLoved', 'timesHated', 'timesHmm', 'lastSaved', 'metaKeywords', 'metaDescription', 'htmlTitle', 'metaTitle', 'citeTitle', 'citeUrl', 'citeImageUrl', 'summary', 'scheduledPublish', 'scheduleUnpublish', 'tags', 'priority', 'isProfessional', 'isDraft', 'movieDirector', 'movieStarring', 'movieOpeningDate', 'movieRuntime', 'albumArtist', 'albumTitle', 'albumLabel', 'albumReleaseDate', 'oldId', 'oldAlias', 'author', 'firstOlogy', 'postType', 'ologyposts', 'firstChannel', 'channelposts', 'rating', 'movieGenre', 'movieParentalRating', 'mostViewed');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}