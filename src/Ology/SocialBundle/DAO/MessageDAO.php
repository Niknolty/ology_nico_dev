<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Message;

/**
 * Description of MessageDAO
 *
 * @author babour
 */
class MessageDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createMessage($inboxId, $senderId, $subject, $body) {
        
        $inbox = $this->em->getReference('OlogySocialBundle:Inbox', $inboxId);
        $sender = $this->em->getReference('OlogySocialBundle:User', $senderId);

        $message = new Message();
        $message->update($inbox, $sender, $subject, $body);

        $this->em->persist($message);
        $this->em->flush();

        return $message;
    }

    public function updateMessage($messageId, $inboxId, $senderId, $subject, $body, $datereceived, $dateread) {
        
        $message = $this->em->getRepository('OlogySocialBundle:Message')
                ->find($messageId);
        
        if (!$message)
        {
            throw new DAOException('No messagefound for the user id ' . $message);            
        }
        
        $inbox = $this->em->getReference('OlogySocialBundle:Inbox', $inboxId);
        $sender = $this->em->getReference('OlogySocialBundle:User', $senderId);
        
        $message->update($inbox, $sender, $subject, $body);
        $message->setReadDate($dateread);
        
        $this->em->flush();
        
        return $message;
    }

    public function getMessage($messageId) {
        
        $message = $this->em->getRepository('OlogySocialBundle:Message')
                ->find($messageId);

        if (!$message) {
            throw new DAOException('No message found for the id ' . $messageId);
        }

        return $message;
    }

    public function deleteMessage($messageId) {

        $message = $this->em->getRepository('OlogySocialBundle:Message')
                ->find($messageId);

        if (!$message) {
            return false;
        }

        $this->em->remove($message);
        $this->em->flush();

        return true;
    }
    
    public function getMessagesForUsers($userId) {
        $messages = $this->em->getRepository('OlogySocialBundle:Message')
                ->findBy(array ('user' => $userId));        
        
        return $messages;
        
    }
}

?>
