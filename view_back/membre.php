<?php

// Database 
require('../Config/setup.php');

// Controller 
require('../Controller/GestionMembre_Ctrl.php');
require('../Controller/function.php');

// Composer 
require('../vendor/autoload.php');

use GestionMembre\GestionMembre;

$controller = new GestionMembre;

$controller->deleteMembre();

$selectMembre = $controller->getSelectMembre();

$cptMembre = $controller->getCptMembre();


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

        <!-- Afficher les membres  -->
        <form action="" method="POST">
            <table class="table table-dark table-striped">
                <tr>
                    <td colspan="3">
                        <h1>Gestion des membres</h1>
                    </td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Sélectionner</td>
                </tr>
                <?php for ($i = 0; $i < $cptMembre; $i++) { ?>
                    <tr>
                        <td><?php echo $selectMembre[$i]['id_membre'] ?></td>
                        <td><?php echo $selectMembre[$i]['identifiant'] ?></td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="id_delete[]" value="<?php echo $selectMembre[$i]['id_membre'] ?>">
                                <label class="form-check-label" for="inlineCheckbox1"></label>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"><button type="submit" name="reg_delete" class="btn btn-primary" style="margin-top: 5px; margin-bottom: 5px;">Supprimer</button>
                    <a href="../back_office/Gestion_membre"><button type="button" name="reg_delete" class="btn btn-primary" style="margin-top: 5px; margin-bottom: 5px;">Refresh</button></a>
                </td>
                </tr>
                <tr><td style="color: red; text-align:center;" colspan="3"><?php echo $controller->getConsole(); ?></td></tr>
                <tr><td colspan="3"><a href="../back_office/Ajouter_membre">Ajouter les membres</a></td></tr>
            </table>
        </form style="margin-bottom:20px">

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