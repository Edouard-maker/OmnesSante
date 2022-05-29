<?php
$database = new PDO('mysql:host=localhost;dbname=projet;', 'root', 'mdppoo');
$allusers = $database->query('SELECT * FROM medecin');
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $database->query('DELETE FROM medecin WHERE nomPro LIKE "%' . $recherche . '%"');
} ?>

<!DOCTYPE html>
<HTML>

<head>
    <meta charset="UTF-8">
    <title> Recherche</title>
    <link href="bootstrap.min.css" rel="stylesheet" />
    <link href="Projet.css" rel="stylesheet" />
    <link href="logo.ico" rel="icon" type="x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>

<body>
    <fieldset>
        <div class="wrapper">
            <div class="container-fluid header">
                <div class="row">
                    <div class="col-md-2">
                        <br><img src="Projet-logo.png" height="110" width="110">
                    </div>
                    <div class="col-md-8">
                        <br>
                        <h1>
                            <li> OMNES SANTÉ </li>
                            <li> </li>
                        </h1>
                        <p>since 2022</p></br>
                    </div>
                </div>
            </div>
            
            <!--Section a modifier / remplir-->

            <div class="container section">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form method="get">
                            <br><input type="search" class="barre" name="s" placeholder="Recherchez un nom de medecin">
                            <input type="submit" class="btn btn-secondary btn-lg" name="envoyer" value="Rechercher"><br><br>
                        </form>

                        <section class="affichermedecin">
                            <?php
                            if ($allusers->rowCount() > 0) {
                                while ($user = $allusers->fetch()) {
                            ?>

                                    <p><?= $user['nomPro']; ?>
                                        <?= $user['prenomPro']; ?><br>
                                        <a href="mailto:omnessante@omnes.fr"><?= $user['courrielPro']; ?></a><br>
                                        <?= $user['specialisation']; ?><br>
                                        <input type="submit" class="btn btn-outline-dark" name="envoyer" value="Prendre rendez-vous"><br><br>


                                    <?php
                                }
                            } else {
                                    ?>
                                    <p>Désolé, aucun nom de médecin ne correspond à votre recherche!</p>
                                <?php

                            }

                                ?>
                        </section>
                    </div>
                </div>
            </div>
            <form action="AdminAccueil.php" class="d-flex" style="padding-left: 190px;" role="search">
                <button class="bouton_retour_admin" style="background-color: #32465c; color: #f6f6f6;"> Retour sur votre accueil </button>
            </form>
            <div id="footer">
                <a href="mailto:omnessante@omnes.fr"> omnessante@omnes.fr </a> | Téléphone : +33 6 11 11 11 11
                <p> Droits d'auteur | Copyright &copy;2022 Audrey Bacon, Reym Elkerdawy, Edouard Oprea, Marie Saliba </p>
            </div>
</body>

</html>