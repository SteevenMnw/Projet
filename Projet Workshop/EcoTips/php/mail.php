<?php
session_start();

$nom = $_POST['nom'];
$email = $_POST['email'];
$sujet = $_POST['sujet'];
$msg = $_POST['msg'];

$formcontent = "De: $nom \nEmail: $email \nMessage: $msg";
$destinataire = "testmailepsi@gmail.com";
if(mail ($destinataire, $sujet, $formcontent)){
    echo 'reussi';
}
?>