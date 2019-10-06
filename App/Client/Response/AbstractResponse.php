<?php

namespace App\Client\Response;

use GuzzleHttp\Psr7\Response;
use stdClass;

/**
 * Class AbstractResponse
 *
 * @package App\Client\Response
 */
class AbstractResponse
{
    /**
     * @var $success boolean
     */
    protected $success;

    /**
     * @var $wait int
     */
    protected $wait;

    /**
     * Forge request object from request body
     *
     * @param Response $response
     * @return \App\Client\Response\AbstractResponse
     */
    public static function forge(Response $response)
    {
        $instance = new static();

        $responseBody = json_decode($response->getBody());

        if (isset($responseBody->error)) {
            trigger_error($responseBody->error, E_USER_ERROR);
        }

        return $instance->parseResponse($responseBody);
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @param int $wait
     */
    public function setWait(int $wait)
    {
        $this->wait = $wait;
    }

    /**
     * @return int
     */
    public function getWait(): int
    {
        return $this->wait;
    }

    /**
     * Parse response to the herited request object
     *
     * @param stdClass $responseBody
     *
     * @return \App\Client\Response\AbstractResponse
     */
    private function parseResponse(stdClass $responseBody)
    {
        $properties = get_object_vars($this);
        foreach ($properties as $property => $value) {
            if (isset($responseBody->{$property})) {
                $this->{'set' . ucfirst($property)}($responseBody->{$property});
            }
        }

        return $this;
    }
}
