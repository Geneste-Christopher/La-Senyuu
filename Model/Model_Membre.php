<?php

namespace ModelMembre;

use Core;

class ModelMembre
{

    private $cpt;

    public function selectMembre()
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT * FROM `membre` ORDER BY membre.id_membre ASC");
        $result = $sql->fetchAll();


        $cpt = $sql->rowCount();
        $this->cpt = $cpt;

        return $result;
    }

    public function deletePlateformeId($id_membre)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("DELETE FROM membre_plateforme WHERE id_membre = $id_membre");

        return $sql;
    }

    public function selectMembreId($id_membre)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT identifiant, image_membre FROM `membre` WHERE id_membre = $id_membre");
        $result = $sql->fetchAll();

        return $result;
    }

    public function deleteMembreId($id_membre)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("DELETE FROM membre WHERE id_membre = $id_membre");

        return $sql;
    }

    public function selectMembreGalerie($id_membre)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT * FROM membre_galerie WHERE id_membre = $id_membre");
        $result = $sql->fetch();
        return $result;
    }


    public function selectPlateforme()
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT * FROM `membre` LEFT JOIN membre_plateforme ON membre.id_membre = membre_plateforme.id_membre LEFT JOIN plateforme ON membre_plateforme.id_plateforme = plateforme.id_plateforme ORDER BY membre.id_membre ASC");
        $result = $sql->fetchAll();
        $cpt_plate = $sql->rowCount();
        $this->cpt_plate = $cpt_plate;
        return $result;
    }

    public function getCpt()
    {
        return $this->cpt;
    }

    public function getCptPlate()
    {
        return $this->cpt_plate;
    }


    public function deleteMembreGalerie($id_membre)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("DELETE FROM membre_galerie WHERE id_membre = $id_membre");

        return $sql;
    }

    public function deleteGalerie($id_galerie)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("DELETE FROM galerie WHERE id_galerie = $id_galerie");

        return $sql;
    }
}
