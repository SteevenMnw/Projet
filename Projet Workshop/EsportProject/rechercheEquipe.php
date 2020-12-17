<?php
session_start();
include ('assets/php/check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header (CSS, Bootstrap ...) -->
    <meta charset="UTF-8">
    <title>Step'Up</title>

    <!-- logo -->
    <link rel="icon" href="assets/images/logo.ico" />

    <!-- CSS / Bootstrap / Icon -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/style/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>


</head>
<body class="home">
<?php
include 'navbar1.php';
?>
<center>
    <label style="padding-top: 5%; color: white">Voici la page de recherche d'équipe,
        ici et grâce aux informations que tu as remplis te concernant sur ton profil nous allons t'arranger une équipe
        correspondent a tes attentes et dans le meilleurs délai !!! :
    </label>
</center>
<div class="container emp-profile recherchejeu">
    <div class="row">
        <div>
            <h3><label style="padding-top: 5%; color: white">Veuillez sélectionner un jeu :</label></h3>
        </div>
        <div style="padding-top: 3%">
            <a class="lol" href=""><img src="assets/images/lol.png" style="width: 200px" class="img-responsive" alt="Logo"></a>
            <a class="csgo" href=""><img src="assets/images/csgo.png" style="width: 200px" class="img-responsive" alt="Logo"></a>
        </div>
    </div>
    <div>
        <div class="textlol" hidden>
            <label style="color: white">Etes vous à la recherche d'une équipe pour :</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>De la Compétition</option>
                <option>Du fun et faire connaissance</option>
                <option>Les deux</option>
            </select>
            <label style="padding-top: 3%;color: white">Question Division, voulez-vous que votre équipe soit :</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>Même division(ex: tout le monde gold 3)</option>
                <option>Division supérieur uniquement</option>
                <option>Division inférieur uniquement</option>
                <option>Peut importe</option>
            </select>
            <label style="padding-top: 3%;color: white">Combien d'heure par semaine jouez vous :</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>- de 10h</option>
                <option>entre 10h et 20h</option>
                <option>entre 20h et 30h</option>
                <option>+ de 30h</option>
            </select>
            <label style="padding-top: 3%;color: white">Voulez vous que les autres membres de l'équipe:</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>Jouent autant que vous</option>
                <option>Peu importe</option>
            </select><br>
            <a class="btn btn-rounded btn-outline-warning btn-lg" href="#">LANCER LA RECHERCHE</a>
        </div>
        <div class="textcsgo" hidden>
            <label style="color: white">Etes vous à la recherche d'une équipe pour :</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>De la Compétition</option>
                <option>Du fun et faire connaissance</option>
                <option>Les deux</option>
            </select>
            <label style="padding-top: 3%;color: white">Question rank, voulez-vous que votre équipe soit composé :</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>Du même rank que vous</option>
                <option>Avec des ranks plus élevé que le votre</option>
                <option>Avec des ranks moins élevé que le votre</option>
                <option>Peut importe</option>
            </select>
            <label style="padding-top: 3%;color: white">Combien d'heure par semaine jouez vous :</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>- de 10h</option>
                <option>entre 10h et 20h</option>
                <option>entre 20h et 30h</option>
                <option>+ de 30h</option>
            </select>
            <label style="padding-top: 3%;color: white">Voulez vous que les autres membres de l'équipe:</label><br>
            <select class="form-control" required>
                <option selected disabled>Choisissez :</option>
                <option>Jouent autant que vous</option>
                <option>Peu importe</option>
            </select><br>
            <a class="btn btn-rounded btn-outline-warning btn-lg" href="#">LANCER LA RECHERCHE</a>
        </div>

    </div>
    <script>
        $(document).ready(function(){

            $(".lol").click(function(e){
                e.preventDefault();
                $('.textlol').removeAttr('hidden');
                $('.textcsgo').attr('hidden',"true");
            });
            $(".csgo").click(function(e){
                e.preventDefault();
                $('.textcsgo').removeAttr('hidden');
                $('.textlol').attr('hidden','true');
            });
        });
    </script>
</div>
</body>

<!-- JS Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
