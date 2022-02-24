<?php
namespace App\Entity;
class EtudiantNonBoursier extends Etudiant
{
    private string $adresse;
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
       $array[]=null;  

       $array[]=$array[0];  
       $array[]=null;  
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
    /**
     * 
     * Get the value of adresse
     *
     * @return  string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @param  string  $adresse
     *
     * @return  self
     */
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
    public function affiche(): string
    {
        return parent::affiche().' '.$this->getAdresse();
    }
}