<?php

namespace CoinMarketCap\Utils;

/**
 * ApiRequest
 *
 * @link    https://github.com/shahradelahi/coinmarketcap
 * @author  Shahrad Elahi (https://github.com/shahradelahi)
 * @license https://github.com/shahradelahi/coinmarketcap/blob/master/LICENSE (MIT License)
 */
abstract class ApiRequest
{

    protected static string $apiPath = "https://pro-api.coinmarketcap.com/v1/";

    private static array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ];

    /**
     * ApiRequest constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        self::$headers['X-CMC_PRO_API_KEY'] = $apiKey;
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @return array
     */
    protected static function sendRequest(string $endpoint, array $parameters = []): array
    {
        $queryString = http_build_query($parameters); // query string encode the parameters

        $endPointUrl = self::$apiPath . $endpoint . "?" . $queryString; // create the request URL

        $curl = curl_init(); // Get cURL resource

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPointUrl,     // set the request URL
            CURLOPT_HTTPHEADER => self::$headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        curl_close($curl); // Close request

        return json_decode($response, true);
    }

}
