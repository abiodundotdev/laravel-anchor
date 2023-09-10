<?php  
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorBanking extends AnchorHttp{
    private $accountEndpoint = Endpoints::$accounts;
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

}
?>