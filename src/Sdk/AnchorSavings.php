<?php  
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorSavings extends AnchorHttp{
    private $savingsEndpoint = Endpoints::$savings;

    public function createSavings(array $data){
        return $this->post($this->savingsEndpoint, ['data'=> $data]);
    }    
    public function rolloverSavings($savingsId, array $data){
        return $this->post($this->savingsEndpoint."/$savingsId", ['data'=> $data]);
    } 
    public function fetchSavings($savingsId, $include = ""){
        return $this->get($this->savingsEndpoint."/$savingsId", ['include'=> $include]);
    }
    public function fetchAllSavings(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->savingsEndpoint, [...$filter, 'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    } 
    public function fetchSavingsWithrawalData($savingsId, $include = ""){
        return $this->get($this->savingsEndpoint."/$savingsId/withdraw", ['include'=> $include]);
    }
    public function fetchAllSavingsWithrawal(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->savingsEndpoint."withrawal", [...$filter, 'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    } 
    public function fetchSavingsWithrawal($withdrawalId, array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->savingsEndpoint."withrawal/$withdrawalId", [...$filter,'include'=> $include]);
    } 
    public function fetchAllSavingsDeposit($page, $size,$sort,$include = ""){
        return $this->get($this->savingsEndpoint."/deposit", ['page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    } 
    public function createSavingsDeposit(array $data){
        return $this->post($this->savingsEndpoint."/deposit", ['data'=> $data]);
    }    
    public function fetchSavingsDeposit($depositId, $include = ""){
        return $this->get($this->savingsEndpoint."/deposit/$depositId", ['include'=> $include]);
    }
}

?>