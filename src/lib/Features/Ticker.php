<?php

namespace coinmarketcap\Features;


use coinmarketcap\Components\ClientConfig;
use coinmarketcap\Exceptions\BadOpcodeException;
use coinmarketcap\Exceptions\BadUriException;
use coinmarketcap\Exceptions\ConnectionException;
use coinmarketcap\Utils\WebSocketClient;
use Exception;

/**
 * Ticker
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
class Ticker
{

    /**
     * @var string
     */
    private string $key;

    /**
     * Ticker constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param array $Settings ["close_time", "ids"]
     * @param callable $Query
     * @throws Exception
     */
    public function setTicker(array $Settings, callable $Query)
    {
        try {
            $ClientConfig = new ClientConfig();
            $ClientConfig->setFragmentSize(8096);
            $ClientConfig->setTimeout(15);
            $WebSocketClient = new WebSocketClient('wss://stream.coinmarketcap.com:443/price/latest', $ClientConfig);
            $WebSocketClient->send('{"method":"subscribe","id":"price","data":{"cryptoIds":[' . $Settings['ids'] . '],"index":"detail"}}');
            while ($Settings['close_time'] > time()) {
                if (($message = $WebSocketClient->receive()) != "") {
                    $JsonMessage = json_decode($message, true);
                    if ($JsonMessage['id'] == "price") $Query($JsonMessage['d']);
                }
            }

        } catch (BadUriException|Exception|BadOpcodeException|ConnectionException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get id of coin by their symbol
     *
     * @param array $symbols ["BTC", "ETH", "LTC", ...]
     * @return array ["BTC" => "1", "ETH" => "1027", ...]
     */
    public function getIds(array $symbols): array
    {
        $Result = [];
        $Symbols = implode(',', $symbols);
        $Map = (new Cryptocurrency($this->key))->map([
            'symbol' => $Symbols
        ])['data'];
        for ($i = 0; $i < count($symbols); $i++) {
            $Result[$symbols[$i]] = $Map[$i]['id'];
        }
        return $Result;
    }

}