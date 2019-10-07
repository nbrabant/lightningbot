<?php

namespace App\Game;

use App\Client\LightningbotClient;
use App\Client\Response\AbstractResponse;
use App\Client\Response\DirectionsResponse;
use App\Client\Response\InfoResponse;
use App\Client\Response\MoveResponse;
use GuzzleHttp\Exception\GuzzleException;

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

    /**
     * @throws GuzzleException
     */
    public function connect()
    {
        $this->lightningbotClient->connect();
    }

    public function getInfos() : InfoResponse
    {
        return $this->lightningbotClient->infos();
    }

    public function direction(int $turn) : DirectionsResponse
    {
        return $this->lightningbotClient->directions($turn);
    }

    public function move(int $direction, int $turn) : MoveResponse
    {
        return $this->lightningbotClient->move($direction, $turn);
    }
}
