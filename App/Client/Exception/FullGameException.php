<?php

namespace App\Client\Exception;

/**
 * Class FullGameException
 *
 * Lightning bot API code "200" response significate that the current game is full
 */
class FullGameException extends \Exception
{
    protected $code = 100;

    protected $message = 'The game is full, the 20 bots limit is reached.';
}
