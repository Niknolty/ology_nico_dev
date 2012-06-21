<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ology\SocialBundle\Service\LabelOlogyService;

/**
 * Description of LabelOlogyController
 *
 * @author erwan
 */
class LabelOlogyController extends Controller {

    /**
     * @Route("/create", name="_labelOlogy_create")
     * @Template("OlogySocialBundle:LabelOlogy:create.html.twig")
     */
    public function createAction() {

        $labelOlogyService = $this->get('social.service.labelology');

        //TODO: delete this test
        $labelId = 1;
        $ologyId = 3;
        $userId = 2;

        $labelOlogy = $labelOlogyService->createLabelOlogy($labelId, $ologyId, $userId);

        return array('labelOlogy' => $labelOlogy);
    }
    
        /**
     * @Route("/create/with/label", name="_labelOlogy_create")
     * @Template("OlogySocialBundle:LabelOlogy:create.html.twig")
     */
     public function createLabelOlogyWithLabelName() {
        $labelOlogyService = $this->get('social.service.labelology');
        $result = $labelOlogyService-> createLabelOlogyWithLabelName();
        return array('result' => $result);
     }

    /**
     * @Route("/update", name="_labelOlogy_update")
     * @Template("OlogySocialBundle:LabelOlogy:update.html.twig")
     */
    public function updateAction() {

        $labelOlogyService = $this->get('social.service.labelology');

        //TODO: delete this test
        $labelId = 1;
        $ologyId = 2;
        $userId = 3;
        $timesTagged = 2;

        $labelOlogy = $labelOlogyService->updateLabelOlogy($labelId, $ologyId, $userId, $timesTagged);

        return array('labelOlogy' => $labelOlogy);
    }

    /**
     * @Route("/get/{labelId}/{ologyId}", name="_labelOlogy_get", requirements = {"labelId" = "\d+"}, requirements = {"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:LabelOlogy:get.html.twig")
     */
    public function getAction($labelId, $ologyId) {

        $labelOlogyService = $this->get('social.service.labelology');

        $labelOlogy = $labelOlogyService->getLabelOlogy($labelId, $ologyId);

        return array('labelOlogy' => $labelOlogy);
    }

    /**
     * @Route("/delete/{labelId}/{ologyId}", name="_labelOlogy_delete", requirements = {"labelId" = "\d+"}, requirements = {"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:LabelOlogy:delete.html.twig")
     */
    public function deleteAction($labelId, $ologyId) {

        $labelOlogyService = $this->get('social.service.labelology');

        $result = $labelOlogyService->deleteLabelOlogy($labelId, $ologyId);

        return array('result' => $result);
    }
   
}

?>
