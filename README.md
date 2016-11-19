# Edmunds API

## Installation
Add the following to your `composer.json` file:
```json
{
    "require": {
        "jeffreyhyer/edmunds": "dev-master"
    }
}
```
And run `composer install` or `composer update` to install the correct
version of the package.

## Usage
*TODO: Generate docs and put them in the `/docs/` directory*

### API Key
*TODO: Instructions for applying for an API Key through Edmunds/Mashery*

### Quick Start
```php
<?php

require('vendor/autoload.php');

use Edmunds;

$edmunds = new Edmunds($apiKey);

// Decode a VIN
$vehicle = $edmunds->vehicle()->vin('12345678901234567');
```
