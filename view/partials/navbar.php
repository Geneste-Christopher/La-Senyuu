<!-- Navbar -->

<!-- responsive navbar -->
<section id="navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../Accueil">SeN'YuU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../Accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Nos_membres">Nos Membres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Notre_Galerie">Galerie</a>
                    </li>
                    <?php if (!isset($_SESSION['identifiant'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../Connexion">Connexion</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../Deconnexion">Déconnexion</a>
                        </li>
                        <?php if ($_SESSION['identifiant'] == 'Admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../back_office/Ajouter_membre">Back Office</a>
                            </li>
                        <?php } ?>
                    <?php } ?>


                    <li class="nav-item">
                        <a class="nav-link" href="../Nous_contacter">Nous contacter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>