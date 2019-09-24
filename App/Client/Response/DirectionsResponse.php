<?php

namespace App\Client\Response;

/**
 * Class DirectionsResponse
 *
 * @package App\Client\Response
 */
/**
 * {
 *  "success": true,
 *  "directions": [
 *  {
 *      "pseudo": "a",
 *      "direction": 1
 *  },
 *  {
 *      "pseudo": "b",
 *      "direction": 3
 *  },
 *  {
 *      "pseudo": "c",
 *      "direction": 2
 *  }
 *  ],
 *  "wait": 9910
 * }
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
        $this->directions = $directions;
    }
}
