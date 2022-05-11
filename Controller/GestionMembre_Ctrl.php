<?php

namespace GestionMembre;

require('../Model/Model_Membre.php');

use ModelMembre\ModelMembre;

class GestionMembre
{

    private $selectMembre;
    private $cptMembre;

    // Console 
    private $console;

    public function deleteMembre()
    {

        session_start();

        // Si je suis connecté et que je suis admin 
        if (isset($_SESSION['identifiant']) and $_SESSION['identifiant'] == 'Admin') {

            $model = new ModelMembre;
            $selectMembre = $model->selectMembre();
            $this->selectMembre = $selectMembre;
            $cptMembre = $model->getCpt();
            $this->cptMembre = $cptMembre;

            $console = "";

            // On recupère le boutton 
            $reg_delete = filter_input(INPUT_POST, "reg_delete", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Si j'ai appuyer sur le bouton 
            if (isset($reg_delete)) {

                // Si au moins une case est coché
                if (isset($_POST['id_delete'])) {

                    // On recupere le tableau 
                    $id_delete = $_POST['id_delete'];
                    // On compte les ligne du tableau 
                    $nb_delete = Count($id_delete);

                    for ($i = 0; $i < $nb_delete; $i++) {
                        $identifiant = $model->selectMembreId($id_delete[$i]);
                        if ($identifiant) {
                            $console .= $identifiant[0]['identifiant'] . " à été supprimé <br>";

                            // On supprime la pp dans le dossier 
                            $ppPath = $identifiant[0]['image_membre'];
                            unlink($ppPath);

                            $model->deletePlateformeId($id_delete[$i]);
                            $model->deleteMembreId($id_delete[$i]);
                        }
                    }
                } else {
                    $console = "Aucun membre selectionné *";
                }
            }






            $this->console = $console;
            // Si je ne suis pas connecté ou que je ne suis pas Admin else = inverse du if 
        } else {
            header('location:../Accueil');
        }
    }

    public function getSelectMembre()
    {
        return $this->selectMembre;
    }

    public function getCptMembre()
    {
        return $this->cptMembre;
    }

    public function getConsole()
    {
        return $this->console;
    }
}
