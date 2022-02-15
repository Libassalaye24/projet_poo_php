<?php

/* use App\Core\Orm\Database;
use App\Core\Request;
use App\Entity\Etudiant;
use App\Entity\Inscription;
use App\Entity\Personne;
use App\Manager\PersonneManager;
use App\Repository\PersonneRepository; */

use App\Core\Application;

require_once './../config/Constantes.php';
require_once './../vendor/autoload.php';
$app=new Application();
$app->run();
   // require_once '/home/libasse/Bureau/CoursPhpPOO/cours-poo-mvc/src/Core/DataBase.php';
 /*   $db=new Database;
    $p=new Personne;
    $p->setId(1)
      ->setNomComplet('Libasse Mbaye'); */
    /*  $manager=new PersonneManager();
     $etudiant=new Etudiant();
     $etudiant->setTuteur("Issa Lahi")
          ->setMatricule("01A");
     $etudiant->setId(1)
        ->setNomComplet("Libasse Lahi")
            ->setLogin("libassalaye24@gmail.com")
            ->setPassword("Libasse2001"); */
     
/*     var_dump($etudiant->affiche());
    die; */
 /*   $rq=new Request();
   var_dump($rq->query()); */
  // var_dump(Etudiant::fromArray($etudiant));
 // $etu=Etudiant::fromArray($etudiant);
/*  $arr=array($etudiant);
 $arr[]=['kkk'];
 echo "<br>"; */
 //die;

 //var_dump($arr);
  
  //echo $manager;
 /* var_dump(array_values(array($etudiant)));
     die(); */
    // $manager->insert($etudiant);


        
?>
