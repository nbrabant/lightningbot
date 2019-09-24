<?php

namespace App\Client\Response;

/**
 * Class ConnectResponse
 *
 * @package App\Client\Response
 */
/**
 * {
 *  "success": true,
 *  "pseudo": "yourPseudo",
 *  "wait": 84165
 * }
 */
class ConnectResponse extends AbstractResponse
{
    /**
     * @var $pseudo string
     */
    protected $pseudo;

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }
}
