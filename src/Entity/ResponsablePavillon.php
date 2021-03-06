<?php
namespace App\Entity;
class ResponsablePavillon extends Personne
{
        private string $password;
        public function __construct()
        {
            $this->role="ROLE_RESPONSABLE";
        }
        /**
         * Get the value of password
         *
         * @return  string
         */
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @param  string  $password
         *
         * @return  self
         */
        public function setPassword(string $password)
        {
                $this->password = $password;

                return $this;
        }
        public function affiche(): string
        {
            return parent::affiche().' '.$this->getPassword();
        }
}