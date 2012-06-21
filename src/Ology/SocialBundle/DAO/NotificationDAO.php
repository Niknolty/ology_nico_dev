<?php
namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Notification;
use Ology\SocialBundle\Entity\NotificationType;

class NotificationDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    private function setUpNewNotif($typeId, $recipientId, $content) {
        $recipient = $this->em->getReference('OlogySocialBundle:User', $recipientId);
        $type = $this->em->getReference('OlogySocialBundle:NotificationType', $typeId);

        $notif = new Notification();
        $notif->setContent($content);
        $notif->setRecipient($recipient);
        $notif->setType($type);
        $notif->setCreationDate(new \DateTime('now'));

        return $notif;
    }
    
    public function createFollowUserInOlogyNotification($ologyId, $followeeId, $followerId, $content) {
        $notif = $this->setUpNewNotif(NotificationType::FOLLOW_USER_IN_OLOGY, $followeeId, $content);

        $notif->setOlogy($this->em->getReference('OlogySocialBundle:Ology', $ologyId));
        $notif->setUser($this->em->getReference('OlogySocialBundle:User', $followerId));

        $this->em->persist($notif);
        $this->em->flush();

        return $notif;
    }
    
    public function createPostOlogyReologizedNotification($sharerId, $ologyId, $postId, $postOwnerId, $content) {
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        $poster = $this->em->getReference('OlogySocialBundle:User', $sharerId);
        
        $notif = $this->setUpNewNotif(NotificationType::POST_REOLOGIZED_IN_OLOGY, $postOwnerId, $content);
        $notif->setOlogy($ology);
        $notif->setPost($post);
        $notif->setUser($poster);

        $this->em->persist($notif);
        $this->em->flush();
        
        return $notif;
    }
    
    public function createPostStashReologizedNotification($sharerId, $stashId, $postId, $postOwnerId, $content) {
        $stash = $this->em->getReference('OlogySocialBundle:Stash', $stashId);
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        $poster = $this->em->getReference('OlogySocialBundle:User', $sharerId);
        
        $notif = $this->setUpNewNotif(NotificationType::POST_REOLOGIZED_IN_STASH, $postOwnerId, $content);
        $notif->setStash($stash);
        $notif->setPost($post);
        $notif->setUser($poster);

        $this->em->persist($notif);
        $this->em->flush();
        
        return $notif;
    }
    
    public function createJoinOlogyNotification($ologyId, $recipientId, $newUserId, $content) {
        $notif = $this->setUpNewNotif(NotificationType::JOIN_OLOGY, $recipientId, $content);

        $notif->setOlogy($this->em->getReference('OlogySocialBundle:Ology', $ologyId));
        $notif->setUser($this->em->getReference('OlogySocialBundle:User', $newUserId));

        $this->em->persist($notif);
        $this->em->flush();

        return $notif;
    }

    public function createFollowStashNotification($stashId, $recipientId, $newUserId, $content) {
        $notif = $this->setUpNewNotif(NotificationType::FOLLOW_STASH, $recipientId, $content);

        $notif->setStash($this->em->getReference('OlogySocialBundle:Stash', $stashId));
        $notif->setUser($this->em->getReference('OlogySocialBundle:User', $newUserId));

        $this->em->persist($notif);
        $this->em->flush();

        return $notif;
    }
    
    public function createPostInOlogyNotifications($posterId, $ologyId, $postId, $recipientsId, $content) {
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        $poster = $this->em->getReference('OlogySocialBundle:User', $posterId);
        
        $notifs = array();
        foreach ($recipientsId as $recipientId) {
            $notif = $this->setUpNewNotif(NotificationType::POST_IN_OLOGY, $recipientId, $content);
            $notif->setOlogy($ology);
            $notif->setPost($post);
            $notif->setUser($poster);
            
            $this->em->persist($notif);
            $notifs[] = $notif;
        }
        $this->em->flush();
        return $notifs;
    }
    
    public function createCommentOnOwnPostNotification($ologyId, $postId, $commenterId, $recipientId, $content) {
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        $commenter = $this->em->getReference('OlogySocialBundle:User', $commenterId);
        
        $notif = $this->setUpNewNotif(NotificationType::COMMENT_ON_OWN_POST, $recipientId, $content);
        $notif->setOlogy($ology);
        $notif->setPost($post);
        $notif->setUser($commenter);
        
        $this->em->persist($notif);
        $this->em->flush();
        return $notif;
    }
    
    public function createCommentOnCommentedPostNotificationForUsers($ologyId, $postId, $commenterId, $recipientsId, $content) {
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        $commenter = $this->em->getReference('OlogySocialBundle:User', $commenterId);
        
        $notifs = array();
        foreach ($recipientsId as $recipientId) {
            $notif = $this->setUpNewNotif(NotificationType::COMMENT_ON_COMMENTED_POST, $recipientId, $content);
            $notif->setOlogy($ology);
            $notif->setPost($post);
            $notif->setUser($commenter);
            $this->em->persist($notif);
            $notifs[] = $notif;
        }
        $this->em->flush();
        return $notifs;
    }
    
    public function createWebsiteNotification($recipientId, $content) {
        $notif = $this->setUpNewNotif(NotificationType::SITE, $recipientId, $content);

        $this->em->persist($notif);
        $this->em->flush();

        return $notif;
    }

    public function deleteNotification($id) {
        $notif = $this->em->getRepository('OlogySocialBundle:Notification')->find($id);

        if (sizeof($notif) == 0) {
            return false;
        }

        $this->em->remove($notif);
        $this->em->flush();

        return true;
    }

    public function deleteNotificationForOlogy($ologyId) {

        $query = $this->em->createQuery('DELETE OlogySocialBundle:Notification u WHERE u.ology = ?1');
        $query->setParameter(1, $ologyId);
        $result = $query->getResult();

        return $result;
    }

    public function deleteNotificationForComment($commentId) {

        $query = $this->em->createQuery('DELETE OlogySocialBundle:Notification n WHERE n.comment = ?1');
        $query->setParameter(1, $commentId);
        $result = $query->getResult();

        return $result;
    }

    public function deleteNotificationsForPost($postId) {
        $query = $this->em->createQuery('DELETE OlogySocialBundle:Notification n WHERE n.post = ?1');
        $query->setParameter(1, $postId);
        $result = $query->getResult();

        return true;
    }

    public function getNotification($id) {
        $notif = $this->em->getRepository('OlogySocialBundle:Notification')->find($id);

        if (!$notif) {
            throw new DAOException('No notification found for id ' . $postNotiId);
        }
        return $notif;
    }
    
    public function getNotificationsForUser($recipientId, $n = 0) {
        $qb = $this->em->createQueryBuilder()
                ->add('select', 'n')
                ->from('OlogySocialBundle:Notification', 'n')
                ->where('n.recipient = ?1')
                ->orderBy('n.creationDate', 'DESC');
        
        $query = $qb->getQuery();
        $query->setParameter(1, $recipientId);
        if ($n > 0)
            $query->setMaxResults ($n);
        $notifications = $query->getResult();
        
        return $notifications;
    }
    
    public function deleteNotificationsForUser($recipientId) {
        $query = $this->em->createQuery('DELETE OlogySocialBundle:Notification n WHERE n.recipient = ?1');
        $query->setParameter(1, $recipientId);
        $result = $query->getResult();

        return $result;
    }
}

?>
