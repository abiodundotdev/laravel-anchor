<?php  
namespace Anchor\Sdk;
use Anchor\Constants\Endpoints;
/** Onboarding endpoints
*   Each methods corresponds to the endpoint as seen on the doucmentation
*/
class AnchorOnboarding extends AnchorHttp{
    private $customerEndpoint;
    private $documentEndpoint;
    private $individualEndpoint;

    public function __construct() {
        parent::__construct(); 
        $this->customerEndpoint = Endpoints::$customers;
        $this->documentEndpoint = Endpoints::$documents;
        $this->individualEndpoint = Endpoints::$individual;
    }


    public function createCustomer(array $data, $type){
        $body =  [
            "data" => $data, 
            "type" => $type 
         ];
        return $this->post($this->customerEndpoint, $body);
    }
    public function updateCustomer(array $data, $type){
        $body =  [
            "data" => $data, 
            "type" => $type 
         ];
        return $this->post($this->customerEndpoint, $body);
    }
    public function fetchCustomer($customerId, $include = ""){
        return $this->get($this->customerEndpoint."/$customerId",  ['include' => $include]);
    }
    public function fetchAllCustomers($customerType= "", $metadata = "", $query = "", $page = "", $size = "", $sort = "", $include= ""){
        return $this->get($this->customerEndpoint, ['customerType' => $customerType, 'metadata' => $metadata, 'query' => $query ,'page'=> $page, 'size' => $size, 'sort' =>  $sort, 'include' => $include]
        );
    }
    public function deleteCustomer($customerId){
        return $this->delete($this->customerEndpoint."/$customerId");
    }
    public function searchCustomer($customerType, $searchValue,  $include = ""){
        return $this->get($this->customerEndpoint."/search",  ['customerType' => $customerType,  'searchValue' => $searchValue, 'include' => $include]);
    }
    public function officersRequirement($customerId, $include = ""){
        return $this->get($this->customerEndpoint."/$customerId/officers-requirement",  ['include' => $include]);
    }
    public function validateKYCForIndividual($customerId, array $data = []){
        return $this->post($this->customerEndpoint."/$customerId/verification/individual",  ['data' => $data]);
    }
    public function validateKYCForBusiness($customerId){
        return $this->post($this->customerEndpoint."/$customerId/verification/business");
    }
    public function downloadDocument($customerId, $documentId){
        return $this->get($this->documentEndpoint."download-document/$customerId/$documentId");
    }
    public function fetchDocument($customerId, $documentId, $include = ""){
        return $this->get($this->documentEndpoint."/$customerId/$documentId", ['include' => $include]);
    }
    public function fetchAllDocuments($customerId, $include = ""){
        return $this->get($this->documentEndpoint."/$customerId", ['include' => $include]);
    }
    public function uploadDocument($customerId, $documentId, $textData = "", array $data){
        $body =  [
            "data" => $data, 
        ];
        return $this->post($this->documentEndpoint."/$customerId/$documentId?textData=$textData", $body);
    }
    public function createNextOfKin($customerId, array $data){
        $body =  [
            "data" => $data, 
        ];
        return $this->post($this->individualEndpoint."/$customerId/next-of-kin", $body);
    }
    public function updateNextOfKin($customerId, $nexOfKinId, array $data){
        $body =  [
            "data" => $data, 
        ];
        return $this->post($this->individualEndpoint."/$customerId/next-of-kin/$nexOfKinId", $body);
    }
    public function fetchNextOfKin($customerId, $nexOfKinId, $include = ""){
        return $this->get($this->individualEndpoint."/$customerId/next-of-kin/$nexOfKinId", ['include' => $include]);

    }
    public function fetchAllNextOfKins($customerId, $include = ""){
        return $this->get($this->individualEndpoint."/$customerId/next-of-kin", ['include' => $include]);

    }
    public function deleteNextOfKin($customerId, $nexOfKinId){
        return $this->delete($this->individualEndpoint."/$customerId/next-of-kin/$nexOfKinId");
    }
}

?>