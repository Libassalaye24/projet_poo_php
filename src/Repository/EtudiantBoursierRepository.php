<?php
namespace App\Repository;


class  EtudiantBoursierRepository extends EtudiantRepository
{
    public function __construct()
    {
        parent::__construct();
    }
     public function findEtuBoursier($limit = null)
     {
         $sql="SELECT * FROM $this->tableName e 
                INNER JOIN bourse b ON e.id_bourse=b.id_bourse 
                    WHERE e.id_chambre IS NULL
                         ORDER BY $this->primaryKey DESC";
        if (!is_null($limit)) {
            $sql.=" LIMIT $limit,".PAR_PAGE;
        }
         return $this->database->executeSelect($sql);
     }
     public function findEtuByTypeBourse(string $type)
     {
         $sql = "SELECT * FROM $this->tableName e 
                    INNER JOIN bourse b ON e.id_bourse=b.id_bourse 
                        WHERE  b.type_bourse=?
                          ORDER BY $this->primaryKey DESC";
         return $this->findBy($sql,[$type]);
     }
   
}