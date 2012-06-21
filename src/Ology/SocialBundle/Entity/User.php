<?php

namespace Ology\SocialBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ology\SocialBundle\Resources\config\config_path;

require(dirname(__FILE__) . "/../Resources/config/config_var.php");

/**
 * @ORM\Entity
 * @ORM\Table(name="Users")
 */
class User extends BaseUser {

    const FB_ID = "fbId";
    const FB_TOKEN = "fbtoken";
    const EMAIL = "email";
    const EMAIL_CAN = "email_canonical";
    const ENABLED = "enabled";
    const USERNAME = "username";
    const USERNAME_CAN = "username_canonical";
    const FIRSTNAME = "first_name";
    const LASTNAME = "last_name";
    const LOCKED = "locked";
    const EMAIL_INIT = "init_email";
    const CRED_EXPIRED = "credentials_expired";
    const LAST_RETRIEVED_FB = "last_fb";
    const LAST_BUGGED = "last_bugged";
    const TWITTER_ID = "twitterId";
    const TWITTER_USERNAME = "twitterUsername";

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="fb_token", length=300, nullable="true")
     */
    protected $fbToken;

    /**
     * @ORM\Column(type="string", name="fb_id", length=300, nullable="true")
     */
    protected $fbId;

    /**
     * @ORM\Column(type="string", name="fb_username", length=256, nullable="true")
     */
    protected $fbUsername;

    /**
     * @ORM\Column(type="string", name="twitter_id", length=300, nullable="true")
     */
    protected $twitterId;

    /**
     * @ORM\Column(type="string", name="twitter_username", length=256, nullable="true")
     */
    protected $twitterUsername;

    /**
     * @ORM\Column(name="first_name", type="string", length="16", nullable="true")
     *
     * @Assert\NotBlank(message="Please enter your first name.", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="1", message="The name is too short.", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="16", message="The name is too long.", groups={"Registration", "Profile"})
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length="16", nullable="true")
     *
     * @Assert\NotBlank(message="Please enter your last name.", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="1", message="The name is too short.")
     * @Assert\MaxLength(limit="16", message="The name is too long.")
     */
    protected $lastName;

    /**
     * @ORM\Column(name="sex", type="string", length="10", nullable="true")
     */
    protected $sex;

    /**
     * @ORM\Column(name="birthday", type="string", length="20", nullable="true")
     */
    protected $birthday;

    /**
     * @ORM\Column(name="create_date", type="integer")
     */
    protected $creationDate;
    

    /**
     * @ORM\Column(name="last_access",  type="integer", nullable="true")
     */
    protected $lastAcces;

    /**
     * @ORM\Column(name="self_summary", type="string", length="128", nullable="true")
     * @Assert\MaxLength(limit="100", message="The summary is too long.")
     */
    protected $summary;

    /**
     * @ORM\Column(name="image_url", type="string", length=255, nullable="true")
     */
    protected $imageUrl;

    /**
     * @Assert\File()
     */
    protected $imageFile;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="User")
     * @ORM\JoinColumn(name="invited_by", referencedColumnName="id")
     * @ORM\Column(nullable="true")
     */
    protected $invitedBy;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="inviter_id", referencedColumnName="id")
     */
    protected $inviter;

    /**
     * @ORM\Column(type="string", name="init_email", length=255, nullable="true")
     */
    protected $initEmail;

    /**
     * @ORM\Column(type="boolean", name="is_active", nullable="false")
     */
    protected $isActive = 1;
    
    /**
     * @ORM\Column(type="string", name="tips_list", length=255, nullable="true")
     */
    protected $tipsList;

    /**
     * @ORM\Column(type="boolean", name="do_not_email", nullable="true")
     */
    protected $doNotEmail;
    
    /**
     * @ORM\Column(type="boolean", name="show_start_bar", nullable="true")
     */
    protected $showGetStartedBar;

    /**
     * @ORM\Column(type="boolean", name="mail_new_member")
     */
    protected $acceptsNotifNewMember;

    /**
     * @ORM\Column(type="boolean", name="mail_new_post")
     */
    protected $acceptsNotifNewPost;

    /**
     * @ORM\Column(type="boolean", name="mail_new_com_own_post")
     */
    protected $acceptsNotifNewCommentOwnPost;

    /**
     * @ORM\Column(type="boolean", name="mail_new_com_oth_post")
     */
    protected $acceptsNotifNewCommentOtherPost;
    
    /**
     * @ORM\Column(type="boolean", name="mail_new_user_follower")
     */
    protected $acceptsNotifNewFollower;

    /**
     * @ORM\Column(type="string", length=255, name="location", nullable="true")
     */
    protected $location;

    /**
     * @ORM\Column(type="string", length=255, name="occupation", nullable="true")
     */
    protected $occupation;

    /**
     * @ORM\Column(type="text", name="ology_top1", nullable="true")
     */
    protected $top1;

    /**
     * @ORM\Column(type="string", length=255, name="ology_top2", nullable="true")
     */
    protected $top2;

    /**
     * @ORM\Column(type="string", length=255, name="ology_top3", nullable="true")
     */
    protected $top3;

    /**
     * @ORM\Column(type="string", length=255, name="ology_website1", nullable="true")
     */
    protected $website1;

    /**
     * @ORM\Column(type="string", length=255, name="ology_website2", nullable="true")
     */
    protected $website2;

    /**
     * @ORM\Column(type="string", length=255, name="ology_website3", nullable="true")
     */
    protected $website3;

    /**
     * @ORM\Column(type="boolean", name="display_Year", nullable="true")
     */
    protected $displayYear;

    /**
     * @ORM\Column(type="boolean", name="display_Bday", nullable="true")
     */
    protected $displayBday;
    
    /**
     * @ORM\Column(type="boolean", name="display_start_bar", nullable="false")
     */
    protected $displayStartBar;

    /**
     * @ORM\Column(name="last_bugged",  type="integer", nullable="true")
     */
    protected $lastBuggedViaEmail;

    /**
     * @ORM\Column(name="last_fb",  type="integer", nullable="true")
     */
    protected $lastGotFbInfo;

    /**
     * @ORM\Column(type="string", name="editor_title", length=256, nullable="true")
     */
    protected $editorTitle;

    /**
     * @ORM\Column(type="string", name="editor_twitter_id", length=256, nullable="true")
     */
    protected $editorTwitterId;

    /**
     * @ORM\ManyToOne(targetEntity="Channel")
     * @ORM\JoinColumn(name="main_channel_id", referencedColumnName="id", nullable="true")
     */
    protected $mainChannel;
    protected $changePassword;
    protected $confirmChangePassword;
    protected $bdayDay;
    protected $bdayMonth;
    protected $bdayYear;

    /*
     * @Assert\NotBlank(message="Please agree to the terms of service", groups={"Registration", "Profile"})
     */
    protected $termOfService;

    public function getEditorTitle() {
        return $this->editorTitle;
    }

    public function setEditorTitle($editorTitle) {
        $this->editorTitle = $editorTitle;
    }

    public function getEditorTwitterId() {
        $prefixes = array("twitter.com", "www.twitter.com", "http://www.twitter.com", "http://twitter.com");
        
        foreach ($prefixes as $prefix) {
            if (substr($this->editorTwitterId, 0, strlen($prefix) ) == $prefix) {
                $this->editorTwitterId = substr($this->editorTwitterId, strlen($prefix), strlen($this->editorTwitterId) );
            }
        }
        return $this->editorTwitterId;
    }

    public function setEditorTwitterId($editorTwitterId) {
        $this->editorTwitterId = $editorTwitterId;
    }

    public function getMainChannel() {
        return $this->mainChannel;
    }

    public function setMainChannel($mainChannel) {
        $this->mainChannel = $mainChannel;
    }

    public function getChangePassword() {
        return $this->changePassword;
    }

    public function getConfirmChangePassword() {
        return $this->confirmChangePassword;
    }

    public function getBdayDay() {
        if ($this->bdayDay)
            return $this->bdayDay;
        $array = explode('/', $this->getBirthday());
        if (isset($array[1]))
            return $array[1];
    }

    public function getBdayMonth() {
        if ($this->bdayMonth)
            return $this->bdayMonth;
        $array = explode('/', $this->getBirthday());
        if (isset($array[0]))
            return $array[0];
    }

    public function getBdayYear() {
        if ($this->bdayYear)
            return $this->bdayYear;
        $array = explode('/', $this->getBirthday());
        if (isset($array[2]))
            return $array[2];
    }

    public function getDisplayYear() {
        return $this->displayYear;
    }

    public function getDisplayBday() {
        return $this->displayBday;
    }

    public function getWebsite1() {
        if ($this->website1 && !preg_match("~^(?:f|ht)tps?://~i", $this->website1)) {
            return "http://" . $this->website1;
        }
        return $this->website1;
    }

    public function getWebsite2() {
        if ($this->website2 && !preg_match("~^(?:f|ht)tps?://~i", $this->website2)) {
            return "http://" . $this->website2;
        }
        return $this->website2;
    }

    public function getWebsite3() {
        if ($this->website3 && !preg_match("~^(?:f|ht)tps?://~i", $this->website3)) {
            return "http://" . $this->website3;
        }
        return $this->website3;
    }

    public function getTop1() {
        return $this->top1;
    }

    public function getTop2() {
        return $this->top2;
    }

    public function getTop3() {
        return $this->top3;
    }

    public function getAboutMe() {
        return $this->aboutMe;
    }

    public function getOccupation() {
        return $this->occupation;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getTermOfService() {
        return $this->termOfService;
    }

    public function setChangePassword($changePassword) {
        $this->changePassword = $changePassword;
    }

    public function setConfirmChangePassword($confirmChangePassword) {
        $this->confirmChangePassword = $confirmChangePassword;
    }

    public function setEmail($email) {
        $this->email = $email;
        $this->username = $email;
    }

    public function setBdayDay($bdayDay) {
        $this->bdayDay = $bdayDay;
    }

    public function setInviter($inviter) {
        $this->inviter = $inviter;
    }
    
    public function getInviter() {
        return $this->inviter;
    }

    public function setBdayMonth($bdayMonth) {
        $this->bdayMonth = $bdayMonth;
    }

    public function setBdayYear($bdayYear) {
        $this->bdayYear = $bdayYear;
    }

    public function setDisplayYear($displayYear) {
        $this->displayYear = $displayYear;
    }

    public function setDisplayBday($displayBday) {
        $this->displayBday = $displayBday;
    }
    
    public function setDisplayStartBar($displayStartBar) {
        $this->displayStartBar = $displayStartBar;
    }

    public function setWebsite1($website1) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $this->website1)) {
            $this->website1 = "http://" . $this->website1;
        }
        $this->website1 = $website1;
    }

    public function setWebsite2($website2) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $this->website2)) {
            $this->website2 = "http://" . $this->website2;
        }
        $this->website2 = $website2;
    }

    public function setWebsite3($website3) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $this->website3)) {
            $this->website3 = "http://" . $this->website3;
        }
        $this->website3 = $website3;
    }
    
    public function setTop1($top1) {
        $this->top1 = $top1;
    }

    public function setTop2($top2) {
        $this->top2 = $top2;
    }

    public function setTop3($top3) {
        $this->top3 = $top3;
    }

    public function setAboutMe($aboutMe) {
        $this->aboutMe = $aboutMe;
    }

    public function setOccupation($occupation) {
        $this->occupation = $occupation;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function setTermOfService($termOfService) {
        $this->termOfService = $termOfService;
    }

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Membership", mappedBy="user", cascade={"persist"})
     */
    protected $memberships;

    function __construct() {
        parent::__construct();
        $this->creationDate = time();
        $this->_password_generate_salt();
        $this->acceptsNotifNewCommentOtherPost = true;
        $this->acceptsNotifNewCommentOwnPost = true;
        $this->acceptsNotifNewMember = true;
        $this->acceptsNotifNewPost = true;
        $this->acceptsNotifNewFollower = true;
        $this->displayBday = true;
        $this->displayYear = true;
    }

    public function updateUser($encryptedPassword, $fbToken, $acceptsMail, $lastLogin, $invitedBy) {
        $this->fbToken = $fbToken;
        $this->acceptsMail = $acceptsMail;
        $this->invitedBy = $invitedBy;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Set fbToken
     *
     * @param string $fbToken
     */
    public function setFbToken($facebookID) {
        $this->fbToken = $facebookID;
    }

    public function setFbId($facebookID) {
        $this->fbId = $facebookID;
    }

    public function setFbUsername($fbUsername) {
        $this->fbUsername = $fbUsername;
    }

    /**
     * Set twitterId
     *
     * @param string $twitterID
     */
    public function setTwitterID($twitterID) {
        $this->twitterId = $twitterID;
    }

    /**
     * Set twitterUsername
     *
     * @param string $twitterUsername
     */
    public function setTwitterUsername($twitterUsername) {
        $this->twitterUsername = $twitterUsername;
    }

    /**
     * Get fbToken
     *
     * @return string
     */
    public function getFbToken() {
        return $this->fbToken;
    }

    public function getFbId() {
        return $this->fbId;
    }

    public function getFbUsername() {

        return $this->fbUsername;
    }

    /**
     * Get twitterID
     *
     * @return string 
     */
    public function getTwitterID() {
        return $this->twitterId;
    }

    /**
     * Get twitter_username
     *
     * @return string 
     */
    public function getTwitterUsername() {
        return $this->twitterUsername;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    public function setSex($sex) {
        $this->sex = $sex;
    }

    public function getSex() {
        return $this->sex;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function getBirthday() {
        return $this->birthday;
    }
    
    public function getDisplayStartBar() {
        return $this->displayStartBar;
    }

    public function setSummary($summary) {
        $this->summary = $summary;
    }

    public function getSummary() {
        return $this->summary;
    }

    public function setInitEmail($email) {
        $this->initEmail = $email;
    }

    public function getInitEmail() {
        return $this->initEmail;
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

    public function setInvitedBy($invitedBy) {
        die("var deprecated user inviter");
        $this->invitedBy = $invitedBy;
    }

    public function getInvitedBy() {
        die("var deprecated user inviter");
        return $this->invitedBy;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive() {
        return $this->isActive;
    }
    
    public function setTipsList($tipsList) {
        $this->tipsList = $tipsList;
    }

    public function getTipsList() {
        return $this->tipsList;
    }

    public function getMemberships() {
        return $this->$memberships;
    }

    public function setMemberships($memberships) {
        $this->memberships = $memberships;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    
    public function getImageUrl($default = true) {
        if ($default && !$this->imageUrl){
            return config_path::USER_IMG_DEFAULT;
        }
            
        return $this->imageUrl;
    }

    public function getImageFile() {
        return $this->imageFile;
    }

    public function setImageFile($imageFile) {
        $this->imageFile = $imageFile;
    }

    public function setDoNotEmail($doNotEmail) {
        $this->doNotEmail = $doNotEmail;
    }

    public function getDoNotEmail() {
        return $this->doNotEmail;
    }
    
    public function setShowStartedBar($showGetStartedBar) {
        $this->showGetStartedBar = $showGetStartedBar;
    }

    public function getShowStartedBar() {
        return $this->showGetStartedBar;
    }

    public function setAcceptsNotifNewMember($acceptsNotifNewMember) {
        $this->acceptsNotifNewMember = $acceptsNotifNewMember;
    }

    public function getAcceptsNotifNewMember() {
        return $this->acceptsNotifNewMember;
    }

    public function setLastBuggedViaEmail($lastBuggedViaEmail) {
        $this->lastBuggedViaEmail = $lastBuggedViaEmail;
    }

    public function getLastBuggedViaEmail() {
        return $this->lastBuggedViaEmail;
    }

    public function setLastGotFbInfo($lastGotFbInfo) {
        $this->lastGotFbInfo = $lastGotFbInfo;
    }

    public function getLastGotFbInfo() {
        return $this->lastGotFbInfo;
    }

    public function setAcceptsNotifNewPost($acceptsNotifNewPost) {
        $this->acceptsNotifNewPost = $acceptsNotifNewPost;
    }

    public function getAcceptsNotifNewPost() {
        return $this->acceptsNotifNewPost;
    }

    public function setAcceptsNotifNewCommentOwnPost($acceptsNotifNewCommentOwnPost) {
        $this->acceptsNotifNewCommentOwnPost = $acceptsNotifNewCommentOwnPost;
    }

    public function getAcceptsNotifNewCommentOwnPost() {
        return $this->acceptsNotifNewCommentOwnPost;
    }

    public function setAcceptsNotifNewCommentOtherPost($acceptsNotifNewCommentOtherPost) {
        $this->acceptsNotifNewCommentOtherPost = $acceptsNotifNewCommentOtherPost;
    }

    public function getAcceptsNotifNewCommentOtherPost() {
        return $this->acceptsNotifNewCommentOtherPost;
    }
    
    public function setAcceptsNotifNewFollower($acceptsNotifNewFollower) {
        $this->acceptsNotifNewFollower = $acceptsNotifNewFollower;
    }

    public function getAcceptsNotifNewFollower() {
        return $this->acceptsNotifNewFollower;
    }

    public function setFbImage($fileName) {
            $this->setImageUrl($fileName);
    }

    public function mergeAccoutInfo($user) {
        if (!$this->fbId && $user->getFbId()) {
            $this->setFbId($user->getFbId());
        }
        if (!$this->sex && $user->getSex()) {
            $this->setSex($user->getSex());
        }
        if (!$this->birthday && $user->getBirthday()) {
            $this->setBirthday($user->getBirthday());
        }
        if (!$this->imageUrl && $user->getImageUrl(false)) {
            $this->setImageUrl($user->getImageUrl(false));
        }
        if (!$this->location && $user->getLocation())
            $this->setLocation($user->getLocation());
        if (!$this->occupation && $user->getOccupation())
            $this->setOccupation($user->getOccupation());
        if (!$this->summary && $user->getSummary())
            $this->setSummary($user->getSummary());

        if (!$this->top1 && $user->getTop1())
            $this->setTop1($user->getTop1());
        if (!$this->top2 && $user->getTop2())
            $this->setTop2($user->getTop2());
        if (!$this->top3 && $user->getTop3())
            $this->setTop3($user->getTop3());
        if (!$this->website1 && $user->getWebsite1())
            $this->setWebsite1($user->getWebsite1());
        if (!$this->website2 && $user->getWebsite2())
            $this->setWebsite2($user->getWebsite2());
        if (!$this->website3 && $user->getWebsite3())
            $this->setWebsite3($user->getWebsite3());

        if (!$this->inviter && $user->getInviter())
            $this->setInviter($user->getInviter());
        if (!$this->displayYear && $user->getDisplayYear())
            $this->setDisplayYear($user->getDisplayYear());
        if (!$this->displayBday && $user->getDisplayBday())
            $this->setDisplayBday($user->getDisplayBday());

        if (!$this->acceptsNotifNewPost && $user->getAcceptsNotifNewPost())
            $this->setAcceptsNotifNewPost($user->getAcceptsNotifNewPost());
        if (!$this->acceptsNotifNewCommentOwnPost && $user->getAcceptsNotifNewCommentOwnPost())
            $this->setAcceptsNotifNewCommentOwnPost($user->getAcceptsNotifNewCommentOwnPost());
        if (!$this->acceptsNotifNewCommentOtherPost && $user->getAcceptsNotifNewCommentOtherPost())
            $this->setAcceptsNotifNewCommentOtherPost($user->getAcceptsNotifNewCommentOtherPost());
        if (!$this->acceptsNotifNewMember && $user->getAcceptsNotifNewMember())
            $this->setAcceptsNotifNewMember($user->getAcceptsNotifNewMember());

        if ($this->lastLogin == null)
            $this->lastLogin = $user->getLastLogin();
    }

    public function serialize() {
        return serialize(array($this->fbId, parent::serialize()));
    }

    public function unserialize($data) {
        list($this->fbId, $parentData) = unserialize($data);
        parent::unserialize($parentData);
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    private function _password_generate_salt() {
// modified the random salt already generated by the one need by drupal
// first 4 bits are settings then 8 bits of random value

        $output = '$S$';
        $itoa64 = $this->_password_itoa64();
        $output .= $itoa64[15];
        $output .= substr($this->salt, 0, 8);
        $this->salt = $output;
    }

    private function _password_itoa64() {
        return './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    }

    /**
     * Set lastAcces
     *
     * @param integer $lastAcces
     */
    public function setLastAcces($lastAcces) {
        $this->lastAcces = $lastAcces;
    }

    /**
     * Get lastAcces
     *
     * @return integer 
     */
    public function getLastAcces() {
        return $this->lastAcces;
    }

    /**
     * Add memberships
     *
     * @param Ology\SocialBundle\Entity\Membership $memberships
     */
    public function addMembership(\Ology\SocialBundle\Entity\Membership $memberships) {
        $this->memberships[] = $memberships;
    }
}