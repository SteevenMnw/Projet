<?php
function VerifAdmin () 
{    
    if ($_SESSION['securite'] != "A")
    {
        header('Location: ./connexion.php');
    }
}

?>