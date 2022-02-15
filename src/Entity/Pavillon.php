<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Pavillon implements EntityInterface
{ 
    private int $id;
    private string $numPavillon;
    private string $nbrEtage;
    //propriete navigationnelle OneToMany
    private ArrayCollection $chambres;
    public function __construct()
    {
        $this->chambres=new ArrayCollection();
    }

    public static function fromArray(object $objet):array
    {
        return [];
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
}