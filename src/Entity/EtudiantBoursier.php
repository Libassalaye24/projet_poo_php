<?php
namespace App\Entity;
class EtudiantBoursier extends Etudiant
{
    private Bourse $bourse;

    public function __construct()
    {
        parent::__construct();
    }
    
   

    /**
     * Get the value of bourse
     *
     * @return  Bourse
     */
    public function getBourse()
    {
        return $this->bourse;
    }

    /**
     * Set the value of bourse
     *
     * @param  Bourse  $bourse
     *
     * @return  self
     */
    public function setBourse(Bourse $bourse)
    {
        $this->bourse = $bourse;

        return $this;
    }

    public function affiche(): string
    {
        return parent::affiche().' '.$this->getBourse();
    }
}