<?php

use Anchor\AnchorSdk;

if (!function_exists("anchorSdk"))
{
    function anchorSdk() : AnchorSdk {
        
        return app()->make('anchor-laravel-sdk');
    }
}
?>