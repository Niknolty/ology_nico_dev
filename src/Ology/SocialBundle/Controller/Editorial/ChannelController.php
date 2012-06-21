<?php

namespace Ology\SocialBundle\Controller\Editorial;

use Ology\SocialBundle\Controller\Website\BaseWebController;
use Ology\SocialBundle\Entity\Channel;
use Ology\SocialBundle\Forms\Channel\ChannelForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChannelController extends BaseWebController {
    /**
     * @Route("/list", name="_editors_channel_list")
     * @Template("OlogySocialBundle:Editorial:channel_list.html.twig")
     */
    public function getListChannelPage() {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $channels = $this->get('social.service.channel')->getChannels();
        $this->array['channels'] = $channels;
        
        return $this->array;
    }
    
    /**
     * @Route("/edit/{stub}", name="_editors_channel_edit_form")
     * @Template("OlogySocialBundle:Editorial:edit_channel.html.twig")
     */
    public function getEditChannelPage($stub = NULL) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $channel = $this->get('social.service.channel')->getChannel($stub);
        $form = $this->createForm(new ChannelForm(), $channel);

        $this->array['channelForm'] = $form->createView();
        $this->array['channel'] = $channel;
        
        return $this->array;
    }
    
    /**
     * @Route("/save", name="_editors_channel_store")
     */
    public function storeChannel(Request $request) {
        $this->preExecute(false, false);        
        $this->get('social.service.appmanager')->initApplication();

        $channelService = $this->get('social.service.channel');
        $reqForm = $request->request->get('channelForm');

        $channel = $channelService->getChannel($reqForm['stub']);
        
        $ad0 = $reqForm['ad0'];
        $ad1 = $reqForm['ad1'];
        $ad2 = $reqForm['ad2'];
        $ad3 = $reqForm['ad3'];
        $ad4 = $reqForm['ad4'];
        $ad5 = $reqForm['ad5'];
        $ad6 = $reqForm['ad6'];
        $video = $reqForm['video'];
        $postId1 = $reqForm['featuredPost1id'];
        $postId2 = $reqForm['featuredPost2id'];
        $postId3 = $reqForm['featuredPost3id'];
        $postId4 = $reqForm['featuredPost4id'];
        $postId5 = $reqForm['featuredPost5id'];
        $sPostId1 = $reqForm['specialPost1id'];
        $sPostId2 = $reqForm['specialPost2id'];
        $sPostId3 = $reqForm['specialPost3id'];
        $sPostTitle = $reqForm['specialTitle'];
    
        $channel = $channelService->storeChannel($channel->getStub(), 
                $ad0, $ad1, $ad2, $ad3, $ad4, $ad5, $ad6, $video,
                $postId1, $postId2, $postId3, $postId4, $postId5, $sPostTitle, $sPostId1, $sPostId2, $sPostId3);
        
        return $this->redirect($this->generateUrl('_website_channel', array('stub' => $channel->getStub())));
    }
    
    /**
     * @Route("/curate/", name="_editors_channel_add_post")
     */
    public function curatePost(Request $request) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();
        
        $reqForm = $request->request->get('curateForm');
        $channelId = $reqForm['channelId'];
        $postId = $reqForm['postId'];
        
        $pc = $this->get('social.service.channel')->curatePost($postId, $channelId, $this->user->getId());
        
        $response = new Response("Post $postId has been added to news page.");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/uncurate/", name="_editors_channel_remove_post")
     */
    public function unCuratePost(Request $request) {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $reqForm = $request->request->get('uncurateForm');
        $channelId = $reqForm['channelId'];
        $postId = $reqForm['postId'];
        
        $this->get('social.service.channel')->unCuratePost($postId, $channelId);
        
        $response = new Response("Post $postId has been removed from news page.");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/sponsor/store", name="_sponsor_store")
     */
    public function storeSponsor(Request $request) {
        $reqForm = $request->request->get('sponsorForm');
        
        $name = $reqForm['name'];
        $tag = $reqForm['tag'];
        
        $this->get('social.service.sponsor')->addSponsor($name, "", $tag);
        return $this->redirect($this->generateUrl('_website_home'));
    }
    
    /**
     * @Route("/sponsor", name="_sponsor_display")
     * @Template("OlogySocialBundle:Admin:sponsor.html.twig")
     */
    public function displaySponsorPage() {
        return array();
    }
}  
?>