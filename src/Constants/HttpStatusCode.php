<?php 
namespace Anchor\Constants;

class HttpStatusCode {
    static $ok = 200;
    static $created = 201;
    static $accepted = 202;
    static $badRequest = 400;
    static $unauthorized = 401;
    static $forbidden = 403;
    static $notFound = 404;
    static $conflict = 409;
    static $preconditionFailed = 412;
    static $tooManyRequests = 429;
    static $internalServerError = 500;
    static $serviceUnavailable = 503;
}
?>