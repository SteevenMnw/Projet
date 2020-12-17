<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <?php
    include('./header.html');
    ?>
    <link rel="stylesheet" href="assets/style/signup.css">
</head>
<body>
<div class="container container-inscription">
    <div class="d-flex justify-content-center h-100">
        <div class="card-inscription">
            <div class="card-header text-center">
                <h3>Inscription</h3>
            </div>
            <div class="card-body">
                <div class="text-center" style="padding-top: 5%; padding-bottom:4%;">
                    <h3>Veuillez d'abord rentrez vos informations personnelles</h3>
                </div>
                <form id="inscription" method="post" enctype="multipart/form-data">
                    <label>Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" aria-label="nom" aria-describedby="basic-addon2" required>
                    <label>Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" aria-label="prenom" aria-describedby="basic-addon2" required>
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon2" required>
                    <div class="text-center" style="padding-top: 5%; padding-bottom:4%;">
                        <h4>Ensuite Votre pseudo et votre mot de passe:</h4>
                    </div>
                    <label>Pseudo</label>
                    <input type="text" name="login" id="login" class="form-control" placeholder="Pseudo" aria-label="login" aria-describedby="basic-addon2" required>
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Mot de passe" aria-label="mdp" aria-describedby="basic-addon2" required>
                    <div style="padding-top: 5%">
                        <input type="checkbox" id="scales" name="scales" required>
                        <label for="scales">J'accepte que mes informations personnelles soit sauvegardées.</label>
                    </div>
                    <br>
                    <center>
                        <div class="alert alert-danger col-12 erreur" role="alert" style="text-align:center" hidden>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Erreur lors de l'incription
                        </div>
                        <button class="btn btn-rounded btn-outline-warning btn-lg">S'INSCRIRE</button>
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
<script type="text/javascript" src="assets/js/inscription.js"></script>
</html>
