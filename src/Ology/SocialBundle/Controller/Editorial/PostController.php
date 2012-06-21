<?php

namespace Ology\SocialBundle\Controller\Editorial;

use Ology\SocialBundle\Controller\Website\BaseWebController;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Forms\Post\Pictures;
use Ology\SocialBundle\Forms\Post\ProfessionalPostForm;
use Ology\SocialBundle\Forms\Post\UploadPictureForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends BaseWebController {
    
    /**
     * @Route("/", name="_editors_post_form")
     * @Route("/edit/{id}", name="_editors_post_edit_form")
     * @Route("/edit/{id}/{postPublish}", name="_editors_post_edit_pp_form")
     * @Template("OlogySocialBundle:Editorial:create_post.html.twig")
     */
    public function getCreatePostPage($id = NULL, $postPublish = NULL) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        if ($id) {
            $post = $this->get('social.service.post')->getPost($id);
        } else {
            $post = new Post();
        }
        
        if ($postPublish) {
            $post->setIsPostPublishEdit('true');
            $this->array['postPublish'] = true;
        }
        
        $form = $this->createForm(new ProfessionalPostForm($this->user), $post);
        $this->array['postForm'] = $form->createView();
        $this->array['post'] = $post;
        
        return $this->array;
    }
    
    /**
     * @Route("/list", name="_editors_post_list")
     * @Template("OlogySocialBundle:Editorial:post_list.html.twig")
     */
    public function getPostListPage($id = NULL) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $posts = $this->get('social.service.post')->getProfessionalPostsByUser($this->user->getId(), 0, 100);
        $drafts = array();
        $published = array();
        $scheduled = array();
        foreach ($posts as $post) {
            if ($post->getIsDraft() == 1) {
                if ($post->getScheduledPublish()) {
                    $scheduled[] = $post;
                } else {
                    $drafts[] = $post;
                }
            }
            else
                $published[] = $post;
        }
        
        $this->array['drafts'] = $drafts;
        $this->array['scheduled'] = $scheduled;
        $this->array['published'] = $published;
        
        return $this->array;
    }
    
    /**
     * @Route("/pic", name="_editors_post_pic_form")
     * @Template("OlogySocialBundle:Editorial:image_iframe.html.twig")
     */
    public function getCreatePicForm() {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $picForm = $this->createForm(new UploadPictureForm(), new Pictures());
        $this->array['picForm'] = $picForm->createView();
        
        return $this->array;
    }
    
    /**
     * @Route("/save", name="_editors_post_store")
     */
    public function storePost(Request $request) {
        $this->preExecute(false, false);        
        $this->get('social.service.appmanager')->initApplication();

        $postService = $this->get('social.service.post');
        $reqForm = $request->request->get('professionalPostForm');
        
        if ($reqForm['id'])
            $post = $postService->getPost($reqForm['id']);
        else
            $post = new Post();
        $form = $this->createForm(new ProfessionalPostForm(), $post);
        $form->bindRequest($request);
        
        if ($post->getIsPostPublishEdit()) {
            $post = $postService->editProfessionalPost($post->getId(), $post->getHtmlTitle(), 
                    $post->getMetaTitle(), $post->getSummary(), $post->getHtmlContent(), 
                    $post->getTags(), $post->getMetaKeywords(), $post->getMetaDescription(),
                    $post->getCiteTitle(), $post->getCiteUrl(), $post->getImageCaption(), 
                    $post->getImageAltText(), $post->getImageFile(),
                    $post->getImage1File(), $post->getImage2File());
        } else {
            $authorId = $this->user->getId();
            $title = $post->getTitle();
            $text = $post->getTextContent();
            $ologyId = $reqForm['firstOlogy'];
            $postType = $reqForm['postType'];
            if (array_key_exists('channelposts', $reqForm))
                $channels = array_keys($reqForm['channelposts']);
            else
                $channels = array();

            $post = $postService->createProfessionalPost($this->user, $ologyId, $postType, $post, $channels);
        }
        
        if ($post->getIsPostPublishEdit() && $this->user->getId() != $post->getAuthor()->getId())
            return $this->redirect($this->generateUrl('_website_post', array('postId' => $post->getId(), 'slug' => $post->getSlug())));
        
        return $this->redirect($this->generateUrl('_editors_post_list'));
    }
    
    /**
     * @Route("/pic/save", name="_editors_post_pic_store")
     */
    public function storePic(Request $request) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $pic = new Pictures();
        $form = $this->createForm(new UploadPictureForm(), $pic);
        $form->bindRequest($request);

        $postService = $this->get('social.service.post');
        $fileName = $postService->addPictureForProfessionalPost($pic->getPicture());
        
        $abspath = $this->container->getParameter('assets_base_urls') . $this->container->getParameter('s3_bucket') .
                    '/' . $this->container->getParameter('post_original_image_path') . $fileName;
        $response = new Response($abspath);
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/del/{id}", name="_pro_post_delete", requirements = {"id" = "\d+"})
     */
    public function deletePost($id) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $postService = $this->get('social.service.post');
        if (!$postService->isAuthorizedToEditOrDelete($this->user, $id)) {
            throw new AccessDeniedException();
        }

        $postService->deletePost($id);
        
        return $this->redirect($this->generateUrl('_editors_post_list'));
    }
}
?>
