<?php

namespace App\Client\Exception;

/**
 * Class YouAreTheWinnerException
 *
 * Lightning bot API code "101" response significate that the game is end and you are the final bot
 */
class YouAreTheWinnerException extends \Exception
{
    protected $code = 200;

    protected $message = 'You are the winner!';
}
