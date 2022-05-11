<?php 

namespace ModelContact;

use Core;

class ModelContact{
    public function insertContact($nom, $prenom, $email, $objet, $demande){

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("INSERT INTO form_contact (nom, prenom, email, objet_demande, message) VALUES (?, ?, ?, ?, ?)", array($nom, $prenom, $email, $objet, $demande));
        // Savoir si requete valide 
        return $sql;

    }
}


