<?php

namespace App\Client\Response;

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
     * @param array $responseBody
     *
     * @return \App\Client\Response\AbstractResponse
     */
    public static function forge(array $responseBody)
    {
        $instance = new self();
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
     * @param array $responseBody
     *
     * @return \App\Client\Response\AbstractResponse
     */
    private function parseResponse(array $responseBody)
    {
        $properties = get_object_vars($this);

        foreach ($properties as $property) {
            if (isset($responseBody[$property])) {
                $this->{'set' . ucfirst($property)}($responseBody[$property]);
            }
        }

        return $this;
    }
}
