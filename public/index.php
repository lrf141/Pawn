<?php

require '../vendor/autoload.php';
require './controller/Page.php';

use League\Route\RouteGroup;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

global $router;

$container = new League\Container\Container;
$container->share('response', Zend\Diactoros\Response::class);
$container->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER,
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);


$router = new \League\Route\RouteCollection($container);

$router->map('GET', '/', function (ServerRequestInterface $request, ResponseInterface $response) {
    $response->getBody()->write('<h1>Hello, World!</h1>');
    return $response;
});
$router->map('GET', '/index', 'Page::index');

$response = $router->dispatch($container->get('request'), $container->get('response'));
$container->get('emitter')->emit($response);
