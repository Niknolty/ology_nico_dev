<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

use Predis\Client;

/**
 * Extends SNC Redis Client to create direct commands.
 *
 * @author raphael
 */
class BaseCacheDAO {
    
    const POOL = "pool";
    
    const CHANNEL_PREFIX = "channel:";
    const HOME_PREFIX = "home:";
    const FOLLOWING_USER_PREFIX = "following:user:";
    const NOTIF_PREFIX = "notif:";
    const OLOGY_PREFIX = "ology:";
    const POST_PREFIX = "post:";
    const POST_CHANNELS_PREFIX = "post_channel:";
    const POST_OLOGIES_PREFIX = "post_ology:";
    const POST_STASHES_PREFIX = "post_stash:";
    const STASH_PREFIX = "stash:";
    const USER_PREFIX = "user:";
    
    /**
     * @var Predis\Client 
     */
    protected $redis;
        
    function __construct(Client $redis) {
        $this->redis = $redis;
    }
    
    protected function EXEC() {
        $cmd = $this->redis->createCommand('EXEC');
        return $this->redis->executeCommand($cmd);
    }
    
    protected function HMSET($key, $fieldValueArray) {
        $cmd = $this->redis->createCommand('HMSET', array($key, $fieldValueArray));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function HGETALL($key) {
        $cmd = $this->redis->createCommand('HGETALL', array($key));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function HSET($key, $field, $value) {
        $cmd = $this->redis->createCommand('HSET', array($key, $field, $value));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function MULTI() {
        $cmd = $this->redis->createCommand('MULTI');
        return $this->redis->executeCommand($cmd);
    }
    
    protected function SMEMBERS($key) {
        $cmd = $this->redis->createCommand('SMEMBERS', array($key));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function SADD($key, $member) {
        $cmd = $this->redis->createCommand('SADD', array($key, $member));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function ZADD($key, $score, $member) {
        $cmd = $this->redis->createCommand('ZADD', array($key, $score, $member));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function ZCARD($key) {
        $cmd = $this->redis->createCommand('ZCARD', array($key));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function ZRANGE($key, $start, $stop) {
        $cmd = $this->redis->createCommand('ZRANGE', array($key, $start, $stop));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function ZREVRANGE($key, $start, $stop) {
        $cmd = $this->redis->createCommand('ZREVRANGE', array($key, $start, $stop));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function ZRANK($key, $member) {
        $cmd = $this->redis->createCommand('ZRANK', array($key, $member));
        return $this->redis->executeCommand($cmd);
    }
    
    protected function ZREM($key, $member) {
        $cmd = $this->redis->createCommand('ZREM', array($key, $member));
        return $this->redis->executeCommand($cmd);
    }
    
    // FIXME option $weight has not been implemented, other is well working
    protected function ZUNIONSTORE($destination, $numkeys, array $keys, array $weight = array(), $aggregate = 'SUM') {
        if (!empty($keys)) {
            $args = array();
            $args = array_merge(array($destination, $numkeys), $keys, array(array('AGGREGATE' => $aggregate)));

            $cmd = $this->redis->createCommand('ZUNIONSTORE', $args);
            return $this->redis->executeCommand($cmd);
        }
        return 0;
    }

    protected function LRANGE($key, $start, $stop) {
        $cmd = $this->redis->createCommand('LRANGE', array($key, $start, $stop));
        return $this->redis->executeCommand($cmd);
    }
    
    /**
     * @return int New length of the list $key 
     */
    protected function LPUSH($key, $value) {
        $cmd = $this->redis->createCommand('LPUSH', array($key, $value));
        return $this->redis->executeCommand($cmd);
    }
    
    /**
     * @return int New value of the incremented $key 
     */
    protected function INCR($key) {
        $cmd = $this->redis->createCommand('INCR', array($key));
        return $this->redis->executeCommand($cmd);
    }
    
    /**
     * WARNING : use this function with careful!
     * @param $keys array of keys to delete
     * @return number of keys deleted
     */
    protected function DEL($keys) {
        $cmd = $this->redis->createCommand('DEL', $keys);
        return $this->redis->executeCommand($cmd);
    }
}

?>
