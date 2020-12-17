<?php

if (!isset ($_SESSION['login'])) {
    header("location: signin.php");
}else{
    $login=$_SESSION['login'];
    /*$admin=$_SESSION['admin'];*/
}
?>