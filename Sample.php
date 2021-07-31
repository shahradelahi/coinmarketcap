<?php
require_once __DIR__ . '/vendor/autoload.php';


$CMCApi = new CoinMarketCap\Api('yourApiKey');

$CryptocurrencyMap = $CMCApi->cryptocurrency()->map([
    'limit' => 5,
]);
echo json_encode($CryptocurrencyMap, JSON_PRETTY_PRINT);