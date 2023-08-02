<?php

// example.com/web/front.php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/template.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$routes = include __DIR__ . '/../routes/web.php';
$container = include __DIR__.'/../app/container.php';

$request = Request::createFromGlobals();


function render_template(Request $request): Response
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../resources/views/%s.php', $_route);

    return new Response(ob_get_clean());
}


// $container->setParameter('routes', array($routes));
$container->setParameter('charset', 'UTF-8');
$container->setParameter('debug', true);
$response = $container->get('kernel')->handle($request);


// dd($response);
$response->send();

// require_once __DIR__.'/../vendor/autoload.php';

// use Symfony\Component\HttpFoundation\Request;

// $request = Request::createFromGlobals();
// $routes = include __DIR__.'/../src/app.php';

// $framework = new Simplex\Framework($routes);

// $framework->handle($request)->send();


// example.com/web/front.php
// require_once __DIR__.'/../vendor/autoload.php';


// use Symfony\Component\HttpKernel;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpKernel\Controller\ControllerResolver;
// use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
// use Symfony\Component\Routing;
// use Symfony\Component\EventDispatcher\EventDispatcher;

// $dispatcher = new EventDispatcher();
// $dispatcher->addSubscriber(new Simplex\ContentLengthListener());
// $dispatcher->addSubscriber(new Simplex\GoogleListener());





// $request = Request::createFromGlobals();
// $routes = include __DIR__.'/../src/app.php';

// $context = new Routing\RequestContext();
// $matcher = new Routing\Matcher\UrlMatcher($routes, $context);

// $controllerResolver = new ControllerResolver();
// $argumentResolver = new ArgumentResolver();


// $framework = new Simplex\Framework($dispatcher, $matcher, $controllerResolver, $argumentResolver);
// $framework = new HttpKernel\HttpCache\HttpCache(
//     $framework,
//     new HttpKernel\HttpCache\Store(__DIR__.'/../cache'),
//     new HttpKernel\HttpCache\Esi(),
//     ['debug' => true]
// );

// $response = $framework->handle($request);
// $response->send();


// example.com/web/front.php
// require_once __DIR__.'/../vendor/autoload.php';

// use Symfony\Component\EventDispatcher\EventDispatcher;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\RequestStack;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpKernel;
// use Symfony\Component\Routing;

// $request = Request::createFromGlobals();
// $requestStack = new RequestStack();
// $routes = include __DIR__.'/../src/app.php';

// $context = new Routing\RequestContext();
// $matcher = new Routing\Matcher\UrlMatcher($routes, $context);

// $controllerResolver = new HttpKernel\Controller\ControllerResolver();
// $argumentResolver = new HttpKernel\Controller\ArgumentResolver();

// $dispatcher = new EventDispatcher();
// $dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, $requestStack));
// $listener = new HttpKernel\EventListener\ErrorListener(
//     'Calendar\Controller\ErrorController::exception'
// );
// $dispatcher->addSubscriber($listener);
// $dispatcher->addSubscriber(new HttpKernel\EventListener\StreamedResponseListener());
// $dispatcher->addSubscriber(new Simplex\StringResponseListener());

// $framework = new Simplex\Framework($dispatcher, $controllerResolver, $requestStack, $argumentResolver);

// $response = $framework->handle($request);
// $response->send();

// example.com/web/front.php