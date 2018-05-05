<?php

namespace lrf141\Pawn\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class Page {
    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        return "<h1>Hello</h1>";
    }
}
