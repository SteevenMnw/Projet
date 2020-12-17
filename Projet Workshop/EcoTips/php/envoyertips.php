<?php
session_start();
require('./ConnexionBDD.php');

$req = $bdd->prepare('INSERT INTO newtips (nom, prenom, email, titretips, descriptiontips) VALUES (?,?,?,?,?)');
if ($req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['titre'], $_POST['msg']))){
    echo "reussi";
}

?>