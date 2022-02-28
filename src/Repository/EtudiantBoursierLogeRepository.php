<?php
namespace App\Repository;
class EtudiantBoursierLogeRepository extends EtudiantBoursierRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function findEtudiantByIdChambre(int $id_chambre)
    {
        
        $sql="select * from $this->tableName e,chambre c where e.id_chambre=c.id_chambre and e.id_chambre=?";
        return $this->findBy($sql,[$id_chambre]);
    }
    public function countEtuChambre(int $idChambre)
    {
        $sql = "SELECT COUNT(*) FROM `personne` p INNER JOIN type_chambre t,chambre c WHERE t.id_type_chambre=c.id_type_chambre and c.id_chambre=p.id_chambre and p.id_chambre=?";
        return $this->findBy($sql,[$idChambre]);
    }
    public function findEtuChaType()
    {
        $sql = "SELECT * FROM `personne` p INNER JOIN type_chambre t,chambre c WHERE t.id_type_chambre=c.id_type_chambre and c.id_chambre=p.id_chambre ";
        return $this->database->executeSelect($sql);
    }
    public function findEboursierLoge()
    {
        $sql = "SELECT * FROM $this->tableName e 
                    INNER JOIN bourse b ON e.id_bourse=b.id_bourse 
                        INNER JOIN chambre c ON e.id_chambre=c.id_chambre
                            INNER JOIN pavillon p ON c.id_pavillon=p.id_pavillon";
        return $this->database->executeSelect($sql);
    }
}