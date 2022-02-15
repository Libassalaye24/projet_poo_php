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
    //
    //OneToMany
    private ArrayCollection $etudiantBoursierloge;
    //
    public function __construct()
    {
        
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
}