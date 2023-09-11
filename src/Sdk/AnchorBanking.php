<?php  
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorBanking extends AnchorHttp{
    private $accountEndpoint;
    private $feesEndpoint;
    private $statementEndpoint;
    
    public function __construct() {
        parent::__construct(); 
        $this->accountEndpoint = Endpoints::$accounts;
        $this->feesEndpoint = Endpoints::$fee;
        $this->statementEndpoint = Endpoints::$statements;
    }


    public function createDepositAccount($data){
        $body =  [
            "data" => $data, 
         ];
        return $this->post($this->accountEndpoint, $body);
    }
    public function updateDepositAccount($accountId,$data){
        $body =  [
            "data" => $data, 
        ];
        return $this->patch($this->accountEndpoint."$accountId", $body);
    }
    public function fetchAccountBalance($accountId, $include = ""){
        return $this->get($this->accountEndpoint."/balance"."/$accountId", ["include" => $include]);
    }
    public function fetchDepositAccount($accountId, $include = ""){
        return $this->get($this->accountEndpoint."$accountId", ["include" => $include]);
    }
    /**
     * List all deposit accounts
     * Query paramter must be an associative array with each key and value corresponding to the query parameter and its value
     * Example [ 'accountType' => 'accountType'] 
     */
    public function fetchAllDepositAccounts($query){
        return $this->get($this->accountEndpoint, $query );
    }
    public function freezeDepositAccount($accountId, $data){
        return $this->post($this->accountEndpoint."$accountId/freeze", ["data" => $data]);
    }
    public function unfreezeDepositAccount($accountId, $data){
        return $this->post($this->accountEndpoint."/unfreeze", ["data" => $data]);
    }
    public function fetchRootAccounts($accountType, $include = ""){
        return $this->post($this->accountEndpoint."/root-accounts?accountType=$accountType", ["include" => $include]);
    }
    public function createFees($data){
        return $this->post($this->feesEndpoint."/custom-fee", ["data" => $data]);
    }
    public function reverseFee($feeId){
        return $this->post($this->feesEndpoint."/reverse/$feeId");
    }
    public function fetchAllFees(array $filter, $page, $size, $sort, $include = ""){
        return $this->get($this->feesEndpoint."/charged-by-organization", [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function fetchFee($feeId, $include = ""){
        return $this->post($this->feesEndpoint."/charged-by-organization/$feeId", ['include'=> $include]);
    }
    public function createStatement($data){
        return $this->post($this->statementEndpoint, ["data" => $data]);
    }
    
    public function fetchAllStatement(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->feesEndpoint."/charged-by-organization", [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function fetchStatement($statementId, $include = ""){
        return $this->get($this->statementEndpoint."/$statementId", ['include'=> $include]);
    }
    public function downloadStatement($statementId, $include = ""){
        return $this->get($this->statementEndpoint."/download/$statementId", ['include'=> $include]);
    }
    

}
?>