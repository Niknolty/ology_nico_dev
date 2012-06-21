<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Forms\Comment\CommentForm;
use Ology\SocialBundle\Forms\Post\PostForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class OlogyPageController extends BaseWebController {
    
    /**
     * @Route("/ology/{id}/inv/{inviteId}", name="_website_ology_invite", requirements={"inviteId" = "\d+"})
     * @Route("/ology/{id}/{slug}", name="_website_ology", requirements={"id" = "\d+"}, defaults={"slug" = "ology"})
     * @Template("OlogySocialBundle:FrontEnd:ology.html.twig")
     */
    public function getOlogyPage($id, $slug = null, $inviteId = null) {
        $this->preExecute(true, true);
        $this->get('social.service.appmanager')->initApplication();
        $this->setPageIdInSession(self::OLOGY_PAGE, $id);
        $ology = $this->get('social.service.ology')->getOlogy($id);
        $stats = $this->get('social.service.ology')->getStats($id);
        $members = $this->get('social.service.membership')->getUsersForOlogy($ology->getId(), $this->nbMembers, true);
        $postsOlogies = $this->get('social.service.post')->getPostsOlogiesByOlogies(array($ology->getId()), 0, $this->nbPosts);
        
        /* Tab which contains the top ologists for a specific ology */
        $this->array['TopOlogistsTab'] = $this->get('social.service.user')->getTopOlogists($id);
        /* End */
 
        $StockCommentForms = array();
        $comments = array();
        foreach ($postsOlogies as $po) {
            $post = $po->getPost();
            $postId = $post->getId();
            if ($post->getIsDraft() == 1)
                continue;

            $post->stripTextContent(500);
            
            if ($this->get('social.service.post')->isAuthorizedToUnReOlogize($this->user, $po))
                $post->setCanUnreOlogize(true);
            $post->setPostLink($po);
            
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
            $isMember = $this->get('social.service.membership')->isMemberOfOlogy($this->user->getId(), $ology->getId());
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($postsOlogies, $this->user->getId());
        } else {
            $isMember = false;
        }

        if ($inviteId != null) {
            $this->get('session')->set(self::INVITE_ID, $inviteId);
        }

        $post = new Post();
        $post->setTitle("Title");
        $post->setTextContent("Write something...");

        $post->setFirstOlogyId($ology->getId());
        $post->setPostTypeId(2);
        $form = $this->createForm(new PostForm(), $post);

        $this->array['websiteUrl'] = $this->container->getParameter('website_url');
        $this->array['ology'] = $ology;
        $this->array['members'] = $members;
        $this->array['postsOlogies'] = $postsOlogies;
        $this->array['isMember'] = $isMember;
        $this->array['hasPosts'] = (count($postsOlogies) > 0);
        $this->array['nbPosts'] = $this->nbPosts;
        $this->array['postForm'] = $form->createView();
        $this->array['stats'] = $stats;
        
        return $this->array;
    }
    
    /**
     * @Route("/ology/{id}/{slug}/{offset}/{n}", name="_website_ology_pag", requirements={"id" = "\d+", "offset" = "\d+", "n" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:post_byology.html.twig")
     */
    public function getOlogyPagePaginated($id, $slug, $offset, $n) {
        $this->preExecute(false, false);
        $postsOlogies = $this->get('social.service.post')->getPostsOlogiesByOlogies(array($id), $offset, $n);
        $posts = array();
        $StockCommentForms = array();
        $comments = array();
        foreach ($postsOlogies as $po) {
            $post = $po->getPost();
            $postId = $post->getId();
            $post->stripTextContent(500);
            
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
            
            if ($this->get('social.service.post')->isAuthorizedToUnReOlogize($this->user, $po))
                $post->setCanUnreOlogize(true);
            $post->setPostLink($po);
            $posts[] = $post;
        }
        
        $this->array['commentForm'] = $StockCommentForms;
        $this->array['commentPost'] = $comments;
        
        if ($this->array['loggedIn'])
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($postsOlogies, $this->user->getId());
        $nextVal = $offset + 1;

        $scroll = true;
        if (count($postsOlogies) == 0)
            $scroll = false;

        $this->array['posts'] = $posts;
        $this->array['page'] = 'ology';
        $this->array['slug'] = $slug;
        $this->array['scroll'] = $scroll;
        $this->array['nextPage'] = $nextVal;
        $this->array['n'] = $n;
        $this->array['ologyId'] = $id;
        
        return $this->array;
    }
}
?>
