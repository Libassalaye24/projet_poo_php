<?php
  namespace App\Core;
 class Validator
 {
    
     private array $erreurs=[];
     public function isVide(string $field,string $key){
            if (empty($field)) {
                $this->erreurs[$key]="Le champs est obligatoire";
            }
     }
    public function validationPassword(string $valeur,string $key):void{
        if (empty($valeur)) {
            $this->erreurs[$key]="Le champs est obligatoire";
        }elseif (!preg_match(VALIDE_PASSWORD,$valeur)) {
            $this->erreurs[$key]= "la taille est compris entre 6 et 10 ";
        }
       
    }
    public function valideFieldMail(string $number,string $key):void{
        if (empty($number)) {
            $this->erreurs[$key]="Le champs est obligatoire";
        }elseif (!preg_match(VALIDE_EMAIL,$number)) {
             $this->erreurs[$key]='L\'email n\'est pas valide';
        }
    }

    public function isNumeric($valeur):bool{
        return is_numeric($valeur);
    }

    public function validNbr($valeur,string $key):void
    {
        if (empty($valeur)) {
            $this->erreurs[$key]="Le champs est obligatoire";
        }elseif (!$this->isNumeric($valeur)) {
            $this->erreurs[$key]="Veillez saisir des entiers";
        }
    }
    public function validString($valeur,string $key):void
    {
        if (empty($valeur)) {
            $this->erreurs[$key]="Le champs est obligatoire";
        }elseif ($this->isNumeric($valeur)) {
            $this->erreurs[$key]="Veillez saisir une chaine";
        }
    }
    public function valideNumberCall(string $number,string $key):void{
         $pattern4='#^(\+|00)?(221)?(77|70|75|78|76)[0-9]{7}$#';
         if (empty($number)) {
            $this->erreurs[$key]="Champs obligatoire";
         }elseif (!preg_match($pattern4,$number)) {
            $this->erreurs[$key]="Veillez saisir un numero Valide";
         }
     }
    public function validChoice(string $choix,string $key)
    {
        if ($choix=="0") {
            $this->erreurs[$key]="Veillez choisir svp!";
        }
    }
    public function totalPage($total_records,$nbrPage):int{
        return ceil($total_records/$nbrPage);
    }
    public function startFrom($page,$nbrPage):int{
        return ($page-1) * ($nbrPage);
    }
     public function genereNumChambre():string{
         $chiffre='0123456789';
         $lettre="QWERTYUIOPLKJHGFDSAZXCVBNM";
         $number=$ltrs=$chfrs="";
        for ($i=0; $i < 3; $i++) { 
            $chfrs.=$chiffre[rand(0,strlen($chiffre)-1)];
        }
        for ($i=0; $i < 2; $i++) { 
            $ltrs.=$lettre[rand(0,strlen($chiffre)-1)];
        }
        $number.=$chfrs.''.$ltrs;
        return $number;
    }
      
     public function valid():bool
     {
         return count($this->erreurs)==0;
     }

     public function getErreurs()
     {
         return $this->erreurs;
     }

    // public function setEreurs()
     
 }