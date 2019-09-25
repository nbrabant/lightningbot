<?php

namespace App\Client\Response;

use App\Client\Response\Model\Direction;

/**
 * Class DirectionsResponse
 *
 * Parsing directions response :
 * {
 *  "success": true,
 *  "directions": [{"pseudo": "a", "direction": 1}, {"pseudo": "b", "direction": 3}, {"pseudo": "c", "direction": 2}],
 *  "wait": 9910
 * }
 *
 * @package App\Client\Response
 */
class DirectionsResponse extends AbstractResponse
{
    /**
     * @var $directions array
     */
    protected $directions;

    /**
     * @return array
     */
    public function getDirections(): array
    {
        return $this->directions;
    }

    /**
     * @param array $directions
     */
    public function setDirections(array $directions): void
    {
        foreach ($directions as $direction) {
            $this->directions[] = new Direction($direction['pseudo'], $direction['direction']);
        }
    }
}
