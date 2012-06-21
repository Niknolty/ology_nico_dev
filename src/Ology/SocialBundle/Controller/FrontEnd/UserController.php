<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Ology\SocialBundle\Entity\Ology;
use Ology\SocialBundle\Entity\User;
use Ology\SocialBundle\Forms\User\UserForm;
use Ology\SocialBundle\Forms\User\UserNotificationForm;
use Ology\SocialBundle\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller {

    /**
     * @Route("/create", name="_user_create")
     * @Template("OlogySocialBundle:User:create.html.twig")
     */
    public function createAction() {
        // WTF?
        //basics
        $userService = $this->get('social.service.user');

        // TEST: Create a User in DB
        $user = $userService->createUser('mypassword', 'tok', 0, 'no-one');

        $response = new Response('created user with id ' . $user->getId());
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    /**
     * @Route("/delete/{id}", name="_user_delete", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:User:delete.html.twig")
     */
    public function deleteAction($id) {

        $userService = $this->get('social.service.user');

        $result = $userService->deleteUser($id);

        return array('result' => $result);
    }

    /**
     * @Route("/get/{id}", name="_user_get", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:User:get.html.twig")
     */
    public function getAction($id) {

        $userService = $this->get('social.service.user');

        $user = $userService->getUser($id);

        return array('user' => $user);
    }

    /**
     * @Route("/{id}/ologies/{n}", name="_user_ologies", requirements = {"id" = "\d+", "n" = "\d+"})
     * @Template("OlogySocialBundle:Ology:list.html.twig")
     */
    public function getOlogies($id, $n) {
        $membershipService = $this->get('social.service.membership');
        $ologies = $membershipService->getOlogiesForUser($id, $n);

        return array("ologies" => $ologies);
    }

}

?>
