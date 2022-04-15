> **Help wanted:** If you can improve this library, please do so.
> ***Pull requests are welcome.***

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

### Documentation

This library is based on this [CoinMarketCap](https://coinmarketcap.com/) endpoints, and there many more functions available, but they are not documented here, you should check the [Documentation](https://coinmarketcap.com/api/documentation/v1/) for more information.

* [Cryptocurrencies](docs/cryptocurrencies.md)
* [Fiat](docs/fiat.md)
* [Exchanges](docs/exchanges.md)

### Licence
```
MIT License

Copyright (c) 2021 Shahrad Elahi

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```