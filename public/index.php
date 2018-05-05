<?php

require '../vendor/autoload.php';
use lrf141\Pawn\Controller\Page;
use League\Route\RouteGroup;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

global $container;
global $router;

$container = new League\Container\Container;
$container->share('response', Zend\Diactoros\Response::class);
$container->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);


$router = new \League\Route\RouteCollection($container);

$router->map('GET', '/', function (ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('<h1>Hello, World!</h1>');
        return $response;
});

$response = $router->dispatch($container->get('request'), $container->get('response'));
$container->get('emitter')->emit($response);
