<?php  
namespace Anchor\Sdk;
class AnchorOnboarding extends AnchorHttp{
    public function createCustomer(array $data){
        return $this->post("");
    }
}

?>