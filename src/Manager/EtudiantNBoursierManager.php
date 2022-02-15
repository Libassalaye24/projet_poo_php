<?php 
namespace App\Manager;
class EtudiantNBoursierManager extends EtudiantManager
{
    public function __construct()
    {
        parent::__construct();
       
    }
    public function insert(array $data):int
    {
        $sql="insert into $this->tableName nom,prenom,email,role,matricule,date_naissance,adresse values ()";
        return $this->database->executeUpdate($sql,$data);
    }

    public function update(array $data):int
    {
        $sql="update $this->tableName set 
        where $this->primaryKey=?";
        return $this->database->executeUpdate($sql,$data);
    }
}