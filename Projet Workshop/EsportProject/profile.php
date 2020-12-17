<?php
session_start();
include('assets/php/profil.php');
include ('assets/php/check.php');

if ($_SESSION['statut']=="N"){
    $nomA = "SELECT * FROM utilisateur, neutre Where utilisateur.matricule = neutre.id_neutre and login =\"".$_SESSION['login']."\"";
    $reqNom = mysqli_query($bdd,$nomA);
    $name = $reqNom->fetch_array(MYSQLI_ASSOC);
}
if ($_SESSION['statut']=="A"){
    $nomA = "SELECT * FROM utilisateur, administrateur Where utilisateur.matricule = administrateur.id_admin and login =\"".$_SESSION['login']."\"";
    $reqNom = mysqli_query($bdd,$nomA);
    $name = $reqNom->fetch_array(MYSQLI_ASSOC);
}

?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <?php
    include('header.html');
    ?>
    <link rel="stylesheet" href="assets/style/signin.css">
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body id="profile">
<div style="margin-top: 10%">
<?php
include('navbar_lg.html');
?>

    <div class="container emp-tl">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="tl-img">
                        <img src="https://mk2films.com/wp-content/uploads/sites/4/2016/08/profil-picture-neutre.jpg" alt=""/>
                        <!--<div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tl-head">
                        <h5>
                            <h1 class="ident"><?php echo $name['nom']; ?> <?php echo $name['prenom']; ?>
                        </h5>
                        <div style="padding-top: 6%">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tl-tab" data-toggle="tab" href="#tl" role="tab" aria-controls="tl" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="tl-work">
                        <p>A remplir</p>
                        <a href="">A remplir</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content tl-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $name['nom']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prénom</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $name['prenom']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $name['email']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tl" role="tabpanel" aria-labelledby="tl-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br/>
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>