<?php
namespace App\Repository;

use App\Entity\Etudiant;

class EtudiantNonBoursierRepository extends EtudiantRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    
}