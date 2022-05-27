<!DOCTYPE html>
<HTML>

    <head>
        <meta charset="UTF-8">
        <title> Accueil </title>
        <link href="bootstrap.min.css" rel="stylesheet" />
        <link href="Projet.css" rel="stylesheet" />
        <link href="logo.ico" rel="icon" type="x-icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
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

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Accueil.html"> Accueil </a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Tout parcourir
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="ToutGeneraliste.php"> Médecine générale </a></li>
                          <li><a class="dropdown-item" href="RechercheMedecin.php"> Médecins spécialistes </a></li>
                          <li><a class="dropdown-item" href="RechercheSpe.php"> Laboratoire de biologie médicale </a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Recherche
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="RechercheCentre.php"> Etablissements </a></li>
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
                          <li><a class="dropdown-item" href="AdminLogin.html"> Admin </a></li>
                          <li><a class="dropdown-item" href="#"> Médecin </a></li>
                          <li><a class="dropdown-item" href="#"> Client </a></li>
                        </ul>
                      </li>
                      
                    </ul>
                    
                  </div>
                </div>
              </nav>

            <h3>Login</h3>
            <form action="AdminLogin.php" method="post">
                <table border="2">
                    <tr>
                        <td>Identifiant:</td>
                        <td><input type="text" name="identifiant"></td>
                    </tr>
                    <tr>
                        <td>Mot de passe:</td>
                        <td><input type="password" name="passw"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="Soumettre">
                            <!-- Intégrer php ici avec les balises "< ?php" et "? >" -->
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </fieldset>


    
    <fieldset>
        <div id="footer">
            <a href="mailto:omnessante@omnes.fr"> omnessante@omnes.fr </a> | Téléphone : +33 6 11 11 11 11
            <p> Droits d'auteur | Copyright &copy;2022 Audrey Bacon, Reym Elkerdawy, Edouard Oprea, Marie Saliba </p>
        </div>
    </fieldset>
</body>

</html>