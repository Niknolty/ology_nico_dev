<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Stash;
use Ology\SocialBundle\Forms\Comment\CommentForm;
use Ology\SocialBundle\Forms\Ology\OlogyForm;
use Ology\SocialBundle\Forms\Stash\StashForm;
use Ology\SocialBundle\Forms\Ology\OlogyFormEdit;
use Ology\SocialBundle\Forms\Post\PostForm;
use Ology\SocialBundle\Service\CommentService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ology\SocialBundle\Security\MessageDigestPasswordEncoder;
use Ology\SocialBundle\Forms\Post\ReOlogizePostForm;
use Ology\SocialBundle\Entity\PostsStashes;

//die(\Ology\SocialBundle\Utility\TVarDumper::dump($postsOlogies, 3, true));

class WebsiteController extends BaseWebController {
    
    /**
     * @Route("/post/{postId}/{slug}", name="_website_post", requirements={"postId" = "\d+"}, defaults={"slug" = ""})
     */
    public function getPostPage($postId, $slug) {
        $postService = $this->get('social.service.post');
        // redirect to /post/postId/actually_slug if slug is incorrect
        $slug_db = $postService->getSlug($postId);
        if ($slug_db !== false && $slug_db != $slug)
            return $this->redirect($this->generateUrl('_website_post', array('postId' => $postId, 'slug' => $slug_db)), 301);

        $this->preExecute(true, true);
        $this->get('social.service.appmanager')->initApplication();
        $this->setPageIdInSession(self::POST_PAGE, $postId);
        
        $post = $postService->getPost($postId);
        
        if ($post->getIsDraft() == 1)
            throw $this->createNotFoundException('Post not available');
            
        $postService->incNbViews($postId);
        $ology = $this->get('social.service.ology')->getOlogy($post->getFirstOlogy()->getId());
        // unused $ologies = $this->get('social.service.ology')->getOlogies();
        $members = $this->get('social.service.membership')->getUsersForOlogy($ology->getId(), $this->nbMembers, true);
        $comments = $this->get('social.service.comment')->getCommentForPost($postId, 9999, 0);
        $stats = $this->get('social.service.ology')->getStats($ology->getId());

        $likesService = $this->get('social.service.likes');
        $userService = $this->get('social.service.user');

        $postId = $post->getId();
        $this->array['nbLove'] = $likesService->getNumberOfLoveHateHmm($postId, "love");
        $this->array['nbHate'] = $likesService->getNumberOfLoveHateHmm($postId, "hate");
        $this->array['nbHmm'] = $likesService->getNumberOfLoveHateHmm($postId, "hmm");
        $firstLoveUserId = $likesService->getFirstUser($postId, "love");
        $firstHateUserId = $likesService->getFirstUser($postId, "hate");
        $firstHmmUserId = $likesService->getFirstUser($postId, "hmm");
        $this->array['UsersIdsLoveTab'] = array();
        $this->array['UsersIdsHateTab'] = array();
        $this->array['UsersIdsHmmTab'] = array();
        
        
        // FIXME Need to be optimized :/
        if ($this->array['nbLove'] > 0){
            $this->array['UsersIdsLoveTab'] = $likesService->getListUsersLike($postId, "love");
        }
        if ($this->array['nbHate'] > 0){
            $this->array['UsersIdsHateTab'] = $likesService->getListUsersLike($postId, "hate");
        }
        if ($this->array['nbHmm'] > 0){
            $this->array['UsersIdsHmmTab'] = $likesService->getListUsersLike($postId, "hmm");
        }
        
        if ($firstLoveUserId != -1){
            $user = $userService->getUser($firstLoveUserId);
            $this->array['firstNameLove'] = $user->getFirstName();
            $this->array['lastNameLove'] = $user->getLastName();
            $this->array['UserLoveId'] = $firstLoveUserId;
        }
        if ($firstHateUserId != -1){
            $user = $userService->getUser($firstHateUserId);
            $this->array['firstNameHate'] = $user->getFirstName();
            $this->array['lastNameHate'] = $user->getLastName();
            $this->array['UserHateId'] = $firstHateUserId;
        }
        if ($firstHmmUserId != -1){
            $user = $userService->getUser($firstHmmUserId);
            $this->array['firstNameHmm'] = $user->getFirstName();
            $this->array['lastNameHmm'] = $user->getLastName();
            $this->array['UserHmmId'] = $firstHmmUserId;
        }  
        
        if ($this->array['loggedIn']) {
            $this->array['likes'] = $likesService->getLikesForPosts(array($post), $this->user->getId());
        
            $isMember = $this->get('social.service.membership')->isMemberOfOlogy($this->user->getId(), $ology->getId());
            $canDeletePost = $this->get('social.service.post')->isAuthorizedToEditOrDelete($this->user, $postId);
            $post->setPostTypeId($post->getPostType()->getId());
            $postForm = $this->createForm(new PostForm(null, $post), $post);
            $this->array['postForm'] = $postForm->createView();
            $reOlogizeForm = $this->createForm(new PostForm($this->user), new Post());
            $this->array['reOlogizeForm'] = $reOlogizeForm->createView();
        } else {
            $isMember = false; 
            $canDeletePost = false;
        }

        $comment = new Comment();
        $comment->setPostId($postId);
        $form = $this->createForm(new CommentForm(), $comment);

        if ($post->getIsProfessional()) {
            $cps = $post->getChannelposts();
            if (count($cps) > 0) {
                $cp = $cps[0];
                $this->array['channel'] = $cp->getChannel();
            }
            
            if ($post->getTags() != '') {
                $tags = explode(',', $post->getTags());
                foreach ($tags as &$tag) {
                    $tag = trim($tag);
                }
                $this->array['tags'] = $tags;
            }
        }
    
        $ols = $ology->getOlogylabels();
        if (count($ols) > 0) {
            $ol = $ols[0];
            $relatedProPosts = $this->get('social.service.post')->getPostsPreviewByLabel($ol->getLabel()->getId(), 0, 2, true, $postId);
            $relatedPosts = $this->get('social.service.post')->getPostsPreviewByLabel($ol->getLabel()->getId(), 0, 8, false, $postId);
        } else {
            $relatedProPosts = $this->get('social.service.post')->getPostsPreviewByLabel(1, 0, 2, true, $postId);
            $relatedPosts = $this->get('social.service.post')->getPostsPreviewByLabel(1, 0, 8, false, $postId);
        }
            
        $this->array['userPosts1'] = array_slice($relatedPosts, 0, 4);
        $this->array['userPosts2'] = array_slice($relatedPosts, 4, 4);
        
        
        if (count($relatedProPosts) >= 2) {
            $this->array['proPost1'] = $relatedProPosts[0];
            $this->array['proPost2'] = $relatedProPosts[1];
        } else {
            $this->array['proPost1'] = NULL;
            $this->array['proPost2'] = NULL;
        }
        
        
        // Recommended Ologies
        $memberships = array();
        $featuredOlogies = $this->get('social.service.ology')->getFeaturedOlogies();
        $this->array['featuredOlogies'] = $featuredOlogies;
        $featuredToDisplay = 4;
        
        if ($this->array['loggedIn']) {
            $membershipService = $this->get('social.service.membership');
            foreach ($featuredOlogies as $featuredOlogy) {
                $oId = $featuredOlogy->getId();
                if ($membershipService->isMemberOfOlogy($this->user->getId(), $oId)) {
                    $memberships[$oId] = true;
                }
            }
        
            if ($this->user->getFbId()) {
                $suggestedOlogies = $this->get('social.service.membership')->suggestOlogiesUsingInterests($this->user->getId(), 5);
                $this->array['suggestedOlogies'] = $suggestedOlogies;
                $featuredToDisplay = 4 - count($suggestedOlogies);
            }
        }
        $this->array['featuredToDisplay'] = $featuredToDisplay;
        $this->array['sponsor'] = $this->get('social.service.sponsor')->getLatestSponsor();
        
        $this->array['mostViewedPosts'] = $this->get('social.service.post')->getMostViewed();
        
        $this->array['fbAppId'] = $this->container->getParameter('facebookappif');
        $this->array['ology'] = $ology;
        $this->array['members'] = $members;
        $this->array['post'] = $post;
        $this->array['memberships'] = $memberships;
        $this->array['comments'] = $comments;
        $this->array['isMember'] = $isMember;
        $this->array['canDeletePost'] = $canDeletePost;
        $this->array['commentForm'] = $form->createView();
        $this->array['stats'] = $stats;
        
        
        // Tab which contains the top ologists for a specific ology
        $ologyId = $ology->getId();
        //$this->array['TopOlogistsTab'] = $this->get('social.service.user')->getTopOlogists($ologyId);
        /* End */
        
        $this->array['getPreviousAndNextPostInfos'] = $this->get('social.service.post')->getPreviousAndNextPostInfos($ologyId, $postId);
        
        if ($post->getIsProfessional()){
            // Get the author posts for an ology  
            $postFounderId = $post->getAuthor()->getId();
           
            $this->array['postsOfUserForOlogy'] = $this->get('social.service.post')->getPostsForUser($postFounderId, $postId);
            // End
            //return $this->render('OlogySocialBundle:FrontEnd:professional_post.html.twig', $this->array);
            $response = $this->render('OlogySocialBundle:FrontEnd:professional_post.html.twig', $this->array);
            $response->headers->set('Content-Type', 'text/html');
            if (!$this->array['loggedIn']) {
                $cache = $this->get('social.dao.cache.page');
                $cache->cachePageAdd($_SERVER['REQUEST_URI'], $response->getContent(), 300);
            }
            return $response;
        }   
        else{
            //return $this->render('OlogySocialBundle:FrontEnd:post.html.twig', $this->array);
            $response = $this->render('OlogySocialBundle:FrontEnd:post.html.twig', $this->array);
            $response->headers->set('Content-Type', 'text/html');
            if (!$this->array['loggedIn']) {
                $cache = $this->get('social.dao.cache.page');
                $cache->cachePageAdd($_SERVER['REQUEST_URI'], $response->getContent(), 300);
            }
            return $response;
        }
    }
    
    /**
     * @Route("/post-comments/{postId}/{slug}", name="_website_post_ajax_comments", requirements={"postId" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:inline_comments.html.twig")
     */
    public function ajaxGetComments($postId, $slug) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();
        
        $comments = $this->get('social.service.comment')->getCommentForPost($postId, 9999, 0);

        $comment = new Comment();
        $comment->setPostId($postId);
        $form = $this->createForm(new CommentForm(), $comment);
        
        $this->array['postId'] = $postId;
        $this->array['postSlug'] = $slug;
        $this->array['comments'] = $comments;
        $this->array['commentForm'] = $form->createView();
        
        return $this->array;
    }
    
    
    /**
     * @Route("/postComments/{postId}/{slug}", name="_website_postajaxcomments", requirements={"postId" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:post_comments.html.twig")
     */
     public function ajaxGetPostComments($postId, $slug) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();
        
        $comments = $this->get('social.service.comment')->getCommentForPost($postId, 9999, 0);
        
        $comment = new Comment();
        $comment->setPostId($postId);
        $form = $this->createForm(new CommentForm(), $comment);
        
        $this->array['postId'] = $postId;
        $this->array['postSlug'] = $slug;
        $this->array['comments'] = $comments;
        $this->array['commentForm'] = $form->createView();
        
        return $this->array;
    }
    
    
    /**
     * @Route("/gi/{url}", name="_website_post_ajax_grab")
     */
    public function ajaxGrabImage($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $content = curl_exec($ch);

        $type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        
        $response = new Response($type);
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/create", name="_website_create")
     * @Template("OlogySocialBundle:FrontEnd:create.html.twig")
     */
    public function getCreatePage() {
        $this->preExecute(true, false);

        return $this->array;
    }
    
    /**
     * @Route("/create/ology", name="_website_create_ology")
     * @Route("/create/ology/{name}", name="_website_create_ology_byname")
     * @Template("OlogySocialBundle:FrontEnd:create_ology.html.twig")
     */
    public function getCreateOlogyPage($name = NULL) {
        $this->preExecute(true, false);
        $this->get('social.service.appmanager')->initApplication();

        if (!$this->array['loggedIn'])
            return $this->redirect($this->generateUrl('_website_splash'));

        $ology = new Ology();
        if ($name != NULL)
            $ology->setName($name);
        $form = $this->createForm(new OlogyForm(), $ology);

        $this->array['ologyForm'] = $form->createView();

        return $this->array;
    }
    
    /**
     * @Route("/create/stash", name="_website_create_stash")
     * @Template("OlogySocialBundle:FrontEnd:create_stash.html.twig")
     */
    public function getCreateStashPage() {
        //$this->preExecute(true, false);

        $stash = new Stash();
        $form = $this->createForm(new StashForm(), $stash);

        $this->array['stashForm'] = $form->createView();

        return $this->array;
    }

    /**
     * @Route("/update/{id}", name="_website_update_ology")
     * @Template("OlogySocialBundle:FrontEnd:update_ology.html.twig")
     */
    public function getUpdateOlogyPage($id) {
        $this->preExecute(true, false);
        $this->get('social.service.appmanager')->initApplication();

        if (!$this->array['loggedIn'])
            return $this->redirect($this->generateUrl('_website_splash'));

        $ology = $this->get('social.service.ology')->getOlogy($id);
        $form = $this->createForm(new OlogyFormEdit(), $ology);
        $this->array['ologyForm'] = $form->createView();
        $this->array['ology'] = $ology;
        $categories = $ology->getOlogylabels();
        $this->array['category'] = $categories[0]->getLabel()->getId();
        
        return $this->array;
    }

    /**
     * @Route("/terms", name="_website_terms")
     * @Template("OlogySocialBundle:FrontEnd:terms.html.twig")
     */
    public function getTerms() {
        $this->preExecute(false, false);
        return $this->array;
    }

    /**
     * @Route("/faq", name="_website_faq")
     * @Template("OlogySocialBundle:FrontEnd:faq.html.twig")
     */
    public function getfaq() {
        $this->preExecute(false, false);
        return $this->array;
    }

    /**
     * @Route("/ologist/{id}", name="_website_ologist", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Membership:getUsersForOlogy.html.twig")
     */
    public function getOlogist($id) {
        $this->preExecute(true, false);

        $membershipService = $this->get('social.service.membership');
        $ologist = $membershipService->getUsersForOlogy($id, null, false);
        $ology = $this->get('social.service.ology')->getOlogy($id);
        $stats = $this->get('social.service.ology')->getStats($id);

        if ($this->array['loggedIn']) {
            $isMember = $this->get('social.service.membership')->isMemberOfOlogy($this->user->getId(), $ology->getId());
        } else {
            $isMember = false;
        }
        $this->array['isMember'] = $isMember;
        $this->array['ologist'] = $ologist;
        $this->array['ology'] = $ology;

        return $this->array;
    }

    /**
     * @Route("/node/{old_id}", name="_website_post_by_old_id", requirements={"nid" = "\d+"})
     */
    public function getPostPageByOldId($old_id) {
        $post = $this->get('social.service.post')->getPostByOldId($old_id);
        return $this->redirect($this->generateUrl('_website_post', array('postId' => $post->getId(), 'slug' => $post->getSlug())), 301);
    }

    /**     
     * @Route("/{channel}/{slug}/{date}", name="_website_post_by_old_alias", requirements={"date" = "[\d-]+" , "channel" = "arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\[field_channel-term-raw\]"})
     */
    public function getPostPageByOldAlias($channel, $slug, $date) {
        $post = $this->get('social.service.post')->getPostByOldAlias("$channel/$slug/$date");
        return $this->redirect($this->generateUrl('_website_post', array('postId' => $post->getId(), 'slug' => $post->getSlug())), 301);
    } 
    
    /**     
     * @Route("/{slug}/{date}", name="_website_post_by_old_alias1", requirements={"date" = "[\d]{8}"}))
     */
    public function getPostPageByOldAlias1($slug, $date) {
        $post = $this->get('social.service.post')->getPostByOldAlias("$slug/$date");
        return $this->redirect($this->generateUrl('_website_post', array('postId' => $post->getId(), 'slug' => $post->getSlug())), 301);
    }  

    /**     
     * @Route("/{channel}/{slug}", name="_website_post_by_old_alias2", requirements={"channel" = "movie-reviews|arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\[field_channel-term-raw\]"})
     */
    public function getPostPageByOldAlias2($channel, $slug) {
        $post = $this->get('social.service.post')->getPostByOldAlias("$channel/$slug");
        return $this->redirect($this->generateUrl('_website_post', array('postId' => $post->getId(), 'slug' => $post->getSlug())), 301);
    }
    
    /**     
     * @Route("/lgot", name="_website_manual_log_out")
     */
    public function logOut() {
        $this->get('request')->getSession()->invalidate();
        //return $this->redirect($this->generateUrl('_security_logout'));
        return $this->redirect($this->generateUrl('fos_user_security_logout'));
        
    }
    
    /**
     * @Route("/post/up/pic/", name="_post_up_pic")
     */
    public function uploadPicForPost(Request $request) {
        $imageUrl = $request->query->get('u');

        $url = $this->get('social.service.post')->saveWebImageForPost($imageUrl);
        
        $response = new Response($url);
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/tip/stop", name="_website_tip_stop")
     * @Method("GET")
     */
    public function stopTipsPrompt() {
        $this->get('social.service.tips')->closeTipsPrompt();

        return new Response();
    }
    
    /**
     * @Route("/tip/{page}/{currentTipId}", name="_website_tip", defaults={"_format" = "json"}, requirements = {"page" = "home|ology|settings|profile|post|media|edit", "currentTipId" = "\d+"})
     * @Method("GET")
     */
    public function getNextTipId($page, $currentTipId) {
        $tipsManager = $this->get('social.service.tips');

        $nextTipId = $tipsManager->getNextTipId($page, $currentTipId);

        $response = new Response(json_encode(array('tipId' => $nextTipId)));
        
        return $response;
    }
    
    /**
     * @Route("/reologize/popup/{id}", name="_post_reologize_popup", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:reologize-popup.html.twig")
     */
    public function getReOlogizePopup($id) {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $stashes = $this->get('social.service.stash')->getStashesForUser($user->getId());
        $ologies = $this->get('social.service.membership')->getOlogiesForUser($user->getId());
        
        // Alphabetic order
        $this->array['stashes'] = $this->sortObjectByName($stashes);
        $this->array['ologies'] = $this->sortObjectByName($ologies);
        $this->array['postId'] = $id;
        
        return $this->array;
    }
    
    /**
     * @Route("/reologize/popup/success/{postId}", name="_post_reologize_success_popup", requirements = {"postId" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:reologize_success_popup.html.twig")
     */
    public function getReOlogizeSuccessPopup($postId) {
        $this->preExecute(false, false);
        
        $this->array['post'] = $this->get('social.service.post')->getPost($postId);
        
        return $this->array;
    }
    
    /**
     * @Route("/reologize/{postId}/{stashesIds}/{ologiesIds}", name="_post_reologize_ologies_stashes", requirements = {"postId" = "\d+"})
     */
    public function reOlogizeStashesAndOlogies($stashesIds, $ologiesIds, $postId) {
        $user = $this->get('security.context')->getToken()->getUser();
        $this->get('social.service.appmanager')->initApplication();
        
        $ologiesId = explode('-', $ologiesIds);
        foreach ($ologiesId as $ologyId) {
            if ($ologyId == 0)
                continue;
            $ology = $this->get('social.service.ology')->getOlogy($ologyId);
            $this->get('social.service.post')->reOlogize($postId, $ology->getId(), $user->getId());
        }

        $stashesId = explode('-', $stashesIds);
        foreach ($stashesId as $stashId) {
            if ($stashId == 0)
                continue;
            $stash = $this->get('social.service.stash')->getStash($stashId);
            $this->get('social.service.post')->stashIt($postId, $stash->getId(), $user->getId());
        }

        return new Response();
    }

}
