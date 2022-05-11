<?php

namespace ModelGalerie;

use Core;

class ModelGalerie
{
    private $cptGalerie;
    private $membre_galerie;

    public function insertGalerie($image, $artiste)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("INSERT INTO galerie (image, artiste) VALUES (?, ?)", array($image, $artiste));
        // Savoir si requete valide 
        return $sql;
    }

    public function selectGalerie($artiste)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT * from galerie WHERE artiste = '$artiste' ORDER BY id_galerie DESC");
        // Savoir si requete valide 

        $result = $sql->fetch();
        return $result;
    }

    public function selectMembre($identifiant)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT * from membre WHERE identifiant = '$identifiant'");
        // Savoir si requete valide 

        $result = $sql->fetch();
        return $result;
    }

    public function insertMembre_Galerie($id_membre, $id_galerie)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("INSERT INTO membre_galerie (id_membre, id_galerie) VALUES (?, ?)", array($id_membre, $id_galerie));
        // Savoir si requete valide 
        return $sql;
    }

    public function selectMembre_Galerie($identifiant)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete
        $sql = $bdd->query("SELECT membre.id_membre, membre_galerie.id_galerie FROM membre JOIN membre_galerie ON membre.id_membre = membre_galerie.id_membre WHERE membre.identifiant = '$identifiant'");
        // Savoir si requete valide 
        $result = $sql->fetchAll();

        $membre_galerie = $sql->rowCount();
        $this->membre_galerie = $membre_galerie;

        return $result;
    }

    public function getCptMembreGalerie()
    {
        return $this->membre_galerie;
    }

    public function selectAllGalerie()
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT * FROM galerie");
        // Savoir si requete valide 
        $cptGalerie = $sql->rowCount();
        $this->cptGalerie = $cptGalerie;
        $result = $sql->fetchAll();
        return $result;
    }

    public function getCptGalerie()
    {
        return $this->cptGalerie;
    }


    public function deleteMembre_Galerie($id_galerie)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("DELETE FROM membre_galerie WHERE id_galerie = '$id_galerie'");
        // Savoir si requete valide 
        return $sql;
    }

    public function deleteGalerie($id_galerie)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("DELETE FROM galerie WHERE id_galerie = '$id_galerie'");
        // Savoir si requete valide 
        return $sql;
    }

    public function selectGalerieId($id_galerie)
    {

        // Connexion a la bd 
        $bdd = Core::getDatabase($id_galerie);
        // Requete 
        $sql = $bdd->query("SELECT * FROM galerie WHERE id_galerie = '$id_galerie'");
        // Savoir si requete valide 
        $result = $sql->fetch();
        return $result;
    }
}

