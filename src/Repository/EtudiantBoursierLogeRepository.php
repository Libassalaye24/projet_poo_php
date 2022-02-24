<?php
namespace App\Repository;
class EtudiantBoursierLogeRepository extends EtudiantBoursierRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function findEtudiantByIdChambre(int $id_chambre)
    {
        
        $sql="select * from $this->tableName e,chambre c where e.id_chambre=c.id_chambre and e.id_chambre=?";
        return $this->findBy($sql,[$id_chambre]);
    }
    public function findEboursierLoge()
    {
        $sql = "select * from $this->tableName e,bourse b,chambre c where e.id_bourse=b.id_bourse and e.id_chambre=c.id_chambre";
        return $this->database->executeSelect($sql);
    }
}