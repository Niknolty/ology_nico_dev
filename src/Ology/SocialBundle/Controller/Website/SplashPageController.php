<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Forms\Comment\CommentForm;
use Ology\SocialBundle\Forms\Post\PostForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SplashPageController extends BaseWebController {
    
    /**
     * @Route("/splash", name="_website_splash")
     * @Route("/splash/{inviteId}/", name="_website_splash_invite_general", requirements={"inviteId" = "\d+"})
     * @Route("/", name="_website_splash_2")
     * @Template("OlogySocialBundle:FrontEnd:splash.html.twig")
     */
    public function getSplashPage($inviteId = null) {
        $this->preExecute();
        $this->setPageIdInSession(self::SPLASH_PAGE, "true");
        if ($inviteId && $inviteId != 0) {
            $this->get('session')->set(self::INVITE_ID, $inviteId);
        }
        $this->get('social.service.appmanager')->initApplication();

        $postService = $this->get('social.service.post');
        $posts = $postService->getPostsCardsByLabel(0, 0, $this->nbPostsSplash);
        
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            $post->stripTextContent(250);
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
        
        if ($this->array['loggedIn']) {
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $this->user->getId());
        } else {
            $form = $this->container->get('fos_user.registration.form');
            $this->array['almostForm'] = $form->createView();
        }
        shuffle($posts);

        $this->array['fb_controller_path'] = '_website_register';
        $this->array['posts'] = $posts;
        $this->array['n'] = $this->nbPostsSplash;

        return $this->array;
    }

    /**
     * @Route("/splash/{offset}/{n}", name="_website_splash_pag", requirements = {"n" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_recent_splash.html.twig")
     */
    public function getSplashPagePaginated($offset, $n) {
        $this->preExecute();
        $postService = $this->get('social.service.post');
        $posts = $postService->getPostsCardsByLabel(0, $offset, $n);

        
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            $post->stripTextContent(250);
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
        
        if ($this->array['loggedIn']) {
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $this->user->getId());
        } else {
            $form = $this->container->get('fos_user.registration.form');
            $this->array['almostForm'] = $form->createView();
        }
        
        $nextVal = $offset + 1;

        $this->array['posts'] = $posts;
        $this->array['scroll'] = true;
        $this->array['nextPage'] = $nextVal;
        $this->array['n'] = $n;

        return $this->array;
    }
    
    /**
     * @Route("/ologies", name="_ologies_autocomplete_ajax")
     */
    public function autoCompleteOlogies(Request $request) {
        $query = $request->query->get('query');
        $ologyData = $this->get('social.service.ology')->getOlogiesByPrefix($query);
        
        $suggestions = array();
        $images = array();
        $data = array();
        foreach ($ologyData as $subArray) {
            $data[] = $subArray['id'];
            $suggestions[] = $subArray['name'];
            $images[] = $subArray['image'];
        }
        
        $a = array('query' => $query, 'suggestions' => $suggestions, 'data' => $data, 'images' => $images);
        $response = new Response(json_encode($a));
        $response->headers->set('Content-Type', 'text/json');
        return $response;
    }
    
    /**
     * @Route("/splash/{offset}/{n}/{ologyPrefix}", name="_website_splash_ology_pag", requirements = {"n" = "\d+", "offset" = "\d+"})
     * @Template("OlogySocialBundle:Post:list.html.twig")
     */
    public function getSplashPageByOlogyPaginated($offset, $n, $ologyPrefix) {
        $this->preExecute();
        
        $postService = $this->get('social.service.post');
        $posts = $postService->getCachedPostsCardsForOlogyPrefix($ologyPrefix, $offset, $n);
        foreach ($posts as $post) {
            $post->stripTextContent(250);
        }
        
        if ($this->array['loggedIn']) {
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $this->user->getId());
        } else {
            $form = $this->container->get('fos_user.registration.form');
            $this->array['almostForm'] = $form->createView();
        }
        
        
        $nextVal = $offset + 1;

        $this->array['searchTerm'] = $ologyPrefix;
        $this->array['posts'] = $posts;
        $this->array['scroll'] = (count($posts) == $n);
        $this->array['nextPage'] = $nextVal;
        $this->array['n'] = $n;
        $this->array['ologyPrefix'] = $ologyPrefix;

        return $this->array;
    }
}
?>
