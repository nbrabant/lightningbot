<?php

use App\Game\GameManager;

require_once __DIR__ . 'App/bootstrap/autoload.php';

$game = new GameManager();
$game->runGame();
