<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Likes;
use Ology\SocialBundle\Forms\Post\PostForm;
use Ology\SocialBundle\Forms\Post\AudioPostForm;
use Ology\SocialBundle\Forms\Post\ImagePostForm;
use Ology\SocialBundle\Forms\Post\TextPostForm;
use Ology\SocialBundle\Forms\Post\VideoPostForm;
use Ology\SocialBundle\Service\PostService;
use Ology\SocialBundle\Service\LikesService;
use Ology\SocialBundle\Exceptions\AccessDeniedException;


use Ology\SocialBundle\DAO\PostDAO;
use Ology\SocialBundle\Utility\ImagickService;
use Ology\SocialBundle\Resources\config\config_path;
use Ology\SocialBundle\Forms\Post\OlogizePostForm;

class PostController extends Controller {
    
    /**
     * @Route("/form/text/{ologyId}", name="_text_post_form", requirements = {"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:Post:create_text.html.twig")
     */
    public function displayTextPostForm($ologyId) {
        $post = new Post();
        $post->setFirstOlogyId($ologyId);
        $form = $this->createForm(new TextPostForm(), $post);

        return array('form' => $form->createView());
    }

    /**
     * @Route("/form/audio/{ologyId}", name="_audio_post_form", requirements = {"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:Post:create_audio.html.twig")
     */
    public function displayAudioPostForm($ologyId) {
        $post = new Post();
        $post->setFirstOlogyId($ologyId);
        $form = $this->createForm(new AudioPostForm(), $post);

        return array('form' => $form->createView());
    }

    /**
     * @Route("/form/image/{ologyId}", name="_image_post_form", requirements = {"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:Post:create_image.html.twig")
     */
    public function displayImagePostForm($ologyId) {
        $post = new Post();
        $post->setFirstOlogyId($ologyId);
        $form = $this->createForm(new ImagePostForm(), $post);

        return array('form' => $form->createView());
    }

    /**
     * @Route("/form/video/{ologyId}", name="_video_post_form", requirements = {"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:Post:create_video.html.twig")
     */
    public function displayVideoPostForm($ologyId) {
        $post = new Post();
        $post->setFirstOlogyId($ologyId);
        $form = $this->createForm(new VideoPostForm(), $post);

        return array('form' => $form->createView());
    }

    private function storePost($user, $post) {
        $ologyService = $this->get('social.service.ology');
        $postService = $this->get('social.service.post');

        $ologyId = $post->getFirstOlogyId();
        $ology = $ologyService->getOlogy($ologyId);
        $authorId = $user->getId();
        $title = $post->getTitle();
        $text = $post->getTextContent();
        if ($text == "Write something...")
            $text = " ";

        switch ($post->getPostTypeId()) {
            case PostType::IMAGE:
                if ($title == "Title")
                    $title = "Picture This";
                if ($post->getImageFile() == NULL) {
                    $post = $postService->createImagePostFromUrl($ologyId, $authorId, $title, $post->getImageUrl(), $text, false, $post->getImageSourceUrl());
                } else {
                    $post = $postService->createImagePost($ologyId, $authorId, $title, $post->getImageFile(), $text);
                }
                break;
            case PostType::AUDIO:
                if ($title == "Title")
                    $title = "Listen Up";
                $audio = $post->getAudioFile();
                $post = $postService->createAudioPost($ologyId, $authorId, $title, $audio, $text);
                break;
            case PostType::TEXT:
                if ($title == "Title")
                    $title = "Check This";
                $post = $postService->createTextPost($ologyId, $authorId, $title, $text);
                break;
            case PostType::VIDEO:
                if ($title == "Title")
                    $title = "Watch This";
                $videoUrl = $post->getVideoUrl();
                $post = $postService->createVideoPost($ologyId, $authorId, $title, $videoUrl, $text);
                break;
        }
        return $post;
    }
    
    
    /**
     * @Route("/storeo", name="_post_store_obj")
     */
    public function storePostWithOlogyObject(Request $request) {
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('security.context')->getToken()->getUser();

        $post = new Post();
        $form = $this->createForm(new PostForm(), $post);
        $form->bindRequest($request);

        $postForm = $request->request->get('postForm');

        $form = $postForm;
        $firstOlogyId = $form['firstOlogy'];

        // check user exists and is loged In (cookie valid)
        if (gettype($user) == "string")
            return $this->redirect($this->generateUrl('_website_ology', array('id' => $firstOlogyId)));

        $post->setFirstOlogyId($firstOlogyId);
        $post = $this->storePost($user, $post);

        return $this->redirect($this->generateUrl('_website_ology', array('id' => $firstOlogyId, 'slug' => $post->getFirstOlogy()->getSlug())));
    }

    /**
     * @Route("/storei", name="_post_store_id")
     */
    public function storePostWithOlogyId(Request $request){
        $this->get('social.service.appmanager')->initApplication();    
        $securityContext = $this->get('security.context');
        $this->user = $securityContext->getToken()->getUser();
        $post = new Post();
        $form = $this->createForm(new PostForm(), $post);
        $form->bindRequest($request);
        
        // If the user is logged in
        //if (gettype($this->user) != "string"){
        $user  = $securityContext->getToken()->getUser();
        $post = $this->storePost($user, $post);
        return $this->redirect($this->generateUrl('_website_ology', array('id' => $post->getFirstOlogy()->getId(), 'slug' => $post->getFirstOlogy()->getSlug())));
        //}
    }
      
    /**
     * @Route("/rpost", name="_remember_post_offline")
     */
    public function ajaxStorePostContent(Request $request) {
        $this->get('social.service.appmanager')->initApplication(); 
        $session = $this->getRequest()->getSession();
        
        $user = $this->get('social.service.user')->getUserByEmail('temp_user@ology.com');
        $postService = $this->get('social.service.post');
        $session->set('fake_user', $user);
        $session->set('offline_user_id', $user->getId());
        
        $post = new Post();
        
        $post_title = $request->request->get('title');
        $post_textC = $request->request->get('textC');
        $post_imgF = $request->request->get('imgF');
        $post_imgUrl = $request->request->get('imgUrl');
        $post_videoUrl = $request->request->get('videoUrl');
        $post_audioF = $request->request->get('audioF');
        $post_TypeId = $request->request->get('postTypeId');
        $post_firstOlogyId = $request->request->get('ology_id');
        $post_draft = $request->request->get('draft');

        $post->setTitle($post_title);
        $post->setTextContent($post_textC);
        $post->setPostTypeId($post_TypeId);
        $post->setImageFile($post_imgF);
        $post->setImageUrl($post_imgUrl);
        $post->setVideoUrl($post_videoUrl);
        $post->setAudioFile($post_audioF);
        $post->setFirstOlogyId($post_firstOlogyId);

        switch ($post->getPostTypeId()) {
            case PostType::IMAGE:
                if ($post_title == "Title")
                    $post_title = "Picture This";
                if ($post_imgF == NULL) {
                    $post = $postService->createImagePostFromUrl($post_firstOlogyId, $user->getId(), $post_title, $post_imgUrl, $post_textC, true);
                } else {
                    $post = $postService->createImagePost($post_firstOlogyId, $user->getId(), $post_title, $post_imgF, $post_textC, true);
                }
                break;
            case PostType::AUDIO:
                if ($post_title == "Title")
                    $post_title = "Listen Up";
                $post = $postService->createAudioPost($post_firstOlogyId, $user->getId(), $post_title, $post_audioF, $post_textC, true);
                break;
            case PostType::TEXT:
                if ($post_title == "Title")
                    $post_title = "Check This";
                $post = $postService->createTextPost($post_firstOlogyId, $user->getId(), $post_title, $post_textC, true);
                break;
            case PostType::VIDEO:
                if ($post_title == "Title")
                    $post_title = "Watch This";
                $post = $postService->createVideoPost($post_firstOlogyId, $user->getId(), $post_title, $post_videoUrl, $post_textC, true);
                break;
            default:
                die("Not a good type");
        }

        $session->set('offline_postId', $post->getId());
        $session->set('ology_id', $post_firstOlogyId);

        $response = new Response("OK");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/store/text", name="_post_store_text")
     */
    public function storeTextPost(Request $request) {
        $this->get('social.service.appmanager')->initApplication();

        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $post = new Post();
        $form = $this->createForm(new TextPostForm, $post);
        $form->bindRequest($request);

        if (!$form->isValid()) {
            throw new \Exception("invalid form in storeTextPost", 200);
        }

        $ologyId = $post->getFirstOlogyId();
        $authorId = $user->getId();
        $title = $post->getTitle();
        $text = $post->getTextContent();

        $postService = $this->get('social.service.post');
        $post = $postService->createTextPost($ologyId, $authorId, $title, $text);
        return $this->redirect($this->generateUrl('_post_get', array('id' => $post->getId())));
    }

    /**
     * @Route("/store/image", name="_post_store_image")
     */
    public function storeImagePost(Request $request) {
        $this->get('social.service.appmanager')->initApplication();

        // Read form
        $post = new Post();
        $form = $this->createForm(new ImagePostForm, $post);
        $form->bindRequest($request);

        if (!$form->isValid()) {
            throw new \Exception("invalid form in storeImagetPost", 200);
        }


        // Store post
        $postService = $this->get('social.service.post');

        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $ologyId = $post->getFirstOlogyId();
        $authorId = $user->getId();
        $title = $post->getTitle();
        $text = $post->getTextContent();
        $image = $form['imageFile']->getData();

        $post = $postService->createImagePost($ologyId, $authorId, $title, $image, $text);
        return $this->redirect($this->generateUrl('_post_get', array('id' => $post->getId())));
    }

    /**
     * @Route("/store/audio", name="_post_store_audio")
     */
    public function storeAudioPost(Request $request) {
        $this->get('social.service.appmanager')->initApplication();

        // Read form
        $post = new Post();
        $form = $this->createForm(new AudioPostForm, $post);
        $form->bindRequest($request);

        if (!$form->isValid()) {
            throw new \Exception("invalid form in storeAudioPost", 200);
        }


        // Store post
        $postService = $this->get('social.service.post');

        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $ologyId = $post->getFirstOlogyId();
        $authorId = $user->getId();
        $title = $post->getTitle();
        $text = $post->getTextContent();
        $audio = $form['audioFile']->getData();

        $post = $postService->createAudioPost($ologyId, $authorId, $title, $audio, $text);
        return $this->redirect($this->generateUrl('_post_get', array('id' => $post->getId())));
    }

    /**
     * @Route("/store/video", name="_post_store_video")
     */
    public function storeVideoPost(Request $request) {
        $this->get('social.service.appmanager')->initApplication();

        // Read form
        $post = new Post();
        $form = $this->createForm(new VideoPostForm, $post);
        $form->bindRequest($request);

        if (!$form->isValid()) {
            throw new \Exception("invalid form in storeVideoPost", 200);
        }

        // Store post
        $postService = $this->get('social.service.post');

        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $ologyId = $post->getFirstOlogyId();
        $authorId = $user->getId();
        $title = $post->getTitle();
        $text = $post->getTextContent();
        $videoUrl = $post->getVideoUrl();

        $post = $postService->createVideoPost($ologyId, $authorId, $title, $videoUrl, $text);
        return $this->redirect($this->generateUrl('_post_get', array('id' => $post->getId())));
    }

    /**
     * @Route("/{id}/editi", name="_post_edit_id", requirements = {"id" = "\d+"})
     */
    public function editPostWithOlogyId(Request $request, $id) {
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('security.context')->getToken()->getUser();

        $post = new Post();
        $form = $this->createForm(new PostForm(), $post);
        $form->bindRequest($request);

        // check user exists and is loged In (cookie valid)
        if (gettype($user) != "string") {
            $postService = $this->get('social.service.post');
            if (!$postService->isAuthorizedToEditOrDelete($user, $id)) {
                throw new AccessDeniedException();
            }

            if (!$form->isValid()) {
                throw new \Exception("invalid form in editPostWithOlogyId", 200);
            }

            $post = $this->editPost($id, $user, $post);

        }
        return $this->redirect($this->generateUrl('_website_ology', array('id' => $post->getFirstOlogy()->getId(), 'slug' => $post->getFirstOlogy()->getSlug())));
    }

    /**
     * @Route("/{id}/reologize", name="_post_reologize", requirements = {"id" = "\d+"})
     */
    public function reOlogize(Request $request, $id) {
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('security.context')->getToken()->getUser();

        $postForm = $request->request->get('postForm');
        $ologyId = $postForm['firstOlogy'];

        $ology = $this->get('social.service.ology')->getOlogy($ologyId);

        $this->get('social.service.post')->reOlogize($id, $ology->getId(), $user->getId());

        return $this->redirect($this->generateUrl('_website_ology', array('id' => $ologyId, 'slug' => $ology->getSlug())));
    }

    /**
     * @Route("/{postId}/{ologyId}/{userId}/unreologize", name="_post_unreologize", requirements = {"postId" = "\d+", "ologyId" = "\d+", "userId" = "\d+"})
     */
    public function unReOlogize(Request $request, $postId, $ologyId, $userId) {
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('security.context')->getToken()->getUser();

        $this->get('social.service.post')->unReOlogize($user, $postId, $ologyId, $userId);

        $response = new Response("");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    private function editPost($postId, $user, $post) {
        $ologyService = $this->get('social.service.ology');
        $postService = $this->get('social.service.post');

        $authorId = $user->getId();
        $title = $post->getTitle();
        $text = $post->getTextContent();

        switch ($post->getPostTypeId()) {
            case PostType::IMAGE:
                $image = $post->getImageFile();
                $post = $postService->updateImagePost($postId, $authorId, $title, $image, $text);
                break;
            case PostType::AUDIO:
                $audio = $post->getAudioFile();
                $post = $postService->updateAudioPost($postId, $authorId, $title, $audio, $text);
                break;
            case PostType::TEXT:
                $post = $postService->updateTextPost($postId, $authorId, $title, $text);
                break;
            case PostType::VIDEO:
                $videoUrl = $post->getVideoUrl();
                $post = $postService->updateVideoPost($postId, $authorId, $title, $videoUrl, $text);
                break;
        }
        return $post;
    }

    /**
     * @Route("/{id}/delete", name="_post_delete", requirements = {"id" = "\d+"})
     */
    public function deletePost($id) {
        $this->get('social.service.appmanager')->initApplication();

        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $postService = $this->get('social.service.post');
        if (!$postService->isAuthorizedToEditOrDelete($user, $id)) {
            throw new AccessDeniedException();
        }

        $result = $postService->deletePost($id);

        $response = new Response("OK");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/{id}/get", name="_post_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Post:get.html.twig")
     */
    public function getPost($id) {
        $postService = $this->get('social.service.post');
        $post = $postService->getPost($id);

        return array('post' => $post);
    }

    /**
     * @Route("/{id}/get/c", name="_post_comm_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Post:get.html.twig")
     */
    public function getPostWithComments($id) {
        $postService = $this->get('social.service.post');
        $res = $postService->getPostWithComments($id);

        $post = $res['post'];
        $comments = $res['comments'];

        return array('post' => $post, 'comments' => $comments);
    }

    /**
     * @Route("/get/recent/{offset}/{n}", name="_post_recent", requirements = {"n" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_recent.html.twig")
     */
    public function getMostRecent($offset, $n) {
        $postService = $this->get('social.service.post');
        $posts = $postService->getMostRecent($offset, $n);
        $nextVal = $offset + 1;

        return array('posts' => $posts, 'scroll' => true, 'nextPage' => $nextVal, 'n' => $n);
    }

    /**
     * @Route("/get/mostcom/{n}/", name="_post_mostcommented", requirements = {"n" = "\d+"})
     * @Template("OlogySocialBundle:Post:list.html.twig")
     */
    public function getMostCommented($n) {
        $postService = $this->get('social.service.post');
        $posts = $postService->getMostCommented($n);

        return array('posts' => $posts);
    }

    /**
     * @Route("/get/user/{id}/{offset}/{n}", name="_post_getbyuser", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Post:list.html.twig")
     */
    public function getPostsWrittenByUser($id, $offset, $n) {
        $postService = $this->get('social.service.post');
        $posts = $postService->getPostsByUser($id, $offset, $n);

        return array('posts' => $posts);
    }

    /**
     * @Route("/get/ologies/{ologyIds}/{offset}/{n}", name="svc_post_getbyologies", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Post:list.html.twig")
     */
    public function getPostsForOlogiesHomePage($ologyIds, $offset, $n) {

        $idsArrayUnfiltered = explode('-', $ologyIds);
        $idsArray = array();
        foreach ($idsArrayUnfiltered as $id) {
            if (is_numeric($id))
                $idsArray[] = $id;
        }

        $postService = $this->get('social.service.post');
        $posts = $postService->getPostsByOlogies($idsArray, $offset, $n);

        $nextPage = $offset + 1;
        $scroll = true;
        if (count($posts) == 0)
            $scroll = false;

        return array('posts' => $posts, 'inHomePage' => true, 'scroll' => $scroll, 'nextPage' => $nextPage, 'n' => $n, 'ologyIds' => $ologyIds);
    }

    /**
     * @Route("/get/ology/{id}/{offset}/{n}", name="svc_post_getforology", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Post:post_byology.html.twig")
     */
    public function getPostsForOlogy($id, $offset, $n) {
        $postService = $this->get('social.service.post');
        $posts = $postService->getPostsForOlogy($id, $offset, $n);

        $nextVal = $offset + 1;

        $scroll = true;
        if (count($posts) == 0)
            $scroll = false;

        return array('posts' => $posts, 'scroll' => $scroll, 'nextPage' => $nextVal, 'n' => $n, 'ologyId' => $id);
    }

    /**
     * @Route("/{postId}/canEdit", name="_post_isauthorized", requirements = {"postId" = "\d+"})
     */
    public function isAuthorizedToEditOrDelete($postId) {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $postService = $this->get('social.service.post');
        $right = $postService->isAuthorizedToEditOrDelete($user, $postId);

        return $right;
    }

    /**
     * @Route("/store_ologize_post", name="_store_ologize_post")
     */
    public function storeOlogizePost(Request $request) {
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('security.context')->getToken()->getUser();

        // create post
        $post = new Post();
        $form = $this->createForm(new PostForm(), $post);
        $form->bindRequest($request);
        $form = $request->request->get('postForm');

        $firstOlogyId = $form['firstOlogy'];
        // check user exists and is loged In (cookie valid)
        if (gettype($user) == "string")
            return $this->redirect($this->generateUrl('_website_ology', array('id' => $firstOlogyId)));

        // try to upload image
        $imageUrl = $form['imageUrl'];
        $url = $this->get('social.service.post')->saveWebImageForPost($imageUrl);

        $post->setImageUrl($url);
        $post->setImageSourceUrl($form['imageSourceUrl']);
        $post->setFirstOlogyId($firstOlogyId);
        $post = $this->storePost($user, $post);
        
//        $this->array = array();
//        $this->array['post_link'] = $this->generateUrl('_website_post', array('postId' => $post->getId(), 'slug' => $post->getSlug()),TRUE);
//        $response = $this->render('OlogySocialBundle:FrontEnd:ologize_thanks.html.twig', $this->array);
//        $response->headers->set('Content-Type', 'text/html');
//        return $response;

        return $this->redirect($this->generateUrl('_store_ologize_thanks', array('id' => $post->getId()), false));
    }
    
    /**
     * @Route("/store_ologize_thanks/{id}", name="_store_ologize_thanks", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:ologize_thanks.html.twig")
     */
    public function storeOlogizeThanks($id) {
        $this->get('social.service.appmanager')->initApplication();
        $postService = $this->get('social.service.post');
        $post = $postService->getPost($id);
        $first_ology = $post->getFirstOlogy();
        $this->array = array();
        $this->array['post_link'] = $this->generateUrl('_website_post', array('postId' => $post->getId(), 'slug' => $post->getSlug()),TRUE);
        $this->array['ology_link'] = $this->generateUrl('_website_ology', array('id' => $first_ology->getId(), 'slug' => $first_ology->getSlug()),TRUE);
        $this->array['ology_name'] = $first_ology->getName();
        $this->array['post'] = $post;
        return  $this->array;
    }
}

?>