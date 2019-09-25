<?php

namespace App\Client\Response\Model;

/**
 * Class Direction
 *
 * @package App\Client\Response\Model
 */
class Direction
{
    /**
     * @var $pseudo string
     */
    private $pseudo;
    /**
     * @var $direction string
     */
    private $direction;

    /**
     * Direction constructor.
     *
     * @param $pseudo
     * @param $direction
     */
    public function __construct($pseudo, $direction)
    {
        $this->pseudo = $pseudo;
        $this->direction = $direction;
    }

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

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }
}
