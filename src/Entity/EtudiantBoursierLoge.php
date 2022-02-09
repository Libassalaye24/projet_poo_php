<?php
namespace App\Entity;
class EtudiantBoursierLoge extends EtudiantBoursier
{
    private string $chambre;
    public function __construct()
    {
        
    }

    /**
     * Get the value of chambre
     *
     * @return  string
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * Set the value of chambre
     *
     * @param  string  $chambre
     *
     * @return  self
     */
    public function setChambre(string $chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }
}