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
    const PSEUDO = 'PSEUDO';
    const TOKEN = 'TOKEN';
    const API_URL = 'API_URL';
    const API_TEST_URL = 'API_TEST_URL';

    private $httpClient;

    private $mode;

    private $pseudo;
    
    private $token;

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

        $this->pseudo = getenv(self::PSEUDO);

        $this->token = getenv(self::TOKEN);

        $this->uriBase = getenv(self::API_URL);

        $this->uriBaseTest = getenv(self::API_TEST_URL);
    }

    /**
     * @return \App\Client\Response\AbstractResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function connect()
    {
        if ($this->mode === 'test') {
            $response = ConnectTestResponse::forge($this->call($this->uriBaseTest, $this->pseudo));
            // setToken
            return $response;
        }

        return ConnectResponse::forge($this->call($this->uriBase, $this->token));
    }

    /**
     * @return \App\Client\Response\InfoResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInfos()
    {
        return InfoResponse::forge($this->call($this->uriBase, $this->token));
    }

    /**
     * @return \App\Client\Response\DirectionsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function directions(int $turn)
    {
        return DirectionsResponse::forge($this->call($this->uriBase, $this->token, $turn));
    }

    /**
     * @return \App\Client\Response\MoveResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function move(int $direction, int $turn)
    {
        return MoveResponse::forge($this->call($this->uriBase, $this->token, $direction, $turn));
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
    private function call(...$args)
    {
        //@TODO : exception handling
        return $this->httpClient->get(implode('/', $args), []);
    }

}
