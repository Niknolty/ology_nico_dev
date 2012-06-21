<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Invite;
use Ology\SocialBundle\Entity\InviteType;
use Ology\SocialBundle\Exception\DAOException;


class InviteDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createFbInvite($fromUserId, $recipientId) {
        $user = $this->em->getReference('OlogySocialBundle:User', $fromUserId);
        $type = $this->em->getReference('OlogySocialBundle:InviteType', InviteType::GENERAL);
        
        $invite = new Invite();
        $invite->setToFbId($recipientId);
        $invite->setFromUser($user);
        $invite->setService(Invite::SVC_FACEBOOK);
        $invite->setType($type);
        $this->em->persist($invite);
        $this->em->flush();
        
        return $invite;
    }
    
    public function createOlogyAnonInvites($fromUserId, $ologyId, $recipientArray, $msg, $service) {
        $user = $this->em->getReference('OlogySocialBundle:User', $fromUserId);
        $type = $this->em->getReference('OlogySocialBundle:InviteType', InviteType::OLOGY_ANON);
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        
        $res = array();
        foreach ($recipientArray as $recipient) {
            $invite = new Invite();
            $invite->setToEmail($recipient);
            $invite->setType($type);
            $invite->setService($service);
            $invite->setOlogy($ology);
            $invite->setMessage($msg);
            $invite->setFromUser($user);
            $this->em->persist($invite);
            
            $res[] = $invite;
        }
        $this->em->flush();
        
        return $res;
    }
    
    public function createGeneralInvites($fromUserId, $recipientArray, $msg, $service) {
        $user = $this->em->getReference('OlogySocialBundle:User', $fromUserId);
        $type = $this->em->getReference('OlogySocialBundle:InviteType', InviteType::GENERAL);
        
        $res = array();
        foreach ($recipientArray as $recipient) {
            $invite = new Invite();
            $invite->setToEmail($recipient);
            $invite->setType($type);
            $invite->setService($service);
            $invite->setFromUser($user);
            $invite->setMessage($msg);
            $this->em->persist($invite);
            
            $res[] = $invite;
        }
        $this->em->flush();
        
        return $res;
    }

    public function getInvite($inviteId) {

        $invite = $this->em->getRepository('OlogySocialBundle:Invite')
                ->find($inviteId);

        if (!$invite) {
            throw new DAOException('No invite found for id ' . $inviteId);
        }

        return $invite;
    }
    
    public function acceptInvite($inviteId) {
        $invite = $this->em->getRepository('OlogySocialBundle:Invite')->find($inviteId);
        if (!$invite) {
            throw new DAOException('No invite found for id ' . $inviteId);
        }

        $invite->setDateAccepted(new \DateTime('now'));
        $nbAccepted = $invite->getTimesAccepted();
        $invite->setTimesAccepted($nbAccepted + 1);
        
        $this->em->flush();
        return $invite;
    }

    public function deleteInvite($inviteId) {

        $invite = $this->em->getRepository('OlogySocialBundle:Invite')
                ->find($inviteId);

        if (!$invite) {
            return false;
        }

        $this->em->remove($invite);
        $this->em->flush();

        return true;
    }

    public function getInvites() {
        
        $invites = $this->em->getRepository('OlogySocialBundle:Invite')->findAll();
        
        return $invites;
    }
    
    public function getInvitesFromUser($userId) {
        
        $invites = $this->em->getRepository('OlogySocialBundle:Invite')->findBy(array ('fromUser' => $userId));
        
        return $invites;
    }

}

?>
