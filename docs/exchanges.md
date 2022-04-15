### Exchange

API endpoints for cryptocurrency exchanges.

- [Metadata](#metadata)
- [CoinMarketCap ID map](#coinmarketcap-id-map)
- [Listings Latest](#listings-latest)
- [Market Pairs Latest](#market-pairs-latest)
- [Quotes Historical](#quotes-historical)
- [Quotes Latest](#quotes-latest)

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
