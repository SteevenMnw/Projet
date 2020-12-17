<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php
        session_start();
        include('./include/header.html'); 
        include('./include/verif.php'); 
        verifConnecte();
        verifAssistant();

        $bdd = mysqli_connect("localhost", 'assistant' , 'assistant', "cashcash");
        ?>
    </head>

    <body>
        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form" action="affecter_intervention.php" method="post" autocomplete="off">
                    <span class="contact100-form-title">
                        Affecter Intervention
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Name is required" id = "numclient">
                        <span class="label-input100">Numéro du Client</span>
                        <input class="input100" type="number" id = "NumClient" name="NumClient" placeholder="Entrer le numéro du Client" min = 0 required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-contact100-form-btn"  id = "bouton">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" type = "submit" name = "valider">
                                <span>
                                    Rechercher
                                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <?php


                    if(isset($_POST['valider']))
                    {

                        if (isset($_POST['NumClient']) && $_POST['NumClient'] != "" )
                        {
                    ?>
                    <script>
                        $('#NumClient').removeAttr('required');
                    </script>                    
                    <?php
                        }

                        $_SESSION['numClient'] = $_POST['NumClient'];

                        // Execution de requete
                        $test = mysqli_query($bdd, "SELECT numero_client FROM client WHERE numero_client = ".$_SESSION['numClient']);

                        // Retourne la ligne du résultat dans un tableau
                        $row = $test->fetch_array(MYSQLI_ASSOC);
                        if (isset($row['numero_client'])){
                    ?>

                    <!-- ça à le rôle de tout effacer(mettre invisible) pour afficher la suite, c'est comme si on allait sur une nouvelle page-->
                    <script type="text/javascript">
                        $("#numclient").attr("hidden", "true");
                        $("#bouton").attr("hidden", "true");
                    </script>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Matricule du Technicien</span>
                        <select class="form-control col-12" id="exampleFormControlSelect2" name = "MatTech" id = "search" required>
                            <option selected disabled value="">Choisissez un technicien</option>
                            <?php

                            $reqvisite = "SELECT t.nom,t.prenom FROM agence ag, technicien t, client c WHERE t.numero_agence = ag.numero_agence AND c.numero_agence = ag.numero_agence AND c.numero_client = ".$_POST['NumClient']."";

                            // Execution de requete
                            $resultatvisite = mysqli_query($bdd, $reqvisite);
                            foreach ($resultatvisite as $rowclient)
                            {
                                echo "<option>".$rowclient['nom']." ".$rowclient['prenom']."</option>";
                            }

                            ?>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <span class="label-input100">Date de visite</span>
                    <div class='input100 date' id='datelevee' name="datelevee">
                        <div style= "margin-left: 0px">
                            <input id="datepicker" name="DateVisite" width="160px" required/>
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4',
                                    format: 'yyyy-mm-dd'
                                });
                            </script>
                            <span class="glyphicon glyphicon-time"></span>
                        </div>
                    </div><br>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Heure de visite (hh:mm)</span>
                        <input class="input100" type="time" name="HeureVisite" id="Intervention" placeholder="Entrer l'heure de visite" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-contact100-form-btn">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" type = "submit" name = "valider2">
                                <span>
                                    Affecter
                                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <?php
                        }
                        else 
                        {
                    ?>

                    <!-- ça à le rôle de tout effacer(mettre invisible) pour afficher la suite, c'est comme si on allait sur une nouvelle page-->
                    <script>   
                        $('#select').attr('hidden', 'true'); 
                        $('#btn_editer').attr('hidden', 'true'); 

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




                    if(isset($_POST['valider2']))
                    {
                        // Explose la variable où il y a les infos de la visite
                        $infovisite = explode (" ", $_POST['MatTech']);
                        $nom_tech = $infovisite[0];
                        $prenom_tech = $infovisite[1];
                        $mat_tech = "Select matricule FROM technicien t WHERE nom = \"".$nom_tech."\" and prenom = \"".$prenom_tech."\"";

                        // Execution de requete
                        $resulttech = mysqli_query($bdd, $mat_tech);

                        // Retourne la ligne du résultat dans un tableau
                        $rowtech = $resulttech->fetch_array(MYSQLI_ASSOC); 
                        $matricule_tech= $rowtech['matricule'];
                        $_SESSION['matricule_technicien1'] = $matricule_tech;

                        // pour faire des rapports d'erreur(pour le trigger)
                        $driver = new mysqli_driver();

                        //Défini toutes les options (rapporte tout)
                        $driver->report_mode = MYSQLI_REPORT_ALL;

                        try 
                        {
                            $insert = "INSERT INTO intervention (`date_visite`, `heure_visite`, `matricule_technicien`, `numero_client`, statut) VALUES ('".$_POST['DateVisite']."','".$_POST['HeureVisite']."',".$matricule_tech.",".$_SESSION['numClient'].", 0)";

                            // Execution de requete
                            $insert = mysqli_query($bdd, $insert);
                    ?>

                    <br>
                    <div class="alert alert-primary col-12" role="alert" style="text-align:center" id = "alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Visite affectée au client n°<?php echo $_SESSION['numClient']; ?> pour le technicien <?php echo $nom_tech." ".$prenom_tech; ?>
                    </div>

                    <center><a target = "_blank" href = "./fpdf/pdf.php"><button type = "button" class="btn btn-primary">Fiche intervention pour le client n°<?php echo $_SESSION['numClient']; ?> en PDF</button></a></center>

                    <?php
                        }

                        // Attrape l'erreur si il en a une
                        catch (mysqli_sql_exception $e)
                        {
                    ?>
                    <br>
                    <div class="alert alert-danger col-12" role="alert" style="text-align:center" id = "alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Le client n°<?php echo $_SESSION['numClient']; ?> a déjà une intervention programmée !
                    </div>
                    <?php
                        }
                    }

                    ?>
                    <br>
                    <br>
                    <span class="glyphicon glyphicon-time"></span>
                </form>
                <button style="width:150px;"  type="submit" onclick="self.location.href='./accueil.php'" class="btn btn-primary" name = 'acceuil'> Accueil</button>
                <button style="float:right;width:150px;" onclick="self.location.href='./deconnexion.php'"  type="submit" class="btn btn-primary" name = 'deconnexion'> Déconnexion</button>
            </div>
        </div>
    </body>
</html>