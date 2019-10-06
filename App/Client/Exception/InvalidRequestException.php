<?php

namespace App\Client\Exception;

/**
 * Class InvalidRequestException
 *
 * Lightning bot API code "0" response for invalid request
 */
class InvalidRequestException extends \Exception
{
    protected $code = 0;

    protected $message = 'The request path is invalid.';
}
