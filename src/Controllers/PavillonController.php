<?php
namespace App\Controllers;

use App\Core\Role;
use App\Core\Request;
use App\Core\Session;
use App\Entity\Chambre;
use App\Entity\Pavillon;
use App\Entity\TypeChambre;
use App\Manager\ChambreManager;
use App\Core\AbstractController;
use App\Manager\PavillonManager;
use App\Repository\ChambreRepository;
use App\Repository\PavillonRepository;

if (Role::isConnected()==true) {
class PavillonController extends AbstractController
{
    private PavillonRepository $pavillon;
    private Request $request;
    private PavillonManager $upPavillon;
    private ChambreRepository $chambreRepository;
    private ChambreManager $chambreManager;
    public function __construct()
    {
        parent::__construct();
        $this->pavillon=new PavillonRepository;
        $this->request=new Request;
        $this->upPavillon=new PavillonManager;
        $this->chambreRepository=new ChambreRepository;
        $this->chambreManager=new ChambreManager;
    }
    public function showPavillon()
    {
            $pavillons=$this->pavillon->findAll();
            $this->render("pavillon/liste.pavillon.html.php",['pavillons'=>$pavillons]);
        
    }
    public function showAddPavillon()
    {
        $chambres=$this->chambreRepository->findChambrePavillonNull();
        $this->render("pavillon/add.pavillon.html.php",['chambres'=>$chambres]);
        
    }
    public function showUpdatePavillon()
    {
        $id=$this->request->query();
        $pavillons=$this->pavillon->findById((int)$id[1]);
       // var_dump($id); die;
        $this->render("pavillon/add.pavillon.html.php",['pavillons'=>$pavillons]);
    }
   
    public function addPavillon()
    {
        
        if ($this->request->isPost()) {
            extract($this->request->request());
            $this->validator->validString($nom_pavillon,'nom_pavillon');
            $this->validator->validNbr($nbr_etage,'nbr_etage');
            if ($this->validator->valid()) {
                
                $pavil=new Pavillon;
                $cham=new Chambre;
               // $type=new TypeChambre;
                $num_pavillon=uniqid();
                $u=[];
                $pavil->setNomPavillon($nom_pavillon)
                ->setNumPavillon($num_pavillon)
                ->setNbrEtage($nbr_etage);
                foreach ($chambre as $chamb) {
                    $pavil->addChambre($cham->setId($chamb)); echo "<br>";
                  //  
                 
                }   
                foreach ($pavil->getChambres() as $jjj) { 
                    var_dump($jjj);
                }
                die;
              //  $u =  ;
                var_dump($u); die;
            
               // $id_pavillon=$this->upPavillon->insert(Pavillon::fromArray($pavil));
               foreach ($chambre as $chamb) {
                   $pavil->getChambres();
                   foreach ($pavil->getChambres() as $chabre){
                       var_dump($chabre); 
                   }
                          
               }    
             /*    foreach ($pavil->getChambres() as $chabre){
                    
                    $chabre->getIdPavillon()->setId($id_pavillon);
                    $chambres=$this->chambreRepository->findById($chabre->getId());
                    $type->setId($chambres[0]->id_type_chambre);
                    $cham->setId($chabre->getId())
                        ->setNumChambre($chambres[0]->num_chambre)
                        ->setNumEtage($chambres[0]->num_etage)
                        ->setTypeChambre($type)
                        ->setIdPavillon($chabre->getIdPavillon())
                        ->setEtat($chambres[0]->etat);
                  //  $updateCham = (Pavillon::fromArray1($cham));
                   // $this->chambreManager->update2($updateCham);
                      // var_dump($updateCham); //die;
                }   
              
                die; */
                $this->redirect("pavillon/showAddPavillon");
                   
               
               /*  if (!empty($post['idPavillon'])) {
                    $this->upPavillon->update([$nom_pavillon,$nbr_etage,$post['idPavillon']]);
                    $this->redirect("pavillon/showPavillon");
                }else {
                    $num_pavillon=uniqid();
                    $this->upPavillon->insert([$nom_pavillon,$num_pavillon,$nbr_etage]);
                    Session::setSession('successInsert',['Pavillon ajouter avec succes']);
                    $this->redirect("pavillon/showAddPavillon");
                } */
               
            }else {
                Session::setSession('arrayError',$this->validator->getErreurs());
                $this->redirect("pavillon/showAddPavillon");
            }
        }else {
            
        }
    }
   

   
}
}
