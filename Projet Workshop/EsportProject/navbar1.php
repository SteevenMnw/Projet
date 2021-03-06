<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tournois</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Match</a>
                </li>
                <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" style="width: 150px" class="img-responsive" alt="Logo"></a>
                <li class="nav-item active">
                    <a class="nav-link" href="rechercheEquipe.php">Equipe</a>
                </li>
                <?php
                if(isset($_SESSION['login']))
                {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="assets/php/logout.php">Déconnexion</a>
                    </li>
                    <?php
                }
                else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Connexion</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>