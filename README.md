# anchor-laravel

> A Laravel Package for working with [Anchor](https://getanchor.co/) APIs seamlessly

## Installation


To get the latest version of Laravel Anchor, simply require it

```bash
composer require anchor/laravel
```



Or add the following line to the require block of your `composer.json` file.

```
"anchor/laravel": "1.0.*"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.



Once Laravel Anchor is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

```php
'providers' => [
    ...
    Anchor\Providers\AnchorProvider::class,
    ...
]
```

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'AnchorSdk' => Anchor\Facades\Anchor::class,
    ...
]
```

## Configuration

You can publish the configuration file using this command:

```bash
php artisan vendor:publish --provider="Anchor\Providers\AnchorProvider"
```


## Usage

Open your .env file and add your secret key, current enviroment either live or sandbox:

```php
ANCHOR_LIVE_KEY=xxxxxxxxxxxxx
ANCHOR_SANDBOX_KEY=xxxxxxxxxxxxx
ANCHOR_ENV=LIVE|SANDBOX
```


```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Anchor;

class AppController extends Controller
{

    /**
     * Create customer using Facade
     * @return Url
     */
    public function createCustomer()
    {
        try{
            return AnchorSdk::onboarding()->createCustomer();
        }catch(\Exception $e) {
            return '$e';
        }        
    }
    //Type hint
    public function createCustomer(AnchorSdk $anchorsdk)
    {
        try{
            return $anchorsdk->onboarding()->createCustomer();
        }catch(\Exception $e) {
            return '$e';
        }        
    }
}
```


## NOTE

> Note that to pass the data argument, check the documentation and fill the fields with any random values, vist [https://wtools.io/convert-json-to-php-array](https://wtools.io/convert-json-to-php-array) and paste the json to convert to a php array, this will ease the stress of manually constructing an array for the json body  



Lets break down how the sdk work for various endpoints. Anchor SDK is grouped as seen on the documentation, so you can only use feature you need and ignore others you do not need


```php
/**
 * Using Anchor Sdk Facade 
 * 
 */
$onboarding = AnchorSdk::onboarding();
$onboarding->createCustomer();
$onboarding->getAllCustomers();

/**
 * Alternatively, you can type hint and it will be resolved from the container.
 */

function createCustomer(AnchorSdk $anchorSdk){
    $anchorSdk->groupapi()->dowatever();
}

/**
 * Alternatively, use the helper.
 */
anchorSdk()->onboarding();

/**
 * Anchor collections includes all the collections endpoints and each endpoint correspond to a method in the Corresponing class 
 * 
 */
$collections = AnchorSdk::collections();
$collections->createVirtualNuban();
$collections->fetchpayment();
```

## NOTE

> Every grouped endpoints on the [documentation](https://docs.getanchor.co/) has the same format as above. The follow the simplified way of
```php 
AnchorSdk::groupname()->endpointname()
```



## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?

Follow me on Twitter [follow me on twitter](https://twitter.com/abiodundotdev)!

Thanks!
Qazeem Abiodun (abiodundotdev).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.