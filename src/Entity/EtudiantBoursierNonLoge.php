<?php
namespace App\Entity;
class EtudiantBoursierNonLoge extends EtudiantBoursier
{
    private string $type;

    public function __construct()
    {
        
    }
    /**
     * Get the value of type
     *
     * @return  string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param  string  $type
     *
     * @return  self
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }
}