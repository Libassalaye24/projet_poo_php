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
<!doctype html>
<html lang="en">
  <head>
    <title>test</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="h1">
        
      </div>
     
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>