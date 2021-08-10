<?php
require_once __DIR__ . '/vendor/autoload.php';


error_reporting(E_ERROR); // debug only
ini_set('display_errors', '1'); // debug only

$CMCApi = new CoinMarketCap\Api('yourApiKey');

$CryptocurrencyMap = $CMCApi->cryptocurrency()->map();
echo json_encode($CryptocurrencyMap, JSON_PRETTY_PRINT);

try {

    $CMCApi->ticker()->setTicker([
        'close_time' => strtotime('+1 minute', time()),
        'ids' => "1,2,3,4,5,8,10,13,16,18,25,32,35,37,41,42,43,45,50,52,53,56,61,64,66,67,69,72,74,77,78,80,83,84,85"
    ], function (array $Query) {
        printf("<pre>Received: %s</pre>", json_encode($Query, JSON_PRETTY_PRINT)); // PHP-FMP
        printf("\033[92mReceived:\033[0m %s\n\n", json_encode($Query)); // PHP-CLI
    });

} catch (Exception  $e) {
    echo "<pre>" . $e->getMessage() . "</pre>";
}
