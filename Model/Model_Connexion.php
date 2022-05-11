<?php 

namespace ModelConnexion;

use Core;

class ModelConnexion{
    public function selectIdentifiant($identifiant){

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("SELECT identifiant, mot_de_passe, modif_mdp FROM membre WHERE identifiant = '$identifiant'");
        // Savoir si requete valide 
        $result = $sql->fetch();
        return $result;

    }
}


