<?php
    session_start();
    require('./ConnexionBDD.php');


$req = $bdd->prepare('INSERT INTO signalements (id_sig, nom, prenom, email, probleme) VALUES (?,?,?,?,?)');

if ($req->execute(array($_POST['id'],$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['probleme']))){
    echo ("SUCCES");
}else{
    echo ("ERREUR");
}

?>

