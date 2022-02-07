<?php
namespace App\Entity;
class EtudiantNonBoursier extends Etudiant
{
    private string $adresse;

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
}