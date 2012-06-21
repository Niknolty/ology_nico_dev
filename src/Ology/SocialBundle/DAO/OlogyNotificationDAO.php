<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\OlogyNotification;

/**
 * Description of OlogyNotificationDAO
 *
 * @author erwan
 */
class OlogyNotificationDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createOlogyNotification($ologyId, $userId, $content) {

        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $ologyNoti = new OlogyNotification();
        $ologyNoti->update($ology, $user, $content);

        $this->em->persist($ologyNoti);
        $this->em->flush();

        return $ologyNoti;
    }

    public function updateOlogyNotification($ologyNotiId, $ologyId, $userId, $content) {

        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $ologyNoti = $this->em->getRepository('OlogySocialBundle:OlogyNotification')->find($ologyNotiId);

        if (!$ologyNoti) {
            throw new DAOException('No ology notification found for id ' . $ologyNotiId);
        }

        $ologyNoti->update($ology, $user, $content);

        $this->em->flush();

        return $ologyNoti;
    }

    public function deleteOlogyNotification($ologyNotiId) {

        $ologyNoti = $this->em->getRepository('OlogySocialBundle:OlogyNotification')->find($ologyNotiId);

        if (!$ologyNoti) {
            return false;
        }

        $this->em->remove($ologyNoti);
        $this->em->flush();

        return true;
    }

    public function getOlogyNotification($ologyNotiId) {

        $ologyNoti = $this->em->getRepository('OlogySocialBundle:OlogyNotification')->find($ologyNotiId);

        if (!$ologyNoti) {
            throw new DAOException('No ology notification found for id ' . $ologyNotiId);
        }

        return $ologyNoti;
    }
    
    public function getOlogyNotificationsFromUser($userId) {
        $ologyNoti = $this->em->getRepository('OlogySocialBundle:OlogyNotification')->findBy(array ('user' => $userId));
        
        return $ologyNoti;
    }
    
    public function deleteOlogyNotificationsFromOlogy($ologyId) {
        $query = $this->em->createQuery('DELETE Ology\SocialBundle\Entity\OlogyNotification u WHERE u.ology = ?1');
        $query->setParameter(1, $ologyId);
        $result = $query->getResult();    
    }

}    

?>
