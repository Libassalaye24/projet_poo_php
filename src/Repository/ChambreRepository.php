<?php
namespace App\Repository;

use App\Core\Orm\AbstractRepository;

class ChambreRepository extends AbstractRepository
{


    public function __construct()
    {
        $this->tableName="";
        $this->primaryKey="";
        parent::__construct();
    }
    public function findAll(): array
    {
        $sql="select * from $this->tableName where role like ?";
        return $this->database->executeSelect($sql,[$this->role]);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey = ?";
        return $this->database->executeSelect($sql,[$id]);

    }
}
