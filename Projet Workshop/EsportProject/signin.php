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
    <link rel="stylesheet" href="assets/style/signin.css">
</head>
<body>
<div class="container container-login">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Connexion</h3>
            </div>
            <div class="card-body">
                <form id="connexion" method="post" action="assets/php/connexion.php">
                    <br>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Identifiant" >

                    </div><br>
                    <div class="input-group form-group">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" >
                    </div><br>
                    <!--<div class="alert alert-danger col-12 Alert" role="alert" style="text-align:center" hidden>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Identifiant ou mot de passe incorrect
                    </div>-->
                    <button class="btn btn-rounded btn-outline-warning btn-lg">SE CONNECTER</button>
                    <div style="margin-top: 3%">
                        <p style="color: #FFF">Pas encore inscrit ?
                            <a href="signup.php" id="signup">
                                Sign Up
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="js/connexion.js"></script>
</html>
