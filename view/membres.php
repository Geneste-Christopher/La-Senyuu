<?php

// Database 
require('../Config/setup.php');

// Controller 
require('../Controller/function.php');
require('../Controller/Membre_Ctrl.php');

// Composer 
require('../vendor/autoload.php');

// Classe de membre de mon Controller
use Membre\Membre;

// On stock la class dans la variable
$membre = new Membre;

// On stock la valeur d'une méthode dans une variable
$result_membre = $membre->membre();
$nb_membre = $membre->getCpt();
$result_plateforme = $membre->getPlateforme();
$cpt_plateforme = $membre->getCptPlateforme();



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Head -->
    <?php include('./partials/head.php') ?>


    <!-- Titre onglet -->
    <title>La Team SeN'YuU nos membres</title>
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

    <!-- Animation JS d'entête  -->
    <script src="../js/anim_entete.js"></script>


    <hr class="my-5" />

    <main id="membre">

        <h2 class="titre-membre show-on-scroll">Nos membres</h2>
        <br><br><br>
        <div class="membre1 show-on-scroll">
            <div class="row row-cols-1 row-cols-md-3 g-4">



                <!-- Les cartes  -->
                <!-- On génère les carte membres automatiquement à partir de la BD -->
                <?php for ($i = 0; $i < $nb_membre; $i++) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $result_membre[$i]['image_membre'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo utf8_encode($result_membre[$i]['identifiant']) ?></h5>
                                <p class="card-text"><?php echo utf8_encode($result_membre[$i]['description']) ?></p>
                                <p>Plateforme :</p>
                                <?php

                                // On insère les plateformes des membres automatiquement à partir de la BD 
                                for ($t = 0; $t < $cpt_plateforme; $t++) {
                                    if ($result_membre[$i]['identifiant'] == $result_plateforme[$t]['identifiant']) {
                                ?> <img class="logo1" src="<?php echo $result_plateforme[$t]['image_plateforme'] ?>" width="55px"> <?php
                                        }
                                    }
                                    $date_membre = $result_membre[$i]['date_ajout'];
                                    $date_ajout = explode("-", $date_membre);
                                ?>
                            </div>
                            <div class="card-footer">
                                
                                <!-- On ajoute la date d'ajout des membres à partir de la BD  -->
                                <small class="text-dark">Ajouter depuis le : <?php echo $date_ajout[1]." / ".$date_ajout[0] ?> </small>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <hr class="my-5" />

                <!-- <div class="col">
                    <div class="card h-100">
                        <img src="../images/saso_site_2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">SaSoHriS</h5>
                            <p class="card-text">" Je déteste attendre ou faire attendre… à mes yeux depuis la perte de l'être qui m'était le plus cher je n'ai plus de temps a perdre. "</p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/Nintendo.jpg" width="55px">
                            <img class="logo1" src="../images/PlayStation.jpg" width="55px">
                            <img class="logo1" src="../images/PC.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/zoro.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Kaf Sensei</h5>
                            <p class="card-text">" Si je meurs ici, c'est que je n'aurais pas pu aller au-delà! "</p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/Nintendo.jpg" width="55px">
                            <img class="logo1" src="../images/xbox-logo.jpg" width="55px">
                            <img class="logo1" src="../images/PC.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

                <!-- 
        <div class="membre1 show-on-scroll">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/daemondz.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Daemondz</h5>
                            <p class="card-text">" Je n'ai pas besoin d'apprendre à gérer ma colère, ce sont les autres qui devraient apprendre à ne pas m'énerver. "</p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/Nintendo.jpg" width="55px">
                            <img class="logo1" src="../images/PlayStation.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/hakai.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Hakai</h5>
                            <p class="card-text">" Les rumeurs sont des mensonges inventés par des envieux, souvent répétés par des crétins et cru par des idiots. Les intelligents vérifient avant de croire. " </p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/xbox-logo.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/luminaxx.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sensei_LUMiN4XX</h5>
                            <p class="card-text">" La rectitude est le pouvoir de prendre, sans faiblir, une décision dictée par la raison. Mourir quand il est bien de mourir, frapper quand il est bien de frapper "</p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/PlayStation.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-5" />

        <div class="membre1 show-on-scroll">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/kensei2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Kensei</h5>
                            <p class="card-text">" La peur est une réaction, le courage est quant à lui une action qui résulte de ta décision.
                                Le courage, c'est d'être mort de peur, mais de le faire quand même. " </p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/Nintendo.jpg" width="55px">
                            <img class="logo1" src="../images/PlayStation.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/dragon.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Dragon-furie</h5>
                            <p class="card-text">" Qui combat chaque jour un dragon devient lui même un dragon "</p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/Nintendo.jpg" width="55px">
                            <img class="logo1" src="../images/PlayStation.jpg" width="55px">
                            <img class="logo1" src="../images/PC.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/akashi-seijuro.gif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Akashi</h5>
                            <p class="card-text">" N'oubliez pas que l'honneur ou le déshonneur ne sont pas dans le sabre, mais dans la main qui l'empoigne. "</p>
                            <p>Plateforme :</p>
                            <img class="logo1" src="../images/PlayStation.jpg" width="55px">
                            <img class="logo1" src="../images/PC.jpg" width="55px">
                        </div>
                        <div class="card-footer">
                            <small class="text-dark">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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
</body>

</html>