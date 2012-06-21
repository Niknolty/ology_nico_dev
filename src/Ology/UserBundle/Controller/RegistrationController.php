<?php

namespace Ology\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Ology\SocialBundle\Controller\Website\WebsiteController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class RegistrationController extends BaseController {

    public function registerAction() {
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');
        $process = $formHandler->process($confirmationEnabled);

        if ($process){
            $user = $form->getData();
            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $this->authenticateUser($user);
                $route = '_website_register_redir'; // changed here
            }
            
            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);
            return new RedirectResponse($url);
        }
        return new RedirectResponse(($this->container->get('router')->generate('_website_register')));
    }

}

?>
