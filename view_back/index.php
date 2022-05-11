<?php

// Database 
require('../Config/setup.php');

// Controller 
require('../Controller/function.php');
require('../Controller/AddMembre_Ctrl.php');

// Composer 
require('../vendor/autoload.php');

use AddMembre\AddMembre;

$add_membre = new AddMembre;

$add_membre->add_Membre();

// On lance la récupération des platformes
$selectPlateforme = $add_membre->getSelectPlateforme();

$cpt_plate = $add_membre->getCptPlate();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Les href parte de  -->
    <!-- En prod il suffi de mettre /view/ -->

    <?php include('../view/partials/head.php') ?>

    <title>Back-Office, ajouter un membre</title>
</head>

<body>
    <header>
        <?php include('../view/partials/navbar.php') ?>
    </header>
    <div class="title1">
        <h1>La SeN'YuU</h1>
        <h4>Team gaming multi-plateforme</h4>
    </div>
    <hr>
    <div class="back-anim">
        <div class="container-anim">
            <div class="text-anim">
            </div>
        </div>
    </div>
    <script src="../js/anim_entete.js"></script>
    <br>

    <main id="back">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Ajouter un membre</h1>
            <hr>

            <!-- Erreur globale  -->
            <div class="erreur_globale" style="text-align: center;">
                <?php echo $add_membre->getErreurGlobale(); ?>
            </div>

            <div class="box">
                <div class="mb-3">
                    <label for="FormControlInput1" class="form-label">Identifiant</label>
                    <input type="name" name="identifiant" class="form-control" id="FormControlInput1" placeholder="Identifiant">

                    <!-- Erreur Identifiant  -->
                    <div class="erreur">
                        <?php echo $add_membre->getErreurIdentifiant(); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Photo de profil (2000 x 1125)</label>
                    <input class="form-control" name="pp" type="file" id="formFile">

                    <!-- Erreur PP  -->
                    <div class="erreur">
                        <?php echo $add_membre->getErreurPp(); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="FormControlInput1" class="form-label">E-mail </label>
                    <input type="text" name="email" class="form-control" id="FormControlInput1" placeholder="E-mail">
                    <!-- Erreur Password  -->
                    <div class="erreur"><?php echo $add_membre->getErreurEmail(); ?></div>
                </div>
                <div class="mb-3">
                    <label for="FormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="FormControlTextarea1" rows="3" placeholder="Description"></textarea>

                    <!-- Erreur Desc  -->
                    <div class="erreur">
                        <?php echo $add_membre->getErreurDesc(); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <!-- <select class="form-select" aria-label="Default select example" name="plateforme">
                        <option selected value="0">Plateforme</option> -->
                        <?php


                        for ($i = 0; $i < $cpt_plate; $i++) {
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="<?php echo $selectPlateforme[$i]['id_plateforme'] ?>" name="plateforme[]">
                                <label class="form-check-label" for="inlineCheckbox1"><?php echo $selectPlateforme[$i]['plateforme'] ?></label>
                            </div>
                            <!-- <option value=""></option> -->
                        <?php
                        }
                        ?>
                    <!-- </select> -->

                    <!-- Erreur Desc  -->
                    <div class="erreur">
                        <?php echo $add_membre->getErreurPlateforme(); ?>
                    </div>

                </div>

                <button type="submit" name="reg_add" class="btn btn-primary">Ajouter</button>
                <a href="../back_office/Gestion_membre" style="margin-bottom:20px;">Gérer les membres</a>
            </div>

        </form>
    </main>


    <footer class="bg-dark text-lg-center text-danger">
        <hr class="m-0" />
        <a href="https://discord.gg/Y2zx8yjhMG" target="_blank" class="btn btn-primary">Rejoins nous sur Discord</a>

        <!-- ----Copyright---- -->
        <div class="text-center bg-dark text-danger p-2 fs-6">
            @2022 copyright - Geneste Christopher
        </div>
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>