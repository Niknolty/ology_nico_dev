<?php

namespace Ology\SocialBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailController extends Controller {
    
    /**
     * @Route("/missyou", name="_email_missyou")
     */
    public function sendWeMissYouEmails() {
        $n = $this->get('social.service.user')->sendWeMissYouReminder();
        
        $response = new Response("$n users have been bugged.");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
}
?>
