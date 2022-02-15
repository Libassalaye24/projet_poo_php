<?php
namespace App\Entity;
class EtudiantBoursierLoge extends EtudiantBoursier
{
    private int $chambre;
    public function __construct()
    {
        parent::__construct();
    }

    public static function fromArray(object $objet): array
    {
       $array=array_values((array)$objet);
      // $array[]=$array[4];  
       $array[]=$array[5];  
       $array[]=$array[6];  
       $array[]=$array[7];  
       $array[]=$array[8];  
       $array[]=$array[3];  
       $array[]=$array[4]; 
       $array[]=$array[1];   
       $array[]='';  
       $array[]='';  
       $array[]=$array[0];  
       $array[]=$array[2];
    
       unset($array[0]);
       unset($array[1]);
      unset($array[2]);
      unset($array[3]);
      unset($array[4]);
       unset($array[5]);
       unset($array[6]);
       unset($array[7]);
       unset($array[8]);
      return array_values($array);
    }

    /**
     * Get the value of chambre
     *
     * @return  int
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * Set the value of chambre
     *
     * @param  int  $chambre
     *
     * @return  self
     */
    public function setChambre(int $chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }
    public function affiche(): string
    {
        return parent::affiche().' '.$this->getChambre();
    }
}