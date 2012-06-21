<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\Expr\Join;
use Ology\SocialBundle\Entity\Invite;
use Ology\SocialBundle\Entity\InviteStats;
use Ology\SocialBundle\Entity\InviteType;
use Ology\SocialBundle\Entity\OlogyStats;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\Stats;
use Predis\Client;

class StatsDAO {
    protected $em;
    protected $redis;
    protected $dbConnection;

    function __construct(EntityManager $em, Client $redis, $dbConnection) {
        $this->em = $em;
        $this->redis = $redis;
        $this->dbConnection = $dbConnection;
    }
    
    public function getGeneralStats() {
        $array = $this->dbConnection->fetchAll("SELECT COUNT(*) as n FROM Users");
        $nbUsers = $array[0]['n'];
        
        $array = $this->dbConnection->fetchAll("SELECT COUNT(*) as n FROM Ologies");
        $nbOlogies = $array[0]['n'];
        
        $array = $this->dbConnection->fetchAll("SELECT COUNT(*) as n FROM Posts");
        $nbPosts = $array[0]['n'];
        
        $array = $this->dbConnection->fetchAll("SELECT COUNT(*) as n FROM Comments");
        $nbComments = $array[0]['n'];
        
        $stats = new Stats();
        $stats->setNbUsers($nbUsers);
        $stats->setNbOlogies($nbOlogies);
        $stats->setNbPosts($nbPosts);
        $stats->setNbComments($nbComments);
        
        return $stats;
    }
    
    public function getInviteStatsPerOlogy() {
        $invites = $this->em->getRepository('OlogySocialBundle:Invite')->findAll();
        
        $stats = new InviteStats();
        foreach ($invites as $invite) {
            $stats->incNbTotal(1);
            $timesAcpt = $invite->getTimesAccepted();
            
            if ($timesAcpt > 0) {
                $stats->incNbInvites(($invite->getType()->getId() == InviteType::GENERAL) ? InviteType::S_GENERAL : $invite->getOlogy()->getId(),
                    $timesAcpt,
                    true);
                $stats->incNbAccepted($timesAcpt);
            } else {
                $stats->incNbInvites(($invite->getType()->getId() == InviteType::GENERAL) ? InviteType::S_GENERAL : $invite->getOlogy()->getId(),
                    1,
                    false);
                $stats->incNbPending(1);
            }
            
            if ($invite->getType()->getId() != InviteType::GENERAL) {
                $stats->addOlogy($invite->getOlogy());
            }
        }
        return $stats;
    }
    
    public function getInviteStatsPerUser($n) {
        $query = $this->em->createQueryBuilder()
                    ->add('select', 'i, count(i) as total')
                    ->from('OlogySocialBundle:Invite', 'i')
                    ->groupBy('i.fromUser')
                    ->orderBy('total', 'DESC')
                    ->getQuery();
        $query->setMaxResults($n);
        $array = $query->getResult();
        
        $query_accepted = $this->em->createQueryBuilder()
                    ->add('select', 'i, sum(i.timesAccepted) as accepted')
                    ->from('OlogySocialBundle:Invite', 'i')
                    ->where('i.timesAccepted > 0')
                    ->groupBy('i.fromUser')
                    ->orderBy('accepted', 'DESC')
                    ->getQuery();
        $query_accepted->setMaxResults($n);
        $array_accepted = $query_accepted->getResult();
        
        foreach ($array as &$all) {
            $all['accepted'] = 0;
            $all['pending'] = $all['total'];
            foreach ($array_accepted as $accepted) {
                $invite = $all[0];
                $id = $invite->getFromUser()->getId();
                
                $currentInvite = $accepted[0];
                $currentId = $currentInvite->getFromUser()->getId();
                if ($id == $currentId) {
                    $all['accepted'] = $accepted['accepted'];
                    $all['pending'] = $all['total'] - $all['accepted'];
                }
            }
        }
        
        return $array;
    }

    public function getNotifsStats() {
        $res = array();
        $res['com_on_post'] = 0;
        $res['comment_on_comment'] = 0;
        $res['join'] = 0;
        $res['post'] = 0;
        $res['all'] = 0;
        
        $users = $this->em->getRepository('OlogySocialBundle:User')->findAll();
        $total = 0;
        foreach ($users as $user) {
            $total++;
            if ($user->getAcceptsNotifNewMember())
                $res['join']++;
            if ($user->getAcceptsNotifNewPost())
                $res['post']++;
            if ($user->getAcceptsNotifNewCommentOwnPost())
                $res['com_on_post']++;
            if ($user->getAcceptsNotifNewCommentOtherPost())
                $res['comment_on_comment']++;
            
            if ($user->getAcceptsNotifNewMember() &&
                    $user->getAcceptsNotifNewPost() &&
                    $user->getAcceptsNotifNewCommentOwnPost() &&
                    $user->getAcceptsNotifNewCommentOtherPost())
                $res['all']++;
        }
        $res['total'] = $total;
        return $res;
    }
    
    public function getAllUsersStats($n) {
        // All Users
        $res = array();
        $array = $this->dbConnection->fetchAll("SELECT id, first_name, last_name, email, create_date, last_login, mail_new_member, mail_new_post, mail_new_com_own_post, mail_new_com_oth_post FROM Users ORDER BY create_date DESC LIMIT $n");
        foreach ($array as $obj) {
            $id = intval($obj['id']);
            $res[$id] = array();
            $res[$id]['id'] = $obj['id'];
            $res[$id]['first_name'] = $obj['first_name'];
            $res[$id]['last_name'] = $obj['last_name'];
            $res[$id]['email'] = $obj['email'];
            $res[$id]['create_date'] = $obj['create_date'];
            $res[$id]['last_login'] = $obj['last_login'];
            $res[$id]['mail_new_member'] = $obj['mail_new_member'];
            $res[$id]['mail_new_post'] = $obj['mail_new_post'];
            $res[$id]['mail_new_com_own_post'] = $obj['mail_new_com_own_post'];
            $res[$id]['mail_new_com_oth_post'] = $obj['mail_new_com_oth_post'];
            $res[$id]['nb_posts'] = 0;
            $res[$id]['nb_comments'] = 0;
        }
        
        $array = $this->dbConnection->fetchAll("SELECT p.author_id as id, COUNT(*) as n FROM Posts p GROUP BY p.author_id");
        foreach ($array as $obj) {
            $id = intval($obj['id']);
            if (array_key_exists($id, $res))
                $res[$id]['nb_posts'] = $obj['n'];
        }
        
        $array = $this->dbConnection->fetchAll("SELECT c.author_id as id, COUNT(*) as n FROM Comments c GROUP BY c.author_id");
        foreach ($array as $obj) {
            $id = intval($obj['id']);
            if (array_key_exists($id, $res))
                $res[$id]['nb_comments'] = $obj['n'];
        }
        
        return $res;
    }
    
    public function getUsersStats($n) {
        $res = array();
        
        // Ologies created
        $nbOlogiesA = $this->em->createQueryBuilder()
                            ->add('select', 'count(o) as n')
                            ->from('OlogySocialBundle:Ology', 'o')
                            ->getQuery()
                            ->getResult();
        $nbOlogies = intval($nbOlogiesA[0]['n']);
        $nbUsersA = $this->em->createQueryBuilder()
                            ->add('select', 'count(u) as n')
                            ->from('OlogySocialBundle:User', 'u')
                            ->getQuery()
                            ->getResult();
        $nbUsers = intval($nbUsersA[0]['n']);
        $res['avg_ology_created_per_user'] = $nbOlogies / $nbUsers;
        
        // Ologies joined
        $nbMemberships = 0;
        $array = $this->dbConnection->fetchAll("SELECT m.user_id as user_id, COUNT(*) as nbOlogies FROM Memberships m GROUP BY m.user_id");
        foreach ($array as $obj) {
            $nbMemberships += intval($obj['nbOlogies']);
        }
        $res['avg_ology_joined_per_user'] = $nbMemberships / $nbUsers;
        
        // last logins DATEDIFF(last_login, DATE(FROM_UNIXTIME(create_date)))
        $res['nb_users_login_last_week'] = 0;
        $array = $this->dbConnection->fetchAll("SELECT count(*) as n, id, last_login FROM Users WHERE last_login IS NOT NULL AND DATEDIFF(NOW(), last_login) < 7");
        foreach ($array as $obj) {
            $res['nb_users_login_last_week'] = intval($obj['n']);
        }
        
        $res['nb_users_login_last_month'] = 0;
        $array = $this->dbConnection->fetchAll("SELECT count(*) as n, id, last_login FROM Users WHERE last_login IS NOT NULL AND DATEDIFF(NOW(), last_login) < 30");
        foreach ($array as $obj) {
            $res['nb_users_login_last_month'] = intval($obj['n']);
        }
        
        $res['nb_users_login_last_year'] = 0;
        $array = $this->dbConnection->fetchAll("SELECT count(*) as n, id, last_login FROM Users WHERE last_login IS NOT NULL AND DATEDIFF(NOW(), last_login) < 365");
        foreach ($array as $obj) {
            $res['nb_users_login_last_year'] = intval($obj['n']);
        }
        
        // Posts
        $postsA = $this->em->createQueryBuilder()
                            ->add('select', 'p, count(p) as n')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->groupBy('p.author')
                            ->orderBy('n', 'DESC')
                            ->getQuery()
                            ->setMaxResults($n)
                            ->getResult();
        $res['best_posters'] = $postsA;
        
        // Comments
        $commentsA = $this->em->createQueryBuilder()
                            ->add('select', 'c, count(c) as n')
                            ->from('OlogySocialBundle:Comment', 'c')
                            ->groupBy('c.author')
                            ->orderBy('n', 'DESC')
                            ->getQuery()
                            ->setMaxResults($n)
                            ->getResult();
        $res['best_commenters'] = $commentsA;
        
        // Ologies joined
        $membershipsA = $this->em->createQueryBuilder()
                            ->add('select', 'm, count(m) as n')
                            ->from('OlogySocialBundle:Membership', 'm')
                            ->groupBy('m.user')
                            ->orderBy('n', 'DESC')
                            ->getQuery()
                            ->setMaxResults($n)
                            ->getResult();
        $res['best_joiners'] = $membershipsA;
        
        // Ologies founded 
        $ologiesA = $this->em->createQueryBuilder()
                            ->add('select', 'o, count(o) as n')
                            ->from('OlogySocialBundle:Ology', 'o')
                            ->groupBy('o.founder')
                            ->orderBy('n', 'DESC')
                            ->getQuery()
                            ->setMaxResults($n)
                            ->getResult();
        $res['best_founders'] = $ologiesA;
        
        return $res;
    }
    
    public function getOlogiesStats($n, $withOlogies = false) {
        $sql_nbMembers = "SELECT m.ology_id as id, COUNT(*) as n 
                          FROM Memberships m
                          GROUP BY m.ology_id";
        $array = $this->dbConnection->fetchAll($sql_nbMembers);
        $ologiesByMembers = array();
        foreach ($array as $obj) {
            $ologyId = $obj['id'];
            $nbMember = $obj['n'];
            $ologiesByMembers[$ologyId] = $nbMember;
        }

        $sql_nbPosts = "SELECT po.ology_id AS id, COUNT(*) AS nbpost
                        FROM PostsOlogies po
                        INNER JOIN Posts p ON p.id = po.post_id
                        GROUP BY po.ology_id";
        $array = $this->dbConnection->fetchAll($sql_nbPosts);
        $ologiesByPosts = array();
        foreach ($array as $obj) {
            $ologyId = $obj['id'];
            $nbPosts = $obj['nbpost'];
            $ologiesByPosts[$ologyId] = $nbPosts;
        }
        
        $sql_nbComments = "SELECT po.ology_id AS ologyid, SUM(p.times_commented) AS nbcomments
                            FROM PostsOlogies po
                            INNER JOIN Posts p ON p.id = po.post_id
                            INNER JOIN Ologies o ON o.id = po.ology_id
                            GROUP BY ologyid";
        $array = $this->dbConnection->fetchAll($sql_nbComments);
        $ologiesByComments = array();
        foreach ($array as $obj) {
            $ologyId = $obj['ologyid'];
            $nbComments = $obj['nbcomments'];
            $ologiesByComments[$ologyId] = $nbComments;
        }
        
        arsort($ologiesByMembers);
        arsort($ologiesByPosts);
        arsort($ologiesByComments);
        $res = array();
        
        $ologiesStatsByMember = array();
        $i = 0;
        foreach($ologiesByMembers as $ologyId => $nbMembers) {
            if ($i++ == $n)
                break;
            $nbPosts = array_key_exists($ologyId, $ologiesByPosts) ? $ologiesByPosts[$ologyId] : 0;
            $nbComments = array_key_exists($ologyId, $ologiesByComments) ? $ologiesByComments[$ologyId] : 0;
            $stat = new OlogyStats($ologyId, $nbMembers, $nbPosts, $nbComments);
            if ($withOlogies)
                $stat->setOlogy($this->em->getRepository('OlogySocialBundle:Ology')->find($ologyId));
            $ologiesStatsByMember[$ologyId] = $stat;
        }
        $res['users'] = $ologiesStatsByMember;
        
        $ologiesStatsByPosts = array();
        $i = 0;
        foreach($ologiesByPosts as $ologyId => $nbPosts) {
            if ($i++ == $n)
                break;
            $nbMembers = array_key_exists($ologyId, $ologiesByMembers) ? $ologiesByMembers[$ologyId] : 0;
            $nbComments = array_key_exists($ologyId, $ologiesByComments) ? $ologiesByComments[$ologyId] : 0;
            $stat = new OlogyStats($ologyId, $nbMembers, $nbPosts, $nbComments);
            if ($withOlogies)
                $stat->setOlogy($this->em->getRepository('OlogySocialBundle:Ology')->find($ologyId));
            $ologiesStatsByPosts[$ologyId] = $stat;
        }
        $res['posts'] = $ologiesStatsByPosts;
        
        $ologiesStatsByComments = array();
        $i = 0;
        foreach($ologiesByComments as $ologyId => $nbComments) {
            if ($i++ == $n)
                break;
            $nbMembers = array_key_exists($ologyId, $ologiesByMembers) ? $ologiesByMembers[$ologyId] : 0;
            $nbPosts = array_key_exists($ologyId, $ologiesByPosts) ? $ologiesByPosts[$ologyId] : 0;
            $stat = new OlogyStats($ologyId, $nbMembers, $nbPosts, $nbComments);
            if ($withOlogies)
                $stat->setOlogy($this->em->getRepository('OlogySocialBundle:Ology')->find($ologyId));
            $ologiesStatsByComments[$ologyId] = $stat;
        }
        $res['comments'] = $ologiesStatsByComments;
 
        return $res;
    }
    
    public function getPostsStats() {
        $res = array();
        
        $postTypeText = $this->em->getReference('OlogySocialBundle:PostType', PostType::TEXT);
        $postTypeImage = $this->em->getReference('OlogySocialBundle:PostType', PostType::IMAGE);
        $postTypeVideo = $this->em->getReference('OlogySocialBundle:PostType', PostType::VIDEO);
        $postTypeAudio = $this->em->getReference('OlogySocialBundle:PostType', PostType::AUDIO);
        
        $res['general'] = array();
        $res['general']['text'] = $this->getNbPostByType($postTypeText);
        $res['general']['image'] = $this->getNbPostByType($postTypeImage);
        $res['general']['video'] = $this->getNbPostByType($postTypeVideo);
        $res['general']['audio'] = $this->getNbPostByType($postTypeAudio);
        $res['general']['total'] = $res['general']['text'] +
                                    $res['general']['image'] +
                                    $res['general']['video'] +
                                    $res['general']['audio'];
        
        $res['general']['textpercent'] = $res['general']['text'] * 100 / $res['general']['total'];
        $res['general']['imagepercent'] = $res['general']['image'] * 100 / $res['general']['total'];
        $res['general']['audiopercent'] = $res['general']['audio'] * 100 / $res['general']['total'];
        $res['general']['videopercent'] = $res['general']['video'] * 100 / $res['general']['total'];
        
        // By categories
        $res['general']['labels'] = array();
        $labels = $this->em->getRepository('OlogySocialBundle:Label')->findAll();
        foreach ($labels as $label) {
            $res['labels'][$label->getName()] = array();
            $res['labels'][$label->getName()]['audio'] = $this->getNbPostByTypeAndLabel($postTypeAudio, $label);
            $res['labels'][$label->getName()]['text'] = $this->getNbPostByTypeAndLabel($postTypeText, $label);
            $res['labels'][$label->getName()]['image'] = $this->getNbPostByTypeAndLabel($postTypeImage, $label);
            $res['labels'][$label->getName()]['video'] = $this->getNbPostByTypeAndLabel($postTypeVideo, $label);

            $res['labels'][$label->getName()]['total'] = $res['labels'][$label->getName()]['audio'] +
                                                $res['labels'][$label->getName()]['text'] +
                                                $res['labels'][$label->getName()]['image'] +
                                                $res['labels'][$label->getName()]['video'];
            $res['labels'][$label->getName()]['textpercent'] = $res['labels'][$label->getName()]['text'] * 100 / $res['labels'][$label->getName()]['total'];
            $res['labels'][$label->getName()]['audiopercent'] = $res['labels'][$label->getName()]['audio'] * 100 / $res['labels'][$label->getName()]['total'];
            $res['labels'][$label->getName()]['videopercent'] = $res['labels'][$label->getName()]['video'] * 100 / $res['labels'][$label->getName()]['total'];
            $res['labels'][$label->getName()]['imagepercent'] = $res['labels'][$label->getName()]['image'] * 100 / $res['labels'][$label->getName()]['total'];
        }
        
        // Popular posts
        $res['posts'] = $this->em->createQueryBuilder()
                            ->add('select', 'p')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->orderby('p.timesCommented', 'DESC')
                            ->getQuery()
                            ->setMaxResults(10)
                            ->getResult();
        
        
        return $res;
    }
    
    private function getNbPostByType($type) {
        $nbPostGeneralA = $this->em->createQueryBuilder()
                            ->add('select', 'p, count(p) as n')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->where('p.postType = ?1')
                            ->getQuery()
                            ->setParameter(1, $type)
                            ->getResult();
        
        return intval($nbPostGeneralA[0]['n']);
    }
    
    public function getPostsStatsForOlogy($ologyId) {
        $res = array();
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        $res['text'] = $this->getNbPostByTypeAndOlogy($this->em->getReference('OlogySocialBundle:PostType', PostType::TEXT), $ology);
        $res['image'] = $this->getNbPostByTypeAndOlogy($this->em->getReference('OlogySocialBundle:PostType', PostType::IMAGE), $ology);
        $res['video'] = $this->getNbPostByTypeAndOlogy($this->em->getReference('OlogySocialBundle:PostType', PostType::VIDEO), $ology);
        $res['audio'] = $this->getNbPostByTypeAndOlogy($this->em->getReference('OlogySocialBundle:PostType', PostType::AUDIO), $ology);
        
        $res['total'] = $res['text'] + $res['image'] + $res['video'] + $res['audio'];
        $res['textpercent'] = $res['text'] * 100 / $res['total'];
        $res['imagepercent'] = $res['image'] * 100 / $res['total'];
        $res['videopercent'] = $res['video'] * 100 / $res['total'];
        $res['audiopercent'] = $res['audio'] * 100 / $res['total'];
        return $res;
    }
    
    public function getAverageCommentsNbForOlogy($ologyId) {
        $res = array();
        $ology = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
        
        $nbPostsA = $this->em->createQueryBuilder()
                        ->add('select', 'p, count(p) as n')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->where('p.firstOlogy = ?1')
                        ->getQuery()
                        ->setParameter(1, $ology)
                        ->getResult();
        $nbPosts = (count($nbPostsA) <= 0) ? 0 : intval($nbPostsA[0]['n']);
        
        $nbCommentsA = $this->em->createQueryBuilder()
                            ->add('select', 'sum(p.timesCommented) as n')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->where('p.firstOlogy = ?1')
                            ->groupBy('p.firstOlogy')
                            ->getQuery()
                            ->setParameter(1, $ology)
                            ->getResult();
        
        $nbComments = (count($nbCommentsA) <= 0) ? 0 : intval($nbCommentsA[0]['n']);

        $average = ($nbPosts != 0) ? ($nbComments / $nbPosts) : 0;
        
        return $average;
    }
    
    public function getCommentsStats() {
        $res = array();
        
        $res['general'] = array();
        $res['general']['text'] = $this->getNbCommentsByType($this->em->getReference('OlogySocialBundle:PostType', PostType::TEXT));
        $res['general']['image'] = $this->getNbCommentsByType($this->em->getReference('OlogySocialBundle:PostType', PostType::IMAGE));
        $res['general']['audio'] = $this->getNbCommentsByType($this->em->getReference('OlogySocialBundle:PostType', PostType::AUDIO));
        $res['general']['video'] = $this->getNbCommentsByType($this->em->getReference('OlogySocialBundle:PostType', PostType::VIDEO));
     
        $res['labels'] = array();
        $labels = $this->em->getRepository('OlogySocialBundle:Label')->findAll();
        foreach ($labels as $label) {
            $res['labels'][$label->getName()] = array();
            $res['labels'][$label->getName()]['text'] = $this->getNbCommentsByTypeAndLabel($this->em->getReference('OlogySocialBundle:PostType', PostType::TEXT), $label);
            $res['labels'][$label->getName()]['image'] = $this->getNbCommentsByTypeAndLabel($this->em->getReference('OlogySocialBundle:PostType', PostType::IMAGE), $label);
            $res['labels'][$label->getName()]['audio'] = $this->getNbCommentsByTypeAndLabel($this->em->getReference('OlogySocialBundle:PostType', PostType::AUDIO), $label);
            $res['labels'][$label->getName()]['video'] = $this->getNbCommentsByTypeAndLabel($this->em->getReference('OlogySocialBundle:PostType', PostType::VIDEO), $label);
        }
        return $res;
    }
    
    private function getNbCommentsByType($type) {
        $nbPostsA = $this->em->createQueryBuilder()
                    ->add('select', 'p, count(p) as n')
                    ->from('OlogySocialBundle:Post', 'p')
                    ->where('p.postType = ?1')
                    ->groupBy('p.postType')
                    ->getQuery()
                    ->setParameter(1, $type)
                    ->getResult();
        $nbPosts = (count($nbPostsA) <= 0) ? 0 : intval($nbPostsA[0]['n']);
        
        $nbCommentsA = $this->em->createQueryBuilder()
                            ->add('select', 'sum(p.timesCommented) as n')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->where('p.postType = ?1')
                            ->groupBy('p.postType')
                            ->getQuery()
                            ->setParameter(1, $type)
                            ->getResult();
        
        $nbComments = (count($nbCommentsA) <= 0) ? 0 : intval($nbCommentsA[0]['n']);

        $average = ($nbPosts != 0) ? ($nbComments / $nbPosts) : 0;
        return array('total' => $nbPosts, 'average' => $average);
    }
    
    private function getNbCommentsByTypeAndLabel($type, $label) {
        $nbPostsA = $this->em->createQueryBuilder()
                    ->add('select', 'p, count(p) as n')
                    ->from('OlogySocialBundle:Post', 'p')
                    ->innerJoin('p.ologyposts', 'op')
                    ->innerJoin('op.ology', 'o')
                    ->innerJoin('o.ologylabels', 'ol')
                    ->where('p.postType = ?1')
                    ->andWhere('ol.label = ?2')
                    ->groupBy('p.postType')
                    ->getQuery()
                    ->setParameter(1, $type)
                    ->setParameter(2, $label)
                    ->getResult();
        $nbPosts = (count($nbPostsA) <= 0) ? 0 : intval($nbPostsA[0]['n']);
        
        $nbCommentsA = $this->em->createQueryBuilder()
                            ->add('select', 'sum(p.timesCommented) as n')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->innerJoin('p.ologyposts', 'op')
                            ->innerJoin('op.ology', 'o')
                            ->innerJoin('o.ologylabels', 'ol')
                            ->where('p.postType = ?1')
                            ->andWhere('ol.label = ?2')
                            ->groupBy('p.postType')
                            ->getQuery()
                            ->setParameter(1, $type)
                            ->setParameter(2, $label)
                            ->getResult();
        
        $nbComments = (count($nbCommentsA) <= 0) ? 0 : intval($nbCommentsA[0]['n']);

        $average = ($nbPosts != 0) ? ($nbComments / $nbPosts) : 0;
        return array('total' => $nbPosts, 'average' => $average);
    }
    
    private function getNbPostByTypeAndOlogy($type, $ology) {
        $nbPostA = $this->em->createQueryBuilder()
                            ->add('select', 'p, count(p) as n')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->where('p.firstOlogy = ?1')
                            ->andWhere('p.postType = ?2')
                            ->getQuery()
                            ->setParameter(1, $ology)
                            ->setParameter(2, $type)
                            ->getResult();
        
        return intval($nbPostA[0]['n']);
    }
    
    private function getNbPostByTypeAndLabel($type, $label) {
        $nbPostLabelA = $this->em->createQueryBuilder()
                            ->add('select', 'p, count(p) as n')
                            ->from('OlogySocialBundle:Post', 'p')
                            ->innerJoin('p.ologyposts', 'op')
                            ->innerJoin('op.ology', 'o')
                            ->innerJoin('o.ologylabels', 'ol')
                            ->where('p.postType = ?1')
                            ->andWhere('ol.label = ?2')
                            ->getQuery()
                            ->setParameter(1, $type)
                            ->setParameter(2, $label)
                            ->getResult();
        
        return intval($nbPostLabelA[0]['n']);
    }
    
    public function getLabelsStats() {
        $res = array();
        
        $res['ologies'] = array();
        $ologies = $this->em->getRepository('OlogySocialBundle:Ology')->findAll();
        foreach ($ologies as $ology) {
            $ologyLabels = $ology->getOlogylabels();
            foreach ($ologyLabels as $ologyLabel) {
                if (!array_key_exists($ologyLabel->getLabel()->getName(), $res['ologies']))
                    $res['ologies'][$ologyLabel->getLabel()->getName()] = 1;
                else
                    $res['ologies'][$ologyLabel->getLabel()->getName()]++;
            }
        }
        
        $res['posts'] = array();
        $posts = $this->em->getRepository('OlogySocialBundle:Post')->findAll();
        foreach ($posts as $post) {
            $ologyLabels = $post->getFirstOlogy()->getOlogylabels();
            foreach ($ologyLabels as $ologyLabel) {
                if (!array_key_exists($ologyLabel->getLabel()->getName(), $res['posts']))
                    $res['posts'][$ologyLabel->getLabel()->getName()] = 1;
                else
                    $res['posts'][$ologyLabel->getLabel()->getName()]++;
            }
        }
        
        return $res;
    }
    
    public function getOlogiesWithMostPostsByLabel($label, $n) {
        $sqlRes = $this->em->createQueryBuilder()
                            ->add('select', 'o, count(p) as n')
                            ->from('OlogySocialBundle:Ology', 'o')
                            ->innerJoin('o.ologyposts', 'op')
                            ->innerJoin('op.post', 'p')
                            ->innerJoin('o.ologylabels', 'ol')
                            ->where('ol.label = ?1')
                            ->orderBy('n', 'DESC')
                            ->groupBy('o.id')
                            ->getQuery()
                            ->setParameter(1, $label)
                            ->setMaxResults($n)
                            ->getResult();
        $ologies = array();
        foreach ($sqlRes as $row) {
            $ologies[] = $row[0];
        }
        
        return $ologies;
    }
}

?>
