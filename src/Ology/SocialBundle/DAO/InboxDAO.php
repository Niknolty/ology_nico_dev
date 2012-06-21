<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Inbox;

/**
 * Description of InboxDAO
 *
 * @author babour
 */
class InboxDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createInbox($userId) {
        $user = $this->em->getReference('OlogySocialBundle:User', $userId);

        $inbox = new Inbox();
        $inbox->update($user, null);

        $this->em->persist($inbox);
        $this->em->flush();

        return $inbox;
    }

    public function updateInbox($userId, $dateLastMessage) {
        
        $inbox = $this->em->getRepository('OlogySocialBundle:Inbox')
                ->find($userId);
        
        if (!$inbox)
        {
            throw new DAOException('No inboxfound for the user id ' . $inbox);            
        }
        
        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        
        $inbox->update($user, $dateLastMessage);
        
        $this->em->flush();
        
        return $inbox;
    }

    public function getInbox($userId) {
        
        $inbox = $this->em->getRepository('OlogySocialBundle:Inbox')
                ->find($userId);

        if (!$inbox) {
            throw new DAOException('No inbox found for the user id ' . $userId);
        }

        return $inbox;
    }

    public function deleteInbox($userId) {

        $inbox = $this->em->getRepository('OlogySocialBundle:Inbox')
                ->find($userId);

        if (!$inbox) {
            return false;
        }

        $this->em->remove($inbox);
        $this->em->flush();

        return true;
    }

}

?>
