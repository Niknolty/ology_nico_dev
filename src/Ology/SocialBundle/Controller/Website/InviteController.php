<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Entity\Invite;
use Ology\SocialBundle\Forms\Invite\InviteForm;
use Ology\SocialBundle\Forms\Invite\InviteList;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InviteController extends BaseWebController {
    
    /**
     * @Route("/invite", name="_website_invite")
     * @Template("OlogySocialBundle:FrontEnd:invite.html.twig")
     */
    public function getInvitePage(Request $request) {
        $this->preExecute(true, true);
        
        if (!$this->array['loggedIn'])
            return $this->redirect($this->generateUrl('_website_home'));

        $this->get('social.service.appmanager')->initApplication();

        $invites = new InviteList();
        $form = $this->createForm(new InviteForm($this->user), $invites);
        $this->array['inviteForm'] = $form->createView();
        
        if ($request->query->has('ok')) {
            $this->array['ok'] = true;
        }
        return $this->array;
    }

    /**
     * @Route("/invite/fb", name="_website_invite_fb")
     * @Template("OlogySocialBundle:FrontEnd:invite_facebook.html.twig")
     */
    public function getFacebookFriendsPage(Request $request) {
        $this->preExecute(true, true);
        
        $this->get_facebook_info();
        //if ($request->query->has('clickedFb')) {
            $this->array['clickedFb'] = true;
            $fbId = $this->user->getFbId();
            $token = $this->user->getFbToken();
            
            if (!$fbId || !$token) {
                $this->array['fbError'] = true;
            } else {
                $url = "https://graph.facebook.com/$fbId/friends?access_token=$token";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $content = curl_exec($ch);
                if (preg_match("/OAuthException/i", $content)) {
                    $this->array['fbError'] = true;
                } else {
                    $friends = array();
                    if ($content) {
                        $friends = json_decode($content)->data;
                        $aFriends = array();
                        foreach($friends as $friend) {
                            $aFriends[$friend->name] = $friend->id;
                        }
                        ksort($aFriends);
                        $this->array['friends'] = $aFriends;
                    } else {
                        $this->array['friends'] = $friends;
                    }
                    curl_close($ch);

                    $invites = new InviteList();
                    $form = $this->createForm(new InviteForm($this->user), $invites);
                    $this->array['inviteForm'] = $form->createView();
                }
            }
        //} else {
        //    
        //}
        $this->array['fb_controller_path'] = '_website_invite_fb_redirect';
        return $this->array;
    }
    
    /**
     * @Route("/invite/fb/red", name="_website_invite_fb_redirect")
     */
    public function updateUserToken() {
        $this->preExecute(false, false);
        $fbArray = $this->get_facebook_info();
        
        $fbUser = $fbArray['user'];
        $fbId = $fbUser['id'];
        $fbToken = $fbArray['access_token'];
        
        $newValues = array(User::FB_ID => $fbId, User::FB_TOKEN => $fbToken);
        $this->get('social.service.user')->updateUserByArray($this->user->getId(), $newValues);
        
        return $this->redirect($this->generateUrl('_website_invite_fb') . "?clickedFb=1");
    }
    
    /**
     * @Route("/invite/gmail", name="_website_invite_gmail")
     * @Template("OlogySocialBundle:FrontEnd:invite_gmail.html.twig")
     */
    public function getGmailFriendsPage(Request $request) {
        $this->preExecute(true, true);
        $friends = array();
        
        if ($request->query->has('token')) {
            $tok = $request->query->get('token');
            $result = curl_init("https://www.google.com/accounts/AuthSubSessionToken");
            curl_setopt($result, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($result, CURLOPT_HTTPHEADER, array("Authorization: AuthSub token=\"$tok\""));
            curl_setopt($result, CURLOPT_VERBOSE, 1);
            curl_setopt ($result, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt ($result, CURLOPT_TIMEOUT, 120);
            $response_h = curl_exec($result);
            curl_close($result);
            // get the sessiontoken
            $pieces = explode("Token=", $response_h);
            if (count($pieces) <= 1) {
                $this->array['error'] = true;
            } else {
                $session = curl_init("http://www.google.com/m8/feeds/contacts/default/full?max-results=9999&alt=json");
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($session, CURLOPT_HTTPHEADER, array("Authorization: AuthSub token=\"".$pieces[1]."\""));
                curl_setopt($session, CURLOPT_VERBOSE, 1);
                curl_setopt ($session, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt ($session, CURLOPT_TIMEOUT, 120);
                $response_session = curl_exec($session);
                curl_close($session);

                //get the data to an array
                $json_a = json_decode($response_session, true);
                foreach($json_a['feed']['entry'] as $contact) {
                    if (array_key_exists('title', $contact) &&
                            array_key_exists('gd$email', $contact))
                    $friends[$contact['title']['$t']] = $contact['gd$email']['0']['address'];
                }
                ksort($friends);
                $this->array['contacts'] = $friends;
                
                $invites = new InviteList();
                $form = $this->createForm(new InviteForm($this->user), $invites);
                $this->array['inviteForm'] = $form->createView();
            }
        }
        
        $this->array['url'] = $this->container->getParameter('website_url');
        return $this->array;
    }
    
    /**
     * @Route("/invite/fb/send", name="_website_invite_fb_send")
     */
    public function sendFbInvites(Request $request) {
        $this->preExecute(false, false);
        $inviterToken = $this->user->getFbToken();
        $siteUrl = $this->container->getParameter('website_url');
        $imageSiteUrl = $this->container->getParameter('assets_base_urls') .
                        $this->container->getParameter('s3_bucket') . '/';
        $ology_medium_image_path = $this->container->getParameter('ology_medium_image_path');
        
        $friendsEmails = $request->request->get("friends");
        $form = $request->request->get("inviteForm");
        $ologyId = $form['ologyId'];
        $msg = $form['msg'];
        $msg = urlencode($msg);
        $debug = array();
        if ($ologyId == -1) {
                $picture = $imageSiteUrl . "bundles/ologysocial/img/ology_round_logo.jpg";
                $name = urlencode("You’re invited!  Join Ology.com.");
                $desc = urlencode("Join me on Ology.com. Post, share, and discover all your passions in one place.");
            }
            else {
                $ology = $this->get('social.service.ology')->getOlogy($ologyId);
                $picture = $imageSiteUrl . $ology_medium_image_path  . $ology->getImageUrl();
                $desc = urlencode('You love this as much as I do.  Click "follow" and join me on Ology.com.');
                $name = urlencode("You are invited to " . $ology->getName() . " on Ology.com!");
            }
        
        $friends = $request->request->get("friends");
        foreach($friends as $friendFbId) {
            $invite = $this->get('social.service.invite')->createFbInvite($this->user->getId(), $friendFbId);
            if ($ologyId == -1)
                $path = $this->generateUrl('_website_register_invite_general', array('inviteId' => $invite->getId()));
            else
                $path = $this->generateUrl('_website_ology_invite', array('id' => $ologyId, 'inviteId' => $invite->getId()));
            $link = urlencode($siteUrl . $path);
            $url = "https://graph.facebook.com/$friendFbId/feed";
            $postData = "access_token=$inviterToken&message=$msg&link=$link&picture=$picture&name=$name&description=$desc";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            $debug[] = curl_exec($ch);
            curl_close($ch);
        }
        //die(\Ology\SocialBundle\Utility\TVarDumper::dump($debug, 2, true));
        return $this->redirect($this->generateUrl('_website_invite') . "?ok=1");
    }
    
    /**
     * @Route("/invite/gmail/send", name="_website_invite_gmail_send")
     */
    public function sendGmailInvites(Request $request) {
        $this->preExecute(false, false);
        
        $friendsEmails = $request->request->get("friends");
        $form = $request->request->get("inviteForm");
        $ologyId = $form['ologyId'];
        $msg = $form['msg'];
        
        if ($ologyId == -1)
            $invites = $this->get('social.service.invite')->createGeneralInvitesGmail($this->user->getId(), $friendsEmails, $msg);
        else {
            $invites = $this->get('social.service.invite')->createOlogyAnonInvitesGmail($this->user->getId(), $ologyId, $friendsEmails, $msg);
        }
        return $this->redirect($this->generateUrl('_website_invite') . "?ok=1");
    }

    /**
     * @Route("/invite/send", name="_website_invite_send")
     */
    public function sendOlogyInvites(Request $request) {
        $this->preExecute(false, false);
        
        $form = $request->request->get("inviteForm");
        $ologyId = $form['ologyId'];
        $msg = $form['msg'];
        $friendsEmails = array();
        for ($i = 1; $i < 7; $i++) {
            if ($form['email' . $i] != "")
                $friendsEmails[] = $form['email' . $i];
        }

        if ($ologyId == -1)
            $invites = $this->get('social.service.invite')->createGeneralInvitesOlogy($this->user->getId(), $friendsEmails, $msg);
        else {
            $invites = $this->get('social.service.invite')->createOlogyAnonInvitesOlogy($this->user->getId(), $ologyId, $friendsEmails, $msg);
        }
        
        return $this->redirect($this->generateUrl('_website_invite') . "?ok=1");
    }

    /**
     * @Route("/invite/{ologyId}", name="_website_invite_from_ology")
     * @Template("OlogySocialBundle:FrontEnd:invite.html.twig")
     */
    public function getOlogyInvitePage(Request $request, $ologyId) {
        $this->preExecute(true, true);

        if (!$this->array['loggedIn'])
            return $this->redirect($this->generateUrl('_website_home'));

        $this->get('social.service.appmanager')->initApplication();

        $invites = new InviteList();
        $form = $this->createForm(new InviteForm($this->user), $invites);
        $this->array['inviteForm'] = $form->createView();
        $this->array['ologyId'] = $ologyId;

        if ($request->query->has('ok')) {
            $this->array['ok'] = true;
        }
        return $this->array;
    }
}

?>
