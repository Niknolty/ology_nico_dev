<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Forms\Comment\CommentForm;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Forms\User\UserForm;
use Ology\SocialBundle\Forms\User\UserNotificationForm;
use Ology\SocialBundle\Resources\Constants;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ology\SocialBundle\Resources\config\config_path;

class UserPageController extends BaseWebController {
    
    /**
     * @Route("/profile/{id}", name="_website_profile", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:profile.html.twig")
     */
    public function getProfilePage($id) {
        $this->preExecute(true, false);
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('social.service.user')->getUser($id);
        if (!$user->isEnabled())
            throw $this->createNotFoundException('User not available');
        
        if ($user == null)
            return $this->redirect($this->generateUrl('_website_splash'));

        $this->setPageIdInSession(self::PROFILE_PAGE, $id);
        $foundedOlogies = $this->get('social.service.ology')->getByFounder($user->getId(), 3);
        $joinedOlogies = $this->get('social.service.membership')->getOlogiesForUser($user->getId());
        
        for ($j = 0; $j < count($foundedOlogies); $j++) {
            for ($i = 0; $i < count($joinedOlogies); $i++) {
                $foundedOlogy = $foundedOlogies[$j];
                $joinedOlogy = $joinedOlogies[$i];
                if ($foundedOlogy->getId() == $joinedOlogy->getId()) {
                    unset($joinedOlogies[$i]);
                    break;
                }
            }
            $joinedOlogies = array_values($joinedOlogies);
        }
        $subscriptions = $this->get('social.service.subscription')->getChannelsForUser($user->getId());
        
        $joinedOlogies = array_slice($joinedOlogies, 0, $this->nbOlogiesOnProfile);
                    
        $posts = $this->get('social.service.post')->getPostsByUser($user->getId(), 0, $this->nbPostsOnProfile);
        $stats = $this->get('social.service.user')->getStats($id);

        
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            $post->stripTextContent(250);
            $postId = $post->getId();
            
            // Add by Nicolas Le Deaut 05/17/2012
            $comment = new Comment();
            $comment->setPostId($postId);
            $form = $this->createForm(new CommentForm(), $comment);
            $StockCommentForms[$postId] = $form->createView();
            
            if ($post->getTimesCommented() == 1)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 1, 0);
            elseif ($post->getTimesCommented() >= 2)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 2, 0);
            //
        }
        
        // Add by Nicolas Le Deaut 05/17/2012
        $this->array['commentForm'] = $StockCommentForms;
        $this->array['commentPost'] = $comments;
        //
        
        
        if ($this->array['loggedIn'])
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $this->user->getId());
        
        $pres = "";
        if ($user->getTop1() != NULL) {
            $pres .= $user->getFirstName() . " is into " . $user->getTop1();
            if ($user->getTop2() != NULL) {
                if ($user->getTop3() == NULL)
                    $pres .= " and " . $user->getTop2();
                else
                    $pres .= ", " . $user->getTop2() . " and " . $user->getTop3();
            }
            else if ($user->getTop3() != NULL) {
                $pres .= " and " . $user->getTop3();
            }
            $pres .= ".";
        } else if ($user->getTop2() != NULL) {
            $pres .= " is into " . $user->getTop2();
            if ($user->getTop3() != NULL)
                $pres .= " and " . $user->getTop3();
            $pres .= ".";
        }
        else if ($user->getTop3() != NULL) {
            $pres .= " is into " . $user->getTop3() . ".";
        }

        if ($this->array['loggedIn'] && $this->user->getId() == $id) {
            $this->array['isAuthorizedToEdit'] = true;
            $nbStashes = -1;
        }
        else {
            $this->array['isAuthorizedToEdit'] = false;
            $nbStashes = 3;
        }
        // Computing stats
        $totalLikes = $stats->getNbLike() + $stats->getNbHate() + $stats->getNbHmmm();
        $this->array['stats'] = $stats;
        if ($totalLikes > 0) {
            $this->array['percentLoved'] = $stats->getNbLike() * 100 / $totalLikes;
            $this->array['percentHated'] = $stats->getNbHate() * 100 / $totalLikes;
            $this->array['percentHmmmed'] = $stats->getNbHmmm() * 100 / $totalLikes;
        }
        
        if ($this->array['loggedIn'])
            $this->array['isFollowingUser'] = $this->get('social.service.follow')->isUserFollowing($this->user->getId(), $id);
        else
            $this->array['isFollowingUser'] = false;
        
        $this->array['stashes'] = $this->get('social.service.stash')->getRecentStashesForUser($id, $nbStashes, 4);
        $this->array['nbFollowees'] = $this->get('social.service.follow')->getUserNbFollowees($id);
        $this->array['nbFollowers'] = $this->get('social.service.follow')->getUserNbFollowers($id);
        $this->array['bio'] = $pres;
        $this->array['posts'] = $posts;
        $this->array['n'] = $this->nbPostsOnProfile;
        $this->array['profileUser'] = $user;
        $this->array['scroll'] = (count($posts) >= $this->nbPostsOnProfile);
        $this->array['foundedOlogies'] = $foundedOlogies;
        $this->array['joinedOlogies'] = $joinedOlogies;
        $allOlogies = array_unique(array_merge($joinedOlogies, $foundedOlogies));
        shuffle($allOlogies);
        $this->array['allOlogies'] = array_slice($allOlogies, 0, 5);
        $this->array['allOlogiesOther'] = array_slice($allOlogies, 0, 6);
        
        return $this->array;
    }
    
    /**
     * @Route("/profile/{id}/ologies", name="_website_user_ologies")
     * @Template("OlogySocialBundle:Ajax:user_ologies.html.twig")
     */
    public function ajaxGetOlogies($id) {
        $this->preExecute(true, false);
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('social.service.user')->getUser($id);
        
        $foundedOlogies = $this->get('social.service.ology')->getByFounder($user->getId());
        $joinedOlogies = $this->get('social.service.membership')->getOlogiesForUser($user->getId());
        $subscriptions = $this->get('social.service.subscription')->getChannelsForUser($user->getId());
        
        for ($j = 0; $j < count($foundedOlogies); $j++) {
            for ($i = 0; $i < count($joinedOlogies); $i++) {
                $foundedOlogy = $foundedOlogies[$j];
                $joinedOlogy = $joinedOlogies[$i];
                if ($foundedOlogy->getId() == $joinedOlogy->getId()) {
                    unset($joinedOlogies[$i]);
                    break;
                }
            }
            $joinedOlogies = array_values($joinedOlogies);
        }
        
        $this->array['profileUser'] = $user;
        $this->array['foundedOlogies'] = $foundedOlogies;
        $this->array['joinedOlogies'] = $joinedOlogies;
        
        return $this->array;
    }
    
    /**
     * @Route("/profile/{id}/stashes", name="_website_user_stashes")
     * @Template("OlogySocialBundle:Ajax:user_stashes.html.twig")
     */
    public function ajaxGetStashes($id) {
        $this->preExecute(true, false);
        $this->get('social.service.appmanager')->initApplication();
        $user = $this->get('social.service.user')->getUser($id);
        
        $this->array['stashes'] = $this->get('social.service.stash')->getRecentStashesForUser($id, 0, 4);
        $this->array['profileId'] = $id;
        
        return $this->array;
    }
    
    /**
     * @Route("/profile/{id}/posts/{offset}/{n}", name="_website_user_posts_pag", requirements = {"n" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_profile.html.twig")
     */
    public function ajaxGetPostsPaginated($id, $offset, $n) {
        $this->preExecute();
        
        $offset = intval($offset);
        $n = intval($n);
        $id = intval($id);
        
        $isLoving = array();
        $isHating = array();
        $isHmm = array();
        $likesService = $this->get('social.service.likes');
        
        $posts = $this->get('social.service.post')->getPostsByUser($id, $offset, $n);
        $StockCommentForms = array();
        $comments = array();
        foreach ($posts as $post) {
            if ($post->getIsDraft() == 1)
                continue;
            $post->stripTextContent(500);
            $postId = $post->getId(); 
            
            // Add by Nicolas Le Deaut 05/17/2012
            $comment = new Comment();
            $comment->setPostId($postId);
            $form = $this->createForm(new CommentForm(), $comment);
            $StockCommentForms[$postId] = $form->createView();
            
            if ($post->getTimesCommented() == 1)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 1, 0);
            elseif ($post->getTimesCommented() >= 2)
                $comments[$postId] = $this->get('social.service.comment')->getCommentForPost($postId, 2, 0);
            //
            
            
            if ($this->array['loggedIn']){
                $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($posts, $this->user->getId());
            
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
        }
         // Add by Nicolas Le Deaut 05/17/2012
        $this->array['commentForm'] = $StockCommentForms;
        $this->array['commentPost'] = $comments;
        //
        
        $this->array['isLoving'] = $isLoving;
        $this->array['isHating'] = $isHating;
        $this->array['isHmm'] = $isHmm;
        $this->array['posts'] = $posts;
        $this->array['id'] = $id;
        $this->array['scroll'] = (count($posts) > 0);
        $this->array['nextPage'] = $offset + 1;
        $this->array['n'] = $n;

        return $this->array;
    }
    
    /**
     * @Route("/settings", name="_website_settings")
     * @Template("OlogySocialBundle:FrontEnd:settings.html.twig")
     */
    public function getSettingsPage() {
        $this->preExecute(true, false);

        $session = $this->get('session');
 
        $this->array['setting_error'] = $session->get('setting_error');
        $session->set('setting_error', null);

        $this->get('social.service.appmanager')->initApplication();
        if (!$this->array['loggedIn'])
            return $this->redirect($this->generateUrl('_website_splash'));

        $form = $this->createForm(new UserForm(), $this->user);
        $notificationForm = $this->createForm(new UserNotificationForm(), $this->user);

        $this->array['websiteUrl'] = $this->container->getParameter('website_url');
        $this->array['form'] = $form->createView();
        $this->array['notificationForm'] = $notificationForm->createView();

        return $this->array;
    }
    
    /**
     * @Route("/settings/g/update", name="_user_update")
     */
    public function updateSettings(Request $request) {
        $userService = $this->get('social.service.user');

        $securityContext = $this->get('security.context');
        $userauth = $securityContext->getToken()->getUser();
        if ($userauth == "anon.")
            return $this->redirect($this->generateUrl('_website_splash'));
        $userId = $userauth->getId();

        $user = new User();
        $form = $this->createForm(new UserForm(), $user);
        $form->bindRequest($request);

        
        //if (!$form->isValid())
        //   return $this->redirect($this->generateUrl('_website_settings'));
        
        $birthday = $user->getBdayMonth() . "/" . $user->getBdayDay() . "/" . $user->getBdayYear();
        $newUser = $userService->updateUser(
                        $userId,
                        $user->getFirstName(),
                        $user->getLastName(),
                        $user->getEmail(),
                        $user->getChangePassword(),
                        $user->getConfirmChangePassword(),
                        $birthday,
                        $user->getDisplayBday(),
                        $user->getDisplayYear(),
                        $user->getSex(),
                        $user->getLocation(),
                        $user->getOccupation(),
                        $user->getSummary(),
                        $user->getTop1(),
                        $user->getTop2(),
                        $user->getTop3(),
                        $user->getWebsite1(),
                        $user->getWebsite2(),
                        $user->getWebsite3(),
                        $user->getImageFile(),
                        $user->getDoNotEmail(),
                        $user->getEditorTitle(),
                        $user->getEditorTwitterId(),
                        ($user->getMainChannel() != NULL) ? $user->getMainChannel()->getId() : 10
        );

        return $this->redirect($this->generateUrl('_website_profile', array('id' => $userId)));
    }
    
    /**
     * @Route("/settings/n/update", name="_user_update_notification")
     */
    public function updateNotification(Request $request) {
        $userService = $this->get('social.service.user');

        $securityContext = $this->get('security.context');
        $userauth = $securityContext->getToken()->getUser();
        
        if ($userauth == "anon.")
            return $this->redirect($this->generateUrl('_website_splash'));
        $userId = $userauth->getId();

        $user = new User();
        $form = $this->createForm(new UserNotificationForm(), $user);
        $form->bindRequest($request);

        $userService->updateUserNotification(
                        $userId,
                        $user->getAcceptsNotifNewMember(),
                        $user->getAcceptsNotifNewPost(),
                        $user->getAcceptsNotifNewCommentOwnPost(),
                        $user->getAcceptsNotifNewCommentOtherPost(),
                        $user->getAcceptsNotifNewFollower());

        return $this->redirect($this->generateUrl('_website_profile', array('id' => $userId)));
    }
    
    /**
     * @Route("/fblikes/load", name="_website_fb_likes")
     * @Template("OlogySocialBundle:FrontEnd:import_likes.html.twig")
     */
    public function ajaxImportFbData() {
        $this->preExecute(false, false);
        $t = $this->user->getLastGotFbInfo();
        if (!$t || ((time() - $t > (3600 * 24)))) {
            $this->get('social.service.user')->retrieveFbLikes($this->user->getId());
        }
        
        $response = new Response("");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/settings/fbpic", name="_website_fb_pic")
     * @Template("OlogySocialBundle:FrontEnd:import_likes.html.twig")
     */
    public function ajaxImportFbPic() {
        $this->preExecute(false, false);
        $this->get('social.service.user')->retrieveFbPicture($this->user->getId());
        
        $response = new Response($this->user->getImageUrl());
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/onboarding/{step}", name="_website_onboarding", requirements={"step" = "\d+"})
     * 
     * OnBoarding pages are the first one just after user registration.
     * We suggest him some interesting ologies.
     */
    public function onboardingAction(Request $request, $step) {
        $this->preExecute();
        
        if($step == 3){
            $this->get('session')->set("justRegistered", true);
        }

        $this->get('social.service.tips')->initTips();
        
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $membershipService = $this->get('social.service.membership');
        $channelService = $this->get('social.service.channel');
        $ologyService = $this->get('social.service.ology');
        $userService = $this->get('social.service.user');
        
        // Array of statis ology id
        $topOlogies = Constants::getTopOlogiesIdArray();
        
        // We get some interesting ologies to suggest to the user
        //$interestsOlogies = $membershipService->suggestOlogiesUsingInterests($user->getId(), 9);
        $interestsOlogies = $this->get('social.service.cache')->getCachedSuggestedOlogiesByInterest($this->user->getId());
        $topOlogies = $ologyService->getOlogiesById($topOlogies);
        $coreOlogies = $channelService->getCoreOlogies();
        
        $ologies = $interestsOlogies + $topOlogies;
        
        $memberships = array();
        foreach ($ologies as $ology) {
            $oId = $ology->getId();
            if ($membershipService->isMemberOfOlogy($this->user->getId(), $oId)) {
                $memberships[$oId] = true;
            }
        }
        $subscriptions = array();
        foreach ($coreOlogies as $coreOlogy) {
            $oId = $coreOlogy->getId();
            if ($this->get('social.service.subscription')->isSubscribedToChannel($this->user->getId(), $oId)) {
                $subscriptions[$oId] = true;
            }
        }
        
        // Here we merge to different types, it should be strongly checked after
        shuffle($ologies);
        $ologies = array_merge($coreOlogies, $ologies);
        
        // Useful for the upload profile user image
        $userForImage = new User();
        $form = $this->createForm(new UserForm(), $userForImage);
        $form->bindRequest($request);
        
        $userService->updateProfileImage($user->getId(), $userForImage->getImageFile());

        $this->array['memberships'] = $memberships;
        $this->array['subscriptions'] = $subscriptions;
        $this->array['form'] = $form->createView();
        $this->array['user'] = $user;
        $this->array['ologies'] = $ologies;
        $this->array['disabledTopMenu'] = ($step == 2 ? true : false);
        return $this->render('OlogySocialBundle:FrontEnd:onboarding_step'.$step.'.html.twig', $this->array);
    }
    
    // FIXME move to follow controller but WARNING: this will break some links in JS.
    /**
     * @Route("/follow/{userId}/popup", name="_website_follow_user_popup", requirements={"userId" = "\d+"})
     * @Template("OlogySocialBundle:Follow:follow-user-popup.html.twig")
     */
    public function ajaxGetUserFollowPopup($userId) {
        $ologies = $this->get('social.service.membership')->getOlogiesForUser($userId);
        $stashes = $this->get('social.service.stash')->getStashesForUser($userId);
        $loggedUser = $this->get('security.context')->getToken()->getUser();
        
        $parameters = array();
        $parameters['followedOlogies'] = $this->get('social.service.follow')->getUserFolloweeOlogiesIds($loggedUser->getId(), $userId);
        $parameters['followedStashes'] = $this->get('social.service.follow')->getUserFollowingStashesIds($loggedUser->getId());
        $parameters['ologies'] = $this->sortObjectByName($ologies);
        $parameters['stashes'] = $this->sortObjectByName($stashes);
        $parameters['followee'] = $this->get('social.service.user')->getUser($userId);
        
        return $parameters;
    }
    
    /**
     * @Route("/follow/{userId}/tooltip", name="_website_follow_user_tooltip", requirements={"userId" = "\d+"})
     * @Template("OlogySocialBundle:Follow:user_tooltip.html.twig")
     */
    public function ajaxGetUserTooltip($userId) {
        $this->preExecute(false, false);
        $this->array['toolTipUser'] = $this->get('social.service.user')->getUser($userId);

        if ($this->array['loggedIn']) {
            $followService = $this->get('social.service.follow');
            $this->array['isToolTipUserFollowingYou'] = $this->get('social.service.follow')->isUserFollowing($userId, $this->user->getId());
            $this->array['isLoggedUserFollowingToolTipUser'] = $this->get('social.service.follow')->isUserFollowing($this->user->getId(), $userId);
        } else {
            $this->array['isToolTipUserFollowingYou'] = false;
            $this->array['isLoggedUserFollowingToolTipUser'] = false;
        }
        
        return $this->array;
    }
    
    /**
     * @Route("/follow/{userId}/everywhere", name="_website_follow_user_everywhere", requirements={"userId" = "\d+"})
     */
    public function ajaxFollowUserEverywhere($userId) {
        $this->preExecute(false, false);
        
        $this->get('social.service.follow')->followEverything($this->user->getId(), $userId);
        
        $response = new Response("");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/unfollow/{userId}/everywhere", name="_website_unfollow_user_everywhere", requirements={"userId" = "\d+"})
     */
    public function ajaxUnfollowEverything($userId) {
        $this->preExecute(false, false);
        
        $this->get('social.service.follow')->unfollowEverything($this->user->getId(), $userId);
        
        $response = new Response("");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
}
?>
