<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Likes;
use Ology\SocialBundle\Exceptions\AccessDeniedException;
use Ology\SocialBundle\Forms\User\UserForm;
use Ology\SocialBundle\Forms\User\UserNotificationForm;
use Ology\SocialBundle\Forms\User\MergedUserForm;
use Ology\UserBundle\Form\Type\RegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Ology\SocialBundle\Security\MessageDigestPasswordEncoder;
use Ology\SocialBundle\Forms\Registration\FacebookRegistrationForm;
use Ology\SocialBundle\Forms\Registration\TwitterRegistrationForm;
use Ology\SocialBundle\Forms\Registration\FacebookMergeForm;
use Ology\SocialBundle\Forms\Registration\TwitterMergeForm;
use FOS\TwitterBundle\Security\Authentication\Token\TwitterUserToken;
use FOS\FacebookBundle\Security\Authentication\Token\FacebookUserToken;
use Ology\SocialBundle\Resources\config\config_path;

use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Forms\Post\OlogizePostForm;
use Symfony\Component\Security\Core\SecurityContext;

class RegistrationController extends BaseWebController {

    
    
    /**
     * @Route("/registerRedir", name="_website_register_redir")
     */
    public function getRegister() {
        $this->preExecute(false, false);
        $session = $this->get('session');
        $session->set('inRegistration', true);

        // Handle invite
        $inviteId = $this->get('session')->get(self::INVITE_ID);
        if ($inviteId != NULL) {
            $invite = $this->get('social.service.invite')->getInvite($inviteId);
            $this->get('social.service.invite')->acceptInvite($inviteId);

            // erwan's way of handling data ;) 
            // TODO MOVE ALL OF THIS TO THE DAO
            $this->user->setInviter($invite->getFromUser());
        }
         
        if ($this->user->getImageUrl() == config_path::USER_IMG_DEFAULT){
           $this->get('social.service.user')->updateRandomImage($this->user->getId());
        }
        
        // Join ology
        $ologyId = $this->get('session')->get(self::OLOGY_FOLLOW_ID);
        if ($ologyId) {
            $this->get('social.service.appmanager')->initApplication();
            $ologies = $this->get('social.service.membership')->joinOlogy($this->user->getId(), $ologyId);
        }

        $this->get('social.service.mail')->sendWelcomeEmail($this->user);
        $this->get('social.service.user')->retrieveFbLikes($this->user->getId());

        $this->checkForPostCommentFollowInSession();

        if ($this->user->getShowStartedBar()) {
            return $this->redirectToPageIdInSession();
        }
        else
            return $this->redirect($this->generateUrl('_website_onboarding', array('step' => 2)));
    }

    /**
     * @Route("/register", name="_website_register")
     * @Route("/register/general/{inviteId}/", name="_website_register_invite_general", requirements={"inviteId" = "\d+"})
     * @Route("/register/{inviteId}/{ologyId}/", name="_website_register_invite", requirements={"inviteId" = "\d+"})
     * @Route("/register/follow/{ologyId}/", name="_website_register_join", requirements={"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:register.html.twig")
     */
    public function getregisterForm($inviteId = null, $ologyId = null) {
        $this->preExecute(false, false);

        if ($this->array['loggedIn'])
            return $this->redirect($this->generateUrl('_website_home'));

        if ($inviteId && $inviteId != 0) {
            $this->get('session')->set(self::INVITE_ID, $inviteId);
        }
        if ($ologyId)
            $this->get('session')->set(self::OLOGY_FOLLOW_ID, $ologyId);

        // This is useful to know if its a quick user registration or classic join page.
        // Used to redirect to the onboarding pages or get started nav bar.
        $this->get('session')->set("classicRegistration", 1);
        
        $form = $this->container->get('fos_user.registration.form');
        $fb_info = $this->get_facebook_info();
        $this->array['fb_user'] = $fb_info['user'];
        $this->array['form'] = $form->createView();
        //$this->array['flash'] = $this->container->get('session')->getFlash($action, $value);
        return $this->array;
    }

    /**
     * @Route("/reset", name="_website_reset")
     */
    public function getResetForm() {
        $this->preExecute(false, false);

        return $this->container->get('templating')->renderResponse('OlogyUserBundle:Resetting:request.html.twig', $this->array);
//$this->array['flash'] = $this->container->get('session')->getFlash($action, $value);
    }

    /**
     * @Route("/facebook/check", name="_website_facebook_check")
     */
    public function facebookCheck() {
        // check_path for facebook (must be empty because autocatched by a listerner in facebook bundle))
    }

    /**
     * @Route("/facebook/redirect", name="_website_facebook_redirect")
     */
    public function facebookRedirect() {
        $this->preExecute(false, false);

        $user = $this->get('security.context')->getToken()->getUser();

        $email = $user->getEmail();
        $emailArray = explode('@', $email, 2);
        $destinary = $emailArray[1];

        if (!empty($destinary) && $destinary == 'facebookToCheck.com'){
            // The user is yet connected, but the email field is empty,
            // so we logout him, redirect him to the splash page but with the openFacebookPopup parameter
            // which is used in the splash template to popup a form email window.
            //The Facebook ID will be used to reconnect him after he entered his email, by Facebook OAuth secure of course..
            $userFacebookId = $user->getFbID();

            $this->get('security.context')->setToken(null);
            $this->get('session')->invalidate();
            $this->get('session')->start();
            $this->get('session')->set('userFacebookId', $userFacebookId);
            $this->get('session')->save();
            return $this->redirect($this->generateUrl('_website_splash', array('openFacebookPopup' => true) ));
        }

        $this->checkForPostCommentFollowInSession();
        
        // Usual login
        if (\time() - $this->array['user']->getCreationDate() > 60) {
            if ($this->get('session')->get(self::PAGE_ID) != NULL)
                return $this->redirectToPageIdInSession();
            else
                return $this->redirect($this->generateUrl('_website_home'));
        }
        // Registration
        return $this->redirect($this->generateUrl('_website_register_redir'));
    }

    /**
     * @Route("/facebook/merge", name="_website_merge_facebook")
     * @Template("OlogySocialBundle:FrontEnd:merge_facebook.html.twig")
     */
    public function facebookMerge(Request $request) {
        $formUser = new User();
        $form = $this->createForm(new FacebookMergeForm(), $formUser);
        if ($request->getMethod() == 'POST')                        // bind the form
            $form->bindRequest($request);
        else {                                                      // create the view and displays it
            $this->array['mergeform'] = $form->createView();
            return $this->array;
        }

        $currentUserId = $this->get('session')->get('currentUserId');
        $userFacebookId = $this->get('session')->get('userFacebookId');

        $userService = $this->get('social.service.user');
        $currentUser = $userService->getUser($currentUserId);

        $encoder = new MessageDigestPasswordEncoder('sha512', false, 1);
        if (!$encoder->isPasswordValid($currentUser->getPassword(), $formUser->getPlainPassword(), $currentUser->getSalt()))
            $this->array['error'] = "The password is wrong for this account.";

        // Display error if any
        if ($this->array['error']) {
            $form = $this->createForm(new MergedUserForm(), $formUser);
            $this->array['mergeform'] = $form->createView();
            return $this->array;
        }

        // No error
        // Update currentUser with facebook id / infos and unable facebook account user
        $facebookProvider = $this->get('my.facebook.user');
        $facebookUser = $facebookProvider->loadUserByUsername($userFacebookId);

        $userService->updateUserByArray($currentUserId, array(User::FB_ID => $userFacebookId));
        $userService->deleteUser($facebookUser->getId());
        // Flush, this is MANDATORY or it will bug...
        $em = $this->getDoctrine()->getEntityManager();
        $em->flush();

        // create the new authentication token
        $token = new FacebookUserToken($currentUser, $currentUser->getRoles());
        // give it to the security context
        $this->container->get('security.context')->setToken($token);

        return $this->redirect($this->generateUrl('_website_home'));
    }

    /**
     * @Route("/facebook/register", name="_website_facebook_register")
     *
     * As it's impossible to get user email by Twitter API, we ask him now!
     *
     */
    public function facebookRegisterEmail(Request $request) {
        $facebookRegisterForm = $this->createForm(new FacebookRegistrationForm());

        if ($request->getMethod() == 'POST') {
            $facebookRegisterForm->bindRequest($request);

            if ($facebookRegisterForm->isValid()) {
                $userService = $this->get('social.service.user');
                $data = $facebookRegisterForm->getData();
                $email = $data['email'];

                //Check if the given email already exists in the database
                $userAlreadyExists = $userService->getUserByEmailWithoutException($email);

                if (!empty($userAlreadyExists)) {
                    $this->get('session')->set('currentUserId', $userAlreadyExists->getId());
                    $this->get('session')->save();

                    return $this->redirect($this->generateUrl('_website_merge_facebook'));
                }

                // If this email doesn't exists, we get the user by his facebook id, updates his email then connect him
                $facebookProvider = $this->get('my.facebook.user');

                $userFacebookId = $this->get('session')->get('userFacebookId');
                $user = $facebookProvider->findUserByFbId($userFacebookId);

                $userService->updateUserByArray($user->getId(), array(User::EMAIL => $email));
                // Flush, this is MANDATORY or it will bug...
                $em = $this->getDoctrine()->getEntityManager();
                $em->flush();
                // create the new authentication token
                $token = new FacebookUserToken($user, $user->getRoles());
                // give it to the security context
                $this->container->get('security.context')->setToken($token);

                //return $this->redirect($this->generateUrl('_website_facebook_redirect'));
                return $this->redirect($this->generateUrl('_website_register_redir'));
            }

        }
        $this->array['facebookRegisterForm'] = $facebookRegisterForm->createView();
        return $this->render('OlogySocialBundle:FrontEnd:facebook_register.html.twig', $this->array);
    }
    
    /**
     * @Route("/login/redirect", name="_website_login_redirect")
     */
    public function regularLoginRedirect() {
        $this->preExecute(false, false);
        
        $this->checkForPostCommentFollowInSession();
        
        if ($this->get('session')->get(self::PAGE_ID) != NULL)
            return $this->redirectToPageIdInSession();
        else
            return $this->redirect($this->generateUrl('_website_home'));
    }
    
    /**
     * @Route("/twitter/redirect", name="_website_twitter_redirect")
     * 
     * As it's impossible to get user email by Twitter API,
     * we will logout him and then redirect to the final step of the registration.
     * 
     * Else, for regular login using twitter, we skip this and do a regular login.
     * 
     */
    public function twitterRedirect() {
        $user = $this->get('security.context')->getToken()->getUser();  
        $email = $user->getEmail();
        $emailArray = explode('@', $email, 2);
        $destinary = $emailArray[1];
        
        if (!empty($destinary) && $destinary == 'twitterToCheck.com')
        {
            // The user is yet connected, but the email field is empty,
            // so we logout him, redirect him to the splash page but with the openTwitterPopup parameter
            // which is used in the splash template to popup a form email window.
            //The Twitter ID will be used to reconnect him after he entered his email, by Twitter OAuth secure of course...
            $userTwitterId = $user->getTwitterID();
            
            $this->get('security.context')->setToken(null);
            $this->get('session')->invalidate();
            $this->get('session')->start();
            $this->get('session')->set('userTwitterId', $userTwitterId);
            $this->get('session')->save();
                     
            return $this->redirect($this->generateUrl('_website_splash', array('openTwitterPopup' => true) ));
        }
        else
            return $this->regularLoginRedirect();
    }

    /**
     * @Route("/twitter/merge", name="_website_merge_twitter")
     * @Template("OlogySocialBundle:FrontEnd:merge_twitter.html.twig")
     */
    public function twitterMerge(Request $request) {
        $formUser = new User();
        $form = $this->createForm(new TwitterMergeForm(), $formUser);
        if ($request->getMethod() == 'POST')                        // bind the form
            $form->bindRequest($request);
        else {                                                      // create the view and displays it
            $this->array['mergeform'] = $form->createView();
            return $this->array;
        }

        $currentUserId = $this->get('session')->get('currentUserId');
        $userTwitterId = $this->get('session')->get('userTwitterId');

        $userService = $this->get('social.service.user');
        $currentUser = $userService->getUser($currentUserId);

        $encoder = new MessageDigestPasswordEncoder('sha512', false, 1);
        if (!$encoder->isPasswordValid($currentUser->getPassword(), $formUser->getPlainPassword(), $currentUser->getSalt()))
            $this->array['error'] = "The password is wrong for this account.";

        // Display error if any
        if ($this->array['error']) {
            $form = $this->createForm(new MergedUserForm(), $formUser);
            $this->array['mergeform'] = $form->createView();
            return $this->array;
        }

        // No error
        // Update currentUser with twitter id / infos and unable twitter account user
        $twitterProvider = $this->get('my.twitter.user');
        $twitterUser = $twitterProvider->loadUserByUsername($userTwitterId);

        $userService->updateUserByArray($currentUserId, array(User::TWITTER_ID => $userTwitterId,
                                                              User::TWITTER_USERNAME => $twitterUser->getTwitterUsername()));
        $userService->deleteUser($twitterUser->getId());
        // Flush, this is MANDATORY or it will bug...
        $em = $this->getDoctrine()->getEntityManager();
        $em->flush();

        // create the new authentication token
        $token = new TwitterUserToken($currentUser, $currentUser->getRoles());
        // give it to the security context
        $this->container->get('security.context')->setToken($token);

        return $this->redirect($this->generateUrl('_website_home'));
    }

    /**
     * @Route("/twitter/register", name="_website_twitter_register")
     *
     * As it's impossible to get user email by Twitter API, we ask him now!
     *
     */
    public function twitterRegisterEmail(Request $request) {
        $twitterRegisterForm = $this->createForm(new TwitterRegistrationForm());

        if ($request->getMethod() == 'POST') {
            $twitterRegisterForm->bindRequest($request);

            if ($twitterRegisterForm->isValid()) {
                $userService = $this->get('social.service.user');
                $data = $twitterRegisterForm->getData();
                $email = $data['email'];

                //Check if the given email already exists in the database
                $userAlreadyExists = $userService->getUserByEmailWithoutException($email);

                if (!empty($userAlreadyExists)) {
                    $this->get('session')->set('currentUserId', $userAlreadyExists->getId());
                    $this->get('session')->save();

                    return $this->redirect($this->generateUrl('_website_merge_twitter'));
                }

                // If this email doesn't exists, we get the user by his twitter id, updates his email then connect him
                $twitterProvider = $this->get('my.twitter.user');

                $userTwitterId = $this->get('session')->get('userTwitterId');
                $user = $twitterProvider->findUserByTwitterId($userTwitterId);

                $userService->updateUserByArray($user->getId(), array(User::EMAIL => $email));
                // Flush, this is MANDATORY or it will bug...
                $em = $this->getDoctrine()->getEntityManager();
                $em->flush();
                // create the new authentication token
                $token = new TwitterUserToken($user, $user->getRoles());
                // give it to the security context
                $this->container->get('security.context')->setToken($token);

                return $this->redirect($this->generateUrl('_website_register_redir'));
            }

        }
        $this->array['twitterRegisterForm'] = $twitterRegisterForm->createView();
        return $this->render('OlogySocialBundle:FrontEnd:twitter_register.html.twig', $this->array);
    }

   /** 
    * @Route("/twitter/login", name="_website_twitter_check")
    * DO NOT call this route /twitter/check because it refers to an other route
    * 
    * To well understand the multiple requests, see https://dev.twitter.com/docs/auth/implementing-sign-twitter
    * 
    */
    public function twitterLoginAction() {
        $request = $this->get('request');
        $twitter = $this->get('fos_twitter.service');
        
        $authURL = $twitter->getLoginUrl($request);

        $ologize_src  = $request->query->get('s');
        $ologize_link = $request->query->get('l');
        if($ologize_src && $ologize_link){
            $this->get('session')->set('ologize_login_by','twitter');
            $this->get('session')->set('ologize_src',$ologize_src);
            $this->get('session')->set('ologize_link',$ologize_link);
            $this->get('session')->set('ologize_title',$request->query->get('t'));
            $this->get('session')->set('ologize_description',$request->query->get('d'));
        }
        $response = new RedirectResponse($authURL);
        
        return $response;
    }
    
    /**
     * @Route("/ologize_post", name="_ologize_post")     
     */
    public function ologizePost() {
        $this->preExecute(false, false);
        
        //get URL params
        $request = Request::createFromGlobals();
        $link       = $request->query->get('l');
        $title      = $request->query->get('t');
        $description = $request->query->get('d');
        $src        = $request->query->get('s');
        $ex         = $request->query->get('ex');
        
        if ($this->array['loggedIn']){
            if(strpos($src,'//') === 0){
                $src = 'http:'.$src;
            }
            if(strpos($src,'/') === 0){
                $site_url = parse_url($link);
                $src = 'http://'.$site_url['host'].$src;
            }
            if(strpos($src,'http://') === false){
                $site_url = parse_url($link);
                if ( isset($site_url['path']) && strrpos($site_url['path'],'/') !== false){
                    $site_url['host'] .= substr($site_url['path'], 0, strrpos($site_url['path'],'/') +1 );
                }
                $src = 'http://' . $site_url['host']  . $src;
            }
            // create post
            $post = new Post();
            if($title)
                $post->setTitle(strip_tags(html_entity_decode($title)));
            else
                $post->setTitle("Post Title");
            if($description)
                $post->setTextContent(strip_tags(html_entity_decode($description)));
            else
                $post->setTextContent("Add your thoughts...");
            $post->setImageUrl($src);
            $post->setImageSourceUrl($link);
            $post->setPostTypeId(PostType::IMAGE);
            //create form
            $form = $this->createForm(new OlogizePostForm($this->user), $post); 
            // fill array for template
            $this->array['postForm'] = $form->createView();
            $this->array['src'] = $src;
            // create response
            $response = $this->render('OlogySocialBundle:FrontEnd:ologize_create_post.html.twig', $this->array);
            $response->headers->set('Content-Type', 'text/html');
        } else {
            // fill array for template
            $this->array['link'] = $link;
            $this->array['src'] = $src;
            $this->array['title'] = $title;
            $this->array['description'] = $description;
            $this->array['link_dec'] = urlencode(urldecode($link));
            $this->array['src_dec'] = urlencode(urldecode($src));
            $this->array['title_dec'] = urlencode(urldecode($title));
            $this->array['description_dec'] = urlencode(urldecode($description));

            if ($ex == '1'){
                $this->array['login_error'] = 'Bad credentials. Please, try again.';
            }
            else{
                $this->array['login_error'] = '';
            }
            // create response
            $response = $this->render('OlogySocialBundle:FrontEnd:ologize_login.html.twig', $this->array );
            $response->headers->set('Content-Type', 'text/html');
        }
        return $response;
    }
    
    private function checkForPostCommentFollowInSession() {
        $offline_comment = $this->get('session')->get('offline_comment');
        $offline_follow = $this->get('session')->get('offline_follow');
        $offline_channel = $this->get('session')->get('offline_follow_channel');
        $fake_user = $this->get('session')->get('fake_user');
        $offline_like = $this->get('session')->get('offline_like');
        $offline_post = $this->get('session')->get('offline_postId');
        
        
        if (!empty($offline_comment)){
            $this->storeCommentInSession();
        }
        else if (!empty($offline_follow)){
            $this->storeFollowingInSession();
        }
        else if (!empty($offline_channel)){
            $this->storeSubscriptionsInSession();
        }
        else if (!empty($offline_post)){
            $this->storePostInSession();
        }
        else if (!empty($offline_like)){
            $this->storeLikeHateHmmInSession();
        }
    }
    
    private function storeCommentInSession() {
        $this->get('social.service.appmanager')->initApplication();
        $session = $this->getRequest()->getSession();
               
        $postId = $session->get('offline_comment_post_id');
 
        $post = $this->get('social.service.post')->getPost($postId);
        $content = $session->get('offline_comment');
        
        //echo $content->getContent();
        //exit;
        $commentService = $this->get('social.service.comment');
        $comment = $commentService->createComment($this->user->getId(), $postId, $content, null);
        
        $session->remove('offline_comment');
        $session->remove('offline_comment_post_id');
     }
    
    private function storeFollowingInSession() {
        $session = $this->getRequest()->getSession();
        $this->get('social.service.appmanager')->initApplication();
     
        $offline_ology_id = $this->get('session')->get('offline_ology_id');
        
        $this->get('social.service.membership')->joinOlogy($this->user->getId(), $offline_ology_id);
        $session->remove('offline_follow');
        $session->remove('offline_ology_id');
    }
    
    private function storeSubscriptionsInSession() {
        $session = $this->getRequest()->getSession();
        $this->get('social.service.appmanager')->initApplication();
     
        $offline_channel_id = $this->get('session')->get('offline_channel_id');
        
        $subscriptionService = $this->get('social.service.subscription');
        $user = $this->get('security.context')->getToken()->getUser();
        
        $subscriptionService->subscribeChannel($user->getId(), $offline_channel_id);
        
        $session->remove('offline_follow_channel');
        $session->remove('offline_channel_id');
    }
    
    private function storePostInSession() {
        $session = $this->getRequest()->getSession();
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('security.context')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getEntityManager();
        $offline_postId = $session->get('offline_postId');
        $postService = $this->get('social.service.post');
        $notificationService = $this->get('social.service.notification');
        $post = $postService->getPost($offline_postId);
        $post->setAuthor($user);
        $post->setIsDraft(0);
        $ology_id = $session->get('ology_id');
        $notificationService->deleteNotificationsForPost($offline_postId);
        $notificationService->notifNewPostInOlogy($ology_id, $user->getId(), $offline_postId);
        $em->persist($post);
        $em->flush();
        $session->remove('fake_user');
        $session->remove('offline_user_id');
        $session->remove('ology_id');
        $session->remove('offline_postId');
    }
    
    private function storeLikeHateHmmInSession() {
        $session = $this->getRequest()->getSession();
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('security.context')->getToken()->getUser();
        $userId = $user->getId();
        $likesService = $this->get('social.service.likes');
        $like = $session->get('offline_like');
        $likeType = $like->getLikeType();
        $likePostId = $like->getPostId();
        if ($likeType == "love"){
            $likesService->createLikes($userId, $likePostId, "love");           
        }
        elseif ($likeType == "hate"){
            $likesService->createLikes($userId, $likePostId, "hate");
        }
        elseif ($likeType == "hmm"){
            $likesService->createLikes($userId, $likePostId, "hmm");
        }
        $session->remove('offline_like');   
    }
}
?>
