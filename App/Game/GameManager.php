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
    private $bot;

    public function __construct(MyBot $bot)
    {
        $this->bot = $bot;
    }

    public function runGame()
    {
        $this->bot->activation();
    }

}
