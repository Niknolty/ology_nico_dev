<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Inbox;
use Ology\SocialBundle\DAO\InboxDAO;

/**
 * Description of InboxService
 *
 * @author erwan
 */
class InboxService {
    
    protected $inboxDAO;

    function __construct(InboxDAO $dao) {
        $this->inbox = $dao;
    }
    
    public function createInbox($userId)    
    {
        $inbox = $this->inbox->createInbox($userId);
        
        return $inbox;
    }
    
    
    public function getInbox($userId)
    {
        $inbox = $this->inbox->getInbox($userId);        
        
        return $inbox;
    }
    
    public function updateInbox($userId, $dateLastMessage)
    {
        $inbox = $this->inbox->updateInbox($userId, $dateLastMessage);        
        
        return $inbox;
    }
    
    
    public function deleteInbox($userId){
        
        $result = $this->inbox->deleteInbox($userId);
    
        return $result;
    }
    
}

?>
