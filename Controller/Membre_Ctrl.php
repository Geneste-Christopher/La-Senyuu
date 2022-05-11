<?php

namespace Membre;

require("../Model/Model_Membre.php");

use ModelMembre\ModelMembre;

class Membre
{

    private $cpt;
    private $plateforme;
    private $cpt_plateforme;


    public function membre()
    {
        session_start();
        $membre = new ModelMembre;
        $sql = $membre->selectMembre();
        if ($sql) {
            $cpt = $membre->getCpt();
            $this->cpt = $cpt;

                $plateforme = $membre->selectPlateforme();
                $this->plateforme = $plateforme;
                $cpt_plateforme = $membre->getCptPlate();
                $this->cpt_plateforme = $cpt_plateforme;
            
            
            return $sql;
        }
    }

    public function getCpt()
    {
        return $this->cpt;
    }

    public function getPlateforme(){
        return $this->plateforme;
    }
    
    public function getCptPlateforme(){
        return $this->cpt_plateforme;
    }

}
