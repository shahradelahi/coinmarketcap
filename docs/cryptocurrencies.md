### Cryptocurrency

API endpoints for cryptocurrencies. This category currently includes 10 endpoints:

- [Metadata](#metadata)
- [CoinMarketCap ID map](#coinmarketcap-id-map)
- [Latest listings](#listings-latest)
- [Historical listings](#listings-historical)
- [Latest quotes](#quotes-latest)
- [Historical quotes](#quotes-historical)
- [Latest market pairs](#market-pairs-latest)
- [Latest OHLCV](#ohlcv-latest)
- [Historical OHLCV](#ohlcv-historical)
- [Price performance Stats](#price-performance-stats)

#### Metadata

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

#### CoinMarketCap ID Map

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

#### Listings Historical

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

#### Listings Latest

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

#### Market Pairs Latest

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

#### OHLCV Historical

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

#### OHLCV Latest

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

#### Price Performance Stats

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

#### Quotes Historical

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

#### Quotes Latest

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