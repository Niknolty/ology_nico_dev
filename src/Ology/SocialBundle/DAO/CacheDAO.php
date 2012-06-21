<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Cache\PostCache;
use Doctrine\ORM\Query\ResultSetMapping;
use Ology\SocialBundle\Entity\Notification;
use Ology\SocialBundle\Entity\OlogyStats;
use Ology\SocialBundle\Entity\UserStats;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\DAO\CacheDAO\PostsStashesCacheDAO;
use Ology\SocialBundle\DAO\CacheDAO\PostsOlogiesCacheDAO;
use Ology\SocialBundle\DAO\CacheDAO\PostsChannelsCacheDAO;
use Ology\SocialBundle\DAO\CacheDAO\UserCacheDAO;
use Ology\SocialBundle\DAO\CacheDAO\LikesCacheDAO;
use Predis\Client;

class CacheDAO {
    const SEP = ":";

    const IDX_A = "a";
    const IDX_B = "b";
    const MOST_OLOG_NEXT_IDX = 'most_ologist_index';
    const MOST_OLOG_PREFIX = 'most_ologist_';

    const POST_SUBSCRIBE_PREFIX = "p_sub_";

    const USER_INVALIDATE_MEMBERSHIP = "inv_m_";
    const USER_INVALIDATE_SUBSCRIPTION = "inv_s_";
    const USER_INVALIDATE_NOTIF = "inv_n_";
    const USER_FB_DATA = "fb_data";

    const NOTIF_PREF = "not_";
    const NOTIF_LIST_PREF = "not_u_";
    const NOTIF_TYPE = ".type";
    const NOTIF_USERID = ".user.id";
    const NOTIF_USERIMG = ".user.imageUrl";
    const NOTIF_USERNAME = ".user.firstName";
    const NOTIF_OLOGYID = ".ology.id";
    const NOTIF_OLOGYNAME = ".ology.name";
    const NOTIF_STASHID = ".stash.id";
    const NOTIF_STASHNAME = ".stash.name";
    const NOTIF_OLOGYSLUG = ".ology.slug";
    const NOTIF_OLOGYIMG = ".ology.imageUrl";
    const NOTIF_POSTID = ".post.id";
    const NOTIF_POSTTITLE = ".post.title";
    const NOTIF_POSTSLUG = ".post.slug";
    const NOTIF_POSTIMG = ".post.imageUrl";

    const POST_PREFIX = "p_";
    const POST_TITLE = ".title";
    const POST_HTML_TITLE = ".htitle";
    const POST_SUMMARY = ".sum";
    const POST_IMAGE = ".image";
    const POST_VIDEO = ".vid";
    const POST_AUDIO = ".aud";
    const POST_TEXT = ".txt";
    const POST_SLUG = ".sl";
    const POST_DATE = ".date";
    const POST_PRO = ".pro";
    const POST_TYPE = ".type";
    const POST_AUTH_ID = ".a.id";
    const POST_AUTH_FN = ".a.fn";
    const POST_AUTH_LN = ".a.ln";
    const POST_AUTH_TI = ".a.t";
    const POST_AUTH_IMG = ".a.img";
    const POST_FO_ID = ".fo.id";
    const POST_FO_NAME = ".fo.n";
    const POST_FO_SLUG = ".fo.s";
    const POST_NBVIEW = ".nbv";
    const POST_NBCOMMENTS = ".nbc";
    const POST_NBLOVE = ".nblove";
    const POST_NBHATE = ".nbhate";
    const POST_NBHMM = ".nbhmm";
    const POST_ID = ".p.id";
    
    const OLOGY_STAT_MEMBERS_PREFIX = "s_o_m_";
    const OLOGY_STAT_POSTS_PREFIX = "s_o_p_";
    const OLOGY_STAT_COMMENTS_PREFIX = "s_o_c_";
    const OLO_SLUG = "olo_slug";
    const OLO_NAME = "olo_name";
    const USER_STAT_POSTS_PREFIX = "s_u_p_";
    const USER_STAT_COMMENTS_PREFIX = "s_u_c_";
    const USER_STAT_NBCOMMENTS_FOR_ALL_POSTS_PREFIX = "s_u_c_f_all_posts";
    const USER_STAT_REOLOGIZE_PREFIX = "s_u_r_";
    const USER_STAT_REOLOGIZED_PREFIX = "s_u_rd_";
    const USER_STAT_NBLOVED_PREFIX = "s_u_loved_";
    const USER_STAT_NBHATED_PREFIX = "s_u_hated_";
    const USER_STAT_NBHMMMED_PREFIX = "s_u_hmmmed_";
    
    // Add by Nicolas Le Deaut 05/07/2012
    const USER_PREFIX = "u_prefix";
    const USER_IMG = ".u_image";
    const USER_ID = ".u_id";
    const USER_NBPOSTS = ".u_nb_posts";
    const USER_NBCOMMENTS = ".u_nb_comments";
    // End
    
    const OLOGY_TOP_PREFIX = "o_";
    const OLOGY_SUG_PREFIX = "o_sug_";
    const OLOGY_ID = "o_id";
    
    protected $em;
    protected $redis;
    protected $rClient;
    protected $dbConnection;
    protected $postsStashesCacheDAO;
    protected $postsOlogiesCacheDAO;
    protected $postsChannelsCacheDAO;
    protected $postCache;
    protected $userCacheDAO;
    protected $likesCacheDAO;


    function __construct(EntityManager $em, Client $redis, $dbConnection, PostsStashesCacheDAO $postsStashesCacheDAO, PostsOlogiesCacheDAO $postsOlogiesCacheDAO, PostsChannelsCacheDAO $postsChannelsCacheDAO, UserCacheDAO $userCacheDAO, LikesCacheDAO $likesCacheDAO) {
        $this->em = $em;
        $this->redis = $redis;
        $this->dbConnection = $dbConnection;
        $this->postsStashesCacheDAO = $postsStashesCacheDAO;
        $this->postsOlogiesCacheDAO = $postsOlogiesCacheDAO;
        $this->postsChannelsCacheDAO = $postsChannelsCacheDAO;
        $this->userCacheDAO = $userCacheDAO;
        $this->likesCacheDAO = $likesCacheDAO;
    }
    
    public function cache_setSuggestedOlogiesIds($userId, array $interests) {
        $sInterests = implode('|', $interests);
        
        if (!empty($sInterests)) {
            $rsm = new ResultSetMapping();
            $rsm->addEntityResult('Ology\SocialBundle\Entity\Ology', 'o');
            $rsm->addFieldResult('o', 'ology_id', 'id');

            $sql = "SELECT o.id as ology_id 
                    FROM Ologies o
                    WHERE o.name REGEXP ?";

            $query = $this->em->createNativeQuery($sql, $rsm);
            $query->setParameter(1, "'$sInterests'");
            $partialOlogies = $query->getResult();

            $ids = "";
            foreach ($partialOlogies as $partialOlogy) {
                $ids = $ids . $partialOlogy->getId() . self::SEP;
            }
            $this->redis->set(self::OLOGY_SUG_PREFIX . $userId, $ids);
        }
    }
    
    public function cache_getSuggestedOlogiesIds($userId) {
        $res = $this->redis->get(self::OLOGY_SUG_PREFIX . $userId);
        if ($res)
            return explode(self::SEP, substr($res, 0, -1));
        return array();
    }

    public function cache_refresh() {
        $this->cache_computeMostActiveOlogies();
        $this->cache_computePostsSubscriptions();
        $this->cache_computeOlogyStats();
        $this->cache_computeUserStats();
        $this->cache_computeMostViewed();
    }

    // TODO add comment here: why 9999?
    public function cache_invalidate_all() {
        for ($i = 0; $i < 9999; $i++) {
            $this->cache_user_set_invalidate_memberships($i, true);
            $this->cache_user_set_invalidate_subscriptions($i, true);
            $this->cache_user_set_invalidate_notifs($i, true);
        }
    }
    
    public function cache_computeMostActiveOlogies() {
        // Get data from DB
        $query = $this->em->createQueryBuilder()
                        ->add('select', 'o, count (o) as total')
                        ->from('OlogySocialBundle:Ology', 'o')
                        ->innerJoin('o.memberships', 'm', Join::WITH, 'o = m.ology')
                        ->groupBy('o.id')
                        ->orderBy('total', 'DESC')
                        ->getQuery();
        $query->setMaxResults(100);
        $array = $query->getResult();

        $idList = "";
        foreach ($array as $obj) {
            $o = $obj[0];
            $idList = $idList . $o->getId() . CacheDAO::SEP;
        }
        $idList = substr($idList, 0, -1);

        // Write in cache
        $index = $this->redis->get(CacheDAO::MOST_OLOG_NEXT_IDX);
        if ($index == NULL)
            $index = CacheDAO::IDX_A;
        $key = CacheDAO::MOST_OLOG_PREFIX . $index;
        $cmdPush = $this->redis->set($key, $idList);

        $newIndex = ($index == CacheDAO::IDX_A) ? CacheDAO::IDX_B : CacheDAO::IDX_A;
        $this->redis->set(CacheDAO::MOST_OLOG_NEXT_IDX, $newIndex);
    }

    public function cache_computePostsSubscriptions() {
        $posts = $this->em->createQueryBuilder()
                        ->add('select', 'p')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->getQuery()
                        ->getResult();
        foreach ($posts as $post) {
            $postId = $post->getId();
            $userId = $post->getAuthor()->getId();
            $this->cache_post_setSubscribedUserForPost($userId, $postId);
        }

        $comments = $this->em->createQueryBuilder()
                        ->add('select', 'c')
                        ->from('OlogySocialBundle:Comment', 'c')
                        ->getQuery()
                        ->getResult();
        foreach ($comments as $comment) {
            if ($comment->getPost() != NULL) {
                $postId = $comment->getPost()->getId();
                $userId = $comment->getAuthor()->getId();
                $this->cache_post_setSubscribedUserForPost($userId, $postId);
            }
        }
    }

    public function cache_computeOlogyStats() {
        $options = array('cas' => true, 'retry' => 10);

        $sql_nbMembers = "SELECT m.ology_id as id, COUNT(*) as n 
                          FROM Memberships m
                          GROUP BY m.ology_id";
        $array = $this->dbConnection->fetchAll($sql_nbMembers);
        foreach ($array as $obj) {
            $ologyId = $obj['id'];
            $nbMember = $obj['n'];
            $key = CacheDAO::OLOGY_STAT_MEMBERS_PREFIX . $ologyId;

            $this->redis->multiExec($options, function($tx)
                    use($key, $nbMember) {
                        $tx->watch($key);
                        $tx->multi();
                        $tx->set($key, $nbMember);
                    });
        }

        $sql_nbPosts = "SELECT po.ology_id AS id, COUNT(*) AS nbpost
                        FROM PostsOlogies po
                        INNER JOIN Posts p ON p.id = po.post_id
                        GROUP BY po.ology_id";
        $array = $this->dbConnection->fetchAll($sql_nbPosts);
        $ologies = array();
        foreach ($array as $obj) {
            $ologyId = $obj['id'];
            $nbPosts = $obj['nbpost'];
            $nbPostsPerOlogy[$ologyId] = $nbPosts;
            $key = CacheDAO::OLOGY_STAT_POSTS_PREFIX . $ologyId;

            $this->redis->multiExec($options, function($tx)
                    use($key, $nbPosts) {
                        $tx->watch($key);
                        $tx->multi();
                        $tx->set($key, $nbPosts);
                    });
        }
        
        arsort($nbPostsPerOlogy);
        $j = 1;
        foreach ($nbPostsPerOlogy as $ologyId => $nbPosts) {
            if ($j > 5)
                break;
            
            $this->redis->multiExec($options, function($tx) 
                use($ologyId, $j) {
                    $tx->watch(CacheDAO::OLOGY_TOP_PREFIX . $j);
                    $tx->multi();
                    $tx->set(CacheDAO::OLOGY_TOP_PREFIX . $j, $ologyId);
                });
            $j++;
        }

        $sql_nbComments = "SELECT po.ology_id AS ologyid, SUM(p.times_commented) AS nbcomments
                            FROM PostsOlogies po
                            INNER JOIN Posts p ON p.id = po.post_id
                            INNER JOIN Ologies o ON o.id = po.ology_id
                            GROUP BY ologyid";
        $array = $this->dbConnection->fetchAll($sql_nbComments);
        foreach ($array as $obj) {
            $ologyId = $obj['ologyid'];
            $nbComments = $obj['nbcomments'];
            $key = CacheDAO::OLOGY_STAT_COMMENTS_PREFIX . $ologyId;

            $this->redis->multiExec($options, function($tx)
                    use($key, $nbComments) {
                        $tx->watch($key);
                        $tx->multi();
                        $tx->set($key, $nbComments);
                    });
        }
    }

    public function cache_computeUserStats() {
        $options = array('cas' => true, 'retry' => 10);

        $sql_nbMembers = "SELECT p.author_id as id, COUNT(*) as n 
                          FROM Posts p
                          GROUP BY p.author_id";
        $array = $this->dbConnection->fetchAll($sql_nbMembers);
        foreach ($array as $obj) {
            $userId = $obj['id'];
            $nbPosts = $obj['n'];
            $key = CacheDAO::USER_STAT_POSTS_PREFIX . $userId;

            $this->redis->multiExec($options, function($tx)
                    use($key, $nbPosts) {
                        $tx->watch($key);
                        $tx->multi();
                        $tx->set($key, $nbPosts);
                    });
        }

        $sql_nbMembers = "SELECT c.author_id as id, COUNT(*) as n 
                          FROM Comments c
                          GROUP BY c.author_id";
        $array = $this->dbConnection->fetchAll($sql_nbMembers);
        foreach ($array as $obj) {
            $userId = $obj['id'];
            $nbPosts = $obj['n'];
            $key = CacheDAO::USER_STAT_COMMENTS_PREFIX . $userId;

            $this->redis->multiExec($options, function($tx)
                    use($key, $nbPosts) {
                        $tx->watch($key);
                        $tx->multi();
                        $tx->set($key, $nbPosts);
                    });
        }
        
        
        //Added by Nicolas Le Deaut 05/18/2012
        $sql_nbCommentsOnAllPosts = "SELECT p.author_id as id, SUM(p.times_commented) as nbcomments 
                                    FROM Posts p
                                    GROUP BY p.author_id";
        
        $array = $this->dbConnection->fetchAll($sql_nbCommentsOnAllPosts);
        foreach ($array as $obj) {
            $userId = $obj['id'];
            $nbPosts = $obj['nbcomments'];
            $key = CacheDAO::USER_STAT_NBCOMMENTS_FOR_ALL_POSTS_PREFIX . $userId;

            $this->redis->multiExec($options, function($tx)
                    use($key, $nbPosts) {
                        $tx->watch($key);
                        $tx->multi();
                        $tx->set($key, $nbPosts);
                    });
        }
        //
        
        
        
        
        
        $sql_nbOlogized = "SELECT p.author_id, p.times_ologized  
                           FROM Posts p 
                           WHERE p.times_ologized > 1";
        $array = $this->dbConnection->fetchAll($sql_nbOlogized);
        $nbReologized = array();
        foreach ($array as $obj) {
            $userId = $obj['author_id'];
            $n = $obj['times_ologized'];
            if (isset($nbReologized[$userId]))
                $nbReologized[$userId] += $n - 1;
            else
                $nbReologized[$userId] = 1;
        }
        foreach ($nbReologized as $userId => $n) {
            $key = CacheDAO::USER_STAT_REOLOGIZED_PREFIX . $userId;
            $this->redis->multiExec($options, function($tx)
                    use($key, $n) {
                        $tx->watch($key);
                        $tx->multi();
                        $tx->set($key, $n);
                    });
        }
        
        $sql_nbOlogize = "SELECT po.user_id, count(po.user_id) as times_ologize
                          FROM PostsOlogies po
                          INNER JOIN Posts p ON po.post_id = p.id
                          WHERE p.times_ologized > 1
                          GROUP BY po.user_id";
        $array = $this->dbConnection->fetchAll($sql_nbOlogize);
        $nbReologize = array();
        foreach ($array as $obj) {
            $userId = $obj['user_id'];
            $n = $obj['times_ologize'];
            $key = CacheDAO::USER_STAT_REOLOGIZE_PREFIX . $userId;
            $this->redis->multiExec($options, function($tx)
                use($key, $n) {
                    $tx->watch($key);
                    $tx->multi();
                    $tx->set($key, $n);
            });
        }
        
        $sql_nbLiked = "SELECT p.author_id as author_id, count(*) as times_loved
                        FROM Likes l 
                        INNER JOIN Posts p ON p.id = l.postId 
                        WHERE l.like_type = 'love' 
                        GROUP BY p.author_id";
        $array = $this->dbConnection->fetchAll($sql_nbLiked);
        foreach ($array as $obj) {
            $userId = $obj['author_id'];
            $n = $obj['times_loved'];
            $key = CacheDAO::USER_STAT_NBLOVED_PREFIX . $userId;
            $this->redis->multiExec($options, function($tx)
                use($key, $n) {
                    $tx->watch($key);
                    $tx->multi();
                    $tx->set($key, $n);
            });
        }
        
        $sql_nbHated = "SELECT p.author_id as author_id, count(*) as times_hated
                        FROM Likes l 
                        INNER JOIN Posts p ON p.id = l.postId 
                        WHERE l.like_type = 'hate' 
                        GROUP BY p.author_id";
        $array = $this->dbConnection->fetchAll($sql_nbHated);
        foreach ($array as $obj) {
            $userId = $obj['author_id'];
            $n = $obj['times_hated'];
            $key = CacheDAO::USER_STAT_NBHATED_PREFIX . $userId;
            $this->redis->multiExec($options, function($tx)
                use($key, $n) {
                    $tx->watch($key);
                    $tx->multi();
                    $tx->set($key, $n);
            });
        }
        
        $sql_nbHmmmed = "SELECT p.author_id as author_id, count(*) as times_hmmmed
                        FROM Likes l 
                        INNER JOIN Posts p ON p.id = l.postId 
                        WHERE l.like_type = 'hmm' 
                        GROUP BY p.author_id";
        $array = $this->dbConnection->fetchAll($sql_nbHmmmed);
        foreach ($array as $obj) {
            $userId = $obj['author_id'];
            $n = $obj['times_hmmmed'];
            $key = CacheDAO::USER_STAT_NBHMMMED_PREFIX . $userId;
            $this->redis->multiExec($options, function($tx)
                use($key, $n) {
                    $tx->watch($key);
                    $tx->multi();
                    $tx->set($key, $n);
            });
        }
    }

    public function cache_getOlogyStats($ologyId) {
        $nbMembers = $this->redis->get(CacheDAO::OLOGY_STAT_MEMBERS_PREFIX . $ologyId);
        $nbPosts = $this->redis->get(CacheDAO::OLOGY_STAT_POSTS_PREFIX . $ologyId);
        $nbComments = $this->redis->get(CacheDAO::OLOGY_STAT_COMMENTS_PREFIX . $ologyId);

        if ($nbMembers == NULL)
            $nbMembers = 0;
        if ($nbPosts == NULL)
            $nbPosts = 0;
        if ($nbComments == NULL)
            $nbComments = 0;

        return new OlogyStats($ologyId, $nbMembers, $nbPosts, $nbComments);
    }

    public function cache_getUserStats($userId) {
        $nbPosts = $this->redis->get(CacheDAO::USER_STAT_POSTS_PREFIX . $userId);
        $nbComments = $this->redis->get(CacheDAO::USER_STAT_COMMENTS_PREFIX . $userId);
        $nbCommentsForAllPosts = $this->redis->get(CacheDAO::USER_STAT_NBCOMMENTS_FOR_ALL_POSTS_PREFIX . $userId);
        $nbReologize = $this->redis->get(CacheDAO::USER_STAT_REOLOGIZE_PREFIX . $userId);
        $nbReologized = $this->redis->get(CacheDAO::USER_STAT_REOLOGIZED_PREFIX . $userId);
        $nbLoved = $this->redis->get(CacheDAO::USER_STAT_NBLOVED_PREFIX . $userId);
        $nbHated = $this->redis->get(CacheDAO::USER_STAT_NBHATED_PREFIX . $userId);
        $nbHmmmed = $this->redis->get(CacheDAO::USER_STAT_NBHMMMED_PREFIX . $userId);
        
        if ($nbPosts == NULL)
            $nbPosts = 0;
        if ($nbComments == NULL)
            $nbComments = 0;
        if ($nbCommentsForAllPosts == NULL)
            $nbCommentsForAllPosts = 0;
        if ($nbReologize == NULL)
            $nbReologize = 0;
        if ($nbReologized == NULL)
            $nbReologized = 0;
        if ($nbLoved == NULL)
            $nbLoved = 0;
        if ($nbHated == NULL)
            $nbHated = 0;
        if ($nbHmmmed == NULL)
            $nbHmmmed = 0;
        return new UserStats($nbPosts, $nbComments, $nbReologize, $nbReologized, $nbLoved, $nbHated, $nbHmmmed, $nbCommentsForAllPosts);
    }
    
    public function cache_getTopOlogies() {
        $ologies = array();
        for ($i = 1; $i <= 5; $i++) {
            $ologies[] = $this->redis->get(CacheDAO::OLOGY_TOP_PREFIX . $i);
        }
        
        return $ologies;
    }

    public function cache_post_setSubscribedUserForPost($userId, $postId) {
        $key = CacheDAO::POST_SUBSCRIBE_PREFIX . $postId;
        $value = $userId . CacheDAO::SEP;
        $options = array('cas' => true, 'watch' => $key, 'retry' => 10);

        $res = $this->redis->multiExec($options, function($tx)
                        use($key, $value) {
                            $tx->watch($key);
                            $currentUsers = $tx->get($key);
                            if ($currentUsers != NULL) {
                                $pos = strrpos($currentUsers, $value);
                                if ($pos === false) {
                                    $currentUsers = $currentUsers . $value;
                                    $tx->multi();
                                    $tx->set($key, $currentUsers);
                                }
                            } else {
                                $tx->multi();
                                $tx->set($key, $value);
                            }
                        });
    }

    public function cache_post_getSubscribedUsersForPost($postId) {
        $key = CacheDAO::POST_SUBSCRIBE_PREFIX . $postId;
        $value = $postId . CacheDAO::SEP;
        $currentUsers = $this->redis->get($key);
        if ($currentUsers != NULL) {
            $currentUsers = substr($currentUsers, 0, -1);
            $ids = explode(CacheDAO::SEP, $currentUsers);
            return $ids;
        }
        return array();
    }

    public function cache_post_clearSubscribedUsersForPost($postId) {
        $key = CacheDAO::POST_SUBSCRIBE_PREFIX . $postId;
        $cmd = $this->redis->createCommand('del', array($key));
        $this->redis->executeCommand($cmd);
    }

    public function cache_post_unsubscribeUserForPost($userId, $postId) {
        $key = CacheDAO::POST_SUBSCRIBE_PREFIX . $postId;
        $value = $userId . CacheDAO::SEP;

        $options = array('cas' => true, 'watch' => $key, 'retry' => 10);

        $res = $this->redis->multiExec($options, function($tx)
                        use($key, $value) {
                            $tx->watch($key);
                            $currentUsers = $tx->get($key);
                            if ($currentUsers != NULL) {
                                $newCurrentUsers = str_replace($value, '', $currentUsers);
                                $tx->multi();
                                if (strlen($newCurrentUsers) == 0)
                                    $tx->del($key);
                                else
                                    $tx->set($key, $newCurrentUsers);
                            }
                        });
    }

    public function cache_user_set_invalidate_memberships($userId, $isInvalid) {
        $key = CacheDAO::USER_INVALIDATE_MEMBERSHIP . $userId;
        if ($isInvalid)
            $this->redis->set($key, true);
        else {
            $cmd = $this->redis->createCommand('del', array($key));
            $this->redis->executeCommand($cmd);
        }
    }

    public function cache_user_get_invalidate_memberships($userId) {
        return $this->redis->get(CacheDAO::USER_INVALIDATE_MEMBERSHIP . $userId);
    }
    
    public function cache_user_set_invalidate_subscriptions($userId, $isInvalid) {
        $key = CacheDAO::USER_INVALIDATE_SUBSCRIPTION . $userId;
        if ($isInvalid)
            $this->redis->set($key, true);
        else {
            $cmd = $this->redis->createCommand('del', array($key));
            $this->redis->executeCommand($cmd);
        }
    }

    public function cache_user_get_invalidate_subscriptions($userId) {
        return $this->redis->get(CacheDAO::USER_INVALIDATE_SUBSCRIPTION . $userId);
    }
    
    public function cache_user_set_invalidate_notifs($userId, $isInvalid) {
        $key = CacheDAO::USER_INVALIDATE_NOTIF . $userId;
        if ($isInvalid)
            $this->redis->set($key, true);
        else {
            $cmd = $this->redis->createCommand('del', array($key));
            $this->redis->executeCommand($cmd);
        }
    }

    public function cache_user_get_invalidate_notifs($userId) {
        return $this->redis->get(CacheDAO::USER_INVALIDATE_NOTIF . $userId);
    }

    public function cache_notif_get($userId) {
        $idList = $this->redis->get(CacheDAO::NOTIF_LIST_PREF . $userId);
        $notifIds = explode(CacheDAO::SEP, $idList);
        $notifs = array();
        foreach ($notifIds as $notifId) {
            if (strlen($notifId) > 0) {
                $p = CacheDAO::NOTIF_PREF . $notifId;
                $userId = $this->redis->get($p . CacheDAO::NOTIF_USERID);
                $userName = $this->redis->get($p . CacheDAO::NOTIF_USERNAME);
                $userImage = $this->redis->get($p . CacheDAO::NOTIF_USERIMG);

                $postId = $this->redis->get($p . CacheDAO::NOTIF_POSTID);
                $postTitle = $this->redis->get($p . CacheDAO::NOTIF_POSTTITLE);
                $postImage = $this->redis->get($p . CacheDAO::NOTIF_POSTIMG);
                $postSlug = $this->redis->get($p . CacheDAO::NOTIF_POSTSLUG);

                $ologyId = $this->redis->get($p . CacheDAO::NOTIF_OLOGYID);
                $ologyName = $this->redis->get($p . CacheDAO::NOTIF_OLOGYNAME);
                $ologyImage = $this->redis->get($p . CacheDAO::NOTIF_OLOGYIMG);
                $ologySlug = $this->redis->get($p . CacheDAO::NOTIF_OLOGYSLUG);
                
                $stashId = $this->redis->get($p . CacheDAO::NOTIF_STASHID);
                $stashName = $this->redis->get($p . CacheDAO::NOTIF_STASHNAME);

                $typeId = $this->redis->get($p . CacheDAO::NOTIF_TYPE);

                $notif = new Notification();
                $notif->setUserId($userId);
                $notif->setUserFirstName($userName);
                $notif->setUserImage($userImage);
                $notif->setOlogyId($ologyId);
                $notif->setOlogyName($ologyName);
                $notif->setOlogyImage($ologyImage);
                $notif->setPostId($postId);
                $notif->setPostTitle($postTitle);
                $notif->setPostImage($postImage);
                $notif->setTypeId($typeId);
                $notif->setPostSlug($postSlug);
                $notif->setOlogySlug($ologySlug);
                $notif->setStashId($stashId);
                $notif->setStashName($stashName);

                $notifs[] = $notif;
            }
        }
        return $notifs;
    }

    public function cache_notif_store($userId, $notifications) {
        $options = array('cas' => true, 'retry' => 10);
        $this->redis->multiExec($options, function($tx) use($userId, $notifications) {
                    $tx->multi();
                    $idList = "";
                    foreach ($notifications as $notification) {
                        $idList = $idList . $notification->getId() . CacheDAO::SEP;
                        $p = CacheDAO::NOTIF_PREF . $notification->getId();
                        $tx->set($p . CacheDAO::NOTIF_TYPE, $notification->getType()->getId());
                        if ($notification->getOlogy() != NULL) {
                            $tx->set($p . CacheDAO::NOTIF_OLOGYID, $notification->getOlogy()->getId());
                            $tx->set($p . CacheDAO::NOTIF_OLOGYNAME, $notification->getOlogy()->getName());
                            $tx->set($p . CacheDAO::NOTIF_OLOGYIMG, $notification->getOlogy()->getImageUrl());
                            $tx->set($p . CacheDAO::NOTIF_OLOGYSLUG, $notification->getOlogy()->getSlug());
                        }
                        if ($notification->getStash() != NULL) {
                            $tx->set($p . CacheDAO::NOTIF_STASHID, $notification->getStash()->getId());
                            $tx->set($p . CacheDAO::NOTIF_STASHNAME, $notification->getStash()->getName());
                        }
                        if ($notification->getPost() != NULL) {
                            $tx->set($p . CacheDAO::NOTIF_POSTID, $notification->getPost()->getId());
                            $tx->set($p . CacheDAO::NOTIF_POSTTITLE, $notification->getPost()->getTitle());
                            $tx->set($p . CacheDAO::NOTIF_POSTIMG, $notification->getPost()->getImageUrl());
                            $tx->set($p . CacheDAO::NOTIF_POSTSLUG, $notification->getPost()->getSlug());
                        }
                        if ($notification->getUser() != NULL) {
                            $tx->set($p . CacheDAO::NOTIF_USERID, $notification->getUser()->getId());
                            $tx->set($p . CacheDAO::NOTIF_USERNAME, $notification->getUser()->getFirstName());
                            $tx->set($p . CacheDAO::NOTIF_USERIMG, $notification->getUser()->getImageUrl());
                        }
                    }
                    $tx->set(CacheDAO::NOTIF_LIST_PREF . $userId, $idList);
                });
    }

    public function cache_user_setFbData($userId, $fbData) {
        $this->redis->set(CacheDAO::USER_FB_DATA . $userId, $fbData);
    }

    public function cache_user_getFbData($userId) {
        $fbData = $this->redis->get(CacheDAO::USER_FB_DATA . $userId);

        return $fbData;
    }
    
    public function cachePostsOlogies($userId = 0) {
        $sql = "SELECT po.post_id, po.ology_id, po.user_id, po.date_ologized
                FROM PostsOlogies po"
                . ( $userId > 0 ? " WHERE po.user_id = $userId" : "" );

        $nbRow = 0;
        $rows = $this->dbConnection->fetchAll($sql);
        foreach ($rows as $row) {
            $this->postsOlogiesCacheDAO->createPostsOlogies($row['post_id'], $row['ology_id'], $row['user_id'], $row['date_ologized']);
            $nbRow++;
        }
        
        return $nbRow;
    }
    
    public function removeAllPostsOlogies() {
        $sql = "SELECT o.id as ology_id
                FROM Ologies o";

        $nbRow = 0;
        $rows = $this->dbConnection->fetchAll($sql);
        foreach ($rows as $row) {
            $this->postsOlogiesCacheDAO->deletePostsOlogiesOfOlogy($row['ology_id']);
            $nbRow++;
        }
        
        return $nbRow;
    }
    
    public function cachePostsStashes($userId = 0) {
        $sql = "SELECT ps.post_id, ps.stash_id, ps.date_stashed
                FROM PostsStashes ps"
                . ( $userId > 0 ? " INNER JOIN Stashes s WHERE s.id = ps.stash_id AND s.founder_id = $userId" : "" );

        $nbRow = 0;
        $rows = $this->dbConnection->fetchAll($sql);
        foreach ($rows as $row) {
            $this->postsStashesCacheDAO->createPostStash($row['post_id'], $row['stash_id'], $row['date_stashed']);
            $nbRow++;
        }
        
        return $nbRow;
    }
    
    public function cachePostsChannels($offset = 0, $max = 0, $userId = 0) {
        $sql = "SELECT pc.post_id, pc.channel_id, p.creation_date
                FROM PostsChannels pc
                INNER JOIN Posts p
                WHERE p.id = pc.post_id"
                . ( $userId > 0 ? " AND p.author_id = $userId" : "" )
                . ( ( $offset + $max > 0 ) ? " LIMIT $max OFFSET $offset" : "" );

        $nbRow = 0;
        $rows = $this->dbConnection->fetchAll($sql);
        foreach ($rows as $row) {
            $this->postsChannelsCacheDAO->createPostChannel($row['post_id'], $row['channel_id'], $row['creation_date']);
            $nbRow++;
        }
        
        return $nbRow;
    }
    
    // TODO can be better : call directly DEL with all keys
    public function removeAllUserCached() {
        $sql = "SELECT u.id as user_id
                FROM Users u";

        $nbRemovedUser = 0;
        $rows = $this->dbConnection->fetchAll($sql);
        foreach ($rows as $row) {
            $nbRemovedUser += $this->userCacheDAO->deleteUser($row['user_id']);
        }
        
        return $nbRemovedUser;
    }
    
    public function cacheUsersLikes() {
        $sql = "SELECT l.postId, l.author_id, l.like_type, l.date_like
                FROM Likes l";
        
        $nbCreatedLikes = 0;
        $rows = $this->dbConnection->fetchAll($sql);
        foreach ($rows as $row) {
            // Save in parallele in REDIS if user likes it
            $nbCreatedLikes += $this->likesCacheDAO->createLike($row['author_id'], $row['postId'], $row['like_type'], $row['date_like']);
        }
        
        return $nbCreatedLikes;
    }
}