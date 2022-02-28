<?php
namespace App\Repository;

use App\Core\Orm\AbstractRepository;

class PersonneRepository extends AbstractRepository
{
    protected string $role="ROLE_PERSONNE";

    public function __construct()
    {
        $this->tableName="personne";
        $this->primaryKey="id_personne";
        parent::__construct();
    }
    public function findAll(): array
    {
        $sql="select * from $this->tableName ";
        return $this->database->executeSelect($sql);
    }
  
    public function findPersonneByLoginAndPassword(string $login,string $password):object|bool
    {
        $sql="select * from $this->tableName where email=? and password=?";
       return $this->findBy($sql,[$login,$password],true);
    }
    
}