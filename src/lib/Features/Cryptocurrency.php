<?php

namespace coinmarketcap\Features;

use coinmarketcap\Utils\ApiRequest;

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
     * @param array $params ["id", "slug", "symbol", "aux"]
     * @return array
     */
    public function info(array $params): array
    {
        return $this->sendRequest('info', $params);
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
     * @param array $params ["date", "start", "limit", "convert", "convert_id", "sort", "sort_dir", "cryptocurrency_type", "aux"]
     * @return array
     */
    public function listingsHistorical(array $params): array
    {
        return $this->sendRequest('listings/historical', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "start", "limit", "sort_dir", "sort", "aux", "matched_id", "matched_symbol", "category", "fee_type", "convert", "convert_id"]
     * @return array
     */
    public function marketPairs(array $params): array
    {
        return $this->sendRequest('market-pairs/latest', $params);
    }

    /**
     * @param array $params ["start", "limit", "volume_24h_min", "convert", "convert_id", "sort", "sort_dir", "cryptocurrency_type", "aux"]
     * @return array
     */
    public function listingsLatest(array $params = []): array
    {
        return $this->sendRequest('listings/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "time_period", "time_start", "time_end", "count", "interval", "convert", "convert_id", "skip_invalid"]
     * @return array
     */
    public function OHLCVHistorical(array $params): array
    {
        return $this->sendRequest('ohlcv/historical', $params);
    }

    /**
     * @param array $params ["id", "symbol", "convert", "convert_id", "skip_invalid"]
     * @return array
     */
    public function OHLCVLatest(array $params): array
    {
        return $this->sendRequest('ohlcv/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "time_period", "convert", "convert_id", "skip_invalid"]
     * @return array
     */
    public function pricePerformanceStats(array $params): array
    {
        return $this->sendRequest('price-performance-stats/latest', $params);
    }

    /**
     * @param array $params ["id", "symbol", "time_start", "time_end", "count", "interval", "convert", "convert_id", "aux", "skip_invalid"]
     * @return array
     */
    public function quotesHistorical(array $params): array
    {
        return $this->sendRequest('price-quotes/historical', $params);
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
