<?php

namespace App\Game;

use App\Game\Bot\MyBot;

/**
 * Class GameManager
 *
 * @package App\Game
 */
class GameManager
{
    public function runGame()
    {
        $bot = new MyBot();
        $bot->activation();
    }

}
