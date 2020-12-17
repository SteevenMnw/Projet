<?php
session_start();

session_unset();
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <?php 
        include('./header.html');
        ?>
    </head>
    <body>
        <a class="btn btn-primary btn-sm pull-left" href="index.php" role="button" aria-pressed="true">
            <span>
                Revenir en arrière
            </span>
        </a>
        <div class="container container-login">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Connexion</h3>
                    </div>
                    <div class="card-body">
                        <form id="connexion" method="post">
                            <br>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="utilisateur" name="utilisateur" placeholder="Identifiant" required>

                            </div><br>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                            </div><br>
                            <center>
                                <div class="alert alert-danger col-12 Alert" role="alert" style="text-align:center" hidden>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Identifiant ou mot de passe incorrect
                                </div>
                                <button class="btn btn-primary btn-lg" id="bouton" name="bouton" value="bouton" type="submit">
                                    <span>
                                        Se connecter
                                    </span>
                                </button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Personnal Javascript -->
    <script type="text/javascript" src="js/connexion.js"></script>
</html>