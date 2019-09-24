<?php

namespace App\Client;

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

    public function connect()
    {
        $response =  $this->call($this->uriBase, ['token']);


    }

    public function connectTest()
    {
        $response =  $this->call($this->uriBaseTest, ['pseudo']);


    }

    public function info()
    {
        $this->call($this->uriBase, ['token']);


    }

    public function directions()
    {
        $this->call($this->uriBase, ['token', 'turn']);


    }

    public function move()
    {
        $this->call($this->uriBase, ['token', 'direction', 'turn']);


    }

    /**
     *
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
