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
    public function findAll($start=null,$num_page=null): array
    {
        $sql="select * from $this->tableName";
        if (!is_null($start) && !is_null($num_page)) {
            $sql.=" limit $start,$num_page";
        }
        return $this->database->executeSelect($sql);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey = ?";
        return $this->database->executeSelect($sql,[$id]);

    }
}
