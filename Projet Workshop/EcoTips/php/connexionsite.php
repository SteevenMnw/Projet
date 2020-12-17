<?php
session_start();
require('./ConnexionBDD.php');

if(isset($_POST["utilisateur"]) && isset($_POST["mdp"]))
{
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE identifiant = ? and mdp = ?');
    $req->execute(array($_POST['utilisateur'], $_POST['mdp']));
    $tableau = $req->fetch();

    if ($tableau != '')
    {
        if ($tableau['statut'] == "A")
        {
            $_SESSION['matricule'] = $tableau['matricule'];
            $_SESSION['statut'] = "administrateur";
            $_SESSION['securite'] = "A";
        }
        echo $tableau['statut'];
    }
}
?>
