<?php 
	namespace App\Core;

use LDAP\Result;

class Pagination{
    public function __construct()
    {
        
    }
    function total_page($total_records,$nbrPage){
        return ceil($total_records/$nbrPage);
    }
    function start_from($page,$nbrPage):int{
        return ($page-1) * ($nbrPage);
    }
    /* public function __construct()
    {
        
    } */
    function Paginate($values,$per_page){
        $request = new Request;
        $url =$request->query();

        $total_values = count($values);
        if(isset($url)){
            $current_page = $url[1];
        }else{
            $current_page = 1;
        }
        $counts = ceil($total_values / $per_page);
        $param1 = ($current_page - 1) * $per_page;
        $this->data = array_slice($values,$param1,$per_page);
     
        for($x=1; $x<= $counts; $x++){
            $numbers[] = $x;
        }
        return $numbers;
    }
    function fetchResult(){ 
        $resultsValues = $this->data;
        return $resultsValues;
    }
 

}
?>
