<?php

namespace App\Client\Exception;

/**
 * Class YouAreDeadException
 *
 * Lightning bot API code "201" response significate that you bot is destroyed
 */
class YouAreDeadException extends \Exception
{
    protected $code = 201;

    protected $message = 'Your bot is dead.';
}
