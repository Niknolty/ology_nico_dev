<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\UserDAO;

class UserService {

    protected $userDAO;
    protected $cacheDAO;
    protected $emailService;

    function __construct(UserDAO $dao, CacheDAO $cacheDAO, EmailService $emailService) {
        $this->userDAO = $dao;
        $this->cacheDAO = $cacheDAO;
        $this->emailService = $emailService;
    }

    public function createUser($encryptedPassword, $fbToken, $acceptsMail, $invitedBy) {
        return $this->userDAO->createUser($encryptedPassword, $fbToken, $acceptsMail, $invitedBy);
    }

    public function updateUser($userId, $firstName, $lastName, $email, $newPlainPassword, $newConfirmationPassword, $birthday, $displayBDay, $displayYear, $sex, $location, $occupation, $summary, $top1, $top2, $top3, $webSite1, $webSite2, $website3, $imageFile, $doNotEmail, $edTitle = NULL, $edTwitter = NULL, $edChannelId = NULL) {
        return $this->userDAO->updateUser($userId, $firstName, $lastName, $email, $newPlainPassword, $newConfirmationPassword, $birthday, $displayBDay, $displayYear, $sex, $location, $occupation, $summary, $top1, $top2, $top3, $webSite1, $webSite2, $website3, $imageFile, $doNotEmail, $edTitle, $edTwitter, $edChannelId);
    }
    
    public function updateProfileImage($userId, $imageFile) {
        return $this->userDAO->updateProfileImage($userId, $imageFile);
    }

    public function updateUserByArray($userId, $newValues) {
        return $this->userDAO->updateUserByArray($userId, $newValues);
    }

    public function updateUserNotification($userId, $acceptsNotifNewMember, $acceptsNotifNewPost, $acceptsNotifNewCommentOwnPost, $acceptsNotifNewCommentOtherPost, $acceptsNotifNewFollower) {
        return $this->userDAO->updateUserNotification($userId, $acceptsNotifNewMember, $acceptsNotifNewPost, $acceptsNotifNewCommentOwnPost, $acceptsNotifNewCommentOtherPost, $acceptsNotifNewFollower);
    }
    
    public function deleteUser($userId) {
        $rdm = uniqid("", true);
        $updateValues =
            array(User::EMAIL => "$rdm@disbled.com",
                    User::EMAIL_CAN => "$rdm@disbled.com",
                    User::EMAIL_INIT => "$rdm@disbled.com",
                    User::ENABLED => 0,
                    User::USERNAME => "$rdm@disbled.com",
                    User::USERNAME_CAN => "$rdm@disbled.com",
                    User::FIRSTNAME => "Disabled",
                    User::FB_ID => "",
                    User::FB_TOKEN => "",
                    User::LASTNAME => "Disabled",
                    User::CRED_EXPIRED => 1,
                    User::LOCKED => true,
                    User::TWITTER_ID => "",
                    User::TWITTER_USERNAME => "$rdm@disbled.com");
        return $this->userDAO->updateUserByArray($userId, $updateValues);
    }
    
    public function disableUser($userId) {
        $updateValues =
            array(User::ENABLED => 0,
                    User::CRED_EXPIRED => 1,
                    User::LOCKED => true);
        return $this->userDAO->updateUserByArray($userId, $updateValues);
    }

    public function getUser($userId) {
        $user = $this->userDAO->getUser($userId);
        return $user;
    }

    public function getUserByEmail($userEmail) {
        $user = $this->userDAO->getUserByEmail($userEmail);
        return $user;
    }

    public function getUserByEmailWithoutException($userEmail) {
        $user = $this->userDAO->getUserByEmailWithoutException($userEmail);
        return $user;
    }

    public function getUsers() {
        $users = $this->userDAO->getUsers();
        return $users;
    }
    
    public function getUsersIds() {
        return $this->userDAO->getUsersIds();
    }

    public function getStats($userId) {
        return $this->cacheDAO->cache_getUserStats($userId);
    }

    public function sendWeMissYouReminder() {
        $now = time();
        $last_month = $now - (30 * 24 * 3600);
        
        $users = $this->userDAO->getUsersLastBuggedBeforeFixedTime($last_month);
        $ids = array();
        foreach ($users as $user)
            $ids[] = $user->getId();
        $this->userDAO->updateMultiUsersByArray($ids, array(User::LAST_BUGGED => $now));
        $this->emailService->emailWeMissYou($users);
        
        return count($users);
    }
    
    public function retrieveFbPicture($userId) {
        return $this->userDAO->updateFbPicture($userId);
    }
    public function retrieveFbLikes($userId) {
        $user = $this->userDAO->getUser($userId);
        $fbId = $user->getFbId();
        $token = $user->getFbToken();
        
        $url = "https://graph.facebook.com/$fbId/likes?access_token=$token";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close($ch);
        
        if (preg_match("/OAuthException/i", $content))
            return null;
        $interests = array();
        if ($content) {
            $decodedContent = json_decode($content);
            if (isset($decodedContent->data)) {
                $likes = $decodedContent->data;
                foreach ($likes as $like) {
                    $name = str_replace("'", "", str_replace('"', "", $like->name));
                    if (!in_array($name, $interests))
                        $interests[] = $name;

                    $categories = explode("/", $like->category);
                    foreach ($categories as $category) {
                        $category = str_replace("'", "", str_replace('"', "", $category));
                        if (!in_array($category, $interests))
                            $interests[] = $category;
                    }
                }
            }
        }
        $this->userDAO->updateUserByArray($userId, array(User::LAST_RETRIEVED_FB => time()));
        if (!empty($interests)) {
            $this->cacheDAO->cache_setSuggestedOlogiesIds($userId, $interests);
            $this->userDAO->setInterests($userId, $interests);
        }
    }
    
    public function getInterests($userId) {
        return $this->userDAO->getInterests($userId);
    }
    
    public function getUsersByRoles() {
        $res = array();
        $su = array();
        $editors = array();
        
        $users = $this->userDAO->getAll();
        foreach ($users as $user) {
            if (in_array('ROLE_SUPER_ADMIN', $user->getRoles(), true))
                $su[] = $user->getId() . ' - ' . $user->getEmail();
            
            if (in_array('ROLE_EDITOR', $user->getRoles(), true))
                $editors[] = $user->getId() . ' - ' . $user->getEmail();
        }
        
        $res['editors'] = $editors;
        $res['admins'] = $su;
        
        return $res;
    }
    
    public function getNbPostForUserByOlogy($ologyId, $ologyFounderId){
        return $this->userDAO->getNbPostForUserByOlogy($ologyId, $ologyFounderId);
    }
    
    public function getTopOlogists($Ologies){
        return $this->userDAO->getTopOlogists($Ologies);    
    }
    
    public function updateRandomImage($userId){
        return $this->userDAO->updateRandomImage($userId);
    }
    
    public function get_random_user_image(){
        return $this->userDAO->get_random_user_image();
    }
}

?>
