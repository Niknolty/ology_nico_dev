<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\Subscription;

/**
 * Description of SubscriptionDAO
 *
 * @author raphael
 */
class SubscriptionDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     *
     * @param int $userId
     * @param int $channelId
     * @return \Ology\SocialBundle\Entity\Subscription 
     */
    public function subscribeToChannel($userId, $channelId) {
        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        $channel = $this->em->getReference('OlogySocialBundle:Channel', $channelId);

        $subscription = new Subscription();
        $subscription->setUser($user);
        $subscription->setChannel($channel);

        $this->em->persist($subscription);
        $this->em->flush();

        return $subscription;
    }

    public function deleteSubscription($subscriptionId) {
        $subscription = $this->em->getRepository('OlogySocialBundle:Subscription')->find($subscriptionId);

        if (!$subscription) {
            return false;
        }

        $this->em->remove($subscription);
        $this->em->flush();

        return true;
    }

    public function getSubscriptionByUserAndChannel($userId, $channelId) {
        $subscriptions = $this->em->getRepository('OlogySocialBundle:Subscription')
                ->findOneBy(array('user' => $userId, 'channel' => $channelId));

        return $subscriptions;
    }

    public function getSubscriptionsByUser($userId, $n = NULL) {
        $subscriptions = $this->em->getRepository('OlogySocialBundle:Subscription')
                ->findBy(array('user' => $userId), 
                         array('creationDate' => 'DESC'), 
                         $n);
        
        return $subscriptions;
    }
    
    public function getSubscribedChannelsIdsByUser($userId, $n = NULL) {
                $query = $this->em->createQueryBuilder()
                ->select('c.id')
                ->from('OlogySocialBundle:Channel', 'c')
                ->innerJoin('c.subscriptions', 's', Join::WITH, 'c = s.channel AND s.user = ?1')
                ->orderBy('s.creationDate', 'DESC')
                ->getQuery();
        
        $query->setParameter(1, $userId);
        if ($n != NULL)
            $query->setMaxResults($n);
        
        $q = $query->getResult();
        
        $channelsIds = array();
        foreach ($q as $value) {
            $channelsIds[] = intval($value['id']);
        }

        return $channelsIds;
    }
    
    public function getSubscribedChannelsInfosByUser($userId, $n = NULL) {
                $query = $this->em->createQueryBuilder()
                ->select('c.name, c.imageLogo, c.stub, s.creationDate')
                ->from('OlogySocialBundle:Channel', 'c')
                ->innerJoin('c.subscriptions', 's', Join::WITH, 'c = s.channel AND s.user = ?1')
                ->orderBy('s.creationDate', 'DESC')
                ->getQuery();
        
        $query->setParameter(1, $userId);
        if ($n != NULL)
            $query->setMaxResults($n);
        
        $channelsInfos = $query->getResult();
        
        return $channelsInfos;
    }
    
}

?>
