<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class OlogySocialBundleEntityUserProxy extends \Ology\SocialBundle\Entity\User implements \Doctrine\ORM\Proxy\Proxy
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
    
    
    public function getEditorTitle()
    {
        $this->__load();
        return parent::getEditorTitle();
    }

    public function setEditorTitle($editorTitle)
    {
        $this->__load();
        return parent::setEditorTitle($editorTitle);
    }

    public function getEditorTwitterId()
    {
        $this->__load();
        return parent::getEditorTwitterId();
    }

    public function setEditorTwitterId($editorTwitterId)
    {
        $this->__load();
        return parent::setEditorTwitterId($editorTwitterId);
    }

    public function getMainChannel()
    {
        $this->__load();
        return parent::getMainChannel();
    }

    public function setMainChannel($mainChannel)
    {
        $this->__load();
        return parent::setMainChannel($mainChannel);
    }

    public function getChangePassword()
    {
        $this->__load();
        return parent::getChangePassword();
    }

    public function getConfirmChangePassword()
    {
        $this->__load();
        return parent::getConfirmChangePassword();
    }

    public function getBdayDay()
    {
        $this->__load();
        return parent::getBdayDay();
    }

    public function getBdayMonth()
    {
        $this->__load();
        return parent::getBdayMonth();
    }

    public function getBdayYear()
    {
        $this->__load();
        return parent::getBdayYear();
    }

    public function getDisplayYear()
    {
        $this->__load();
        return parent::getDisplayYear();
    }

    public function getDisplayBday()
    {
        $this->__load();
        return parent::getDisplayBday();
    }

    public function getWebsite1()
    {
        $this->__load();
        return parent::getWebsite1();
    }

    public function getWebsite2()
    {
        $this->__load();
        return parent::getWebsite2();
    }

    public function getWebsite3()
    {
        $this->__load();
        return parent::getWebsite3();
    }

    public function getTop1()
    {
        $this->__load();
        return parent::getTop1();
    }

    public function getTop2()
    {
        $this->__load();
        return parent::getTop2();
    }

    public function getTop3()
    {
        $this->__load();
        return parent::getTop3();
    }

    public function getAboutMe()
    {
        $this->__load();
        return parent::getAboutMe();
    }

    public function getOccupation()
    {
        $this->__load();
        return parent::getOccupation();
    }

    public function getLocation()
    {
        $this->__load();
        return parent::getLocation();
    }

    public function getTermOfService()
    {
        $this->__load();
        return parent::getTermOfService();
    }

    public function setChangePassword($changePassword)
    {
        $this->__load();
        return parent::setChangePassword($changePassword);
    }

    public function setConfirmChangePassword($confirmChangePassword)
    {
        $this->__load();
        return parent::setConfirmChangePassword($confirmChangePassword);
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function setBdayDay($bdayDay)
    {
        $this->__load();
        return parent::setBdayDay($bdayDay);
    }

    public function setInviter($inviter)
    {
        $this->__load();
        return parent::setInviter($inviter);
    }

    public function getInviter()
    {
        $this->__load();
        return parent::getInviter();
    }

    public function setBdayMonth($bdayMonth)
    {
        $this->__load();
        return parent::setBdayMonth($bdayMonth);
    }

    public function setBdayYear($bdayYear)
    {
        $this->__load();
        return parent::setBdayYear($bdayYear);
    }

    public function setDisplayYear($displayYear)
    {
        $this->__load();
        return parent::setDisplayYear($displayYear);
    }

    public function setDisplayBday($displayBday)
    {
        $this->__load();
        return parent::setDisplayBday($displayBday);
    }

    public function setDisplayStartBar($displayStartBar)
    {
        $this->__load();
        return parent::setDisplayStartBar($displayStartBar);
    }

    public function setWebsite1($website1)
    {
        $this->__load();
        return parent::setWebsite1($website1);
    }

    public function setWebsite2($website2)
    {
        $this->__load();
        return parent::setWebsite2($website2);
    }

    public function setWebsite3($website3)
    {
        $this->__load();
        return parent::setWebsite3($website3);
    }

    public function setTop1($top1)
    {
        $this->__load();
        return parent::setTop1($top1);
    }

    public function setTop2($top2)
    {
        $this->__load();
        return parent::setTop2($top2);
    }

    public function setTop3($top3)
    {
        $this->__load();
        return parent::setTop3($top3);
    }

    public function setAboutMe($aboutMe)
    {
        $this->__load();
        return parent::setAboutMe($aboutMe);
    }

    public function setOccupation($occupation)
    {
        $this->__load();
        return parent::setOccupation($occupation);
    }

    public function setLocation($location)
    {
        $this->__load();
        return parent::setLocation($location);
    }

    public function setTermOfService($termOfService)
    {
        $this->__load();
        return parent::setTermOfService($termOfService);
    }

    public function updateUser($encryptedPassword, $fbToken, $acceptsMail, $lastLogin, $invitedBy)
    {
        $this->__load();
        return parent::updateUser($encryptedPassword, $fbToken, $acceptsMail, $lastLogin, $invitedBy);
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

    public function setFbToken($facebookID)
    {
        $this->__load();
        return parent::setFbToken($facebookID);
    }

    public function setFbId($facebookID)
    {
        $this->__load();
        return parent::setFbId($facebookID);
    }

    public function setFbUsername($fbUsername)
    {
        $this->__load();
        return parent::setFbUsername($fbUsername);
    }

    public function setTwitterID($twitterID)
    {
        $this->__load();
        return parent::setTwitterID($twitterID);
    }

    public function setTwitterUsername($twitterUsername)
    {
        $this->__load();
        return parent::setTwitterUsername($twitterUsername);
    }

    public function getFbToken()
    {
        $this->__load();
        return parent::getFbToken();
    }

    public function getFbId()
    {
        $this->__load();
        return parent::getFbId();
    }

    public function getFbUsername()
    {
        $this->__load();
        return parent::getFbUsername();
    }

    public function getTwitterID()
    {
        $this->__load();
        return parent::getTwitterID();
    }

    public function getTwitterUsername()
    {
        $this->__load();
        return parent::getTwitterUsername();
    }

    public function setFirstName($firstName)
    {
        $this->__load();
        return parent::setFirstName($firstName);
    }

    public function getFirstName()
    {
        $this->__load();
        return parent::getFirstName();
    }

    public function setLastName($lastName)
    {
        $this->__load();
        return parent::setLastName($lastName);
    }

    public function getLastName()
    {
        $this->__load();
        return parent::getLastName();
    }

    public function setSex($sex)
    {
        $this->__load();
        return parent::setSex($sex);
    }

    public function getSex()
    {
        $this->__load();
        return parent::getSex();
    }

    public function setBirthday($birthday)
    {
        $this->__load();
        return parent::setBirthday($birthday);
    }

    public function getBirthday()
    {
        $this->__load();
        return parent::getBirthday();
    }

    public function getDisplayStartBar()
    {
        $this->__load();
        return parent::getDisplayStartBar();
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

    public function setInitEmail($email)
    {
        $this->__load();
        return parent::setInitEmail($email);
    }

    public function getInitEmail()
    {
        $this->__load();
        return parent::getInitEmail();
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

    public function setInvitedBy($invitedBy)
    {
        $this->__load();
        return parent::setInvitedBy($invitedBy);
    }

    public function getInvitedBy()
    {
        $this->__load();
        return parent::getInvitedBy();
    }

    public function setIsActive($isActive)
    {
        $this->__load();
        return parent::setIsActive($isActive);
    }

    public function getIsActive()
    {
        $this->__load();
        return parent::getIsActive();
    }

    public function setTipsList($tipsList)
    {
        $this->__load();
        return parent::setTipsList($tipsList);
    }

    public function getTipsList()
    {
        $this->__load();
        return parent::getTipsList();
    }

    public function getMemberships()
    {
        $this->__load();
        return parent::getMemberships();
    }

    public function setMemberships($memberships)
    {
        $this->__load();
        return parent::setMemberships($memberships);
    }

    public function setImageUrl($imageUrl)
    {
        $this->__load();
        return parent::setImageUrl($imageUrl);
    }

    public function getImageUrl($default = true)
    {
        $this->__load();
        return parent::getImageUrl($default);
    }

    public function getImageFile()
    {
        $this->__load();
        return parent::getImageFile();
    }

    public function setImageFile($imageFile)
    {
        $this->__load();
        return parent::setImageFile($imageFile);
    }

    public function setDoNotEmail($doNotEmail)
    {
        $this->__load();
        return parent::setDoNotEmail($doNotEmail);
    }

    public function getDoNotEmail()
    {
        $this->__load();
        return parent::getDoNotEmail();
    }

    public function setShowStartedBar($showGetStartedBar)
    {
        $this->__load();
        return parent::setShowStartedBar($showGetStartedBar);
    }

    public function getShowStartedBar()
    {
        $this->__load();
        return parent::getShowStartedBar();
    }

    public function setAcceptsNotifNewMember($acceptsNotifNewMember)
    {
        $this->__load();
        return parent::setAcceptsNotifNewMember($acceptsNotifNewMember);
    }

    public function getAcceptsNotifNewMember()
    {
        $this->__load();
        return parent::getAcceptsNotifNewMember();
    }

    public function setLastBuggedViaEmail($lastBuggedViaEmail)
    {
        $this->__load();
        return parent::setLastBuggedViaEmail($lastBuggedViaEmail);
    }

    public function getLastBuggedViaEmail()
    {
        $this->__load();
        return parent::getLastBuggedViaEmail();
    }

    public function setLastGotFbInfo($lastGotFbInfo)
    {
        $this->__load();
        return parent::setLastGotFbInfo($lastGotFbInfo);
    }

    public function getLastGotFbInfo()
    {
        $this->__load();
        return parent::getLastGotFbInfo();
    }

    public function setAcceptsNotifNewPost($acceptsNotifNewPost)
    {
        $this->__load();
        return parent::setAcceptsNotifNewPost($acceptsNotifNewPost);
    }

    public function getAcceptsNotifNewPost()
    {
        $this->__load();
        return parent::getAcceptsNotifNewPost();
    }

    public function setAcceptsNotifNewCommentOwnPost($acceptsNotifNewCommentOwnPost)
    {
        $this->__load();
        return parent::setAcceptsNotifNewCommentOwnPost($acceptsNotifNewCommentOwnPost);
    }

    public function getAcceptsNotifNewCommentOwnPost()
    {
        $this->__load();
        return parent::getAcceptsNotifNewCommentOwnPost();
    }

    public function setAcceptsNotifNewCommentOtherPost($acceptsNotifNewCommentOtherPost)
    {
        $this->__load();
        return parent::setAcceptsNotifNewCommentOtherPost($acceptsNotifNewCommentOtherPost);
    }

    public function getAcceptsNotifNewCommentOtherPost()
    {
        $this->__load();
        return parent::getAcceptsNotifNewCommentOtherPost();
    }

    public function setAcceptsNotifNewFollower($acceptsNotifNewFollower)
    {
        $this->__load();
        return parent::setAcceptsNotifNewFollower($acceptsNotifNewFollower);
    }

    public function getAcceptsNotifNewFollower()
    {
        $this->__load();
        return parent::getAcceptsNotifNewFollower();
    }

    public function setFbImage($fileName)
    {
        $this->__load();
        return parent::setFbImage($fileName);
    }

    public function mergeAccoutInfo($user)
    {
        $this->__load();
        return parent::mergeAccoutInfo($user);
    }

    public function serialize()
    {
        $this->__load();
        return parent::serialize();
    }

    public function unserialize($data)
    {
        $this->__load();
        return parent::unserialize($data);
    }

    public function setSalt($salt)
    {
        $this->__load();
        return parent::setSalt($salt);
    }

    public function setLastAcces($lastAcces)
    {
        $this->__load();
        return parent::setLastAcces($lastAcces);
    }

    public function getLastAcces()
    {
        $this->__load();
        return parent::getLastAcces();
    }

    public function addMembership(\Ology\SocialBundle\Entity\Membership $memberships)
    {
        $this->__load();
        return parent::addMembership($memberships);
    }

    public function addRole($role)
    {
        $this->__load();
        return parent::addRole($role);
    }

    public function equals(\Symfony\Component\Security\Core\User\UserInterface $user)
    {
        $this->__load();
        return parent::equals($user);
    }

    public function eraseCredentials()
    {
        $this->__load();
        return parent::eraseCredentials();
    }

    public function getUsername()
    {
        $this->__load();
        return parent::getUsername();
    }

    public function getUsernameCanonical()
    {
        $this->__load();
        return parent::getUsernameCanonical();
    }

    public function getSalt()
    {
        $this->__load();
        return parent::getSalt();
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function getEmailCanonical()
    {
        $this->__load();
        return parent::getEmailCanonical();
    }

    public function getPassword()
    {
        $this->__load();
        return parent::getPassword();
    }

    public function getPlainPassword()
    {
        $this->__load();
        return parent::getPlainPassword();
    }

    public function getLastLogin()
    {
        $this->__load();
        return parent::getLastLogin();
    }

    public function getConfirmationToken()
    {
        $this->__load();
        return parent::getConfirmationToken();
    }

    public function getRoles()
    {
        $this->__load();
        return parent::getRoles();
    }

    public function hasRole($role)
    {
        $this->__load();
        return parent::hasRole($role);
    }

    public function isAccountNonExpired()
    {
        $this->__load();
        return parent::isAccountNonExpired();
    }

    public function isAccountNonLocked()
    {
        $this->__load();
        return parent::isAccountNonLocked();
    }

    public function isCredentialsNonExpired()
    {
        $this->__load();
        return parent::isCredentialsNonExpired();
    }

    public function isCredentialsExpired()
    {
        $this->__load();
        return parent::isCredentialsExpired();
    }

    public function isEnabled()
    {
        $this->__load();
        return parent::isEnabled();
    }

    public function isExpired()
    {
        $this->__load();
        return parent::isExpired();
    }

    public function isLocked()
    {
        $this->__load();
        return parent::isLocked();
    }

    public function isSuperAdmin()
    {
        $this->__load();
        return parent::isSuperAdmin();
    }

    public function isUser(\FOS\UserBundle\Model\UserInterface $user = NULL)
    {
        $this->__load();
        return parent::isUser($user);
    }

    public function removeRole($role)
    {
        $this->__load();
        return parent::removeRole($role);
    }

    public function setUsername($username)
    {
        $this->__load();
        return parent::setUsername($username);
    }

    public function setUsernameCanonical($usernameCanonical)
    {
        $this->__load();
        return parent::setUsernameCanonical($usernameCanonical);
    }

    public function setCredentialsExpireAt(\DateTime $date)
    {
        $this->__load();
        return parent::setCredentialsExpireAt($date);
    }

    public function setCredentialsExpired($boolean)
    {
        $this->__load();
        return parent::setCredentialsExpired($boolean);
    }

    public function setEmailCanonical($emailCanonical)
    {
        $this->__load();
        return parent::setEmailCanonical($emailCanonical);
    }

    public function setEnabled($boolean)
    {
        $this->__load();
        return parent::setEnabled($boolean);
    }

    public function setExpired($boolean)
    {
        $this->__load();
        return parent::setExpired($boolean);
    }

    public function setExpiresAt(\DateTime $date)
    {
        $this->__load();
        return parent::setExpiresAt($date);
    }

    public function setPassword($password)
    {
        $this->__load();
        return parent::setPassword($password);
    }

    public function setSuperAdmin($boolean)
    {
        $this->__load();
        return parent::setSuperAdmin($boolean);
    }

    public function setPlainPassword($password)
    {
        $this->__load();
        return parent::setPlainPassword($password);
    }

    public function setLastLogin(\DateTime $time)
    {
        $this->__load();
        return parent::setLastLogin($time);
    }

    public function setLocked($boolean)
    {
        $this->__load();
        return parent::setLocked($boolean);
    }

    public function setConfirmationToken($confirmationToken)
    {
        $this->__load();
        return parent::setConfirmationToken($confirmationToken);
    }

    public function setPasswordRequestedAt(\DateTime $date = NULL)
    {
        $this->__load();
        return parent::setPasswordRequestedAt($date);
    }

    public function getPasswordRequestedAt()
    {
        $this->__load();
        return parent::getPasswordRequestedAt();
    }

    public function isPasswordRequestNonExpired($ttl)
    {
        $this->__load();
        return parent::isPasswordRequestNonExpired($ttl);
    }

    public function generateConfirmationToken()
    {
        $this->__load();
        return parent::generateConfirmationToken();
    }

    public function setRoles(array $roles)
    {
        $this->__load();
        return parent::setRoles($roles);
    }

    public function getGroups()
    {
        $this->__load();
        return parent::getGroups();
    }

    public function getGroupNames()
    {
        $this->__load();
        return parent::getGroupNames();
    }

    public function hasGroup($name)
    {
        $this->__load();
        return parent::hasGroup($name);
    }

    public function addGroup(\FOS\UserBundle\Model\GroupInterface $group)
    {
        $this->__load();
        return parent::addGroup($group);
    }

    public function removeGroup(\FOS\UserBundle\Model\GroupInterface $group)
    {
        $this->__load();
        return parent::removeGroup($group);
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'username', 'usernameCanonical', 'email', 'emailCanonical', 'enabled', 'salt', 'password', 'lastLogin', 'locked', 'expired', 'expiresAt', 'confirmationToken', 'passwordRequestedAt', 'roles', 'credentialsExpired', 'credentialsExpireAt', 'id', 'fbToken', 'fbId', 'fbUsername', 'twitterId', 'twitterUsername', 'firstName', 'lastName', 'sex', 'birthday', 'creationDate', 'lastAcces', 'summary', 'imageUrl', 'invitedBy', 'inviter', 'initEmail', 'isActive', 'tipsList', 'doNotEmail', 'showGetStartedBar', 'acceptsNotifNewMember', 'acceptsNotifNewPost', 'acceptsNotifNewCommentOwnPost', 'acceptsNotifNewCommentOtherPost', 'acceptsNotifNewFollower', 'location', 'occupation', 'top1', 'top2', 'top3', 'website1', 'website2', 'website3', 'displayYear', 'displayBday', 'displayStartBar', 'lastBuggedViaEmail', 'lastGotFbInfo', 'editorTitle', 'editorTwitterId', 'mainChannel', 'memberships');
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