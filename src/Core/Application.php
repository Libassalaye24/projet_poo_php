<?php
  namespace App\Core;

  class Application
  {
    private Router $router;

    public function __construct()
    {

    }

    public function run()
    {
        $this->router=new Router(new Request);
        $this->router->resolve();
    }
    
  }