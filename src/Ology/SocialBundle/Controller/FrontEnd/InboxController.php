<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ology\SocialBundle\Service\InboxService;

/**
 * Description of InboxController
 *
 * @author erwan
 */
class InboxController extends Controller{

    /**
     * @Route("/create", name="_inbox_create")
     * @Template("OlogySocialBundle:Inbox:create.html.twig")
     */
    public function createAction(){
        
        $inboxService = $this->get('social.service.inbox');   
        
        //TODO: delete this test
        $userId = 1;        
        
        $inbox = $inboxService->createInbox($userId);
        
        return array ('inbox' => $inbox);
    }
    
     /**
     * @Route("/update", name="_inbox_update")
     * @Template("OlogySocialBundle:Inbox:update.html.twig")
     */
    public function updateAction(){
        
        $inboxService = $this->get('social.service.inbox');   
        
        //TODO: delete this test
        $userId = 1;
        $date = new \DateTime('now');
        
        $inbox = $inboxService->updateInbox($userId, $date);
        
        return array ('inbox' => $inbox);
    }
    
    /**
     * @Route("/get/{id}", name="_inbox_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Inbox:get.html.twig")
     */
    public function getAction($id){
        
        $inboxService = $this->get('social.service.inbox');   
                
        $inbox = $inboxService->getInbox($id);
        
        return array ('inbox' => $inbox);
    }
    
    
    /**
     * @Route("/delete/{id}", name="_inbox_delete", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Inbox:delete.html.twig")
     */
    public function deleteAction($id){
        
        $inboxService = $this->get('social.service.inbox');   
                
        $result = $inboxService->deleteInbox($id);
        
        return array ('result' => $result);
    }    
}

?>
