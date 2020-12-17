<?php

session_start();

?>

<!DOCTYPE html>
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
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top:14%;">
                    <div class="text-center mt-5" style="color:white;">
                        <h3>Veuillez entrer vos informations.</h3>
                    </div>
                    <form id="form-signalement" method="post" enctype="multipart/form-data">
                        <label>Nom :</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" aria-label="nom" aria-describedby="basic-addon2" required>
                        <label>Prenom :</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" aria-label="prenom" aria-describedby="basic-addon2" required>
                        <label>Email :</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon2" required>
                        
                        <div class="text-center mt-5 mb-4" style="color:white;">
                            <h3>Quel est le problème rencontré ?</h3>
                        </div>
                        <textarea type="text" name="probleme" class="form-control" id="probleme" placeHolder="Décrivez-nous le problème ici" aria-label="probleme" rows="4" aria-describedby="basic-addon2" required></textarea><br>
                        <input type="checkbox" id="scales" name="scales"
                               required>
                        <label for="scales">J'accepte que mes informations personnelles soit sauvegardé.</label>
                        <center class="mt-4">
                            <div class="alert alert-danger col-12 erreur" role="alert" style="align:center;" hidden>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Erreur lors de l'envoi.
                            </div>
                            <div class="alert alert-success col-12 succes" role="alert" style="align:center;" hidden>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                C'est envoyé!
                            </div>
                            <button class="btn btn-primary btn-lg boutton" id="button" name="button" type="submit">
                                <span>
                                    Envoyer
                                </span>
                            </button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/signaler.js"></script>
</html>