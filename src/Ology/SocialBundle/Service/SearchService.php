<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Exceptions\ServiceException;
use Ology\SocialBundle\Service\OlogyService;
use Ology\SocialBundle\Service\UserService;

class SearchService {

    protected $ologySearchService;
    protected $postSearchService;
    protected $userSearchService;

    function __construct ($ologySearchService, $userSearchService, $postSearchService) {
        $this->ologySearchService = $ologySearchService;
        $this->postSearchService = $postSearchService;
        $this->userSearchService = $userSearchService;
    }

    public function searchOlogy($search) {
        return $this->ologySearchService->find($search);
    }

    public function searchPost($search) {
        return $this->postSearchService->find($search);
    }

    public function searchUser($search) {
        return $this->userSearchService->find($search);
    }

}

?>
