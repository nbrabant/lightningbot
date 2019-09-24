<?php

namespace App\Client\Exception;

/**
 * Class UsedTokenException
 *
 * Lightning bot API code "101" response significate that the request token has been already use
 */
class UsedTokenException extends \Exception
{
}
