<?php

namespace App\Client\Response;

use App\Client\Response\Model\Position;

/**
 * Class InfoResponse
 *
 * Parsing infos response :
 * {
 *  "success": true,
 *  "name": "Prize Turk",
 *  "dimensions": 15,
 *  "positions": [{"pseudo": "a", "x": 2, "y": 2}, {"pseudo": "b", "x": 7, "y": 7}, {"pseudo": "c", "x": 12, "y": 12}],
 *  "wait": 9340
 * }
 *
 * @package App\Client\Response
 */
class InfoResponse extends AbstractResponse
{
    /**
     * @var $name string
     */
    protected $name;
    /**
     * @var $dimensions int
     */
    protected $dimensions;
    /**
     * @var $positions array
     */
    protected $positions;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getDimensions(): int
    {
        return $this->dimensions;
    }

    /**
     * @param int $dimensions
     */
    public function setDimensions(int $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return array
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * @param array $positions array of stdClass
     */
    public function setPositions(array $positions): void
    {
        foreach ($positions as $position) {
            $this->positions[] = new Position($position->pseudo, $position->x, $position->y);
        }
    }
}
