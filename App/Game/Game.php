<?php

namespace App\Game;

use App\Client\LightningbotClient;
use App\Client\Response\DirectionsResponse;
use App\Client\Response\InfoResponse;
use App\Client\Response\MoveResponse;

/**
 * Class Game
 *
 * @package App\Game
 */
class Game
{
    /**
     * @var \App\Client\LightningbotClient
     */
    private $lightningbotClient;
    /**
     * @var string $env
     */
    private $env;

    /**
     * Game constructor.
     *
     * @param \App\Client\LightningbotClient $lightningbotClient
     */
    public function __construct(LightningbotClient $lightningbotClient)
    {
        $this->lightningbotClient = $lightningbotClient;
        $this->env = getenv('GAME_MODE', '');
    }

    public function connect()
    {
        return $this->lightningbotClient->connect();
        return $this->lightningbotClient->connectTest();
    }

    public function getInfos() : InfoResponse
    {
        return $this->lightningbotClient->info();
    }

    public function direction(int $turn) : DirectionsResponse
    {
        return $this->lightningbotClient->directions();
    }

    public function move(int $direction, int $turn) : MoveResponse
    {
        return $this->lightningbotClient->move();
    }
}
