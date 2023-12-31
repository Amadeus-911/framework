<?php

// example.com/web/front.php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

// try {
//     extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
//     ob_start();
//     include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

//     $response = new Response(ob_get_clean());
// } catch (Routing\Exception\ResourceNotFoundException $exception) {
//     $response = new Response('Not Found', 404);
// } catch (Exception $exception) {
//     $response = new Response('An error occurred', 500);
// }

function render_template(Request $request): Response
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

    return new Response(ob_get_clean());
}

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));
    $response = call_user_func('render_template', $request);
} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {a
    $response = new Response('An error occurred', 500);
}

$response->send();