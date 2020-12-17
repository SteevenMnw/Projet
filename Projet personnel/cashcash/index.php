<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php
        include('./include/header.html');  
        ?>
    </head>

    <body>

        <?php
        session_start();
        // Détruit toutes les sessions existante
        session_unset();
        // Si l'utilisateur à bien mis le nom d'utilisateur et le mot de passe
        if(isset($_POST["Utilisateur"]) && isset($_POST["mdp"]))
        {
            // Connexion à la bdd en mode lecture seule
            $bdd = mysqli_connect("localhost","utilisateur","utilisateur","cashcash");
            // Je sélectionne le login, le mdp, le statut, le matricule avec les infos envoyer de l'utilisateur
            $reqlibelle = "SELECT login, mdp, statut, matricule FROM user WHERE login = \"".$_POST['Utilisateur']."\" and mdp = \"".$_POST["mdp"]."\"";
            // Execution de la requête
            $resultlibelle = mysqli_query($bdd,$reqlibelle);
            // Retourne la ligne du résultat sous la forme d'un tableau
            $rowlibelle = $resultlibelle->fetch_array(MYSQLI_ASSOC);

            // On compare si le login et le mdp est le bon dans la bdd
            if ($rowlibelle['login'] == $_POST["Utilisateur"] && $rowlibelle['mdp'] == $_POST["mdp"])
            {
                // Stockage dans une varibale session le login et le mdp
                $_SESSION['Utilisateur'] = $_POST["Utilisateur"];
                $_SESSION['Mdp'] = $_POST["mdp"];


                // Si le statut de l'utilisateur est T (technicien)
                if ($rowlibelle['statut'] == "T")
                {
                    // Stockage dans une variable session le matricule de l'employé, son statut et redirection vers sa page 
                    $_SESSION['matricule'] = $rowlibelle['matricule'];
                    $_SESSION['verif'] = "technicien";
                    header("location: ./technicien.php");
                }
                // Sinon le statut de l'utilisateur est A (assistant)
                else
                {
                    // Stockage dans une variable session le matricule de l'employé, son statut et redirection vers sa page
                    $_SESSION['matricule'] = $rowlibelle['matricule'];
                    $_SESSION['verif'] = "assistant";
                    header("location: ./accueil.php");
                }
            }
            // Si l'utilisateur à pas envoyé login et mdp
            else
            {
                // Etat de connexion qui veux dire 0 (non connecté) et 1 (connecté)
                $etat_connexion = 0;
            }
        }
        ?>

        <div class="container-contact100">
            <div class="wrap-contact100" >
                <form class="contact100-form validate-form" action="index.php" method="post" autocomplete="off">
                    <span class="contact100-form-title">
                        Connexion
                    </span>
 
                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Identifiant</span>
                        <input class="input100" type="text" name="Utilisateur" id="Utilisateur" placeholder="Entrer votre nom d'utilisateur" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <span class="label-input100">Mot de passe</span>
                        <input class="input100" type="password" name="mdp" id="mdp" placeholder="Entrer votre mot de passe" required>
                        <span class="focus-input100"></span>
                    </div>

                    <?php
                    // Si la variable etat_connexion existe ce qui veux dire qu'il n'est pas connecté ou qu'il s'est trompé dans ses informations
                    if (isset($etat_connexion))
                    {
                        // Partie où on fait apparaitre un message d'erreur et ce message d'erreur va disparaitre tout seul
                    ?>
                    <script> 
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                        }, 2000);
                    </script>
                    <div class="alert alert-danger col-12" role="alert" style="text-align:center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Nom d'utilisateur/mot de passe incorrect
                    </div>
                    <?php
                    }
                    ?>
                    <div class="container-contact100-form-btn">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn">
                                <span>
                                    Se connecter
                                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
                <br>
                <div class ="container" style="text-align:right">
                    <font size="-1">Sponsorised by   <a href = "https://lapiraterieofficiel.com/"><img src="images/i.png" height="50" width="60" /></a></font>
                </div>
            </div>
        </div>
    </body>
</html>
