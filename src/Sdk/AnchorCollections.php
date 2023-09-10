<?php  
namespace Anchor\Sdk;
use Anchor\Constants\Endpoints;
class AnchorCollections extends AnchorHttp{
    private $virtualNUBANendpoint = Endpoints::$virtualNubans;
    private $paymentsEndpoint = Endpoints::$payments;


    public function createVirtualNUBAN($data){
        $body =  [
            "data" => $data, 
         ];
        return $this->post($this->virtualNUBANendpoint, $body);
    }

    public function updateVirtualNUBAN($accountId, $data){
        $body =  [
            "data" => $data, 
         ];
        return $this->post($this->virtualNUBANendpoint."/$accountId", $body);
    }

    public function fetchVirtualNUBAN($accountId, $include = ""){
        return $this->get($this->virtualNUBANendpoint."/$accountId", ['include'=> $include]);
    }

    public function fetchAllVirtualNUBANs($accountId, array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->virtualNUBANendpoint."/$accountId", [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }

    public function closeVirtualNUBAN($accountId){
        return $this->get($this->virtualNUBANendpoint."/close-account"."/$accountId");
    }

    public function fetchPayment($paymentId, $include = ""){
        return $this->get($this->paymentsEndpoint."/$paymentId", ['include'=> $include]);
    }

    public function fetchAllPayments(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->paymentsEndpoint, [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }

    public function verifyPayment($customerReference, $include = ""){
        return $this->get($this->paymentsEndpoint."requery/$customerReference", ['include'=> $include]);
    }

   
}

?>