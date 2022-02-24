<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Pavillon implements EntityInterface
{ 
    private int|null $id;
    private string $nomPavillon;

    private string $numPavillon;

    private string $nbrEtage;
    
    //propriete navigationnelle OneToMany
    private ArrayCollection $chambres;

    public function __construct()
    {
        $this->chambres=new ArrayCollection();
    }

    public function __toString()
    {
        return $this->id;
    }

    /**
     * ajouter un objet de type chambre dans la collection
     *
     * @param Chambre $chambre
     * 
     * @return self
     */
    public function addChambre(Chambre $chambre):self
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres->add($chambre);
            $chambre->setIdPavillon($this);
        }
        return $this;
    }
    /**
     * permet de supprimer un objet de type chambre
     * dans la collection
     *
     * @param Chambre $chambre
     * 
     * @return self
     */
    public function removeChambre(Chambre $chambre):self
    {
        if ($this->chambres->contains($chambre)) {
            $this->chambres->removeElement($chambre);
            $chambre->setIdPavillon(null);
        }
        return $this;
    }

    /**
     * permet de transformer un objet en un tableau numeric
     *
     * @param object $objet
     * 
     * @return array
     */
    public static function fromArray(object $objet):array
    {
        $array=array_values((array)$objet);
        unset($array[3]);
        return array_values($array);
    }
    public static function fromArray1(object $objet):array
    {
        $array=array_values((array)$objet);
        $array[]=$array[1];
        $array[]=$array[2];
        $tc=array_values((array)$array[4]);
        $array[]=$tc[0];
        $P=array_values((array)$array[3]);
        $array[]=$P[0];
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
    
  
    /**
     * Get the value of numPavillon
     *
     * @return  string
     */
    public function getNumPavillon()
    {
        return $this->numPavillon;
    }

    /**
     * Set the value of numPavillon
     *
     * @param  string  $numPavillon
     *
     * @return  self
     */
    public function setNumPavillon(string $numPavillon)
    {
        $this->numPavillon = $numPavillon;

        return $this;
    }

    /**
     * Get the value of nbrEtage
     *
     * @return  string
     */
    public function getNbrEtage()
    {
        return $this->nbrEtage;
    }

    /**
     * Set the value of nbrEtage
     *
     * @param  string  $nbrEtage
     *
     * @return  self
     */
    public function setNbrEtage(string $nbrEtage)
    {
        $this->nbrEtage = $nbrEtage;

        return $this;
    }

    /**
     * Get the value of nomPavillon
     *
     * @return  string
     */
    public function getNomPavillon()
    {
        return $this->nomPavillon;
    }

    /**
     * Set the value of nomPavillon
     *
     * @param  string  $nomPavillon
     *
     * @return  self
     */
    public function setNomPavillon(string $nomPavillon)
    {
        $this->nomPavillon = $nomPavillon;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return  int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int|null  $id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of chambres
     *
     * @return  ArrayCollection
     */
    public function getChambres()
    {
        return $this->chambres;
    }

    /**
     * Set the value of chambres
     *
     * @param  ArrayCollection  $chambres
     *
     * @return  self
     */
    public function setChambres(ArrayCollection $chambres)
    {
        $this->chambres = $chambres;

        return $this;
    }
}