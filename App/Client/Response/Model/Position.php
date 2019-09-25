<?php

namespace App\Client\Response\Model;

/**
 * Class Position
 *
 * @package App\Client\Response\Model
 */
class Position
{
    /**
     * @var $pseudo string
     */
    private $pseudo;
    /**
     * @var $positionX int
     */
    private $positionX;
    /**
     * @var $positionY int
     */
    private $positionY;

    /**
     * Position constructor.
     *
     * @param $pseudo
     * @param $positionX
     * @param $positionY
     */
    public function __construct($pseudo, $positionX, $positionY)
    {
        $this->pseudo = $pseudo;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
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
     * @return int
     */
    public function getPositionX(): int
    {
        return $this->positionX;
    }

    /**
     * @param int $positionX
     */
    public function setPositionX(int $positionX): void
    {
        $this->positionX = $positionX;
    }

    /**
     * @return int
     */
    public function getPositionY(): int
    {
        return $this->positionY;
    }

    /**
     * @param int $positionY
     */
    public function setPositionY(int $positionY): void
    {
        $this->positionY = $positionY;
    }
}
