<?php
namespace App\Repository;

use App\Core\Orm\AbstractRepository;

class PavillonRepository extends AbstractRepository
{

    public function __construct()
    {
        $this->tableName="pavillon";
        $this->primaryKey="id_pavillon";
        parent::__construct();
    }
    public function findAll(): array
    {
        $sql="SELECT * from $this->tableName ORDER BY $this->primaryKey DESC";
       
        return $this->database->executeSelect($sql);
    }
    public function findAllLimit($start,$nbrPage): array
    {
        $sql="SELECT * from $this->tableName ORDER BY $this->primaryKey DESC limit $start,$nbrPage ";
       
        return $this->database->executeSelect($sql);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey = ?";
        return $this->database->executeSelect($sql,[$id]);

    }
    
}
