<?php

namespace App\Game\Bot;

use App\Client\LightningbotClient;
use App\Client\Response\DirectionsResponse;
use App\Client\Response\InfoResponse;
use App\Game\Game;
use Monolog\Logger;

/**
 * Class AbstractBot
 *
 * @package App\Game\Bot
 */
abstract class AbstractBot
{
    /**
     * Authorized moves
     */
    const MOVE_RIGHT = 0;
    const MOVE_DOWN = 1;
    const MOVE_LEFT = 2;
    const MOVE_UP = 3;

    const BASE_WAITING_MILLISECONDS = 2000;

    /**
     * @var \App\Game\Game
     */
    private $gameClient;
    /**
     * @var \Monolog\Logger
     */
    protected $logger;

    /**
     * AbstractBot constructor.
     *
     * @param \App\Game\Game $game
     * @param \Monolog\Logger $logger
     */
    public function __construct(
        Game $game,
        Logger $logger
    ) {
        $this->gameClient = $game;
        $this->logger = $logger;
    }

    /**
     * Activate the bot
     */
    public function activation()
    {
        try {
            $this->gameClient->connect();

            $this->getInfos();

            $turn = 1;
            while (true) {
                $waitForNextTurn = $this->getDirections($turn);

                $waitForNextTurn = $this->defineNextMove($turn, $waitForNextTurn);

                usleep($waitForNextTurn);

                $turn++;
            }
        } catch (\Exception $e) {
            // @TODO : return end game message to console
        }
    }

    /**
     * Get game informations from client
     *
     * @return void
     */
    private function getInfos()
    {
        $gameInfosResponse = $this->gameClient->getInfos();

        $before = microtime();
        $this->receiveInformation($gameInfosResponse);
        $after = microtime();

        $wait = $gameInfosResponse->getWait() - ($before - $after);

        usleep($wait);
    }

    /**
     * @param int $turn
     *
     * @return int
     */
    private function getDirections(int $turn)
    {
        if ($turn > 1) {
            $directionsResponse = $this->gameClient->direction($turn);
            $this->receiveDirections($directionsResponse, $turn);
            return $directionsResponse->getWait();
        }
        return self::BASE_WAITING_MILLISECONDS;
    }

    /**
     * @param int $turn
     * @param int $waitForNextTurn
     *
     * @return int
     */
    private function defineNextMove(int $turn, int $waitForNextTurn)
    {
        $direction = $this->choseDirection($turn, $waitForNextTurn);
        $moveResponse = $this->gameClient->move($direction, $turn);
        return $moveResponse->getWait();
    }

    /**
     * Cette fonction est appelée une seule fois lors de l'initialisation de la partie
     * Elle permet la récupération d'informations utiles à exploiter
     *
     * @param \App\Client\Response\InfoResponse $infoResponse
     *
     * @return mixed
     */
    protected abstract function receiveInformation(InfoResponse $infoResponse);

    /**
     * Cette fonction est appelée à chaque tour et permet la récupération
     * des directions qu'on pris les autres joueurs au tour précédent
     *
     * @param \App\Client\Response\DirectionsResponse $directionsResponse
     * @param int $turn
     *
     * @return mixed
     */
    protected abstract function receiveDirections(DirectionsResponse $directionsResponse, int $turn);

    /**
     * Cette fonction est appelée une fois par tour et permet d'indiquer au serveur
     * la direction à prendre pour le tour en cours
     *
     * @param int $turn
     * @param $waitForNextTurn
     *
     * @return int
     */
    protected abstract function chooseDirection(int $turn, $waitForNextTurn) : int;
}
