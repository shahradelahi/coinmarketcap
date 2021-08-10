<?php

namespace coinmarketcap\Utils;

use coinmarketcap\Components\ClientConfig;
use coinmarketcap\Components\WscMain;
use coinmarketcap\Exceptions\BadUriException;
use coinmarketcap\Exceptions\ConnectionException;
use Exception;
use InvalidArgumentException;

class WebSocketClient extends WscMain
{
    /**
     * Sets parameters for Web Socket Client intercommunication
     *
     * @param string $url string representation of a socket utf, ex.: tcp://www.example.com:8000 or udp://example.com:13
     * @param ClientConfig $config Client configuration settings e.g.: connection - timeout, ssl options, fragment message size to send etc.
     * @throws InvalidArgumentException
     * @throws BadUriException
     * @throws ConnectionException
     * @throws Exception
     */
    public function __construct(string $url, ClientConfig $config)
    {
        $this->socketUrl = $url;
        $this->connect($config);
    }
}
