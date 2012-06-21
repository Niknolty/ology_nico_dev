<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Likes;
use Ology\SocialBundle\Forms\Post\PostForm;
use Ology\SocialBundle\Forms\Post\AudioPostForm;
use Ology\SocialBundle\Forms\Post\ImagePostForm;
use Ology\SocialBundle\Forms\Post\TextPostForm;
use Ology\SocialBundle\Forms\Post\VideoPostForm;
use Ology\SocialBundle\Service\LikesService;
use Ology\SocialBundle\Exceptions\AccessDeniedException;
use Ology\SocialBundle\Controller\Website\BaseWebController;

class LikesController extends BaseWebController {
    
    
    /**
     * @Route("/love/{postId}", name="_post_love", requirements={"postId" = "\d+"}))
     */
    public function PostLove($postId) {      
        $securityContext = $this->get('security.context');
        $likesService = $this->get('social.service.likes');
        $postService = $this->get('social.service.post');
        $authorId = $securityContext->getToken()->getUser()->getId();
        $likesService->createLikes($authorId, $postId, "love");
        return new Response();
    }
    
    /**
     * @Route("/unlove/{postId}", name="_post_unlove", requirements={"postId" = "\d+"})
     */
    public function PostUnLove($postId) {
        $securityContext = $this->get('security.context');
        $likesService = $this->get('social.service.likes');
        $authorId = $securityContext->getToken()->getUser()->getId();
        $likesService->deleteLikes($authorId, $postId, "love");
        return new Response();
    }
    
    /**
     * @Route("/hate/{postId}", name="_post_hate", requirements={"postId" = "\d+"})
     */
    public function PostHate($postId) {
        $securityContext = $this->get('security.context');
        $likesService = $this->get('social.service.likes');
        $authorId = $securityContext->getToken()->getUser()->getId();
        $likesService->createLikes($authorId, $postId, "hate");
        return new Response();
    }
    /**
     * @Route("/unhate/{postId}", name="_post_unhate", requirements={"postId" = "\d+"})
     */
    public function PostUnHate($postId) {
        $securityContext = $this->get('security.context');
        $likesService = $this->get('social.service.likes');
        $authorId = $securityContext->getToken()->getUser()->getId();
        $likesService->deleteLikes($authorId, $postId, "hate");
        return new Response();
    }
    
    /**
     * @Route("/hmm/{postId}", name="_post_hmm", requirements={"postId" = "\d+"})
     */
    public function PostHmm($postId) {
        $securityContext = $this->get('security.context');
        $likesService = $this->get('social.service.likes');
        $authorId = $securityContext->getToken()->getUser()->getId();
        $likesService->createLikes($authorId, $postId, "hmm");
        return new Response();
    }
    
    /**
     * @Route("/unhmm/{postId}", name="_post_unhmm", requirements={"postId" = "\d+"})
     */
    public function PostUnHmm($postId) {
        $securityContext = $this->get('security.context');
        $likesService = $this->get('social.service.likes');
        $authorId = $securityContext->getToken()->getUser()->getId();
        $likesService->deleteLikes($authorId, $postId, "hmm");
        return new Response();
    }
  
    
    /**
     * @Route("/offline_love", name="_post_offline_love")
     */
    public function PostOfflineLove(Request $request) {
       $postId = $request->request->get('pid');
       $userService = $this->get('social.service.user');
       $user = $userService->getUserByEmail("temp_user@ology.com");
       $authorId = $user->getId();
       $likesService = $this->get('social.service.likes');
       $like = $likesService->createLikes($authorId, $postId, "love");
       
       return new Response();
    }
    
    
    
    /**
     * @Route("/offline_hate", name="_post_offline_hate")
     */
    public function PostOfflineHate(Request $request) {
       $postId = $request->request->get('pid');
       $userService = $this->get('social.service.user');
       $user = $userService->getUserByEmail("temp_user@ology.com");
       $authorId = $user->getId();
       $likesService = $this->get('social.service.likes');
       $likesService->createLikes($authorId, $postId, "hate");
       
       return new Response();
    }
    
    /**
     * @Route("/offline_hmm", name="_post_offline_hmm")
     */
    public function PostOfflineHmm(Request $request) {
       $postId = $request->request->get('pid');
       $userService = $this->get('social.service.user');
       $user = $userService->getUserByEmail("temp_user@ology.com");
       $authorId = $user->getId();
       $likesService = $this->get('social.service.likes');
       $likesService->createLikes($authorId, $postId, "hmm");
       
       return new Response();
    }
   
    
}

?>