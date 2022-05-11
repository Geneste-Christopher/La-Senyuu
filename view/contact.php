<?php

// Database 
require('../Config/setup.php');

// Controller 
require('../Controller/function.php');
require('../Controller/Contact_Ctrl.php');

// Composer 
require('../vendor/autoload.php');

use Contact\Contact;

$contact = new Contact;

$contact->contact();

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

    <main id="contact">
        <div class="container show-on-scroll">

            <h1>Contact</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <h2>Formulaire de contact</h2>
                    <hr>
                    <form action="" method="post">

                        <!-- Erreur globale  -->
                        <div class="erreur_globale" style="text-align:center">
                            <?php echo $contact->getErreurGlobale(); ?>
                        </div>

                        <div class="input-group row mb-3">
                            <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom" id="inputName" placeholder="Nom">

                                <!-- Erreur Nom  -->
                                <div class="erreur"><?php echo $contact->getErreurNom(); ?></div>
                            </div>

                        </div>



                        <div class="input-group mb-3 row">
                            <label for="inputName" class="col-sm-2 col-form-label">Prénom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="prenom" placeholder="Prénom ou Pseudo">

                                <!-- Erreur Prenom  -->
                                <div class="erreur"><?php echo $contact->getErreurPrenom(); ?></div>
                            </div>
                        </div>
                </div>

                <div class="input-group mb-3 row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" placeholder="Email">

                        <!-- Erreur Email  -->
                        <div class="erreur"><?php echo $contact->getErreurEmail(); ?></div>
                    </div>
                </div>



                <div class="input-group mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Objet de la demande</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="objet" placeholder="Objet de la demande">
                        <!-- Erreur Objet  -->
                        <div class="erreur"><?php echo $contact->getErreurObjet(); ?></div>
                    </div>
                </div>



                <div class="input-group mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Demande</label>
                    <div class="col-sm-10">
                        <textarea name="demande" class="form-control" cols="30" rows="10" placeholder="Décrivez votre demande..."></textarea>

                        <!-- Erreur Demande  -->
                        <div class="erreur"><?php echo $contact->getErreurDemande(); ?></div>
                    </div>
                </div>



                <div class="input-group mb-3 row">
                    <div class="col-sm-10 offset-sm-2">
                        <input type="submit" class="btn btn-danger" name="reg_contact" value="send">
                    </div>
                </div>

                </form>
            </div>
        </div>

        </div>
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
    <script src="../js/show-on-scroll.js"></script>
</body>

</html>