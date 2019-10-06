<?php

namespace App\Game;

use App\Client\Exception\FullGameException;
use App\Client\Exception\InvalidParameterException;
use App\Client\Exception\InvalidRequestException;
use App\Client\Exception\NotInProgressException;
use App\Client\Exception\RequestPhaseOverException;
use App\Client\Exception\UsedTokenException;
use App\Client\Exception\YouAreDeadException;
use App\Client\Exception\YouAreTheWinnerException;
use mysql_xdevapi\Exception;

/**
 * Class GameErrorHandler
 * @package App\Game
 */
class GameErrorHandler
{
    const INVALID_REQUEST = 0;
    const INVALID_PARAMETER = 1;
    const REQUEST_PHASE_OVER = 2;
    const NOT_IN_PROGRESS = 3;
    const FULL_GAME = 100;
    const USED_TOKEN = 101;
    const WINNER = 200;
    const DEAD = 201;

    /**
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     *
     * @throws \Exception
     */
    public function handleError($errno, $errstr, $errfile = null, $errline = null)
    {
        switch ($errstr) {
            case self::INVALID_REQUEST:
                throw new InvalidRequestException();
                break;
            case self::INVALID_PARAMETER:
                throw new InvalidParameterException();
                break;
            case self::REQUEST_PHASE_OVER:
                throw new RequestPhaseOverException();
                break;
//            case self::NOT_IN_PROGRESS:
//                throw new NotInProgressException();
//                break;
            case self::FULL_GAME:
                throw new FullGameException();
                break;
            case self::USED_TOKEN:
                throw new UsedTokenException();
                break;
            case self::WINNER:
                throw new YouAreTheWinnerException();
                break;
            case self::DEAD:
                throw new YouAreDeadException();
                break;
//            default:
//                throw new \Exception('Unknow...');
        }
    }
}