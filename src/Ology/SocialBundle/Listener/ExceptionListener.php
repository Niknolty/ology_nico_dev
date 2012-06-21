<?php

namespace Ology\SocialBundle\Listener;

use Monolog\Logger;
use Symfony\Component\HttpFoundation\ApacheRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Routing\RouterInterface;

class ExceptionListener {
    protected $logger;
    protected $router;
    
    function __construct(RouterInterface $router, Logger $logger) {
        $this->router = $router;
        $this->logger = $logger;
    }
    
    public function onKernelException(GetResponseForExceptionEvent $event) {
        $exception = $event->getException();
        $code = $exception->getCode();
        $msg = $exception->getMessage();
        $reqMethod = $event->getRequest()->getMethod();
        $url = $event->getRequest()->getRequestUri();
        
        $logMsg = "Request [$reqMethod $url] generated exception [$code - $msg]";
        $this->logger->err($logMsg);

        if ($reqMethod == 'POST') {
            $request = print_r($event->getRequest()->request, true);
            $this->logger->err("Request parameters [$request]");
        }
        
        $response = new RedirectResponse($this->router->generate('_exception')); 
        $event->setResponse($response);
    }
}
?>
