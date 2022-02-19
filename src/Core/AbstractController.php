<?php
  namespace App\Core;
abstract class AbstractController implements ControllerInterface
{
  protected string $layout="layout.base";
  protected Validator $validator;
  public function __construct()
  {
    Session::start();
    $this->validator=new Validator();
  }
  public function render(string $file,array $data=[],array $data2=[],array $data3=[],array $data4=[]):void
  {
      extract($data);
      extract($data2);
      extract($data3);
      extract($data4);
      //recuperer le contenu des views dans la variable $content_for_views
      ob_start();
    // var_dump(PATH_VIEWS."".$file);
         require_once(PATH_VIEWS."".$file);
      $content_for_views=ob_get_clean();
      require_once(PATH_VIEWS."".$this->layout.".html.php");
  }
  public function redirect(string $url):void
  {
        header("location:".WEBROOT."".$url);
        exit();
  }
}