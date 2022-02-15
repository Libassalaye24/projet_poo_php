<?php
namespace App\Repository;

use App\Core\Orm\AbstractRepository;

class BourseRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->tableName="bourse";
        $this->primaryKey="id_bourse";
        parent::__construct();
    }
    public function findAll(): array
    {
        $sql="select * from $this->tableName";
        return $this->database->executeSelect($sql);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey=?";
        return $this->database->executeSelect($sql,[$id]);
    }
}