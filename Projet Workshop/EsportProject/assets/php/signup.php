<?php
session_start();
require('db_connect.php');

$req1 = $bdd->prepare('INSERT INTO neutre (prenom, nom, email) VALUES (?,?,?)');
$req2 =$bdd->prepare('INSERT INTO `utilisateur`(`login`, `mdp`,`matricule`) VALUES (?,?,(SELECT id_neutre from neutre where nom = ? and prenom = ?))');
$doreq1 = $req1->execute(array($_POST['prenom'], $_POST['nom'], $_POST['email']));
$doreq2 = $req2->execute(array($_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom']));

if ($doreq1 && $doreq2){
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE login = ? and mdp = ?');
    $req->execute(array($_POST['login'], $_POST['mdp']));
    $tableau = $req->fetch();
    $_SESSION['matricule'] = $tableau['matricule'];
    $_SESSION['statut'] = "neutre";
    $_SESSION['securite'] = "N";
    echo "reussi";
}

?>
