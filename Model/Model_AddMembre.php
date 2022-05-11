<?php

namespace ModelAddMembre;

use Core;

class ModelAddMembre{

    private $cpt_plate;

    public function insertMembre($identifiant, $pp, $desc, $password){
        $bdd = Core::getDatabase();
        $sql = $bdd->query("INSERT INTO membre (identifiant, image_membre, description, mot_de_passe) VALUES (?, ?, ?, ?)", array($identifiant, $pp, $desc, $password));
        return $sql;
    }

    public function selectPlateforme(){
        $bdd = Core::getDatabase();
        $sql = $bdd->query("SELECT id_plateforme, plateforme FROM plateforme");
        $result = $sql->fetchAll();
        $cpt_plate = $sql->rowCount();
        $this->cpt_plate = $cpt_plate;
        return $result;
    }

    public function selectIdMembre($identifiant){
        $bdd = Core::getDatabase();
        $sql = $bdd->query("SELECT id_membre FROM membre WHERE identifiant = '$identifiant'");
        $result = $sql->fetch();
        return $result;
    }

    public function insertMembre_Plateforme($id_membre, $id_plateforme){
        $bdd = Core::getDatabase();
        $sql = $bdd->query("INSERT INTO membre_plateforme (id_membre, id_plateforme) VALUES (?, ?)", array($id_membre, $id_plateforme));
        return $sql;
    }

    public function getCptPLate(){
        return $this->cpt_plate;
    }
}