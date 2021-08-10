<?php

namespace coinmarketcap\Features;

use coinmarketcap\Utils\ApiRequest;

/**
 * Partners
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class Partners extends ApiRequest
{

    /**
     * Partners constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * @param array $params ["start", "limit", "aux" ]
     * @return array
     */
    public function flipSideFCASListingLatest(array $params = []): array
    {
        return $this->sendRequest('partners/flipside-crypto/fcas/listings/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "aux" ]
     * @return mixed
     * @throws \Exception
     */
    public function flipSideFCASQuotesLatest(array $params = []): array
    {
        return $this->sendRequest('partners/flipside-crypto/fcas/quotes/latest', $params);
    }

}
