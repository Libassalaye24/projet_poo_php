<?php
  namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\Request;
use App\Core\Role;
use App\Core\Session;
use App\Repository\PersonneRepository;

class SecurityController extends AbstractController
  {
    private PersonneRepository $personne;
   

    public function __construct()
    {
      parent::__construct();
      $this->personne=new PersonneRepository;
    
    }
      public function login()
      {
        $this->layout="layout.connexion";
         $this->render("security/login.html.php");
      }
      public function seConnecter(Request $request)
      {
        $arryError=[];
        if ($request->isPost()) {
            extract($request->request());
           
            $this->validator->valideFieldMail((string)$login,'login');
            $this->validator->validationPassword((string)$password,'password');
        //    die('enter');
            if ($this->validator->valid()) {
            
              $user=$this->personne->findPersonneByLoginAndPassword($login,$password);
              if ($user==false) {
                  $arrayError['connexion'] = "login ou mot de passe incorrecte!";
                  Session::setSession("arrayError",$arrayError);
                  $this->redirect("security/login");
              }else {
                Session::setSession(Role::KEY_SESSION_USER,$user);
                $this->redirect("etudiant/showEtudiantBoursier");
              }

            }else {
              Session::setSession("arrayError",$this->validator->getErreurs());
              $this->redirect("security/login");
            }
        }
         $this->render("security/login.html.php");
      }
      public function logout()
      {
          Session::destroySession();
          $this->redirect("security");
      }
     

  }