<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;

/**
 * Description of FollowUserCacheDAO
 *
 * @author raphael
 */
class FollowUserCacheDAO extends BaseCacheDAO {
    
    const USER_FOLLOWERS = ":followers";
    const USER_FOLLOWING_OLOGIES = ":ologies";
    const USER_FOLLOWING_STASHES = ":stashes";
    
    function __construct(Client $redis) {
        parent::__construct($redis);
    }
    
    /**
     * Redis key = user:[userId]:ology:[ologyId]:followers
     * @return boolean success
     */
    public function addUserOlogyFollower($followeeId, $followerId, $ologyId) {
        return $this->ZADD(parent::USER_PREFIX . $followeeId .':'. parent::OLOGY_PREFIX . $ologyId . self::USER_FOLLOWERS, time(), $followerId);
    }
    
    /**
     * Redis key = user:[userId]:ology:[ologyId]:followers
     * @return boolean success
     */
    public function removeUserOlogyFollower($followeeId, $followerId, $ologyId) {
        return $this->ZREM(parent::USER_PREFIX . $followeeId .':'. parent::OLOGY_PREFIX . $ologyId . self::USER_FOLLOWERS, $followerId);
    }
    
    /**
     * Redis key = user:[userId]:ology:[ologyId]:followers
     * @return array followers ids
     */
    public function getUserOlogyFollowersIds($userId, $ologyId, $offset = 0, $n = -1) {
        return $this->ZRANGE(parent::USER_PREFIX . $userId .':'. parent::OLOGY_PREFIX . $ologyId . self::USER_FOLLOWERS, $offset, $offset + $n);
    }
    
    /**
     * Redis key = user:[userId]:following:user:[followeeId]:ologies
     * @return boolean success
     */
    public function addUserFollowingUserOlogy($followerId, $followeeId, $ologyId) {
        $this->addFollowingUser($followerId, $followeeId);
        return $this->ZADD(parent::USER_PREFIX . $followerId .':'. parent::FOLLOWING_USER_PREFIX . $followeeId . self::USER_FOLLOWING_OLOGIES, time(), $ologyId);
    }
    
    /**
     * Redis key = user:[userId]:following:user:[followeeId]:ologies
     * @return boolean success
     */
    public function removeUserFollowingUserOlogy($followerId, $followeeId, $ologyId) {
        $success = $this->ZREM(parent::USER_PREFIX . $followerId .':'. parent::FOLLOWING_USER_PREFIX . $followeeId . self::USER_FOLLOWING_OLOGIES, $ologyId);
        $this->updateUserFollowingPool($followerId, $followeeId);
        return $success; 
    }
    
    /**
     * Redis key = user:[userId]:following:user:[followeeId]:ologies
     * @return array ologies ids following by the user  
     */
    public function getUserFolloweeOlogies($followerId, $followeeId, $offset = 0, $n = -1) {
        return $this->ZRANGE(parent::USER_PREFIX . $followerId .':'. parent::FOLLOWING_USER_PREFIX . $followeeId . self::USER_FOLLOWING_OLOGIES, $offset, $offset + $n);
    }
    
    /**
     * Redis key = user:[followeeId]:stash:[stashId]:followers
     * @return  boolean success
     */
    public function addUserStashFollower($followeeId, $followerId, $stashId) {
        return $this->ZADD(parent::USER_PREFIX . $followeeId .':'. parent::STASH_PREFIX . $stashId . self::USER_FOLLOWERS, time(), $followerId);
    }
    
    /**
     * Redis key = user:[followeeId]:stash:[stashId]:followers
     * @return  boolean success
     */
    public function removeUserStashFollower($followeeId, $followerId, $stashId) {
        return $this->ZREM(parent::USER_PREFIX . $followeeId .':'. parent::STASH_PREFIX . $stashId . self::USER_FOLLOWERS, $followerId);
    }
    
    /**
     * Redis key = user:[userId]:stash:[stashId]:followers
     * A stash is unique and for only one user, contrary to an Ology.
     * So [userId] is not necessary but it's simple to keep the same naming convention
     * @return array followers ids
     */
    public function getUserStashFollowersIds($userId, $stashId, $offset = 0, $n = -1) {
        return $this->ZRANGE(parent::USER_PREFIX . $userId .':'. parent::STASH_PREFIX . $stashId . self::USER_FOLLOWERS, $offset, $offset + $n);
    }
    
    /**
     * Redis key = user:[userId]:following:user:[userFollowedId]:stashes
     * Adding followed people to the following people list too.
     * @return boolean success
     */
    public function addUserFollowingStash($followerId, $followeeId, $stashId) {
        $this->addFollowingUser($followerId, $followeeId);
        return $this->ZADD(parent::USER_PREFIX . $followerId .':'. parent::FOLLOWING_USER_PREFIX . $followeeId . self::USER_FOLLOWING_STASHES, time(), $stashId);
    }
    
    /**
     * Redis key = user:[userId]:following:user:[userFollowedId]:stashes
     * @return boolean success
     */
    public function removeUserFollowingStash($followerId, $followeeId, $stashId) {
        $success = $this->ZREM(parent::USER_PREFIX . $followerId .':'. parent::FOLLOWING_USER_PREFIX . $followeeId . self::USER_FOLLOWING_STASHES, $stashId);
        $this->updateUserFollowingPool($followerId, $followeeId);
        return $success;
    }
    
    /**
     * Redis key = user:[userId]:following:user:[userFollowedId]:stashes
     * @return array stash ids following by the user 
     */
    public function getUserFolloweeStashes($followerId, $followeeId, $offset = 0, $n = -1) {
        return $this->ZRANGE(parent::USER_PREFIX . $followerId .':'. parent::FOLLOWING_USER_PREFIX . $followeeId . self::USER_FOLLOWING_STASHES, $offset, $offset + $n);
    }

    /**
     * Get the list of user followees.
     * Redis user:[userId]:following:user:pool
     */
    public function getUserFolloweesIds($userId, $offset = 0, $n = -1) {
        return $this->ZRANGE(parent::USER_PREFIX . $userId .':'. parent::FOLLOWING_USER_PREFIX . parent::POOL, $offset, $offset + $n);
    }
    
    /**
     * Redis user:[userId]:following:user:pool
     * @return int number of followee for user 
     */
    public function getUserNbFollowees($userId) {
        return $this->ZCARD(parent::USER_PREFIX . $userId .':'. parent::FOLLOWING_USER_PREFIX . parent::POOL);
    }
    
    /**
     * Computes which user has the most followees
     * @return array the key is the userId, the value is the number of followees 
     */
    public function getTopUsersFollowees(array $usersIds, $maxResults = 10) {
        $this->MULTI();
        foreach ($usersIds as $userId) {
            $this->getUserNbFollowees($userId);
        }
        $nbFollowees = $this->EXEC();
        
        arsort($nbFollowees);
        $nbFollowees = array_slice($nbFollowees, 0, $maxResults, TRUE);
        return $nbFollowees;
    }
    
    /**
     * Redis key = user:[userId]:stash:[stashId]:followers
     * @return int number of follower for user and specific stash  
     */
    public function getUserNbStashFollowers($userId, $stashId) {
        return $this->ZCARD(parent::USER_PREFIX . $userId .':'. parent::STASH_PREFIX . $stashId . self::USER_FOLLOWERS);
    }
    
    /**
     * Redis key = user:[userId]:ology:[ologyId]:followers
     * @return int number of follower for user and specific ology
     */
    public function getUserNbOlogyFollowers($userId, $ologyId) {
        return $this->ZCARD(parent::USER_PREFIX . $userId .':'. parent::OLOGY_PREFIX . $ologyId . self::USER_FOLLOWERS);
    }
    
    /**
     * Redis user:[userId]:following:user:pool
     * @return boolean TRUE if $user is following $followee
     */
    public function isFollowing($userId, $followeeId) {
        $res = $this->ZRANK(parent::USER_PREFIX . $userId .':'. parent::FOLLOWING_USER_PREFIX . parent::POOL, $followeeId);
        return !is_null($res);
    }
    
    /**
     * Add a followeeId to the following user list. Useful to iterate on ;)
     * Redis user:[userId]:following:user:pool
     */
    private function addFollowingUser($userId, $followeeId) {
        return $this->ZADD(parent::USER_PREFIX . $userId .':'. parent::FOLLOWING_USER_PREFIX . parent::POOL, time(), $followeeId);
    }
    
    /**
     * This function is used to update the user's following pool.
     * It checks if the user is following the followee in any followee stashes/ologies.
     * This must be called after a delete.
     * If the user is still following the followee in another stash/ology, so we do nothing.
     * Else, we remove the followee from the user's pool.
     * 
     * Update Redis user:[userId]:following:user:pool if needed
     * 
     * @return the number of ology and stash in which the user is still following followee
     */
    private function updateUserFollowingPool($userId, $followeeId) {
        $nbFollowing = 0;
        $nbFollowing += sizeof($this->getUserFolloweeOlogies($userId, $followeeId));
        $nbFollowing += sizeof($this->getUserFolloweeStashes($userId, $followeeId));
        
        if ($nbFollowing == 0)
            $this->ZREM(parent::USER_PREFIX . $userId .':'. parent::FOLLOWING_USER_PREFIX . parent::POOL, $followeeId);
        
        return $nbFollowing;
    }
    
}

?>
