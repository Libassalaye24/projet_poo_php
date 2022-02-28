<?php
namespace App\Repository;
class EtudiantRepository extends PersonneRepository
{
    public function __construct()
    {
        $this->role="ROLE_ETUDIANT";
        parent::__construct();
    }
    public function findAll(): array
    {
        $sql="SELECT * FROM $this->tableName WHERE role like ?";
       
        return $this->database->executeSelect($sql,[$this->role]);
    }
    public function findAllLimit($limit=null): array
    {
        $sql="SELECT * FROM $this->tableName WHERE role like ?";
        if (!is_null($limit)) {
           $sql.=" LIMIT $limit,".PAR_PAGE;
        }
        return $this->database->executeSelect($sql,[$this->role]);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey=?";
        return $this->database->executeSelect($sql,[$id]);
    }
}