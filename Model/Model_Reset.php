<?php 

namespace ModelReset;

use Core;

class ModelReset{
    public function updateMotdepasse($identifiant, $motdepasse){

        // Connexion a la bd 
        $bdd = Core::getDatabase();
        // Requete 
        $sql = $bdd->query("UPDATE membre SET mot_de_passe = '$motdepasse', modif_mdp = 1 WHERE identifiant = '$identifiant'");
        // Savoir si requete valide 
        return $sql;

    }
}