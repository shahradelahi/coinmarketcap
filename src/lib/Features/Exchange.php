<?php

namespace coinmarketcap\Features;

use coinmarketcap\Utils\ApiRequest;

/**
 * Exchange
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class Exchange extends ApiRequest
{

    /**
     * Exchange constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * This method is using private API key.
     *
     * @param array $params ["id", "slug", "aux"]
     * @return array
     */
    public function info(array $params = []): array
    {
        return $this->sendPrivate('https://web-api.coinmarketcap.com/v1/exchange/info', $params);
    }

    /**
     * This method is using private API key.
     *
     * @param array $params ["limit"]
     * @return array
     */
    public function listing(array $params = []): array
    {
        return $this->sendPrivate('https://api.coinmarketcap.com/data-api/v3/exchange/listing', $params);
    }

    /**
     * @param array $params ["start", "limit", "sort", "sort_dir", "market_type", "aux", "convert", "convert_id"]
     * @return array
     */
    public function listingsLatest(array $params): array
    {
        return $this->sendPrivate('https://web-api.coinmarketcap.com/v1/exchange/listings/latest', $params);
    }

    /**
     * This method is using private API key.
     *
     * @param array $params ["id", "slug", "start", "limit", "aux", "matched_id", "matched_symbol", "category", "fee_type", "convert", "convert_id"]
     * @return array
     */
    public function marketPairsLatest(array $params): array
    {
        return $this->sendPrivate('https://api.coinmarketcap.com/data-api/v3/exchange/market-pairs/latest', $params);
    }

    /**
     * This method is using private API key.
     *
     * @param array $params ["id", "slug", "time_start", "time_end", "count", "interval", "convert", "convert_id"]
     * @return array
     */
    public function quotesHistorical(array $params): array
    {
        return $this->sendPrivate('https://web-api.coinmarketcap.com/v1/exchange/quotes/historical', $params);
    }

    /**
     * This method is using private API key.
     *
     * @param array $params ["id", "slug", "convert", "convert_id", "aux"]
     * @return array
     */
    public function quotesLatest(array $params): array
    {
        return $this->sendPrivate('https://web-api.coinmarketcap.com/v1/exchange/quotes/latest', $params);
    }

}