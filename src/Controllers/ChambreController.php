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
        $url = $this->request->query();
        if (isset($url[0])) {
            $get = $this->request->formatQuery($url[0]);
        }
        $e='non_archiver';
        $pavillon = $this->pavillon->findAll();
        $chambres = $this->chambre->findChambreArchiver($e);
        if (isset($get)) {
            $page=$get[1];
        }else {
            $page=1;
        }
        $totalRecords = count($chambres);
        $total_page = $this->validator->total_page($totalRecords,PAR_PAGE);
        $start_from= $this->validator->start_from($page,PAR_PAGE);
        $chambres = $this->chambre->findChambreArchiver($e,$start_from);

        if ($this->request->isPost()) {
            extract($this->request->request());

           if (isset($button)) {
               $chambres = $this->chambre->findChambreArchiverAndPavi((int)$pav);
           }            
        }

        $post = $this->request->request();
        $this->render("chambre/liste.chambre.html.php",["chambres"=>$chambres,'pavillons'=>$pavillon,'post'=>$post,'total_page'=>$total_page,'page'=>$page]);
    }

    public function showArchiveChambre()
    {
        $url = $this->request->query();
        if (isset($url[0])) {
            $get = $this->request->formatQuery($url[0]);
        }
        $etat='archiver';
        $post = $this->request->request();
        $pavillon = $this->pavillon->findAll();
        $chambres = $this->chambre->findChambreArchiver($etat);
        if (isset($get)) {
            $page=$get[1];
        }else {
            $page=1;
        }
        $totalRecords = count($chambres);
        $total_page = $this->validator->total_page($totalRecords,PAR_PAGE);
        $start_from= $this->validator->start_from($page,PAR_PAGE);
        $chambres = $this->chambre->findChambreArchiver($etat,$start_from);
        if ($this->request->isPost()) {
            extract($this->request->request());

           if (isset($button)) {
               $chambres = $this->chambre->findChambreArchiverAndPavi((int)$pav,$etat);
           }            
        }
        $this->render("chambre/liste.archive.chambre.html.php",["chambres"=>$chambres,'pavillons'=>$pavillon,'post'=>$post,'total_page'=>$total_page,'page'=>$page]);
    }
    public function showAddChambre()
    {
        $pavillons=$this->pavillon->findAll();
        $typeChambres=$this->typeChambreRepository->findAll();
        $this->render("chambre/add.chambre.html.php",['pavillons'=>$pavillons],['typeChambres'=>$typeChambres]);
    }

    public function showUpdateChambre()
    {
        $url = $this->request->query();
        if (isset($url[0])) {
            $id = $this->request->formatQuery($url[0]);
        }
        $typeChambres=$this->typeChambreRepository->findAll();
        $chamTypePav=$this->chambre->findChambreType((int)$id[1]);
        $chamPavillon=$this->chambre->findChambrePavillon((int)$id[1]);
        $pavillons=$this->pavillon->findAll();
        $this->render("chambre/add.chambre.html.php",['chamTypePav'=>$chamTypePav],['typeChambres'=>$typeChambres],['pavillons'=>$pavillons],['chamPavillon'=>$chamPavillon]);
    }
    public function showChambreByPavillon()
    {
        $url=$this->request->query();
        $id = $this->request->formatQuery($url[0]);
        if ($id[0]!='idPavillon') {
           $pavvv = new PavillonController();
           $pavvv->redirect('pavillon/showPavillon');
        }
       
        $chambres = $this->chambre->findChambreByPavillon((int)$id[1]);
        $totalRecords = count((array)$chambres);
        $total_page = $this->validator->total_page($totalRecords,PAR_PAGE);
            if (isset($url[1])) {
                $get = $this->request->formatQuery($url[1]);
                $page=$get[1];
            }else {
                $page=1;
            }
        $start_from= $this->validator->start_from($page,PAR_PAGE);
        $chambres = $this->chambre->findChambreByPavillon((int)$id[1],$start_from);
    
        $this->render("chambre/liste.ChambreByPavillon.html.php",["chambres"=>$chambres,'total_page'=>$total_page,'page'=>$page,"id"=>$id]);
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
            if (empty($idChambre)) {
                //ajout chmabre
                if ($pavillon!='0') {
                    //si l'id du pavillon existe dans le formulaire
                    $inserChambre->setIdPavillon($pavillo);
                }else{
                    // si l'id pavillon n'existe pas
                    $inserChambre->setIdPavillon(null);
                }
                $data=Chambre::fromArray($inserChambre);
                $insert=$this->upChambre->insert($data);

            }else {
                //update chambre
                  $chambres=$this->chambre->findById($idChambre);
                   $inserChambre->setId($idChambre);
                   $inserChambre->setIdPavillon($pavillo);
                   $inserChambre->setNumChambre($chambres[0]->num_chambre);
                   $inserChambre->setEtat($chambres[0]->etat);
                   $data=Chambre::fromArrayUpdate($inserChambre);
                   $this->upChambre->update($data);
               
            }
            $this->redirect("chambre/showChambre");
            
        }else {
            if (empty($idChambre)) {
                Session::setSession('arrayError',$this->validator->getErreurs());
                $this->redirect("chambre/showAddChambre");
            }else {
                Session::setSession('arrayError',$this->validator->getErreurs());
                $this->redirect("chambre/showAddChambre/idChambre/".$idChambre);
            }
            
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
    /**
     * Archiver et desarchiver chambre
     *
     * @return void
     */
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
            $this->upChambre->update($update);
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
}else {
    $secure = new SecurityController;
    $secure->redirect("security");

}