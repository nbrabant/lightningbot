<?php

$container = require __DIR__ . '/App/bootstrap/autoload.php';

use \App\Game\GameManager;

$game = new GameManager($container->get(\App\Game\Bot\MyBot::class)  );//  $container->call(GameManager::class);
$game->runGame();