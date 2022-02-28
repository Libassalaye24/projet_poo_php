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
    public function findAll(string $etat='non_archiver'): array
    {
        $sql="select * from $this->tableName c,type_chambre t where t.id_type_chambre=c.id_type_chambre and etat=?";
        return $this->database->executeSelect($sql,[$etat]);
    }
    public function findChambreByType(string $type,string $eat='non_archiver')
    {
        $sql = "select * from $this->tableName c,type_chambre t where c.id_type_chambre=t.id_type_chambre and t.nom_type_chambre=? and c.etat=?";
        return $this->findBy($sql,[$type,$eat]);

    }
    public function findChambreArchiver(string $etat,$limit=null):array{
        $sql="SELECT * FROM $this->tableName c INNER JOIN type_chambre t 
            where t.id_type_chambre=c.id_type_chambre and c.etat=?";
            if (!is_null($limit)) {
                $sql.=" limit $limit,".PAR_PAGE;
            }
        return $this->database->executeSelect($sql,[$etat]);
    }
    public function findChambreArchiverAndPavi(int $pavillon,string $et='non_archiver',$limit=null):array{
        $sql="SELECT * FROM $this->tableName c INNER JOIN pavillon p, type_chambre t where c.id_pavillon=p.id_pavillon 
            and t.id_type_chambre=c.id_type_chambre and c.id_pavillon = ? and c.etat = ?";
            if (!is_null($limit)) {
                $sql.=" limit $limit,".PAR_PAGE;
            }
        return $this->database->executeSelect($sql,[$pavillon,$et]);
    }
    public function CountChambreArchiver(string $etat):array{
        $sql="select count(*) from $this->tableName c,type_chambre t where t.id_type_chambre=c.id_type_chambre and etat=?";
        return $this->database->executeSelect($sql,[$etat]);
    }
    public function findById(int $id): array
    {
        $sql="select * from $this->tableName where $this->primaryKey = ?";
        return $this->database->executeSelect($sql,[$id]);

    }
    public function findChambreType(int $id):object|bool|array
    {
        $sql="select * from $this->tableName c,type_chambre t where c.id_type_chambre=t.id_type_chambre and c.$this->primaryKey=?";
        return $this->findBy($sql,[$id]);
    }
    public function findChambrePavillon(int $id):object|bool|array
    {
        $sql="select * from $this->tableName c,pavillon p where c.id_pavillon=p.id_pavillon and c.$this->primaryKey=?";
        return $this->findBy($sql,[$id]);
    }
    public function findChambrePavillonNull()
    {
        $sql="select * from $this->tableName where id_pavillon IS NULL and etat=?";
        return $this->database->executeSelect($sql,['non_archiver']);
    }
    public function findChambrePavillonNotNull()
    {
        $sql="select * from $this->tableName c
               INNER JOIN pavillon p,type_chambre t where c.id_pavillon=p.id_pavillon
                 and t.id_type_chambre=c.id_type_chambre and c.etat like ? and c.occupee like ?";
        return $this->database->executeSelect($sql,['non_archiver','false']);
    }
    public function findChambreByPavillon(int $id,$limit=null)
    {
        $sql="SELECT * FROM $this->tableName c INNER JOIN pavillon p, type_chambre t 
                where c.id_pavillon=p.id_pavillon 
                    and t.id_type_chambre=c.id_type_chambre 
                        and c.id_pavillon = ?";
        if (!is_null($limit)) {
            $sql.=" limit $limit,".PAR_PAGE;
        }
        return $this->database->executeSelect($sql,[$id]);
    }
}
