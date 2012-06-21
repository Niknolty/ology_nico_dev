<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\SubscriptionDAO;
use Ology\SocialBundle\DAO\UserDAO;
use Ology\SocialBundle\DAO\ChannelDAO;
use Ology\SocialBundle\Service\NotificationService;

/**
 * Description of SubscriptionService
 *
 * @author raphael
 */
class SubscriptionService {

    protected $notificationService;
    protected $mailService;
    protected $subscriptionDAO;
    protected $userDAO;
    protected $channelDAO;
    protected $cacheDAO;
    protected $statsDAO;

    function __construct(SubscriptionDAO $dao, CacheDAO $cacheDAO, EMailService $mailService, UserDAO $userDAO, ChannelDAO $channelDAO) {
        $this->subscriptionDAO = $dao;
        $this->mailService = $mailService;
        $this->cacheDAO = $cacheDAO;
        $this->userDAO = $userDAO;
        $this->channelDAO = $channelDAO;
    }

    public function subscribeChannel($userId, $channelId, $founder = false) {
        $this->setIsSubscriptionsInvalid($userId, true);
        
        if (!$this->isSubscribedToChannel($userId, $channelId)) {
            $this->subscriptionDAO->subscribeToChannel($userId, $channelId);
            /*if (!$founder) {
                $notif = $this->notificationService->notifJoinOlogy($ologyId, $userId);
                $this->mailService->emailNotification($notif);
            }*/
            return TRUE;
        }
        return FALSE;
    }
    
    public function unsubscribeChannel($userId, $channelId) {
        $this->setIsSubscriptionsInvalid($userId, true);
        
        $subscription = $this->subscriptionDAO->getSubscriptionByUserAndChannel($userId, $channelId);
        if ($subscription == NULL)
            throw new ServiceException("SubscriptionService: User $userId is not a member of channel/core ology $channelId");
        
        return $this->subscriptionDAO->deleteSubscription($subscription->getId());
    }
    
    /**
     * Return true if the user is following this channel, false otherwise.
     * 
     * @param int $userId
     * @param int $channelId
     * @return boolean 
     */
    public function isSubscribedToChannel($userId, $channelId) {
        $subscriptions = $this->subscriptionDAO->getSubscriptionByUserAndChannel($userId, $channelId);
        
        return ( !$subscriptions == NULL );
    }
    
    /**
     * Return an array of channel id subscribed by the user with a max result $n.
     * 
     * @param int $userId
     * @param int $n
     * @return array
     */
    public function getChannelsIdForUser($userId, $n = NULL) {
        $subscribedChannelsIds = $this->subscriptionDAO->getSubscribedChannelsIdsByUser($userId, $n);
        
        return $subscribedChannelsIds;
    }
    
    /**
     * Used to store in session info to display core ologies.
     * Return channel's name stub creation date and imageLogo.
     */
    public function getChannelsInfosForUser($userId, $n = NULL) {
        $channelsInfos = $this->subscriptionDAO->getSubscribedChannelsInfosByUser($userId, $n);
        
        return $channelsInfos;
    }
    
    /**
     * Return an array of channel subscribed by the user with a max result $n.
     * 
     * @param int $userId
     * @param int $n
     * @return array
     */
    public function getChannelsForUser($userId, $n = NULL) {
        $subscriptions = $this->subscriptionDAO->getSubscriptionsByUser($userId, $n);
        
        $subscribedChannels = array();
        foreach ($subscriptions as $sub) {
            $subscribedChannels[] = $sub->getChannel();
        }
        
        return $subscribedChannels;
    }
    
    /**
     * Return an array of channel subscribed by the user with a max result $n.
     * 
     * @param int $userId
     * @param int $n
     * @return array
     */
    public function getSubscriptionsForUser($userId, $n = NULL) {
        $subscriptions = $this->subscriptionDAO->getSubscriptionsByUser($userId, $n);
        
        return $subscriptions;
    }
    
    public function isSubscriptionsInvalid($userId) {
        return $this->cacheDAO->cache_user_get_invalidate_subscriptions($userId);
    }
    
    public function setIsSubscriptionsInvalid($userId, $bool) {
        $this->cacheDAO->cache_user_set_invalidate_subscriptions($userId, $bool);
    }
}

?>
