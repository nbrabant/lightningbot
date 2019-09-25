<?php

namespace App\Client;

use App\Client\Response\ConnectResponse;
use App\Client\Response\ConnectTestResponse;
use App\Client\Response\DirectionsResponse;
use App\Client\Response\InfoResponse;
use App\Client\Response\MoveResponse;
use \GuzzleHttp\Client;

/**
 * Class LightningbotClient
 *
 * Lightning bot request connector
 */
class LightningbotClient
{
    const GAME_MODE = 'GAME_MODE';
    const API_URL = 'API_URL';
    const API_TEST_URL = 'API_TEST_URL';

    const CALL_METHOD = 'GET';

    private $httpClient;

    private $mode;

    private $uriBase;

    private $uriBaseTest;

    /**
     * LightningbotClient constructor.
     *
     * @param \GuzzleHttp\Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;

        $this->mode = getenv(self::GAME_MODE);

        $this->uriBase = getenv(self::API_URL);

        $this->uriBaseTest = getenv(self::API_TEST_URL);
    }

    /**
     * @return \App\Client\Response\AbstractResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function connect()
    {
        return ConnectResponse::forge($this->call($this->uriBase, ['token']));
    }

    /**
     * @return \App\Client\Response\AbstractResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function connectTest()
    {
        return ConnectTestResponse::forge($this->call($this->uriBaseTest, ['pseudo']));
    }

    /**
     * @return \App\Client\Response\AbstractResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function info()
    {
        return InfoResponse::forge($this->call($this->uriBase, ['token']));
    }

    /**
     * @return \App\Client\Response\AbstractResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function directions()
    {
        return DirectionsResponse::forge($this->call($this->uriBase, ['token', 'turn']));
    }

    /**
     * @return \App\Client\Response\AbstractResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function move()
    {
        return MoveResponse::forge($this->call($this->uriBase, ['token', 'direction', 'turn']));
    }

    /**
     * Call client REST API
     *
     * @param $url
     * @param array|null $options
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function call(string $url, array $options = null)
    {
        return $this->httpClient
             ->request(self::CALL_METHOD, $url, $options);
    }

}
