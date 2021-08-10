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
class Exchange extends ApiRequest
{

    /**
     * Cryptocurrency constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * @param array $params ["id", "slug", "aux"]
     * @return array
     */
    public function info(array $params = []): array
    {
        return $this->sendRequest('exchange/info', $params);
    }

    /**
     * @param array $params ["listing_status", "slug", "start", "limit", "sort", "aux", "crypto_id"]
     * @return array
     */
    public function map(array $params = []): array
    {
        return $this->sendRequest('exchange/map', $params);
    }

    /**
     * @param array $params ["start", "limit", "sort", "sort_dir", "market_type", "aux", "convert", "convert_id"]
     * @return array
     */
    public function listingsLatest(array $params): array
    {
        return $this->sendRequest('exchange/listings/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "start", "limit", "aux", "matched_id", "matched_symbol", "category", "fee_type", "convert", "convert_id"]
     * @return array
     */
    public function marketPairsLatest(array $params): array
    {
        return $this->sendRequest('exchange/market-pairs/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "time_start", "time_end", "count", "interval", "convert", "convert_id"]
     * @return array
     */
    public function quotesHistorical(array $params): array
    {
        return $this->sendRequest('exchange/quotes/historical', $params);
    }

    /**
     * @param array $params ["id", "slug", "convert", "convert_id", "aux"]
     * @return array
     */
    public function quotesLatest(array $params): array
    {
        return $this->sendRequest('exchange/quotes/latest', $params);
    }

}