<?php
namespace App\Manager;

use App\Core\Orm\AbstractManager;

class ChambreManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName="chambre";
        $this->primaryKey="id_chambre";
    }
    public function insert(array $data):int
    {
        $sql="insert into $this->tableName (num_chambre,num_etage,type_chambre,id_pavillon) values (?,?,?,?)";
        return $this->database->executeUpdate($sql,$data);
    }

    public function update(array $data):int
    {
        $sql="update $this->tableName set num_etage=?,type_chambre=?,id_pavillon=?
        where $this->primaryKey=?";
        return $this->database->executeUpdate($sql,$data);
    }
}