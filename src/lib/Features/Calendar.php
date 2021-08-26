<?php

namespace coinmarketcap\Features;

use coinmarketcap\Utils\ApiRequest;

class Calendar extends ApiRequest
{

    /**
     * No api key needed, you can return a empty string.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * @param array $params ["id"]
     * @return array
     */
    public function info(array $params): array
    {
        return $this->sendPrivate('https://api.coinmarketcap.com/data-api/v1/calendar-event/info', $params);
    }

    /**
     * @param array $params ["limit"]
     * @return array
     */
    public function historical(array $params): array
    {
        return $this->sendPrivate('https://api.coinmarketcap.com/data-api/v1/calendar-event/listings/latest', $params);
    }


}