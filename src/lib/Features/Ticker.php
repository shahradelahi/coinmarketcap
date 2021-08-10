<?php

namespace coinmarketcap\Features;


use coinmarketcap\Components\ClientConfig;
use coinmarketcap\Exceptions\BadOpcodeException;
use coinmarketcap\Exceptions\BadUriException;
use coinmarketcap\Exceptions\ConnectionException;
use coinmarketcap\WebSocketClient;
use Exception;

class Ticker
{

    /**
     * @param array $Settings ['close_time', 'ids']
     * @param $Query
     * @throws Exception
     */
    public function setTicker(array $Settings, $Query)
    {
        try {
            $ClientConfig = new ClientConfig();
            $ClientConfig->setFragmentSize(8096);
            $ClientConfig->setTimeout(15);
            $WebSocketClient = new WebSocketClient('wss://stream.coinmarketcap.com:443/price/latest', $ClientConfig);
            $WebSocketClient->send('{"method":"subscribe","id":"price","data":{"cryptoIds":[' . $Settings['ids'] . '],"index":null}}');
            while ($Settings['close_time'] > time()) {
                if (($message = $WebSocketClient->receive()) != "") {
                    $JsonMessage = json_decode($message, true);
                    if ($JsonMessage['id'] == "price") $Query($JsonMessage['d']);
                }
            }

        } catch (BadUriException | Exception | BadOpcodeException | ConnectionException $e) {
            throw new Exception($e->getMessage());
        }

    }

}