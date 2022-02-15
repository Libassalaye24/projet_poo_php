<?php
namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Session;
use App\Entity\Bourse;
use App\Manager\PersonneManager;
use App\Repository\BourseRepository;
use App\Repository\ChambreRepository;
use App\Repository\EtudiantRepository;

class EtudiantController extends AbstractController
{
    private EtudiantRepository $etudiant;
    private PersonneManager $persEtu;
    private Request $request;
    private ChambreRepository $chambreRepo;
    private BourseRepository $bourseRepo;
    public function __construct()
    {
        parent::__construct();
        $this->etudiant=new EtudiantRepository;
        $this->persEtu=new PersonneManager;
        $this->request=new Request;
        $this->bourseRepo=new BourseRepository;
        $this->chambreRepo=new ChambreRepository;
    }
    public function showEtudiants()
    {
        $etudiants=$this->etudiant->findAll();
        $this->render("etudiant/liste.etudiant.html.php",["etudiants"=>$etudiants]);
    }
    public function showAddEtudiantNBoursier()
    {   
        $url=$this->request->getUrl();
        $this->render("etudiant/add.etudiant.html.php",['url'=>$url]);
    }
    public function showAddEtudiantBoursierLoge()
    {
        $url=$this->request->getUrl();
        $chambres=$this->chambreRepo->findChambrePavillonNotNull();
        $bourses=$this->bourseRepo->findAll();
        $this->render("etudiant/add.etudiant.html.php",['url'=>$url],['chambres'=>$chambres],['bourses'=>$bourses]);
    }
    public function showAddEtudiantBoursierNLoge()
    {
        $url=$this->request->getUrl();
        $bourses=$this->bourseRepo->findAll();
        $this->render("etudiant/add.etudiant.html.php",[$url],['bourses'=>$bourses]);
    }
    public function addEtudiantBoursierLoge()
    {
       if ($this->request->isPost()) {
            if ($this->request->request()) {
                extract($this->request->request());
                $this->validator->isVide($nom,'nom');
                $this->validator->isVide($prenom,'prenom');
                $this->validator->isVide($email,'email');
                $this->validator->isVide($date_naissance,'date_naissance');
                $this->validator->validChoice($chambre,'chambre');
                $this->validator->validChoice($bourse,'bourse');

                if ($this->validator->valid()) {
                    
                }else {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("etudiant/showAddEtudiantBoursierLoge");
                }
            }
       }
    }
    public function addEtudiantNBoursier()
    {
       if ($this->request->isPost()) {
            if ($this->request->request()) {
                extract($this->request->request());
                $this->validator->isVide($nom,'nom');
                $this->validator->isVide($prenom,'prenom');
                $this->validator->isVide($email,'email');
                $this->validator->isVide($date_naissance,'date_naissance');
                $this->validator->isVide($adresse,'adresse');

                if ($this->validator->valid()) {
                    
                }else {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("etudiant/showAddEtudiantNBoursier");
                }
            }
       }
    }
    public function addEtudiantBoursierNLoge()
    {
       if ($this->request->isPost()) {
            if ($this->request->request()) {
                extract($this->request->request());
                $this->validator->isVide($nom,'nom');
                $this->validator->isVide($prenom,'prenom');
                $this->validator->isVide($email,'email');
                $this->validator->isVide($date_naissance,'date_naissance');
                $this->validator->validChoice($bourse,'bourse');

                if ($this->validator->valid()) {
                    
                }else {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("etudiant/showAddEtudiantBoursierNLoge");
                }
            }
       }
    }
}