<?php 
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorTransfers extends AnchorHttp{
    protected $transferEndpoint;
    protected $paymentEndpoint;
    protected $counterPartiesEndpoint;

    public function __construct() {
        parent::__construct(); 
        $this->transferEndpoint = Endpoints::$transfers;
        $this->paymentEndpoint = Endpoints::$payments;
        $this->counterPartiesEndpoint = Endpoints::$counterParties;
    }

    public function createBulkTransfer(array $data){
        return $this->post($this->transferEndpoint."/bulk", ['data'=> $data]);
    }
    public function fetchBulkTransfer($bulkTransferId, $include = ""){
        return $this->get($this->transferEndpoint."/bulk/$bulkTransferId", ['include'=> $include]);
    }
    public function intiateTransfer(array $data){
        return $this->post($this->transferEndpoint, ['data'=> $data]);
    }
    public function verifyTransfer($transferId, $include = ""){
        return $this->get($this->transferEndpoint."/verify/$transferId", ['include'=> $include]);
    }
    public function fetchTransfer($transferId, $include = ""){
        return $this->get($this->transferEndpoint."/$transferId", ['include'=> $include]);
    }
    public function fetchAllTransfers(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->transferEndpoint, [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function createCounterParty($data){
        return $this->post($this->counterPartiesEndpoint, ['data'=> $data]);
    }
    public function bulkCreateCounterParty($data){
        return $this->post($this->counterPartiesEndpoint."/bulk", ['data'=> $data]);
    }
    public function updateCounterParty($counterPartyId,$data){
        return $this->patch($this->counterPartiesEndpoint."/$counterPartyId", ['data'=> $data]);
    }
    public function fetchCounterParty($counterPartyId, $include = ""){
        return $this->get($this->counterPartiesEndpoint."/$counterPartyId", ['include'=> $include]);
    }
    public function fetchAllCounterParties($metaData, $query, $page, $size, $sort, $include = ""){
        return $this->get($this->counterPartiesEndpoint, ['page'=> $page, 'metadata'=> $metaData, 'query'=> $query, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function deleteCounterParty($counterPartyId){
        return $this->delete($this->counterPartiesEndpoint."/$counterPartyId");
    }
    public function verifyAccountNumber($bankIdOrBankCode, $accountNumber){
        return $this->get($this->paymentEndpoint."/verify-account/$bankIdOrBankCode/$accountNumber");
    }
    public function bulkVerifyAccountNumbers($data){
        return $this->post($this->paymentEndpoint."/verify-account/bulk", ['data'=> $data]);
    }
    public function fetchAllBanks($include = ""){
        return $this->get(Endpoints::$banks, ['include'=> $include]);
    }
}

?>