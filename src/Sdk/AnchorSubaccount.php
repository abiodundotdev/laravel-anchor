<?php  
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorSubaccount extends AnchorHttp{
    private $subAccountEndpoint;

    public function __construct() {
        parent::__construct(); 
        $this->subAccountEndpoint = Endpoints::$subAccounts;
    }

    public function createSubaccount(array $data){
        return $this->post($this->subAccountEndpoint, ['data'=> $data]);
    }
    public function updateSubaccount($subAccountId, array $data){
        return $this->post($this->subAccountEndpoint."/$subAccountId", ['data'=> $data]);
    }
    public function fetchSubaccountBalance($subAccountId, $include = ""){
        return $this->get($this->subAccountEndpoint."/balance/$subAccountId", ['include'=> $include]);
    }
    public function fetchSubaccount($subAccountId, $include = ""){
        return $this->get($this->subAccountEndpoint."/$subAccountId", ['include'=> $include]);
    }
    public function fetchAllSubaccounts(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->subAccountEndpoint, [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }
    public function testAccount(){
        return "I am currently testing your account ooo  and sdk is ".env("ANCHOR_LIVE_KEY");
    }

}

?>