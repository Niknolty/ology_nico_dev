<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Message;
use Ology\SocialBundle\DAO\MessageDAO;

/**
 * Description of MessageService
 *
 * @author babour
 */
class MessageService {
   
    protected $messageDAO;

    function __construct(MessageDAO $dao) {
        $this->message = $dao;
    }
    
    public function createMessage($inboxId, $senderId, $subject, $body)    
    {
        $message = $this->message->createMessage($inboxId, $senderId, $subject, $body);
        
        return $message;
    }
    
    public function updateMessage($messageId, $inboxId, $senderId, $subject, $body, $datereceived, $dateread)
    {
        $message = $this->message->updateMessage($messageId, $inboxId, $senderId, $subject, $body, $datereceived, $dateread);        
        
        return $message;
    }
    
    
    public function deleteMessage($messageId){
        
        $result = $this->message->deleteMessage($messageId);
    
        return $result;
    }
    
    public function getMessage($messageId)
    {
        $message = $this->message->getMessage($messageId);        
        
        return $message;
    }
    
    public function getMessagesForUsers($userId)  {
        $messages = $this->message->getMessagesForUsers($userId);
        
        return $messages;
    }
    
    
}

?>
