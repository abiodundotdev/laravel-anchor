<?php  
namespace Anchor\Sdk;
use Anchor\Constants\Endpoints;
class AnchorBillsPayment extends AnchorHttp{
    private $billsEndpoint;
    
    public function __construct() {
        parent::__construct(); 
        $this->billsEndpoint = Endpoints::$bills;
    }
    
    public function fetchAllBillers(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->billsEndpoint."/billers", [ ...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function verifyBillerProducts($billerId,$include = ""){
        return $this->get($this->billsEndpoint."/billers/$billerId/products", ['include'=> $include]);
    }
    public function verifyCustomerDetails($productSlug, $customerId, $include = ""){
        return $this->get($this->billsEndpoint."/customer-validation/$productSlug/$customerId", ['include'=> $include]);
    }
    public function createBillPayment($data){
        return $this->post($this->billsEndpoint, ["data" => $data]);
    }
    public function fetchAllBills(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->billsEndpoint, [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function fetchBill($billPaymentId, $include = ""){
        return $this->get($this->billsEndpoint."/$billPaymentId", ['include'=> $include]);
    }
}

?>