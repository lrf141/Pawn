<?php

namespace Lrf141\Pawn\Controller;

require_once 'model/TwitterModel.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Lrf141\Rook\Engine;
use Lrf141\Pawn\Model\TwitterModel;
use Lrf141\Pawn\View\View;

class Page
{

    /**
     * @var TwitterModel
     */
    protected $twitter;

    /**
     * @var View
     */
    protected $view;

    public function __construct()
    {
        $this->twitter = new TwitterModel();
        $this->view = new View();
    }

    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $engine = new Engine('./template/tweet');
        $me = $this->twitter->requestAccountData();

        ob_start();
        $this->view->simple_profile($me);

        foreach ($this->twitter->requestGetHomeTimeLine() as $tweet) {
            echo $engine->render('timeline', ['tweet' => $tweet]);
        }

        $body = (string)ob_get_clean();
        $response->getBody()->write($body);
        return $response;
    }
}
