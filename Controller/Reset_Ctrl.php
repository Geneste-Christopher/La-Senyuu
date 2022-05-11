<?php

namespace Reset;

require("../Model/Model_Reset.php");

use ModelReset\ModelReset;

class Reset
{

    // Transfère des variables erreur
    private $erreur_globale;


    public function reset()
    {
        session_start();

        $ModelReset = new ModelReset;

        $reg_reset = filter_input(INPUT_POST, "reg_reset", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_SESSION['reset'])) {
            if (isset($reg_reset)) {



                // Récupération des données 
                $motdepasse1 = filter_input(INPUT_POST, "motdepasse1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $motdepasse2 = filter_input(INPUT_POST, "motdepasse2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


                // Initialisation des erreurs      
                $erreur_globale = "";
                $this->erreur_globale = $erreur_globale;





                // Si l'utilisateur n'a pas rempli ce champ
                if (empty($motdepasse1)) {
                    $erreur = 1;
                }


                // Si l'utilisateur n'a pas rempli ce champ
                if (empty($motdepasse2)) {
                    $erreur = 1;
                }

                // Si il n'y a pas d'erreur
                if (!isset($erreur)) {
                    if ($motdepasse1 == $motdepasse2){
                        $motdepasse = password_hash($motdepasse1, PASSWORD_DEFAULT);
                        $identifiant = $_SESSION['identifiant'];
                        $sql = $ModelReset->updateMotdepasse($identifiant, $motdepasse);
                        if($sql){
                            unset($_SESSION['reset']);
                            header('location:../Accueil');
                        } else {
                            $erreur_globale = "Une erreur est survenue *";
                        }
                    } else {
                        $erreur_globale = "Les mots de passe ne correspondent pas *";
                    }
                } else {
                    $erreur_globale = "Information incorrecte *";
                }



                // Initialisation des erreurs pour le tranfert 
                $this->erreur_globale = $erreur_globale;
            }
        } else {
            header('location:../Accueil');
        }
    }


    public function getErreurGlobale()
    {
        return $this->erreur_globale;
    }
}
