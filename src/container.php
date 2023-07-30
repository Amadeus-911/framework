<?php
// example.com/src/container.php
use Simplex\Framework;
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use Simplex\StringResponseListener;
use Simplex\JsonResponseListener;
use Simplex\TemplateResponseListener;


$container = new DependencyInjection\ContainerBuilder();
$container->register('context', Routing\RequestContext::class);
$container->register('matcher', Routing\Matcher\UrlMatcher::class)
    ->setArguments([$routes, new Reference('context')])
;
$container->register('request_stack', HttpFoundation\RequestStack::class);
$container->register('controller_resolver', HttpKernel\Controller\ControllerResolver::class);
$container->register('argument_resolver', HttpKernel\Controller\ArgumentResolver::class);

$container->register('listener.router', HttpKernel\EventListener\RouterListener::class)
    ->setArguments([new Reference('matcher'), new Reference('request_stack')])
;
$container->register('listener.response', HttpKernel\EventListener\ResponseListener::class)
    ->setArguments(['UTF-8'])
;
$container->register('listener.exception', HttpKernel\EventListener\ErrorListener::class)
    ->setArguments(['Calendar\Controller\ErrorController::exception'])
;
$container->register('dispatcher', EventDispatcher\EventDispatcher::class)
    ->addMethodCall('addSubscriber', [new Reference('listener.router')])
    ->addMethodCall('addSubscriber', [new Reference('listener.response')])
    ->addMethodCall('addSubscriber', [new Reference('listener.exception')])
;
$container->register('framework', Framework::class)
    ->setArguments([
        new Reference('dispatcher'),
        new Reference('controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ])
;



$container->register('listener.json_response', JsonResponseListener::class);
$container->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.json_response')])
;

$container->register('listener.template_response', TemplateResponseListener::class);
$container->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.template_response')])
;


$container->register('listener.string_response', StringResponseListener::class);
$container->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.string_response')])
;

$blade = $GLOBALS['blade'];
$engineResolver = $GLOBALS['engineResolver'];
$viewFinder = $GLOBALS['viewFinder'];
$events = $GLOBALS['events'];


$container->register('view.blade', Illuminate\View\Factory::class)
    ->addArgument($engineResolver)
    ->addArgument($viewFinder)
    ->addArgument($events);

$container->register('listener.template_response', TemplateResponseListener::class)
    ->addArgument(new Reference('view.blade'));

$container->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.template_response')]);

$container->register('listener.response', HttpKernel\EventListener\ResponseListener::class)
    ->setArguments(['%charset%'])
;

// $container->register('matcher', Routing\Matcher\UrlMatcher::class)
//     ->setArguments(['%routes%', new Reference('context')])
// ;

// echo $container->getParameter('debug');

return $container;