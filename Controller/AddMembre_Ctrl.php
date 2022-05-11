<?php

namespace AddMembre;

require('../Model/Model_AddMembre.php');

use ModelAddMembre\ModelAddMembre;

class AddMembre
{

    // Les erreurs 
    private $erreur_globale;
    private $erreur_identifiant;
    private $erreur_pp;
    private $erreur_email;
    private $erreur_description;
    private $erreur_plateforme;

    // Les requêtes
    private $selectPlateforme;
    private $cpt_plate;

    public function add_Membre()
    {

        session_start();

        // Si je suis bien connecter en tant qu'Admin 
        if (isset($_SESSION['identifiant']) and $_SESSION['identifiant'] == 'Admin') {

            // On selectionne la classe 
            $model = new ModelAddMembre;

            // Select plateforme
            $selectPlateforme = $model->selectPlateforme();
            $this->selectPlateforme = $selectPlateforme;

            $cpt_plate = $model->getCptPLate();
            $this->cpt_plate = $cpt_plate;

            // Je récupère la valeur de reg_add 
            $reg_add = filter_input(INPUT_POST, "reg_add", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            // Initialisation des variables d'erreurs 
            $erreur = 0;
            $erreur_globale = "";
            $erreur_identifiant = "";
            $erreur_pp = "";
            $erreur_email = "";
            $erreur_description = "";
            $erreur_plateforme = "";


            // Si j'appuie sur le bouton 
            if (isset($reg_add)) {


                // Je récupère mes données   
                $identifiant = filter_input(INPUT_POST, "identifiant", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);



                // Je vérifie mes données 
                // Si la valeur n'existe pas ou est vide
                if (!isset($identifiant)) {
                    $erreur++;
                    $erreur_identifiant = 'Identifiant manquant *';
                } else {
                    if (strlen($identifiant) > 255 or strlen($identifiant) < 5) {
                        $erreur++;
                        $erreur_identifiant = 'Identifiant incorrecte *';
                    } else {
                        // Test de duplicata 
                        $dupli = $model->selectIdMembre($identifiant);
                        if ($dupli != false) {
                            $erreur++;
                            $erreur_identifiant = 'Cet identifiant existe déjà *';
                        }
                    }
                }


                // Si il y a une erreur ou plusieur erreurs
                if (!isset($_FILES['pp']['name']) or $_FILES['pp']['size'] == 0) {
                    $erreur_pp = "Fichier manquant *";
                    $erreur++;
                }

                if (!isset($email)) {
                    $erreur++;
                    $erreur_email = "Email manquant *";
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $erreur++;
                        $erreur_email = "Email incorrecte";
                    }
                }

                // Si la valeur n'existe pas ou est vide
                if (!isset($description)) {
                    $erreur++;
                    $erreur_description = 'Description manquante *';
                } else {
                    if (strlen($description) > 255 or strlen($description) < 25) {
                        $erreur++;
                        $erreur_description = 'Description incorrecte *';
                    }
                }

                if (!isset($_POST['plateforme'])) {
                    $erreur++;
                    $erreur_plateforme = 'Plateforme manquante *';
                } else {
                    
                        $plateforme = $_POST['plateforme'];
                        // Je compte le nombre de plateforme 
                        $nb_plateforme = count($plateforme);
                }

                // Si la valeur n'existe pas ou est vide
                // Générateur de Mot de passe
                $secu = rand(4, 8);
                $gen = openssl_random_pseudo_bytes($secu, $cstrong);
                $mdp = bin2hex($gen);



                // Si il n'y a aucune erreur 
                if ($erreur == 0) {

                    // Envoie du mdp par mail 
                    // Config du header 
                    // Config du header 
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= 'From:"geneste.christopher@gmail.com"<support@SeN\'Yuu.com>' . "\n";
                    $headers .= 'Content-Type:text/html; charset="utf-8"' . "\n";
                    $headers .= 'Content-Transfer-Encoding: 16bit';

                    $to = $email;
                    $subject = "Confirmation de compte";
                    $message = "<br>Bienvenue dans la Team SeN'Yuu<br><br>
                Votre identifiant : $identifiant<br><br>
                Votre mot de passe : $mdp<br><br>
                <a href='http://localhost/Sites/Senyuu/Senyuu_Local/Connexion'>Se connecter</a>";

                    $targetPath = "../images_pp/";
                    $filePath = $targetPath . basename($_FILES['pp']["name"]);

                    // Pour DL le fichier dans mon dossier images 
                    if (move_uploaded_file($_FILES['pp']["tmp_name"], $filePath)) {
                        // Si le fichier est dl j'envoi l'email 

                        // Insertion sql 
                        $password = password_hash($mdp, PASSWORD_DEFAULT);

                        // On insert le nouveau membre 
                        $sql = $model->insertMembre($identifiant, $filePath, $description, $password);

                        // Si l'insertion est reussi 
                        if ($sql) {

                            // On selectionne son ID 
                            $sql2 = $model->selectIdMembre($identifiant);
                            // Si on as trouver son ID 
                            if ($sql2) {
                                $id_membre = $sql2['id_membre'];

                                // On insert la plateforme du membre *
                                for ($i = 0; $i < $nb_plateforme; $i++) {
                                    $nom_plateforme = $plateforme[$i];
                                    $sql3 = $model->insertMembre_Plateforme($id_membre, $nom_plateforme);
                                }

                                // Si l'insertion de la plateforme est reussi on envoie le mail 
                                if ($sql3) {

                                    if (mail($to, $subject, $message, $headers)) {
                                        $erreur_globale = "Membre ajouté";
                                    } else {
                                        $erreur_globale = "Mail non envoyé *";
                                    }
                                } else {
                                    $erreur_globale = "Insertion de la plateforme échouée *";
                                }
                            } else {
                                $erreur_globale = "Id non récupérer *";
                            }
                        } else {
                            $erreur_globale = "Insertion du membre échouée *";
                        }
                    } else {
                        $erreur_globale = "Fichier non téléchargé *";
                    }
                } else {
                    if ($erreur == 1) {
                        $erreur_globale = '1 champ incorrecte *';
                    } else {
                        $erreur_globale = $erreur . ' champs incorrectes *';
                    }
                }
            }

            // Si je ne suis pas connecter en tant qu'Admin 
        } else {
            header('location:../Accueil');
        }
        $this->erreur_globale = $erreur_globale;
        $this->erreur_identifiant = $erreur_identifiant;
        $this->erreur_pp = $erreur_pp;
        $this->erreur_email = $erreur_email;
        $this->erreur_description = $erreur_description;
        $this->erreur_plateforme = $erreur_plateforme;
    }

    public function getErreurGlobale()
    {
        return $this->erreur_globale;
    }

    public function getErreurIdentifiant()
    {
        return $this->erreur_identifiant;
    }

    public function getErreurPp()
    {
        return $this->erreur_pp;
    }

    public function getErreurEmail()
    {
        return $this->erreur_email;
    }

    public function getErreurDesc()
    {
        return $this->erreur_description;
    }

    public function getErreurPlateforme()
    {
        return $this->erreur_plateforme;
    }

    public function getSelectPlateforme()
    {
        return $this->selectPlateforme;
    }

    public function getCptPlate()
    {
        return $this->cpt_plate;
    }
}
