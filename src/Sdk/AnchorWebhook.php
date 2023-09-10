<?php  
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorWebhook extends AnchorHttp{
    private $webhookEndpoint = Endpoints::$webhooks;
    private $eventEndpoint = Endpoints::$events;

    public function createWebhook(array $data){
        return $this->post($this->webhookEndpoint, ['data'=> $data]);
    }    
    public function updateWebhook($webhookId, array $data){
        return $this->patch($this->webhookEndpoint."/$webhookId", ['data'=> $data]);
    }  
    public function sendSampleEventToWebHook($webhookId, array $data){
        return $this->post($this->webhookEndpoint."/verify/$webhookId", ['data'=> $data]);
    }
    public function fetchAllWebhooks($page, $size,$sort,$include = ""){
        return $this->get($this->webhookEndpoint, ['page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    } 
    public function fetchWebhook($webhookId, $include = ""){
        return $this->get($this->webhookEndpoint."/$webhookId", ['include'=> $include]);
    }
    public function deleteWebhook($webhookId){
        return $this->delete($this->webhookEndpoint."/$webhookId");
    } 
    public function fetchAllEvents(array $type, $page, $size,$sort,$include = ""){
        return $this->get($this->eventEndpoint, [...$type,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function fetchEvent($eventId, $include = ""){
        return $this->get($this->eventEndpoint."/$eventId", ['include'=> $include]);
    }
    public function fetchAllEventTypes($include = ""){
        return $this->get(Endpoints::$events."/event-types", ['include'=> $include]);
    }
     
}

?>