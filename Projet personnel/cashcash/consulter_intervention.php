<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php
        session_start();
        include('./include/header.html'); 
        include('./include/verif.php'); 
        verifConnecte();
        verifAssistant();

        ?>
    </head>

    <body>
        <?php
        //Connexion a la BDD
        $bdd = mysqli_connect ('localhost', 'assistant', 'assistant', "cashcash");
        $tabClient = [[]];

        if (isset($_POST['editer']))
        {
            if(isset($_POST['liste_inter']))
            {
                //Récupère les informations des interventions 
                $infovisite = explode (" ", $_POST['liste_inter']);
                $nom_client = $infovisite[0];
                $prenom_client = $infovisite[1];
                $date_inter = $infovisite[2];
                $heure_inter = $infovisite[3];
                $_SESSION['nom_client'] = $nom_client;
                $_SESSION['prenom_client'] = $prenom_client;
                $_SESSION['date_inter'] = $date_inter;
                $_SESSION['heure_inter'] = $heure_inter;

                //Requete
                $reqnuminter = "SELECT numero_intervention, matricule_technicien, numero_client FROM intervention WHERE date_visite = '".$date_inter."' AND heure_visite = '".$heure_inter."' AND numero_client = (SELECT numero_client FROM client WHERE nom = \"".$nom_client."\" AND prenom = \"".$prenom_client."\")";
                $resultnuminter = mysqli_query($bdd, $reqnuminter);
                $rownuminter = $resultnuminter->fetch_array(MYSQLI_ASSOC);
                $_SESSION['num_inter'] = $rownuminter['numero_intervention'];
                $_SESSION['matricule_technicien1'] = $rownuminter['matricule_technicien'];
                $_SESSION['numClient'] = $rownuminter['numero_client'];

                echo $_SESSION['matricule_technicien1'];
        ?>
        <script type="text/javascript">
            //Affiche le modal
            $(document).ready(function(){
                $("#myModal").modal('show');
            });
        </script>

        <!-- Code pour le modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-show="true" data-keyboard = "false" data-backdrop = "static">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <form class="contact100-form validate-form" method="post" action="consulter_intervention.php" autocomplete="off">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Intervention</h5>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nom</label>
                                <input type="text" name = "nom_client1" class="form-control col-md-4" id="formGroupExampleInput" value = "<?php echo $nom_client; ?>">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Prénom</label>
                                <input type="text" name = "prenom_client1" class="form-control col-md-4" id="formGroupExampleInput" value = "<?php echo $prenom_client; ?>">
                            </div>
                            <label for="date_levee">Date de la visite </label>
                            <div class='input100 date' id='datelevee' name="datelevee">
                                <div style= "margin-left: 0px">
                                    <input id="datepicker" name="datelevee1" width="155px" value = "<?php echo $date_inter ?>"/>
                                    <script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4',
                                            format: 'yyyy-mm-dd'
                                        });
                                    </script>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Heure de la visite</label>
                                <input type="time" name = "heure_visite1" class="form-control col-md-4" id="formGroupExampleInput" value = "<?php echo $heure_inter ?>">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <a target = "_blank" href = "./fpdf/pdf.php"><button type = "button" class="btn btn-primary">Transformer en PDF</button></a>
                            <button type="submit" class="btn btn-primary"  name = "editer1">Editer fiche</button>
                            <a href = "./consulter_intervention.php"><button type="button" class="btn btn-secondary">Close</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php 
            }
            if (!isset($_POST["liste_inter"]))
            {
        ?>

        <script type="text/javascript">
            alert("Pas d'intervention sélectionné");
            document.location.href = './consulter_intervention.php';
        </script>
        <?php
            }
        }
        if (isset($_POST['editer1']))
        {
            //Met a jours les informations dans la BDD
            $requp = "UPDATE intervention SET date_visite = '".$_POST['datelevee1']."', heure_visite = \"".$_POST['heure_visite1']."\" WHERE numero_intervention = ".$_SESSION['num_inter'];
            $requp1 = "UPDATE client SET nom = '".$_POST['nom_client1']."', prenom = '".$_POST['prenom_client1']."' WHERE numero_client = ".$_SESSION['numClient'];
            mysqli_query ($bdd, $requp);
            mysqli_query ($bdd, $requp1);

        }
        ?>

        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form" method="post" action="consulter_intervention.php" autocomplete="off">
                    <span class="contact100-form-title">
                        Interventions
                    </span>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="date_levee">Date</label>
                            <div class='input100 date' id='datelevee' name="datelevee">
                                <div style= "margin-left: 0px">
                                    <input id="datepicker" name="datelevee" width="155px"/>
                                    <script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4',
                                            format: 'yyyy-mm-dd'
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Technicien</label>
                            <input list = "result-search" class = "form-control" type = "text" id = "search-user" placeholder="Nom du technicien" name = "technicien">
                            <datalist id="result-search">
                            </datalist>
                        </div>

                        <br>
                        <br>
                        <?php
                        // Si on appuie sur le bouton rechercher
                        if (isset($_POST['valider']))
                        {
                            // Si on sélectionne une date et aucun technicien est sélectionné
                            if ($_POST['datelevee'] != '' && $_POST['technicien'] == "")
                            {
                        ?>
                        <br>
                        <br>
                        <div class="col-12" id = "select">
                            <span class="label-input100">Interventions</span>

                            <select multiple class="form-control col-12" size = 5  name = "liste_inter" id = "search">
                                <?php
                                //Requete
                                $reqvisite = "SELECT i.*, c.nom, c.prenom, t.nom as nom_tech, t.prenom as prenom_tech FROM intervention i, client c, technicien t, assistant a, agence ag WHERE c.numero_client = i.numero_client and i.matricule_technicien=t.matricule and t.numero_agence = ag.numero_agence and ag.code_region= a.code_region and i.statut = 0 and  i.date_visite = '".$_POST['datelevee']."' and a.code_region = ".$_SESSION['code_region']." ORDER BY i.numero_intervention asc";
                                $reponse = mysqli_query($bdd, $reqvisite);
                                foreach($reponse as $row)
                                {
                                    //Affiche les informations des interventions
                                    echo "<option>".$row['nom']." ".$row['prenom']." ".$row['date_visite']." ".$row['heure_visite']." ".$row['nom_tech']." ".$row['prenom_tech']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <?php 
                            }
                            // Si on sélectionne un technicien et aucune date est sélectionné
                            if ($_POST['technicien'] != "" && $_POST['datelevee'] == '')
                            {
                        ?>
                        <div class="col-12" id = "select">
                            <span class="label-input100">Interventions</span>

                            <select multiple class="form-control col-12" data-live-search="true" size = 5  name = "liste_inter" id = "search">
                                <?php
                                $infotech = explode (" ", $_POST['technicien']);
                                $nom_tech = $infotech[0];
                                $prenom_tech = $infotech[1];
                                $reqvisite = "SELECT c.nom, c.prenom, i.* FROM client c, technicien t, intervention i WHERE t.matricule = i.matricule_technicien AND i.numero_client = c.numero_client AND t.nom = \"".$nom_tech."\" AND t.prenom = \"".$prenom_tech."\" AND i.statut = 0 ";
                                $reponse = mysqli_query($bdd, $reqvisite);
                                foreach($reponse as $row)
                                {
                                    //Affiche les information des interventions
                                    echo "<option>".$row['nom']." ".$row['prenom']." ".$row['date_visite']." ".$row['heure_visite']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                            }
                            // Si aucun technicien et aucune date sont sélectionné
                            if ($_POST['technicien'] == "" && $_POST['datelevee'] == '')
                            {
                        ?>

                        <script type="text/javascript">
                            alert("Il n'y a pas de date ou de technicien sélectionné");
                            document.location.href = './consulter_intervention.php';
                        </script>
                        <?php
                            }
                            // Si un technicien et une date sont sélectionné
                            if ($_POST['technicien'] != "" && $_POST['datelevee'] != "")
                            {
                        ?>
                        <div class="col-12" id = "select">
                            <span class="label-input100">Interventions</span>

                            <select multiple class="form-control col-12" id="exampleFormControlSelect2" data-live-search="true" size = 5  name = "liste_inter" id = "search">
                                <?php
                                $infotech = explode (" ", $_POST['technicien']);
                                $nom_tech = $infotech[0];
                                $prenom_tech = $infotech[1];
                                $_SESSION['nom_tech'] = $nom_tech;
                                $_SESSION['prenom_tech'] = $prenom_tech;
                                //Requete
                                $reqvisite = "SELECT c.nom, c.prenom, i.* FROM client c, technicien t, intervention i WHERE t.matricule = i.matricule_technicien AND i.numero_client = c.numero_client AND t.nom = \"".$nom_tech."\" AND t.prenom = \"".$prenom_tech."\" AND date_visite = '".$_POST['datelevee']."' AND i.statut = 0 ";
                                $reponse = mysqli_query($bdd, $reqvisite);
                                foreach($reponse as $row)
                                {
                                    //Affiche les informations des interventions
                                    echo "<option>".$row['nom']." ".$row['prenom']." ".$row['date_visite']." ".$row['heure_visite']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                            }
                        ?>
                        <div class = "row" id = "btn_editer"> 
                            <div class = "col-md-12">
                                <br>
                                <button style="width:200px;" type="submit" class="btn btn-primary offset-md-6" name = "editer">Editer fiche intervention</button>
                            </div>
                        </div>
                        <?php
                            //Si la requête retourne rien (ce que veux dire qu'il existe pas d'intervention)
                            if (!isset($row['numero_intervention']))
                            {
                        ?>
                        <script>  
                            //Cache les bouttons si la requete ne retourne rien
                            $('#select').attr('hidden', 'true'); 
                            $('#btn_editer').attr('hidden', 'true'); 

                            window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                        </script>
                        <div class="alert alert-danger col-12" role="alert" style="text-align:center">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Erreur</strong>, Pas d'intervention existant !
                        </div>
                        <?php
                            }

                        }

                        if (isset($_POST['editer1']))
                        {
                        ?>
                        <script>
                            window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                        </script>
                        <br>
                        <br>
                        <div class="alert alert-primary col-12" role="alert" style="text-align:center" id = "alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Fiche intervention n°<?php echo $_SESSION['num_inter']; ?> modifiée !
                        </div>
                        <?php
                        }
                        ?>
                        <br>
                        <br>
                        <br>
                        <div class="container-contact100-form-btn col-md-12 validate-input wrap-input100">
                            <div class="wrap-contact100-form-btn">
                                <div class="contact100-form-bgbtn"></div>
                                <button type="submit" class="contact100-form-btn" name="valider">
                                    <span>
                                        Rechercher
                                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <span class="focus-input100"></span>
                    </div>
                </form>
                <button style="width:150px;"  type="submit" onclick="self.location.href='./accueil.php'" class="btn btn-primary" name = 'acceuil'> Accueil</button>
                <button style="float:right;width:150px;" onclick="self.location.href='./deconnexion.php'"  type="submit" class="btn btn-primary" name = 'deconnexion'> Déconnexion</button>
            </div>
        </div>




        <script>
            $(document).ready(function()
                              {
                //Récupère les input dans le champ de saisie
                $('#search-user').keyup(function(){
                    $('#result-search').html('');
                    //Récupére la valeur entrée
                    var technicien = $(this).val();
                    if (technicien != "")
                    {
                        $.ajax({
                            type: "GET",
                            //envoi la requete ajax
                            url: "./ajax.php",
                            //Passage du technicien par URL
                            data: "technicien=" + encodeURIComponent(technicien),
                            success: function (data){
                                if (data != "")
                                {
                                    //Affiche le resultat 
                                    $('#result-search').append(data);
                                }
                                else
                                {
                                    //Affiche une erreur si la réponse est vide
                                    document.getElementById('result-search').innerHTML = "<option> Aucun Utilisateur </option>"
                                }
                            }
                        })                         
                    }
                }); 
            });
        </script>
    </body>
</html>