<?php
namespace Anchor\Sdk\Providers;

use Anchor\AnchorSdk;
use Anchor\Sdk\Anchor;
use Illuminate\Support\ServiceProvider;

 /**
  * Summary of AnchorProvider
  */
 class AnchorProvider extends ServiceProvider
{
     /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('anchor-laravel-sdk', function () {
            return new AnchorSdk;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}


?>