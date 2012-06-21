<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;

/**
 * Description of LikesCacheDAO
 *
 * @author raphael
 */
class LikesCacheDAO extends BaseCacheDAO {
    
    const LOVES = ":loves";
    const HATES = ":hates";
    const HMMS = ":hmms";
    
    function __construct(Client $redis) {
        parent::__construct($redis);
    }
    
    /**
     * Redis key = user:[userId]:{loves|hates|hmms}
     * @return boolean success
     */
    public function createLike($userId, $postId, $likeType, $creationDate) {
        switch ($likeType) {
            case 'love':
                $res = $this->ZADD( parent::USER_PREFIX . $userId . self::LOVES, $creationDate, $postId );
                break;
            case 'hate':
                $res = $this->ZADD( parent::USER_PREFIX . $userId . self::HATES, $creationDate, $postId );
                break;
            case 'hmm':
                $res = $this->ZADD( parent::USER_PREFIX . $userId . self::HMMS, $creationDate, $postId );
                break;
            default:
                $res = 0;
                break;
        }
        return $res;
    }
    
    /**
     * Redis key = user:[userId]:{loves|hates|hmms}
     * @return boolean success
     */
    public function deleteLike($userId, $postId, $likeType){
        switch ($likeType) {
            case 'love':
                $res = $this->ZREM( parent::USER_PREFIX . $userId . self::LOVES, $postId );
                break;
            case 'hate':
                $res = $this->ZREM( parent::USER_PREFIX . $userId . self::HATES, $postId );
                break;
            case 'hmm':
                $res = $this->ZREM( parent::USER_PREFIX . $userId . self::HMMS, $postId );
                break;
            default:
                $res = 0;
                break;
        }
        return $res;
    }
    
    /**
     * Redis key = user:[userId]:{loves|hates|hmms}
     * @return boolean TRUE/FALSE or NULL if the key doesnt exists yet
     */
    public function isHeLovingPost($userId, $postId, $likeType){
        switch ($likeType) {
            case 'love':
                $res = $this->ZRANK( parent::USER_PREFIX . $userId . self::LOVES, $postId );
                break;
            case 'hate':
                $res = $this->ZRANK( parent::USER_PREFIX . $userId . self::HATES, $postId );
                break;
            case 'hmm':
                $res = $this->ZRANK( parent::USER_PREFIX . $userId . self::HMMS, $postId );
                break;
            default:
                $res = NULL;
                break;
        }
        return !is_null($res);
    }
    
}

?>
