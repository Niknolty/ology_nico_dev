<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ology\SocialBundle\Service\InviteService;


/**
 * Description of InviteController
 *
 * @author erwan
 */
class InviteController extends Controller {

    /**
     * @Route("{/create/{email}", name="_invite_create")
     * @Template("OlogySocialBundle:Invite:create.html.twig")
     */
    public function createAction($email) {

        $inviteService = $this->get('social.service.invite');

        $securityContext = $this->get('security.context');
        $fromUserId = $securityContext->getToken()->getUser()->getId();

        $invite = $inviteService->createInvite($fromUserId, $email);

        return array('invite' => $invite);
    }

    /**
     * @Route("/{inviteId}/update", name="_invite_update", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Invite:update.html.twig")
     */
    public function updateAction($inviteId) {

        $inviteService = $this->get('social.service.invite');

        //TODO: delete this test
        $fromUserId = 1;
        $toEmail = 'test@ology.com';
        $timesSent = 10;

        $invite = $inviteService->updateInvite($inviteId, $fromUserId, $toEmail, $timesSent);

        return array('invite' => $invite);
    }

    /**
     * @Route("/{id}/delete", name="_invite_delete", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Invite:delete.html.twig")
     */
    public function deleteAction($id) {
        $inviteService = $this->get('social.service.invite');
        $result = $inviteService->deleteInvite($id);
        return array('result' => $result);
    }

    /**
     * @Route("/{id}/get", name="_invite_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:Invite:get.html.twig")
     */
    public function getAction($id) {
        $inviteService = $this->get('social.service.invite');
        $invite = $inviteService->getInvite($id);
        return array('invite' => $invite);
    }

}

?>
