<?php
namespace App\Entity;
class EtudiantBoursier extends Etudiant
{
    private int $bourse;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get the value of bourse
     *
     * @return  int
     */
    public function getBourse()
    {
        return $this->bourse;
    }

    /**
     * Set the value of bourse
     *
     * @param  int  $bourse
     *
     * @return  self
     */
    public function setBourse(int $bourse)
    {
        $this->bourse = $bourse;

        return $this;
    }
    public function affiche(): string
    {
        return parent::affiche().' '.$this->getBourse();
    }
}