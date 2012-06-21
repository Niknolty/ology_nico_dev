<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;

/**
 * Description of PostCacheDAO
 *
 * @author raphael
 */
class PostCacheDAO extends BaseCacheDAO {
    
    const USER_HOME = ":home";
    
    function __construct(Client $redis) {
        parent::__construct($redis);
    }
    
    /**
     * Redis key = post:user:[userId]:home
     * @param array $keys 
     */
    public function getHomePagePostsIds($userId, array $keys, $offset = 0, $n = 0) {
        $compute = $offset > 0 ? FALSE : TRUE;
        $postsHomePageKey = parent::POST_PREFIX . parent::USER_PREFIX . $userId . self::USER_HOME;
        if ($compute)
            $this->ZUNIONSTORE($postsHomePageKey, sizeof($keys), $keys, array(), 'MAX');
        $postsIds = $this->ZREVRANGE($postsHomePageKey, $offset, $offset + $n - 1);

        return $postsIds;
    }
    
}

?>
