<?php

use function DI\create;
use App\Client\LightningbotClient;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use GuzzleHttp\Client;

return [
    Client::class => create(Client::class)
        ->constructor(['verify' => false]),
    LoggerInterface::class => create(Logger::class)
        ->constructor('lightningbot', [new StreamHandler('php://stdout', Logger::DEBUG)]),

    LightningbotClient::class => create(LightningbotClient::class)
        ->constructor(\DI\get(Client::class), \DI\get(LoggerInterface::class)),

    Game::class => create(Game::class),
    MyBot::class => create(MyBot::class),
];
