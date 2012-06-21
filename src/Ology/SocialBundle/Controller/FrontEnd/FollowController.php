<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of FollowController
 *
 * @author raphael
 */
class FollowController extends Controller {
    
    /**
     * @Route("/{followeeID}/stashes/", name="_follow_no_stashes")
     * @Route("/{followeeID}/stashes/{stashesIds}", name="_follow_stashes", requirements = {"followeeID" = "\d+"})
     * 
     * When the first route is called, thats means no stashes are selected, so the update will remove any previous followed stash
     */
    public function followStashes($followeeID, $stashesIds = array()) {
        $followService = $this->get('social.service.follow');
        $userId = $this->get('security.context')->getToken()->getUser()->getId();
        
        if (!empty($stashesIds))
            $stashesIds = explode('-', $stashesIds);
        $followService->updateUserFollowingStashes($userId, $followeeID, $stashesIds);
        
        return new Response();
    }
    
    /**
     * @Route("/{followeeID}/ologies/", name="_follow_no_ologies")
     * @Route("/{followeeID}/ologies/{ologiesIds}", name="_follow_ologies", requirements = {"followeeID" = "\d+"})
     * 
     * When the first route is called, thats means no ologies are selected, so the update will remove any previous followed ology
     */
    public function followOlogies($followeeID, $ologiesIds = array()) {
        $followService = $this->get('social.service.follow');
        $userId = $this->get('security.context')->getToken()->getUser()->getId();
        
        if (!empty($ologiesIds))
            $ologiesIds = explode('-', $ologiesIds);
        $followService->updateUserFollowingUserOlogies($userId, $followeeID, $ologiesIds);
        
        return new Response();
    }
    
    /**
     * @Route("/{userId}/followees", name="_followees_page", requirements = {"userId" = "\d+"})
     * @Template("OlogySocialBundle:Follow:followees.html.twig")
     */
    public function getFolloweesPage($userId) {
        $user = $this->get('security.context')->getToken()->getUser();  
        
        $parameters = array();
        $parameters['profileUser'] = $this->get('social.service.user')->getUser($userId);
        $parameters['followees'] = $this->get('social.service.follow')->getUserFollowees($userId);

        // If loggedIn only
        if (gettype($user) != "string") {
            $parameters['followedUsers'] = $this->get('social.service.follow')->getUserFolloweesIds($user->getId());
        }
        
        return $parameters;
    }
    
    /**
     * @Route("/{userId}/followers", name="_followers_page", requirements = {"userId" = "\d+"})
     * @Template("OlogySocialBundle:Follow:followers.html.twig")
     */
    public function getFollowersPage($userId) {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $parameters = array();
        $parameters['profileUser'] = $this->get('social.service.user')->getUser($userId);
        $parameters['followers'] = $this->get('social.service.follow')->getUserFollowers($userId);
        
        // If loggedIn only
        if (gettype($user) != "string") {
            $parameters['followedUsers'] = $this->get('social.service.follow')->getUserFolloweesIds($user->getId());
        }
        
        return $parameters;
    }
}

?>
