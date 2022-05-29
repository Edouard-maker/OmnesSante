<?php
    include "config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title> Créer compte médecin </title>
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
        $password = trim($_POST['password']);
        $confirmpassword = trim($_POST['confirmpassword']);

        $isValid = true;

        // Check fields are empty or not
        if ($fname == '' || $lname == '' || $email == '' || $password == '' || $confirmpassword == '') {
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
            $stmt = $con->prepare("SELECT * FROM medecin WHERE courrielPro = ?");
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
            $insertSQL = "INSERT INTO medecin(mdpPro,nomPro,prenomPro,courrielPro) values(?,?,?,?)";
            $stmt = $con->prepare($insertSQL);
            $stmt->bind_param("ssss", $password, $lname, $fname, $email);
            $stmt->execute();
            $stmt->close();

            $success_message = "Compte médecin du nom de $fname $lname créé !";
        }
    }
    ?>
</head>

<!-- Code qui ajoute un médecin dans la BDD lorsque l'on est connecté à un compte admin -->
<div class='col-md-6'>
    <form method='post' action=''>
        <h1>Créer compte médecin </h1>
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
            <label for="password"> Mot de passe :</label>
            <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80">
        </div>
        <div class="form-group">
            <label for="pwd"> Confirmer mot de passe :</label>
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="required" maxlength="80">
        </div>
        <button type="submit" name="btnsignup" class="btn btn-default"> Ajouter médecin </button>
    </form>
</div>

<form action="AdminAccueil.php" class="d-flex" style="padding-left: 190px;" role="search">
    <button class="bouton_retour_admin" style="background-color: #32465c; color: #f6f6f6;"> Retour sur votre accueil </button>
</form>


</html>