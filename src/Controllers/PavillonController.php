<?php
namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Session;
use App\Manager\ChambreManager;
use App\Manager\PavillonManager;
use App\Repository\ChambreRepository;
use App\Repository\PavillonRepository;

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
        $pavillons=$this->pavillon->findById((int)$id[0]);
        $this->render("pavillon/add.pavillon.html.php",['pavillons'=>$pavillons]);
    }
    
    public function addPavillon()
    {
        $arrayErrors=[];
        if ($this->request->isPost()) {
            extract($this->request->request());
            $this->validator->validString($nom_pavillon,'nom_pavillon');
            $this->validator->validNbr($nbr_etage,'nbr_etage');
            if ($this->validator->valid()) {
               $post = $this->request->request();
              if (isset($post['btn_valider'])) {
                $chambres=$this->chambreRepository->findChambrePavillonNull();
                $i=0;
                $num_pavillon=uniqid();
                $id_pavillon = $this->upPavillon->insert([$nom_pavillon,$num_pavillon,$nbr_etage]);
                Session::setSession('successInsert',['Pavillon ajouter avec succes']);
               
                foreach ($chambres as $chambre) {
                    $i++;
                    if (isset($post['chambre'.$i])) {
                        $this->chambreManager->updateIdPavillon([$id_pavillon,(int)$post['chambre'.$i]]);

                    }
                }
                $this->redirect("pavillon/showAddPavillon");
                   
               }
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

    public function deletePavillon()
    {
      /*   if ($this->request->isPost()) {
            $post=$this->request->request();
            $this->upPavillon->remove($post['id']);
            $this->redirect("chambre/showChambre");
        } */
    }
}