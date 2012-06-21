<?php

namespace Ology\SocialBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheController extends Controller {
    
    /**
     * @Route("/sub", name="_cache_subscriptions")
     */
    public function computeSubscriptions() {
        $this->get('social.service.cache')->refreshPostsSubscriptions();

        $response = new Response("cache refreshed");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/invalidate", name="_cache_inv")
     */
    public function invalidateAll() {
        $this->get('social.service.cache')->invalidateAll();

        $response = new Response("cache refreshed");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/stats", name="_cache_ology_stats")
     */
    public function computeStats() {
        $this->get('social.service.cache')->refreshOlogyStats();
        $this->get('social.service.cache')->refreshUserStats();
        
        $response = new Response("cache refreshed");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/allposts", name="_cache_all_posts")
     */
    public function cacheAllNecessaryPostInfo() {
        $this->get('social.cache.post')->cachePostsForCards(0, 2000);
        $this->get('social.cache.channel')->cachePostsChannels(0, 300);
        $this->get('social.cache.ology')->cachePostsForOlogies();
        $this->get('social.cache.post')->cacheRelatedPostsPreview(0, 20, true, true);
        $this->get('social.cache.post')->cacheRelatedPostsPreview(0, 20, false, true);
        $this->get('social.cache.splash')->cacheSplashPosts(0, 300);
        $this->get('social.cache.post')->cacheMostViewed();
        
        $response = new Response("cached posts refreshed");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    
    /**
     * @Route("/allusers", name="_cache_all_users")
     */
    public function cacheAllNecessaryUserInfo() {
        $this->get('social.cache.user')->cacheUsers();
        $this->get('social.cache.user')->cacheTopOlogist();
        
        $response = new Response("cached users refreshed");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/resetTopRedis", name="_reset_topologist_redis")
     */
    public function resetTopOlogistsRedis() {
        $this->get('social.cache.user')->resetTopOlogistsRedis();
        $response = new Response("topologists redis values reset");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    
    /**
     * @Route("/posts/{offset}/{n}", name="_cache_posts_cards")
     */
    public function cachePostsForCards($offset, $n) {
        $this->get('social.cache.post')->cachePostsForCards($offset, $n);
        
        $response = new Response("cached posts refreshed");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/pc/{offset}/{n}", name="_cache_pc")
     */
    public function cacheChannelPosts($offset, $n) {
        $res = $this->get('social.cache.channel')->cachePostsChannels($offset, $n);
        
        $response = new Response("cached pc refreshed: " . $res);
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/rp/{offset}/{n}", name="_cache_related_posts")
     */
    public function cacheRelatedProPosts($offset, $n) {
        $this->get('social.cache.post')->cacheRelatedPostsPreview($offset, $n, true, true);
        $this->get('social.cache.post')->cacheRelatedPostsPreview($offset, $n, false, true);
        
        $response = new Response("cached related posts previews by labels refreshed");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/splash/{offset}/{n}", name="_cache_splash_posts")
     */
    public function cacheSplashPosts($offset, $n) {
        $res = $this->get('social.cache.splash')->cacheSplashPosts($offset, $n);
        
        $response = new Response("cached posts on the splash page:" . $res);
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/mostviewed", name="_cache_most_viewed_posts")
     */
    public function cacheMostViewed() {
        $res = $this->get('social.cache.post')->cacheMostViewed();
        
        $response = new Response("cached most viewed posts refreshed : $res");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/post/{id}", name="_cache_post")
     */
    public function cachePost($id) {
        $this->get('social.cache.post')->cachePost($id);
        
        $response = new Response("cached post $id");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/ologies", name="_cache_ology_posts")
     */
    public function cacheOlogyAndPosts() {
        $res1 = $this->get('social.cache.ology')->buildAutocompleteData();
        $res2 = $this->get('social.cache.ology')->cachePostsForOlogies();
        
        $response = new Response("cached ology prefix tree and posts for ologies");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/usersIdandImg", name="_cache_usersId_usersImg")
     */
    public function cacheUsers() {
        $res = $this->get('social.cache.user')->cacheUsers();
        
        $response = new Response("cached users_id and users_img refreshed : $res");
        return $response;
    }

}