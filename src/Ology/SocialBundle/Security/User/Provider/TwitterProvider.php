<?php

namespace Ology\SocialBundle\Security\User\Provider;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Session;
use Ology\SocialBundle\Resources\config\config_path;
use \TwitterOAuth;
use FOS\UserBundle\Entity\UserManager;
use Symfony\Component\Validator\Validator;

use Ology\SocialBundle\DAO\UserDAO;

class TwitterProvider implements UserProviderInterface {

    /**
     * @var \Twitter
     */
    protected $twitter_oauth;
    protected $userManager;
    protected $validator;
    protected $session;
    protected $userDAO;

    public function __construct(TwitterOAuth $twitter_oauth, UserManager $userManager, Validator $validator, Session $session, UserDAO $userDAO) {
        $this->twitter_oauth = $twitter_oauth;
        $this->userManager = $userManager;
        $this->validator = $validator;
        $this->session = $session;
        $this->userDAO = $userDAO;
    }

    public function supportsClass($class) {
        return $this->userManager->supportsClass($class);
    }

    public function findUserByTwitterId($twitterID) {
        return $this->userManager->findUserBy(array('twitterId' => $twitterID));
    }

    public function loadUserByUsername($username) {
        $user = $this->findUserByTwitterId($username);

        $this->twitter_oauth->setOAuthToken($this->session->get('access_token'), $this->session->get('access_token_secret'));

        try {
            $info = $this->twitter_oauth->get('account/verify_credentials');
        } catch (Exception $e) {
            $info = null;
        }

        if (!empty($info)) {
            // User connects succesfully for the first time
            if (empty($user)) {
                $user = $this->userManager->createUser();
                $user->setEnabled(true);
                $user->setPassword('');
//                $user->setAlgorithm('');
                $user->setTwitterID($info->id);
                $username = $info->screen_name;
                $user->setTwitterUsername($username);
                $user->setEmail($username . '@twitterToCheck.com');
                $user->setFirstname($info->name);

                $urlProfilPicture = $info->profile_image_url;
                if (!empty($urlProfilPicture)){
                    $fileName = $this->userDAO->saveWebImageForUser($urlProfilPicture);
                    if ($fileName) {
                        $user->setImageUrl($fileName);
                    }
                }
            }

            // Do every time user connects to Ology using Twitter signin
            //
            // ---------------------------------------------------------
                
            $this->userManager->updateUser($user);
        }

        if (empty($user)) {
            throw new UsernameNotFoundException('The user is not authenticated on twitter');
        }

        return $user;
    }

    public function refreshUser(UserInterface $user) {
        if (!$this->supportsClass(get_class($user)) || !$user->getTwitterID()) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getTwitterID());
    }

}