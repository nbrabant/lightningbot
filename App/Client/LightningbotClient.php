<?php

namespace App\Client;

use App\Client\Response\AbstractResponse;
use App\Client\Response\ConnectResponse;
use App\Client\Response\ConnectTestResponse;
use App\Client\Response\DirectionsResponse;
use App\Client\Response\InfoResponse;
use App\Client\Response\MoveResponse;
use \GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

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

        $this->uriBase = ($this->mode == 'test') ? getenv(self::API_TEST_URL) : getenv(self::API_URL);
    }

    /**
     * @return AbstractResponse|ConnectResponse|ConnectTestResponse
     * @throws GuzzleException
     */
    public function connect()
    {
        if ($this->mode === 'test') {
            $response = ConnectTestResponse::forge($this->call($this->uriBase . 'connect', $this->pseudo));
            $this->token = $response->getToken();
            return $response;
        }

        return ConnectResponse::forge($this->call($this->uriBase . 'connect', $this->token));
    }

    /**
     * @return AbstractResponse
     * @throws GuzzleException
     */
    public function infos()
    {
        return InfoResponse::forge($this->call($this->uriBase . 'info', $this->token));
    }

    /**
     * @param int $turn
     *
     * @return \App\Client\Response\DirectionsResponse
     * @throws GuzzleException
     */
    public function directions(int $turn)
    {
        return DirectionsResponse::forge($this->call($this->uriBase . 'directions', $this->token, $turn));
    }

    /**
     * @param int $direction
     * @param int $turn
     *
     * @return \App\Client\Response\MoveResponse
     * @throws GuzzleException
     */
    public function move(int $direction, int $turn)
    {
        return MoveResponse::forge($this->call($this->uriBase . 'move', $this->token, $direction, $turn));
    }

    /**
     * Call client REST API
     *
     * @param array $args
     * @return mixed|ResponseInterface
     */
    private function call(...$args)
    {
        return $this->httpClient->get(implode('/', $args), []);
    }

}
