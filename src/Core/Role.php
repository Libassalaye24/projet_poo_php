<?php
  namespace App\Core;
class Role
{
  const KEY_SESSION_USER="user_connect";
  const COLUNM_USER_ROLE="role";
  const ROLE_USER1="ROLE_ETUDIANT";
  const ROLE_USER2="ROLE_RESPONSABLE";
  public static function isConnected()
  {
    return Session::KeyExist(self::KEY_SESSION_USER);
  }
  public static function isEtudiant(){
    return Role::isConnected() && Session::getSession(self::KEY_SESSION_USER)[self::COLUNM_USER_ROLE]==self::ROLE_USER1;
  }
  public static function isResponsable(){
    return Role::isConnected() && Session::getSession(self::KEY_SESSION_USER)[self::COLUNM_USER_ROLE]==self::ROLE_USER2;
  }
}