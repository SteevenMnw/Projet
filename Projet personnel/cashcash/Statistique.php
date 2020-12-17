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
                <form class="contact100-form validate-form" action="statistique.php" method="post">
                    <span class="contact100-form-title">
                        Statistiques
                    </span>
                    <div class="container col-10" id = "technicien" hidden = "true">
                        <center>
                            <?php
                            setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                            
                            // ucfirst pour mettre la première lettre en Majuscule, strftime transformer les chiffres en date car strotime retourne la date en valeur ex : 1583020800 pour 2020-03
                            $date = ucfirst(strftime("%B %Y", strtotime($_POST['date'])));
                            ?>
                            
                            <!--echo le technicien et la date-->
                            <h5 class="bg-light border border-primary"><?php echo $_POST['choixtech']; ?><br><?php echo $date; ?></h5> 
                        </center>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Name is required" id = "choix" >
                        <span class="label-input100">Technicien</span>
                        <select class="form-control col-12" id="exampleFormControlSelect2" name = "choixtech" required>
                            
                            <!-- selected disabled value sert à sélectionner cette valeur par défaut mais qu'elle n'est pas de valeur comme ça l'utilisateur sera obligé de changer cette valeur pour valider-->
                            <option selected disabled value="">Choisissez un technicien</option> 
                            <?php
                            $reqvisite = "SELECT t.nom, t.prenom, t.numero_agence FROM technicien t, assistant a, agence ag, region r WHERE  t.numero_agence = ag.numero_agence and ag.code_region = r.code_region and a.code_region = r.code_region and a.code_region = 1";
                            $resultatvisite = mysqli_query($bdd, $reqvisite);
                            foreach ($resultatvisite as $rowclient)
                            {
                                echo "<option>".$rowclient['nom']." ".$rowclient['prenom']."</option>";
                            }
                            ?> <!--ce qui précède ce comentaire sert a rechercher les différents technicien et de les insérer dans le select-->
                        </select>
                    </div>
                    <div class='input100 date' id='moisannee'>
                        <span class="label-input100">Choisissez le mois et l'année</span>
                        <div style= "margin-left: 0px">
                            <input id="datepicker" name="date" width="150px" required/>
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4',
                                    format: 'yyyy-mm'
                                });
                            </script>
                            <span class="glyphicon glyphicon-time"></span>
                        </div>
                    </div><br>
                    <div class="container-contact100-form-btn"  id = "boutton">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" name="valider">
                                <span>
                                    Envoyer
                                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <?php 
                    if(isset($_POST['valider']))
                    {
                    ?>
                    
                    <!-- ça à le rôle de tout effacer(mettre invisible) pour afficher la suite, c'est comme si on allait sur une nouvelle page-->
                    <script type="text/javascript">
                        $("#choix").attr("hidden", "true");
                        $("#moisannee").attr("hidden", "true");
                        $("#boutton").attr("hidden", "true");
                        $("#technicien").removeAttr('hidden');

                    </script>
                    <span class="label-input100">Nombre d'Intervention du technicien : </span>
                    <?php
                        
                        // explode demande en premier parametre le delimiter(ce qui sépare chaque mot par exemple) et en deuxieme la variable
                        $infovisite = explode (" ", $_POST['choixtech']); 
                        $nom = $infovisite[0];
                        $prenom = $infovisite[1];
                        $date = $_POST['date'];
                        
                        //list a entre parenthese des variable qui auront pour résultat ce qui sera "explode" de $date
                        list($a,$m)=explode("-",$date);
                        $reqmoisannee = "SELECT count(*) FROM intervention i, technicien t WHERE i.matricule_technicien = t.matricule and t.nom = \"".$nom."\" and t.prenom = \"".$prenom."\" and Month(`date_visite`) = \"".$m."\" and year(`date_visite`) = \"".$a."\" and i.statut = 1";
                        
                        // Execution de requete
                        $resultstat = mysqli_query($bdd, $reqmoisannee);
                        
                        // Retourne la ligne du résultat dans un tableau
                        $rowstat = $resultstat->fetch_array(MYSQLI_ASSOC);
                        echo $rowstat['count(*)'];
                    ?>
                    <br>
                    <br>
                    <br>

                    <div class="validate-input" data-validate="Name is required">
                        <span class="label-input100">Nombre de kilomètres parcourus : </span>
                        <?php
                        $reqkm = "SELECT sum(c.distance_km) as ckm FROM intervention i, client c, technicien t WHERE i.numero_client = c.numero_client and i.matricule_technicien = t.matricule and t.nom = \"".$nom."\" and t.prenom = \"".$prenom."\" and Month(`date_visite`) = \"".$m."\" and year(`date_visite`) = \"".$a."\" and i.statut = 1";
                        
                        // Execution de requete
                        $resultstat = mysqli_query($bdd, $reqkm);
                        
                        // Retourne la ligne du résultat dans un tableau
                        $rowstat = $resultstat->fetch_array(MYSQLI_ASSOC);
                        if (!isset ($rowstat['ckm'])){
                            echo 0;
                        }
                        else {
                            echo $rowstat['ckm'];
                        }
                        ?>
                        <br>
                        <br>
                        <br>
                    </div>

                    <span class="label-input100">Temps contrôler matériel (en heures et en minutes) : </span>
                    <?php
                        $reqheure = "SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( temps_passer ) ) ) AS temps_passees 
                        FROM intervention i, technicien t, controler co 
                        WHERE i.numero_intervention = co.numero_intervention 
                        and i.matricule_technicien = t.matricule 
                        and t.nom = \"".$nom."\" 
                        and t.prenom = \"".$prenom."\" 
                        and Month(`date_visite`) = \"".$m."\" 
                        and year(`date_visite`) = \"".$a."\" 
                        and i.statut = 1";
                        
                        // Execution de requete
                        $resultstat = mysqli_query($bdd, $reqheure);
                        
                        // Retourne la ligne du résultat dans un tableau
                        $rowstat = $resultstat->fetch_array(MYSQLI_ASSOC);
                        if (!isset ($rowstat['temps_passees']))
                        {
                            echo "00:00";
                        }
                        else
                        {
                            $heure = explode (":", $rowstat['temps_passees']);
                            echo $heure[0].":".$heure[1];
                        }
                    ?>
                    <br>
                    <br>
                    <br>
                    <center><button style="float:center;"  type="submit" onclick="self.location.href='./statistique.php'" class="btn btn-primary" name = 'statistique'>Revenir au menu Statistique</button></center>
                    <?php
                    }
                    ?>
                    <br>
                </form>
                <button style="width:150px;"  type="submit" onclick="self.location.href='./accueil.php'" class="btn btn-primary" name = 'accueil'>Accueil</button>
                <button style="float:right;width:150px;" onclick="self.location.href='./deconnexion.php'"  type="submit" class="btn btn-primary" name = 'deconnexion'>Déconnexion</button>
            </div>
        </div>
    </body>
</html>