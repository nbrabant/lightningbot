<?php

namespace App\Client\Exception;

/**
 * Class InvalidRequestParameter
 *
 * Lightning bot API code "1" response for invalid parameter
 */
class InvalidParameterException extends \Exception
{
    protected $code = 1;

    protected $message = 'A parameter is invalid.';
}
