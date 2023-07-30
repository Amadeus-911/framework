<?php

require_once './../vendor/autoload.php';
include_once './../config/template.php';

// example.com/src/app.php
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\View\Factory;
use Illuminate\Support\Facades\Facade;


$routes = new Routing\RouteCollection();
// $routes->add('db', new Routing\Route('/db', ['name' => 'World']));

$routes->add('hello', new Routing\Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => function (Request $request): Response{
        $response = render_template($request);
        return $response;
    }
]));
$routes->add('bye', new Routing\Route('/bye', [
    '_controller' => function (Request $request): Response{
        $response = render_template($request);
        return $response;
    }
]));

$routes->add('index', new Routing\Route('/index/{name}', [
    'name' => 'World',
    '_controller' =>  'Calendar\Controller\UserController::getName',
]));

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
]));

$routes->add('users', new Routing\Route('/api/users', [
    '_controller' => 'Calendar\Controller\UserController::getUsers'
]));

$routes->add('users_list', new Routing\Route('/users', [
    '_controller' => 'Calendar\Controller\UserController::getUsersView'
]));

$routes->add('customers_list', new Routing\Route('/customers', [
    '_controller' => 'Calendar\Controller\CustomerController::getCustomersView'
]));

return $routes;