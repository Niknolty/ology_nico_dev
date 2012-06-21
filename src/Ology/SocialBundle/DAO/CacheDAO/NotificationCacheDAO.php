<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;
use Ology\SocialBundle\Entity\Notif;

/**
 * Description of NotificationCacheDAO
 *
 * @author raphael
 */
class NotificationCacheDAO extends BaseCacheDAO {
    
    const NB_LAST_NOTIFS = 20;
    const NOTIF_UNIQUE_ID = "notif:id";
    
    function __construct(Client $redis) {
        parent::__construct($redis);
    }
    
    /**
     * Redis key = notif:user:[userId]
     * Create a new notification stored in redis;
     * @param int $userId
     * @param Notif $notif
     * @return int Length of the new user notif list 
     */
    public function createNotificationForUser($userId, Notif $notif) {
        $newNotifId = $this->INCR(self::NOTIF_UNIQUE_ID);
        $notifRedis = implode('|', array($newNotifId, $notif->getType(), $notif->getData()));
        $listLength = $this->LPUSH(parent::NOTIF_PREFIX . parent::USER_PREFIX . $userId, $notifRedis);
        return $listLength;
    }
    
    /**
     * Redis key = notif:user:[userId]
     * In Redis, a notif is a string with the following content: "id|type|data"
     * @param int $userId 
     */
    public function getNotificationsForUser($userId) {
        $notifsRedis = $this->LRANGE(parent::NOTIF_PREFIX . parent::USER_PREFIX . $userId, 0, self::NB_LAST_NOTIFS);
        
        $notifs = array();
        foreach ($notifsRedis as $notifRedis) {
            $notifRedis = explode('|', $notifRedis);
            
            $notif = new Notif();
            $notif->setId($notifRedis[0]);
            $notif->setType($notifRedis[1]);
            $notif->setData($notifRedis[2]);
            
            $notifs[] = $notif;
        }
        return $notifs;
    }
    
}

?>
