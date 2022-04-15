### Fiat

API endpoints for fiat currencies.

- [CoinMarketCap ID map](#coinmarketcap-id-map)

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
