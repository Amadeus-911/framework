<?php

$rootPath = dirname(__DIR__, 1);

require_once $rootPath.'\vendor\autoload.php';

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\ViewFinderInterface;
use Illuminate\Events\Dispatcher;

require_once $rootPath.'\config\database.php';
$viewsFolder = $rootPath . '\resources\views';

$filesystem = new Filesystem();
$viewFinder = new FileViewFinder($filesystem, [$viewsFolder]);

$compiler = new BladeCompiler($filesystem, __DIR__ . '/../cache'); 

$engineResolver = new EngineResolver();
$engineResolver->register('blade', function () use ($compiler) {
    return new CompilerEngine($compiler); 
});

$events = new Dispatcher();

$blade = new Factory($engineResolver, $viewFinder, $events);

function renderTemplate($view, $data = [])
{
    global $blade;
    global $engineResolver;
    global $viewFinder;
    global $events;
    return $blade->make($view, $data)->render();
}