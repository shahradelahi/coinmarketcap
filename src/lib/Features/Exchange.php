<?php

namespace CoinMarketCap\Features;

use CoinMarketCap\Utils\ApiRequest;

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
        self::$apiPath .= 'cryptocurrency' . '/';
    }

    /**
     * @param array $params ["id", "slug", "aux"]
     * @return array
     */
    public function info(array $params = []): array
    {
        return $this->sendRequest('info', $params);
    }

    /**
     * @param array $params ["listing_status", "slug", "start", "limit", "sort", "aux", "crypto_id"]
     * @return array
     */
    public function map(array $params = []): array
    {
        return $this->sendRequest('map', $params);
    }

    /**
     * @param array $params ["start", "limit", "sort", "sort_dir", "market_type", "aux", "convert", "convert_id"]
     * @return array
     */
    public function listingsLatest(array $params): array
    {
        return $this->sendRequest('listings/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "start", "limit", "aux", "matched_id", "matched_symbol", "category", "fee_type", "convert", "convert_id"]
     * @return array
     */
    public function marketPairsLatest(array $params): array
    {
        return $this->sendRequest('market-pairs/latest', $params);
    }

}