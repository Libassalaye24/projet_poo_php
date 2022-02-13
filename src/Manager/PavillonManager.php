<?php
namespace App\Manager;

use App\Core\Orm\AbstractManager;

class PavillonManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName="pavillon";
        $this->primaryKey="id_pavillon";
    }

    public function insert(array $data):int
    {
        $sql="insert into $this->tableName (nom_pavillon,num_pavillon,nbr_etage) values (?,?,?)";
        return $this->database->executeUpdate($sql,$data);
    }

    public function update(array $data):int
    {
        $sql="update $this->tableName set nom_pavillon=?,nbr_etage=?
        where $this->primaryKey=?";
        return $this->database->executeUpdate($sql,$data);
    }

    
}