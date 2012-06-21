<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ology\SocialBundle\Service\LabelService;

/**
 * Description of LabelController
 *
 * @author erwan
 */
class LabelController  extends Controller{

    /**
     * @Route("/create", name="_label_create")
     * @Template("OlogySocialBundle:Label:create.html.twig")
     */
    public function createAction(){
        
        $labelService = $this->get('social.service.label');   
        
        //TODO: delete this test
        $name = 'test';        
        
        $label = $labelService->createLabel($name);
        
        return array ('label' => $label);
    }
    
     /**
     * @Route("/update", name="_label_update")
     * @Template("OlogySocialBundle:Label:update.html.twig")
     */
    public function updateAction(){
        
        $labelService = $this->get('social.service.label');   
        
        //TODO: delete this test
        $labelId = 1;
        $name = 'updated';
        
        $label = $labelService->updateLabel($labelId, $name);
        
        return array ('label' => $label);
    }
    
    /**
     * @Route("/get/{id}", name="_label_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Label:get.html.twig")
     */
    public function getAction($id){
        
        $labelService = $this->get('social.service.label');   
                
        $label = $labelService->getLabel($id);
        
        return array ('label' => $label);
    }
    
    
    /**
     * @Route("/delete/{id}", name="_label_delete", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Label:delete.html.twig")
     */
    public function deleteAction($id){
        
        $labelService = $this->get('social.service.label');   
                
        $result = $labelService->deleteLabel($id);
        
        return array ('result' => $result);
    }      
    
}

?>
