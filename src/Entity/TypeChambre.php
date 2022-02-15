<?php
namespace App\Entity;
class TypeChambre implements EntityInterface
{
    private int $id;
    private string $nomTypeChambre;
    
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
     * Get the value of nomTypeChambre
     *
     * @return  string
     */
    public function getNomTypeChambre()
    {
        return $this->nomTypeChambre;
    }

    /**
     * Set the value of nomTypeChambre
     *
     * @param  string  $nomTypeChambre
     *
     * @return  self
     */
    public function setNomTypeChambre(string $nomTypeChambre)
    {
        $this->nomTypeChambre = $nomTypeChambre;

        return $this;
    }
}