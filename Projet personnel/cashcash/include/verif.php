<?php

function verifAssistant () 
{
    // Si l'utilisateur est un technicien et qui essaye d'aller sur une page dédiée pour les assistants il va se faire redirigé sur sa page 
    if ($_SESSION['verif'] == "technicien")
    {
        header('Location: ./technicien.php');
    }
}

function verifTechnicien () 
{
    // Si l'utilisateur est un assistant et qui essaye d'aller sur une page dédiée pour un technicien il va se faire redirigé sur sa page 
    if ($_SESSION['verif'] == "assistant")
    {
        header('Location: ./accueil.php');
    }
}

function verifConnecte ()
{
    // Si il est pas connecté et qui essaye d'aller sur une page d'un technicien ou pour un assistant alors il va se faire redirigé sur la page connexion
    if (!isset($_SESSION['verif']))
    {
        header('Location: ./index.php');
    }
}

?>