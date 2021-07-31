> **Help wanted:** This library is officially depreciated and will only be actively maintained by the community. <br/> ***Pull requests are welcome.***

# PHP CoinMarketCap API

This project is designed to help you make your own projects that interact with the [CoinMarketCap API](https://coinmarketcap.com/api/documentation/v1).

#### Install

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


#### Requirements
```
# ext-curl: *
# ext-json: *
# php: >=8.0
```


#### Getting started
`composer require shahradelahi/coinmarketcap`
```php
require 'vendor/autoload.php';
$CMCApi = new CoinMarketCap\Api();
```
=======

#### Metadata
Returns all static metadata available for one or more cryptocurrencies. This information includes details like logo, description, official website URL, social links, and links to a cryptocurrency's technical documentation.
```php
$CMCApi->cryptocurrency()->info([
    'id' => 1, // Bitcoin
]);
```

#### CoinMarketCap ID Map
Returns a mapping of all cryptocurrencies to unique CoinMarketCap `id`s. Per our Best Practices we recommend utilizing CMC ID instead of cryptocurrency `symbols` to securely identify cryptocurrencies with our other endpoints and in your own application logic. Each cryptocurrency returned includes typical identifiers such as `name`, `symbol`, and `token_address` for flexible mapping to `id`.

```php
$CMCApi->cryptocurrency()->map([
    'limit' => 5,
]);
```