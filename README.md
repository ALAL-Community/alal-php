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

### Example

```php
    $showCard = $AlalSdk->cards()->showCard('792c6cf2-f5cf-46c8-bf8c-699a9028010e');
    $createCard = $AlalSdk->cards()->createCard('visa', 'virtual', 'd282e4a6-1fb6-4827-a6ae-a780263287d7')
``` 

## Contributing

Bug reports and pull requests are welcome on GitHub at [https://github.com/ALAL-Community/alal-node](https://github.com/ALAL-Community/alal-php). This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the code of conduct. Simply create a new branch and raise a Pull Request, we would review and merge.

## License

The library is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT)