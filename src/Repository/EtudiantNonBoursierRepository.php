<?php
namespace App\Repository;

use App\Entity\Etudiant;

class EtudiantNonBoursierRepository extends EtudiantRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll(): array
    {
        $sql = "select * from $this->tableName where adresse IS NOT NULL and id_chambre IS NULL and id_bourse IS NULL";
        return $this->database->executeSelect($sql);
    }
}