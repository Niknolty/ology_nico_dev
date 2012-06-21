<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\Membership;
use Ology\SocialBundle\Entity\MembershipType;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Exceptions\DAOException;

class MembershipDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function createMembership($userId, $ologyId, $membershipTypeId) {
        $user = $this->em->getReference('OlogySocialBundle:User', $userId);
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $membershipType = $this->em->getReference('OlogySocialBundle:MembershipType', $membershipTypeId);

        $membership = new Membership();
        $membership->setUser($user);
        $membership->setOlogy($ology);
        $membership->setMembershipType($membershipType);

        $this->em->persist($membership);
        $this->em->flush();

        return $membership;
    }

    public function getMembershipByUserAndOlogy($userId, $ologyId) {
        $query = $this->em->createQueryBuilder()
                ->add('select', 'm')
                ->from('OlogySocialBundle:Membership', 'm')
                ->where('m.user = ?1 AND m.ology = ?2')
                ->getQuery();

        $query->setParameter(1, $userId);
        $query->setParameter(2, $ologyId);
        $memberships = $query->getResult();
        
        if ($memberships == NULL)
            return NULL;
        return $memberships[0];
    }
    
    public function updateMembership($membershipId, $ologyId, $membershipTypeId) {
        $membership = $this->em->getRepository('OlogySocialBundle:Membership')->find($membershipId);

        if (!$membership)
            throw new DAOException('No membership found for id ' . $membershipId);

        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $membershipType = $this->em->getReference('OlogySocialBundle:MembershipType', $membershipTypeId);

        $membership->setOlogy($ology);
        $membership->setMembershipType($membershipType);

        $this->em->flush();

        return $membership;
    }

    public function getMembershipById($membershipId) {
        $membership = $this->em->getRepository('OlogySocialBundle:Membership')->find($membershipId);

        if (!$membership) {
            throw new DAOException('No membership found for id ' . $membershipId);
        }

        return $membership;
    }

    public function deleteMembershipByUserOlogy($userId, $ologyId) {
        $query = $this->em->createQueryBuilder()
                ->delete('OlogySocialBundle:Membership', 'm')
                ->where('m.user = ?1 AND m.ology = ?2')
                ->getQuery();

        $query->setParameter(1, $userId);
        $query->setParameter(2, $ologyId);
        $query->execute();
        
        return true;
    }

    public function deleteMembership($membershipId) {
        $membership = $this->em->getRepository('OlogySocialBundle:Membership')->find($membershipId);

        if (!$membership) {
            return false;
        }

        $this->em->remove($membership);
        $this->em->flush();

        return true;
    }

    public function getUsersForOlogy($ologyId, $n = NULL, $withPictureOnly = false) {
        $qb = $this->em->createQueryBuilder()
                ->add('select', 'u')
                ->from('OlogySocialBundle:User', 'u')
                ->innerJoin('u.memberships', 'm', Join::WITH, 'u = m.user AND m.ology = ?1');


        if ($withPictureOnly)
            $qb->andWhere('u.imageUrl IS NOT NULL');
        
        $qb->orderBy('m.creationDate', 'DESC');
        $query = $qb->getQuery();
        
        $query->setParameter(1, $ologyId);
        if ($n != NULL)
            $query->setMaxResults($n);
        
        $users = $query->getResult();
        return $users;
    }

    public function getOlogiesForUser($userId, $n = NULL) {
        $query = $this->em->createQueryBuilder()
                ->add('select', 'o')
                ->from('OlogySocialBundle:Ology', 'o')
                ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology AND m.user = ?1')
                ->orderBy('m.creationDate', 'DESC')
                ->getQuery();
        
        $query->setParameter(1, $userId);
        if ($n != NULL)
            $query->setMaxResults($n);
        
        $users = $query->getResult();
        return $users;
    }
    
    public function getOlogiesIdsForUser($userId, $n = NULL) {
        $query = $this->em->createQueryBuilder()
                ->add('select', 'o.id')
                ->from('OlogySocialBundle:Ology', 'o')
                ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology AND m.user = ?1')
                ->getQuery();
        
        $query->setParameter(1, $userId);
        if ($n != NULL)
            $query->setMaxResults($n);
        
        return $query->getResult();
    }
    
    public function getMembershipOlogiesInfosByUser($userId, $n = NULL) {
                $query = $this->em->createQueryBuilder()
                ->select('o.name, o.imageUrl, o.slug, o.id, m.creationDate')
                ->from('OlogySocialBundle:Ology', 'o')
                ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology AND m.user = ?1')
                ->orderBy('m.creationDate', 'DESC')
                ->getQuery();
        
        $query->setParameter(1, $userId);
        if ($n != NULL)
            $query->setMaxResults($n);
        
        $ologiesInfos = $query->getResult();
        
        return $ologiesInfos;
    }
    
    public function isMemberOfOlogy($userId, $ologyId) {
        $query = $this->em->createQueryBuilder()
                    ->add('select', 'm')
                    ->from('OlogySocialBundle:Membership', 'm')
                    ->where('m.user = ?1 AND m.ology = ?2')
                    ->getQuery();

        $query->setParameter(1, $userId);
        $query->setParameter(2, $ologyId);
        $res = $query->getResult();
        
        if (sizeof($res) == 0)
            return false;
        return true;
    }

    public function deleteMembershipsForOlogy($ologyId) {
        $query = $this->em->createQuery('DELETE Ology\SocialBundle\Entity\Membership u WHERE u.ology = ?1');
        $query->setParameter(1, $ologyId);
        $result = $query->getResult();
    }
}

?>
