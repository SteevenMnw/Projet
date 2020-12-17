<?php
/*session_start();
require('./db_connect.php');

if(isset($_POST["utilisateur"]) && isset($_POST["mdp"]))
{
    $req = $bdd->prepare('SELECT * FROM utilisateur WHERE login = ? and mdp = ?');
    $req->execute(array($_POST['utilisateur'], $_POST['mdp']));
    $tableau = $req->fetch();
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['email'] = $_POST['email'];

    if ($tableau != '')
    {
        if ($tableau['statut'] == "A")
        {
            $_SESSION['matricule'] = $tableau['matricule'];
            $_SESSION['statut'] = "administrateur";
            $_SESSION['securite'] = "A";
        }
        else{
            $_SESSION['matricule'] = $tableau['matricule'];
            $_SESSION['statut'] = "neutre";
            $_SESSION['securite'] = "N";
        }
        echo $tableau['statut'];
    }
}*/
?>

<?php
if(isset($_POST['login'])&& isset($_POST['mdp']))
{
    session_start();

    //On recupere les informations transmises par le formulaire
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];

    //inclusion de la connexion à la base de données
    include_once 'db_connect.php';

    // Récupèrer les données utilisateur pour les stocker dans la session

    //on cherche l'utilisateur qui a cet identifiant
    $sql = "SELECT * FROM utilisateur where login='$login'";
    $result = mysqli_query($bdd, $sql);
    $row = mysqli_fetch_array($result);

    if ($row)
    {
        //on verifie que le mot de passe est le bon
        if ($row['mdp']== $mdp) {

            //on vide toutes les sessions precedentes et on range les bonnes infos dans cette session
            session_unset();
            $_SESSION['login']=$row['login'];
            $_SESSION['id']=$row['id'];
            $_SESSION['statut']=$row['statut'];

            if ($row['statut']=="A")
            {
                header("location: admin.php");
            }

            if ($row['statut']=="N")
            {
                header("location: ../../profile.php");
            }
        }
        else {
            $error = "Mauvais mot de passe veuillez reessayer";
            header("Location: ../../signin.php?error=".$error);
        }
    }
    if ($row['login']!=$login){
        $error = "Utilisateur inconnu veuillez reessayer";
        header("Location: ../../signin.php?error=".$error);
    }
}
?>
