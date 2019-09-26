<?php

use App\Game\Game;
use function DI\create;
use App\Client\LightningbotClient;

return [
    LightningbotClient::class => create(LightningbotClient::class),

    Game::class => create(Game::class),
];
