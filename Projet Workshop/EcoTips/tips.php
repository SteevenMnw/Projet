<?php 
session_start();

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
        <div class="container" style="color:white;">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="text-center" style="padding-top: 10%; padding-bottom:4%;">
                        <h3>Veuillez d'abord rentrez vos informations</h3>
                    </div>
                    <form id="envoyer" method="post" enctype="multipart/form-data">
                        <label>Nom :</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" aria-label="nom" aria-describedby="basic-addon2" required>
                        <label>Prenom :</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" aria-label="prenom" aria-describedby="basic-addon2" required>
                        <label>email :</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon2" required>
                        <div class="text-center" style="padding-top: 15%; padding-bottom:4%;">
                            <h4>Ensuite veuillez rentrer les informations concernant le Tips :</h4>
                        </div>
                        <label>Titre du Tips :</label>
                        <input type="text" name="titre" id="titre" class="form-control" placeholder="Titre" aria-label="titre" aria-describedby="basic-addon2" required>
                        <label>Description du Tips :</label>
                        <textarea name="msg" id="msg" class="form-control" placeholder="Description..." aria-label="msg" aria-describedby="basic-addon2" required></textarea><br>
                        <input type="checkbox" id="scales" name="scales"
                               required>
                        <label for="scales">J'accepte que mes informations personnelles soit sauvegardé.</label>
                        <br>
                        <center>
                            <div class="alert alert-danger col-12 erreur" role="alert" style="text-align:center" hidden>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Erreur lors de l'envoie
                            </div>
                            <div class="alert alert-success col-12 reussi" role="alert" style="text-align:center" hidden>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Le Tips a bien été envoyé
                            </div>  
                            <button class="btn btn-primary btn-lg boutton" id="boutton" name="boutton" value="boutton" type="submit">
                                <span>
                                    Envoyer le Tips
                                </span>
                            </button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/envoyertips.js"></script>
</html>