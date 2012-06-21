<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostsOlogies;
use Ology\SocialBundle\Forms\Comment\CommentForm;
use Ology\SocialBundle\Forms\Post\PostForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomePageController extends BaseWebController {
    
    /**
     * @Route("/home", name="_website_home")
     * @Template("OlogySocialBundle:FrontEnd:home.html.twig")
     */
    public function getHomePage() {
        $this->preExecute(true, true);
        $this->get('social.service.appmanager')->initApplication();

        if (!$this->array['loggedIn'])
            return $this->redirect($this->generateUrl('_website_splash'));

        $userId = $this->array['user']->getId();
        $membershipService = $this->get('social.service.membership');
        $stashesIdsArray = $this->get('social.service.follow')->getUserFollowingStashesIds($userId);
        $followedUsersAndOlogiesArray = $this->get('social.service.follow')->getUserFolloweesOlogies($userId);
        $channelIdsArray = $this->get('social.service.subscription')->getChannelsIdForUser($userId);
        $allOlogies = $membershipService->getOlogiesForUser($userId);
        $ologyIdsArray = array();
        foreach ($allOlogies as $ology) {
            $ologyIdsArray[] = $ology->getId();
        }
        
        $posts = $this->get('social.service.post')->getHomePagePosts($userId, $ologyIdsArray, $channelIdsArray, $stashesIdsArray, $followedUsersAndOlogiesArray, 0, $this->nbPostsHomePage);
        
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            $post->stripTextContent(250);
            $postLink = $post->getPostLink();
            $postId = $post->getId();
            if (!empty($postLink) && $this->get('social.service.post')->isAuthorizedToUnReOlogize($this->user, $postLink))
                $post->setCanUnreOlogize(true);
            
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
        
        // Memberships of featured Ologies (to correctly display Follow/unfollow button
        $memberships = array();
        $featuredOlogies = $this->get('social.service.ology')->getFeaturedOlogies();
        foreach ($featuredOlogies as $featuredOlogy) {
            $oId = $featuredOlogy->getId();
            if ($membershipService->isMemberOfOlogy($userId, $oId)) {
                $memberships[$oId] = true;
            }      
        }
        
        // Suggested Ologies
        if ($this->user->getFbId()) {
            $suggestedOlogies = $this->get('social.service.membership')->suggestOlogiesUsingInterests($userId, 5);
            $this->array['suggestedOlogies'] = $suggestedOlogies;
        }
        
        $post = new Post();
        $post->setTitle("Title");
        $post->setTextContent("Write something...");
        $post->setFirstOlogyId(0);
        $post->setPostTypeId(2);
        $form = $this->createForm(new PostForm($this->user), $post);
        
        $this->array['sponsor'] = $this->get('social.service.sponsor')->getLatestSponsor();
        $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $userId);
        $this->array['posts'] = $posts;
        $this->array['featuredOlogies'] = $featuredOlogies;
        $this->array['memberships'] = $memberships;
        $this->array['nbPosts'] = $this->nbPostsHomePage;
        $this->array['postForm'] = $form->createView();
        
        $session = $this->get('session');
        if ($session->has('justRegistered')) {
            $this->array['justRegistered'] = $session->get("justRegistered");
            $session->remove("justRegistered");
        }
        
        return $this->array;
    }
    
    /**
     * @Route("/home/undo/{ids}", name="_website_undo_auto_join")
     */
    public function undoAutoJoin($ids) {
        $this->preExecute(false, false);
        $idArray = explode('-', $ids);
        foreach ($idArray as $id) {
            if ($id != "")
                $this->get('social.service.membership')->leaveOlogy($this->user->getId(), $id);
        }
        
        return $this->redirect($this->generateUrl('_website_home'));
    }
    
    /**
     * @Route("/home/{offset}/{n}", name="_website_home_pag")
     * @Template("OlogySocialBundle:FrontEnd:post_byology.html.twig")
     */
    public function getHomePagePaginated($offset, $n) {
        $this->preExecute(false, false);
        
        $userId = $this->array['user']->getId();
        $stashesIdsArray = $this->get('social.service.follow')->getUserFollowingStashesIds($userId);
        $followedUsersAndOlogiesArray = $this->get('social.service.follow')->getUserFolloweesOlogies($userId);
        $channelIdsArray = $this->get('social.service.subscription')->getChannelsIdForUser($userId);
        $membershipService = $this->get('social.service.membership');
        $allOlogies = $membershipService->getOlogiesForUser($userId);
        $ologyIdsArray = array();
        foreach ($allOlogies as $ology) {
            $ologyIdsArray[] = $ology->getId();
        }
        
        $posts = $this->get('social.service.post')->getHomePagePosts($userId, $ologyIdsArray, $channelIdsArray, $stashesIdsArray, $followedUsersAndOlogiesArray, $offset, $n);
        
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            $post->stripTextContent(250);
            $postLink = $post->getPostLink();
            if (!empty($postLink) && $this->get('social.service.post')->isAuthorizedToUnReOlogize($this->user, $postLink))
                $post->setCanUnreOlogize(true);
            
            // Add by Nicolas Le Deaut 05/16/2012 for new comments on post cards
            $postId = $post->getId();
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
        
        $nextVal = $offset + 1;
        $scroll = true;
        if (count($posts) == 0)
            $scroll = false;

        $this->array['posts'] = $posts;
        $this->array['page'] = 'home';
        $this->array['scroll'] = $scroll;
        $this->array['nextPage'] = $nextVal;
        $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $userId);
        $this->array['n'] = $n;

        return $this->array;
    }
}
?>
