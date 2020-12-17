<!DOCTYPE html>
<html lang="en">
<head>
<!-- Header (CSS, Bootstrap ...) -->
    <?php
    include('header.html');
    ?>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>

<?php
include('navbar.php');
?>

<header class="home d-flex" id="home">
    <div class="container my-auto">
        <h1 class="titre t1">STEP'UP</h1>
        <h2  class="titre t2">Ensemble, depassez vos limites !</h2>
        <a class="btn btn-rounded btn-outline-warning btn-lg" href="signup.php">NOUS REJOINDRE</a>

        <nav class="navbar navbar-expand-lg navbar-light fixed-bottom justify-content-center">
            <a href="https://discord.gg/b7Dc9teKbw" target="_blank" class="btn btn2"><i class="fab fa-discord fa-3x"></i></a>
            <a href="#" class="btn btn2"><i class="fab fa-twitter fa-3x"></i></a>
            <a href="#" class="btn btn2"><i class="fas fa-envelope fa-3x"></i></a>
        </nav>
    </div>
</header>

<!-- JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>