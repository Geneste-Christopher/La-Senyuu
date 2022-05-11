<?php

// Database 
require('../Config/setup.php');

// Controller 
require('../Controller/function.php');
require('../Controller/Connexion_Ctrl.php');

// Composer 
require('../vendor/autoload.php');

use Connexion\Connexion;

$connexion = new Connexion;
$connexion->connexion();


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Head -->
    <?php include('./partials/head.php') ?>


    <!-- Titre onglet -->
    <title>La Team SeN'YuU nous contacter</title>
</head>

<body>

    <header>
        <!-- Navbar -->
        <?php include('./partials/navbar.php') ?>
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

    <main id="connexion">
        <div class="log show-on-scroll">
            <div class="container">
                <form action="" method="post">
                    <h1>Connexion</h1>
                    <hr>

                    <!-- Erreur globale  -->
                    <div class="erreur_globale">
                        <?php echo $connexion->getErreurGlobale(); ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="input-group row mb-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Identifiant</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="identifiant" id="inputName" placeholder="Identifiant">
                                </div>

                                <!-- Erreur Identifiant  -->
                                <div class="erreur_identifiant">
                                    <?php echo $connexion->getErreurIdentifiant(); ?>
                                </div>

                            </div>
                            <div class="input-group mb-3 row">
                                <label for="inputName" class="col-sm-2 col-form-label">Mot de passe</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="motdepasse" placeholder="Mot de passe">
                                </div>

                                <!-- Erreur Mdp  -->
                                <div class="erreur_motdepasse">
                                    <?php echo $connexion->getErreurMotdepasse(); ?>
                                </div>

                            </div>
                            <input type="submit" class="btn btn-danger" name="reg_connexion" value="Login">
                            <p><a href="https://discord.gg/Y2zx8yjhMG">Aucun identifiant ?</a></p>
                </form>
            </div>
        </div>

        </div>
        </div>
    </main>


    <footer class="bg-dark text-lg-center text-danger">
        <hr class="m-0" />
        <a href="https://discord.gg/Y2zx8yjhMG" target="_blank" class="btn btn-primary">Rejoins nous sur Discord</a>

        <!-- ----Copyright---- -->
        <div class="text-center bg-dark text-danger p-2 fs-6">
            @2022 copyright - Akashi
        </div>
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../js/show-on-scroll.js"></script>
</body>

</html>