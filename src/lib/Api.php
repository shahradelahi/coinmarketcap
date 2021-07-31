<?php

namespace CoinMarketCap;

use CoinMarketCap\Features\Cryptocurrency;
use CoinMarketCap\Features\Exchange;
use CoinMarketCap\Features\Fiat;
use CoinMarketCap\Features\GlobalMetrics;
use CoinMarketCap\Features\Partners;
use CoinMarketCap\Features\Tools;

/**
 * Api
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class Api
{
    private string $apiKey;
    private Cryptocurrency $cryptocurrency;
    private Fiat $fiat;
    private Exchange $exchange;
    private GlobalMetrics $globalMetrics;
    private Tools $tools;
    private Partners $partners;

    /**
     * Api constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return Cryptocurrency
     */
    public function cryptocurrency(): Cryptocurrency
    {
        $this->cryptocurrency = $this->cryptocurrency ?: new Cryptocurrency($this->apiKey);
        return $this->cryptocurrency;
    }

    /**
     * @return Fiat
     */
    public function fiat(): Fiat
    {
        $this->fiat = $this->fiat ?: new Fiat($this->apiKey);
        return $this->fiat;
    }

    /**
     * @return Exchange
     */
    public function exchange(): Exchange
    {
        $this->exchange = $this->exchange ?: new Exchange($this->apiKey);
        return $this->exchange;
    }

    /**
     * @return GlobalMetrics
     */
    public function globalMetrics(): GlobalMetrics
    {
        $this->globalMetrics = $this->globalMetrics ?: new GlobalMetrics($this->apiKey);
        return $this->globalMetrics;
    }

    /**
     * @return Tools
     */
    public function tools(): Tools
    {
        $this->tools = $this->tools ?: new Tools($this->apiKey);
        return $this->tools;
    }

    /**
     * @return Partners
     */
    public function partners(): Partners
    {
        $this->partners = $this->partners ?: new Partners($this->apiKey);
        return $this->partners;
    }

}
