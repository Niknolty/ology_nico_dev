<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\Entity\Notif;
use Ology\SocialBundle\DAO\CacheDAO\NotificationCacheDAO;

/**
 * Description of NotifService
 *
 * @author raphael
 */
class NotifService {
    
    protected $notifDAO;

    function __construct(NotificationCacheDAO $dao) {
        $this->notifDAO = $dao;
    }
    
    /**
     * Will add a notif in the notif list of each related followers user. 
     */
    public function notifUserFollowers($userId, Notif $notif) {
        $followers = array();
        foreach ($followers as $follower) {
            $this->notifDAO->createNotificationForUser($follower->getId(), $notif);
        }
    }
    
    public function notifStashFollowers($stashId, Notif $notif) {
        
    }
}

?>
