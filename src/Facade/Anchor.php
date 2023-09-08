<?php 
namespace Anchor\Sdk\Facade;
use Illuminate\Support\Facades\Facade; 
/**
 * Summary of Anchor
 */
class Anchor extends Facade{
      /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'anchor-sdk';
    }
}

?>