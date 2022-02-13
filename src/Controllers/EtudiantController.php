<?php
namespace App\Controllers;

use App\Core\AbstractController;
use App\Repository\EtudiantRepository;

class EtudiantController extends AbstractController
{
    private EtudiantRepository $etudiant;
    public function __construct()
    {
        parent::__construct();
        $this->etudiant=new EtudiantRepository;
    }
    public function showEtudiants()
    {
        $etudiants=$this->etudiant->findAll();
        $this->render("etudiant/liste.etudiant.html.php",["etudiants"=>$etudiants]);
    }
}