<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Chambre implements EntityInterface {
    private int $id;
    private string $numChambre;
    private string $numEtage;
    private int $type;
//propriete navigationnelle ManyToOne
    private int $pavillon;
    private Pavillon|null $idPavillon;
    private TypeChambre $typeChambre;
    private string $etat;
    private string $occupee;
    
    
    //
    //OneToMany
    private ArrayCollection $etudiantBoursierloge;
    //
    public function __construct()
    {
        
    }
    public static function fromArray(object $objet):array
    {
         $array=array_values((array)$objet);
         $array[]=$array[0];
         $array[]=$array[1];
         $array[]=$array[3]->getId();
         if ($array[2]==null) {
            $array[]=$array[2];
         }else {
            $array[]=$array[2]->getId();
         }
         $array[]=$array[4];
         unset($array[0]);
         unset($array[1]);
         unset($array[2]);
         unset($array[3]);
         unset($array[4]);
       
         return array_values($array);
    }
    public static function fromArrayUpdate(object $objet):array
    {
         $array=array_values((array)$objet);
         $array[]=$array[1];
         $array[]=$array[2];
         $array[]=$array[4]->getId();
         $array[]=$array[3]->getId();
         $array[]=$array[5];
         $array[]=$array[0];
         unset($array[0]);
         unset($array[1]);
         unset($array[2]);
         unset($array[3]);
         unset($array[4]);
         unset($array[5]);
         return array_values($array);
    }
    public static function fromArrayUp(object $objet):array
    {
        $array = array_values((array)$objet);
        $array[] = $array[1];
        $array[] = $array[0];
        unset($array[1]);
        unset($array[0]);
        return array_values($array);
    }
    public static function fromArrayPav(object $objet):array
    {
        $array = array_values((array)$objet);
        $array[] = $array[0];
        $array[] = (int)$array[1];
        $array[]=$array[3]->getId();
        $array[]=$array[2]->getId();
        $array[] = $array[4];
        unset($array[0]);
        unset($array[1]);
        unset($array[2]);
        unset($array[3]);
        unset($array[4]);
       /*  $array[] = $array[1];
        $array[] = $array[0];
        unset($array[1]);
        unset($array[0]); */
        return array_values($array);
    }
/*     public static function fromArrayPC(object $objet):array
    {
        $array = array_values((array)$objet);
        $array[] = $array[1];
        $array[] = $array[2];
        $array[] = $array[4]->getId();
        $array[] = $array[3]->getId();
        $array[] = $array[5];
        $array[] = $array[0];
        unset($array[0]);
        unset($array[1]);
        unset($array[2]);
        unset($array[3]);
        unset($array[4]);
        unset($array[5]);
        return array_values($array);
    } */
    /* public static function fromArray(object $objet):array
    {
        $array=array_values((array)$objet);
        $array[]=$array[0];
        $array[]=$array[1];
        $array[]=$array[3]->getId();
        $array[]=$array[2];
        $array[]=$array[4];
        unset($array[0]);
        unset($array[1]);
        unset($array[2]);
        unset($array[3]);
        unset($array[4]);
      
         return array_values($array);
    } */
 /*    public static function fromArrayUpdate(object $objet):array
    {
      
       $array=array_values((array)$objet);
       $array[]=$array[1];
       $array[]=$array[2];
       $array[]=$array[4]->getId();
       $array[]=$array[3]->getId();
       $array[]=$array[5];
       $array[]=$array[0];
       unset($array[0]);
       unset($array[1]);
       unset($array[2]);
       unset($array[3]);
       unset($array[4]);
       unset($array[5]);
       return  array_values($array);
          
    } */
    public function __toString()
    {
        return $this->numChambre.''.$this->numEtage.''.$this->type.''.$this->pavillon.''.$this->etat;
    }
    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    

   

    /**
     * Get the value of numChambre
     *
     * @return  string
     */
    public function getNumChambre()
    {
        return $this->numChambre;
    }

    /**
     * Set the value of numChambre
     *
     * @param  string  $numChambre
     *
     * @return  self
     */
    public function setNumChambre(string $numChambre)
    {
        $this->numChambre = $numChambre;

        return $this;
    }

    /**
     * Get the value of numEtage
     *
     * @return  string
     */
    public function getNumEtage()
    {
        return $this->numEtage;
    }

    /**
     * Set the value of numEtage
     *
     * @param  string  $numEtage
     *
     * @return  self
     */
    public function setNumEtage(string $numEtage)
    {
        $this->numEtage = $numEtage;

        return $this;
    }

    


    /**
     * Get the value of type
     *
     * @return  int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param  int  $type
     *
     * @return  self
     */
    public function setType(int $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of pavillon
     *
     * @return  int
     */
    public function getPavillon()
    {
        return $this->pavillon;
    }

    /**
     * Set the value of pavillon
     *
     * @param  int  $pavillon
     *
     * @return  self
     */
    public function setPavillon(int $pavillon)
    {
        $this->pavillon = $pavillon;

        return $this;
    }

    /**
     * Get the value of etat
     *
     * @return  string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @param  string  $etat
     *
     * @return  self
     */
    public function setEtat(string $etat)
    {
        $this->etat = $etat;

        return $this;
    }

   

    /**
     * Get the value of typeChambre
     *
     * @return  TypeChambre
     */
    public function getTypeChambre()
    {
        return $this->typeChambre;
    }

    /**
     * Set the value of typeChambre
     *
     * @param  TypeChambre  $typeChambre
     *
     * @return  self
     */
    public function setTypeChambre(TypeChambre $typeChambre)
    {
        $this->typeChambre = $typeChambre;

        return $this;
    }

    /**
     * Get the value of idPavillon
     *
     * @return  Pavillon|null
     */
    public function getIdPavillon()
    {
        return $this->idPavillon;
    }

    /**
     * Set the value of idPavillon
     *
     * @param  Pavillon|null  $idPavillon
     *
     * @return  self
     */
    public function setIdPavillon($idPavillon)
    {
        $this->idPavillon = $idPavillon;

        return $this;
    }

    /**
     * Get the value of occupee
     *
     * @return  string
     */
    public function getOccupee()
    {
        return $this->occupee;
    }

    /**
     * Set the value of occupee
     *
     * @param  string  $occupee
     *
     * @return  self
     */
    public function setOccupee(string $occupee)
    {
        $this->occupee = $occupee;

        return $this;
    }
}