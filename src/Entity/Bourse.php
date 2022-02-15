<?php
namespace App\Entity;
class Bourse implements EntityInterface
{
    private int $id;
    private string $typeBourse;
    private int $montant;

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
     * Get the value of typeBourse
     *
     * @return  string
     */
    public function getTypeBourse()
    {
        return $this->typeBourse;
    }

    /**
     * Set the value of typeBourse
     *
     * @param  string  $typeBourse
     *
     * @return  self
     */
    public function setTypeBourse(string $typeBourse)
    {
        $this->typeBourse = $typeBourse;

        return $this;
    }

    /**
     * Get the value of montant
     *
     * @return  int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @param  int  $montant
     *
     * @return  self
     */
    public function setMontant(int $montant)
    {
        $this->montant = $montant;

        return $this;
    }
}