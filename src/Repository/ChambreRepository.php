<?php
namespace App\Repository;

use App\Core\Orm\AbstractRepository;

class ChambreRepository extends AbstractRepository
{


    public function __construct()
    {
        $this->tableName="chambre";
        $this->primaryKey="id_chambre";
        parent::__construct();
    }
    public function findAll(): array
    {
        $sql="select * from $this->tableName c,pavillon p where c.id_pavillon=p.id_pavillon ";
        return $this->database->executeSelect($sql);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey = ?";
        return $this->database->executeSelect($sql,[$id]);

    }
    public function findChambrePavillon(int $id):object|bool|array
    {
        $sql="select * from $this->tableName c,pavillon p where c.id_pavillon=p.id_pavillon and $this->primaryKey=?";
        return $this->findBy($sql,[$id]);
    }
}
