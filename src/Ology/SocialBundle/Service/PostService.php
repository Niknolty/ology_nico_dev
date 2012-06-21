<?php

namespace Ology\SocialBundle\Service;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\DAO\CacheDAO;
use Ology\SocialBundle\DAO\PostDAO;
use Ology\SocialBundle\DAO\OlogyDAO;
use Ology\SocialBundle\DAO\UserDAO;
use Ology\SocialBundle\DAO\PostsChannelsDAO;
use Ology\SocialBundle\DAO\PostsOlogiesDAO;
use Ology\SocialBundle\DAO\PostsStashesDAO;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Exceptions\NotYetCodedException;
use Ology\SocialBundle\Exceptions\ServiceException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ology\SocialBundle\Entity\IPostLink;

class PostService {

    protected $postDAO;
    protected $userDAO;
    protected $postsOlogiesDAO;
    protected $postsChannelsDAO;
    protected $postsStashesDAO;
    protected $cacheDAO;
    protected $ologyDAO;
    protected $commentService;
    protected $notificationService;
    protected $mailService;
    protected $followService;
    protected $subscriptionService;
    protected $membershipService;

    function __construct(PostDAO $dao, OlogyDAO $ologyDAO, UserDAO $userDAO, PostsOlogiesDAO $postsOlogiesDAO, PostsChannelsDAO $postsChannelsDAO, PostsStashesDAO $postsStashesDAO, CacheDAO $cacheDAO, CommentService $commentService, EMailService $mailService) {
        $this->postDAO = $dao;
        $this->ologyDAO = $ologyDAO;
        $this->userDAO = $userDAO;
        $this->postsOlogiesDAO = $postsOlogiesDAO;
        $this->postsChannelsDAO = $postsChannelsDAO;
        $this->postsStashesDAO = $postsStashesDAO;
        $this->cacheDAO = $cacheDAO;
        $this->commentService = $commentService;
        $this->mailService = $mailService;
    }

    public function setNotificationService(NotificationService $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function createHtmlPost($ologyId, $authorId, $title, $htmlContent) {
        $post = $this->postDAO->createHTMLPost($ologyId, $authorId, $title, $htmlContent);
        $this->commonCreates($post, $ologyId, $authorId);
        return $post;
    }

    public function createTextPost($ologyId, $authorId, $title, $text, $isDraft = false) {
        $post = $this->postDAO->createTextPost($ologyId, $authorId, $title, $text, $isDraft);
        $this->commonCreates($post, $ologyId, $authorId);
        return $post;
    }

    public function createImagePost($ologyId, $authorId, $title, UploadedFile $image, $text, $isDraft = false) {
        if ($image != NULL) {
            $allowed = array('image/jpeg', 'image/gif', 'image/png');
            if (!\in_array($image->getClientMimeType(), $allowed))
                throw new \Exception("Invalid image file in createImagePost Service", 200);
        }
        $post = $this->postDAO->createImagePost($ologyId, $authorId, $title, $image, $text, $isDraft);
        $this->commonCreates($post, $ologyId, $authorId);
        return $post;
    }
    
    public function createImagePostFromUrl($ologyId, $authorId, $title, $imageUrl, $text, $isDraft = false, $imageSourceUrl = NULL) {
        $post = $this->postDAO->createImagePostFromUrl($ologyId, $authorId, $title, $imageUrl, $text, $isDraft, $imageSourceUrl);
        $this->commonCreates($post, $ologyId, $authorId);
        return $post;
    }

    public function createAudioPost($ologyId, $authorId, $title, UploadedFile $audio, $text, $isDraft = false) {
        if ($audio && $audio->getClientMimeType() != 'audio/mpeg' AND ($audio->getClientMimeType() != 'audio/mp3'))
            throw new \Exception("Invalid audio file in createAudioPost Service", 200);

        $post = $this->postDAO->createAudioPost($ologyId, $authorId, $title, $audio, $text, $isDraft);
        $this->commonCreates($post, $ologyId, $authorId);
        return $post;
    }
    
    public function addPictureForProfessionalPost(UploadedFile $img) {
        return $this->postDAO->addPictureForProfessionalPost($img);
    }
    
    public function saveWebImageForPost($url) {
        return $this->postDAO->saveWebImageForPost($url);
    }

    public function createVideoPost($ologyId, $authorId, $title, $videoUrl, $text, $isDraft = false) {
        $result = array();
        if (preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $result))
            $youtubeId = $result[1];
        else if (preg_match('(([[:alnum:]]-_){11})%i', $videoUrl))
            ;
        else {
            throw new ServiceException("PostService: Not a youtube address");
        }
        $post = $this->postDAO->createVideoPost($ologyId, $authorId, $title, $youtubeId, $text, $isDraft);
        $this->commonCreates($post, $ologyId, $authorId);
        return $post;
    }
    
    public function editProfessionalPost($id, $htmlTitle, $metaTitle, $summary, $htmlContent, $tags, $metaKeywords, $metaDescription, $citeTitle, $citeUrl, $caption, $imageAltText, UploadedFile $mainImage = NULL, UploadedFile $buzzImage = NULL, UploadedFile $belowBuzzImage = NULL) {
        return $this->postDAO->editProfessionalPost($id, $htmlTitle, $metaTitle, $summary, $htmlContent, $tags, $metaKeywords, $metaDescription, $citeTitle, $citeUrl, $caption, $imageAltText, $mainImage, $buzzImage, $belowBuzzImage);
    }
    
    public function createProfessionalPost($user, $ologyId, $postType, $post, $channelIds) {
        $post = $this->postDAO->createProfessionalPost($user->getId(), $ologyId, $postType, $post, $channelIds);
        if ($ologyId != -1)
            $this->commonCreates($post, $ologyId, $user->getId());
        
        foreach ($channelIds as $channelId)
            $this->postsChannelsDAO->createPostsChannels($post->getId(), $channelId, $user->getId());

        return $post;
    }

    public function updateHtmlPost($postId, $authorId, $title, $htmlContent) {
        $post = $this->postDAO->updateHTMLPost($postId, $authorId, $title, $htmlContent);
        return $post;
    }

    public function updateTextPost($postId, $authorId, $title, $text) {
        $post = $this->postDAO->updateTextPost($postId, $authorId, $title, $text);
        return $post;
    }

    public function updateImagePost($postId, $authorId, $title, UploadedFile $image = null, $text) {
        if ($image != NULL) {
            $allowed = array('image/jpeg', 'image/gif', 'image/png');
            if (!\in_array($image->getClientMimeType(), $allowed))
                throw new \Exception("Invalid image file in updateImagePost Service", 200);
        }
        $post = $this->postDAO->updateImagePost($postId, $authorId, $title, $image, $text);
        return $post;
    }

    public function updateAudioPost($postId, $authorId, $title, UploadedFile $audio = null, $text) {
        if ($audio && $audio->getClientMimeType() != 'audio/mpeg')
            throw new \Exception("Invalid audio file in createAudioPost Service", 200);
        
        $post = $this->postDAO->updateAudioPost($postId, $authorId, $title, $audio, $text);
        return $post;
    }

    public function updateVideoPost($postId, $authorId, $title, $videoUrl, $text) {
        $result = array();
        if (preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $result))
            $youtubeId = $result[1];
        else if (preg_match('/^([[:alnum:]-_]{11})$/', $videoUrl))
            $youtubeId = $videoUrl;
        else 
            throw new ServiceException("PostService: Not a youtube address");
        
        $post = $this->postDAO->updateVideoPost($postId, $authorId, $title, $youtubeId, $text);
        return $post;
    }

    public function reOlogize($postId, $ologyId, $sharerId) {
        $post = $this->postDAO->getPost($postId);
        $this->postDAO->changeTimesOlogized($postId, 1);
        $this->postsOlogiesDAO->createPostsOlogies($post, $ologyId, $sharerId);
        
        $this->notificationService->notifPostOlogyReologized($postId, $sharerId, $ologyId);
        
        return $post;
    }
    
    public function publishScheduledPosts() {
        return $this->postDAO->publishScheduledPosts();
    }
    
    public function unReOlogize($user, $postId, $ologyId, $sharerId) {
        if ($user->getId() == $sharerId || in_array('ROLE_SUPER_ADMIN', $user->getRoles(), true)) {
            $post = $this->postDAO->getPost($postId);
            $this->postDAO->changeTimesOlogized($postId, -1);
            $this->postsOlogiesDAO->deletePostsOlogies($postId, $ologyId, $sharerId);

            return $post;
        }
        return NULL;
    }
    
    private function commonCreates($post, $ologyId, $authorId) {
        $this->postsOlogiesDAO->createPostsOlogies($post, $ologyId, $authorId);
        $notifs = $this->notificationService->notifNewPostInOlogy($ologyId, $authorId, $post->getId());
        $this->mailService->emailNotifications($notifs);
        $this->cacheDAO->cache_post_setSubscribedUserForPost($authorId, $post->getId());
    }

    public function deletePost($postId) {
        $userIds = $this->cacheDAO->cache_post_getSubscribedUsersForPost($postId);
        foreach ($userIds as $userId) {
            $this->notificationService->setIsNotifInvalid($userId, true);
        }

        $this->notificationService->deleteNotificationsForPost($postId);
        $this->postsOlogiesDAO->deletePostsOlogiesForPost($postId);
        $this->postsChannelsDAO->deletePostsChannelsForPost($postId);
        $this->commentService->deleteCommentForPost($postId);
        $this->cacheDAO->cache_post_clearSubscribedUsersForPost($postId);
        $this->postDAO->deletePost($postId);
    }

    public function deletePostsForOlogy($ologyId) {
        $postOlogies = $this->postsOlogiesDAO->getPostsOlogiesForOlogy($ologyId);

        if ($postOlogies) {
            foreach ($postOlogies as $postology) {
                $postId = $postology->getPost()->getId();
                $this->commentService->deleteCommentForPost($postId);
                $this->notificationService->deleteNotificationsForPost($postId);
                $this->postsOlogiesDAO->deletePostsOlogiesForPost($postId);

                $this->postDAO->deletePost($postId);
            }
        }
    }

    public function getPost($postId) {
        $post = $this->postDAO->getPost($postId);
        return $post;
    }
    
    public function getPostByOldId($old_id) {
        $post = $this->postDAO->getPostByOldId($old_id);
        return $post;
    } 
    
    public function getPostByOldAlias($old_alias) {
        $post = $this->postDAO->getPostByOldAlias($old_alias);
        return $post;
    } 

    public function getMostRecentByLabelsUniqueOlogies($labelsArray, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getMostRecentByLabelsUniqueOlogies($labelsArray, $offset, $n);
        return $posts;
    }

    public function getPostWithComments($postId) {
        $post = $this->postDAO->getPost($postId);
        $n = $this->commentService->getDefaultCommentNumber();
        $comments = $this->commentService->getCommentForPost($postId, $n, 0);

        return array("post" => $post, "comments" => $comments);
    }

    public function updatePost($postId, $authorId, $postTypeId, $title, $htmlContent, $timesOlogized) {
        $post = $this->postDAO->updatePost($postId, $authorId, $postTypeId, $title, $htmlContent, $timesOlogized);
        return $post;
    }

    public function getMostRecent($pageOffset, $n, $onlyPro = false) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getMostRecent($offset, $n, $onlyPro);
        return $posts;
    }
    
    public function getMostRecentPostsForOlogy($ologyId, $pageOffset, $n, $proPostsOnly = false) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getMostRecentPostsForOlogy($ologyId, $offset, $n, $proPostsOnly);
        return $posts;
    }
    
    public function getMostRecentLimitOlogy($pageOffset, $n, $maxPostsFromOlogy) {
        $res = array();
        $nbPostsByOlogy = array();
        $nbPostsTotal = 0;
        
        $offset = $pageOffset * $n;
        $nbPostsFetched = 2 * intval($n) + intval($offset);
        $posts = $this->postDAO->getMostRecent(0, $nbPostsFetched);
        
        $i = 0;
        foreach ($posts as $post) {
            $ologyId = $post->getFirstOlogy()->getId();
            if (!array_key_exists($ologyId, $nbPostsByOlogy))
                $nbPostsByOlogy[$ologyId] = 1;
            else
                $nbPostsByOlogy[$ologyId]++;
            
            if ($i >= $offset) {
                if ($nbPostsByOlogy[$ologyId] <= $maxPostsFromOlogy)
                    $res[] = $post;
            }
            $i++;
        }
        
        return $res;
    }
    
    public function getMostRecentByOlogies($pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getMostRecentByOlogies($offset, $n);
        return $posts;
    }
    
    public function getMostRecentByInterest($userId, $pageOffset, $n) {
        $idArray = $this->cacheDAO->cache_getSuggestedOlogiesIds($userId);
        $slicedArray = array_slice($idArray, $pageOffset * $n, $n);
        $posts = $this->postDAO->getMostRecentPostForOlogies($slicedArray) ;
        return $posts;
    }
    
    public function getMostRecentForApi($pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getMostRecentForApi($offset, $n);
        return $posts;
    }

    public function getMostCommented($pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getMostCommented($offset, $n);
        return $posts;
    }

    public function getPostsByUser($userId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getPostsByUser($userId, $offset, $n);
        return $posts;
    }
    
    public function getProfessionalPostsByUser($userId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getProfessionalPostsByUser($userId, $offset, $n);
        return $posts;
    }

    public function getPostsForOlogy($ologyId, $pageOffset, $number, $uniquePoster = false) {
        $offset = $pageOffset * $number;
        $posts = $this->postDAO->getPostsForOlogy($ologyId, $offset, $number, $uniquePoster);
        return $posts;
    }
    
    public function getPostsPreviewByLabel($labelId, $pageOffset, $n, $proPostsOnly = false, $excludePostId = NULL) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getPostsPreviewByLabel($labelId, $offset, $n, $proPostsOnly, $excludePostId);
        return $posts;
    }
    
    public function getPostsCardsByLabel($labelId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getPostsCardsByLabel($labelId, $offset, $n);
        return $posts;
    }
    
    public function getPostsCardsByChannels($channelsIdsArray, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $postsCard = array();
        
        foreach ($channelIdsArray as $channelId) {
            $postsCard[] = $this->postsChannelsDAO->getPostsChannelsByChannel($channelId, $offset, $n);
        }
        return $postsCard;
    }
    
    public function getPostsCardsByOlogies($ologiesIdsArray, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $posts = $this->postDAO->getPostsCardsByLabel($labelId, $offset, $n);
        return $posts;
    }

    public function getMostRecentPostForOlogies($ologyIdsArray) {
        return $this->postDAO->getMostRecentPostForOlogies($ologyIdsArray);
    }
    
    public function isAuthorizedToEditOrDelete($user, $postId) {
        if (!$user || (gettype($user) == "string"))
            return false;

        $roles = $user->getRoles();
        if (in_array('ROLE_SUPER_ADMIN', $roles, true))
            return true;

        $author = $this->postDAO->getPost($postId)->getAuthor()->getId();
        if ($author == $user->getId())
            return true;

        return false;
    }
    
    public function isAuthorizedToUnReOlogize($user, IPostLink $postLink) {
        if (!$user || (gettype($user) == "string"))
            return false;

        $roles = $user->getRoles();
        if (in_array('ROLE_SUPER_ADMIN', $roles, true))
            return true;

        if ($postLink->getUser()->getId() == $user->getId())
            return true;

        return false;
    }
    
    public function incNbViews($id) {
        return $this->postDAO->changeNbViews($id, 1);
    }
    
    public function getMostViewed() {
        return $this->postDAO->getMostViewed();
    }
    
    public function setMostViewed($postIdsArray) {
        return $this->postDAO->setMostViewed($postIdsArray);
    }
    
    /* Functions returning Post Ologies */
    
    public function getPostsOlogiesByOlogies($ologyIdsArray, $pageOffset, $number) {
        $offset = $pageOffset * $number;
        return $this->postsOlogiesDAO->getPostsOlogiesByOlogies($ologyIdsArray, $offset, $number);
    }
    
    
    public function getPreviousAndNextPostInfos($ologyId, $postId){
        return $this->postsOlogiesDAO->getPreviousAndNextPostInfos($ologyId, $postId);
    }
    
    
    public function getPostsForUserByOlogy($ologyId, $userId, $pageOffset, $n){
        $offset = $pageOffset * $number;
        return $this->postsOlogiesDAO->getPostsForUserByOlogy($ologyId, $userId, $offset, $n);
    }
    
    /**
     * Return all posts from a specific user in an ology 
     */
    public function getPostForUsersByOlogies($followedUsersAndOlogiesArray, $userId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        return $this->postsOlogiesDAO->getPostForUsersByOlogies($followedUsersAndOlogiesArray, $userId, $offset, $n);
    }
    
    public function getPostsIdsForUsersByOlogiesKey($followedUsersAndOlogiesArray, $userId, $compute) {
        return $this->postsOlogiesDAO->getPostsIdsForUsersByOlogiesKey($followedUsersAndOlogiesArray, $userId, $compute);
    }
    
    /**
     * Return all posts for given ology ids with max result n
     */
    public function getPostsByOlogies($ologiesIdsArray, $userId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        return $this->postsOlogiesDAO->getPostByOlogies($ologiesIdsArray, $userId, $offset, $n);
    }
    
    public function getPostsIdsByOlogiesKey($ologiesIdsArray, $userId, $compute) {
        return $this->postsOlogiesDAO->getPostsIdsByOlogiesKey($ologiesIdsArray, $userId, $compute);
    }
    
    /* Functions returning Post Stashes */
    
    /**
     * Creates a PostStash which links a post into a stash.
     */
    public function stashIt($postId, $stashId, $sharerId) {
        $post = $this->postDAO->getPost($postId);
        $this->postDAO->changeTimesOlogized($postId, 1);
        $this->postsStashesDAO->createPostsStashes($post, $stashId);
        
        $this->notificationService->notifPostStashReologized($postId, $sharerId, $stashId);
        
        return $post;
    }
    
    /**
     * Return all postsStashes for given stash id with max result n
     */
    public function getPostsByStash($stashId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        return $this->postsStashesDAO->getPostsStashesForStash($stashId, $offset, $n);
    }
    
    /**
     * Return all posts for given stashes ids with max result n
     * @param int $userId it's just to identify a redis key, random is allow
     */
    public function getPostByStashes($stashIdsArray, $userId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        return $this->postsStashesDAO->getPostByStashes($stashIdsArray, $userId, $offset, $n);
    }
    
    public function getPostsIdsByStashesKey($stashIdsArray, $userId, $compute) {
        return $this->postsStashesDAO->getPostsIdsByStashesKey($stashIdsArray, $userId, $compute);
    }
    
    /* Channel related functions */
    
    public function getPostsForChannel($channelId, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        return $this->postsChannelsDAO->getPostsForChannel($channelId, $offset, $n);
    }
    
    /**
     * Return all posts for given channel ids with max result n
     */
    public function getPostsByChannels($channelIdsArray, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $postsCard = array();
        
        foreach ($channelIdsArray as $channelId) {
            $posts = $this->postsChannelsDAO->getPostsForChannel($channelId, $offset, $n);
            if (sizeof($posts) > 0) {
                foreach ($posts as $post) {
                    $postsCard[] = $post;
                }
            }
        }
        return $postsCard;
    }
    
    public function getPostsIdsByChannelsKey($channelsIdsArray, $userId, $compute) {
        return $this->postsChannelsDAO->getPostsIdsByChannelsKey($channelsIdsArray, $userId, $compute);
    }
    
    public function getCachedPostsCardsForOlogyPrefix($ologyPrefix, $pageOffset, $n) {
        $offset = $pageOffset * $n;
        $ologies = $this->ologyDAO->getOlogiesByPrefix($ologyPrefix);
        
        $posts = array();
        foreach ($ologies as $ology) {
            $ologyId = $ology['id'];
            $newPosts = $this->postDAO->getCachedPostsCardsForOlogy($ologyId, $offset, $n);
            $posts = array_merge($posts, $newPosts);
        }
        
        return $posts;
    }
    
    // WTF?
    public function getPostsForUser($postFounderId, $postId){
        return $this->postDAO->getPostsForUser($postFounderId, $postId);
    }
    
    /**
     * Compute recents posts for user home page
     * @return array Posts
     */
    public function getHomePagePosts($userId, $ologyIdsArray, $channelIdsArray, $stashesIdsArray, $followedUsersAndOlogiesArray, $offset, $n) {
        $compute = $offset > 0 ? FALSE : TRUE;
        $postsIdsOlogiesKey = $this->getPostsIdsByOlogiesKey($ologyIdsArray, $userId, $compute);
        $postsIdsChannelsKey = $this->getPostsIdsByChannelsKey($channelIdsArray, $userId, $compute);
        $postsIdsStashesKey = $this->getPostsIdsByStashesKey($stashesIdsArray, $userId, $compute);
        $postsIdsForUsersByOlogiesKey = $this->getPostsIdsForUsersByOlogiesKey($followedUsersAndOlogiesArray, $userId, $compute);
        $keysArray = array($postsIdsOlogiesKey, $postsIdsChannelsKey, $postsIdsStashesKey, $postsIdsForUsersByOlogiesKey);
        
        $posts = $this->postDAO->getHomePagePosts($userId, $keysArray, $offset, $n);
        
        return $posts;
    }

    public function getSlug($postId){
        return $this->postDAO->getSlug($postId);
    }
}

?>
