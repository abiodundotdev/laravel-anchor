<?php 
namespace Anchor\Sdk\Constants;

class HttpStatusCode {
    static $success = 200;
    static $accepted = 202;
    static $badRequest = 400;
    static $unauthorized = 400;
    static $forbidden = 403;
    static $notFound = 404;
    static $conflict = 409;
    static $preconditionFailed = 412;
    static $tooManyRequests = 429;
    static $internalServerError = 500;
    static $serviceUnavailable = 503;
}
?>