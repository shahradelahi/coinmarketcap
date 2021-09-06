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
     * @param array $Settings ['close_time', 'ids']
     * @param $Query
     * @param $Extra
     * @throws Exception
     */
    public function setTicker(array $Settings, $Query, $Extra)
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
                    if ($JsonMessage['id'] == "price") $Query($JsonMessage['d'], $Extra);
                }
            }

        } catch (BadUriException | Exception | BadOpcodeException | ConnectionException $e) {
            throw new Exception($e->getMessage());
        }

    }

}