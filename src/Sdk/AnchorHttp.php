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
            'base_uri' => $this->deriveBaseUrl(),
            'headers' => [
                'x-anchor-key' => $this->deriveSecretKey(),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
        ]);
    }
    public function get($uri, array $options = [])
    {
        return $this->request($uri, 
        [
            'query' =>  $options
        ] 
    );
    }
    public function put($uri, array $options = [])
    {
        return $this->request($uri, $options);
    }
    public function post($uri, array $options = []) 
    {
        return $this->request($uri,  [
            'form_params' => $options
        ]
        );
    }
    public function delete($uri, array $options = []) 
    {
        return $this->request($uri, $options);
    }
    public function patch($uri, array $options = []) 
    {
        return $this->request($uri, $options);
    }

    private function deriveBaseUrl() : string{
        $currentEnv = env("ANCHOR_ENV");
        if($currentEnv == "LIVE"){
            return Endpoints::$baseUrlLive;
        }
        return Endpoints::$baseUrlSandbox;
    }
    private function deriveSecretKey() : string{
        $currentEnv = env("ANCHOR_ENV");
        if($currentEnv == "LIVE"){
            return env("ANCHOR_LIVE_KEY");
        }
        return env("ANCHOR_SANDBOX_KEY");
    }

    private function request($method, $url, $data = []){
        $response = "";
        try {
            switch (strtolower($method)) {
                case 'post':
                    $response = $this->client->post($url, $data);
                    break;
                case 'get':
                    $response = $this->client->get($url, $data);
                    break;
                case 'patch':
                    $response = $this->client->patch($url, $data);
                    break;
                case 'delete':
                    $response = $this->client->delete($url, $data);
                    break;
                default:
                    $response = $this->client->put($url, $data);
            } ;
            $responseBody = json_decode($response->getBody()->getContents());
            return $responseBody;
        } catch (GuzzleException $e) {
            $this->processError($e);
        }
        
    }

    private function processError(GuzzleException $e)
    {
        $errorStatusCode = $e->getCode();
        $errorMessage = $e->getMessage();
        switch ($errorStatusCode) {
            case HttpStatusCode::$unauthorized :
                throw new UnauthorizedException($errorMessage);
            case HttpStatusCode::$forbidden :
                throw new ForbiddenException($errorMessage);
            case HttpStatusCode::$notFound :
                throw new NotFoundException($errorMessage);
            case HttpStatusCode::$conflict :
                throw new ConflictException($errorMessage);
            case HttpStatusCode::$preconditionFailed :
                throw new PreconditionFailedException($errorMessage);
            case HttpStatusCode::$tooManyRequests :
                throw new TooManyRequestException($errorMessage);
            case HttpStatusCode::$serviceUnavailable :
                throw new ServiceUnavailableException($errorMessage);
            default:
                throw new ServerErrorException($errorMessage);
        }

    }
}


// case 422:
            //     foreach ($payload->errors as $error) {
            //         throw new \Exception($error[0]);
            //     }

?>
