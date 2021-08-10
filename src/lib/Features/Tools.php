<?php

namespace coinmarketcap\Features;

use coinmarketcap\Utils\ApiRequest;

/**
 * Tools
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class Tools extends ApiRequest
{
    /**
     * Tools constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * @param array $params ["amount", "id", "symbol", "time", "convert", "convert_id" ]
     * @return array
     */
    public function priceConversion(array $params = []): array
    {
        return $this->sendRequest('tools/price-conversion', $params);
    }
}
