<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php 
        include('./include/header.html'); 
        include('./include/verif.php'); 
        ?>
    </head>

    <body>
        <?php
        session_start();
        
        verifConnecte();
        verifAssistant();
        
        //Connexion a la BDD
        $bdd = mysqli_connect("localhost","assistant","assistant","cashcash");
        ?>

        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form" action="accueil.php" method="post">
                    <span class="contact100-form-title">
                        <?php
                        //Requete pour récupérer les informations de l'utilisateur
                        $reqlibelle = "SELECT nom, prenom, code_region FROM assistant WHERE matricule = ".$_SESSION['matricule'];
                        //Execute la requete
                        $resultlibelle=mysqli_query($bdd,$reqlibelle);
                        $rowlibelle = $resultlibelle->fetch_array(MYSQLI_ASSOC);
                        
                        echo strtoupper($rowlibelle['nom']." ");
                        echo $rowlibelle['prenom'];
                        $_SESSION['code_region'] = $rowlibelle['code_region'];

                        $date = date('Y-m-d');
                        //Récupére les contrat
                        $sql = "SELECT DISTINCT cm.date_echeance, cm.numero_client, DATEDIFF(date_echeance, NOW()) as date FROM contrat_maintenance cm, assistant a, client c, region r, agence ag WHERE cm.numero_client = c.numero_client AND a.code_region = r.code_region AND ag.code_region = r.code_region AND ag.numero_agence = c.numero_agence AND r.code_region = ".$_SESSION['code_region'];
                        $donnees = mysqli_query($bdd, $sql);
                        $nombrecontrat = mysqli_num_rows($donnees);
                        $count = 0;

                        $num_client = array();

                        foreach ($donnees as $row)
                        {
                            /*$date1 = new DateTime ($date);
                            $date2 = new DateTime ($row["date_echeance"]);
                            $diff = $date1 -> diff($date2);
                            $datediff = $diff->format('%a jours');
                            if ($datediff <= 30)
                            {
                                $count ++;
                                $num_client[] = $row['numero_client'];
                            }*/
                            //Récupere le nombre de contrat qui arrive a échéance
                            if ($row['date'] > 0 && $row['date'] <= 30)
                            {
                                $count ++;
                                $num_client[] = $row['numero_client'];
                            }
                        }
                        ?>
                    </span>
                    <center>
                        <!-- Affichage des bouttons -->
                        <button style="width:200px;"  type="submit" formaction="./fiche_client.php" class="btn btn-primary" name = 'acceuil'>Fiche Client</button> 
                        <br>
                        <br>
                        <button style="width:200px;"  type="submit" formaction="./affecter_intervention.php" class="btn btn-primary" name = 'acceuil'>Affecter Intervention</button> 
                        <br>
                        <br>
                        <button style="width:200px;"  type="submit" formaction="./consulter_intervention.php" class="btn btn-primary" name = 'acceuil'>Consulter Intervention</button> 
                        <br>
                        <br>
                        <button style="width:200px;"  type="submit" formaction="./statistique.php" class="btn btn-primary" name = 'acceuil'>Statistiques</button> 
                        <br>
                        <br>
                        <?php
                        //Affiche le nombre de contrat arrivé a échéance si il est supérieur a 1
                        if ($count != 0)
                        {
                        ?>
                        <button style="width:300px;"  type="submit" class="btn btn-primary" name = 'contrat'>⚠ Contrat arrivé a échéance : <span class="badge badge-light"><?php echo $count; ?></span></button> 
                        <?php
                        }

                        if (isset ($_POST['contrat']))
                        {
                        ?>
                    </center>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Contrat arrivé a échéance</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class= "container">
                                                <?php
                            //Récupération des informations pour les contrat arrivent a échéance
                            foreach($num_client as $num) 
                            {  
                                $reqclient = "SELECT nom, prenom FROM client WHERE numero_client = ".$num;
                                $resultclient = mysqli_query($bdd, $reqclient);   
                                foreach ($resultclient as $row)
                                {
                                                ?>   
                                                <div class="form-group row wrap-input100 validate-input">
                                                    <div class="col">
                                                        <?php    
                                    //Affiche les informations
                                    echo "Numéro client : ".$num;
                                    echo ", Nom : ".$row['nom'];
                                    echo ", Prénom : ".$row['prenom']."<br>";
                                                        ?>
                                                    </div>
                                                </div>
                                                <span class="glyphicon glyphicon-time"></span><?php
                                }
                            }
                                                ?>

                                                <span class="glyphicon glyphicon-time"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a href = "./accueil.php"><button type="button" class="btn btn-secondary">Fermer</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>



                    <br>

                    <br>


                    <button style="float:right;width:150px;" type="submit" class="btn btn-primary" name = 'deconnexion' formaction = "deconnexion.php"> Déconnexion</button>
                </form>
            </div>

        </div>

    </body>
</html>