<?php
namespace App\Entity;
class EtudiantBoursier extends Etudiant
{
    private string $bourse;

    public function __construct()
    {
        
    }
    /**
     * Get the value of bourse
     *
     * @return  string
     */
    public function getBourse()
    {
        return $this->bourse;
    }

    /**
     * Set the value of bourse
     *
     * @param  string  $bourse
     *
     * @return  self
     */
    public function setBourse(string $bourse)
    {
        $this->bourse = $bourse;

        return $this;
    }
}