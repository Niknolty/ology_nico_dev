<?php

namespace Ology\SocialBundle\DAO\CacheDAO;

/**
 * Description of PageCacheDAO
 */
class PageCacheDAO
{
    protected $memcache;
    function __construct(\Memcache $memcache) {
        $this->memcache = $memcache;
    }

    public function cachePageAdd($key, $html, $expire){

       // $this->memcache->addServer('127.0.0.1','11211');
        try{
            $this->memcache->set($key, $html, 0, $expire);
        }
        catch (\Exception $e){

        }
    }

    public function cachePageInvalidate($key){
    }

}

?>
