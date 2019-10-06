<?php

namespace App\Client\Exception;

/**
 * Class UsedTokenException
 *
 * Lightning bot API code "101" response significate that the request token has been already use
 */
class UsedTokenException extends \Exception
{
    protected $code = 101;

    protected $message = 'The token is already used in the game.';
}
