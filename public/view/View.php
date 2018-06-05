<?php

namespace Lrf141\Pawn\View;

use Lrf141\Rook\Engine;

class View
{

    /**
     * @var Lrf141\Rook\Engine
     */
    protected $engine;

    /**
     * @var string
     */
    protected $dir = './template/twitter';

    public function __construct()
    {
        $this->engine = new Engine($this->dir);
    }


    public function simple_profile($user)
    {
        echo $this->engine->render('profile', ['user' => $user]);
    }
}
