<?php

namespace Galerie;

require("../Model/Model_Galerie.php");

use ModelGalerie\ModelGalerie;


class Galerie
{

    // Transfère des variables erreur
    private $erreur_image;
    private $erreur_artiste;
    private $erreur_globale;

    // Requete SQL 
    private $selectAll;
    private $cpt_galerie;
    private $sql_select;
    private $cpt_membre_galerie;


    public function galerie()
    {
        session_start();

        $model = new ModelGalerie;

        $selectAll = $model->selectAllGalerie();
        if ($selectAll) {
            $cpt_galerie = $model->getCptGalerie();
            $this->cpt_galerie = $cpt_galerie;
        }
        $this->selectAll = $selectAll;


        // On récupère le boutton 
        $reg_galerie = filter_input(INPUT_POST, "reg_galerie", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Si le formulaire est envoyer 
        if (isset($reg_galerie)) {

            // On initialise les erreurs 
            $erreur = 0;
            $erreur_image = "";
            $erreur_artiste = "";
            $erreur_globale = "";

            // Si l'image est bien mise
            if (!isset($_FILES['image']['name']) or $_FILES['image']['size'] == 0) {
                $erreur_image = "Fichier manquant *";
                $erreur++;
            }

            // On récupère le nom de l'artiste 
            $artiste = filter_input(INPUT_POST, "artiste", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Si artiste est vide ou existe pas 
            if (!isset($artiste)) {
                $erreur_artiste = "Artiste manquant *";
                $erreur++;
            }

            // Si artiste trop long 
            if (strlen($artiste) >= 20 or strlen($artiste) <= 2) {
                $erreur_artiste = "Nom trop long *";
                $erreur++;
            }

            // Si artiste trop court 
            if (strlen($artiste) <= 5) {
                $erreur_artiste = "Nom trop court *";
                $erreur++;
            }

            // Si il n'y a pas d'erreur 
            if ($erreur == 0) {

                $targetPath = "../images_galerie/";
                $filePath = $targetPath . basename($_FILES['image']["name"]);

                // Pour DL le fichier dans mon dossier images 
                if (move_uploaded_file($_FILES['image']["tmp_name"], $filePath)) {

                    // On insere 
                    $insert = $model->insertGalerie($filePath, $artiste);
                    // Si insertion réussi 
                    if ($insert) {
                        // on selection id 
                        $select = $model->selectGalerie($artiste);
                        $id_galerie = $select['id_galerie'];
                        $id_galerie = intval($id_galerie);

                        $identifiant = $_SESSION['identifiant'];
                        $select2 = $model->selectMembre($identifiant);
                        $id_membre = $select2['id_membre'];
                        $id_membre = intval($id_membre);

                        if ($select and $select2) {
                            $insert = $model->insertMembre_Galerie($id_membre, $id_galerie);
                            if ($insert) {
                                header('location:./Notre_Galerie');
                            }
                        }
                    }
                } else {
                    $erreur_globale = "Image non téléchargée *";
                }
            } else {
                // Pluriel 
                if ($erreur == 1) {
                    $erreur_globale = "Champ incorrecte *";
                } else {
                    $erreur_globale = "Champs incorrectes *";
                }
            }


            // Transfere des erreur 
            $this->erreur_image = $erreur_image;
            $this->erreur_artiste = $erreur_artiste;
            $this->erreur_globale = $erreur_globale;
        }


        // Delete contenue galerie 
        if (isset($_SESSION['identifiant'])) {
            $identifiant = $_SESSION['identifiant'];
            $sql_select = $model->selectMembre_Galerie($identifiant);
            $this->sql_select = $sql_select;
            if ($sql_select) {
                $cpt_membre_galerie = $model->getCptMembreGalerie();
                $this->cpt_membre_galerie = $cpt_membre_galerie;
            }
        }

        // On récupère le boutton 
        $reg_delete_contenue = filter_input(INPUT_POST, "reg_delete_contenue", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirm_delete = filter_input(INPUT_POST, "confirm_delete", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($reg_delete_contenue)) {
            $_SESSION['id_galerie'] = $reg_delete_contenue;
        }

        if (isset($_SESSION['id_galerie']) and isset($confirm_delete)) {
            $identifiant = $_SESSION['identifiant'];
            $sql_select5 = $model->selectGalerieId($_SESSION['id_galerie']);
            unlink($sql_select5['image']);
            $delete = $model->deleteMembre_Galerie($_SESSION['id_galerie']);
            if ($delete) {
                $delete2 = $model->deleteGalerie($_SESSION['id_galerie']);
                if ($delete2){
                    header('location:./Notre_Galerie');
                }
            }
        }
    }


    // Fonction de dto 

    public function getErreurImage()
    {
        return $this->erreur_image;
    }

    public function getErreurArtiste()
    {
        return $this->erreur_artiste;
    }

    public function getErreurGlobale()
    {
        return $this->erreur_globale;
    }

    public function getAllGalerie()
    {
        return $this->selectAll;
    }
    public function getCptGalerie()
    {
        return $this->cpt_galerie;
    }

    public function getMembreGalerie()
    {
        return $this->sql_select;
    }

    public function getCptMembreGalerie()
    {
        return $this->cpt_membre_galerie;
    }
}
