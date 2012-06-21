<?php

namespace Ology\SocialBundle\DAO;

/**
 * Description of StashDAO
 *
 * @author raphael
 */
use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Stash;
use Ology\SocialBundle\Exceptions\DAOException;
use Ology\SocialBundle\DAO\CacheDAO\StashCacheDAO;

class StashDAO {

    protected $stashCacheDAO;
    
    function __construct(EntityManager $em, StashCacheDAO $stashCacheDAO) {
        $this->em = $em;
        $this->stashCacheDAO = $stashCacheDAO;
    }

    public function createStash($founderId, $name) {
        $founder = $this->em->getReference('OlogySocialBundle:User', $founderId);

        $newStash = new Stash();
        $newStash->setFounder($founder);
        $newStash->setName($name);

        $this->em->persist($newStash);
        $this->em->flush();
        
        // Save in parallele in REDIS
        $this->stashCacheDAO->addUserStash($founderId, $newStash->getId());

        return $newStash;
    }

    public function getStash($id) {
        $stash = $this->em->getReference('OlogySocialBundle:Stash', $id);
        if (empty($stash))
            throw new DAOException('StashDAO: No stash found with id ' . $id);
        return $stash;
    }
    
    public function getAllStashesIds() {
        $query = $this->em->createQuery('SELECT s.id FROM Ology\SocialBundle\Entity\Stash s');
        $stashesIds = $query->getResult();

        $ids = array();
        foreach ($stashesIds as $stashId) {
            $ids[] = $stashId['id'];
        }
        
        return $ids;
    }
    
    public function getRecentStashesForUser($userId, $nbStashes) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 's')
                        ->from('OlogySocialBundle:Stash', 's')
                        ->where('s.founder = ?1')
                        ->orderBy('s.creationDate', 'DESC');

        $query = $qb->getQuery();
        $query->setParameter(1, $userId);
        /*if ($nbStashes > 0) {
            $query->setFirstResult(0);
            $query->setMaxResults($nbStashes);
        }*/
        $array = $query->getResult();

        return $array;
    }
    
    public function getStashesIdsForUser($userId, $offset = 0, $n = -1) {
        // Try getting user from REDIS cache, else loading DB then cache it
        $stashesIds = $this->stashCacheDAO->getStashesIdsForUser($userId, $offset, $n);
        if (!empty($stashesIds))
            return $stashesIds;
        
        $query = $this->em->createQuery('SELECT s.id FROM Ology\SocialBundle\Entity\Stash s WHERE s.founder = ?1');
        $query->setParameter(1, $userId);
        if ($offset > 0)
        $query->setFirstResult($offset);
        if ($n != -1)
            $query->setMaxResults($n);
        $stashesIds = $query->getResult();

        $ids = array();
        // Save in parallele in REDIS
        foreach ($stashesIds as $stashId) {
            $ids[] = $stashId['id'];
            $this->stashCacheDAO->addUserStash($userId, $stashId['id']);
        }
        
        return $ids;
    }
    
    public function editStash($stashId) {
        $stash = $this->em->getReference('OlogySocialBundle:Stash', $stashId);
        
        $this->em->persist($stash);
        $this->em->flush();
    }

    public function deleteStash($stashId) {
        $query = $this->em->createQuery('DELETE OlogySocialBundle:Stash s WHERE s.id = ?1');
        $query->setParameter(1, $stashId);
        $result = $query->getResult();
    }
}

?>
