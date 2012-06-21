<?php

namespace Ology\SocialBundle\Controller\Exception;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExceptionController extends Controller {
    /**
     * @Route("/error", name="_exception")
     * @Template("OlogySocialBundle:Exception:error.html.twig")
     */
    public function exceptionAction() {
        $arr = array();
        return $arr;
    }

        /**
     * @Route("/error", name="_exception")
     * @Template("OlogySocialBundle:Exception:error.html.twig")
     */
    public function showAction() {
        $arr = array();
        return $arr;
    }
}