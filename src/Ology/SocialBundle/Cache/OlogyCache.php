<?php
namespace Ology\SocialBundle\Cache;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\User;
use Predis\Client;

class OlogyCache extends BaseCache {
    const AC_PREFIX = "ac_";
    const POSTS_OLOGY = "po_";
    
    function __construct(EntityManager $em, Client $redis, $dbConnection) {
        parent::__construct($em, $redis, $dbConnection);
    }

    public function buildAutocompleteData() {
        $ologyRows = $this->dbConnection->fetchAll("SELECT id, name, image_url FROM Ologies");
        foreach ($ologyRows as $ologyRow) {
            $ologyId = $ologyRow['id'];
            $ologyName = $ologyRow['name'];
            $ologyImage = $ologyRow['image_url'];

            $this->redis->set(parent::OLOGY_PREFIX . $ologyId . parent::OLOGY_NAME_SUFFIX, $ologyName);
            $this->redis->set(parent::OLOGY_PREFIX . $ologyId . parent::OLOGY_IMG_SUFFIX, $ologyImage);

            $name = $ologyName;
            $n = strlen($name);
            for ($i = 1; $i <= $n; $i++) {
                $prefix = substr($name, 0, $i);
                $key = strtolower(self::AC_PREFIX . $prefix);
                $oldValue = $this->redis->get($key);
                $toAppend = $ologyId . CacheDAO::SEP;
                if (strpos($oldValue, $toAppend) === false) {
                    if ($oldValue == NULL)
                        $newValue = $toAppend;
                    else
                        $newValue = $oldValue . $toAppend;
                    $this->redis->set($key, $newValue);
                }
            }
        }
    }
    
    public function getOlogyIdsStartingWith($prefix) {
        return $this->redis->get(self::AC_PREFIX . strtolower($prefix));
    }

    public function cachePostsForOlogies() {
        $sql = "SELECT po.post_id, po.ology_id 
                  FROM PostsOlogies po
                  ORDER BY po.date_ologized DESC";

        $rows = $this->dbConnection->fetchAll($sql);
        $postsByOlogies = array();
        foreach ($rows as $row) {
            $ologyId = $row['ology_id'];
            $postId = $row['post_id'];

            if (!array_key_exists($ologyId, $postsByOlogies)) {
                $postsByOlogies[$ologyId] = array();
            }

            $postsByOlogies[$ologyId][] = $postId;
        }

        foreach ($postsByOlogies as $ologyId => $postsIds) {
            $this->redis->set(self::POSTS_OLOGY . $ologyId, implode(CacheDAO::SEP, $postsIds));
        }
    }
}
?>
