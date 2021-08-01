<?php

namespace coinmarketcap\Features;

use coinmarketcap\Utils\ApiRequest;

/**
 * Fiat
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class Fiat extends ApiRequest
{

    /**
     * Cryptocurrency constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
        self::$apiPath .= 'fiat' . '/';
    }


    /**
     * @param array $params ["start", "limit", "sort", "include_metals"]
     * @return array
     */
    public function map(array $params = []): array
    {
        return $this->sendRequest('map', $params);
    }

}