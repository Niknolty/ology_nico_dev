<?php

namespace Ology\SocialBundle\Controller\Website;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Forms\Comment\CommentForm;

class ChannelPageController extends BaseWebController {
    /**
     * @Route("/channel/{stub}", name="_website_channel")
     */
    public function getChannelPage($stub) {
        $this->preExecute(true, true);
        $this->setPageIdInSession(self::CHANNEL_PAGE, $stub);
        $this->get('social.service.appmanager')->initApplication();

        $channel = $this->get('social.service.channel')->getChannel($stub);
        $posts = $this->get('social.service.post')->getPostsForChannel($channel->getId(), 0, 20);

        
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            if ($post->getIsDraft() == 1)
                continue;
            $post->stripTextContent(500);
            $postId = $post->getId(); 
            
            // Add by Nicolas Le Deaut 05/16/2012 for new comments on post cards
            $comment = new Comment();
            $comment->setPostId($postId);
            $form = $this->createForm(new CommentForm(), $comment);
            $StockCommentForms[$postId] = $form->createView();
            
            if ($post->getTimesCommented() == 1)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 1, 0);
            elseif ($post->getTimesCommented() >= 2)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 2, 0);
            // End
            
            
        }
        
        $this->array['commentForm'] = $StockCommentForms;
        $this->array['commentPost'] = $comments;
        
        $isSubscribed = FALSE;
        if ($this->array['loggedIn']) {
            $userId = $this->get('security.context')->getToken()->getUser()->getId();
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $this->user->getId());
            $isSubscribed = $this->get('social.service.subscription')->isSubscribedToChannel($userId, $channel->getId());
        }
        
        $this->array['channel'] = $channel;
        $this->array['isSubscribed'] = $isSubscribed;
        $this->array['posts'] = $posts;
        $this->array['n'] = 20;
        $this->array['stub'] = $stub;
        //die(\Ology\SocialBundle\Utility\TVarDumper::dump($posts, 3, true));
        //return $this->array;

        $response = $this->render('OlogySocialBundle:FrontEnd:channel.html.twig', $this->array);
        $response->headers->set('Content-Type', 'text/html');
        if (!$this->array['loggedIn']) {
            $cache = $this->get('social.dao.cache.page');
            $cache->cachePageAdd($_SERVER['REQUEST_URI'], $response->getContent(), 300);
        }

        return $response;
    }
    
    /**
     * @Route("/channel/{stub}/{offset}/{n}", name="_website_channel_pag", requirements = {"n" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_channel.html.twig")
     */
    public function getChannelPagePaginated($stub, $offset, $n) {
        $this->preExecute();
        $this->get('social.service.appmanager')->initApplication();
        
        $offset = intval($offset);
        $n = intval($n);
        
        $isLoving = array();
        $isHating = array();
        $isHmm = array();
        $likesService = $this->get('social.service.likes');
        
        $channel = $this->get('social.service.channel')->getChannel($stub);
        $posts = $this->get('social.service.post')->getPostsForChannel($channel->getId(), $offset, $n);
        
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            if ($post->getIsDraft() == 1)
                continue;
            $post->stripTextContent(500);
            $postId = $post->getId(); 
            if ($this->array['loggedIn']){
                    $userId = $this->user->getId();
                    if ($likesService->isHeLovingPost($userId, $postId, "love"))
                        $isLoving[$postId] = true;
                    else
                        $isLoving[$postId] = false;
                    if ($likesService->isHeLovingPost($userId, $postId, "hate"))
                        $isHating[$postId] = true;
                    else
                        $isHating[$postId] = false;
                    if ($likesService->isHeLovingPost($userId, $postId, "hmm"))
                        $isHmm[$postId] = true;
                    else
                        $isHmm[$postId] = false;
            }
            
            // Add by Nicolas Le Deaut 05/16/2012 for new comments on post cards
            $comment = new Comment();
            $comment->setPostId($postId);
            $form = $this->createForm(new CommentForm(), $comment);
            $StockCommentForms[$postId] = $form->createView();
            
            if ($post->getTimesCommented() == 1)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 1, 0);
            elseif ($post->getTimesCommented() >= 2)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 2, 0);
            // End
        }
        
        $isSubscribed = FALSE;
        if ($this->array['loggedIn']) {
            $userId = $this->get('security.context')->getToken()->getUser()->getId();
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $this->user->getId());
            $isSubscribed = $this->get('social.service.subscription')->isSubscribedToChannel($userId, $channel->getId());
        }
        
        $this->array['commentForm'] = $StockCommentForms;
        $this->array['commentPost'] = $comments;
        
        $this->array['isLoving'] = $isLoving;
        $this->array['isHating'] = $isHating;
        $this->array['isHmm'] = $isHmm;
        $this->array['channel'] = $channel;
        $this->array['posts'] = $posts;
        if (count($posts > 0))
            $this->array['scroll'] = true;
        $this->array['nextPage'] = $offset + 1;
        $this->array['n'] = $n;
        $this->array['stub'] = $stub;

        return $this->array;
    }
    
    /**
     * @Route("/channel/subscription/{channelId}", name="_website_channel_subscription", requirements = {"channelId" = "\d+"})
     * Ajax call
     */
    public function ajaxSubscribesToChannel($channelId) {
        $subscriptionService = $this->get('social.service.subscription');
        $user = $this->get('security.context')->getToken()->getUser();
        
        $subscriptionService->subscribeChannel($user->getId(), $channelId);
        
        return new Response();
    }
    
    /**
     * @Route("/{id}/offlineCoreOlogyJoin", name="_remember_core_ology_offline")
     */
    public function ajaxSubscribesToChannelOffline($id) {
        $this->get('social.service.appmanager')->initApplication();
        
        $session = $this->getRequest()->getSession();
        $session->set('offline_follow_channel', true);
        $session->set('offline_channel_id', $id);
        
        $response = new Response("OK");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/channel/unsubscription/{channelId}", name="_website_channel_unsubscription", requirements = {"channelId" = "\d+"})
     * Ajax call
     */
    public function ajaxUnsubscribesToChannel($channelId) {
        $subscriptionService = $this->get('social.service.subscription');
        $user = $this->get('security.context')->getToken()->getUser();
        
        $subscriptionService->unsubscribeChannel($user->getId(), $channelId);
        
        return new Response();
    }
    
}
?>