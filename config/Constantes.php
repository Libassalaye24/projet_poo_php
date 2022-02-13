<?php
  namespace App\config;
  define("WEBROOT","http://localhost:8000/");
  define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));
  define("PATH_VIEWS",ROOT."templates".DIRECTORY_SEPARATOR);
  define("PATH_VIEWS_INC",ROOT."templates".DIRECTORY_SEPARATOR."inc".DIRECTORY_SEPARATOR);
  define("VALIDE_EMAIL","#^[a-zA-Z]{1}\w{4,15}@{1}(gmail|hotmail|yahoo|)\.[a-z]{2,3}$#"); 
    define("VALIDE_NUMBER","#^(\+|00)?(221)?(77|70|75|77|78|76)[0-9]{7}$#");
    define("VALIDE_PASSWORD","#^[a-zA-Z0-9@]{4,15}$#");
    define("VALIDE_USERNAME","#^[A-Z][a-zA-Z0-9]{5,}$#");
 // define("PATH_DATA",ROOT."data".DIRECTORY_SEPARATOR);
//  define("PATH_ROUTE",ROOT."router".DIRECTORY_SEPARATOR);
  //Dossier Public
 define("WEBIMG","http://localhost:8000/cours-poo-mvc/public/");
  ///////////////////////////////