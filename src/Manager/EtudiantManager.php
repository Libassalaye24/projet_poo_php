<?php
namespace App\Manager;
class EtudiantManager extends PersonneManager
{
   public function __construct()
   {
       parent::__construct();
       $this->role="ROLE_ETUDIANT";
   }

   public function insert(array $data):int
   {
       $sql="insert into $this->tableName (`nom`, `prenom`, `email`, `role`, `matricule`, `date_naissance`, `id_bourse`, `adresse`, `password`, `id_chambre`, `telephone`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       return $this->database->executeUpdate($sql,$data);
   }

   public function update(array $data):int
   {
       $sql="update $this->tableName set 
       where $this->primaryKey=?";
       return $this->database->executeUpdate($sql,$data);
   }
}