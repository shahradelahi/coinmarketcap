<?php

namespace coinmarketcap;

use coinmarketcap\Features\Cryptocurrency;
use coinmarketcap\Features\Exchange;
use coinmarketcap\Features\Fiat;
use coinmarketcap\Features\GlobalMetrics;
use coinmarketcap\Features\Partners;
use coinmarketcap\Features\Ticker;
use coinmarketcap\Features\Tools;

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
    private Ticker $ticker;

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
        $this->cryptocurrency = (isset($this->cryptocurrency)) ? $this->cryptocurrency : new Cryptocurrency($this->apiKey);
        return $this->cryptocurrency;
    }

    /**
     * @return Fiat
     */
    public function fiat(): Fiat
    {
        $this->fiat = (isset($this->fiat)) ? $this->fiat : new Fiat($this->apiKey);
        return $this->fiat;
    }

    /**
     * @return Exchange
     */
    public function exchange(): Exchange
    {
        $this->exchange = (isset($this->exchange)) ? $this->exchange : new Exchange($this->apiKey);
        return $this->exchange;
    }

    /**
     * @return GlobalMetrics
     */
    public function globalMetrics(): GlobalMetrics
    {
        $this->globalMetrics = (isset($this->globalMetrics)) ? $this->globalMetrics : new GlobalMetrics($this->apiKey);
        return $this->globalMetrics;
    }

    /**
     * @return Tools
     */
    public function tools(): Tools
    {
        $this->tools = (isset($this->tools)) ? $this->tools : new Tools($this->apiKey);
        return $this->tools;
    }

    /**
     * @return Partners
     */
    public function partners(): Partners
    {
        $this->partners = (isset($this->partners)) ? $this->partners : new Partners($this->apiKey);
        return $this->partners;
    }

    /**
     * @return Ticker
     */
    public function ticker(): Ticker
    {
        $this->ticker = (isset($this->ticker)) ? $this->ticker : new Ticker();
        return $this->ticker;
    }

}
