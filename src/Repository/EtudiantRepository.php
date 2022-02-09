<?php
namespace App\Repository;
class EtudiantRepository extends PersonneRepository
{
    public function __construct()
    {
        $this->role="ROLE_ETUDIANT";
        parent::__construct();
    }
}