<?php

require_once './../vendor/autoload.php';
include_once './../config/template.php';

// example.com/src/app.php
use Symfony\Component\Routing;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\View\Factory;
use Illuminate\Support\Facades\Facade;


$routes = new Routing\RouteCollection();
// $routes->add('db', new Routing\Route('/db', ['name' => 'World']));

$routes->add('hello', new Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => function (Request $request): Response{
        $response = render_template($request);
        return $response;
    }
]));
$routes->add('bye', new Route('/bye', [
    '_controller' => function (Request $request): Response{
        $response = render_template($request);
        return $response;
    }
]));

$routes->add('index', new Route('/index/{name}', [
    'name' => 'World',
    '_controller' =>  'Http\Controller\UserController::getName',
]));

$routes->add('leap_year', new Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Http\Controller\LeapYearController::index',
]));

$routes->add('users', new Route('/api/users', [
    '_controller' => 'Http\Controller\UserController::getUsers'
]));

$routes->add('users_list', new Route('/users', [
    '_controller' => 'Http\Controller\UserController::getUsersView'
]));

$routes->add('customers_list', new Route('/customers', [
    '_controller' => 'Http\Controller\CustomerController::getCustomersView'
]));

return $routes;