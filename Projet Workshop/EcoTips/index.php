<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <?php 
        include('./header.html');
        ?>
    </head>
    <body>
        <a class="btn btn-primary btn-sm pull-right" href="connexion.php" role="button" aria-pressed="true">
            <span>
                Se connecter
            </span>
        </a>
        <div class="container container-login">
            <div class="d-flex justify-content-center h-100">
                <div class="centrer">
                    <h1 style="color:white;"><br><br>
                        Bienvenue sur le site Eco Tips<br>
                        <font size="3pt">Partager vos tips avec toute la communauté !</font>
                        <br>
                        <a class="btn btn-primary btn-lg" href="tips.php" role="button" aria-pressed="true">
                            <span>
                                Proposer vos tips
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                        </a>
                    </h1> 
                    <div style="color:white; text-align:center; position:absolute; bottom:0; left:44%;">
                        <a href="mail.php">
                            Nous contacter
                        </a>
                        <label>|</label>
                        <a href="signaler.php">
                            Signaler une erreur
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>