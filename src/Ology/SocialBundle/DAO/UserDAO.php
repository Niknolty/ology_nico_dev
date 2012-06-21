<?php

namespace Ology\SocialBundle\DAO;

use Doctrine\ORM\EntityManager;
use Ology\SocialBundle\Entity\Membership;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Cache\UserCache;
use Ology\SocialBundle\Entity\Interest;
use Ology\SocialBundle\Exceptions\DAOException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ology\SocialBundle\Utility\ImagickService;
use FOS\UserBundle\Model\UserManager;
use Ology\SocialBundle\DAO\CacheDAO\UserCacheDAO;

use Ology\SocialBundle\Utility\S3Loader;

class UserDAO {
    const USER_IMG_PREFIX = 'user_';
    const USER_IMG_BIG_WSIZE = 250;
    const USER_IMG_MID_WSIZE = 60;
    const USER_IMG_SMA_WSIZE = 30;

    protected $em;
    protected $userManager;
    protected $userCache;
    protected $userCacheDAO;
    protected $container;
    protected $s3loader;
    protected $tmp_dir;

    function __construct(EntityManager $em, UserManager $userManager, $container, UserCacheDAO $userCacheDAO, UserCache $userCache) {
        $this->em = $em;
        $this->userManager = $userManager;
        $this->userCache = $userCache;
        $this->userCacheDAO = $userCacheDAO;
        $this->container = $container;
        $this->s3loader = new S3Loader($this->container);
        $this->tmp_dir = $this->container->getParameter('tmp_dir');
    }

    public function updateUser($userId, $firstName, $lastName, $email, $newPlainPassword, $newConfirmationPassword, $birthday, $displayBDay, $displayYear, $sex, $location, $occupation, $summary, $top1, $top2, $top3, $webSite1, $webSite2, $website3, $imageFile, $doNotEmail, $edTitle = NULL, $edTwitter = NULL, $edChannelId = NULL) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);

        if (!$user)
            throw new DAOException('No user found for id ' . $userId);

        $user->setDoNotEmail($doNotEmail);
        if ($doNotEmail) {
            $user->setAcceptsNotifNewMember(false);
            $user->setAcceptsNotifNewPost(false);
            $user->setAcceptsNotifNewCommentOwnPost(false);
            $user->setAcceptsNotifNewCommentOtherPost(false);
        }
        
        if ($edTitle != NULL)
            $user->setEditorTitle($edTitle);
        if ($edTwitter != NULL)
            $user->setEditorTwitterId($edTwitter);
        if ($edChannelId != NULL) {
            $channel = $this->em->getReference('OlogySocialBundle:Channel', $edChannelId);
            $user->setMainChannel($channel);
        }
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setEmail($email);
        $user->setBirthday($birthday);
        $user->setDisplayBday($displayBDay);
        $user->setDisplayYear($displayYear);
        $user->setSex($sex);
        $user->setLocation($location);
        $user->setOccupation($occupation);
        $user->setSummary($summary);
        if ($top1 != NULL && strlen($top1) > 0)
            $user->setTop1($top1);
        else
            $user->setTop1(null);

        if ($top2 != NULL && strlen($top2) > 0)
            $user->setTop2($top2);
        else
            $user->setTop2(null);

        if ($top3 != NULL && strlen($top3) > 0)
            $user->setTop3($top3);
        else
            $user->setTop3(null);

        $user->setWebsite1($webSite1);
        $user->setWebsite2($webSite2);
        $user->setWebsite3($website3);
        if ($imageFile != NULL) {
            $oldFile = $user->getImageUrl();
            $ext = $imageFile->guessExtension();
            $fileName = uniqid(UserDAO::USER_IMG_PREFIX, true) . "." . $ext;

            $this->moveAndResizeImage($imageFile, $fileName);
            $user->setImageUrl($fileName);
            // remove old file
            $this->deleteImage($oldFile, $userId);
        }

        $this->userManager->updateCanonicalFields($user);

        if ($newPlainPassword == $newConfirmationPassword && strlen($newConfirmationPassword) >= 4) {
            $user->setPlainPassword($newPlainPassword);
            $this->userManager->updatePassword($user);
        }

        $this->em->flush($this);
        
        // We remove the user in Redis. This will force to call DB and to save it with updated infos.
        $this->userCacheDAO->deleteUser($userId);

        return $user;
    }
    
    public function updateProfileImage($userId, $imageFile) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);

        if (!$user)
            throw new DAOException('No user found for id ' . $userId);

        if ($imageFile != NULL) {
            $oldFile = $user->getImageUrl();

            $ext = $imageFile->guessExtension();
            $fileName = uniqid(UserDAO::USER_IMG_PREFIX, true) . "." . $ext;
            $this->moveAndResizeImage($imageFile, $fileName);
            // remove old file
            $this->deleteImage($oldFile, $userId);
            $user->setImageUrl($fileName);
            
            // Update Redis too
            $this->userCacheDAO->updateProfileImage($userId, $fileName);
        }
        
        $this->em->flush($this);
        
        return $imageFile;
    }

    public function getAll() {
        return $this->em->getRepository('OlogySocialBundle:User')->findAll();
    }

    public function saveWebImageForUser($url) {
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

        $fileName = uniqid(UserDAO::USER_IMG_PREFIX, true);
        $fileName = $this->moveAndResizeImage($image, $fileName, 'web');
        return $fileName;
    }

    public function updateFbPicture($userId) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);
        if ($user) {
            $username = $user->getFbId();
            if ($username) {
                $url = 'http://graph.facebook.com/' . $username . '/picture?type=large';
                $fileName = $this->saveWebImageForUser($url);
                if ($fileName){
                    $user->setFbImage($fileName);
                    $this->em->flush();
                }
            }
        }
    }
    
    // Add by Nicolas Le Deaut 05/10/2012, function which get a random image for the user
    public function get_random_user_image(){
        $user_img_tab = array("default.jpg", "user_blue.jpg", "user_green.jpg", "user_orange.jpg", "user_purple.jpg", "user_yellow.jpg");
        $index = rand(0,5);
        return $user_img_tab[$index];
    }
    // End  
    
    public function updateRandomImage($userId) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);
        if ($user) {
            $img = $this->get_random_user_image();
            $user->setImageUrl($img);
            $this->em->flush();
            
            // Update in Redis
            $this->userCacheDAO->updateProfileImage($userId, $img);
        }    
    }
 
    public function updateMultiUsersByArray($userIds, $newValues) {
        foreach ($userIds as $userId) {
            $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);

            if (!$user)
                throw new DAOException('No user found for id ' . $userId);

            // We remove the user in Redis. This will force to call DB and to save it with updated infos.
            $this->userCacheDAO->deleteUser($userId);
            
            foreach ($newValues as $key => $value) {
                switch ($key) {
                    case User::FB_ID:
                        $user->setFbId($value);
                        break;

                    case User::FB_TOKEN:
                        $user->setFbToken($value);
                        break;

                    case User::EMAIL:
                        $user->setEmail($value);
                        break;

                    case User::EMAIL_CAN:
                        $user->setEmailCanonical($value);
                        break;

                    case User::ENABLED:
                        $user->setEnabled($value);
                        break;

                    case User::USERNAME:
                        $user->setUsernameCanonical($value);
                        break;

                    case User::USERNAME_CAN:
                        $user->setUsernameCanonical($value);
                        break;

                    case User::FIRSTNAME:
                        $user->setFirstname($value);
                        break;

                    case User::CRED_EXPIRED:
                        $user->setCredentialsExpired($value);

                    case User::LASTNAME:
                        $user->setLastname($value);
                        break;

                    case User::LOCKED:
                        $user->setLocked($value);
                        break;

                    case User::EMAIL_INIT:
                        $user->setInitEmail($value);
                        break;

                    case User::LAST_RETRIEVED_FB:
                        $user->setLastGotFbInfo($value);
                        break;

                    case User::LAST_BUGGED:
                        $user->setLastBuggedViaEmail($value);
                        break;

                    case User::TWITTER_ID:
                        $user->setTwitterID($value);
                        break;
                    
                    case User::TWITTER_USERNAME:
                        $user->setTwitterUsername($value);
                        break;
                    
                    default:
                        break;
                }
            }
        }
        $this->em->flush();
    }
    
    public function updateUserByArray($userId, $newValues) {
        $this->updateMultiUsersByArray(array($userId), $newValues);
    }

    public function updateUserNotification($userId, $acceptsNotifNewMember, $acceptsNotifNewPost, $acceptsNotifNewCommentOwnPost, $acceptsNotifNewCommentOtherPost, $acceptsNotifNewFollower) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);

        if (!$user)
            throw new DAOException('No user found for id ' . $userId);

        $user->setAcceptsNotifNewMember($acceptsNotifNewMember);
        $user->setAcceptsNotifNewPost($acceptsNotifNewPost);
        $user->setAcceptsNotifNewCommentOwnPost($acceptsNotifNewCommentOwnPost);
        $user->setAcceptsNotifNewCommentOtherPost($acceptsNotifNewCommentOtherPost);
        $user->setAcceptsNotifNewFollower($acceptsNotifNewFollower);

        $this->em->flush($this);
        return $user;
    }

    function deleteUser($userId) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);

        if (!$user)
            return false;

        $this->deleteImage($user->getImageUrl(), $userId);

        $user->setisActive(0);
        $this->em->flush();
        
        // Delete in parallele in REDIS
        $this->userCacheDAO->deleteUser($userId);
        
        return true;
    }

    public function getUser($userId) {
        // Try getting user from REDIS cache, else loading DB then cache it
        $user = $this->userCacheDAO->getUser($userId);
        if (!empty($user))
            return $user;
        
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);
        if (!$user)
            throw new DAOException('No user found for id ' . $userId);

        // Save in parallele in REDIS
        $this->userCacheDAO->createUser($user);
        
        return $user;
    }

    public function getUserByEmail($userEmail) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->findOneBy(array('email' => $userEmail));
        if (!$user)
            throw new DAOException('No user found for email ' . $userEmail);

        return $user;
    }

    public function getUserByEmailWithoutException($userEmail) {
        return $this->em->getRepository('OlogySocialBundle:User')->findOneBy(array('email' => $userEmail));
    }

    public function getUsers() {
        return $this->em->getRepository('OlogySocialBundle:User')->findAll();
    }
    
    public function getUsersIds() {
        $query = $this->em->createQuery('SELECT u.id FROM Ology\SocialBundle\Entity\User u');
        $usersIds = $query->getResult();

        $ids = array();
        foreach ($usersIds as $userId) {
            $ids[] = $userId['id'];
        }
        
        return $ids;
    }
    
    public function getUsersLastBuggedBeforeFixedTime($time) {
        $sql = "SELECT u.id, u.firstName, u.lastName, u.email 
                FROM OlogySocialBundle:User u 
                WHERE u.doNotEmail <> 1
                AND u.lastBuggedViaEmail IS NULL
                OR u.lastBuggedViaEmail < ?1";
        $query = $this->em->createQuery($sql);
        $query->setParameter(1, $time);
        $res = $query->getResult();
        
        $users = array();
        foreach ($res as $line) {
            $user = new User();
            $user->setId($line['id']);
            $user->setFirstname($line['firstName']);
            $user->setLastname($line['lastName']);
            $user->setEmail($line['email']);
            $user->setDoNotEmail(true);
            $users[] = $user;
        }
        return $users;
    }
    
    public function setLastTimeBugged($users, $time) {
        foreach ($users as $user) {
            $user->setLastBuggedViaEmail($time);
        }
        $this->em->flush();
    }

    public function setInterests($userId, array $interests) {
        $user = $this->em->getRepository('OlogySocialBundle:User')->find($userId);
        
        $this->em
            ->createQuery('DELETE OlogySocialBundle:Interest i WHERE i.user = ?1')
            ->setParameter(1, $userId)
            ->getResult();
        
        foreach ($interests as $interest) {
            $i = new Interest();
            $i->setUser($user);
            $i->setName($interest);
            $this->em->persist($i);
        }
        
        $this->em->flush();
    }
    
    public function getInterests($userId, $offset = 0, $n = 99999) {
        $q = $this->em->createQueryBuilder()
                        ->add('select', 'i')
                        ->from('OlogySocialBundle:Interest', 'i')
                        ->where('i.user = ?1')
                        ->getQuery()
                        ->setParameter(1, $userId)
                        ->setFirstResult($offset)
                        ->setMaxResults($n);
    
        return $q->getResult();
    }

    private function moveAndResizeImage($image, $fileName, $from = 'file') {
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
            $this->s3loader->createObject($this->tmp_dir . $fileName, $this->container->getParameter('user_original_image_path') . $fileName);

            if (ImagickService::resizeImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, UserDAO::USER_IMG_MID_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileName, $this->container->getParameter('user_medium_image_path') . $fileName );
            if (ImagickService::resizeImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, UserDAO::USER_IMG_BIG_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileName, $this->container->getParameter('user_large_image_path') . $fileName );
            if (ImagickService::resizeImage($this->tmp_dir . $fileName, $this->tmp_dir . 'resized_' . $fileName, UserDAO::USER_IMG_SMA_WSIZE) )
                $this->s3loader->createObject($this->tmp_dir . 'resized_' . $fileName, $this->container->getParameter('user_small_image_path') . $fileName );
            unlink($this->tmp_dir . 'resized_' . $fileName);
            unlink($this->tmp_dir . $fileName);
            return $fileName;
        } else {
            return false;
        }
    }

    private function deleteImage($fileName, $message = ''){
        if ($fileName && $fileName != 'default.jpg') {
            try {
                $this->s3loader->deleteObject($this->container->getParameter('user_original_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('user_medium_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('user_large_image_path') . $fileName );
                $this->s3loader->deleteObject($this->container->getParameter('user_small_image_path') . $fileName );
            } catch (\ErrorException $e) {
                throw new DAOException("UserDAO: updateUser($message): Cannot remove oldfile: $fileName");
            }
        }
    }
    
    public function getTopOlogists($Ologies){
        return $this->userCache->getTopOlogists($Ologies);
    }
    
}

?>
