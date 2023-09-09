<?php  
namespace Anchor\Sdk;
class AnchorCollections extends AnchorHttp{
    public function createVirtualNUBAN($provider, $settlementAccountType, $type){
        $data = array (
            'data' => 
            array (
              'attributes' => 
              array (
                'virtualAccountDetail' => 
                array (
                  'name' => 'John Doe',
                  'bvn' => '22222222226',
                  'reference' => '12345',
                  'email' => 'example@example.com',
                  'description' => 'decriptions',
                  'permanent' => true,
                ),
                'provider' => 'providus',
              ),
              'relationships' => 
              array (
                'settlementAccount' => 
                array (
                  'data' => 
                  array (
                    'type' => $settlementAccountType,
                    'id' => '23',
                  ),
                ),
              ),
              'type' => 'VirtualNuban',
            ),
          );
    }
}

?>