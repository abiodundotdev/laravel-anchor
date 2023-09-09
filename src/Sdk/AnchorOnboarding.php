<?php  
namespace Anchor\Sdk;
use Anchor\Constants\Endpoints;
class AnchorOnboarding extends AnchorHttp{

    public $endpoint = Endpoints::$customers;

    public function createCustomer(array $data){
        return $this->post("");
    }
    public function getCustomer($customerId, $include){
        return $this->get($this->endpoint+"/$customerId",  ['include' => $include]);
    }
    public function getAllCustomers($customerType= "", $metadata = "", $query = "", $page = "", $size = "", $sort = "", $include= ""){
        return $this->get($this->endpoint,
          ['customerType'=> $customerType, 'metadata' => $metadata, 'query' => $query, ,'page'=> $page, 'size' => $size, 'sort' =>  $sort, 'include' => $include]
        );
    }
    public function deleteCustomer($customerId){
        return $this->delete($this->endpoint+"/$customerId");
    }
    public function searchCustomer($customerType, $searchValue,  $include){
        return $this->get($this->endpoint+"/search",  ['customerType' => $customerType,  'searchValue' => $searchValue, 'include' => $include]);
    }
    public function officersRequirement($customerId, $include = ""){
        return $this->get($this->endpoint+"/$customerId/officers-requirement",  ['include' => $include]);
    }
}

?>