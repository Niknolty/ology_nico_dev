<?php
namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Exceptions\DAOException;

class MergeAccountDAO {
    protected $em;
    
    function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function updateChannels($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Channel c
        SET c.managedBy = :newUser
        WHERE c.managedBy = :oldUser";

        $query = $this->em->createQuery($DQL)
                          ->SetParameter('newUser', $newUser)
                          ->SetParameter('oldUser', $oldUser)
                          ->getResult();

        return sizeof($query);
    }
    
    public function updateComments($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Comment c
        SET c.author = :newUser
        WHERE c.author = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updateInboxes($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Inbox i
        SET i.user = :newUser
        WHERE i.user = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updateInterests($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Interest i
        SET i.user = :newUser
        WHERE i.user = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }

    public function updateInvites($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Invite i
        SET i.toUser = :newUser
        WHERE i.toUser = :oldUser";

        $queryToUser = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();
        
        $DQL2 = "
        UPDATE OlogySocialBundle:Invite i
        SET i.fromUser = :newUser
        WHERE i.fromUser = :oldUser";

        $queryFromUser = $this->em->createQuery($DQL2)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($queryToUser) + sizeof($queryFromUser);
    }
    
    public function updateLabelsOlogies($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:LabelsOlogies l
        SET l.taggedBy = :newUser
        WHERE l.taggedBy = :oldUser";

        $query = $this->em->createQuery($DQL)
                          ->SetParameter('newUser', $newUser)
                          ->SetParameter('oldUser', $oldUser)
                          ->getResult();

        return sizeof($query);
    }
    
    public function updateLikes($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Likes l
        SET l.author_id = :newUserId
        WHERE l.author_id = :oldUserId";

        $query = $this->em->createQuery($DQL)
                          ->SetParameter('newUserId', $newUser->getId())
                          ->SetParameter('oldUserId', $oldUser->getId())
                          ->getResult();

        return sizeof($query);
    }
    
    public function updateMemberships($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Membership m
        SET m.user = :newUser
        WHERE m.user = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updateMessages($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Message m
        SET m.sender = :newUser
        WHERE m.sender = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updateNotifications($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Notification n
        SET n.user = :newUser
        WHERE n.user = :oldUser";

        $queryUser = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();
        
        $DQL2 = "
        UPDATE OlogySocialBundle:Notification n
        SET n.recipient = :newUser
        WHERE n.recipient = :oldUser";

        $queryRecipient = $this->em->createQuery($DQL2)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($queryUser) + sizeof($queryRecipient);
    }
    
    public function updateOlogies($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Ology o
        SET o.founder = :newUser
        WHERE o.founder = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updatePosts($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Post p
        SET p.author = :newUser
        WHERE p.author = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updatePostsChannels($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:PostsChannels pc
        SET pc.promotedBy = :newUser
        WHERE pc.promotedBy = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updatePostsOlogies($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:PostsOlogies po
        SET po.postedBy = :newUser
        WHERE po.postedBy = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updateStashes($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Stash s
        SET s.founder = :newUser
        WHERE s.founder = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
    
    public function updateSubscriptions($newUser, $oldUser) {
        $DQL = "
        UPDATE OlogySocialBundle:Subscription s
        SET s.user = :newUser
        WHERE s.user = :oldUser";

        $query = $this->em->createQuery($DQL)
                        ->SetParameter('newUser', $newUser)
                        ->SetParameter('oldUser', $oldUser)
                        ->getResult();

        return sizeof($query);
    }
}

?>