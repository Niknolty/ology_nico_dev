<?php

namespace Ology\SocialBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPageController extends Controller {
    /**
     * @Route("/", name="_admin_home")
     * @Template("OlogySocialBundle:Admin:home.html.twig")
     */
    public function getHomePage() {
        //$res = $this->get('social.service.user')->getUsersByRoles();
        
        return array('admins' => array(), 'editors' => array());
        //return array('admins' => $res['admins'], 'editors' => $res['editors']);
    }
}
?>
