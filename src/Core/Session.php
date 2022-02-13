<?php
  namespace App\Core;

use stdClass;

class Session
  {
       public static function start():void{
            if (session_status()==PHP_SESSION_NONE) {
                session_start();
            }
        }
       public static function destroySession(){
           $_SESSION=array();
            session_destroy();
        }
       public static function KeyExist($key):bool
       {
          return isset($_SESSION[$key]);
       }
       public static function getSession(string $key):bool|stdClass|array
       {
          // var_dump($_SESSION);
        return Session::KeyExist($key)?$_SESSION[$key]:false;
       }
       public static function removeKey($key):void
       {
           unset($_SESSION[$key]);
       }
       public static function setSession(string $key,$data):void
       {
          $_SESSION[$key] = $data;
       }  

  }

?>