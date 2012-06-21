<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\Comment;
use Ology\SocialBundle\Forms\Comment\CommentForm;
use Ology\SocialBundle\Forms\Search\Search;
use Ology\SocialBundle\Forms\Search\SearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContext;
use Ology\SocialBundle\facebook\src\facebook;

class BaseWebController extends Controller {
    const INVITE_ID = "inviteId";
    const OLOGY_FOLLOW_ID = "ologyFollowId";
    const PAGE_ID = "ology-page-id";
    const PAGE_PAR = "ology-page-par";
    const OLOGY_PAGE = "ology";
    const CHANNEL_PAGE = "channel";
    const SPLASH_PAGE = "splash";
    const POST_PAGE = "post";
    const EXPLORE_PAGE = "explore";
    const PROFILE_PAGE = "profile";
    const STASH_PAGE = "stash";
    
    protected $user;
    protected $array;
    protected $nbOlogies = 20;
    protected $nbOlogiesOnProfile = 3;
    protected $nbMembers = 15;
    protected $nbPosts = 8;
    protected $nbPostsHomePage = 32;
    protected $nbPostsStashPage = 32;
    protected $nbPostsSplash = 20;
    protected $nbPostsOnProfile = 10;
    protected $nbPostsOnExplore = 15;
    protected $nbNotifs = 20;
    protected $fbAppId_prod = '219705434724093';
    protected $fbAppSecret_prod = 'd46b6e5a887aa7a03bd4163555b563f7';
    protected $fbAppId_dev = '206808546037748';
    protected $fbAppSecret_dev = 'c1c45c8a8132be3ef850e65a2dc02e7f';
    protected $fbAppId_ology4 = '227147837348982';
    protected $fbAppSecret_ology4 = '16829129e525a56307489c8430189df0';

    // TODO some comments would be helpful here... REALLY !!!
    protected function preExecute($userOlogies = false, $notifications = false, $resetArray = true) {
        if ($resetArray)
            $this->array = array();

        $this->array['websiteUrl'] = $this->container->getParameter('website_url');
        
        // No index on dev/qa/etc
        if ($this->container->getParameter('website_url') != 'http://www.ology.com')
            $this->array['noIndex'] = true;
        
        // Search
        $search = new Search();
        $search->setType('post');
        $searchForm = $this->createForm(new SearchForm(), $search);
        $this->array['searchForm'] = $searchForm->createView();
        
        // User
        $this->user = $this->get('security.context')->getToken()->getUser();        
        if (gettype($this->user) != "string") {
            $this->array['loggedIn'] = true;
            $this->array['user'] = $this->user;
            if ($userOlogies) {
                $v = $this->get('social.service.membership')->isMembershipsInvalid($this->user->getId());
                $valid = $this->get('social.service.subscription')->isSubscriptionsInvalid($this->user->getId());
                $sessionUserOlogies = $this->get('session')->get('userOlogies');
                if ($v != NULL || $valid != NULL || $sessionUserOlogies == NULL) {
                    $memberships = $this->get('social.service.membership')->getOlogiesInfosForUser($this->user->getId(), $this->nbOlogies);
                    $subscriptions = $this->get('social.service.subscription')->getChannelsInfosForUser($this->user->getId(), $this->nbOlogies - sizeof($memberships));
                    $memberships = array_merge($subscriptions, $memberships);
                    
                    // This sort 2 different object type (ology and channel) by creation date
                    usort($memberships, function ($a, $b) {
                        return ($a['creationDate'] > $b['creationDate']) ? -1 : 1;
                    });
                    
                    $this->array['userOlogies'] = $memberships;
                    $this->get('session')->set('userOlogies', $this->array['userOlogies']);
                } else {
                    $this->array['userOlogies'] = $sessionUserOlogies;
                }
                $this->get('social.service.membership')->setIsMembershipInvalid($this->user->getId(), false);
                $this->get('social.service.subscription')->setIsSubscriptionsInvalid($this->user->getId(), false);

            }
            if ($notifications) {
                $this->array['notifications'] = $this->get('social.service.notification')->getNotificationsForUser($this->user->getId(), $this->nbNotifs);
                $this->get('social.service.notification')->setIsNotifInvalid($this->user->getId(), false);
            }
        } else {
            $this->array['loggedIn'] = false;
            $this->array['user'] = NULL;
            $this->array['userOlogies'] = NULL;
            $this->array['notifications'] = NULL;
            
            $form = $this->container->get('fos_user.registration.form');
            $this->array['almostForm'] = $form->createView();
        }
        
        // get the login error if there is one
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $this->array['login_error'] = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $this->array['login_error'] = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        // reset the error message
        $this->get('request')->getSession()->set(SecurityContext::AUTHENTICATION_ERROR, '');
        // last username entered by the user
        $this->array['last_username'] = $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME);

        // initiate facebook ID for the javascript
        //$this->getFacebookCreds();
    }
    
    protected function setPageIdInSession($pageId, $params) {
        $this->get('session')->set(self::PAGE_ID, $pageId);
        $this->get('session')->set(self::PAGE_PAR, $params);
    }
    
    /**
     * @Route("/lastPage", name="_website_last_page")
     */
    public function redirectToPageIdInSession() {
        switch ($this->get('session')->get(self::PAGE_ID)) {
            case self::SPLASH_PAGE:
                return $this->redirect($this->generateUrl('_website_home'));
            case self::OLOGY_PAGE:
                return $this->redirect($this->generateUrl('_website_ology', array('id' => $this->get('session')->get(self::PAGE_PAR))));
            case self::POST_PAGE:
                return $this->redirect($this->generateUrl('_website_post', array( 'postId' => $this->get('session')->get(self::PAGE_PAR))));
            case self::EXPLORE_PAGE:
                return $this->redirect($this->generateUrl('_website_explore'));
            case self::PROFILE_PAGE:
                return $this->redirect($this->generateUrl('_website_profile', array('id' => $this->get('session')->get(self::PAGE_PAR))));
            case self::CHANNEL_PAGE:
                return $this->redirect($this->generateUrl('_website_channel', array('stub' => $this->get('session')->get(self::PAGE_PAR))));
            case self::STASH_PAGE:
                return $this->redirect($this->generateUrl('_website_stash', array('id' => $this->get('session')->get(self::PAGE_PAR))));
            default:
                return $this->redirect($this->generateUrl('_website_home'));
        }
    }

    protected function get_facebook_info() {
        $fb_secret = $this->getFacebookCreds();
        $facebook = new Facebook(array(
                    'appId' => $this->array['fb_app_id'],
                    'secret' => $fb_secret,
                ));

        $userId = $facebook->getUser();
        $accessToken = $facebook->getAccessToken();

        if ($userId) {
            $userInfo = $facebook->api('/' + $userId);
            $array = array("user" => $userInfo, "access_token" => $accessToken);
            return $array;
        }
        return null;
    }

    protected function getFacebookCreds() {
        if (strpos($_SERVER['HTTP_HOST'], 'ology4.com') !== false) {
            $this->array['fb_app_id'] = $this->fbAppId_ology4;
            $fb_secret = $this->fbAppSecret_ology4;
        } else if (strpos($_SERVER['HTTP_HOST'], 'qa4.ology.com') !== false) {
            $this->array['fb_app_id'] = $this->fbAppId_dev;
            $fb_secret = $this->fbAppSecret_dev;
        } else {
            $this->array['fb_app_id'] = $this->fbAppId_prod;
            $fb_secret = $this->fbAppSecret_prod;
        }
        return $fb_secret;
    }
    
    protected function sortObjectByName(array $objectArray) {
        usort($objectArray, function ($a, $b) {
            return (strcasecmp($a->getName(), $b->getName()));
        });
        
        return $objectArray;
    }

}
?>
