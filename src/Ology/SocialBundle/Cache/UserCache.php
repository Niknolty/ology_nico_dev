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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserCache extends BaseCache {
    
    const USER_TOP_OLOGIST_PREFIX = "to_utop";
    const USERS_IDS_BY_OLOGY = "to_uidbyo";
    const TOPS_OLOGIST_OFFSET = "to_off";
    const OLOGIES_IDS = "to_oids";
    const TOP_OLOGISTS = "to_topo";
    const NB_POST_FOR_USER_BY_OLOGY = "to_nbpbu";
    
    
    function __construct(EntityManager $em, Client $redis, $dbConnection) {
        parent::__construct($em, $redis, $dbConnection);
    }
    
    
    public function cacheUsers(){
        $sql = "SELECT u.id as user_id, u.image_url as img
                FROM Users u";
        $users = $this->dbConnection->fetchAll($sql);
        foreach ($users as $user) {
            $this->redis->set(CacheDAO::USER_PREFIX . $user['user_id'] . CacheDAO::USER_IMG, $user['img']);
        }
    }
    
 
    public function getCachedUser($id){
        $u = new User();
        $u->setId($id);
        $u->setImageUrl($this->redis->get(CacheDAO::USER_PREFIX . $id . CacheDAO::USER_IMG));
        
        return $u;
    }
   

    public function resetTopOlogistsRedis(){
        $this->redis->del(self::TOPS_OLOGIST_OFFSET);
        $sql_PostsOlogies = "SELECT user_id, ology_id 
                             FROM PostsOlogies
                             ORDER BY date_ologized
                             LIMIT 0, 99999";
                             
        $PostsOlogies = $this->dbConnection->fetchAll($sql_PostsOlogies);    
        
        foreach($PostsOlogies as $po){
           $OlogyId = $po['ology_id'];
           $UserId = $po['user_id'];
           $this->redis->del(self::NB_POST_FOR_USER_BY_OLOGY . $OlogyId . CacheDAO::SEP . $UserId);
           $this->redis->del(self::USERS_IDS_BY_OLOGY . CacheDAO::SEP. $OlogyId);
           $this->redis->del(self::OLOGIES_IDS);
           $this->redis->del(self::TOP_OLOGISTS . $OlogyId);
        }
        
        
    }
    
    public function cacheTopOlogist(){
        
        $offset = ($this->redis->get(self::TOPS_OLOGIST_OFFSET) == NULL) ? 0 : ($this->redis->get(self::TOPS_OLOGIST_OFFSET));
        
        if ($offset == 0)
            $this->redis->set(self::TOPS_OLOGIST_OFFSET, 0);
        
        $sql_PostsOlogies = "SELECT user_id, ology_id 
                             FROM PostsOlogies
                             ORDER BY date_ologized
                             LIMIT $offset, 99999";
                             
        $PostsOlogies = $this->dbConnection->fetchAll($sql_PostsOlogies);    
       
        $nbFields = 0;
        foreach($PostsOlogies as $fields){
         $nbFields++;   
        }
        
        
        $new_offset = $offset + $nbFields;
        $this->redis->set(self::TOPS_OLOGIST_OFFSET, $new_offset);

        
        $OlogiesId = $this->redis->get(self::OLOGIES_IDS);
        
        if ($OlogiesId == NULL)
            $OlogiesIdsArray = array();
        else{
            $ids = $this->redis->get(self::OLOGIES_IDS);
            $OlogiesIdsArray = explode(CacheDAO::SEP, $ids);
        }

        
        foreach($PostsOlogies as $po){
           $OlogyId = $po['ology_id'];
           $UserId = $po['user_id'];          
          
           
           if (!in_array($OlogyId, $OlogiesIdsArray))
               $OlogiesIdsArray[$OlogyId] = $OlogyId;

           $NbPostForUserByOlogy = $this->redis->get(self::NB_POST_FOR_USER_BY_OLOGY . $OlogyId . CacheDAO::SEP .$UserId);
           if ($NbPostForUserByOlogy != NULL){  
               $last_nb_posts = $NbPostForUserByOlogy;
               $last_nb_posts++; 
               $this->redis->set(self::NB_POST_FOR_USER_BY_OLOGY . $OlogyId . CacheDAO::SEP .$UserId, $last_nb_posts);
           }
           else
               $this->redis->set(self::NB_POST_FOR_USER_BY_OLOGY . $OlogyId . CacheDAO::SEP. $UserId, 1);
               

           $UsersId = $this->redis->get(self::USERS_IDS_BY_OLOGY .$OlogyId);
            if ($UsersId == NULL)
                $UsersIdsByOlogyArray = array();
            else
                $UsersIdsByOlogyArray = explode(CacheDAO::SEP, $UsersId);
           
           
           if (!in_array($UserId, $UsersIdsByOlogyArray)){
               $UsersIdsByOlogyArray[$UserId] = $UserId;
               $this->redis->set(self::USERS_IDS_BY_OLOGY . $OlogyId, implode(CacheDAO::SEP, $UsersIdsByOlogyArray));
               
           }
        }
        
        $this->redis->set(self::OLOGIES_IDS, implode(CacheDAO::SEP, $OlogiesIdsArray));
        
        foreach($OlogiesIdsArray as $OlogyId){
            $PostersIdByOlogy = $this->redis->get(self::USERS_IDS_BY_OLOGY .$OlogyId);
            $PostersIdsByOlogyArray = explode(CacheDAO::SEP, $PostersIdByOlogy);
            
            
            $StockNbPostsByUser = array();
          
            foreach($PostersIdsByOlogyArray as $userId){
                $nbp = $this->redis->get(self::NB_POST_FOR_USER_BY_OLOGY . $OlogyId . CacheDAO::SEP . $userId);
                $StockNbPostsByUser[$userId] = $nbp;
            }
            
           arsort($StockNbPostsByUser);
 
           $TopOlogists = array();
           $counter = 0;
           foreach($StockNbPostsByUser as $userId => $nbPosts){
               if ($counter > 5)
                   break;
               $TopOlogists[] = $userId;
               $counter++;
           }
            
            $this->redis->set(self::TOP_OLOGISTS . $OlogyId, implode(CacheDAO::SEP, $TopOlogists));
        }
    }
      
    public function getTopOlogists($OlogyId){
        $ids = $this->redis->get(self::TOP_OLOGISTS . $OlogyId);
        $idArray = explode(CacheDAO::SEP, $ids);
        $TopOlogists = array(array());
        
        if (empty($idArray[0]))
            return $TopOlogists;
        
        for ($i = 0; $i < count($idArray); $i++) {
            $id = $idArray[$i];            
            $p = $this->getCachedUser($id);
            $TopOlogists[$i][0] = $p->getId();
            $TopOlogists[$i][1] = $p->getImageUrl();
        }
        return $TopOlogists;
    }
  
}

?>
