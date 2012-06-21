<?php

namespace Ology\SocialBundle\Controller\Website;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OldGroupController extends BaseWebController {
    /**
     * @Route("/{groupId}", name="_website_old_group")
     */
    public function getOldGroup($groupId) {
        if ($groupId == 'cody-simpson')
            return $this->redirect($this->generateUrl('_website_ology', array('id' => 232, 'slug' => 'cody-simpson')));

        return $this->redirect($this->generateUrl('_website_splash'));
    }
}
?>
