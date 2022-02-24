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
        $sql="select * from $this->tableName where role like ?";
        return $this->database->executeSelect($sql,[$this->role]);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey=?";
        return $this->database->executeSelect($sql,[$id]);
    }
}