<?php 
namespace Anchor\Facades;

use Illuminate\Support\Facades\Facade; 
/**
 * Summary of Anchor
 */
class AnchorFacade extends Facade{
      /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'anchor-laravel-sdk';
    }
}

?>