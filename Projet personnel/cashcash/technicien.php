<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php
        session_start();
        include('./include/header.html');  
        include('./include/verif.php'); 

        verifConnecte();
        verifTechnicien();
        ?>
    </head>

    <body>
        <?php
        // Connexion à la bdd en mode technicien
        $bdd = mysqli_connect("localhost","technicien","technicien","cashcash");

        // Si l'utilisateur à choisi une intervention et qu'il a appuyé sur le bouton visualiser
        if(isset($_POST['visualiser']) && isset($_POST['liste_visite']))
        {
            // Stockage dans une variable session l'intervention choisi par le technicien
            $visite = $_POST['liste_visite']; 
            $_SESSION['visite'] = $visite;

            // On explose la variable de l'intervention
            $infovisite = explode (" ", $_SESSION['visite']);
            // Stockage des différentes infos de la visite dans différentes variables
            $nom_client = $infovisite[0];
            $prenom_client = $infovisite[1];
            $date_inter = $infovisite[2];
            $heure_inter = $infovisite[3];
            
            // Requête qui permet de tout sélectionner dans la table client par rapport au nom et prénom du client
            $reqclient = "SELECT * FROM client WHERE nom = \"".$nom_client."\" and prenom = \"".$prenom_client."\"";
            // Exécution de la requête
            $resultclient=mysqli_query($bdd,$reqclient);
            // Retourne la ligne du résultat sous la forme d'un tableau
            $rowclient = $resultclient->fetch_array(MYSQLI_ASSOC);



        ?>
        <script type="text/javascript">
            // fonction pour montrer le modal
            $(document).ready(function(){
                $("#myModal").modal('show');
            });
        </script>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-show="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Visite du Client n°<?php echo $rowclient['numero_client']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label><u>Nom</u> : </label> <?php echo $rowclient['nom']; ?> <br>
                        <label><u>Prénom</u> : </label> <?php echo $rowclient['prenom']; ?> <br>
                        <label><u>Adresse</u> : </label> <?php echo $rowclient['adresse']; ?> <br>
                        <label><u>Téléphone</u> : </label> <?php echo $rowclient['telephone']; ?> <br>
                        <label><u>Email</u> : </label> <?php echo $rowclient['email']; ?> <br>
                        <label><u>Date de la visite</u> : </label> <?php echo $date_inter; ?> <br>
                        <label><u>Heure de la visite</u> : </label> <?php echo $heure_inter; ?> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        }

        // Si le technicien à choisi une intervention et il a appuyé sur le bouton valider
        if (isset($_POST['valider']) && isset($_POST['liste_visite']))
        {
            // Stockage dans une variable session l'intervention
            $visite = $_POST['liste_visite']; 
            $_SESSION['visite'] = $visite;

            // Explose la variable de l'intervention
            $infovisite = explode (" ", $_SESSION['visite']);
            // Stockage des différentes informations de la visite dans différentes variables
            $nom_client = $infovisite[0];
            $prenom_client = $infovisite[1];
            $date_inter = $infovisite[2];
            $heure_inter = $infovisite[3];

            // Requête qui sélectionne le numéro du client par rapport au nom et au prénom du client
            $idclient = "SELECT numero_client FROM client WHERE nom =\"".$nom_client."\" and prenom =\"".$prenom_client."\"";
            // Exécution de la requête
            $resultidclient=mysqli_query($bdd,$idclient);
            // Retourne la ligne du résultat sous la forme d'un tableau
            $rowidclient = $resultidclient->fetch_array(MYSQLI_ASSOC);
            // Stockage dans une variable session le numéro client
            $_SESSION['id_client'] = $rowidclient['numero_client'];

            // Requête qui sélectionne le numero de l'intervention par rapport au numero client, à la date et l'heure de la visite
            $idintervention = "SELECT numero_intervention FROM intervention WHERE date_visite = \"".$date_inter."\" and heure_visite = \"".$heure_inter."\" and numero_client = \"".$_SESSION['id_client']."\"";
            // Exécute de la requête
            $resultidinter=mysqli_query($bdd,$idintervention);
            // Retourne la ligne du résultat sous la forme d'un tableau
            $rowidinter = $resultidinter->fetch_array(MYSQLI_ASSOC);
            // Stockage dans une variable session le numero intervention
            $_SESSION['id_intervention'] = $rowidinter['numero_intervention'];

        }


        ?>

        <div class="container-contact100">
            <div class="wrap-contact100" >
                <span class="contact100-form-title">
                    <?php
                    
                    // Requête qui sélectionne nom et prénom du tehcnicien par rapport au matricule
                    $reqlibelle = "SELECT nom, prenom FROM technicien WHERE matricule = ".$_SESSION['matricule'];
                    // Exécution de la requête
                    $resultlibelle=mysqli_query($bdd,$reqlibelle);
                    // Retourne la ligne du résultat sous la forme d'un tableau
                    $rowlibelle = $resultlibelle->fetch_array(MYSQLI_ASSOC);
                    
                    // Affiche le nom en majuscule et le prénom du technicien
                    echo strtoupper($rowlibelle['nom']." ");
                    echo $rowlibelle['prenom'];


                    ?>
                </span>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Visites affectées</span>

                    <form class="contact100-form validate-form" action="technicien.php" method="post" style ="display: inline;" >
                        <select multiple class="form-control col-12" id="exampleFormControlSelect2" size = 5  name = "liste_visite" id = "search" required>
                            <?php
                            // Requête qui sélection toutes les infos de l'interventon avec le nom et le prénom du client par rapport au matricule du technicien et au statut (0 si l'intervention n'est pas validé)
                            $reqvisite = "SELECT i.*, c.nom, c.prenom FROM intervention i, client c, technicien t WHERE i.matricule_technicien = t.matricule AND i.numero_client = c.numero_client AND matricule_technicien = ".$_SESSION['matricule'] ." AND statut = 0 ORDER BY date_visite";
                            // Execution de la requête
                            $donnees = mysqli_query($bdd, $reqvisite);
                            
                            // Pour chaque résultat de la requête
                            foreach ($donnees as $row)
                            {
                                // Affiche en option dans le select le nom et prénom du client, la date et l'heure de la visite
                                echo "<option>".$row['nom']." ".$row['prenom']." ".$row['date_visite']." ".$row['heure_visite']."</option>";
                            }

                            ?>
                        </select>
                        <br>
                        <button style="width:150px;" type="submit" class="btn btn-primary" name = "visualiser" data-toggle="modal" data-target="#exampleModal">Visualiser</button>

                        <button style="float:right;width:150px;" type="submit" class="btn btn-primary" value = 1 name = 'valider'> Valider</button>
                    </form>

                    <span class="focus-input100"></span>
                </div>

                <?php     
                // Si l'utilisateur à appuyé sur le bouton valider_nb_materiel (nb de matériels à examiner) ou valider2 (infos des différents matériels)  
                if (isset($_POST['valider_nb_materiel']) || isset($_POST['valider2']))
                {
                    // Si le nombre de maétriel est envoyé par le technicien
                    if (isset($_POST['valider_nb_materiel']))
                    {
                        // Stockage dans des varaibles session les différentes variables, total (équivaux à 0 au début), nombre (nb de matériels examiné)
                        $_SESSION['total'] = $_POST['total'];
                        $_SESSION['nombre'] = $_POST['nombre'];
                    }

                    // Si les infos des différents matériels sont envoyé par l'utilisateur
                    if (isset($_POST["valider2"]))
                    {
                        // A chaque fois qui valide un matériel ça ajoute + 1 sur le nombre total
                        $_SESSION['total'] = $_SESSION['total'] + $_POST['valider2'];
                    }

                    // Si le numéro de série du matériel est envoyé
                    if (isset($_POST["numero_serie".($_SESSION['total']-1)]))
                    {
                        // Requête qui insert dans la bdd quand le technicien contrôle un matériel
                        $reqinsert = "INSERT INTO controler (numero_serie, numero_intervention, temps_passer, commentaire ) VALUES (".$_POST['numero_serie'.($_SESSION['total']-1)].", ".$_SESSION['id_intervention'].", \"".$_POST['temps_passes'.($_SESSION['total']-1)]."\", \"".$_POST['commentaire'.($_SESSION['total']-1)] ."\")";
                        // Exécution de la requête
                        mysqli_query($bdd, $reqinsert);

                        // Si total est égale à nombre (si le technicien à plus de matériels à contrôler)
                        if ($_SESSION['total'] == $_SESSION['nombre'])
                        {
                            // Requête qui modifie une ligne dans la bdd pour le mettre en statut 1 (1 = visite valider)
                            $requpdate = "UPDATE intervention SET statut = 1 WHERE numero_intervention = ".$_SESSION['id_intervention'];
                            // Exécution de la requête
                            mysqli_query($bdd, $requpdate);
                ?>
                <script>
                    // Recharge la page
                    document.location.reload(true);
                </script>
                <?php
                        }
                    }
                    
                    // Si total est plus petit que nombre (encore des matériels à verifier pour le techncien)
                    if ($_SESSION['total'] < $_SESSION['nombre'])
                    {
                ?>
                <div class="progress">

                    <div class="progress-bar" id = "mybar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>

                    <script type="text/javascript">
                        
                        // Code pour la barre de progression
                        var ordreMax = <?php echo $_SESSION['nombre'];?>;

                        var ordreActu = <?php echo $_SESSION['total'];?>;
                        $('#mybar').css("width",((100*ordreActu)/ordreMax)+"%").text(parseInt(((100*ordreActu)/ordreMax))+"%");

                    </script>

                </div>
                <form class="contact100-form validate-form" action="technicien.php" method="post">
                    <div class="form-group">
                        <label for="numero_serie">N° série</label>
                        <input type="number" class="form-control" id="numero_serie" name = "<?php echo "numero_serie".$_SESSION['total'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="temps_passes">Temps passés (hh:mm)</label>
                        <input type="time" class="form-control" id="temps_passes" placeholder="Ex : 10" name = "<?php echo "temps_passes".$_SESSION['total'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="commentaire">Commentaire(s)</label>
                        <textarea class="form-control" id="commentaire" rows="3" name = "<?php echo "commentaire".$_SESSION['total'];?>" required></textarea>
                    </div>
                    <br>
                    
                    <!-- Valeur caché pour valider les infos -->
                    <input type = hidden value = 1 name = "valider2">
                    <button style="width:125px;" type="submit" class="btn btn-primary" name = "valider_infos" >Valider</button>
                    <?php
                    }

                }
                    ?>

                </form>
                <?php
                ?>

                <?php
                // Si l'utilisateur à appuyé sur valider après avoir choisi l'intervention
                if (isset($_POST["valider"]))
                {?>
                <form class="contact100-form validate-form" action="technicien.php" method="post" style ="display: inline;" >
                    <div name="validervisite" id="validervisite" >
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="number">Matériel(s) vérifié(s) durant la visite effectuée : </label>
                                <input class="form-control" type="number" value="0" id="example-number-input" name = "nombre">
                                <br>
                                <input type = hidden value = 0 name = "total">
                                <button style="width:125px;" type="submit" class="btn btn-primary" name = "valider_nb_materiel">Valider</button>
                            </div>
                        </div>
                    </div>

                </form>
                <?php
                }
                ?> 
                <button style="float:right;width:150px;" onclick="self.location.href='./deconnexion.php'"  type="submit" class="btn btn-primary" name = 'deconnexion'> Déconnexion</button>
            </div>
            <br>
            <br>
        </div>
    </body>
</html>
