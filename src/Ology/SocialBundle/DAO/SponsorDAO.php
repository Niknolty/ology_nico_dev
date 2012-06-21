<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Sponsor;

class SponsorDAO {

    protected $em;

    function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function addSponsor($name, $imageUrl, $tag) {
        $sponsor = new Sponsor();
        $sponsor->setName($name);
        $sponsor->setImageUrl($imageUrl);
        $sponsor->setTag($tag);
        
        $this->em->persist($sponsor);
        $this->em->flush();

        return $sponsor;
    }

    public function getLatestSponsor() {
        $sponsors =  $this->em->createQueryBuilder()
                    ->add('select', 's')
                    ->from('OlogySocialBundle:Sponsor', 's')
                    ->orderBy('s.id', 'DESC')
                    ->getQuery()
                    ->setFirstResult(0)
                    ->setMaxResults(1)
                    ->getResult();
        
        if ($sponsors == NULL)
            return NULL;
        return $sponsors[0];
    }
}

?>
