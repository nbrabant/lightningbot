<?php

use function DI\create;
use App\Game;
use App\Game\Bot;
use App\Client\LightningbotClient;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use GuzzleHttp\Client;

return [
    Client::class => create(Client::class),
    LoggerInterface::class => create(Logger::class)
        ->constructor('debug'),
    
    LightningbotClient::class => create(LightningbotClient::class)
        ->constructor(\DI\get(Client::class)),

    Game::class => create(Game::class),
    MyBot::class => create(MyBot::class),
];
