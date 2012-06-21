<?php


namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ology\SocialBundle\Service\MessageService;

/**
 * Description of MessageServiceController
 *
 * @author erwan */

class MessageController extends Controller {


    /**
     * @Route("/create", name="_message_create")
     * @Template("OlogySocialBundle:Message:create.html.twig")
     */
    public function createAction(){
        
        $messageService = $this->get('social.service.message');   
        
        //TODO: delete this test
        $inboxId = 1;
        $senderId = 2;
        $subject = 'test subject';
        $body = 'blabla';
        
        $message = $messageService->createMessage($inboxId, $senderId, $subject, $body);
        
        return array ('message' => $message);
    }
    
     /**
     * @Route("/update", name="_message_update")
     * @Template("OlogySocialBundle:Message:update.html.twig")
     */
    public function updateAction(){
        
        $messageService = $this->get('social.service.message');   
        
        //TODO: delete this test
        $inboxId = 1;
        $messageId = 1;
        $senderId = 3;
        $subject = 'updated';
        $body = 'updated';
        $datereceived = new \DateTime('now');
        $dateread = new \DateTime('now');
        
        $message = $messageService->updateMessage($messageId, $inboxId, $senderId, $subject, $body, $datereceived, $dateread);
        
        return array ('message' => $message);
    }
    
    /**
     * @Route("/get/{id}", name="_message_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Message:get.html.twig")
     */
    public function getAction($id){
        
        $messageService = $this->get('social.service.message');   
                
        $message = $messageService->getMessage($id);
        
        return array ('message' => $message);
    }
    
    
    /**
     * @Route("/delete/{id}", name="_message_delete", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Message:delete.html.twig")
     */
    public function deleteAction($id){
        
        $messageService = $this->get('social.service.message');   
                
        $result = $messageService->deleteMessage($id);
        
        return array ('result' => $result);
    }        
}

?>
