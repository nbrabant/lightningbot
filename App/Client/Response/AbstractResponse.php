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
}
