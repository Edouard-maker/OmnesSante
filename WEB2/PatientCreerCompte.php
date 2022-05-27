<?php
    include "config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title> Créer compte patient </title>
    <link href="bootstrap.min.css" rel="stylesheet" />
    <link href="Projet.css" rel="stylesheet" />
    <link href="logo.ico" rel="icon" type="x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <?php
    $error_message = "";
    $success_message = "";

    // Register user
    if (isset($_POST['btnsignup'])) {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $numss = trim($_POST['numeross']);
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        $confirmpassword = trim($_POST['confirmpassword']);

        $isValid = true;

        // Check fields are empty or not
        if ($fname == '' || $lname == '' || $email == '' || $numss == '' || $login == '' || $password == '' || $confirmpassword == '') {
            $isValid = false;
            $error_message = "Veuillez remplir tous les champs";
        }

        // Check if confirm password matching or not
        if ($isValid && ($password != $confirmpassword)) {
            $isValid = false;
            $error_message = "Mots de passe non similaires";
        }

        // Check if Email-ID is valid or not
        if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $error_message = "Email invalide";
        }

        if ($isValid) {

            // Check if Email-ID already exists
            $stmt = $con->prepare("SELECT * FROM patient WHERE courrielClient = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            if ($result->num_rows > 0) {
                $isValid = false;
                $error_message = "Email existe déjà";
            }
        }

        // Insert records
        if ($isValid) {
            $insertSQL = "INSERT INTO patient(prenomClient,nomClient,courrielClient,numSS,login,mdpClient) values(?,?,?,?,?,?)";
            $stmt = $con->prepare($insertSQL);
            $stmt->bind_param("ssssss", $fname, $lname, $email, $numss, $login, $password);
            $stmt->execute();
            $stmt->close();

            $success_message = "Bravo ! Compte patient créé";
        }
    }
    ?>
</head>

<body>
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
                            <li><a class="dropdown-item" href="AdminCreerCompte.php"> Admin </a></li>
                            <li><a class="dropdown-item" href="MedecinCreerCompte.php"> Médecin </a></li>
                            <li><a class="dropdown-item" href="PatientCreerCompte.php"> Patient</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h2></h2>
            </div>

            <div class='col-md-6'>
                <form method='post' action=''>
                    <h1>Créer compte patient </h1>
                    <?php
                    // Display Error message
                    if (!empty($error_message)) {
                    ?>
                        <div class="alert alert-danger">
                            <strong> Erreur !</strong> <?= $error_message ?>
                        </div>

                    <?php
                    }
                    ?>

                    <?php
                    // Display Success message
                    if (!empty($success_message)) {
                    ?>
                        <div class="alert alert-success">
                            <strong> Succès !</strong> <?= $success_message ?>
                        </div>

                    <?php
                    }
                    ?>

                    <div class="form-group">
                        <label for="fname"> Prénom : </label>
                        <input type="text" class="form-control" name="fname" id="fname" required="required" maxlength="80">
                    </div>
                    <div class="form-group">
                        <label for="lname"> Nom :</label>
                        <input type="text" class="form-control" name="lname" id="lname" required="required" maxlength="80">
                    </div>
                    <div class="form-group">
                        <label for="email"> E-mail : </label>
                        <input type="email" class="form-control" name="email" id="email" required="required" maxlength="80">
                    </div>

                    <div class="form-group">
                        <label for="numeross"> Numéro de sécurité sociale : </label>
                        <input type="text" class="form-control" name="numeross" id="numss" required="required" maxlength="80">
                    </div>

                    <div class="form-group">
                        <label for="login"> Login : </label>
                        <input type="login" class="form-control" name="login" id="login" required="required" maxlength="80">
                    </div>

                    <div class="form-group">
                        <label for="password"> Mot de passe :</label>
                        <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80">
                    </div>
                    <div class="form-group">
                        <label for="pwd"> Confirmer mot de passe :</label>
                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="required" maxlength="80">
                    </div>
                    <button type="submit" name="btnsignup" class="btn btn-default"> Créer compte </button>

                    <p> Vous avez déjà un compte ? <a href="PatientLogin.php"> Connectez-vous ici </a></p>
                </form>
            </div>


        </div>
    </div>

    <fieldset>
        <div id="footer">
            <a href="mailto:omnessante@omnes.fr"> omnessante@omnes.fr </a> | Téléphone : +33 6 11 11 11 11
            <p> Droits d'auteur | Copyright &copy;2022 Audrey Bacon, Reym Elkerdawy, Edouard Oprea, Marie Saliba </p>
        </div>
    </fieldset>
</body>

</html>