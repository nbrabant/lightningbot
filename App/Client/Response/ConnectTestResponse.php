<?php

namespace App\Client\Response;

/**
 * Class ConnectTestResponse
 *
 * @package App\Client\Response
 */
/**
 * {
 *  "success": true,
 *  "token": "2db46fa90d9ac50f7d87",
 *  "wait": 84165
 * }
 */
class ConnectTestResponse extends AbstractResponse
{
    /**
     * @var $token string
     */
    protected $token;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}
