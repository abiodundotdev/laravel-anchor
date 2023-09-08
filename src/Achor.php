<?php 
namespace Anchor\Sdk;
use GuzzleHttp\Client;
 
class Anchor{
    private $client;
    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'https://api.thepeer.co',
            'headers' => [
                'x-api-key' => "",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'http_errors' => false
        ]);
    }
}


?>