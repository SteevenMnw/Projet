<?php
session_start();

$bdd = mysqli_connect ('localhost', 'assistant', 'assistant', "cashcash"); 

if(isset($_GET['technicien']))
{
    $technicien = (String) trim($_GET['technicien']);

    $req = $bdd->query("SELECT t.nom, t.prenom, t.numero_agence FROM technicien t, assistant a, agence ag, region r WHERE  t.numero_agence = ag.numero_agence and ag.code_region = r.code_region and a.code_region = r.code_region and t.nom LIKE \"".$technicien."%\" and a.code_region =".$_SESSION['code_region']." LIMIT 10");
    $req1 = $req->fetch_all(MYSQLI_ASSOC);
    
        foreach($req1 as $r)
    {
        echo "<option>".$r['nom']." ".$r['prenom']."</option>";
    }
}

?>