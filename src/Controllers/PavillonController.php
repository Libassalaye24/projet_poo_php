<?php
namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Session;
use App\Manager\PavillonManager;
use App\Repository\PavillonRepository;

class PavillonController extends AbstractController
{
    private PavillonRepository $pavillon;
    private Request $request;
    private PavillonManager $upPavillon;
    public function __construct()
    {
        parent::__construct();
        $this->pavillon=new PavillonRepository;
        $this->request=new Request;
        $this->upPavillon=new PavillonManager;
    }
    public function showPavillon()
    {
            $pavillons=$this->pavillon->findAll();
          /*   $nbrPage=5;
            $total_records=count($pavillons);
            $total_page=$this->validator->totalPage($total_records,$nbrPage);
            $get=$this->request->query();
            if (isset($get)) {
              $page=$get;
            }else {
              $page=1;
            }
            $suivant=$precedent=0;
            $suivant=$page+1;
            $precedent=$page-1;
            $start_from=$this->validator->startFrom($page,$nbrPage); */
            $this->render("pavillon/liste.pavillon.html.php",['pavillons'=>$pavillons]);
        
    }
    public function showAddPavillon()
    {
        $this->render("pavillon/add.pavillon.html.php");
        
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
            $this->validator->isVide($nom_pavillon,'nom_pavillon');
            $this->validator->isVide($nbr_etage,'nbr_etage');
            if ($this->validator->valid()) {
               $post = $this->request->request();
                if (!empty($post['idPavillon'])) {
                    $this->upPavillon->update([$nom_pavillon,$nbr_etage,$post['idPavillon']]);
                    $this->redirect("pavillon/showPavillon");
                }else {
                    $num_pavillon=uniqid();
                    $this->upPavillon->insert([$nom_pavillon,$num_pavillon,$nbr_etage]);
                    Session::setSession('successInsert',['Pavillon ajouter avec succes']);
                    $this->redirect("pavillon/showAddPavillon");
                }
               
            }else {
                Session::setSession('arrayError',$this->validator->getErreurs());
                $this->redirect("pavillon/showAddPavillon");
            }
        }else {
            
        }
    }
}