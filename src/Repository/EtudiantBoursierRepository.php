<?php
namespace App\Repository;


class  EtudiantBoursierRepository extends EtudiantRepository
{
    public function __construct()
    {
        parent::__construct();
    }
     public function findEtuBoursier()
     {
         $sql="select * from $this->tableName e,bourse b where e.id_bourse=b.id_bourse and e.id_chambre IS NULL";
         return $this->database->executeSelect($sql);
     }
     public function findEtuByTypeBourse(string $type)
     {
         $sql = "select * from $this->tableName e,bourse b where e.id_bourse=b.id_bourse and b.type_bourse=?";
         return $this->findBy($sql,[$type]);
     }
   
}