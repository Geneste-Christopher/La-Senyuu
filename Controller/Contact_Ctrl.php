<?php

namespace Contact;

require("../Model/Model_Contact.php");

use ModelContact\ModelContact;

class Contact
{

    // Transfère des variables erreur
    private $erreur_globale;
    private $erreur_nom;
    private $erreur_prenom;
    private $erreur_email;
    private $erreur_objet;
    private $erreur_demande;


    public function contact()
    {
        session_start();
        $ModelContact = new ModelContact;

        $reg_contact = filter_input(INPUT_POST, "reg_contact", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Si l'utilisateur appuie sur le bouton contact 
        if (isset($reg_contact)) {



            // Récupération des données 
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $objet = filter_input(INPUT_POST, "objet", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $demande = filter_input(INPUT_POST, "demande", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Initialisation des erreurs      
            $erreur_globale = "";
            $this->erreur_globale = $erreur_globale;

            $erreur_nom = "";
            $erreur_prenom = "";
            $erreur_email = "";
            $erreur_objet = "";
            $erreur_demande = "";






            // Si l'utilisateur n'a pas rempli ce champ
            if (empty($nom)) {
                $erreur_nom = "Vous n'avez pas saisie de Nom *";
                $erreur = 1;
            } else {
                if (strlen($nom) >= 25 || strlen($nom) < 5) {
                    $erreur_nom = 'Nom invalide *';
                    $erreur = 1;
                }
            }


            // Si l'utilisateur n'a pas rempli ce champ
            if (empty($prenom)) {
                $erreur_prenom = "Vous n'avez pas saisie de Prenom *";
                $erreur = 1;
            } else {
                if (strlen($prenom) >= 25 || strlen($prenom) < 5) {
                    $erreur_prenom = 'Prenom invalide *';
                    $erreur = 1;
                }
            }


            // Si l'utilisateur n'a pas rempli ce champ
            if (empty($email)) {
                $erreur_email = "Vous n'avez pas saisie votre Email *";
                $erreur = 1;
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erreur_email = "Email invalide *";
                    $erreur = 1;
                }
            }


            // Vérification objet
            if (empty($objet)) {
                $erreur_objet = "Vous n'avez pas saisie l'objet de votre demande *";
                $erreur = 1;
            } else {
                if (strlen($objet) >= 100 || strlen($objet) < 5) {
                    $erreur_objet = "Objet de votre demande invalide *";
                    $erreur = 1;
                }
            }


            // Vérification demande 

            if (empty($demande)) {
                $erreur_demande = "Vous n'avez pas saisie de message *";
                $erreur = 1;
            } else {
                if (strlen($demande) >= 1000 || strlen($demande) < 25) {
                    $erreur_demande = "Demande invalide *";
                    $erreur = 1;
                }
            }

            // Initialisation des erreurs pour le tranfert 
            $this->erreur_nom = $erreur_nom;
            $this->erreur_prenom = $erreur_prenom;
            $this->erreur_email = $erreur_email;
            $this->erreur_objet = $erreur_objet;
            $this->erreur_demande = $erreur_demande;

            // Si il n'y a aucune erreur 
            if (!isset($erreur)) {
                $sql = $ModelContact->insertContact($nom, $prenom, $email, $objet, $demande);

                // Si l'insertion est OK
                if ($sql) {


                    // Envoie du message par mail 
                    // Config du header 
                    // Config du header 
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "From: " . $email . "\r\n";
                    $headers .= 'Content-Type:text/html; charset="utf-8"' . "\n";
                    $headers .= 'Content-Transfer-Encoding: 16bit';

                    $to = "geneste.christopher@gmail.com";
                    $subject = $objet;
                    $message = "<br>Message de $nom $prenom<br><br>
                    $demande";

                    // Si le mail a été envoyer 
                    if (mail($to, $subject, $message, $headers)) {
                        $erreur_globale = "Message envoyé";
                        $this->erreur_globale = $erreur_globale;
                    } else {
                        $erreur_globale = "Une erreur est survenue *";
                        $this->erreur_globale = $erreur_globale;
                    }
                } else {
                    $erreur_globale = "Une erreur est survenue *";
                    $this->erreur_globale = $erreur_globale;
                }
            } else {
                $erreur_globale = "Vous n'avez pas saisie les champs *";
                $this->erreur_globale = $erreur_globale;
            }
        }
    }

    // Fonction de dto 

    public function getErreurGlobale()
    {
        return $this->erreur_globale;
    }

    public function getErreurNom()
    {
        return $this->erreur_nom;
    }

    public function getErreurPrenom()
    {
        return $this->erreur_prenom;
    }

    public function getErreurEmail()
    {
        return $this->erreur_email;
    }

    public function getErreurObjet()
    {
        return $this->erreur_objet;
    }

    public function getErreurDemande()
    {
        return $this->erreur_demande;
    }
}
