<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Forms\Comment\CommentForm;
use Ology\SocialBundle\Service\CommentService;
use Ology\SocialBundle\Exceptions\AccessDeniedException;
use Ology\SocialBundle\Controller\Website\BaseWebController;

class CommentController extends BaseWebController {

    /**
     * @Route("/form/{postId}", name="_comment_on_post_form", requirements = {"postId" = "\d+"})
     * @Template("OlogySocialBundle:Comment:create.html.twig")
     */
    public function displayCommentOnPostForm($postId) {
        $postService = $this->get('social.service.post');
        $postAndComs = $postService->getPostWithComments($postId);
        
        $post = $postAndComs['post'];
        $comments = $postAndComs['comments'];
        
        $comment = new Comment();
        $comment->setPostId($postId);
        $form = $this->createForm(new CommentForm(), $comment);
        
        return array('post' => $post, 'comments' => $comments, 'form' => $form->createView());
    }

    /**
     * @Template("OlogySocialBundle:FrontEnd:register.html.twig")
     */
    private function storeComment(Request $request, $redirectController) {
        $this->get('social.service.appmanager')->initApplication();
        
        $comment = new Comment();
        $form = $this->createForm(new CommentForm, $comment);
        $form->bindRequest($request);
        if (!$form->isValid()) {
           new Response("invalid form", 200);
        }
        
        $postId = $comment->getpostId();
        $parentId = $comment->getParentCommentId();
        $content = $comment->getContent();
        
        $post = $this->get('social.service.post')->getPost($postId);
        $commentService = $this->get('social.service.comment');
        $securityContext = $this->get('security.context');
        $this->user = $securityContext->getToken()->getUser();        
        if (gettype($this->user) != "string"){
            $authorId  = $securityContext->getToken()->getUser()->getId();
            $comment = $commentService->createComment($authorId, $postId, $content, $parentId);
            return $this->redirect($this->generateUrl($redirectController, array( 'postId' => $postId, 'slug' => $post->getSlug())));
        }
        else {
            $session = $this->getRequest()->getSession();
            $session->set('offline_comment', $comment);
            $response = new Response();
            $response->headers->set('Content-Type', 'text/plain');
            return $response;
        }
    }
    
    /**
     * @Route("/rcom", name="_remember_comment_offline")
     */
    public function ajaxStoreCommentContent(Request $request) {
        $comment = $request->request->get('c');
        $post = $request->request->get('p');
         
        $session = $this->getRequest()->getSession();
        $session->set('offline_comment', $comment);
        $session->set('offline_comment_post_id', $post);
        
        $response = new Response();
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/store_ajax", name="_comment_store_ajax")
     */
    public function storeCommentInline(Request $request) {
        return $this->storeComment($request, '_website_post_ajax_comments');
    }

    /**
     * @Route("/store", name="_comment_store")
     */
    public function storeCommentPostPage(Request $request) {
        return $this->storeComment($request, '_website_postajaxcomments');
    }
    

    /**
     * @Route("{id}/update", name="_comment_update", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Comment:update.html.twig")
     */
    public function updateAction($id) {
        // check if the user is login and authorized to update, give his id if it's the case
        $authorId = $this->getLoggedUserId($id);

        $commentService = $this->get('social.service.comment');

        $postId = 4;
        $content = 'updated';
        $parentComment = null;

        $newcomment = $commentService->updateComment($id, $postId, $content, $parentComment);

        return array('comment' => $newcomment);
    }

    /**
     * @Route("/{id}/delete", name="_comment_delete", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Comment:delete.html.twig")
     */
    public function deleteComment($id) {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();
        
        $commentService = $this->get('social.service.comment');
        $result = $commentService->deleteComment($user, $id);
        return array('result' => $result);
    }

    /**
     * @Route("/{id}/get", name="_comment_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Comment:get.html.twig")
     */
    public function getComment($id) {
        $commentService = $this->get('social.service.comment');
        $comment = $commentService->getComment($id);
        return array('user' => $comment);
    }

    /**
     * @Route("/get/{n}/comment/for/{postId}/post/starting/{offet}", name="_comment_getcommentforpost", requirements = {"postId" = "\d+"}, requirements = {"n" = "\d+"}, requirements = {"offset" = "\d+"})
     * @Template("OlogySocialBundle:Comment:getCommentForPost.html.twig")
     */
    function getCommentForPost($n, $postId, $offeset) {
        $commentService = $this->get('social.service.comment');
        $comments = $commentService->getCommentForPost($postId, $n, $offset);
        return array('comments' => $comments);
    }

    /**
     * @Route("/get/{n}/comment/for/{userId}/user/staring/{offset}", name="_comment_getcommentforuser", requirements = {"userId" = "\d+"}, requirements = {"n" = "\d+"}, requirements = {"offset" = "\d+"})
     * @Template("OlogySocialBundle:Comment:getCommentForUser.html.twig")
     */
    function getCommentForUser($n, $userId, $offset) {
        $commentService = $this->get('social.service.comment');
        $comments = $commentService->getCommentForUser($userId, $n, $offset);
        return array('comments' => $comments);
    }

    /**
     * @Route("{id}/canEdit", name="_comment_isauthorized", requirements = {"id" = "\d+"})
     */
    public function isAuthorizedToEditOrDelete($id) {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $commentService = $this->get('social.service.comment');
        $right = $commentService->isAuthorizedToEditOrDelete($user, $id);

        return $right;
    }

    /**
     * @return userId
     * Throw exeption if the user isn't auth
     */
    private function getLoggedUserId($id) {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $commentService = $this->get('social.service.comment');
        if (!$commentService->isAuthorizedToEditOrDelete($user, $id))
            throw new AccessDeniedException();
        
        return $user->getId();
    }
}
?>