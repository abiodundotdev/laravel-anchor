# laravel-paystack

> A Laravel Package for working with Anchor seamlessly

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

Open your .env file and add your public key, secret key, merchant email and payment url like so:

```php
ANCHOR_PUBLIC_KEY=xxxxxxxxxxxxx
ANCHOR_SECRET_KEY=xxxxxxxxxxxxx
ANCHOR_PAYMENT_URL=https://test.co
MERCHANT_EMAIL=abiodundotdev@gmail.com
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
     * Create customer
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
}
```


Lets break down how the sdk work for various endpoints. Anchor is group as seen on the documentation, so you can only use feature you need and ignore others you do not need


```php
/**
 * Anchor Onboarding includes all the onboarding endpoints and each endpoint correspond to a method in the Coresspoing class 
 * 
 */
$onboarding = AnchorSdk::onboarding();
$onboarding->createCustomer();
$onboarding->getAllCustomers();


/**
 * Alternatively, use the helper.
 */
anchorSdk()->onboarding();

/**
 * Anchor collections includes all the collections endpoints and each endpoint correspond to a method in the Coresponing class 
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

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/abiodundotdev)!

Thanks!
Prosper Otemuyiwa.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.