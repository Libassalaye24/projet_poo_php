<?php
namespace App\Entity;
class EtudiantBoursierNonLoge extends EtudiantBoursier
{

    public function __construct()
    {
        parent::__construct();
    }
   
    public static function fromArray(object $objet): array
    {
       $array=array_values((array)$objet);
       $array[]=$array[4];  
       $array[]=$array[5];  
       $array[]=$array[6];  
       $array[]=$array[7];  
       $array[]=$array[2];  
       $array[]=$array[3];  
       $array[]=$array[0];  
       $array[]='';  
       $array[]='';  
       $array[]=null; 
       $array[]=$array[1]; 
    

       unset($array[0]);
       unset($array[1]);
      unset($array[2]);
      unset($array[3]);
      unset($array[4]);
       unset($array[5]);
       unset($array[6]);
       unset($array[7]);
     
      return array_values($array);
    }
}