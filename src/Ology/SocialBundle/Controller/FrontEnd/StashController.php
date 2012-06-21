<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Ology\SocialBundle\Entity\Stash;
use Ology\SocialBundle\Forms\Stash\StashForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ology\SocialBundle\Controller\Website\BaseWebController;

class StashController extends BaseWebController {

    /**
     * @Route("/create", name="_stash_create")
     */
    public function createStash(Request $request) {
        $stash = new Stash();
        $form = $this->createForm(new StashForm(), $stash);
        $form->bindRequest($request);

        $securityContext = $this->get('security.context');
        $userId = $securityContext->getToken()->getUser()->getId();

        $stashService = $this->get('social.service.stash');
        $tagsStashes = explode(',', $stash->getTagsStashes());
        $createdStash = $stashService->createStash($userId, $stash->getName(), $tagsStashes);

        return $this->redirect($this->generateUrl('_website_stash', array('id' => $createdStash->getId())));
    }

    /**
     * @Route("/edit/{id}/{newName}/{newTags}", name="_ajax_stash_edit")
     */
    public function ajaxEditStash(Request $request, $id, $newName, $newTags) {
        $this->preExecute(false, false);

        $stash = $this->get('social.service.stash')->getStash($id);
        $stash->setName($newName);

        $this->get('social.service.stash')->editStash($this->user, $stash, explode(',', $newTags));

        return new Response();
    }

}

?>
