<?php

namespace Ology\SocialBundle\Service;

use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\OlogyDAO;

class CacheService {
    protected $cacheDAO;
    protected $ologyDAO;
    
    function __construct(CacheDAO $cacheDAO, OlogyDAO $ologyDAO) {
        $this->cacheDAO = $cacheDAO;
        $this->ologyDAO = $ologyDAO;
    }
    
    public function refreshCache() {
        $this->cacheDAO->cache_refresh();
    }
    
    public function invalidateAll() {
        $this->cacheDAO->cache_invalidate_all();
    }
    
    public function refreshOlogyStats() {
        $this->cacheDAO->cache_computeOlogyStats();
    }
    
    public function refreshUserStats() {
        $this->cacheDAO->cache_computeUserStats();
    }
    
    public function refreshPostsSubscriptions() {
        $this->cacheDAO->cache_computePostsSubscriptions();
    }
    
    public function cachePostsForCards($offset, $n) {
        return $this->cacheDAO->cachePostsForCards($offset, $n);
    }
    
    public function cachePostsIdsForChannel($offset, $n) {
        return $this->cacheDAO->cachePostsIdsForChannel($offset, $n);
    }
    
    /**
     * Return an array of suggested ologies by interest.
     */
    public function getCachedSuggestedOlogiesByInterest($userId) {
        $suggestedOlogiesIds = $this->cacheDAO->cache_getSuggestedOlogiesIds($userId);
        $suggestedOlogies = array();
        
        foreach ($suggestedOlogiesIds as $ologySuggestedId) {
            $suggestedOlogies[] = $this->ologyDAO->getOlogy($ologySuggestedId);
        }

        return $suggestedOlogies;
    }
    
    public function cachePostsOlogies($userId = 0) {
        return $this->cacheDAO->cachePostsOlogies($userId);
    }
    
    public function removeAllPostsOlogies() {
        return $this->cacheDAO->removeAllPostsOlogies();
    }
    
    public function cachePostsStashes($userId = 0) {
        return $this->cacheDAO->cachePostsStashes($userId);
    }
    
    public function cachePostsChannels($offset = 0, $max = 0, $userId = 0) {
        return $this->cacheDAO->cachePostsChannels($offset, $max, $userId);
    }
    
    public function removeAllUserCached() {
        return $this->cacheDAO->removeAllUserCached();
    }

    public function cacheUsersLikes() {
        return $this->cacheDAO->cacheUsersLikes();
    }

    public function cachePageAdd($key, $html, $expire = 0) {
        return $this->cacheDAO->cachePageAdd($key, $html, $expire);
    }

    public function cachePageInvalidate($key) {
        return $this->cacheDAO->cachePageInvalidate($key);
    }
}

?>
