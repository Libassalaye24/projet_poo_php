<?php
namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Session;
use App\Entity\Chambre;
use App\Manager\ChambreManager;
use App\Repository\ChambreRepository;
use App\Repository\PavillonRepository;
use App\Repository\TypeChambreRepository;

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
       $chambres = $this->chambre->findAll();
        $this->render("chambre/liste.chambre.html.php",["chambres"=>$chambres]);
    }
    public function showAddChambre()
    {
        $pavillons=$this->pavillon->findAll();
        $typeChambres=$this->typeChambreRepository->findAll();
        $this->render("chambre/add.chambre.html.php",['pavillons'=>$pavillons],['typeChambres'=>$typeChambres]);

    }
    public function showUpdateChambre()
    {
        $id=$this->request->formatQuery($this->request->query());
       // var_dump((int)$id); die;
        $pavillons=$this->pavillon->findAll();
        $chambres=$this->chambre->findChambrePavillon((int)$id);
      //  var_dump($chambres); die;
        $typeChambres=$this->typeChambreRepository->findAll();
        $this->render("chambre/add.chambre.html.php",['chambres'=>$chambres],['pavillons'=>$pavillons],['typeChambres'=>$typeChambres]);
    }
    public function addChambre()
    {
        $arrayError=[];
     if ($this->request->isPost()) {
        extract($this->request->request());
        $this->validator->validNbr($num_etage,'numEtage');
        $this->validator->validChoice($type_chambre,'type_chambre');
        if ($this->validator->valid()) {
            $post=$this->request->request();
            if (!empty($post['idChambre'])) {
                $this->upChambre->update([$num_etage,$type_chambre,$post['idChambre']]);
                $this->redirect("chambre/showChambre");
            }else {
                $num_chambre=$this->validator->genereNumChambre();
                $inserChambre=$this->chm;
                $inserChambre->setNumChambre($num_chambre)
                            ->setNumEtage($num_etage)
                            ->setType($type_chambre);
                $data=($inserChambre);
               $nc=$data->getNumChambre();
               $t=$data->getType();
               $e=$data->getNumEtage();
                $insert=$this->upChambre->insert([$nc,$e,$t]);
                $this->redirect("chambre/showChambre");
            }
            
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


    

}