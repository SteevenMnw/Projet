<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php
        session_start();
        //Importe les éléments css et bootstrap
        include('./include/header.html');
        
        include('./include/verif.php'); 
        
        //Vérifie quel type d'utilisateur est connecté, assistant ou technicien
        verifConnecte();
        verifAssistant();
        ?>
    </head>

    <body>

        <div class="container-contact100">
            <div class="wrap-contact100">

                <form class="contact100-form validate-form" method="post" action="fiche_client.php" autocomplete="off">
                    <span class="contact100-form-title">
                        Recherche d'une Fiche Client
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Rechercher une fiche client</span>
                        <input class="input100" type="number" name="numero_client" id="Fiche_Client" placeholder="Entrer un numero client" min = 0>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-contact100-form-btn">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button type="submit" class="contact100-form-btn" name="recherche">
                                <span>
                                    Rechercher
                                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    
                    <?php
                    //Connexion a la base de donnée
                    $base = mysqli_connect ('localhost', 'assistant', 'assistant', "cashcash"); 
                    if (isset ($_POST['recherche'])){

                        //Récupère le numéro client saisie 
                        $numero_client = $_POST['numero_client'];
                        
                        //Exécute la requete
                        $test = mysqli_query($base, "SELECT numero_client FROM client WHERE numero_client = $numero_client");
                        $row = $test->fetch_array(MYSQLI_ASSOC);
                        if (isset($row['numero_client'])){
                            //Execute une requete pour récupérer toutes les informations d'un client
                            $reponse = mysqli_query($base, "SELECT * FROM client WHERE numero_client = $numero_client");
                            $donnees =  mysqli_fetch_array($reponse);


                    ?>
                
                    <script type="text/javascript">
                        //Affiche le modal
                        $(document).ready(function(){
                            $("#myModal").modal('show');
                        });
                    </script>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-show="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Visite</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class= "container">

                                                <?php

                            //Sélectionne tous les noms des colonnes de la table Client 
                            $select = "SHOW COLUMNS FROM client";
                            $donnees1 = mysqli_query($base, $select);

                            //Pour chaque résultat de la requete on affiche un div avec un input avec un label, name et value avec le nom de la colonne qu'on a pris avec la requete d'avant
                            foreach ($donnees1 as $row)
                            {
                                                ?>
                                                <div class="form-group row wrap-input100 validate-input">
                                                    <label class="col-form-label"> <?php echo $row['Field'];  ?> </label>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="" name = "<?php echo $row['Field']; ?>" value = "<?php echo $donnees[$row['Field']];?>">
                                                    </div>
                                                </div>
                                                <span class="glyphicon glyphicon-time"></span>
                                                <?php

                            }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name = "editer1">Editer fiche</button>
                                    <a href = "./fiche_client.php"><button type="button" class="btn btn-secondary">Close</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        else {
                    ?>
                    <script>   
                        $('#select').attr('hidden', 'true'); 
                        $('#btn_editer').attr('hidden', 'true'); 

                        //Fait disparaitre l'alert au bout d'un temps définie
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                        }, 2000);
                    </script>
                    <br>
                    <div class="alert alert-danger col-12" role="alert" style="text-align:center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Numero client incorrect
                    </div>
                    <?php
                        }
                    }
                    ?>


                    <?php

                    if (isset($_POST['editer1']))
                    {
                        //Récupération des informations
                        $numero_client = $_POST['numero_client'];
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $raison_sociale = $_POST['raison_sociale'];
                        $siren = $_POST['siren'];
                        $code_APE = $_POST['code_APE'];
                        $adresse = $_POST['adresse'];
                        $telephone = $_POST['telephone'];
                        $fax = $_POST['fax'];
                        $email = $_POST['email'];
                        $duree_deplacement = $_POST['duree_deplacement'];
                        $distance_km = $_POST['distance_km'];
                        $numero_agence = $_POST['numero_agence'];

                        $sql = "UPDATE client SET nom = \"".$nom."\", prenom = \"".$prenom."\", raison_sociale = \"".$raison_sociale."\", siren = \"".$siren."\", code_APE = \"".$code_APE."\", adresse = \"".$adresse."\", telephone = \"".$telephone."\", fax = \"".$fax."\", email = \"".$email."\", duree_deplacement = \"".$duree_deplacement."\", distance_km = ".$distance_km.", numero_agence = ".$numero_agence." WHERE numero_client = ".$numero_client."";
                        
                        //Execute la requete
                        mysqli_query($base, $sql);

                    ?>
                    <script>
                        //Fait disparaitre l'alert au bout d'un temps définie
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                        }, 2000);
                    </script>
                    <br>
                    <!-- Affiche un message pour confirmer la modification -->
                    <div class="alert alert-primary col-12" role="alert" style="text-align:center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Changement effectué pour le client n° <?php echo $numero_client; ?>
                    </div>
                    <?php
                    }


                    ?>
                    <br><br>
                </form>
                <!-- Affiche les bouttons accueil et déconnexion -->
                <button style="width:150px;"  type="submit" onclick="self.location.href='./accueil.php'" class="btn btn-primary" name = 'acceuil'> Accueil</button>
                <button style="float:right;width:150px;" onclick="self.location.href='./deconnexion.php'"  type="submit" class="btn btn-primary" name = 'deconnexion'> Déconnexion</button>
            </div>
        </div>
    </body>
</html>