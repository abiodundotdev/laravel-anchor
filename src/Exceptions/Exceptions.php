<?php 
namespace Anchor\Exceptions;
use Exception;
class BadRequestException extends Exception{}
class UnauthorizedException extends Exception{}
class ForbiddenException extends Exception{}
class NotFoundException extends Exception{}
class ConflictException extends Exception{}
class PreconditionFailedException extends Exception{}
class TooManyRequestException extends Exception{}
class ServerErrorException extends Exception{}
class ServiceUnavailableException extends Exception{}
?>