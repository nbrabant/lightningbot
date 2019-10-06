<?php

namespace App\Client\Exception;

/**
 * Class NotInProgressException
 *
 * Lightning bot API code "3" response for not in progress request
 */
class NotInProgressException extends \Exception
{
    protected $code = 3;

    protected $message = 'The requested phase is not yet in progress.';
}
