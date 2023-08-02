<?php

require_once './../vendor/autoload.php';
include_once './../config/template.php';

// example.com/src/app.php
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// use Illuminate\View\Factory;
// use Illuminate\Support\Facades\Facade;


$routes = include __DIR__ . '/../routes/web.php';
return $routes;