<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Exceptions\AccessDeniedException;
use Ology\SocialBundle\Forms\Ology\OlogyForm;
use Ology\SocialBundle\Forms\Ology\OlogyFormEdit;
use Ology\SocialBundle\JSON\ArrayFormatter;
use Ology\SocialBundle\Service\OlogyService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OlogyController extends Controller {

    /**
     * @Route("/debug", name="_ology_debug")
     * @Template("OlogySocialBundle:Ology:debug.html.twig")
     */
    public function debug() {
        return array();
    }

    /**
     * @Route("/form", name="_ology_form")
     * @Template("OlogySocialBundle:Ology:create.html.twig")
     */
    public function displayOlogyForm() {
        $ology = new Ology();
        $form = $this->createForm(new OlogyForm(), $ology);

        return array('form' => $form->createView());
    }

    /**
     * @Route("/create", name="_ology_store")
     */
    public function storeOlogy(Request $request) {
        $ology = new Ology();
        $form = $this->createForm(new OlogyForm(), $ology);
        $form->bindRequest($request);

        $securityContext = $this->get('security.context');
        $userId = $securityContext->getToken()->getUser()->getId();
        $name = $ology->getName();
        $desc = $ology->getDescription();
        $image = $ology->getImageFile();
        $label = $ology->getFirstLabel();
        /*
          if (!$form->isValid())
          return $this->redirect($this->generateUrl('_website_create_ology'));
         */
        $ologyService = $this->get('social.service.ology');
        $ology = $ologyService->createOlogy($userId, $name, $desc, $label->getName(), $image, Ology::VISIBLE, Ology::READ_WRITE);

        return $this->redirect($this->generateUrl('_website_ology', array('id' => $ology->getId(), 'slug' => $ology->getSlug())));
    }

    /**
     * @Route("/{id}/edit", name="_ology_edit", requirements = {"id" = "\d+"}))
     */
    public function editAction(Request $request, $id) {

        //  // check if the user is login and authorized to update, give his id if it's the case
        $userId = $this->getLoggedUserId($id);

        $ology = new Ology();
        $form = $this->createForm(new OlogyFormEdit(), $ology);
        $form->bindRequest($request);

        $name = $ology->getName();
        $desc = $ology->getDescription();
        $image = $ology->getImageFile();
        $label = $ology->getFirstLabel();

        $ologyService = $this->get('social.service.ology');
        $ology = $ologyService->updateOlogy($id, $userId, $name, $desc, $label->getName(), $image, Ology::VISIBLE, Ology::READ_WRITE);

        return $this->redirect($this->generateUrl('_website_ology', array('id' => $ology->getId(), 'slug' => $ology->getSlug())));
    }

    /**
     * @Route("/{id}/get", name="_ology_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Ology:get.html.twig")
     */
    public function getOlogy($id) {
        $ologyService = $this->get('social.service.ology');
        $ology = $ologyService->getOlogy($id);
        $stats = $ologyService->getStats($id);
        return array('ology' => $ology, 'stats' => $stats);
    }

    /**
     * @Route("/{id}/delete", name="_ology_delete", requirements = {"id" = "\d+"})
     */
    public function deleteOlogy($id) {
        $this->get('social.service.appmanager')->initApplication();
        $ologyService = $this->get('social.service.ology');

        // check if the user is login and authorized to update
        $this->getLoggedUserId($id);
        $result = $ologyService->deleteOlogy($id);

        return new Response("ok");
    }

    /**
     * @Route("/all/get", name="_ology_getologies")
     * @Template("OlogySocialBundle:Ology:getOlogies.html.twig")
     */
    public function getOlogies() {
        $ologyService = $this->get('social.service.ology');
        $ologies = $ologyService->getOlogies();

        return array('ologies' => $ologies);
    }

    /**
     * @Route("/admin/{id}/tag/{label_name}", name="_ology_tag", requirements = {"id" = "\d+"})
     */
    public function tagOlogy($id, $label_name) {
        $ologyService = $this->get('social.service.ology');

        // get log in user
        $securityContext = $this->get('security.context');
        $userId = $securityContext->getToken()->getUser()->getId();

        $label = $ologyService->tagOlogy($label_name, $id, $userId);


        $res = "ok - ology " . $id . ' tagged with ' . $label->getName() .
                " (id = " . $label->getId() . ")";
        return new Response($res);
    }

    /**
     * @Route("/get/recent/{offset}/{n}/labels", name="_ology_labels_recent")
     * 
     */
    public function getRecentOlogiesByLabels($offset, $n) {
        $ologyService = $this->get('social.service.ology');

        $arrayLabels = array(1, 2);
        $ologies = $ologyService->getMostRecentByLabels($arrayLabels, $offset, $n);

        $response = new Response(json_encode(ArrayFormatter::toArray($ologies)));
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/get/recent/{offset}/{n}/label/{label_id}", name="_ology_label_recent")
     * 
     */
    public function getRecentOlogiesByLabel($offset, $n, $label_id) {
        $ologyService = $this->get('social.service.ology');

        $labelsId = array($label_id);
        $ologies = $ologyService->getMostRecentByLabels($offset, $n, $labelsId);

        $response = new Response(json_encode(ArrayFormatter::OlogyListToArray($ologies)));
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/get/mostusers/{n}", name="_ology_most_users")
     * 
     */
    public function getMostOlogists($n) {
        $ologyService = $this->get('social.service.ology');

        $ologies = $ologyService->getMostUsers($n);
        $response = new Response(json_encode(ArrayFormatter::OlogyListToArray($ologies)));
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/get/recent/{offset}/{n}", name="_ology_recent")
     * 
     */
    public function getRecentOlogies($offset, $n) {
        $ologyService = $this->get('social.service.ology');

        $ologies = $ologyService->getMostRecent($offset, $n);

        $response = new Response(json_encode(ArrayFormatter::OlogyListToArray($ologies)));
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/{id}/join", name="_ology_join")
     */
    public function joinOlogy($id) {
        $this->get('social.service.appmanager')->initApplication();     
        
        $membershipService = $this->get('social.service.membership');
        $securityContext = $this->get('security.context');
        $userId = $securityContext->getToken()->getUser()->getId();
        $ologies = $membershipService->joinOlogy($userId, $id);

        return new Response();
    }

    /**
     * @Route("/{id}/rjoin", name="_remember_join_offline")
     */
    public function ajaxStoreJoinOlogy($id) {
        $this->get('social.service.appmanager')->initApplication();
        
        $session = $this->getRequest()->getSession();
        $session->set('offline_follow', true);
        $session->set('offline_ology_id', $id);
        
        $response = new Response("OK");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/{id}/leave", name="_ology_leave")
     * 
     */
    public function leaveOlogy($id) {
        $membershipService = $this->get('social.service.membership');

        $securityContext = $this->get('security.context');
        $userId = $securityContext->getToken()->getUser()->getId();
        $ologies = $membershipService->leaveOlogy($userId, $id);

        return new Response();
    }

    /**
     * @Route("/{id}/users/{n}", name="_ology_users", requirements = {"id" = "\d+", "n" = "\d+"})
     * @Template("OlogySocialBundle:Ology:users.html.twig")
     */
    public function getUsers($id, $n) {
        $membershipService = $this->get('social.service.membership');
        $users = $membershipService->getUsersForOlogy($id, $n);

        return array("users" => $users);
    }

    /**
     * @Route("{id}/canEdit", name="_ology_isauthorized", requirements = {"id" = "\d+"})
     */
    public function isAuthorizedToEditOrDelete($id) {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $ologyService = $this->get('social.service.ology');
        $isAuthorized = $ologyService->isAuthorizedToEditOrDelete($user, $id);
        return $isAuthorized;
    }

    /*
     * @return userId
     * Throw exeption if the user isn't auth
     */

    private function getLoggedUserId($ologyId) {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $ologyService = $this->get('social.service.ology');
        if (!$ologyService->isAuthorizedToEditOrDelete($user, $ologyId)) {
            throw new AccessDeniedException();
        }

        return $user->getId();
    }

    /*
     * @Route("/adm/resize/{file}", name="_ology_resize"))
     * @Template("OlogySocialBundle:Ology:update.html.twig")
     *
     * Resize an image from the main directory of ology image
     */

    public function resizeAction($file) {
        $ologyService = $this->get('social.service.ology');

        $newOlogy = $ologyService->resizeAction($file);

        return array();
    }

}

?>