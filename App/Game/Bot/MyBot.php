<?php

namespace App\Game\Bot;

use App\Client\Response\DirectionsResponse;
use App\Client\Response\InfoResponse;

/**
 * Class MyBot
 *
 * @package App\Game\Bot
 */
class MyBot extends AbstractBot
{
    /**
     * Cette fonction est appelée une seule fois lors de l'initialisation de la partie
     * Elle permet la récupération d'informations utiles à exploiter
     *
     * @param \App\Client\Response\InfoResponse $infoResponse
     *
     * @return mixed
     */
    protected function receiveInformation(InfoResponse $infoResponse)
    {
        // TODO: Implement receiveInformation() method.
    }

    /**
     * Cette fonction est appelée à chaque tour et permet la récupération
     * des directions qu'on pris les autres joueurs au tour précédent
     *
     * @param \App\Client\Response\DirectionsResponse $directionsResponse
     * @param int $turn
     *
     * @return mixed
     */
    protected function receiveDirections(DirectionsResponse $directionsResponse, int $turn)
    {
        // TODO: Implement receiveDirections() method.
    }

    /**
     * Cette fonction est appelée une fois par tour et permet d'indiquer au serveur
     * la direction à prendre pour le tour en cours
     *
     * @param int $turn
     * @param $waitForNextTurn
     *
     * @return int
     */
    protected function chooseDirection(int $turn, $waitForNextTurn): int
    {
        // TODO: Implement chooseDirection() method.
        return self::MOVE_RIGHT;
    }
}
