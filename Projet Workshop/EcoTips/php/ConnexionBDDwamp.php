<?php
try{

    $bdd = new PDO('mysql:host=localhost;dbname=ecotips;charset=utf8','root','');
}
catch (Exception $e){
    echo 'Erreur lors du chargement du serveur';
}
?>

<?php
include '../config/config_bdd.php';
include './config/config_bdd.php';
$bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
?>