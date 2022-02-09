<?php
namespace App\Repository;


class ResponsableRepository extends PersonneRepository
{
    public function __construct()
    {
        $this->role="ROLE_RESPONSABLE";
        parent::__construct();
    }
   
}