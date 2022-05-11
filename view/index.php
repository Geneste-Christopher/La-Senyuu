<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Head -->
    <?php include('./partials/head.php') ?>


    <!-- Titre onglet -->
    <title>La Team SeN'YuU</title>
</head>

<body>

    <header>
        <!-- Navbar -->
        <?php include('./partials/navbar.php') ?>
    </header>

    <!-- TITRE ENTETE -->
    <div class="title1">
        <h1>La SeN'YuU</h1>
        <h4>Team gaming multi-plateforme</h4>
    </div>
    <hr>

    <!-- ANIMATION JS ENTETE -->
    <div class="back-anim">
        <div class="container-anim">
            <div class="text-anim">
            </div>
        </div>
    </div>
    <script src="../js/anim_entete.js"></script>
    <br>

    <!-- MAIN -->
    <main id="index">
        <section>
            <div class="text-video">
                <div class="col-md-6 gx-5 mb-4">
                    <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                        <iframe class="img-fluid img-thumbnail show-on-scroll" width="560" height="315" src="https://www.youtube.com/embed/-TNy_HW-SUU" title="Combats Team SeN'YuU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                </div>

                <!-- PARAGRAPHE -->
                <div class="col-md-6 gx-5 mb-4 back-text text show-on-scroll">
                    <h4><strong>Bienvenue chez La SeN'YuU</strong></h4>
                    <p>
                        Nous sommes des potes , passionés de Gaming, Mangas, Musiques et j’en passe
                        Eh oui ! on aime profiter de la life même vivre à travers nos écrans 🤣 que de bons délires ..
                        Moi c’est Zatchi « le Z » pour les intimes , leader ou Co-Leader si on veut avec mon petit frère de sang SaSoH « Kira » pour les intimes 🤫 beaucoup d’intimité
                        <!-- « Gif drôle »  -->
                        Ah oui je disais
                        <!-- « gif qui parle ou réfléchit » -->
                        on est une équipe certes ,
                        <!-- « gif point fermé / lien fraternel » -->
                        Mais surtout des membres très soudés,
                        une « Famille »
                        <!--en gras-->>
                        des « Frères d’armes » d’où le nom de la Team « Frères d’armes » écritures en japonais * Si vous préférez 👊🏼 en quelques mots on est multi Gaming axé
                        Ps4 / Xbox / Pc / Nintendo Switch Tablette
                        <!--logos des consoles si possible  -->
                    </p>
                    <p><strong>Dédicace à tous nos membres !</strong></p>
                    <p>
                        <!-- « Liste des membres » -->
                        Et un gros Big Up à Akashi #LesYeux2L’empereur
                        Sans lui le site n’aurait jamais vu le jour !
                        Pour plus d’infos hésitez pas à nous contacter et on vous répondra dès que possibles.
                    </p>
                </div>
            </div>
        </section>
        <hr class="my-5" />

        <!--Section: Content-->
        <section class="text-center">
            <h4 class="mb-5"><strong>Pour plus d’infos hésitez pas à nous contacter et on vous répondra dès que possibles.</strong></h4>

            <!-- CARD MEMBRES / GALERIE / DEEZER  -->
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card card1 show-on-scroll">
                        <img src="../images/card_diablo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nos Membres</h5>
                            <p class="card-text">Retrouvez la liste de tous nos membres et les plateformes sur lesquels ils sont présent.</p>
                            <p class="card-text"><small class="text-muted">Last updated ...</small></p>
                            <a href="../Nos_membres" class="btn btn-danger">Plus d'information</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card card2 show-on-scroll">
                        <img src="../images/card_goku.jpg" class="card-img-top" alt="...">
                    </div>
                    <br>

                    <!-- LIEN DEEZER -->

                    <iframe class="deezer show-on-scroll" title="deezer-widget" src="https://widget.deezer.com/widget/dark/playlist/10180003822" width="490" height="180" frameborder="0" allowtransparency="true" allow="encrypted-media; clipboard-write"></iframe>
                </div>

                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card card3 show-on-scroll">
                        <img src="../images/card_one-piece.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Galerie</h5>
                            <p class="card-text">Venez regarder et admirer les Videos, Screens et Art réaliser par nos membres.</p>
                            <p class="card-text"><small class="text-muted">Last updated ...</small></p>
                            <a href="../Notre_Galerie" class="btn btn-danger">Voir plus de contenu</a>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <hr class="my-5" />

    <!-- FOOTER -->

    <footer id="footer" class="bg-dark text-lg-center text-danger">
        <hr class="m-0" />
        <!-- <button href="https://discord.gg/Y2zx8yjhMG" target="_blank" class="button" style="vertical-align:middle"><span>Rejoins nous sur Discord</span></button> -->

        <a href="https://discord.gg/Y2zx8yjhMG" target="_blank" class="btn btn-primary discord show-on-scroll">Rejoins nous sur Discord</a>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright - Geneste Christopher
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../js/show-on-scroll.js"></script>
</body>

</html>