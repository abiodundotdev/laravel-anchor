<?php  
if (!function_exists("anchorSdk"))
{
    function anchorSdk() {
        return app()->make('anchor-laravel-sdk');
    }
}
?>