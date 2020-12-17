<?php
include('db_connect.php');

/*function Info($profil)
{
    $req = $GLOBALS['bdd']->prepare('SELECT nom, prenom, email FROM '.$_SESSION['statut'].' WHERE id_neutre = ?');
    $req->execute(array($_SESSION['matricule']));
    $user = $req->fetch();

    $nom = $user['nom'];
    $prenom = $user['prenom'];
    $email = $user['email'];

    if($profil == 'nom'){
        return $user['nom'];
    }
    else if($profil == 'prenom')
    {
        return $user['prenom'];
    }
    else if($profil == 'email'){
        return $email;
    }
    else if($profil == 'nomprenom'){
        return strtoupper($nom) . " " . strtoupper($prenom);
    }
    else{
        return 'Erreur';
    }*/




