<?php 
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;
use Anchor\Constants\HttpStatusCode;
use Anchor\Exceptions\ConflictException;
use Anchor\Exceptions\ForbiddenException;
use Anchor\Exceptions\NotFoundException;
use Anchor\Exceptions\PreconditionException;
use Anchor\Exceptions\PreconditionFailedException;
use Anchor\Exceptions\ServerErrorException;
use Anchor\Exceptions\ServiceUnavailableException;
use Anchor\Exceptions\TooManyRequestException;
use Anchor\Exceptions\UnauthorizedException;
use GuzzleHttp\Client; 
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class AnchorHttp{
    public $client;
    public function __construct() {
        $this->client = new Client([
            'base_uri' => Endpoints::$baseUrlSandbox,
            'headers' => [
                'x-api-key' => "",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'http_errors' => false
        ]);
    }
    public function get($uri, array $options = [])
    {
        return $this->request($this->client->get($uri, 
        [
            'query' =>  $options
        ] 
    ));
    }
    public function put($uri, array $options = [])
    {
        return $this->request($this->client->put($uri, $options));
    }
    public function post($uri, array $options = []) 
    {
        return $this->request($this->client->post($uri,  [
            'form_params' => $options
        ]
        ));
    }
    public function delete($uri, array $options = []) 
    {
        return $this->request($this->client->delete($uri, $options));
    }
    public function patch($uri, array $options = []) 
    {
        return $this->request($this->client->patch($uri, $options));
    }

    private function request(ResponseInterface $response){
        try {
            $responseBody = json_decode($response->getBody()->getContents());
            return $this->processResponse($responseBody, $response);
        } catch (GuzzleException $e) {
            throw new ServerErrorException($e->getMessage());
        }
        
    }

    private function processResponse($payload, $response)
    {
        switch ($response->getStatusCode()) {
            case HttpStatusCode::$ok:
            case HttpStatusCode::$accepted:
            case HttpStatusCode::$created:
                return $payload;
            case HttpStatusCode::$unauthorized :
                throw new UnauthorizedException($payload->message);
            case HttpStatusCode::$forbidden :
                throw new ForbiddenException($payload->message);
            case HttpStatusCode::$notFound :
                throw new NotFoundException($payload->message);
            case HttpStatusCode::$conflict :
                throw new ConflictException($payload->message);
            case HttpStatusCode::$preconditionFailed :
                throw new PreconditionFailedException($payload->message);
            case HttpStatusCode::$tooManyRequests :
                throw new TooManyRequestException($payload->message);
            case HttpStatusCode::$serviceUnavailable :
                throw new ServiceUnavailableException($payload->message);
            default:
                throw new ServerErrorException($payload->message);
        }

    }
}


// case 422:
            //     foreach ($payload->errors as $error) {
            //         throw new \Exception($error[0]);
            //     }

?>
