<?php
namespace App\Controllers;

use App\Core\Role;
use App\Core\Request;
use App\Core\Session;
use App\Entity\Bourse;
use App\Entity\Chambre;
use App\Entity\Etudiant;
use App\Core\AbstractController;
use App\Manager\EtudiantManager;
use App\Manager\PersonneManager;
use App\Entity\EtudiantNonBoursier;
use App\Entity\EtudiantBoursierLoge;
use App\Repository\BourseRepository;
use App\Repository\ChambreRepository;
use App\Repository\EtudiantRepository;
use App\Repository\PersonneRepository;
use App\Entity\EtudiantBoursierNonLoge;
use App\Manager\ChambreManager;
use App\Manager\EtudiantNBoursierManager;
use App\Repository\EtudiantBoursierRepository;
use App\Repository\EtudiantNonBoursierRepository;
use App\Repository\EtudiantBoursierLogeRepository;

if (Role::isConnected()==true) {
class EtudiantController extends AbstractController
{
    private EtudiantRepository $etudiant;
    private EtudiantBoursierLogeRepository $eBl;
    private EtudiantBoursierRepository $eBs;
    private Request $request;
    private ChambreRepository $chambreRepo;
    private BourseRepository $bourseRepo;
    private EtudiantNonBoursierRepository $eNb;
    private ChambreManager $upCham;
    public function __construct()
    {
        parent::__construct();
        $this->etudiant=new EtudiantRepository;
        $this->persEtu=new PersonneManager;
        $this->request=new Request;
        $this->bourseRepo=new BourseRepository;
        $this->chambreRepo=new ChambreRepository;
        $this->eBl=new EtudiantBoursierLogeRepository;
        $this->eBs=new EtudiantBoursierRepository;
        $this->eNb = new EtudiantNonBoursierRepository;
        $this->upCham = new ChambreManager;
    }
    /**
     * voir tous les etudiants
     *
     * @return void
     * 
     */
    public function showEtudiants()
    {
        $etudiants=$this->etudiant->findAll();
        $this->render("etudiant/liste.etudiant.html.php",["etudiants"=>$etudiants]);
    }
    public function showEtudiantBoursier()
    {
        //$get = $this->request->query();
        $url = $this->request->query();
        if (isset($url[0])) {
            $get = $this->request->formatQuery($url[0]);
        }
        $EtuAll=$this->etudiant->findAll();
        $EB = $this->eBs->findEtuBoursier();
        $ENB=$this->eNb->findAll();
        $etudiant=$EtuAll;
        $totalRecords = count($etudiant);
        $total_page = $this->validator->total_page($totalRecords,PAR_PAGE);
        if (isset($get)) {
            $page=$get[1];
        }else {
            $page=1;
        }
        $start_from= $this->validator->start_from($page,PAR_PAGE);
        $etudiant =$this->etudiant->findAllLimit($start_from);
        
        if ($this->request->isPost()) {
            extract($this->request->request());
            $EBL = $this->eBl->findEboursierLoge();
            if ($type=='boursier') {
                $etudiant = $EB;
                if ($bourse) {
                   
                    $etudiant = $this->eBs->findEtuByTypeBourse($bourse);
                    
                }
            }elseif ($type=='nonboursier') {
                $etudiant = $ENB;
            }elseif ($type=='loge') {
                $etudiant= $EBL;
                if ($bourse) {
                    $etudiant = $this->eBs->findEtuLogeByTypeBourse($bourse);
                }
            }
           
            
        }
        $post = $this->request->request();
       // var_dump($etudiant); die;
        $this->render("etudiant/liste.etudiantBoursier.html.php",["etudiant"=>$etudiant,'total_page'=>$total_page,'page'=>$page],['post'=>$post]);
    }
    public function filtreEtudiant()
    {
        /* $EB=$this->eBs->findEtuBoursier();
        $EBL=$this->eBl->findEboursierLoge();
        $etudiant=$this->etudiant->findAll();
        $this->render("etudiant/liste.etudiantBoursier.html.php",["etudiant"=>$etudiant]); */
        if ($this->request->isPost()) {
            extract($this->request->request());
            var_dump($this->request->request());
            die;
        }
    }
    public function showAddEtudiantNBoursier()
    {   
        $url=$this->request->getUrl();
        $bourses=$this->bourseRepo->findAll();
        $this->render("etudiant/add.etudiant.html.php",['url'=>$url],['bourses'=>$bourses]);
    }
   
    public function showAddEtudiantBoursierNLoge()
    {
        $url=$this->request->getUrl();
        $bourses=$this->bourseRepo->findAll();
        $this->render("etudiant/add.etudiant.html.php",['url'=>$url],['bourses'=>$bourses]);
    }
   
    public function showEtudiantByChambre()
    {
        $url=$this->request->query();
        if (isset($url[0])) {
            $id = $this->request->formatQuery($url[0]); 
        }
        $etudiantChambres=$this->eBl->findEtudiantByIdChambre((int)$id[1]);
        //var_dump($etudiantChambres); die;
        $this->render("etudiant/liste.etudiantByChambre.html.php",['etudiantChambres'=>$etudiantChambres]);
    }
    /* public function addEtudiantBoursierLoge()
    {
       if ($this->request->isPost()) {
            if ($this->request->request()) {
                extract($this->request->request());
                $this->validator->isVide($nom,'nom');
                $this->validator->isVide($prenom,'prenom');
                $this->validator->isVide($email,'email');
                $this->validator->valideNumberCall($telephone,'telephone');
                $this->validator->isVide($date_naissance,'date_naissance');
                $this->validator->validChoice($chambre,'chambre');
                $this->validator->validChoice($bourse,'bourse');

                if ($this->validator->valid()) {
                    $matricule=uniqid();
                    $etu=new EtudiantBoursierLoge;
                    $etuManager=new EtudiantManager;
                  //  $uuu=new Etudiant;
                    $etu->setNom($nom)
                        ->setPrenom($prenom)
                        ->setEmail($email);
                    $etu->setTelephone($telephone)
                        ->setMatricule($matricule)
                        ->setDateNaissance($date_naissance); 
                    $etu->setBourse($bourse);
                    $etu->setChambre($chambre);
                    $insert = $etu->fromArray($etu);
                   // var_dump($insert); die;
                    $etuManager->insert($insert);
                    $this->redirect("etudiant/showEtudiants");
                }else {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("etudiant/showAddEtudiantBoursierLoge");
                }
            }
       }
    } */

   /*  public function addEtudiantNBoursier()
    {
       if ($this->request->isPost()) {
            if ($this->request->request()) {
                extract($this->request->request());
                $this->validator->isVide($nom,'nom');
                $this->validator->isVide($prenom,'prenom');
                $this->validator->isVide($email,'email');
                $this->validator->isVide($date_naissance,'date_naissance');
                $this->validator->valideNumberCall($telephone,'telephone');
                $this->validator->isVide($adresse,'adresse');

                if ($this->validator->valid()) {
                    $matricule=uniqid();
                    $etu=new EtudiantNonBoursier;
                    $etuManager=new EtudiantManager;
                    $uuu=new EtudiantNonBoursier;
                    $etu->setNom($nom)
                        ->setPrenom($prenom)
                        ->setEmail($email);
                    $etu->setTelephone($telephone)
                        ->setMatricule($matricule)
                        ->setDateNaissance($date_naissance); 
                    $etu->setAdresse($adresse);
                    $test = $uuu->fromArray($etu);
                        $etuManager->insert($test);
                    $this->redirect("etudiant/showEtudiants");
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
                $this->validator->valideFieldMail($email,'email');
                $this->validator->valideNumberCall($telephone,'telephone');
                $this->validator->isVide($date_naissance,'date_naissance');
                $this->validator->validChoice($bourse,'bourse');

                if ($this->validator->valid()) {
                    $matricule=uniqid();
                    $etu=new EtudiantBoursierNonLoge;
                    $etuManager=new EtudiantManager;
                  //  $uuu=new Etudiant;
                    $etu->setNom($nom)
                        ->setPrenom($prenom)
                        ->setEmail($email);
                    $etu->setTelephone($telephone)
                        ->setMatricule($matricule)
                        ->setDateNaissance($date_naissance); 
                    $etu->setBourse($bourse);
                    $test = $etu->fromArray($etu);
                        $etuManager->insert($test);
                    $this->redirect("etudiant/showEtudiants");
                }else {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("etudiant/showAddEtudiantBoursierNLoge");
                }
            }
       }
    } */

    /**
     * voir la vue qui permet d'affecter une chambre
     * a un etudiat boursier
     *
     * @return void
     * 
     */
    public function showAffecterChambre()
    {
        $id = $this->request->query();
        //var_dump($id);
        $chambres=$this->chambreRepo->findChambrePavillonNotNull();
        return $this->render("etudiant/affecter.chambre.html.php",['chambres'=>$chambres],['id'=>$id]);
    }
    /**
     * permet d'affecter une chambre 
     * a un etudiant boursier
     * pour qu'il devient un boursier loge
     * @return void
     * 
     */
    public function affecterChambre()
    {
        if ($this->request->isPost()) {
            extract($this->request->request());
            $this->validator->validChoice($idChambre,'chambre');
            if ($this->validator->valid()) {
                $pers = new PersonneRepository;
                $chambre = new Chambre;
               // var_dump($count[0]); die;
               $etuLoge = $this->eBl->findEtuChaType();
               $typCham = $etuLoge[0]->nom_type_chambre;
               $cpt = 0;
               foreach ($etuLoge as $student) {
                   if ($student->id_chambre == $idChambre) {
                     $cpt++;
                   }
               }
               if (($typCham=='perso' && $cpt==1) || ($typCham=='double' && $cpt==2)) {
                    $chambre->setOccupee('true')
                            ->setId($idChambre);
                    $upOccup = $chambre->fromArrayUp($chambre); 
                    $upC = $this->upCham->updateOccupation($upOccup);
               }
            //   die('true');
                $user = $pers->findById((int)$idEtudiant);
                $etu=new EtudiantBoursierLoge;
                $etuManager=new PersonneManager;
                $bourseEtu=new Bourse;
                $chambre->setId($idChambre);
                $bourseEtu->setId($user[0]->id_bourse);
                $etu->setId($user[0]->id_personne);
                $etu->setNom($user[0]->nom)
                    ->setPrenom($user[0]->prenom)
                    ->setEmail($user[0]->email);
                $etu->setTelephone($user[0]->telephone)
                    ->setMatricule($user[0]->matricule)
                    ->setDateNaissance($user[0]->date_naissance); 
                $etu->setBourse($bourseEtu);
                $etu->setChambre($chambre);

                $insert = $etu->fromArray($etu);
                $etuManager->update($insert);
                $this->redirect("etudiant/showEtudiantBoursier");

            }else {
                Session::setSession('arrayError',$this->validator->getErreurs());
                $this->redirect("etudiant/showAffecterChambre");
            }
        }

    }

    /**
     * permet d'ajouter des etudiants boursier
     *  ou non boursier
     *
     * @return void
     * 
     */
    public function addEtudiant()
    {
        if ($this->request->isPost()) {
            extract($this->request->request());
            $this->validator->isVide($nom,'nom');
            $this->validator->isVide($prenom,'prenom');
            $this->validator->valideFieldMail($email,'email');
          $this->validator->valideNumberCall($telephone,'telephone');
            $this->validator->isVide($date_naissance,'date_naissance');
           
            if ($this->validator->valid()) {
                $matricule=$this->validator->genereMatricule();
                $etuManager=new EtudiantManager;
                if ($myRadio=='notbourse') {
                    $etu=new EtudiantNonBoursier;
                    $etu->setNom($nom)
                        ->setPrenom($prenom)
                        ->setEmail($email);
                    $etu->setTelephone($telephone)
                        ->setMatricule($matricule)
                        ->setDateNaissance($date_naissance); 
                    $etu->setAdresse($adresse);
                    $test = $etu->fromArray($etu);
                  //  var_dump($this->request->request()); die;
                    $etuManager->insert($test);
                }
                if($myRadio=='bourse'){
                  
                    $etu=new EtudiantBoursierNonLoge;
                    $bourseEtu=new Bourse;
                    $BourseRepo = $this->bourseRepo->findById($bourse);
                    $bourseEtu->setId($bourse)
                            ->setTypeBourse($BourseRepo[0]->type_bourse)
                            ->setMontant($BourseRepo[0]->montant);
                    $etu->setNom($nom)
                        ->setPrenom($prenom)
                        ->setEmail($email);
                    $etu->setTelephone($telephone)
                        ->setMatricule($matricule)
                        ->setDateNaissance($date_naissance); 
                    $etu->setBourse($bourseEtu);
                    $main = $etu->fromArray($etu);
                    $etuManager->insert($main);
                }
                $this->redirect("etudiant/showEtudiantBoursier");

                
            }else {

                if (isset($adresse)) {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("etudiant/showAddEtudiantNBoursier");
                }else {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("etudiant/showAddEtudiantBoursierNLoge");
                }
              
            }


        }
    }
}
}else {
    $secure = new SecurityController;
    $secure->redirect("security");

}
