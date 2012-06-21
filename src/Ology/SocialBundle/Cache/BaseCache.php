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

class BaseCache {
    const RP_PREFIX = "rp_";
    const RP_PRO_PREFIX = "rpp_";
    const PC_PREFIX = "pc_"; // PostChannel
    const SPLASH_PREFIX = "splash_";
    const OLOGY_PREFIX = "o_";
    const OLOGY_NAME_SUFFIX = ".name";
    const OLOGY_IMG_SUFFIX = ".img";
    
    protected $em;
    protected $redis;
    protected $dbConnection;
    
    function __construct(EntityManager $em, Client $redis, $dbConnection) {
        $this->em = $em;
        $this->redis = $redis;
        $this->dbConnection = $dbConnection;
    }
    
    public function cachePost($id) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Ology\SocialBundle\Entity\Post', 'p');
        $rsm->addFieldResult('p', 'id', 'id');
        $rsm->addFieldResult('p', 'summary', 'summary');
        $rsm->addFieldResult('p', 'is_pro', 'isProfessional');
        $rsm->addFieldResult('p', 'audio_url', 'audioUrl');
        $rsm->addFieldResult('p', 'image_url', 'imageUrl');
        $rsm->addFieldResult('p', 'slug', 'slug');
        $rsm->addFieldResult('p', 'text_content', 'textContent');
        $rsm->addFieldResult('p', 'creation_date', 'creationDate');
        $rsm->addFieldResult('p', 'video_url', 'videoUrl');
        $rsm->addFieldResult('p', 'title', 'title');
        $rsm->addFieldResult('p', 'html_title', 'htmlTitle');
        $rsm->addFieldResult('p', 'times_loved', 'timesLoved');
        $rsm->addFieldResult('p', 'times_hated', 'timesHated');
        $rsm->addFieldResult('p', 'times_hmm', 'timesHmm');
        $rsm->addFieldResult('p', 'times_commented', 'timesCommented');
        $rsm->addFieldResult('p', 'is_draft', 'isDraft');
        
        $rsm->addJoinedEntityResult('Ology\SocialBundle\Entity\User', 'u', 'p', 'author');
        $rsm->addFieldResult('u', 'user_id', 'id');
        $rsm->addFieldResult('u', 'user_fn', 'firstName');
        $rsm->addFieldResult('u', 'user_ln', 'lastName');
        $rsm->addFieldResult('u', 'user_img', 'imageUrl');
        $rsm->addFieldResult('u', 'user_title', 'editorTitle');
        $rsm->addJoinedEntityResult('Ology\SocialBundle\Entity\Ology', 'o', 'p', 'firstOlogy');
        $rsm->addFieldResult('o', 'ology_id', 'id');
        $rsm->addFieldResult('o', 'ology_name', 'name');
        $rsm->addFieldResult('o', 'ology_slug', 'slug');
        $rsm->addJoinedEntityResult('Ology\SocialBundle\Entity\PostType', 'pt', 'p', 'postType');
        $rsm->addFieldResult('pt', 'post_type_id', 'id');

        $sql_nbPosts = "SELECT p.id, 
                            p.is_pro, p.image_url, 
                            p.html_title, p.title,
                            p.audio_url, p.slug,
                            p.text_content, p.creation_date,
                            p.summary, p.video_url, p.times_commented,
                            p.times_loved, p.times_hated, p.times_hmm,
                            p.is_draft,
                            o.id as ology_id, o.name as ology_name, o.slug as ology_slug,
                            u.id as user_id, u.first_name as user_fn, u.last_name as user_ln,
                            u.image_url as user_img, u.editor_title as user_title,
                            pt.id as post_type_id
                        FROM Posts p
                        INNER JOIN Ologies o ON o.id = p.first_ology_id
                        INNER JOIN Users u ON u.id = p.author_id
                        INNER JOIN PostTypes pt ON pt.id = p.post_type_id
                        WHERE p.id = '" . intval($id) . "'
                        ORDER BY p.creation_date DESC";

        $query = $this->em->createNativeQuery($sql_nbPosts, $rsm);
        
        $posts = $query->getResult();
        foreach ($posts as $post) {
            if ($post->getIsDraft() == 1) {
                $cmd = $this->redis->createCommand('del', array(CacheDAO::POST_PREFIX . $post->getId()));
                $this->redis->executeCommand($cmd);
            }
            else
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId(), 1);
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId(), 1);
            
            // Post
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_IMAGE, $post->getImageUrl());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_AUDIO, $post->getAudioUrl());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_TEXT, $post->getTextContent());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_SLUG, $post->getSlug());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_DATE, $post->getCreationDate());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_VIDEO, $post->getVideoUrl());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_NBCOMMENTS, $post->getTimesCommented());
            
            if ($post->getIsProfessional() == 1) {
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_PRO, "1");
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_AUTH_TI,  $post->getAuthor()->getEditorTitle());
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_SUMMARY, $post->getSummary());
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_TITLE, $post->getHtmlTitle());
            } else {
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_PRO, "0");
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_TITLE, $post->getTitle());
            }
            
            if (($post->getHtmlTitle() == NULL) && ($post->getTitle() == NULL))
                $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_TITLE, "Check this out");
            
            // Type
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_TYPE, $post->getPostType()->getId());
            
            
            // Author
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_AUTH_ID, $post->getAuthor()->getId());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_AUTH_FN, $post->getAuthor()->getFirstName());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_AUTH_LN, $post->getAuthor()->getLastName());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_AUTH_IMG, $post->getAuthor()->getImageUrl());
            
            // First Ology
            
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_FO_ID, $post->getFirstOlogy()->getId());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_FO_NAME, $post->getFirstOlogy()->getName());
            $this->redis->set(CacheDAO::POST_PREFIX . $post->getId() . CacheDAO::POST_FO_SLUG, $post->getFirstOlogy()->getSlug());
            
        }
    }
    
    
    public function cachePostsForCards($offset, $n) {
        $safeN = intval($n);
        $safeOffset = intval($offset);
        $sql = "SELECT p.id as post_id, p.title as post_title, p.html_title as post_htmltitle, 
                                p.is_pro as post_pro, p.image_url as post_img, 
                                p.audio_url as post_aud, p.slug as post_slug,
                                p.text_content as post_text, p.creation_date as post_date,
                                p.summary as post_sum, p.video_url as post_vid,
                                p.times_commented as post_nbcomments,
                                p.times_loved as post_nblo, p.times_hated as post_nbha,
                                p.times_hmm as post_nbhm,
                                p.is_draft as post_draft,
                        o.id as ology_id, o.name as ology_name, o.slug as ology_slug,
                        u.id as user_id, u.first_name as user_fn, u.last_name as user_ln, 
                        u.image_url as user_img, u.editor_title as user_title,
                        pt.id as post_type_id
                        FROM Posts p
                        INNER JOIN Ologies o ON o.id = p.first_ology_id
                        INNER JOIN Users u ON u.id = p.author_id
                        INNER JOIN PostTypes pt ON pt.id = p.post_type_id
                        ORDER BY p.creation_date DESC
                        LIMIT $safeN OFFSET $safeOffset";

        $posts = $this->dbConnection->fetchAll($sql);
        foreach ($posts as $post) {
            if ($post['post_draft'] == 1) {
                $cmd = $this->redis->createCommand('del', array(CacheDAO::POST_PREFIX . $post['post_id']));
                $this->redis->executeCommand($cmd);
            }
            else
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'], 1);
                
            // Post
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_IMAGE, $post['post_img']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_AUDIO, $post['post_aud']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_VIDEO, $post['post_vid']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_TEXT, $post['post_text']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_SLUG, $post['post_slug']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_DATE, $post['post_date']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_NBCOMMENTS, $post['post_nbcomments']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_NBLOVE, $post['post_nblo']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_NBHATE, $post['post_nbha']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_NBHMM, $post['post_nbhm']);
            
            if ($post['post_pro'] == 1) {
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_TITLE, $post['post_htmltitle']);
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_PRO, 1);
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_AUTH_TI,  $post['user_title']);
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_SUMMARY, $post['post_sum']);
            } else {
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_TITLE, $post['post_title']);
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_PRO, 0);
                $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_SUMMARY, substr($post['post_text'], 0, 500));
            }

            // Type
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_TYPE, $post['post_type_id']);

            // Author
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_AUTH_ID, $post['user_id']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_AUTH_FN, $post['user_fn']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_AUTH_LN, $post['user_ln']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_AUTH_IMG, $post['user_img']);

            // First Ology
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_FO_ID, $post['ology_id']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_FO_NAME, $post['ology_name']);
            $this->redis->set(CacheDAO::POST_PREFIX . $post['post_id'] . CacheDAO::POST_FO_SLUG, $post['ology_slug']);

        }
    }
    
    public function getCachedPost($id) {
        if ($this->redis->get(CacheDAO::POST_PREFIX . $id) == NULL)
            return NULL;

        $p = new Post();
        $p->setId($id);
        $p->setTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TITLE));
        $p->setHtmlTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TITLE));
        $p->setAudioUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUDIO));
        $p->setImageUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_IMAGE));
        $p->setVideoUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_VIDEO));
        $p->setSummary($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_SUMMARY));
        $p->setTimesCommented($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBCOMMENTS));
        $p->setTimesLoved($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBLOVE));
        $p->setTimesHated($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBHATE));
        $p->setTimesHmm($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_NBHMM));
            
        $p->setTextContent($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_SUMMARY));
        $p->setSlug($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_SLUG));
        $p->setCreationDate($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_DATE));
        $p->setIsProfessional($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_PRO));

        $pt = new PostType();
        $pt->setId(intval($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_TYPE)));
        $p->setPostType($pt);

        $author = new User();
        $author->setId($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_ID));
        $author->setImageUrl($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_IMG));
        $author->setFirstname($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_FN));
        $author->setLastname($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_LN));
        if ($p->getIsProfessional())
            $author->setEditorTitle($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_AUTH_TI));
        $p->setAuthor($author);

        $firstOlogy = new Ology();
        $firstOlogy->setId($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_FO_ID));
        $firstOlogy->setName($this->redis->get(CacheDAO::POST_PREFIX . $id . CacheDAO::POST_FO_NAME));
        $p->setFirstOlogy($firstOlogy);

        return $p;
    }
}
?>
