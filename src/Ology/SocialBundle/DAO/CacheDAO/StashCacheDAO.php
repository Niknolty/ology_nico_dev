<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;
use Ology\SocialBundle\Entity\Stash;

/**
 * Description of StashCacheDAO
 *
 * @author raphael
 */
class StashCacheDAO extends BaseCacheDAO {
    
    const STASH_NAME = "name:";
    
    function __construct(Client $redis) {
        parent::__construct($redis);
    }
    
    /**
     * Redis key = stash:[stashId]
     */
    public function createStash(Stash $stash) {
        // FIXME
    }
    
    /**
     * Redis key = stash:[stashId]
     */
    public function getStash($id) {
        // FIXME
    }
    
    /**
     * Redis key = stash:user:[userId]
     */
    public function addUserStash($userId, $stashId) {
        return $this->LPUSH(parent::STASH_PREFIX . parent::USER_PREFIX . $userId, $stashId);
    }
    
    /**
     * Redis key = stash:user:[userId]
     */
    public function getStashesIdsForUser($userId, $offset = 0, $n = -1) {
        return $this->LRANGE(parent::STASH_PREFIX . parent::USER_PREFIX . $userId, $offset, $offset + $n);
    }
    
}

?>
