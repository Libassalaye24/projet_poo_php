<?php
namespace App\Entity;
class EtudiantBoursierLoge extends EtudiantBoursier
{
    private Chambre $chambre;
    public function __construct()
    {
        parent::__construct();
    }

    public static function fromArray(object $objet): array
    {
       $array=array_values((array)$objet);
      // $array[]=$array[4];  
      // $array[]=$array[0]->getId();  
      $array[]=$array[3]; 
      $array[]=$array[4];   
      $array[]=$array[1]->getId();  
      $array[]=null;  
      $array[]=null;  
      $array[]=$array[0]->getId();  
      $array[]=$array[2];  
      $array[]=$array[5];  
      unset($array[0]);
      unset($array[1]);
      unset($array[2]);
      unset($array[3]);
      unset($array[4]);
      unset($array[5]);

       return array_values($array);
    }

   
    public function affiche(): string
    {
        return parent::affiche().' '.$this->getChambre();
    }

    /**
     * Get the value of chambre
     *
     * @return  Chambre
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * Set the value of chambre
     *
     * @param  Chambre  $chambre
     *
     * @return  self
     */
    public function setChambre(Chambre $chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }
}