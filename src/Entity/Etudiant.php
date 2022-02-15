<?php
namespace App\Entity;

use DateTime;

class Etudiant extends Personne
{
    protected int $telephone;
    protected string $matricule;
    protected string $dateNaissance;
    
    public function __construct()
    {
        $this->role="ROLE_ETUDIANT";
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
     * @return  string
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @param  string  $dateNaissance
     *
     * @return  self
     */
    public function setDateNaissance(string $dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }
    public function affiche(): string
    {
       return parent::affiche().' '.$this->getMatricule().' '.$this->getDateNaissance();
    }

    /**
     * Get the value of telephone
     *
     * @return  int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @param  int  $telephone
     *
     * @return  self
     */
    public function setTelephone(int $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
}