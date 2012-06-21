<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\Entity\Notification;
use Ology\SocialBundle\Entity\NotificationType;
use Ology\SocialBundle\Entity\Invite;
use Ology\SocialBundle\Entity\InviteType;

class EmailService {
    protected $mailer;
    protected $templatingService;
    protected $websiteUrl;
    
    function __construct($websiteUrl, $mailer, $templatingService) {
        $this->websiteUrl = $websiteUrl;
        $this->mailer = $mailer;
        $this->templatingService = $templatingService;
    }
    
    public function emailWeMissYou($users) {
        foreach ($users as $user) {
            if ($user->getDoNotEmail())
                continue;
            
            $var = array('firstName' => $user->getFirstName(), 
                        'lastName' => $user->getLastName(),
                        'websiteUrl' => $this->websiteUrl);

            $this->sendMail($user->getEmail(),
                            'We want you back!',
                            'OlogySocialBundle:Email:WeMissYou.html.twig', 
                            $var);
        }
    }
    
    public function emailNotifications($notifs) {
        foreach ($notifs as $notif) {
            $this->emailNotification($notif);
        }
    }
    
    public function emailInvites($invites) {
        foreach ($invites as $invite) {
            $this->emailInvite($invite);
        }
    }
    
    public function emailInvite($invite) {
        if ($invite->getService() != Invite::SVC_FACEBOOK) {
            switch ($invite->getType()->getId()) {
                case InviteType::GENERAL:
                    $this->sendInviteGeneralEmail($invite);
                    break;

                case InviteType::OLOGY_ANON:
                    $this->sendInviteOlogyAnonEmail($invite);
                    break;

                case InviteType::OLOGY_MEMBER:
                    $this->sendInviteOlogyMemberEmail($invite);
                    break;
            }
        }
    }
    
    private function sendInviteGeneralEmail($invite) {        
        $name = $invite->getFromUser()->getFirstName() . " " . $invite->getFromUser()->getLastName();
        $var = array('inviterName' => $name, 
                     'inviterId' => $invite->getFromUser()->getId(),
                        'inviteId' => $invite->getId(), 
                        'websiteUrl' => $this->websiteUrl);
        
        if ($invite->getMessage() != "")
            $var['msg'] = $invite->getMessage();

        $this->sendMail($invite->getToEmail(),
                            'Invite to Ology',
                            'OlogySocialBundle:Email:invite.html.twig', 
                            $var);
    }
    
    private function sendInviteOlogyAnonEmail($invite) {        
        $name = $invite->getFromUser()->getFirstName() . " " . $invite->getFromUser()->getLastName();
        $recipientEmail = $invite->getToEmail();
        $ologyId = $invite->getOlogy()->getId();
        $ologyName = $invite->getOlogy()->getName();
        
        $var = array('inviterName' => $name,
                        'inviterId' => $invite->getFromUser()->getId(),
                        'inviteId' => $invite->getId(),
                        'heshe' => ($invite->getFromUser()->getSex() == 'female') ? 'She' : 'He',
                        'ologyName' => $ologyName, 
                        'ologyId' => $ologyId, 
                        'websiteUrl' => $this->websiteUrl);
        if ($invite->getMessage() != "")
            $var['msg'] = $invite->getMessage();

        $this->sendMail($recipientEmail,
                            'Invite to Ology',
                            'OlogySocialBundle:Email:invite_ology_anon.html.twig', 
                            $var);
    }
    
    private function sendInviteOlogyMemberEmail($invite) {        
        $name = $invite->getFromUser()->getFirstName() . " " . $invite->getFromUser()->getLastName();
        $recipientEmail = $invite->getToEmail();
        $ologyId = $invite->getOlogy->getId();
        $ologyName = $invite->getOlogy->getName();
        
        $var = array('inviterName' => $name, 
                        'ologyName' => $ologyName,
                        'ologyId' => $ologyId, 
                        'websiteUrl' => $this->websiteUrl);

        $this->sendMail($recipientEmail,
                            'Invite to Ology',
                            'OlogySocialBundle:Email:invite_ology.html.twig', 
                            $var);
    }
    
    public function emailNotification(Notification $notif = NULL) {
        if ($notif == NULL)
            return NULL;
        
        if ($notif->getOlogy() && $notif->getOlogy()->getBlacklisted())
            return NULL;
        
        $recipient = $notif->getRecipient();
        if ($recipient->getDoNotEmail())
            return NULL;
        
        switch ($notif->getType()->getId()) {
            case NotificationType::JOIN_OLOGY:
                if ($recipient->getAcceptsNotifNewMember())
                    $this->sendNewMemberInOlogyEmail($recipient, $notif->getUser(), $notif->getOlogy());
                break;
                
            case NotificationType::POST_IN_OLOGY:
                //if ($recipient->getAcceptsNotifNewPost())
                //    $this->sendNewPostEmail ($recipient, $notif->getPost());
                break;
                
            case NotificationType::COMMENT_ON_OWN_POST:
                if ($recipient->getAcceptsNotifNewCommentOwnPost())
                    $this->sendNewCommentOnYourPostEmail($recipient, $notif->getUser(), $notif->getPost());
                break;
                
            case NotificationType::COMMENT_ON_COMMENTED_POST:
                if ($recipient->getAcceptsNotifNewCommentOtherPost())
                    $this->sendNewCommentOnCommentedPostEmail($recipient, $notif->getUser(), $notif->getPost());
                break;
            
            case NotificationType::FOLLOW_USER_IN_OLOGY :
                if ($recipient->getAcceptsNotifNewFollower())
                    $this->sendFollowYouInOlogyEmail($recipient, $notif->getUser(), $notif->getOlogy());
                break;
                
            case NotificationType::FOLLOW_STASH :
                if ($recipient->getAcceptsNotifNewFollower())
                    $this->sendFollowYouInStashEmail($recipient, $notif->getUser(), $notif->getStash());
                break;
        }
    }

    public function sendWelcomeEmail($recipient) {
        $var = array('websiteUrl' => $this->websiteUrl,
                     'recipientName' => $recipient->getFirstName());
        
        $this->sendMail($recipient->getEmail(),
                        'Welcome to Ology',
                        'OlogySocialBundle:Email:Welcome.html.twig', 
                        $var);
    }
    
    private function sendNewMemberInOlogyEmail($recipient, $newMember, $ology) {        
        $var = array('followerName' => $newMember->getFirstName(),
                     'followerId' => $newMember->getId(),
                     'ologyName' => $ology->getName(),
                     'ologyId' => $ology->getId(),
                     'websiteUrl' => $this->websiteUrl,
                     'recipientName' => $recipient->getFirstName());
        
        $this->sendMail($recipient->getEmail(),
                        'Someone joined your ology',
                        'OlogySocialBundle:Email:NewMember.html.twig', 
                        $var);
    }
    
    public function sendNewCommentOnYourPostEmail($recipient, $commenter, $post) {
        $var = array('commenterName' => $commenter->getFirstName(),
                     'commenterId' => $commenter->getId(),
                     'ologyName' => $post->getFirstOlogy()->getName(),
                     'ologyId' => $post->getFirstOlogy()->getId(),
                     'postName' => $post->getTitle(),
                     'heshe' => ($commenter->getSex() == 'female') ? 'she' : 'he',
                     'postId' => $post->getId(),
                     'websiteUrl' => $this->websiteUrl,
                     'recipientName' => $recipient->getFirstName());
        
        $this->sendMail($recipient->getEmail(),
                        'Someone commented on your post',
                        'OlogySocialBundle:Email:NewCommentOnPostForAuthor.html.twig', 
                        $var);
        
    }
    
    public function sendNewCommentOnCommentedPostEmail($recipient, $commenter, $post) {
        $var = array('commenterName' => $commenter->getFirstName(),
                     'commenterId' => $commenter->getId(),
                     'ologyName' => $post->getFirstOlogy()->getName(),
                     'ologyId' => $post->getFirstOlogy()->getId(),
                     'postName' => $post->getTitle(),
                     'postId' => $post->getId(),
                     'websiteUrl' => $this->websiteUrl,
                     'recipientName' => $recipient->getFirstName());
        
        $this->sendMail($recipient->getEmail(),
                        'Someone replied to your comment',
                        'OlogySocialBundle:Email:NewCommentOnPostForCommentors.html.twig', 
                        $var);
        
    }
    
    public function sendFollowYouInStashEmail($recipient, $follower, $stash) {
        $var = array('followerName' => $follower->getFirstName(),
                     'followerId' => $follower->getId(),
                     'stashName' => $stash->getName(),
                     'stashId' => $stash->getId(),
                     'websiteUrl' => $this->websiteUrl,
                     'recipientName' => $recipient->getFirstName());
        
        $this->sendMail($recipient->getEmail(),
                        'Someone is following you...',
                        'OlogySocialBundle:Email:NewFollowerInStash.html.twig', 
                        $var);
        
    }
    
    public function sendFollowYouInOlogyEmail($recipient, $follower, $ology) {
        $var = array('followerName' => $follower->getFirstName(),
                     'followerId' => $follower->getId(),
                     'ologyName' => $ology->getName(),
                     'ologyId' => $ology->getId(),
                     'websiteUrl' => $this->websiteUrl,
                     'recipientName' => $recipient->getFirstName());
        
        $this->sendMail($recipient->getEmail(),
                        'Someone is following you...',
                        'OlogySocialBundle:Email:NewFollowerInOlogy.html.twig', 
                        $var);
        
    }
    
    public function sendNewPostEmail($recipient, $post) {
        $posterName = $post->getAuthor()->getFirstName();
        $posterId = $post->getAuthor()->getId();
        $ologyName = $post->getFirstOlogy()->getName();
        $ologyId = $post->getFirstOlogy()->getId();
        
        $title = "$posterName just posted in your ology $ologyName";
        $var = array('postId' => $post->getId(),
                     'posterName' => $posterName,
                     'postName' => $post->getTitle(),
                     'posterId' => $posterId,
                     'ologyName' => $ologyName,
                     'ologyId' => $ologyId,
                     'websiteUrl' => $this->websiteUrl,
                     'recipientName' => $recipient->getFirstName());
        
        $this->sendMail($recipient->getEmail(),
                        'Someone posted in an ology which you love!', 
                        'OlogySocialBundle:Email:NewPost.html.twig', 
                        $var);
    }
    
    private function sendMail($email, $title, $template, $var) {
        if (!(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)))
                return;

        $htmlBody = $this->templatingService
                ->renderResponse($template, $var)
                ->getContent();
        
        $message = \Swift_Message::newInstance()
            ->setSubject($title)
            ->setTo($email)
            ->setFrom(array('admin@ology.com' => 'Ology Admin'))
            ->setBody($htmlBody, 'text/html');
        
        $this->mailer->send($message);
    }
}

?>