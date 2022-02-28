<?php
  namespace App\Core;
use App\Controllers\ErreurController;
  class Router
  {
    private Request $request;
    private ErreurController $erreurCtrl;
    public function __construct(Request $request)
    {
        $this->request=$request;
        $this->erreurCtrl=new ErreurController();

    }
    public function resolve()
    {
      // url est compose de controlleur et d'action
          $url = $this->request->getUrl();
          
          $controllerClass="App\Controllers\\";
          $controllerClass.= empty($url[0])?"SecurityController":ucfirst($url[0])."Controller";
          $controllerAction= empty($url[1])?"login":$url[1];
          if (class_exists($controllerClass)) {
              $objetController=new $controllerClass;
             
              if (method_exists($objetController,$controllerAction)) {
                 call_user_func_array([$objetController,$controllerAction],[$this->request]);
              }else {
                $this->erreurCtrl->redirect("erreur/pageNotFound");
              }
          }else {
            //die("ereur");
              $this->erreurCtrl->redirect("erreur/pageNotFound");
          }

    }
  }