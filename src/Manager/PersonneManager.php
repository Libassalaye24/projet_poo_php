<?php
namespace App\Manager;

use App\Core\Orm\AbstractManager;

class PersonneManager extends AbstractManager
{
    protected string $role;
    public function __construct()
    {
        $this->tableName="personne";
        $this->primaryKey="id_personne";
        parent::__construct();
    }

    public function insert(array $data):int
    {
        $sql="insert into $this->tableName () values ()";
        return $this->database->executeUpdate($sql,$data);
    }

    public function update(array $data):int
    {
        $sql="update $this->tableName set nom=?,prenom=?,email=?,role=?,matricule=?,date_naissance=?,id_bourse=?,adresse=?,password=?,id_chambre=?,telephone=?
        where $this->primaryKey=?";
        return $this->database->executeUpdate($sql,$data);
    }
    
}