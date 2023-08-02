<?php

// example.com/src/Simplex/Framework.php
namespace Simplex;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing;

class Framework extends HttpKernel\HttpKernel
{
    // public function __construct($routes)
    // {
    //     $context = new Routing\RequestContext();
    //     $matcher = new Routing\Matcher\UrlMatcher($routes, $context);
    //     $requestStack = new RequestStack();

    //     $controllerResolver = new HttpKernel\Controller\ControllerResolver();
    //     $argumentResolver = new HttpKernel\Controller\ArgumentResolver();

    //     $dispatcher = new EventDispatcher();
    //     $dispatcher->addSubscriber(new HttpKernel\EventListener\ErrorListener(
    //         'Calendar\Controller\ErrorController::exception'
    //     ));
    //     $dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, $requestStack));
    //     $dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));
    //     $dispatcher->addSubscriber(new StringResponseListener());

    //     parent::__construct($dispatcher, $controllerResolver, $requestStack, $argumentResolver);
    // }
    
    // public function __construct(
    //     protected EventDispatcher $dispatcher,
    //     private UrlMatcherInterface $matcher,
    //     private ControllerResolverInterface $controllerResolver,
    //     private ArgumentResolverInterface $argumentResolver,
    // ) {
    // }

    // public function handle(
    //     Request $request,
    //     $type = HttpKernelInterface::MAIN_REQUEST,
    //     $catch = true
    // ): Response
    // {
    //     $this->matcher->getContext()->fromRequest($request);

    //     try {
    //         $request->attributes->add($this->matcher->match($request->getPathInfo()));

    //         $controller = $this->controllerResolver->getController($request);
    //         $arguments = $this->argumentResolver->getArguments($request, $controller);

    //         $response = call_user_func_array($controller, $arguments);
    //     } catch (ResourceNotFoundException $exception) {
    //         $response = new Response('Not Found', 404);
    //     } catch (\Exception $exception) {
    //         $response = new Response('An error occurred', 500);
    //     }

    //     // dispatch a response event
    //     $this->dispatcher->dispatch(new ResponseEvent($response, $request), 'response');

    //     return $response;
    // }
}