<?php 
namespace AnchorTest;

use Anchor\Constants\HttpStatusCode;
use Anchor\Exceptions\BadRequestException;
use Anchor\Exceptions\ConflictException;
use Anchor\Exceptions\ForbiddenException;
use Anchor\Exceptions\NotFoundException;
use Anchor\Exceptions\ServerErrorException;
use Anchor\Exceptions\ServiceUnavailableException;
use Anchor\Exceptions\TooManyRequestException;
use Anchor\Exceptions\UnauthorizedException;
use Anchor\Sdk\AnchorHttp;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class AnchorHttpTest extends TestCase{
        public $anchorHttp;
        public $mock;


        protected function setUp(): void {
                parent::setUp();
                $this->anchorHttp = new AnchorHttp();
                $this->mock = new MockHandler();    
                $handlerStack = HandlerStack::create($this->mock);
                $client = new Client(['handler' => $handlerStack]);
                $this->anchorHttp->setHttpClient($client);
        }
        
        function test_verify_throws_bad_request_exception(){
           $this->mock->append(new Response(HttpStatusCode::$badRequest));
           $this->expectException(BadRequestException::class);
           $this->anchorHttp->get('/');
        }
        
        function test_verify_throws_conflict_exception(){
                $this->mock->append(new Response(HttpStatusCode::$conflict));
                $this->expectException(ConflictException::class);
                $this->anchorHttp->get('/');
        }

        function test_verify_throws_forbidden_exception(){
                $this->mock->append(new Response(HttpStatusCode::$forbidden));
                $this->expectException(ForbiddenException::class);
                $this->anchorHttp->get('/');
        }


        function test_verify_throws_service_unavailable_exception(){
                $this->mock->append(new Response(HttpStatusCode::$serviceUnavailable));
                $this->expectException(ServiceUnavailableException::class);
                $this->anchorHttp->get('/');
        }

        function test_verify_throws_too_many_request_exception(){
                $this->mock->append(new Response(HttpStatusCode::$tooManyRequests));
                $this->expectException(TooManyRequestException::class);
                $this->anchorHttp->get('/');
        }

        function test_verify_throws_unauthorised_exception(){
                $this->mock->append(new Response(HttpStatusCode::$unauthorized));
                $this->expectException(UnauthorizedException::class);
                $this->anchorHttp->get('/');
        }


        function test_verify_throws_not_found_exception(){
                $this->mock->append(new Response(HttpStatusCode::$notFound));
                $this->expectException(NotFoundException::class);
                $this->anchorHttp->get('/');
        }

        function test_verify_throws_server_error_exception(){
                $this->mock->append(new Response(HttpStatusCode::$internalServerError));
                $this->expectException(ServerErrorException::class);
                $this->anchorHttp->get('/');
        }

}

?>