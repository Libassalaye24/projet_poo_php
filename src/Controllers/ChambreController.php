<?php

namespace App\Controllers;

use App\Controllers\SecurityController;
use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Role;
use App\Core\Session;
use App\Entity\Chambre;
use App\Entity\Pavillon;
use App\Entity\TypeChambre;
use App\Manager\ChambreManager;
use App\Manager\PavillonManager;
use App\Repository\ChambreRepository;
use App\Repository\PavillonRepository;
use App\Repository\TypeChambreRepository;

if (Role::isConnected()==true) {

class ChambreController extends AbstractController
{
    
    private ChambreRepository $chambre;
    private ChambreManager $upChambre;
    private PavillonRepository $pavillon;
    private Request $request;
    private Chambre $chm;
    private TypeChambreRepository $typeChambreRepository;
    public function __construct()
    {
        parent::__construct();
        $this->chambre=new ChambreRepository;
        $this->upChambre=new ChambreManager;
        $this->pavillon=new PavillonRepository;
        $this->request=new Request;
        $this->chm=new Chambre;
        $this->typeChambreRepository=new TypeChambreRepository;
    }
  
    public function showChambre()
    {
        $etat='non_archiver';
        $chambres = $this->chambre->findChambreArchiver($etat);
       //var_dump($chambres); die;
        $this->render("chambre/liste.chambre.html.php",["chambres"=>$chambres]);
    }

    public function showArchiveChambre()
    {
        $etat='archiver';
        $chambres = $this->chambre->findChambreArchiver($etat);
        $this->render("chambre/liste.archive.chambre.html.php",["chambres"=>$chambres]);
    }
    public function showAddChambre()
    {
        $pavillons=$this->pavillon->findAll();
        $typeChambres=$this->typeChambreRepository->findAll();
        $this->render("chambre/add.chambre.html.php",['pavillons'=>$pavillons],['typeChambres'=>$typeChambres]);

    }

    public function showUpdateChambre()
    {
        $id=$this->request->query();

        $typeChambres=$this->typeChambreRepository->findAll();
        $chamTypePav=$this->chambre->findChambreType((int)$id[1]);
        $chamPavillon=$this->chambre->findChambrePavillon((int)$id[1]);
        $pavillons=$this->pavillon->findAll();
        //var_dump($id[1]); die;
        $this->render("chambre/add.chambre.html.php",['chamTypePav'=>$chamTypePav],['typeChambres'=>$typeChambres],['pavillons'=>$pavillons],['chamPavillon'=>$chamPavillon]);
    }
    public function showChambreByPavillon()
    {
        $id=$this->request->formatQuery($this->request->query());
        $chambres = $this->chambre->findChambreByPavillon((int) $id);
        $this->render("chambre/liste.ChambreByPavillon.html.php",["chambres"=>$chambres]);
    }
    public function addChambre()
    {
        
     if ($this->request->isPost()) {
        extract($this->request->request());
        $this->validator->validNbr($num_etage,'numEtage');
        $this->validator->validChoice($type_chambre,'type_chambre');
        if ($this->validator->valid()) {
            
            $inserChambre=new Chambre;
            $type=new TypeChambre;
            $pavillo=new Pavillon;
            $pavillo->setId($pavillon);     
            $type->setId($type_chambre); 
            $num_chambre=$this->validator->genereNumChambre();
            $inserChambre->setNumChambre($num_chambre)
                        ->setNumEtage($num_etage)
                        ->setTypeChambre($type)
                        ->setEtat('non_archiver');
            $inserChambre->setIdPavillon($pavillo);
           
            if (empty($idChambre)) {
                if ($pavillon!='0') {
                    $data=Chambre::fromArray2($inserChambre);
                    $insert=$this->upChambre->insert($data);
                }else{
                    $pav=Chambre::fromArray($inserChambre);
                    $insert=$this->upChambre->insert($pav);
                }
            }else {
                 // $chambres=$this->chambre->findById($idChambre);
                   $data=Chambre::fromArray3($inserChambre);
                   $data[]=$idChambre;
                   $this->upChambre->update($data);
               
            }
            $this->redirect("chambre/showChambre");
            
        }else {
            Session::setSession('arrayError',$this->validator->getErreurs());
            $this->redirect("chambre/showAddChambre");
        }
    }
    $this->redirect("security");
       
    }

    public function deleteChambre()
    {
        if ($this->request->isPost()) {
            $post=$this->request->request();
            $this->upChambre->remove($post['id']);
            $this->redirect("chambre/showChambre");
        }
    }
    public function archiveChambre()
    {
        if ($this->request->isPost()) {
            extract($this->request->request());
            $chambre=$this->chambre->findById($id);
            $cham=new Chambre;
            $pav=new Pavillon;
            $type=new TypeChambre;
            $chambre[0]->etat=='non_archiver'?$etat='archiver':$etat='non_archiver';
            $pav->setId($chambre[0]->id_pavillon);
            $type->setId($chambre[0]->id_type_chambre);
            $cham->setNumChambre($chambre[0]->num_chambre)
                ->setNumEtage($chambre[0]->num_etage)
                ->setTypeChambre($type)
                ->setIdPavillon($pav)
                ->setEtat($etat)
                ->setId($chambre[0]->id_chambre);
            $update = Chambre::fromArrayUpdate($cham);
            $this->upChambre->update2($update);
            $this->redirect("chambre/showChambre");

        }   
    }
    public function desArchiveChambre()
    {
        if ($this->request->isPost()) {
            $post=$this->request->request();
            $this->upChambre->updateEtatArchive(['non_archiver',$post['id']]);
            $this->redirect("chambre/showChambre");
        }   
    }
    


    

}
}