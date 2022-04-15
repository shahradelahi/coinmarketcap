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

    protected const apiPath = "https://pro-api.coinmarketcap.com/v1/";

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
        $queryString = http_build_query($parameters);

        $endPointUrl = self::apiPath . $endpoint . "?" . $queryString;

        $curl = curl_init();

        $headers = [];
        foreach (self::$headers as $key => $value) {
            $headers[] = "$key: $value";
        }

        curl_setopt_array($curl, [
            CURLOPT_URL => $endPointUrl,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        if ($response != null) {
            return json_decode($response, true);
        } else {
            return [
                'ok' => false,
                'error_code' => 400,
                'description' => "Bad Request: CoinMarketCap api has respond with null."
            ];
        }
    }

    /**
     * @param string $url
     * @param array $parameters
     * @return array
     */
    protected static function sendPrivate(string $url, array $parameters = []): array
    {
        $queryString = http_build_query($parameters);
        $url = $url . "?" . $queryString;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        $headers = array(
            "accept: application/json",
            "origin: https://coinmarketcap.com",
            "referer: https://coinmarketcap.com/",
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36",
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) != 200) {
            return [
                'ok' => false,
                'error_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
                'description' => "Bad Request: CoinMarketCap api has respond with null."
            ];
        }

        curl_close($curl);

        return json_decode($response, true);
    }

}
