<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;
use Ology\SocialBundle\Entity\User;

/**
 * Description of UserCacheDAO
 *
 * @author raphael
 */
// TODO update user stats directly
class UserCacheDAO extends BaseCacheDAO {
    
    const USER_BIRTHDAY = "birthday";
    const USER_CREATION_DATE = "creationDate";
    const USER_DISPLAY_BDAY = "displayBDay";
    const USER_EMAIL = "email";
    const USER_EDITOR_TITLE = "editorTitle";
    const USER_EDITOR_TWITTER_ID = "editorTwitterId";
    const USER_FB_ID = "fbId";
    const USER_FIRST_NAME = "firstname";
    const USER_ID = "id";
    const USER_IMAGE_URL = "imageUrl";
    const USER_IS_ENABLED = "enabled";
    const USER_LAST_NAME = "lastname";
    const USER_LOCATION = "location";
    const USER_NOTIF_COMMENT_OTHER_POST = "notifCommentOtherPost";
    const USER_NOTIF_COMMENT_OWN_POST = "notifCommentOwnPost";
    const USER_NOTIF_FOLLOWER = "notifFollower";
    const USER_NOTIF_MEMBER = "notifMember";
    const USER_NOTIF_POST = "notifPost";
    const USER_OCCUPATION = "occupation";
    const USER_SEX = "sex";
    const USER_SUMMARY = "summary";
    const USER_WEBSITE_1 = "website1";
    const USER_WEBSITE_2 = "website2";
    const USER_WEBSITE_3 = "website3";
    
    function __construct(Client $redis) {
        parent::__construct($redis);
    }
    
    /**
     * Redis key = user:[userId]
     */
    public function createUser(User $user) {
        $userCached = array(
            self::USER_ID => $user->getId(),
            self::USER_FIRST_NAME => $user->getFirstName(),
            self::USER_LAST_NAME => $user->getLastName(),
            self::USER_EMAIL => $user->getEmail(),
            self::USER_SEX => $user->getSex(),
            self::USER_IMAGE_URL => $user->getImageUrl(),
            self::USER_IS_ENABLED => $user->isEnabled(),
            self::USER_SUMMARY => $user->getSummary(),
            self::USER_EDITOR_TITLE => $user->getEditorTitle(),
            self::USER_CREATION_DATE => $user->getCreationDate(),
            self::USER_LOCATION => $user->getLocation(),
            self::USER_EDITOR_TWITTER_ID => $user->getEditorTwitterId(),
            self::USER_OCCUPATION => $user->getOccupation(),
            self::USER_DISPLAY_BDAY => $user->getDisplayBday(),
            self::USER_BIRTHDAY => $user->getBirthday(),
            self::USER_WEBSITE_1 => $user->getWebsite1(),
            self::USER_WEBSITE_2 => $user->getWebsite2(),
            self::USER_WEBSITE_3 => $user->getWebsite3(),
            self::USER_FB_ID => $user->getFbId(),
            self::USER_NOTIF_COMMENT_OTHER_POST => $user->getAcceptsNotifNewCommentOtherPost(),
            self::USER_NOTIF_COMMENT_OWN_POST => $user->getAcceptsNotifNewCommentOwnPost(),
            self::USER_NOTIF_FOLLOWER => $user->getAcceptsNotifNewFollower(),
            self::USER_NOTIF_MEMBER => $user->getAcceptsNotifNewMember(),
            self::USER_NOTIF_POST => $user->getAcceptsNotifNewPost()
        );
        
        $this->HMSET(parent::USER_PREFIX . $user->getId(), $userCached);
    }
    
    /**
     * Redis key = user:[userId]
     * @return User 
     */
    public function getUser($id) {
        $redisUser = $this->HGETALL(parent::USER_PREFIX . $id);
        if (empty($redisUser))
            return NULL;
        
        $user = new User();
        $user->setId($redisUser[self::USER_ID]);
        $user->setFirstName($redisUser[self::USER_FIRST_NAME]);
        $user->setLastName($redisUser[self::USER_LAST_NAME]);
        $user->setEmail($redisUser[self::USER_EMAIL]);
        $user->setSex($redisUser[self::USER_SEX]);
        $user->setImageUrl($redisUser[self::USER_IMAGE_URL]);
        $user->setEnabled($redisUser[self::USER_IS_ENABLED]);
        $user->setSummary($redisUser[self::USER_SUMMARY]);
        $user->setEditorTitle($redisUser[self::USER_EDITOR_TITLE]);
        $user->setCreationDate($redisUser[self::USER_CREATION_DATE]);
        $user->setLocation($redisUser[self::USER_LOCATION]);
        $user->setEditorTwitterId($redisUser[self::USER_EDITOR_TWITTER_ID]);
        $user->setOccupation($redisUser[self::USER_OCCUPATION]);
        $user->setDisplayBday($redisUser[self::USER_DISPLAY_BDAY]);
        $user->setBirthday($redisUser[self::USER_BIRTHDAY]);
        $user->setWebsite1($redisUser[self::USER_WEBSITE_1]);
        $user->setWebsite2($redisUser[self::USER_WEBSITE_2]);
        $user->setWebsite3($redisUser[self::USER_WEBSITE_3]);
        $user->setFbId($redisUser[self::USER_FB_ID]);
        $user->setAcceptsNotifNewCommentOtherPost($redisUser[self::USER_NOTIF_COMMENT_OTHER_POST]);
        $user->setAcceptsNotifNewCommentOwnPost($redisUser[self::USER_NOTIF_COMMENT_OWN_POST]);
        $user->setAcceptsNotifNewFollower($redisUser[self::USER_NOTIF_FOLLOWER]);
        $user->setAcceptsNotifNewMember($redisUser[self::USER_NOTIF_MEMBER]);
        $user->setAcceptsNotifNewPost($redisUser[self::USER_NOTIF_POST]);
        
        return $user;
    }
    
    /**
     * Redis key = user:[userId]
     * @return success 
     */
    public function deleteUser($userId) {
        return $this->DEL( array( parent::USER_PREFIX . $userId ) );
    }
    
    public function updateProfileImage($userId, $fileName) {
        $redisUser = $this->HGETALL(parent::USER_PREFIX . $userId);
        if (empty($redisUser))
            return NULL;
        return $this->HSET(parent::USER_PREFIX . $userId, self::USER_IMAGE_URL, $fileName);
    }
    
}

?>
