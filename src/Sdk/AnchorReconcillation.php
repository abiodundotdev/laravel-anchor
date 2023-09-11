<?php  
namespace Anchor\Sdk;

use Anchor\Constants\Endpoints;

class AnchorReconcillation extends AnchorHttp{
    private $reportsEndpoint;

    public function __construct() {
        parent::__construct(); 
        $this->reportsEndpoint = Endpoints::$reports;
    }

    public function fetchReport($reportId, $include = ""){
        return $this->get($this->reportsEndpoint."/$reportId", ['include'=> $include]);
    }
    public function downloadReportDocument($reportId, $include = ""){
        return $this->get($this->reportsEndpoint."/download/$reportId", ['include'=> $include]);
    }
    public function fetchAllReports(array $filter, $page, $size,$sort,$include = ""){
        return $this->get($this->reportsEndpoint, [...$filter,'page'=> $page, 'size'=>$size, 'sort'=> $sort,'include'=> $include]);
    }  
    public function createReport(array $data){
        return $this->post($this->reportsEndpoint, ['data'=> $data]);
    }    
}

?>