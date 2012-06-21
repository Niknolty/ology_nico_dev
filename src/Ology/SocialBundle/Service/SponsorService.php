<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\SponsorDAO;

class SponsorService {
    protected $sponsorDAO;
 
    function __construct(SponsorDAO $sponsorDAO) {
        $this->sponsorDAO = $sponsorDAO;
    }
    
    public function getLatestSponsor() {
        return $this->sponsorDAO->getLatestSponsor();
    }
    
    public function addSponsor($name, $imageUrl, $tag) {
        return $this->sponsorDAO->addSponsor($name, $imageUrl, $tag);
    }
}
?>
