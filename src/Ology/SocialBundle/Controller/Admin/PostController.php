<?php

namespace Ology\SocialBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller {
    /**
     * @Route("/publish", name="_adm_post_publish")
     */
    public function publishScheduled(Request $request) {
        $this->get('social.service.appmanager')->initApplication();

        $postService = $this->get('social.service.post');
        $n = $postService->publishScheduledPosts();
        
        $response = new Response("$n posts have been published.");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
}

?>
