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
                    <form id="envoyer" method="post" enctype="multipart/form-data" style="padding-top:30%">
                        <center><h1>Contact</h1><br></center>
                        <label>Votre Nom et prénom :</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom Prénom ex : Paul Dupont..." aria-label="nom" aria-describedby="basic-addon2" required>
                        <label>Votre email :</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email..." aria-label="email" aria-describedby="basic-addon2" required>
                        <label>Sujet :</label>
                        <input type="text" name="sujet" id="sujet" class="form-control" placeholder="Sujet..." aria-label="sujet" aria-describedby="basic-addon2" required>
                        <label>Votre message :</label>
                        <textarea name="msg" id="msg" class="form-control" placeholder="Message..." aria-label="msg" aria-describedby="basic-addon2" required></textarea>
                        <br>
                        <input type="checkbox" id="scales" name="scales"
                               required>
                        <label for="scales">J'accepte que mes informations personnelles soit sauvegardé.</label>
                        <center>
                            <button class="btn btn-primary btn-lg boutton" id="boutton" name="boutton" value="boutton" type="submit">
                                <span>
                                    Envoyer le mail
                                </span>
                            </button><br><br>
                            <div class="alert alert-danger col-12 erreur" role="alert" style="text-align:center" hidden>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Erreur lors de l'envoie du mail
                            </div>
                            <div class="alert alert-success col-12 reussi" role="alert" style="text-align:center" hidden>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Le mail a bien été envoyé
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/mail.js"></script>
</html>