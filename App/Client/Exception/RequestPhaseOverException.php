<?php

namespace App\Client\Exception;

/**
 * Class RequestPhaseOverException
 *
 * Lightning bot API code "2" response for over request phase
 */
class RequestPhaseOverException extends \Exception
{
    protected $code = 2;

    protected $message = 'The requested phase is over.';
}
