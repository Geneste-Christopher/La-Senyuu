<?php

namespace Connexion;

require("../Model/Model_Connexion.php");

use ModelConnexion\ModelConnexion;

class Connexion
{

    // Transfère des variables erreur
    private $erreur_globale;
    private $erreur_identifiant;
    private $erreur_motdepasse;


    public function connexion()
    {
        session_start();

        if (!isset($_SESSION['identifiant'])) {
            $ModelConnexion = new ModelConnexion;

            $reg_connexion = filter_input(INPUT_POST, "reg_connexion", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            if (isset($reg_connexion)) {



                // Récupération des données 
                $identifiant = filter_input(INPUT_POST, "identifiant", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $motdepasse = filter_input(INPUT_POST, "motdepasse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


                // Initialisation des erreurs      
                $erreur_globale = "";
                $this->erreur_globale = $erreur_globale;

                $erreur_identifiant = "";
                $erreur_motdepasse = "";





                // Si l'utilisateur n'a pas rempli ce champ
                if (empty($identifiant)) {
                    $erreur_identifiant = "Vous n'avez pas saisie de d'identifiant *";
                    $erreur = 1;
                }


                // Si l'utilisateur n'a pas rempli ce champ
                if (empty($motdepasse)) {
                    $erreur_motdepasse = "Vous n'avez pas saisie de mot de passe *";
                    $erreur = 1;
                }

                // Si il n'y a pas d'erreur
                if (!isset($erreur)) {
                    if ($identifiant != "Admin" and $motdepasse != "lamachinearemonterletemps!") {


                        $sql = $ModelConnexion->selectIdentifiant($identifiant);


                        // Si l'identifiant correspond à un identifiant saisie par l'utilisateur 
                        if ($sql) {

                            $verif_pass = $sql['mot_de_passe'];

                            // Si ce n'est pas le bon mdp 
                            if (!password_verify($motdepasse, $verif_pass)) {
                                $erreur_globale = "Mot de passe incorrecte *";
                            } else {
                                if ($sql['modif_mdp'] == null) {
                                    $_SESSION['reset'] = 'yes';
                                    $_SESSION['identifiant'] = $identifiant;
                                    header('location:./reset/mot-de-passe');
                                } else {
                                    $_SESSION['identifiant'] = $identifiant;
                                    header('location:./Accueil');
                                }
                            }

                        } else {
                            $erreur_globale = "Utilisateur inconnue *";
                        }
                    } else {
                        $_SESSION['identifiant'] = 'Admin';
                        header("location:./back_office/Ajouter_membre");
                    }
                } else {
                    $erreur_globale = "Information incorrecte *";
                }



                // Initialisation des erreurs pour le tranfert 
                $this->erreur_identifiant = $erreur_identifiant;
                $this->erreur_motdepasse = $erreur_motdepasse;
                $this->erreur_globale = $erreur_globale;
            }
        } else {
            header('location:./Accueil');
        }
    }


    public function getErreurGlobale()
    {
        return $this->erreur_globale;
    }

    public function getErreurIdentifiant()
    {
        return $this->erreur_identifiant;
    }

    public function getErreurMotdepasse()
    {
        return $this->erreur_motdepasse;
    }
}
