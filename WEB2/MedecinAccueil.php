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
    <title> Page Médecin </title>
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
        
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-8 text-left">
                    <h1 style="color: #071f32;"> Bienvenue sur votre page médecin </h1>
                    <div id="infos" class="infos" style="display: none;">
                        <?php
                        /* affiche les infos du compte actuellement connecté */
                        //echo $_GET['idPro'];
                        //echo $_SESSION['uname'];
                        $sql_query = "select * from medecin where idPro=" . $_SESSION['uname'];
                        $result = mysqli_query($con, $sql_query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<table>";
                            echo "<tr>";
                            echo "<th>Nom</th>";
                            echo "<td>" . $row['nomPro'] . "</td>";
                            echo "<tr>";
                            echo "<th>Prénom</th>";
                            echo "<td>" . $row['prenomPro'] . "</td>";
                            echo "<tr>";
                            echo "<th>Spécialisation</th>";
                            echo "<td>" . $row['specialisation'] . "</td>";
                            echo "<tr>";
                            echo "<th>CV</th>";
                            echo "<td>" . $row['cv'] . "</td>";
                            echo "<tr>";
                            echo "<th>Mail</th>";
                            echo "<td>" . $row['courrielPro'] . "</td>";
                            echo "</tr>";
                            echo "</table>";
                        }

                        ?>
                    </div>
                </div>

                <div class="col-sm-2 sidenav">
                    <p style="color: #071f32; font-weight: bold;"> Voici vos différentes options : </p>
                    <p> <a style="color: #32465c; text-decoration: none;" href="ChatM.php"> Chattez avec vos patients </a> </p>
                    <p> <a id="myLink" href="MedecinAccueil.php" onclick="fct();return false;" style="text-decoration: none; color:#32465c;"> Votre compte</a> </p>
                    <a>
                        <form action="MedecinAccueil.php" role="search">
                            <button class="bouton_retour_medecin" style="background-color: #32465c; color: #f6f6f6;"> Retour sur votre accueil </button>
                        </form>
                    </a>
                    <script>
                        function fct() {
                            document.getElementById('infos').style.display = 'block';
                        }
                    </script>

                </div>
            </div>
        </div>

        <form method='post' action="">
            <input type="submit" value="Déconnexion" name="but_logout">
        </form>
</body>

</html>