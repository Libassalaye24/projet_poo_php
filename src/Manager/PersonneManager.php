<?php
namespace App\Manager;

use App\Core\Orm\AbstractManager;

class PersonneManager extends AbstractManager
{
    public function __construct()
    {
        $this->tableName="";
        $this->primaryKey="";
        parent::__construct();
    }

    public function insert(array $data):int
    {
        $sql="insert into $this->tableName () values ()";
        return $this->database->executeUpdate($sql,$data);
    }

    public function update(array $data):int
    {
        $sql="update $this->tableName set 
        where $this->primaryKey=?";
        return $this->database->executeUpdate($sql,$data);
    }
    
}