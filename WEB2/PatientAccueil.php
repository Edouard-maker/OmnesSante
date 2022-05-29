<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: MedecinLogin.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: MedecinLogin.php');
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Page Patient </title>
    <link href="bootstrap.min.css" rel="stylesheet" />
    <link href="Projet.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="logo.ico" rel="icon" type="x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>

<body>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Accueil.html"> Accueil </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tout parcourir
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="ToutGeneraliste.php"> Médecine générale </a></li>
                                <li><a class="dropdown-item" href="ToutSpe.php"> Médecins spécialistes </a></li>
                                <li><a class="dropdown-item" href="ToutLabo.php"> Laboratoire de biologie médicale </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Recherche
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="RechercheCentre.php"> Établissements </a></li>
                                <li><a class="dropdown-item" href="RechercheMedecin.php"> Médecins </a></li>
                                <li><a class="dropdown-item" href="RechercheSpe.php"> Spécialisations </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="RDV.html"> Rendez-vous </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Votre compte
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="AdminLogin.php"> Admin </a></li>
                                <li><a class="dropdown-item" href="MedecinLogin.php"> Médecin </a></li>
                                <li><a class="dropdown-item" href="PatientLogin.php"> Patient</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1 style="text-align: center; color: #071f32;"> Bienvenue sur votre page patient </h1>

        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <p style="color: #071f32; font-weight: bold;"> Voici vos différentes options : </p>
                    <p> <a style="color: #32465c; text-decoration: none;" href="#"> Chattez avec vos médecins </a> </p>
                    <p> <a style="color: #32465c; text-decoration: none;" href="#"> Votre compte </a></p>
                </div>
            </div>
        </div>

        <form method='post' action="">
            <input type="submit" value="Déconnexion" name="but_logout">
        </form>
</body>

</html>