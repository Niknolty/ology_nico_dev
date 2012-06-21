<?php

namespace Ology\SocialBundle\Controller\Stats;

use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Forms\Stat\OlogyForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StatsController extends Controller {
    /**
     * @Route("/", name="_stats_general")
     * @Template("OlogySocialBundle:Stats:stats.html.twig")
     */
    public function getGeneralPage() {
        $svc = $this->get('social.service.stats');
        
        $generalStats = $svc->getGeneralStats();
        return array('generalStats' => $generalStats);
    }
    
    /**
     * @Route("/inv", name="_stats_invites")
     * @Template("OlogySocialBundle:Stats:invite.html.twig")
     */
    public function getInvitePage(Request $request) {
        $svc = $this->get('social.service.stats');
        
        if ($request->getMethod() == 'POST') {
            
        } else {
            $stats = $svc->getAllInviteStats();
            $total = $stats['total'];
            $perUser = $stats['perUser'];
            
            return array('total' => $total, 'perUser' => $perUser);
        }
        
        return array();
    }
    
    /**
     * @Route("/posts", name="_stats_posts")
     * @Template("OlogySocialBundle:Stats:post.html.twig")
     */
    public function getPostsPage(Request $request) {
        $svc = $this->get('social.service.stats');
        $generalStats = $svc->getPostsStats();
        ksort($generalStats['labels']);
        
        $lazyDummypost = new Post();
        $form = $this->createForm(new OlogyForm(), $lazyDummypost);
        
        if ($request->getMethod() == 'POST') {
            $f = $request->request->get('ologyForm');
            $ologyId = $f['firstOlogy'];
            $stats = $svc->getPostsStatsForOlogy($ologyId);
            return array('ologyStats' => $stats, 'stats' => $generalStats);
        } else {
            return array('stats' => $generalStats, 'form' => $form->createView());
        }
    }
    
    /**
     * @Route("/comments", name="_stats_comments")
     * @Template("OlogySocialBundle:Stats:comments.html.twig")
     */
    public function getCommentsPage(Request $request) {
        $lazyDummypost = new Post();
        $form = $this->createForm(new OlogyForm(), $lazyDummypost);
        
        $svc = $this->get('social.service.stats');
        $generalStats = $svc->getCommentsStats();
        
        if ($request->getMethod() == 'POST') {
            $f = $request->request->get('ologyForm');
            $ologyId = $f['firstOlogy'];
            $avg = $svc->getAverageCommentsNbForOlogy($ologyId);
            return array('ologyStats' => $avg, 'stats' => $generalStats);
        } else {
            return array('stats' => $generalStats, 'form' => $form->createView());
        }   
    }
    
    /**
     * @Route("/notifs", name="_stats_notifs")
     * @Template("OlogySocialBundle:Stats:notifs.html.twig")
     */
    public function getNotifsPage() {
        $svc = $this->get('social.service.stats');
        $stats = $svc->getNotifsStats();
        
        return array('stats' => $stats);
    }
    
    /**
     * @Route("/ologies", name="_stats_ologies")
     * @Template("OlogySocialBundle:Stats:ologies.html.twig")
     */
    public function getOlogiesPage() {
        $svc = $this->get('social.service.stats');
        $ologiesStats = $svc->getOlogiesStats(32, true);
        
        return array('ologiesStats' => $ologiesStats);
    }
    
    /**
     * @Route("/users", name="_stats_users")
     * @Template("OlogySocialBundle:Stats:users.html.twig")
     */
    public function getUsersPage() {
        $svc = $this->get('social.service.stats');
        $stats = $svc->getUsersStats(15);
        
        return array('stats' => $stats);
    }
    
    /**
     * @Route("/users/all", name="_stats_all_users")
     * @Template("OlogySocialBundle:Stats:users_all.html.twig")
     */
    public function getAllUsersPage() {
        $svc = $this->get('social.service.stats');
        $stats = $svc->getAllUsersStats(300);
        
        return array('stats' => $stats);
    }
    
    /**
     * @Route("/labels", name="_stats_labels")
     * @Template("OlogySocialBundle:Stats:labels.html.twig")
     */
    public function getLabelsPage() {
        $svc = $this->get('social.service.stats');
        $stats = $svc->getLabelsStats();
        arsort($stats);
        return array('stats' => $stats);
    }
    
    /**
     * @Route("/follow", name="_stats_follow")
     * @Template("OlogySocialBundle:Stats:follow.html.twig")
     */
    public function getFollowPage() {
//        $stats = array();
//        $svc = $this->get('social.service.stats');
//        $usersIds = $this->get('social.service.user')->getUsersIds();
        
//        $stats['topFollowers'] = $svc->getTopUsersFollowers($usersIds);
//        $stats['topStashes'] = $svc->getTopStashesIds();
//        $stats['totalFollowees'] = $svc->getNbTotalFollowees($usersIds);
//        $stats['totalFollowers'] = $svc->getNbTotalFollowers($usersIds);
        return array();
    }
    
    /**
     * @Route("/follow/followees", name="_stats_followees")
     * @Template("OlogySocialBundle:Stats:followees.html.twig")
     */
    public function getTopUsersFollowees() {
        $stats = array();
        $svc = $this->get('social.service.stats');
        $usersIds = $this->get('social.service.user')->getUsersIds();
        $stats['topFollowees'] = $svc->getTopUsersFollowees($usersIds);
        return array('stats' => $stats);
    }
    
    /**
     * @Route("/follow/followers", name="_stats_followers")
     * @Template("OlogySocialBundle:Stats:followers.html.twig")
     */
    public function getTopUsersFollowers() {
        $stats = array();
        $svc = $this->get('social.service.stats');
        $usersIds = $this->get('social.service.user')->getUsersIds();
        $stats['topFollowers'] = $svc->getTopUsersFollowers($usersIds);
        return array('stats' => $stats);
    }
}

?>
