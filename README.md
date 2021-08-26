> **Help wanted:** I don't have enough time to keep updating this library, if you can, don't be shy. <br/> ***Pull requests are welcome.***

# PHP CoinMarketCap API

This project is designed to help you make your own projects that interact with
the [CoinMarketCap API](https://coinmarketcap.com/api/documentation/v1).

#### Requirements

```
ext-pcntl: *
ext-curl: *
ext-json: *
php: >=7.4
```

#### Installation

```
composer require shahradelahi/coinmarketcap
```

<details>
 <summary>Click for help with installation</summary>

## Install Composer

If the above step didn't work, install composer and try again.

#### Debian / Ubuntu

```
sudo apt-get install curl php-curl
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

Composer not found? Use this command instead:

```
php composer.phar require "shahradelahi/coinmarketcap"
```

#### Windows:

[Download installer for Windows](https://github.com/jaggedsoft/php-binance-api/#installing-on-windows)

</details>

#### Getting started

`composer require shahradelahi/coinmarketcap`

```php
require 'vendor/autoload.php';
$CMCApi = new CoinMarketCap\Api();
```

=======

### Cryptocurrency

API endpoints for cryptocurrencies. This category currently includes 10 endpoints:

- [Metadata](#cryptocurrency-metadata)
- [CoinMarketCap ID map](#cryptocurrency-coinmarketcap-id-map)
- [Latest listings](#cryptocurrency-listings-latest)
- [Historical listings](#cryptocurrency-listings-historical)
- [Latest quotes](#cryptocurrency-quotes-latest)
- [Historical quotes](#cryptocurrency-quotes-historical)
- [Latest market pairs](#cryptocurrency-market-pairs-latest)
- [Latest OHLCV](#cryptocurrency-ohlcv-latest)
- [Historical OHLCV](#cryptocurrency-ohlcv-historical)
- [Price performance Stats](#cryptocurrency-price-performance-stats)

#### Cryptocurrency: Metadata

Returns all static metadata available for one or more cryptocurrencies. This information includes details like logo,
description, official website URL, social links, and links to a cryptocurrency's technical documentation.

```php
$CMCApi->cryptocurrency()->info([
    'id' => 1, 
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "1": {
		 "urls": {
			"website": [
			   "https://bitcoin.org/"
			],
			"technical_doc": [
			   "https://bitcoin.org/bitcoin.pdf"
			],
			"twitter": [],
			"reddit": [
			   "https://reddit.com/r/bitcoin"
			],
			"message_board": [
			   "https://bitcointalk.org"
			],
			"announcement": [],
			"chat": [],
			"explorer": [
			   "https://blockchain.coinmarketcap.com/chain/bitcoin",
			   "https://blockchain.info/",
			   "https://live.blockcypher.com/btc/"
			],
			"source_code": [
			   "https://github.com/bitcoin/"
			]
		 },
		 "logo": "https://s2.coinmarketcap.com/static/img/coins/64x64/1.png",
		 "id": 1,
		 "name": "Bitcoin",
		 "symbol": "BTC",
		 "slug": "bitcoin",
		 "description": "Bitcoin (BTC) is a consensus network that enables a new payment system and a completely digital currency. Powered by its users, it is a peer to peer payment network that requires no central authority to operate. On October 31st, 2008, an individual or group of individuals operating under the pseudonym \"Satoshi Nakamoto\" published the Bitcoin Whitepaper and described it as: \"a purely peer-to-peer version of electronic cash would allow online payments to be sent directly from one party to another without going through a financial institution.\"",
		 "date_added": "2013-04-28T00:00:00.000Z",
		 "tags": [
			"mineable"
		 ],
		 "platform": null,
		 "category": "coin"
	  }
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: CoinMarketCap ID Map

Returns a mapping of all cryptocurrencies to unique CoinMarketCap `id`s. Per our Best Practices we recommend utilizing
CMC ID instead of cryptocurrency `symbols` to securely identify cryptocurrencies with our other endpoints and in your
own application logic. Each cryptocurrency returned includes typical identifiers such as `name`, `symbol`,
and `token_address` for flexible mapping to `id`.

```php
$CMCApi->cryptocurrency()->map([
    'limit' => 5,
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": [
	  {
		 "id": 1,
		 "rank": 1,
		 "name": "Bitcoin",
		 "symbol": "BTC",
		 "slug": "bitcoin",
		 "is_active": 1,
		 "first_historical_data": "2013-04-28T18:47:21.000Z",
		 "last_historical_data": "2020-05-05T20:44:01.000Z",
		 "platform": null
	  }
   ],
   "status": {
	  "timestamp": "2018-06-02T22:51:28.209Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: Listings Historical

Returns a ranked and sorted list of all cryptocurrencies for a historical UTC date.

```php
$CMCApi->cryptocurrency()->listingsHistorical([
    'date' => 1627810811, // Required
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": [
	  {
		 "id": 1,
		 "name": "Bitcoin",
		 "symbol": "BTC",
		 "slug": "bitcoin",
		 "cmc_rank": 1,
		 "num_market_pairs": 500,
		 "circulating_supply": 17200062,
		 "total_supply": 17200062,
		 "max_supply": 21000000,
		 "last_updated": "2018-06-02T22:51:28.209Z",
		 "date_added": "2013-04-28T00:00:00.000Z",
		 "tags": [
			"mineable"
		 ],
		 "platform": null,
		 "quote": {
			"USD": {
			   "price": 9283.92,
			   "volume_24h": 7155680000,
			   "percent_change_1h": -0.152774,
			   "percent_change_24h": 0.518894,
			   "percent_change_7d": 0.986573,
			   "market_cap": 158055024432,
			   "last_updated": "2018-08-09T22:53:32.000Z"
			},
			"BTC": {
			   "price": 1,
			   "volume_24h": 772012,
			   "percent_change_1h": 0,
			   "percent_change_24h": 0,
			   "percent_change_7d": 0,
			   "market_cap": 17024600,
			   "last_updated": "2018-08-09T22:53:32.000Z"
			}
		 }
	  }
   ],
   "status": {
	  "timestamp": "2019-04-02T22:44:24.200Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: Listings Latest

Returns a paginated list of all active cryptocurrencies with latest market data. The default "market_cap" sort returns
cryptocurrency in order of CoinMarketCap's market cap rank, but you may configure this call to order by another market
ranking field. Use the "convert" option to return market values in multiple fiat and cryptocurrency conversions in the
same call.

```php
$CMCApi->cryptocurrency()->listingsLatest();
```

<details>
 <summary>View Response</summary>

```json
{
   "data": [
	  {
		 "id": 1,
		 "name": "Bitcoin",
		 "symbol": "BTC",
		 "slug": "bitcoin",
		 "cmc_rank": 5,
		 "num_market_pairs": 500,
		 "circulating_supply": 16950100,
		 "total_supply": 16950100,
		 "max_supply": 21000000,
		 "last_updated": "2018-06-02T22:51:28.209Z",
		 "date_added": "2013-04-28T00:00:00.000Z",
		 "tags": [
			"mineable"
		 ],
		 "platform": null,
		 "quote": {
			"USD": {
			   "price": 9283.92,
			   "volume_24h": 7155680000,
			   "percent_change_1h": -0.152774,
			   "percent_change_24h": 0.518894,
			   "percent_change_7d": 0.986573,
			   "market_cap": 158055024432,
			   "last_updated": "2018-08-09T22:53:32.000Z"
			},
			"BTC": {
			   "price": 1,
			   "volume_24h": 772012,
			   "percent_change_1h": 0,
			   "percent_change_24h": 0,
			   "percent_change_7d": 0,
			   "market_cap": 17024600,
			   "last_updated": "2018-08-09T22:53:32.000Z"
			}
		 }
	  }
   ],
   "status": {
	  "timestamp": "2018-06-02T22:51:28.209Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: Market Pairs Latest

Lists all active market pairs that CoinMarketCap tracks for a given cryptocurrency or fiat currency. All markets with
this currency as the pair base or pair quote will be returned. The latest price and volume information is returned for
each market. Use the "convert" option to return market values in multiple fiat and cryptocurrency conversions in the
same call.

```php
$CMCApi->cryptocurrency()->marketPairs([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "id": 1,
	  "name": "Bitcoin",
	  "symbol": "BTC",
	  "num_market_pairs": 7526,
	  "market_pairs": [
		 {
			"exchange": {
			   "id": 157,
			   "name": "BitMEX",
			   "slug": "bitmex"
			},
			"market_id": 4902,
			"market_pair": "BTC/USD",
			"category": "derivatives",
			"fee_type": "no-fees",
			"market_pair_base": {
			   "currency_id": 1,
			   "currency_symbol": "BTC",
			   "exchange_symbol": "XBT",
			   "currency_type": "cryptocurrency"
			},
			"market_pair_quote": {
			   "currency_id": 2781,
			   "currency_symbol": "USD",
			   "exchange_symbol": "USD",
			   "currency_type": "fiat"
			},
			"quote": {
			   "exchange_reported": {
				  "price": 7839,
				  "volume_24h_base": 434215.85308502,
				  "volume_24h_quote": 3403818072.33347,
				  "last_updated": "2019-05-24T02:39:00.000Z"
			   },
			   "USD": {
				  "price": 7839,
				  "volume_24h": 3403818072.33347,
				  "last_updated": "2019-05-24T02:39:00.000Z"
			   }
			}
		 }
	  ]
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: OHLCV Historical

Returns historical OHLCV (Open, High, Low, Close, Volume) data along with market cap for any cryptocurrency using time
interval parameters. Currently daily and hourly OHLCV periods are supported. Volume is only supported with daily periods
at this time.

```php
$CMCApi->cryptocurrency()->OHLCVHistorical([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "id": 1,
	  "name": "Bitcoin",
	  "symbol": "BTC",
	  "quotes": [
		 {
			"time_open": "2019-01-02T00:00:00.000Z",
			"time_close": "2019-01-02T23:59:59.999Z",
			"time_high": "2019-01-02T03:53:00.000Z",
			"time_low": "2019-01-02T02:43:00.000Z",
			"quote": {
			   "USD": {
				  "open": 3849.21640853,
				  "high": 3947.9812729,
				  "low": 3817.40949569,
				  "close": 3943.40933686,
				  "volume": 5244856835.70851,
				  "market_cap": 68849856731.6738,
				  "timestamp": "2019-01-02T23:59:59.999Z"
			   }
			}
		 }
	  ]
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: OHLCV Latest

Returns the latest OHLCV (Open, High, Low, Close, Volume) market values for one or more cryptocurrencies for the current
UTC day. Since the current UTC day is still active these values are updated frequently. You can find the final
calculated OHLCV values for the last completed UTC day along with all historic days using
/cryptocurrency/ohlcv/historical.

```php
$CMCApi->cryptocurrency()->OHLCVLatest([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "1": {
		 "id": 1,
		 "name": "Bitcoin",
		 "symbol": "BTC",
		 "last_updated": "2018-09-10T18:54:00.000Z",
		 "time_open": "2018-09-10T00:00:00.000Z",
		 "time_close": null,
		 "time_high": "2018-09-10T00:00:00.000Z",
		 "time_low": "2018-09-10T00:00:00.000Z",
		 "quote": {
			"USD": {
			   "open": 6301.57,
			   "high": 6374.98,
			   "low": 6292.76,
			   "close": 6308.76,
			   "volume": 3786450000,
			   "last_updated": "2018-09-10T18:54:00.000Z"
			}
		 }
	  }
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: Price Performance Stats

Returns price performance statistics for one or more cryptocurrencies including launch price ROI and all-time high /
all-time low. Stats are returned for an `all_time` period by default. UTC `yesterday` and a number of rolling time
periods may be requested using the `time_period` parameter. Utilize the `convert` parameter to translate values into
multiple fiats or cryptocurrencies using historical rates.

```php
$CMCApi->cryptocurrency()->OHLCVLatest([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "1": {
		 "id": 1,
		 "name": "Bitcoin",
		 "symbol": "BTC",
		 "slug": "bitcoin",
		 "last_updated": "2019-08-22T01:51:32.000Z",
		 "periods": {
			"all_time": {
			   "open_timestamp": "2013-04-28T00:00:00.000Z",
			   "high_timestamp": "2017-12-17T12:19:14.000Z",
			   "low_timestamp": "2013-07-05T18:56:01.000Z",
			   "close_timestamp": "2019-08-22T01:52:18.613Z",
			   "quote": {
				  "USD": {
					 "open": 135.3000030517578,
					 "open_timestamp": "2013-04-28T00:00:00.000Z",
					 "high": 20088.99609375,
					 "high_timestamp": "2017-12-17T12:19:14.000Z",
					 "low": 65.5260009765625,
					 "low_timestamp": "2013-07-05T18:56:01.000Z",
					 "close": 65.5260009765625,
					 "close_timestamp": "2019-08-22T01:52:18.618Z",
					 "percent_change": 7223.718930042746,
					 "price_change": 9773.691932798241
				  }
			   }
			}
		 }
	  }
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: Quotes Historical

Returns an interval of historic market quotes for any cryptocurrency based on time and interval parameters.

```php
$CMCApi->cryptocurrency()->quotesHistorical([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "id": 1,
	  "name": "Bitcoin",
	  "symbol": "BTC",
	  "is_active": 1,
	  "is_fiat": 0,
	  "quotes": [
		 {
			"timestamp": "2018-06-22T19:29:37.000Z",
			"quote": {
			   "USD": {
				  "price": 6242.29,
				  "volume_24h": 4681670000,
				  "market_cap": 106800038746.48,
				  "timestamp": "2018-06-22T19:29:37.000Z"
			   }
			}
		 },
		 {
			"timestamp": "2018-06-22T19:34:33.000Z",
			"quote": {
			   "USD": {
				  "price": 6242.82,
				  "volume_24h": 4682330000,
				  "market_cap": 106809106575.84,
				  "timestamp": "2018-06-22T19:34:33.000Z"
			   }
			}
		 }
	  ]
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Cryptocurrency: Quotes Latest

Returns the latest market quote for 1 or more cryptocurrencies. Use the "convert" option to return market values in
multiple fiat and cryptocurrency conversions in the same call.

```php
$CMCApi->cryptocurrency()->quotesHistorical([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "1": {
		 "id": 1,
		 "name": "Bitcoin",
		 "symbol": "BTC",
		 "slug": "bitcoin",
		 "is_active": 1,
		 "is_fiat": 0,
		 "circulating_supply": 17199862,
		 "total_supply": 17199862,
		 "max_supply": 21000000,
		 "date_added": "2013-04-28T00:00:00.000Z",
		 "num_market_pairs": 331,
		 "cmc_rank": 1,
		 "last_updated": "2018-08-09T21:56:28.000Z",
		 "tags": [
			"mineable"
		 ],
		 "platform": null,
		 "quote": {
			"USD": {
			   "price": 6602.60701122,
			   "volume_24h": 4314444687.5194,
			   "percent_change_1h": 0.988615,
			   "percent_change_24h": 4.37185,
			   "percent_change_7d": -12.1352,
			   "percent_change_30d": -12.1352,
			   "market_cap": 113563929433.21645,
			   "last_updated": "2018-08-09T21:56:28.000Z"
			}
		 }
	  }
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

### Fiat

API endpoints for fiat currencies.

#### CoinMarketCap ID Map

Returns a mapping of all supported fiat currencies to unique CoinMarketCap ids. Per our Best Practices we recommend
utilizing CMC ID instead of currency symbols to securely identify assets with our other endpoints and in your own
application logic.

```php
$CMCApi->fiat()->map();
```

<details>
 <summary>View Response</summary>

```json
{
   "data": [
	  {
		 "id": 2781,
		 "name": "United States Dollar",
		 "sign": "$",
		 "symbol": "USD"
	  },
	  {
		 "id": 2787,
		 "name": "Chinese Yuan",
		 "sign": "¥",
		 "symbol": "CNY"
	  },
	  {
		 "id": 2781,
		 "name": "South Korean Won",
		 "sign": "₩",
		 "symbol": "KRW"
	  }
   ],
   "status": {
	  "timestamp": "2020-01-07T22:51:28.209Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 3,
	  "credit_count": 1
   }
}
```

</details>

### Exchange

API endpoints for cryptocurrency exchanges.

#### Metadata

Returns all static metadata for one or more exchanges. This information includes details like launch date, logo,
official website URL, social links, and market fee documentation URL.

```php
$CMCApi->exchange()->info([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "270": {
		 "id": 270,
		 "name": "Binance",
		 "slug": "binance",
		 "logo": "https://s2.coinmarketcap.com/static/img/exchanges/64x64/270.png",
		 "description": "Launched in Jul-2017, Binance is a centralized exchange based in Malta.",
		 "date_launched": "2017-07-14T00:00:00.000Z",
		 "notice": null,
		 "countries": [],
		 "fiats": [
			"AED",
			"USD"
		 ],
		 "tags": null,
		 "type": "",
		 "maker_fee": 0.02,
		 "taker_fee": 0.04,
		 "spot_volume_usd": 66926283498.60113,
		 "spot_volume_last_updated": "2021-05-06T01:20:15.451Z",
		 "urls": {
			"website": [
			   "https://www.binance.com/"
			],
			"twitter": [
			   "https://twitter.com/binance"
			],
			"blog": [],
			"chat": [
			   "https://t.me/binanceexchange"
			],
			"fee": [
			   "https://www.binance.com/fees.html"
			]
		 }
	  }
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### CoinMarketCap ID Map

Returns a paginated list of all active cryptocurrency exchanges by CoinMarketCap ID. We recommend using this convenience
endpoint to lookup and utilize our unique exchange `id` across all endpoints as typical exchange identifiers may change
over time. As a convenience you may pass a comma-separated list of exchanges by `slug` to filter this list to only those
you require or the `aux` parameter to slim down the payload.

```php
$CMCApi->exchange()->map();
```

<details>
 <summary>View Response</summary>

```json
{
   "data": [
	  {
		 "id": 270,
		 "name": "Binance",
		 "slug": "binance",
		 "is_active": 1,
		 "status": "active",
		 "first_historical_data": "2018-04-26T00:45:00.000Z",
		 "last_historical_data": "2019-06-02T21:25:00.000Z"
	  }
   ],
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Listings Latest

Returns a paginated list of all cryptocurrency exchanges including the latest aggregate market data for each exchange.
Use the "convert" option to return market values in multiple fiat and cryptocurrency conversions in the same call.

```php
$CMCApi->exchange()->listingsLatest();
```

<details>
 <summary>View Response</summary>

```json
{
   "data": [
	  {
		 "id": 270,
		 "name": "Binance",
		 "slug": "binance",
		 "num_market_pairs": 1214,
		 "fiats": [
			"AED",
			"USD"
		 ],
		 "visits": "34690815",
		 "traffic_score": 1000,
		 "rank": 1,
		 "exchange_score": 9.8028,
		 "liquidity_score": 9.8028,
		 "last_updated": "2018-11-08T22:18:00.000Z",
		 "quote": {
			"USD": {
			   "volume_24h": 769291636.239632,
			   "volume_24h_adjusted": 769291636.239632,
			   "volume_7d": 3666423776,
			   "volume_30d": 21338299776,
			   "percent_change_volume_24h": -11.6153,
			   "percent_change_volume_7d": 67.2055,
			   "percent_change_volume_30d": 0.00169339,
			   "effective_liquidity_24h": 629.9774,
			   "derivative_volume_usd": 62828618628.85901,
			   "spot_volume_usd": 39682580614.8572
			}
		 }
	  },
	  {
		 "id": 294,
		 "name": "OKEx",
		 "slug": "okex",
		 "num_market_pairs": 385,
		 "fiats": [
			"AED",
			"USD"
		 ],
		 "visits": "34690815",
		 "traffic_score": 845.1565,
		 "rank": 1,
		 "exchange_score": 7.0815,
		 "liquidity_score": 9.8028,
		 "last_updated": "2018-11-08T22:18:00.000Z",
		 "quote": {
			"USD": {
			   "volume_24h": 677439315.721563,
			   "volume_24h_adjusted": 677439315.721563,
			   "volume_7d": 3506137120,
			   "volume_30d": 14418225072,
			   "percent_change_volume_24h": -13.9256,
			   "percent_change_volume_7d": 60.0461,
			   "percent_change_volume_30d": 67.2225,
			   "effective_liquidity_24h": 629.9774,
			   "derivative_volume_usd": 62828618628.85901,
			   "spot_volume_usd": 39682580614.8572
			}
		 }
	  }
   ],
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Market Pairs Latest

Returns all active market pairs that CoinMarketCap tracks for a given exchange. The latest price and volume information
is returned for each market. Use the "convert" option to return market values in multiple fiat and cryptocurrency
conversions in the same call.'

```php
$CMCApi->exchange()->marketPairsLatest([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "id": 270,
	  "name": "Binance",
	  "slug": "binance",
	  "num_market_pairs": 473,
	  "market_pairs": [
		 {
			"market_id": 9933,
			"market_pair": "BTC/USDT",
			"category": "spot",
			"fee_type": "percentage",
			"outlier_detected": 0,
			"exclusions": null,
			"market_pair_base": {
			   "currency_id": 1,
			   "currency_symbol": "BTC",
			   "exchange_symbol": "BTC",
			   "currency_type": "cryptocurrency"
			},
			"market_pair_quote": {
			   "currency_id": 825,
			   "currency_symbol": "USDT",
			   "exchange_symbol": "USDT",
			   "currency_type": "cryptocurrency"
			},
			"quote": {
			   "exchange_reported": {
				  "price": 7901.83,
				  "volume_24h_base": 47251.3345550653,
				  "volume_24h_quote": 373372012.927251,
				  "last_updated": "2019-05-24T01:40:10.000Z"
			   },
			   "USD": {
				  "price": 7933.66233493434,
				  "volume_24h": 374876133.234903,
				  "last_updated": "2019-05-24T01:40:10.000Z"
			   }
			}
		 },
		 {
			"market_id": 36329,
			"market_pair": "MATIC/BTC",
			"category": "spot",
			"fee_type": "percentage",
			"outlier_detected": 0,
			"exclusions": null,
			"market_pair_base": {
			   "currency_id": 3890,
			   "currency_symbol": "MATIC",
			   "exchange_symbol": "MATIC",
			   "currency_type": "cryptocurrency"
			},
			"market_pair_quote": {
			   "currency_id": 1,
			   "currency_symbol": "BTC",
			   "exchange_symbol": "BTC",
			   "currency_type": "cryptocurrency"
			},
			"quote": {
			   "exchange_reported": {
				  "price": 0.0000034,
				  "volume_24h_base": 8773968381.05,
				  "volume_24h_quote": 29831.49249557,
				  "last_updated": "2019-05-24T01:41:16.000Z"
			   },
			   "USD": {
				  "price": 0.0269295015799739,
				  "volume_24h": 236278595.380127,
				  "last_updated": "2019-05-24T01:41:16.000Z"
			   }
			}
		 }
	  ]
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Quotes Historical

Returns an interval of historic quotes for any exchange based on time and interval parameters.

```php
$CMCApi->exchange()->quotesHistorical([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "id": 270,
	  "name": "Binance",
	  "slug": "binance",
	  "quotes": [
		 {
			"timestamp": "2018-06-03T00:00:00.000Z",
			"quote": {
			   "USD": {
				  "volume_24h": 1632390000,
				  "timestamp": "2018-06-03T00:00:00.000Z"
			   }
			},
			"num_market_pairs": 338
		 },
		 {
			"timestamp": "2018-06-10T00:00:00.000Z",
			"quote": {
			   "USD": {
				  "volume_24h": 1034720000,
				  "timestamp": "2018-06-10T00:00:00.000Z"
			   }
			},
			"num_market_pairs": 349
		 },
		 {
			"timestamp": "2018-06-17T00:00:00.000Z",
			"quote": {
			   "USD": {
				  "volume_24h": 883885000,
				  "timestamp": "2018-06-17T00:00:00.000Z"
			   }
			},
			"num_market_pairs": 357
		 }
	  ]
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>

#### Quotes Latest

Returns the latest aggregate market data for 1 or more exchanges. Use the "convert" option to return market values in
multiple fiat and cryptocurrency conversions in the same call.

```php
$CMCApi->exchange()->quotesLatest([
    'id' => 1
]);
```

<details>
 <summary>View Response</summary>

```json
{
   "data": {
	  "270": {
		 "id": 270,
		 "name": "Binance",
		 "slug": "binance",
		 "num_coins": 132,
		 "num_market_pairs": 385,
		 "last_updated": "2018-11-08T22:11:00.000Z",
		 "traffic_score": 1000,
		 "rank": 1,
		 "exchange_score": 9.8028,
		 "liquidity_score": 9.8028,
		 "quote": {
			"USD": {
			   "volume_24h": 768478308.529847,
			   "volume_24h_adjusted": 768478308.529847,
			   "volume_7d": 3666423776,
			   "volume_30d": 21338299776,
			   "percent_change_volume_24h": -11.8232,
			   "percent_change_volume_7d": 67.0306,
			   "percent_change_volume_30d": -0.0821558,
			   "effective_liquidity_24h": 629.9774
			}
		 }
	  }
   },
   "status": {
	  "timestamp": "2021-07-28T02:59:32.392Z",
	  "error_code": 0,
	  "error_message": "",
	  "elapsed": 10,
	  "credit_count": 1
   }
}
```

</details>
