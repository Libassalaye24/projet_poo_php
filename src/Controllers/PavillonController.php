<?php
namespace App\Controllers;

use Pagination;
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
use App\Repository\TypeChambreRepository;

if (Role::isConnected()==true) {
class PavillonController extends AbstractController
{
    private PavillonRepository $pavillon;
    private Request $request;
    private PavillonManager $upPavillon;
    private ChambreRepository $chambreRepository;
    private ChambreManager $chambreManager;
    private TypeChambreRepository $typeChambreRepository;
    public function __construct()
    {
        parent::__construct();
        $this->pavillon=new PavillonRepository;
        $this->request=new Request;
        $this->upPavillon=new PavillonManager;
        $this->chambreRepository=new ChambreRepository;
        $this->chambreManager=new ChambreManager;
        $this->typeChambreRepository = new TypeChambreRepository;
    }
    public function showPavillon()
    {
        //$rq = new Request;
            $get = $this->request->query();
            $pavillons=$this->pavillon->findAll();
            $nbrPage = 2;
            $totalRecords = count((array)$pavillons);
            $total_page = $this->validator->total_page($totalRecords,PAR_PAGE);
            if (isset($get[1])) {
                $page=$get[1];
            }else {
                $page=1;
            }
            $start_from= $this->validator->start_from($page,$nbrPage);
            $pavillons = $this->pavillon->findAllLimit($start_from,PAR_PAGE);
            $this->render("pavillon/liste.pavillon.html.php",['pavillons'=>$pavillons,'total_page'=>$total_page,'page'=>$page]);
        
    }
    public function showAddPavillon()
    {
        $chambres=$this->chambreRepository->findChambrePavillonNull();
        $typeChambres=$this->typeChambreRepository->findAll();
        $this->render("pavillon/add.pavillon.html.php",['chambres'=>$chambres,'typeChambres'=>$typeChambres]);
        
    }
    public function showUpdatePavillon()
    {
        $id=$this->request->query();
        $pavillons=$this->pavillon->findById((int)$id[1]);
        $chambres=$this->chambreRepository->findChambrePavillonNull();
        $typeChambres=$this->typeChambreRepository->findAll();

        $this->render("pavillon/add.pavillon.html.php",['pavillons'=>$pavillons,'chambres'=>$chambres,'typeChambres'=>$typeChambres]);
    }
   
    public function addPavillon()
    {
        
        if ($this->request->isPost()) {
            extract($this->request->request());
            $this->validator->validString($nom_pavillon,'nom_pavillon');
            $this->validator->validNbr($nbr_etage,'nbr_etage');
            if ($select=='creer') {
                $this->validator->validNbr($num_etage,'numEtage');
                $this->validator->validChoice($type_chambre,'type_chambre');
            }
            if ($this->validator->valid()) {
                
                    $pavil=new Pavillon;
                    $num_pavillon=uniqid();
                    $pavil->setNomPavillon($nom_pavillon)
                        ->setNumPavillon($num_pavillon)
                        ->setNbrEtage($nbr_etage);
                    if ($idPavillon!="0") {
                        $pavil->setId((int)$idPavillon);
                        $this->upPavillon->update(Pavillon::fromArray1($pavil));
                        $id_pavillon = (int)$idPavillon;
                    }else {
                        $id_pavillon=$this->upPavillon->insert(Pavillon::fromArray($pavil));
                    }
                    if ($select=='affecter' && isset($ch)) {
                      //  die('lm');
                        // permet d'ajouter les chambres selectionner dans
                        //le tableau arrayCollection chaambre(addChambre) 
                        foreach ($ch as $c) {
                            $cham=new Chambre;
                            $cham->setId($c);
                            $pavil->addChambre($cham); 
                        }  
                       //parcourir arrayCollection de chambre et modifer 
                        //les affecter le pavillon inserer
                        foreach ($pavil->getChambres() as $chabre){
                            $CHM = new Chambre;
                            $type=new TypeChambre;
                            $chabre->getIdPavillon()->setId($id_pavillon);
                            $chambres=$this->chambreRepository->findById($chabre->getId());
                            $type->setId($chambres[0]->id_type_chambre);
                            $CHM->setId($chabre->getId())
                                ->setNumChambre($chambres[0]->num_chambre)
                                ->setNumEtage($chambres[0]->num_etage)
                                ->setTypeChambre($type)
                                ->setIdPavillon($chabre->getIdPavillon())
                                ->setEtat($chambres[0]->etat);
                            $updateCham = (Chambre::fromArrayUpdate($CHM));
                           // var_dump($updateCham); die;
                            $this->chambreManager->update($updateCham);
                        }
                    }elseif($select=='creer' && isset($type_chambre) && isset($num_etage)) {
                        $inserChambre=new Chambre;
                        $type=new TypeChambre;
                        $pavillo=new Pavillon;
                        $pavillo->setId($id_pavillon);     
                        $type->setId($type_chambre); 
                        $num_chambre=$this->validator->genereNumChambre();
                        $inserChambre->setNumChambre($num_chambre)
                                    ->setNumEtage($num_etage)
                                    ->setTypeChambre($type)
                                    ->setEtat('non_archiver')
                                    ->setIdPavillon($pavillo);
                        $data=Chambre::fromArrayPav($inserChambre);
                     //   var_dump($data); die;
                        $insert=$this->chambreManager->insert($data);
                    
                       // die('hhhhhh');
                    }
                   // die('false');
              
              
                $this->redirect("pavillon/showPavillon");
                   
               
            }else {
                if ($idPavillon!="0"){
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("pavillon/showUpdatePavillon/idPavillon/".(int)$idPavillon);
                }else {
                    Session::setSession('arrayError',$this->validator->getErreurs());
                    $this->redirect("pavillon/showAddPavillon");
                }
               
            }
        }else {
            
        }
    }
   

   
}
}else {
    $secure = new SecurityController;
    $secure->redirect("security");

}
