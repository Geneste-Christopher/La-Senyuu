<?php

// Database 
require('../Config/setup.php');

// Controller 
require('../Controller/function.php');
require('../Controller/Galerie_Ctrl.php');

// Composer 
require('../vendor/autoload.php');

use Galerie\Galerie;

$controller = new Galerie;

$controller->galerie();

$galerie = $controller->getAllGalerie();
$cpt_galerie = $controller->getCptGalerie();

$membre_galerie = $controller->getMembreGalerie();
$cpt_membre_galerie = $controller->getCptMembreGalerie();



?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Head -->
    <?php include('./partials/head.php') ?>


    <!-- Titre onglet -->
    <title>La Team SeN'YuU notre galerie</title>
</head>

<?php if ($controller->getErreurGlobale() == "" and !isset($_POST['reg_delete_contenue'])) { ?>

    <body style="backdrop-filter:blur(3px);">
    <?php } else { ?>

            <body style="backdrop-filter:blur(3px); overflow:hidden; padding-right:0px;" class="modal-open" data-bs-overflow="hiden" data-bs-padding-right="0px"></body>
        <?php } ?>



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


        <hr>

        <button type="button" class="btn btn-primary button-add" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajouter du contenu</button>


        <main id="galerie">

            <!-- Formulaire pour ajouter du contenue  -->
            <!-- Partie non connecté  -->
            <?php if (!isset($_SESSION['identifiant'])) { ?>

                <!-- Modal  -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Vous n'êtes pas connecté</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Pour ajouter du contenu dans la galerie veuillez-vous connecter !
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <a href="../Connexion"><button type="button" class="btn btn-primary">Se connecter</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partie connecté  -->
            <?php } elseif ($_SESSION['identifiant'] == "Admin") { ?>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Bonjour Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Vous ne pouvez pas ajouter du contenue en tant qu'administrateur !
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <!-- Modal  -->
                <?php if ($controller->getErreurGlobale() == "") { ?>
                    <div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static">
                    <?php } else { ?>
                        <div class="modal fade show" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false" aria-modal="true" data-bs-backdrop="static" style="display:block" role="dialog">
                        <?php } ?>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="text-align:center">Ajouter du contenue</h5>
                                        <a href="../Notre_Galerie"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Erreur PP  -->
                                        <div class="erreur" style="text-align:center;">
                                            <?php echo $controller->getErreurGlobale() . "<br>";
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label" style="color:blue">Image, Fan Art (1920 x 1080) :</label>
                                            <input class="form-control" name="image" type="file" id="formFile">

                                            <!-- Erreur   -->
                                            <div class="erreur">
                                                <?php echo $controller->getErreurImage();
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label" style="color:blue">Artiste :</label>
                                            <input type="name" name="artiste" class="form-control" id="recipient-name" placeholder="Artiste">

                                            <!-- Erreur  -->
                                            <div class="erreur">
                                                <?php echo $controller->getErreurArtiste();
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" name="reg_galerie">Validé</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    <?php } ?>



                    <!-- Modal de supression contenue  -->
                    <!-- Modal de supression contenue  -->
                    <?php if (isset($_POST['reg_delete_contenue'])) { ?>
                        <div class="modal fade show" id="supression" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false" aria-modal="true" data-bs-backdrop="static" style="display:block" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Etes vous sur ?</h5>
                                        <a href="../Notre_Galerie"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                                    </div>
                                    <div class="modal-body">
                                        Vous êtes sur le point de supprimé du contenue !
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../Notre_Galerie" method="post">
                                            <a href="../Notre_Galerie"><button type="submit" class="btn btn-danger" name="confirm_delete">Oui</button></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>


                    <!-- Les fan art des membres  -->
                    <div class="container">
                        <?php for ($i = 0; $i < $cpt_galerie; $i++) { ?>
                            <div class="box">

                                <?php for ($t = 0; $t < $cpt_membre_galerie; $t++) { ?>
                                    <?php if ($membre_galerie[$t] and isset($_SESSION['identifiant'])) { ?>
                                        <?php if (($_SESSION['identifiant'] == "Admin") or ($membre_galerie[$t]['id_galerie'] == $galerie[$i]['id_galerie'])) { ?>
                                            <form method="post" action="../Notre_Galerie">
                                                <button type="submit" class="btn btn-secondary button-delete" data-bs-toggle="modal" data-bs-target="#suppression" value="<?php echo $galerie[$i]['id_galerie'] ?>" name="reg_delete_contenue"><span>Supprimer</span></button>
                                            </form>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>

                                <img src="<?php echo $galerie[$i]['image'] ?>">
                                <span><?php echo $galerie[$i]['artiste'] ?></span>
                            </div>
                            <?php $cpt = $i + 1;
                            if ($cpt % 3 == 0) { ?>
                    </div>
                    <?php if ($cpt - $cpt_galerie != 0) { ?>
                        <hr>
                        <div class="container">
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

        </main>

        <hr class="my-5" />

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
        <script src="../js/anim_entete.js"></script>

        <?php if ($controller->getErreurGlobale() != "") { ?>
            <div class="modal-backdrop fade show"></div>
            <div class="modal-backdrop fade show"></div>
        <?php } ?>

        <?php if (isset($_POST['reg_delete_contenue'])) { ?>
            <div class="modal-backdrop fade show"></div>
            <div class="modal-backdrop fade show"></div>
        <?php } ?>
        </body>

</html>