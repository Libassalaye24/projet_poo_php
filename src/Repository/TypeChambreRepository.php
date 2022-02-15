<?php
namespace App\Repository;

use App\Core\Orm\AbstractRepository;

class TypeChambreRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->tableName="type_chambre";
        $this->primaryKey="id_type_chambre";
        parent::__construct();
    }

    public function findAll(): array
    {
        $sql="select * from $this->tableName ";
        return $this->database->executeSelect($sql);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey = ?";
        return $this->database->executeSelect($sql,[$id]);

    }
}