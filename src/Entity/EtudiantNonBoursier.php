<?php
namespace App\Entity;
class EtudiantNonBoursier extends Etudiant
{
    private string $adresse;
    public function __construct()
    {
        
    }
    /**
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