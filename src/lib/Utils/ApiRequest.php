<?php

namespace coinmarketcap\Utils;

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

        $headers = []; // HTTP Headers
        foreach (self::$headers as $key => $value) {
            array_push($headers, "$key: $value");
        }

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPointUrl,     // set the request URL
            CURLOPT_HTTPHEADER => $headers,  // set the headers
            CURLOPT_RETURNTRANSFER => true,  // ask for raw response instead of bool
            CURLOPT_FOLLOWLOCATION => true,  // follow location
        ));

        $response = curl_exec($curl); // Send the request, save the response

        curl_close($curl); // Close request

        if ($response != null) {
            return json_decode($response, true); // Real result
        } else {
            return ['ok' => false, 'error_code' => 400, 'description' => "Bad Request: CoinMarketCap api has respond with null."]; // Returns error code
        }
    }

    public static function sendPRequest($endpoint, array $parameters = []): array
    {
        $url = "https://api.coinmarketcap.com/data-api/v3/" . $endpoint;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        // Set cURL headers
        $headers = array(
            "accept: application/json",
            "origin: https://coinmarketcap.com",
            "referer: https://coinmarketcap.com/",
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36",
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


        $response = curl_exec($curl); // Send the request, save the response

        curl_close($curl); // Close request

        return json_decode($response, true); // Real result here
    }

}
