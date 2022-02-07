<?php
namespace App\Entity;

use DateTime;

class Etudiant extends Personne
{
    protected string $matricule;
    protected DateTime $dateNaissance;
    
    public function __construct()
    {
        
    }


    /**
     * Get the value of matricule
     *
     * @return  string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @param  string  $matricule
     *
     * @return  self
     */
    public function setMatricule(string $matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     *
     * @return  DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @param  DateTime  $dateNaissance
     *
     * @return  self
     */
    public function setDateNaissance(DateTime $dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }
}