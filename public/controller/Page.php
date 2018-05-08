<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class Page {
    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $response->getBody()->write('<h1>The Best Beer Ever.</h1>');
        return $response;
    }
}
