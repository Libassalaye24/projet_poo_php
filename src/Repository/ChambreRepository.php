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
    public function findAll(): array
    {
        $sql="select * from $this->tableName c,type_chambre t where t.id_type_chambre=c.id_type_chambre and etat=?";
        return $this->database->executeSelect($sql,['non_archiver']);
    }
    public function findChambreArchiver(string $etat):array{
        $sql="select * from $this->tableName c,type_chambre t where t.id_type_chambre=c.id_type_chambre and etat=?";
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
        $sql="select * from $this->tableName where id_pavillon IS NULL ";
        return $this->database->executeSelect($sql);
    }
    public function findChambrePavillonNotNull()
    {
        $sql="select * from $this->tableName where id_pavillon IS NOT NULL and etat=?";
        return $this->database->executeSelect($sql,['non_archiver']);
    }
    public function findChambreByPavillon(int $id)
    {
        $sql="select * from $this->tableName c,pavillon p,type_chambre t where t.id_type_chambre=c.id_type_chambre  and c.id_pavillon=p.id_pavillon and c.id_pavillon=?";
        return $this->database->executeSelect($sql,[$id]);
    }
}
