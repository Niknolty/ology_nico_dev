<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\Query\ResultSetMapping;
use Ology\SocialBundle\Cache\PostCache;
use Ology\SocialBundle\Cache\SplashCache;
use Ology\SocialBundle\Entity\MostViewedPost;
use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\PostsChannels;
use Ology\SocialBundle\Entity\PostsOlogies;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Utility\ImagickService;
use Ology\SocialBundle\Exceptions\DAOException;
use Ology\SocialBundle\Utility\Slug;
use Ology\SocialBundle\DAO\CacheDAO\PostCacheDAO;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Ology\SocialBundle\Utility\S3Loader;

class PostDAO {
    const POST_IMG_PREFIX = 'post_';
    const POST_IMG_WEB_PREFIX = 'ppost_';
    const PRO_POST_IMG_PREFIX = 'prost_';
    const POST_AUD_PREFIX = 'aud_';
    const POST_IMG_SMA_WSIZE = 200;
    const POST_IMG_MID_WSIZE = 250;
    const POST_IMG_BIG_WSIZE = 585;

    protected $em;
    protected $container;
    protected $postCache;
    protected $postCacheDAO;
    protected $splashCache;
    protected $s3loader;
    protected $tmp_dir;

    function __construct(PostCache $postCache, PostCacheDAO $postCacheDAO, SplashCache $splashCache, EntityManager $em, $container) {
        $this->em = $em;
        $this->postCache = $postCache;
        $this->postCacheDAO = $postCacheDAO;
        $this->splashCache = $splashCache;
        $this->container = $container;
        $this->s3loader = new S3Loader($this->container);
        $this->tmp_dir = $this->container->getParameter('tmp_dir');
    }

    public function createHTMLPost($ologyId, $authorId, $title, $htmlContent) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::HTML);
        $firstOlogy = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $post = new Post();
        $post->setAuthor($author);
        $post->setPostType($postType);
        $post->setHtmlContent($htmlContent);
        $post->setTitle($title);
        $post->setIsDraft(0);
        $post->setIsProfessional(0);
        $post->setHtmlTitle($title);
        $post->setFirstOlogy($firstOlogy);
        $post->setSlug(Slug::str_slug($title));

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function createTextPost($ologyId, $authorId, $title, $text, $isDraft = false) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::TEXT);
        $firstOlogy = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $post = new Post();
        $post->setAuthor($author);
        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setIsDraft($isDraft ? 1 : 0);
        $post->setIsProfessional(0);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setFirstOlogy($firstOlogy);
        $post->setSlug(Slug::str_slug($title));

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function addPictureForProfessionalPost(UploadedFile $image) {
        $ext = $image->guessExtension();
        $fileName = uniqid(PostDAO::PRO_POST_IMG_PREFIX, true) . "." . $ext;
        $this->moveAndResizeImage($image, $fileName, 'file');
        return $fileName;
    }

    public function image_file_type_from_binary($binary) {
        if (
            !preg_match(
                '/\A(?:(\xff\xd8\xff)|(GIF8[79]a)|(\x89PNG\x0d\x0a)|(BM)|(\x49\x49(\x2a\x00|\x00\x4a))|(FORM.{4}ILBM))/',
                $binary, $hits
            )
        ) {
            return 0; //'application/octet-stream';
        }
        $type = array (
            1 => 'jpg', //'image/jpeg',
            2 => 'gif', //'image/gif',
            3 => 'png', //'image/png',
            4 => 'bmp', //'image/x-windows-bmp',
            5 => 'jpg', //'image/tiff',  *.tif
            6 => 'jpg', //'image/x-ilbm', *.ilbm
        );
        return $type[count($hits) - 1];
    }

    public function saveWebImageForPost($url) {
        $url = str_replace(' ', '%20', trim($url));
        $_ch = curl_init($url);
        $user_agent = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.7 (KHTML, like Gecko) Ubuntu/11.04 Chromium/16.0.912.77 Chrome/16.0.912.77 Safari/535.7';
        curl_setopt($_ch, CURLOPT_URL, $url);
        curl_setopt($_ch, CURLOPT_HEADER, 0);
        curl_setopt($_ch, CURLOPT_NOBODY, 0);
        curl_setopt($_ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($_ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($_ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($_ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($_ch, CURLOPT_TIMEOUT, 60);
        $image = curl_exec($_ch);

        // get file type
        $image_type = $this->image_file_type_from_binary($image);
        if($image_type){
            $fileName = uniqid(PostDAO::POST_IMG_WEB_PREFIX, true);
            $fileName = $this->moveAndResizeImage($image, $fileName, 'web');
            return $fileName;
        } else {
            throw new \Exception("Image must be JPG, PNG or GIF");
        }
    }
    
    public function createImagePost($ologyId, $authorId, $title, UploadedFile $image, $text, $isDraft = false) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::IMAGE);
        $firstOlogy = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $post = new Post();
        $post->setAuthor($author);
        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setIsDraft($isDraft ? 1 : 0);
        $post->setIsProfessional(0);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setFirstOlogy($firstOlogy);
        $post->setSlug(Slug::str_slug($title));
//        try {
            $ext = $image->guessExtension();
            $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;

            $this->moveAndResizeImage($image, $fileName, 'file');
            $post->setImageUrl($fileName);
//        } catch (\Exception $e) {
//            // TODO Add the post withour image (and change type)
//            throw new DAOException('Impossible to resize image in the creation of a post');
//        }

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function createImagePostFromUrl($ologyId, $authorId, $title, $imageUrl, $text, $isDraft, $imageSourceUrl = NULL) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::IMAGE);
        $firstOlogy = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $post = new Post();
        $post->setAuthor($author);
        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setIsDraft($isDraft ? 1 : 0);
        $post->setIsProfessional(0);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setFirstOlogy($firstOlogy);
        $post->setSlug(Slug::str_slug($title));
        $post->setImageUrl($imageUrl);
        $post->setImageSourceUrl($imageSourceUrl);

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function createAudioPost($ologyId, $authorId, $title, UploadedFile $audio, $text, $isDraft = false) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::AUDIO);
        $firstOlogy = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $post = new Post();
        $post->setAuthor($author);
        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setIsProfessional(0);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setIsDraft($isDraft ? 1 : 0);
        $post->setFirstOlogy($firstOlogy);
        $post->setSlug(Slug::str_slug($title));

        $ext = "mp3"; //$audio->guessExtension();
        $fileName = uniqid(PostDAO::POST_AUD_PREFIX, true) . "." . $ext;

        $this->moveAudio($audio, $fileName);
        $post->setAudioUrl($fileName);

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function createVideoPost($ologyId, $authorId, $title, $videoUrl, $text, $isDraft = false) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::VIDEO);
        $firstOlogy = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);

        $post = new Post();
        $post->setAuthor($author);
        $post->setPostType($postType);
        $post->setVideoUrl($videoUrl);
        $post->setTextContent($text);
        $post->setTitle($title);
        $post->setIsDraft($isDraft ? 1 : 0);
        $post->setIsProfessional(0);
        $post->setHtmlTitle($title);
        $post->setSlug(Slug::str_slug($title));
        $post->setFirstOlogy($firstOlogy);

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function createProfessionalPost($authorId, $ologyId, $postType, $post, $channelIds) {
        $postType = $this->em->getReference('OlogySocialBundle:PostType', $postType);
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        if ($ologyId != -1) {
            $firstOlogy = $this->em->getReference('OlogySocialBundle:Ology', $ologyId);
            $post->setFirstOlogy($firstOlogy);
        }
        $post->setPostType($postType);
        if ($post->getIsDraft() != 1)
            $post->setIsDraft(0);
        $post->setAuthor($author);
        $post->setIsProfessional(intval(1));
        $post->setTitle(strip_tags($post->getHtmlTitle()));
        
        $d = date_timestamp_get(date_create());
        if ($post->getIsDraft() == 1 && $post->getScheduledPublish() != NULL) {
            $d = $post->getScheduledPublish();
        }
        $post->setLastSaved($d);
        $post->setCreationDate($d);
        $post->setSlug(Slug::str_slug($post->getHtmlTitle()));

        $oldFileName = NULL;
        try {
            $image = $post->getImageFile();
            if ($image != NULL) {
                $ext = $image->guessExtension();
                $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;

                $this->moveAndResizeImage($image, $fileName, 'file');
                $post->setImageUrl($fileName);
                $oldFileName = $fileName;
            }
        } catch (\Exception $e) {
            throw $e;//new DAOException('Error with image file while creating prof. post');
        }

        try {
            $image = $post->getImage1File();
            if ($image != NULL) {
                $ext = $image->guessExtension();
                $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;

                $this->moveAndResizeImage($image, $fileName, 'file');
                $post->setImage1Url($fileName);
            } else {
                $post->setImage1Url($oldFileName);
            }
        } catch (\Exception $e) {
            throw new DAOException('Error with buzz image file while creating prof. post');
        }

        try {
            $image = $post->getImage2File();
            if ($image != NULL) {
                $ext = $image->guessExtension();
                $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;

                $this->moveAndResizeImage($image, $fileName, 'file');
                $post->setImage2Url($fileName);
            } else {
                $post->setImage2Url($oldFileName);
            }
        } catch (\Exception $e) {
            throw new DAOException('Error with buzz image file while creating prof. post');
        }

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function editProfessionalPost($id, $htmlTitle, $metaTitle, $summary,
            $htmlContent, $tags, $metaKeywords, $metaDescription, $citeTitle, $citeUrl, $caption, $imageAltText,
            UploadedFile $mainImage = NULL, UploadedFile $buzzImage = NULL, UploadedFile $belowBuzzImage = NULL) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($id);

        $post->setHtmlTitle($htmlTitle);
        $post->setTitle(strip_tags($htmlTitle));
        $post->setMetaTitle($metaTitle);
        $post->setSummary($summary);
        $post->setHtmlContent($htmlContent);
        $post->setTags($tags);
        $post->setMetaKeywords($metaKeywords);
        $post->setMetaDescription($metaDescription);
        $post->setCiteTitle($citeTitle);
        $post->setCiteUrl($citeUrl);
        $post->setImageCaption($caption);

        if ($mainImage != NULL) {
            $ext = $mainImage->guessExtension();
            $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;

            $this->moveAndResizeImage($mainImage, $fileName, 'file');
            $post->setImageUrl($fileName);
        }

        if ($buzzImage != NULL) {
            $ext = $buzzImage->guessExtension();
            $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;

            $this->moveAndResizeImage($buzzImage, $fileName, 'file');
            $post->setImage1Url($fileName);
        }

        if ($belowBuzzImage != NULL) {
            $ext = $belowBuzzImage->guessExtension();
            $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;

            $this->moveAndResizeImage($belowBuzzImage, $fileName, 'file');
            $post->setImage2Url($fileName);
        }

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function updateHTMLPost($postId, $authorId, $title, $htmlContent) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::HTML);
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);

        if (!$post)
            throw new DAOException('No post found for id ' . $postId);

        $post->setPostType($postType);
        $post->setHtmlContent($htmlContent);
        $post->setTextContent(null);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setSlug(Slug::str_slug($title));
        $post->setUpdateDate(\time());

        // remove image if existed
        $this->deleteImage($post->getImageUrl(), $postId);
        $post->setImageUrl(null);
        // remove audio file if existed
        if ($post->getAudioUrl()) {
            $this->deleteAudio($post->getAudioUrl(), $postId);
            $post->setAudioUrl(null);
        }

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }

    public function updateTextPost($postId, $authorId, $title, $text) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::TEXT);
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);
        if (!$post)
            throw new DAOException('No post found for id ' . $postId);

        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setHtmlContent(null);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setSlug(Slug::str_slug($title));
        $post->setUpdateDate(\time());

        //remove image
        $this->deleteImage($post->getImageUrl(), $postId);
        $post->setImageUrl(null);
        // remove audio file if existed
        if ($post->getAudioUrl()) {
            $this->deleteAudio($post->getAudioUrl(), $postId);
            $post->setAudioUrl(null);
        }

        $this->em->flush();

        return $post;
    }

    public function changeTimesOlogized($postId, $delta) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);
        if (!$post)
            throw new DAOException('No post found for id ' . $postId);
        $post->setTimesOlogized($post->getTimesOlogized() + $delta);
    }

    public function updateImagePost($postId, $authorId, $title, UploadedFile $image = null, $text) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::IMAGE);
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);

        if (!$post)
            throw new DAOException('No post found for id ' . $postId);

        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setSlug(Slug::str_slug($title));
        $post->setUpdateDate(\time());

        if ($image) {
            $oldFileName = $post->getImageUrl();
            // add new image
            $ext = $image->guessExtension();
            $fileName = uniqid(PostDAO::POST_IMG_PREFIX, true) . "." . $ext;
            $this->moveAndResizeImage($image, $fileName, 'file');
            //remove image
            $this->deleteImage($oldFileName, $postId);
            $post->setImageUrl($fileName);

            if ($post->getAudioUrl()) {
                $this->deleteAudio($post->getAudioUrl(), $postId);
                $post->setAudioUrl(null);
            }
        }

        $this->em->flush();

        return $post;
    }

    public function updateAudioPost($postId, $authorId, $title, UploadedFile $audio = null, $text) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::AUDIO);
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);

        if (!$post)
            throw new DAOException('No post found for id ' . $postId);

        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setSlug(Slug::str_slug($title));
        $post->setUpdateDate(\time());

        if ($audio) {
            $oldFileName = $post->getAudioUrl();

            // Add new file
            $ext = "mp3"; //$audio->guessExtension();
            $fileName = uniqid(PostDAO::POST_AUD_PREFIX, true) . "." . $ext;
            $this->moveAudio($audio, $fileName);
            $post->setAudioUrl($fileName);
            //remove audio file
            if ($oldFileName)
                $this->deleteAudio($oldFileName, $postId);
            if ($post->getImageUrl()) {
                $this->deleteImage($post->getImageUrl(), $postId);
                $post->setImageUrl(null);
            }
        }

        $this->em->flush();

        return $post;
    }

    public function updateVideoPost($postId, $authorId, $title, $videoUrl, $text) {
        $author = $this->em->getReference('OlogySocialBundle:User', $authorId);
        $postType = $this->em->getReference('OlogySocialBundle:PostType', PostType::VIDEO);
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);

        if (!$post)
            throw new DAOException('No post found for id ' . $postId);

        $post->setPostType($postType);
        $post->setTextContent($text);
        $post->setTitle($title);
        $post->setHtmlTitle($title);
        $post->setSlug(Slug::str_slug($title));
        $post->setUpdateDate(\time());

        if ($videoUrl)
            $post->setVideoUrl($videoUrl);

        // remove image if existed
        $this->deleteImage($post->getImageUrl(), $postId);
        $post->setImageUrl(null);
        // remove audio file if existed
        if ($post->getAudioUrl()) {
            $this->deleteAudio($post->getAudioUrl(), $postId);
            $post->setAudioUrl(null);
        }

        $this->em->flush();

        return $post;
    }

    public function getPost($postId) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);
        if (!$post)
            throw new DAOException('PostDAO: getPost(): No post found for id ' . $postId);

        return $post;
    }
    
    public function getPostCard($postId) {
        $postCard = $this->postCache->getCachedPost($postId);
        if (!empty($postCard))
            return $postCard;
        
        try {
            $this->postCache->cachePost($postId);
            $post = $this->getPost($postId);
        } catch (\Exception $exc) {
            return NULL;
        }
        return $post;
    }
    
    public function getPostsCard(array $postsIds) {
        $posts = array();
        foreach ($postsIds as $postId) {
            $post = $this->getPostCard($postId);
            if ($post != NULL)
                $posts[] = $post;
        }
        return $posts;
    }
    
    public function getPostByOldId($old_id) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->findOneBy( array('oldId' => $old_id) );
        if (!$post)
            throw new DAOException('PostDAO: getPost(): No post found for old_id ' . $old_id);

        return $post;
    }

    public function getPostByOldAlias($old_alias) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->findOneBy( array('oldAlias' => $old_alias) );
        if (!$post)
            throw new DAOException('PostDAO: getPost(): No post found for old_alias ' . $old_alias);

        return $post;
    }

    public function deletePost($postId) {
        $post = $this->em->getReference('OlogySocialBundle:Post', $postId);
        if (!$post)
            return false;
        //remove image
        $this->deleteImage($post->getImageUrl(), $postId);

        $this->em->remove($post);
        $this->em->flush();
        return true;
    }

    public function getMostRecent($offset, $n, $onlyPro = false) {
        $qb = $this->em->createQueryBuilder()
                    ->add('select', 'p')
                    ->from('OlogySocialBundle:Post', 'p')
                    //->join('p.firstOlogy', 'o')
                    //->where('o.blacklisted IS NULL')
                    ->where('p.isDraft <> 1');

        if ($onlyPro)
            $qb->andWhere('p.isProfessional = 1');

        $posts = $qb->orderBy('p.id', 'DESC')
                    ->getQuery()
                    ->setFirstResult($offset)
                    ->setMaxResults($n)
                    ->getResult();

        return $posts;
    }

    public function getMostRecentByOlogies($offset, $n) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Ology\SocialBundle\Entity\Post', 'p');
        $rsm->addFieldResult('p', 'post_id', 'id');

        $sql = "SELECT po.post_id as post_id
                        FROM PostsOlogies po
                        LEFT JOIN PostsOlogies po2 ON po.ology_id = po2.ology_id AND po.date_ologized < po2.date_ologized
                        INNER JOIN Posts p on p.id = po.post_id
                        WHERE po2.ology_id IS NULL
                        AND p.is_draft IS NULL
                        ORDER BY po.date_ologized DESC
                        LIMIT ? OFFSET ?";

        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter(1, intval($n));
        $query->setParameter(2, intval($offset));       echo $res[0];
        $partialPosts = $query->getResult();

        $this->em->close();

        $postsIds = array();
        foreach($partialPosts as $partialPost) {
            $postsIds[] = $partialPost->getId();
        }

        if (count($postsIds) == 0)
            return array();

        $posts = $this->em->createQueryBuilder()
                    ->add('select', 'p, a, o, t')
                    ->from('OlogySocialBundle:Post', 'p')
                    ->join('p.author', 'a')
                    ->join('p.firstOlogy', 'o')
                    ->join('p.postType', 't')
                    ->where('p.id IN (?1)')
                    ->getQuery()
                    ->setParameter(1, $postsIds)
                    ->getResult();

        return $posts;
    }

    public function getMostRecentByLabelsUniqueOlogies($labelsArray, $offset, $n) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Ology\SocialBundle\Entity\Post', 'p');
        $rsm->addFieldResult('p', 'post_id', 'id');
        $labels = implode(',', $labelsArray);

        $safeN = intval($n);
        $safeOffset = intval($offset);

        $sql = "SELECT po.post_id as post_id
                        FROM PostsOlogies po
                        INNER JOIN Posts p on po.post_id = p.id
                        LEFT JOIN PostsOlogies po2 ON po.ology_id = po2.ology_id AND po.date_ologized < po2.date_ologized
                        INNER JOIN LabelsOlogies lo ON lo.ology_id = po.ology_id
                        WHERE po2.ology_id IS NULL
                        AND p.is_draft IS NULL
                        AND lo.label_id IN ($labels)
                        ORDER BY po.date_ologized DESC
                        LIMIT $safeN OFFSET $safeOffset";

        $query = $this->em->createNativeQuery($sql, $rsm);
        $partialPosts = $query->getResult();
        $postsIds = array();
        foreach($partialPosts as $partialPost) {
            $postsIds[] = $partialPost->getId();
        }

        if (count($postsIds) == 0)
            return array();

        $this->em->close();
        $posts = $this->em->createQueryBuilder()
                    ->add('select', 'p, a, o, t')
                    ->from('OlogySocialBundle:Post', 'p')
                    ->join('p.author', 'a')
                    ->join('p.firstOlogy', 'o')
                    ->join('p.postType', 't')
                    ->where('p.id IN (?1)')
                    ->getQuery()
                    ->setParameter(1, $postsIds)
                    ->getResult();

        return $posts;
    }

    public function getMostRecentForApi($offset, $n) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Ology\SocialBundle\Entity\Post', 'p');
        $rsm->addFieldResult('p', 'post_id', 'id');
        $rsm->addFieldResult('p', 'post_title', 'title');
        $rsm->addJoinedEntityResult('Ology\SocialBundle\Entity\User', 'u', 'p', 'author');
        $rsm->addFieldResult('u', 'user_id', 'id');
        $rsm->addFieldResult('u', 'user_firstname', 'firstName');
        $rsm->addFieldResult('u', 'user_image', 'imageUrl');
        $rsm->addJoinedEntityResult('Ology\SocialBundle\Entity\Ology', 'o', 'p', 'firstOlogy');
        $rsm->addFieldResult('o', 'ology_id', 'id');
        $rsm->addFieldResult('o', 'ology_name', 'name');
        $rsm->addFieldResult('o', 'ology_slug', 'slug');

        $sql_nbPosts = "SELECT p.id as post_id, p.title as post_title, o.id as ology_id, o.name as ology_name, o.slug as ology_slug, u.id as user_id, u.first_name as user_firstname, u.image_url as user_image
                        FROM Posts p
                        LEFT JOIN Posts p2 ON p.author_id = p2.author_id AND p.creation_date < p2.creation_date
                        INNER JOIN Ologies o ON o.id = p.first_ology_id
                        INNER JOIN Users u ON u.id = p.author_id
                        WHERE p2.author_id IS NULL
                        ORDER BY p.creation_date DESC
                        LIMIT ? OFFSET ?";

        $query = $this->em->createNativeQuery($sql_nbPosts, $rsm);
        $query->setParameter(1, intval($n));
        $query->setParameter(2, intval($offset));

        $posts = $query->getResult();
        return $posts;
    }

    public function getMostCommented($offset, $n) {
        $query = $this->em->createQuery('SELECT u FROM Ology\SocialBundle\Entity\Post u ORDER BY u.timesCommented DESC');
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $posts = $query->getResult();

        return $posts;
    }

    public function getPostsByUser($userId, $offset, $n) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->where('p.author = ?1')
                        ->andWhere('p.isDraft <> 1')
                        ->andWhere('(p.isProfessional <> 1) OR (p.isProfessional = 1)')
                        ->orderBy('p.creationDate', 'DESC');

        $query = $qb->getQuery();
        $query->setParameter(1, $userId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $posts = $query->getResult();

        return $posts;
    }

    public function getProfessionalPostsByUser($userId, $offset, $n) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->where('p.author = ?1')
                        ->andWhere('p.isProfessional = 1')
                        ->orderBy('p.creationDate', 'DESC');

        $query = $qb->getQuery();
        $query->setParameter(1, $userId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $posts = $query->getResult();

        return $posts;
    }

    public function incrementTimeCommented($postId) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);
        $post->incrTimeCommented();
    }

    public function decrementTimeCommented($postId) {
        $post = $this->em->getRepository('OlogySocialBundle:Post')->find($postId);
        $post->decrTimeCommented();
    }

    public function getPostsForOlogy($ologyId, $offset, $n, $uniquePoster = false) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->innerJoin('p.ologyposts', 'op', Join::WITH, 'op.ology = ?1')
                        ->where('p.isDraft <> 1')
                        ->orderBy('p.creationDate', 'DESC');

        if ($uniquePoster)
            $qb->addGroupBy('p.author');

        $query = $qb->getQuery();
        $query->setParameter(1, $ologyId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $posts = $query->getResult();

        return $posts;
    }

    public function getMostRecentPostsForOlogy($ologyId, $offset, $n, $proPostsOnly = false) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->where('p.firstOlogy = ?1')
                        //->innerJoin('p.ologyposts', 'op', Join::WITH, 'op.ology = ?1')
                        ->andWhere('p.isDraft <> 1');

        if ($proPostsOnly)
            $qb->andWhere('p.isProfessional = 1');

        $qb->orderBy('p.creationDate', 'DESC');

        $query = $qb->getQuery();
        $query->setParameter(1, $ologyId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $posts = $query->getResult();

        return $posts;
    }

    public function getMostRecentPostForOlogies($ologyIdsArray) {
        if (count($ologyIdsArray) == 0)
            return array();

        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p, max(p.creationDate)')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->innerJoin('p.firstOlogy', 'o')
                        ->where('o.id IN (?1)')
                        ->andWhere('p.isDraft <> 1')
                        ->groupBy('o.id');

        $query = $qb->getQuery();
        $query->setParameter(1, $ologyIdsArray);
        $res = $query->getResult();

        $posts = array();
        foreach ($res as $re)
            $posts[] = $re[0];
        return $posts;
    }

    public function getOnePostByInterests($interests) {
        if (count($interests) == 0)
            return array();

        $names = array();
        foreach ($interests as $interest)
            $names[] = $interest->getName();
        //die(\Ology\SocialBundle\Utility\TVarDumper::dump($interests, 3, true));
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p, max(p.creationDate)')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->innerJoin('p.firstOlogy', 'o')
                        ->where('o.name IN (?1)')
                        ->andWhere('p.isDraft <> 1')
                        ->groupBy('o.id');

        $query = $qb->getQuery();
        $query->setParameter(1, $names);
        $res = $query->getResult();
        //die(\Ology\SocialBundle\Utility\TVarDumper::dump($res, 3, true));
        $posts = array();
        foreach ($res as $re)
            $posts[] = $re[0];
        return $posts;
    }

    public function getPostsPreviewByLabel($labelId, $offset, $n, $proPostsOnly = false, $excludePostId = NULL) {
        return $this->postCache->getPostsPreviewByLabel($labelId, $offset, $n, $proPostsOnly, $excludePostId);
    }

    public function getPostsCardsByLabel($labelId, $offset, $n) {
        return $this->splashCache->getPostsCardsByLabel($labelId, $offset, $n);
    }

    public function publishScheduledPosts() {
       $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->where('p.isDraft = ?1')
                        ->andWhere('p.scheduledPublish < ?2');

        $query = $qb->getQuery();
        $query->setParameter(1, 1);
        $query->setParameter(2, \time());
        $posts = $query->getResult();

        foreach ($posts as $post) {
            $post->setIsDraft(0);
        }
        $this->em->flush();

        return count($posts);
    }

    // Channels
    public function getPostsForChannel($channelId, $offset, $n) {
        $qb = $this->em->createQueryBuilder()
                        ->add('select', 'p')
                        ->from('OlogySocialBundle:Post', 'p')
                        ->innerJoin('p.channelposts', 'cp', Join::WITH, 'cp.channel = ?1')
                        ->where('p.isDraft <> 1')
                        ->orderBy('p.creationDate', 'DESC');

        $query = $qb->getQuery();
        $query->setParameter(1, $channelId);
        $query->setFirstResult($offset);
        $query->setMaxResults($n);
        $posts = $query->getResult();

        return $posts;
    }

    public function getMostViewed() {
        return $this->postCache->getMostViewed();
    }

    public function setMostViewed($postIdsArray) {
        $this->em->createQuery('DELETE OlogySocialBundle:MostViewedPost mv')->getResult();

        $i = 1;
        foreach ($postIdsArray as $postId) {
            $p = $this->em->getReference('OlogySocialBundle:Post', $postId);
            if ($p == NULL)
                continue;
            $mv = new MostViewedPost();
            $mv->setPost($p);
            $mv->setPosition($i++);
            $this->em->persist($mv);
        }
        $this->em->flush();
    }

    public function changeNbViews($id, $n) {
        return $this->postCache->changeNbViews($id, $n);
    }

    public function getCachedPostsCardsForOlogy($ologyId, $offset, $n) {
        return $this->postCache->getCachedPostsCardsForOlogy($ologyId, $offset, $n);
    }
    
    public function getPostsForUser($postFounderId, $postId){
        return $this->postCache->getPostsForUser($postFounderId, $postId);
    }
    
    /**
     * Get posts for the home page sorted by date and without duplicate posts.
     * @param array $keys Redis keys previously computed containing posts ids to show on the home page
     * @return array Posts
     */
    public function getHomePagePosts($userId, array $keys, $offset, $n) {
        $postsIds = $this->postCacheDAO->getHomePagePostsIds($userId, $keys, $offset, $n);
        return $this->getPostsCard($postsIds);
    }

    private function moveAndResizeImage($image, $fileName, $from) {
        // save original image and resized images
        if ($from == 'file') {
            $img = $image->move($this->tmp_dir, $fileName);
        } elseif ($from == 'web') {
            $im = new \Imagick();
            $im->readimageblob($image);
            $type = $im->getimageformat();
            $fileName .= '.' . strtolower($type);
            $img = $im->writeImages($this->tmp_dir . $fileName, true);
        } else {
            return false;
        }

        if ($img) {
            $this->s3loader->createObject($this->tmp_dir . $fileName, $this->container->getParameter('post_original_image_path') . $fileName);

            if (ImagickService::resizeImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, PostDAO::POST_IMG_MID_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileName, $this->container->getParameter('post_medium_image_path') . $fileName );
            if (ImagickService::resizeImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, PostDAO::POST_IMG_BIG_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileName, $this->container->getParameter('post_large_image_path') . $fileName );
            if (ImagickService::resizeImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, PostDAO::POST_IMG_SMA_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileName, $this->container->getParameter('post_small_image_path') . $fileName );
            unlink($this->tmp_dir . 'resized_' . $fileName);
            unlink($this->tmp_dir . $fileName);
            return $fileName;
        } else {
            return false;
        }
    }

    private function deleteImage($fileName, $message = ''){
        if ($fileName && $fileName != 'default.png') {
            try {
                $this->s3loader->deleteObject($this->container->getParameter('post_original_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('post_medium_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('post_large_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('post_small_image_path') . $fileName );
            } catch (\ErrorException $e) {
                throw new DAOException("PostDAO: updatePost($message): Cannot remove oldfile: $fileName");
            }
        }
    }

    private function moveAudio($audio, $fileName) {
        $audio->move($this->tmp_dir, $fileName);
        $this->s3loader->createObject($this->tmp_dir . $fileName, $this->container->getParameter('post_audio_path') . $fileName);
        unlink($this->tmp_dir . $fileName);
    }

    private function deleteAudio($fileName, $message) {
        if ($fileName) {
            try {
                $this->s3loader->deleteObject($this->container->getParameter('post_audio_path') . $fileName );
            } catch (\ErrorException $e) {
                throw new DAOException("PostDAO: updatePost($message): Cannot remove oldfile: $fileName");
            }
        }
    }

    public function getSlug($postId) {
        $q = $this->em->createQueryBuilder()
            ->add('select', 'p.slug')
            ->from('OlogySocialBundle:Post', 'p')
            ->where('p.id = ?1')
            ->getQuery();
        $q->setParameter(1, $postId);
        $q->useResultCache(true, 60);
        $res = $q->getResult();
        $slug = isset($res[0]) ? $res[0]['slug'] : false;
        return $slug;
    }
}

?>
