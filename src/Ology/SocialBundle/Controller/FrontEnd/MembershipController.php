<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ology\SocialBundle\Service\MembershipService;
use Ology\SocialBundle\Exceptions\AccessDeniedException;

/**
 * Description of MembershipController
 *
 * @author erwan
 */
class MembershipController extends Controller {

    /**
     * @Route("/{ologyId}/create", name="_membership_create"), requirements = {"ologyId" = "\d+"})
     * @Template("OlogySocialBundle:Membership:create.html.twig")
     */
    public function createAction($ologyId) {

        $membershipService = $this->get('social.service.membership');


        $securityContext = $this->get('security.context');
        $userId = $securityContext->getToken()->getUser()->getId();

        //TODO: delete this test
        $membershipTypeId = 1;

        $membership = $membershipService->createMembership($userId, $ologyId, $membershipTypeId);

        return array('membership' => $membership);
    }

    /**
     * @Route("/admin/update", name="_membership_update")
     * @Template("OlogySocialBundle:Membership:update.html.twig")
     */
    public function updateAction() {

        $membershipService = $this->get('social.service.membership');

        // only admin can edit membership (give rights on ology) see security.yml
        $membershipId   =2;
        $ologyId = 2;
        $membershipTypeId = 1;

        $membership = $membershipService->updateMembership($membershipId, $ologyId, $membershipTypeId);

        return array('membership' => $membership);
    }

    /**
     * @Route("/admin/get/{id}", name="_membership_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Membership:get.html.twig")
     */
    public function getAction($id) {        
        $membershipService = $this->get('social.service.membership');
        $membership = $membershipService->getMembership($id);
        return array('membership' => $membership);
    }

    /**
     * @Route("/delete/{id}", name="_membership_delete", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Membership:delete.html.twig")
     */
    public function deleteAction($id) {
        
         // check if the user is login and authorized to update
        $this->checkAuthorizedToEditOrDelete($id);
        
        $membershipService = $this->get('social.service.membership');
        $result = $membershipService->deleteMembership($id);
        return array('result' => $result);
    }

    /**
     * @Route("/get/users/for/post/{id}", name="_membership_getusersforpost", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Membership:getUsersForPost.html.twig")
     */
    public function getUsersForPost($id) {
        $membershipService = $this->get('social.service.membership');
        $result = $membershipService->getUsersForPost($id);
        return array('ologies' => $result);
    }

    /**
     * @Route("/get/users/for/ology/{id}", name="_membership_getusersforology", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Membership:getUsersForOlogy.html.twig")
     */
    public function getUsersForOlogy($id) {
        $membershipService = $this->get('social.service.membership');
        $result = $membershipService->getUsersForOlogy($id, 10, true);
        return array('users' => $result);
    }

    /**
     * @Route("/get/ologies/for/user/{id}", name="_membership_getologiesforuser", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Membership:getOlogiesForUser.html.twig")
     */
    public function getOlogiesForUser($id) {
        $membershipService = $this->get('social.service.membership');
        $result = $membershipService->getOlogiesForUser($id);
        return array('users' => $result);
    }

    /**
     * @Route("/user/is/authorized/to/modify/{Id}/membership", name="_membership_isauthorized", requirements = {"id" = "\d+"})
     */
    public function isAuthorizedToEditOrDelete($id) {

        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $membershipService = $this->get('social.service.membership');
        $right = $membershipService->isAuthorizedToEditOrDelete($user, $id);

        return $right;
    }

    /*
     * @return userId
     * Throw exeption if the user isn't auth
     */
    private function checkAuthorizedToEditOrDelete($id) {
        // get log in user
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();

        $membershipService = $this->get('social.service.membership');

        // check authorization
        if (!$membershipService->getAuthentificationRight($user, $id)) {
            throw new AccessDeniedException();
        }
        return $user->getId();
    }

}

?>
