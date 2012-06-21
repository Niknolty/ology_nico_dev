<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Invite;
use Ology\SocialBundle\DAO\InviteDAO;
use Ology\SocialBundle\Service\EmailService;


class InviteService {
    
    protected $inviteDAO;
    protected $emailService;

    function __construct(InviteDAO $inviteDAO, EmailService $emailService) {
        $this->inviteDAO = $inviteDAO;
        $this->emailService = $emailService;
    }
    
    public function createFbInvite($fromUserId, $recipientId) {
        return $this->inviteDAO->createFbInvite($fromUserId, $recipientId);
    }
    
    public function createGeneralInvitesGmail($fromUserId, $recipientArray, $msg) {
        $invites = $this->inviteDAO->createGeneralInvites($fromUserId, $recipientArray, $msg, Invite::SVC_GMAIL);
        $this->emailService->emailInvites($invites);

        return $invites;
    }
    
    public function createOlogyAnonInvitesGmail($fromUserId, $ologyId, $recipientArray, $msg) {
        $invites = $this->inviteDAO->createOlogyAnonInvites($fromUserId, $ologyId, $recipientArray, $msg, Invite::SVC_GMAIL);
        $this->emailService->emailInvites($invites);
     
        return $invites;
    }
    
    public function createGeneralInvitesOlogy($fromUserId, $recipientArray, $msg) {
        $invites = $this->inviteDAO->createGeneralInvites($fromUserId, $recipientArray, $msg, Invite::SVC_OLOGY);
        $this->emailService->emailInvites($invites);

        return $invites;
    }
    
    public function createOlogyAnonInvitesOlogy($fromUserId, $ologyId, $recipientArray, $msg) {
        $invites = $this->inviteDAO->createOlogyAnonInvites($fromUserId, $ologyId, $recipientArray, $msg, Invite::SVC_OLOGY);
        $this->emailService->emailInvites($invites);
     
        return $invites;
    }
    
    public function acceptInvite($inviteId) {
        $invite = $this->inviteDAO->acceptInvite($inviteId);
    }

    public function getInvite($inviteId) {
        $invite = $this->inviteDAO->getInvite($inviteId);        
        return $invite;
    }
    
    public function deleteInvite($inviteId) {        
        $result = $this->inviteDAO->deleteInvite($inviteId);
        return $result;
    }
}

?>
