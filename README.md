# Alal PHP SDK
A PHP sdk to interact with Alal's API

## Installation  

### With Composer

`composer require Alal/Alal-php`

## REQUIREMENTS
- PHP 8.0+

## Usage
### Authentication
Generate an API KEY from the <a href="https://pro.saalal.com/login" target="_blank">Alal dashboard</a>

### Setup

```
<?php
include "vendor/autoload.php";

use Alal\Client\Options;
use Alal\Client\AlalSdk;

$env = 'production'; or // sandbox
$apikey = 'sk.8fcdc.a23474b7d2612534df';

$options = new Options($env);
$AlalSdk = new AlalSdk($apikey, $options);
```

<!-- ### Example
```
$response = $AlalSdk->addresses()->generateUsdtAddress('TRX', 'hello@gmail.com');
``` -->

## Contributing

Bug reports and pull requests are welcome on GitHub at [https://github.com/ALAL-Community/alal-node](https://github.com/ALAL-Community/alal-node). This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the code of conduct. Simply create a new branch and raise a Pull Request, we would review and merge.

## License

The library is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT)