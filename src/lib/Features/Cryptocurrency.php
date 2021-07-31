<?php

namespace CoinMarketCap\Features;

use CoinMarketCap\Utils\ApiRequest;

/**
 * Cryptocurrency
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class Cryptocurrency extends ApiRequest
{

    /**
     * Cryptocurrency constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
        self::$apiPath .= 'cryptocurrency' . '/';
    }

    /**
     * @param array $params ["listing_status", "start", "limit", "sort", "symbol", "aux"]
     * @return array
     */
    public function map(array $params = []): array
    {
        return $this->sendRequest('map', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "aux"]
     * @return array
     */
    public function info(array $params = []): array
    {
        return $this->sendRequest('info', $params);
    }

    /**
     * @param array $params ["start", "limit", "volume_24h_min", "convert", "convert_id", "sort", "sort_dir", "cryptocurrency_type", "aux"]
     * @return array
     */
    public function listingsLatest(array $params): array
    {
        return $this->sendRequest('listings/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "convert", "convert_id", "aux", "skip_invalid"]
     * @return array
     */
    public function quotesLatest(array $params = []): array
    {
        return $this->sendRequest('quotes/latest', $params);
    }

}
