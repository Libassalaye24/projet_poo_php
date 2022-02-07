<?php
namespace App\Repository;


class ResponsableRepository extends PersonneRepository
{
    public function __construct()
    {
        $this->tableName="";
        $this->primaryKey="";
        $this->role="ROLE_RESPONSABLE";
        parent::__construct();
    }
   
}