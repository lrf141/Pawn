<?php

namespace Lrf141\Pawn\Controller;

require_once 'model/TwitterModel.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Lrf141\Rook\Engine;
use Lrf141\Pawn\Model\TwitterModel;

class Page
{
    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $twitter = new TwitterModel();

        $engine = new Engine('./template/tweet');
        foreach($twitter->requestGetHomeTimeLine() as $tweet)
        {
            $response->getBody()->write($engine->render('timeline', ['tweet' => $tweet]));
        }
        return $response;
    }
}
