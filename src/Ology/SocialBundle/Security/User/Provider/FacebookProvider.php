<?php

namespace Ology\SocialBundle\Security\User\Provider;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use \BaseFacebook;
use \FacebookApiException;

use Ology\SocialBundle\DAO\UserDAO;

class FacebookProvider implements UserProviderInterface {

    /**
     * @var \Facebook
     */
    protected $facebook;
    protected $userManager;
    protected $validator;
    protected $cache;
    protected $userDAO;

    public function __construct(BaseFacebook $facebook, $userManager, $validator, $cache, UserDAO $userDAO) {
        $this->facebook = $facebook;
        $this->userManager = $userManager;
        $this->validator = $validator;
        $this->cache = $cache;
        $this->userDAO = $userDAO;
    }

    public function supportsClass($class) {
        return $this->userManager->supportsClass($class);
    }

    public function findUserByFbId($fbId) {
        return $this->userManager->findUserBy(array('fbId' => $fbId));
    }

    public function findUserByEmail($email) {
        return $this->userManager->findUserBy(array('email' => $email));
    }

    //  Can implode an array of any dimension
    //  Uses a few basic rules for implosion:
    //        1. Replace all instances of delimeters in strings by '/' followed by delimeter
    //        2. 2 Delimeters in between keys
    //        3. 3 Delimeters in between key and value
    //        4. 4 Delimeters in between key-value pairs
    private function implodeMDA($array, $delimeter, $keyssofar = '') {
        $output = '';
        foreach ($array as $key => $value) {
            if (!is_array($value)) {
                $value = str_replace($delimeter, '/' . $delimeter, $value);
                $key = str_replace($delimeter, '/' . $delimeter, $key);
                if ($keyssofar != '')
                    $key = $key . $delimeter . $delimeter;
                $pair = $key . $keyssofar . $delimeter . $delimeter . $delimeter . $value;
                if ($output != '')
                    $output .= $delimeter . $delimeter . $delimeter . $delimeter;
                $output .= $pair;
            }
            else {
                if ($output != '')
                    $output .= $delimeter . $delimeter . $delimeter . $delimeter;
                if ($keyssofar != '')
                    $key = $key . $delimeter . $delimeter;
                $output .= $this->implodeMDA($value, $delimeter, $key . $keyssofar);
            }
        }
        return $output;
    }

    //  Can explode a string created by corresponding implodeMDA function
    //  Uses a few basic rules for explosion:
    //        1. Instances of delimeters in strings have been replaced by '/' followed by delimeter
    //        2. 2 Delimeters in between keys
    //        3. 3 Delimeters in between key and value
    //        4. 4 Delimeters in between key-value pairs
    private function explodeMDA($string, $delimeter) {
        $output = array();
        $pair_delimeter = $delimeter . $delimeter . $delimeter . $delimeter;
        $pairs = explode($pair_delimeter, $string);
        foreach ($pairs as $pair) {
            $keyvalue_delimeter = $delimeter . $delimeter . $delimeter;
            $keyvalue = explode($keyvalue_delimeter, $pair);
            $key_delimeter = $delimeter . $delimeter;
            $keys = explode($key_delimeter, $keyvalue[0]);
            if (!isset($keyvalue[1]))
                $value = NULL;
            else
                $value = str_replace('/' . $delimeter, $delimeter, $keyvalue[1]);
            $keys[0] = str_replace('/' . $delimeter, $delimeter, $keys[0]);
            $pairarray = array($keys[0] => $value);
            for ($counter = 1; $counter < count($keys); $counter++) {
                $pairarray = array($keys[$counter] => $pairarray);
            }
            $output = array_merge_recursive($output, $pairarray);
        }
        return $output;
    }
    // this function is called on each page when login with facebook
    public function loadUserByUsername($username) {
        $user = $this->findUserByFbId($username);
        $fbdata = null;
        try {
            $fbcacheddata = null;
            //$this->cache->cache_user_setFbData($user->getId(), NULL);
            //die("test");
            // you get the sutff from the cache if it exists
            if (!empty($user))
                $fbcacheddata = $this->cache->cache_user_getFbData($user->getId());


            if ($fbcacheddata) {
                // recreate the fdata from string
               // die($fbcacheddata);
                $fbcacheddata = $this->explodeMDA($fbcacheddata, "-|");
                $fbdata = $fbcacheddata["fbdata"];
                $time = $fbcacheddata["time"];
            }
            // we check the datas every hour
            if (!$fbcacheddata || $time - time() > 3600) {
                //get datas from fb API (very slow)
                $fbdata = $this->facebook->api('/me');
                if ($user) // if the user already exist we cache the datas
                {
                    // put the time when the fbdatas are cached
                    $fbcacheddata = array("time" => time(), "fbdata" => $fbdata);
                    // need to put that in the cache otherwise the site is very very slow!
                    $this->cache->cache_user_setFbData($user->getId(), $this->implodeMDA($fbcacheddata, "-|"));
                }
            }
        } catch (FacebookApiException $e) {
            $fbdata = null;
        }

        if (!empty($fbdata)) {
            if (empty($user)) {
                if (isset($fbdata['email'])){
                    $email = $fbdata['email'];
                }
                if (!empty($email)) // if same email than a previous account we merge them
                    $user = $this->findUserByEmail($email);
                if (!empty($user)) {
                    // adding fb informations to the current account with the same email than the facebook
                    if (isset($fbdata['id'])) {
                        $user->setFbId($fbdata['id']);
                    }
                    if (!$user->getSex() && isset($fbdata['gender'])) {
                        $user->setSex($fbdata['gender']);
                    }
                    if (!$user->getBirthday() && isset($fbdata['birthday'])) {
                        $user->setBirthday($fbdata['birthday']);
                    }
                    if (!$user->getLocation() && isset($fbdata['location']['name'])) {
                        $user->setLocation($fbdata['location']['name']);
                    }
                    if (isset($fbdata['username'])) {
                        $user->setFbUsername($fbdata['username']);
                    }
                    if (!$user->getImageUrl(false) && isset($fbdata['first_name']) && isset($fbdata['last_name']) && isset($fbdata['id'])) {
                        $url = 'http://graph.facebook.com/' . $fbdata['id'] . '/picture?type=large';
                        $fileName = $this->userDAO->saveWebImageForUser($url);
                        if ($fileName) {
                            $user->setImageUrl($fileName);
                        }
                    }
                } else {
                    // we create a new account for the user without anypassword
                    $user = $this->userManager->createUser();
                    $user->setEnabled(true);
                    $user->setPassword('');
//                    $user->setAlgorithm('');
                    // TODO use http://developers.facebook.com/docs/api/realtime

                    if (isset($fbdata['id'])) {
                        $user->setFbId($fbdata['id']);
                        $user->addRole('ROLE_USER');
                    }
                    if (isset($fbdata['first_name'])) {
                        $user->setFirstname($fbdata['first_name']);
                    }
                    if (isset($fbdata['last_name'])) {
                        $user->setLastname($fbdata['last_name']);
                    }
                    if (isset($fbdata['email'])) {
                        $user->setEmail($fbdata['email']);
                        $user->setUsername($fbdata['email']);
                    }
                    else{
                        $user->setEmail($fbdata['id'] . '@facebookToCheck.com');
                        $user->setUsername($fbdata['id'] . '@facebookToCheck.com');
                    }
                    if (isset($fbdata['gender'])) {
                        $user->setSex($fbdata['gender']);
                    }
                    if (isset($fbdata['location']['name'])) {
                        $user->setLocation($fbdata['location']['name']);
                    }
                    if (isset($fbdata['birthday'])) {
                        $user->setBirthday($fbdata['birthday']);
                        $user->setDisplayBday(false);
                    }
                    if (isset($fbdata['username'])) {
                        $user->setFbUsername($fbdata['username']);
                    }
                    if (isset($fbdata['first_name']) && isset($fbdata['last_name']) && isset($fbdata['id'])) {
                        $url = 'http://graph.facebook.com/' .  $fbdata['id'] . '/picture?type=large';
                        $fileName = $this->userDAO->saveWebImageForUser($url);
                        if ($fileName) {
                            $user->setImageUrl($fileName);
                        }
                    }
                }
                // we update the facebook token
                $user->setFbToken($this->facebook->getAccessToken());
                // we always update the username (can change)
                if (isset($fbdata['username']))
                    $user->setFbUsername($fbdata['username']);
                else
                    $user->setFbUsername(NULL);
                // we store the dates updated
                $this->userManager->updateUser($user);
            }

            if (count($this->validator->validate($user, 'Facebook'))) {
                // TODO: the user was found obviously, but doesnt match our expectations, do something smart
                throw new UsernameNotFoundException('The facebook user could not be stored');
            }
        }
        if (empty($user)) {
            throw new UsernameNotFoundException('The user is not authenticated on facebook');
        }
        return $user;
    }

    public function refreshUser(UserInterface $user) {
        if (!$this->supportsClass(get_class($user)) || !$user->getFbId()) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getFbId());
    }

}
