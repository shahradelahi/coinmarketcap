<?php

namespace coinmarketcap\Features;

use coinmarketcap\Utils\ApiRequest;

/**
 * GlobalMetrics
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class GlobalMetrics extends ApiRequest
{

    /**
     * GlobalMetrics constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * This method is using private API key.
     *
     * @param array $params ["convert", "convert_id"]
     * @return array
     */
    public function quotesLatest(array $params = []): array
    {
        return $this->sendPrivate('https://web-api.coinmarketcap.com/v1/global-metrics/quotes/latest', $params);
    }

}
