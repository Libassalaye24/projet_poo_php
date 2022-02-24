<?php 
	namespace App\Core;

/* 
class Pagination
{
     private array $data;

    public function paginate(array $values,int $perPage)
    {
        $totalRecords = count($values);
        if (isset($_GET['page'])) {
            $currentPage = $_GET['page'];
        }else {
            $currentPage = 1;
        }
        $counts = ceil($totalRecords/$perPage);
        $params1 = ($currentPage-1) * $perPage;
        $this->data = array_slice($values,$params1,$perPage);
        for ($i=0; $i <$counts ; $i++) { 
            $numbers[]= $i;
        }
        return $numbers;
    }
    public function fetResults()
    {
        $valuesResult = $this->data;
        return $valuesResult;
    }
}
 */
class Pagination{
    private $data=[];
    function Paginate($values,$per_page){

        $total_values = count($values);
        
        if(isset($_GET['page'])){
            $current_page = $_GET['page'];
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
