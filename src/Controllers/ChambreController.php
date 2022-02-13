<?php
namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Session;
use App\Manager\ChambreManager;
use App\Repository\ChambreRepository;
use App\Repository\PavillonRepository;

class ChambreController extends AbstractController
{
    private ChambreRepository $chambre;
    private ChambreManager $upChambre;
    private PavillonRepository $pavillon;
    private Request $request;
    public function __construct()
    {
        parent::__construct();
        $this->chambre=new ChambreRepository;
        $this->upChambre=new ChambreManager;
        $this->pavillon=new PavillonRepository;
        $this->request=new Request;
    }
    public function showChambre()
    {
       $chambres = $this->chambre->findAll();
        $this->render("chambre/liste.chambre.html.php",["chambres"=>$chambres]);
    }
    public function showAddChambre()
    {
        $pavillons=$this->pavillon->findAll();
        $this->render("chambre/add.chambre.html.php",['pavillons'=>$pavillons]);

    }
    public function showUpdateChambre()
    {
        $id=$this->request->query();
        $pavillons=$this->pavillon->findAll();
        $chambres=$this->chambre->findChambrePavillon((int)$id[0]);
        $this->render("chambre/add.chambre.html.php",['chambres'=>$chambres],['pavillons'=>$pavillons]);
    }
    public function addChambre()
    {
        $arrayError=[];
     if ($this->request->isPost()) {
        extract($this->request->request());
        $this->validator->isVide($num_etage,'numEtage');
        $this->validator->validChoice($pavillon,'pavillon');
        $this->validator->validChoice($type_chambre,'type_chambre');
        if ($this->validator->valid()) {
            $post=$this->request->request();
            if (!empty($post['idChambre'])) {
                $this->upChambre->update([$num_etage,$type_chambre,$pavillon,$post['idChambre']]);
                $this->redirect("chambre/showChambre");
            }else {
                $num_chambre=$this->validator->genereNumChambre();
                $insert=$this->upChambre->insert([$num_chambre,$num_etage,$type_chambre,$pavillon]);
                $this->redirect("chambre/showChambre");
            }
            
        }else {
            Session::setSession('arrayError',$this->validator->getErreurs());
            $this->redirect("chambre/showAddChambre");
        }
    }
    $this->redirect("security");
       
    }
}