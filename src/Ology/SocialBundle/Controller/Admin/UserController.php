<?php

namespace Ology\SocialBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ology\SocialBundle\Entity\Role;

class UserController extends Controller {
    /**
     * @Route("/su/{id}", name="_adm_set_su")
     */
    public function putAdmin($id) {
        $userService = $this->get('social.service.user');
        
        $user = $userService->getUser($id);
        if ($user) {
            $user->addRole('ROLE_SUPER_ADMIN');
            $em = $this->getDoctrine()->getEntityManager();
            $em->flush();
            $response = new Response("user is now an admin");
        } else {
            $response = new Response("could not find user");
        }

        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/editor/{id}", name="_adm_set_editor")
     */
    public function putEditor($id) {
        $userService = $this->get('social.service.user');
        $user = $userService->getUser($id);
        if ($user) {
            $user->addRole('ROLE_EDITOR');
            $em = $this->getDoctrine()->getEntityManager();
            $em->flush();
            $response = new Response("user is now an editor");
        } else {
            $response = new Response("could not find user");
        }

        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/delete/{id}", name="_adm_delete_user")
     */
    public function deleteUser($id) {
        $this->get('social.service.user')->deleteUser($id);
        
        $response = new Response("user delete (bogus email set as usernames)");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
    
    /**
     * @Route("/disable/{id}", name="_adm_disable_user")
     */
    public function disableUser($id) {
        $this->get('social.service.user')->disableUser($id);
        
        $response = new Response("user disabled (locked account and expired credentials)");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
}
?>
