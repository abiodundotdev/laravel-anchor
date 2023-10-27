<?php  
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorTransactions extends AnchorHttp{
    private $transactionsEndpoint;
    

    public function __construct() {
        parent::__construct(); 
        $this->transactionsEndpoint = Endpoints::$transactions;
    }

    public function fetchTransaction($transactionId, $include = ""){
        return $this->get($this->transactionsEndpoint."/$transactionId", ['include'=> $include]);
    }
    public function fetchAllTransactions(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->transactionsEndpoint, [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }  
    public function fetchAllSubaccountTransactions(array $filter, $page, $size,$sort,$include = ""){
        return $this->get(Endpoints::$subAccounts.$this->transactionsEndpoint, [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }    
}

?>