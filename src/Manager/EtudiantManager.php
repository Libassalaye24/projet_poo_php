<?php
namespace App\Manager;
class EtudiantManager extends PersonneManager
{
   public function __construct()
   {
       parent::__construct();
       $this->role="ROLE_ETUDIANT";
   }

   
}