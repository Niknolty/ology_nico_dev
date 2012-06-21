<?php
 
namespace Ology\UserBundle\Listener;
 
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\HttpFoundation\Cookie;

//use Symfony\Component\HttpKernel\Event\GetResponseEvent;
 

//use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

//use Symfony\Component\Security\Core\SecurityContextInterface;
/**
 * SecurityListener.
 */
class SecurityListener
{   
    private $router;
    private $security;
    private $request;
    private $session;
    private $redirectToOlogizePost = false;
    private $redirectToLoginForm = false;
 
    
    /**
     * Constructs a new instance of SecurityListener.
     * 
     * @param Router $router The router
     * @param SecurityContext $security The security context
     * @param Request $request
     */
    public function __construct(Router $router, SecurityContext $security, Request $request, Session $session)
    {
        $this->router = $router;
        $this->security = $security;
        $this->request = $request;
        $this->session = $session;
    }
 
    /**
     * Invoked after a successful login.
     * 
     * @param InteractiveLoginEvent $event The event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
//        if ($this->security->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
//
//        }

        if ($this->security->isGranted('ROLE_USER')) {
            $link = $this->request->get('l');
            $src = $this->request->get('s');
            $sess_src = $this->session->get('ologize_src');
            $sess_link = $this->session->get('ologize_link');

            if (($src && $link) || ($sess_src && $sess_link) ){
                $this->redirectToOlogizePost = true;
            }
        }
    }
 
    /**
     * Invoked after the response has been created.
     * 
     * @param FilterResponseEvent $event The event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (null !== $this->security->getToken() && 'anon.' !== $this->security->getToken()->getUser()){
            $event->getResponse()->headers->setCookie(new Cookie('AUTH', 1));
        }
        else{
            $event->getResponse()->headers->clearCookie('AUTH');
        }

        if($this->redirectToOlogizePost) {
            $link = $this->request->get('l');
            $src = $this->request->get('s');

            $sess_src = $this->session->get('ologize_src');
            $sess_link = $this->session->get('ologize_link');

            if ($src && $link){
                $title = $this->request->get('t');
                $description = $this->request->get('d');
                $event->setResponse(new RedirectResponse($this->router->generate('_ologize_post') . '?s=' . urlencode(urldecode($src)) . '&l=' . urlencode(urldecode($link)) . '&t=' . urlencode(urldecode($title)) . '&d=' . urlencode(urldecode($description)) ));
            }elseif ($sess_src && $sess_link) {
                $sess_title = $this->session->get('ologize_title');
                $sess_description = $this->session->get('ologize_description');
                $event->setResponse(new RedirectResponse($this->router->generate('_ologize_post') . '?s=' . urlencode(urldecode($sess_src)) . '&l=' . urlencode(urldecode($sess_link)) . '&t=' . urlencode(urldecode($sess_title)) . '&d=' . urlencode(urldecode($sess_description)) ));
            }
            $this->session->set('ologize_login_by',false);
            $this->session->set('ologize_src',false);
            $this->session->set('ologize_link',false);
            $this->session->set('ologize_title',false);
            $this->session->set('ologize_description',false);

        }
        if($event->getResponse()->getStatusCode() == 302){
            $sess_login_by = $this->session->get('ologize_login_by');
            if($sess_login_by != 'twitter'){
                $link = $this->request->get('l');
                $src = $this->request->get('s');
                if($src && $link){
                    $title = $this->request->get('t');
                    $description = $this->request->get('d');
                    $event->setResponse(new RedirectResponse($this->router->generate('_ologize_post') . '?s=' . urlencode(urldecode($src)) . '&l=' . urlencode(urldecode($link)) . '&t=' . urlencode(urldecode($title)) . '&d=' . urlencode(urldecode($description)) . '&ex=1'));
                }
            }

        }
    }
}