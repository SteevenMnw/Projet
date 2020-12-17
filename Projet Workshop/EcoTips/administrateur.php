<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <?php 
        include('./header.html');
        include('./php/recupSigTips.php');
        include('./securite.php');
        VerifAdmin();
        
        ?>
    </head>
    <body>
        <a class="btn btn-primary btn-sm pull-left" href="index.php" role="button" aria-pressed="true">
            <span>
                Revenir à l'accueil
            </span>
        </a>
        <div class="container-login">
            <div class="d-flex h-100">
                <div class="centrer-simple">
                    <h1 class="fwhite"><br>
                        Page de l'Administrateur
                    </h1> 

                    <div class="d-flex row">
                        <div class="col-md-6 pt-2 pb-3">
                            <h2 class="fwhite border-bottom pb-3">Tips rapportés</h2>
                            <h5 class="fwhite pt-3">Voici la liste des utilisateurs rapportant un tips :</h5>
                            <div class="">

                                <table class="table table-hover table-striped fwhite table-dark mt-5"> 
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Titre tips</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach($dataTips as $tips){

                                        ?>  
                                        <tr class="table-data">
                                            <th scope="col"><?php echo $tips['id_tips'] ?> </th>
                                            <th scope="col"><?php echo $tips['nom'] ?> </th>
                                            <th scope="col"><?php echo $tips['prenom'] ?> </th>
                                            <th scope="col"><?php echo $tips['email'] ?> </th>
                                            <th scope="col"><?php echo $tips['titretips'] ?> </th>
                                            <th scope="col"><?php echo $tips['descriptiontips'] ?> </th>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!--BOUTONS DE LUIS-->
                                <button class="btn btn-primary btn-lg" id="bouton" name="bouton" value="bouton" type="submit">
                                    <span>
                                        Valider
                                    </span>
                                </button>

                                <button class="btn btn-primary btn-lg" id="bouton" name="bouton" value="bouton" type="submit">
                                    <span>
                                        Supprimer
                                    </span>
                                </button>

                                <?php if($pages2 > 1 && $page2 > 1): ?>
                                <a href="?<?= http_build_query(array_merge($_GET, ['p'=> $page2 - 1])) ?>" class="btn btn-primary">Page précédente</a>
                                <?php endif ?>
                                <?php if($pages2 > 1 && $page2 < $pages2): ?>
                                <a href="?<?= http_build_query(array_merge($_GET, ['p'=> $page2 + 1])) ?>" class="btn btn-primary">Page suivante</a>
                                <?php endif ?>

                            </div>

                        </div>

                        <div class="col-md-6 pt-2 pb-3">
                            <h2 class="fwhite border-bottom pb-3">Problèmes rapportés</h2>
                            <h5 class="fwhite pt-3">Voici la liste des utilisateurs rapportant un problème :</h5>
                            <div class="">

                                <table class="table table-hover table-striped fwhite table-dark mt-5"> 
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Problème</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="" method="post">
                                            <?php

                                            foreach($data as $probleme){
                                                if ($probleme['status'] == "0"){
                                            ?>  
                                            <tr class="table-data">
                                                <th scope="col"><?php echo $probleme['id_sig'] ?> </th>
                                                <th scope="col"><?php echo $probleme['nom'] ?> </th>
                                                <th scope="col"><?php echo $probleme['prenom'] ?> </th>
                                                <th scope="col"><?php echo $probleme['email'] ?> </th>
                                                <th scope="col"><?php echo $probleme['probleme'] ?> </th>
                                                <th scope='col'><button type="submit" class="boutonCheck" id="boutonCheck" name="submit"><i class="fa fa-check"></i></button></th>
                                            </tr>
                                            <?php
                                                    if(isset($_POST["submit"])){
                                                        $req = $bdd->prepare('UPDATE `signalements` SET ? = 1 where `id_sig` = ?');
                                                        $req->execute(array($probleme['status'],$probleme['id_sig']));
                                                    }
                                                }
                                                else{

                                                }
                                            }
                                            ?>
                                        </form>
                                    </tbody>
                                </table>
                                <?php if($pages > 1 && $page > 1): ?>
                                <a href="?<?= http_build_query(array_merge($_GET, ['p'=> $page - 1])) ?>" class="btn btn-primary">Page précédente</a>
                                <?php endif ?>
                                <?php if($pages > 1 && $page < $pages): ?>
                                <a href="?<?= http_build_query(array_merge($_GET, ['p'=> $page + 1])) ?>" class="btn btn-primary">Page suivante</a>
                                <?php endif ?>

                            </div>

                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </body>
    <!--<script type="text/javascript" src="js/status.js"></script>-->
</html>