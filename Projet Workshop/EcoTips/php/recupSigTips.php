<?php
    session_start();
    require('./php/ConnexionBDD.php');

    $params = [];
    $params2 = [];
    define('PER_PAGE', 6);
    define('PER_PAGE2', 6);
    

//-------------------------------------------------SIGNALEMENTS------------------------------------------------------------    

    //Pagination des SIGNALEMENTS
    $reqCount = "SELECT COUNT(id_sig) as count FROM signalements";
    $statement = $bdd->prepare($reqCount);
    $statement->execute($params);
    $count = (int)$statement->fetch()['count'];
    $pages = ceil($count / PER_PAGE);

    $page = (int)($_GET['p'] ?? 1); //p peut ne pas être défini donc il prendra 1 par défaut
    $offset = ($page - 1) * PER_PAGE;



    //Afficher tout les résultat dans l'odre du plus récent
    //Limite de 10 résultats par page
    $req = $bdd->prepare('SELECT * FROM signalements ORDER BY `id_sig` DESC LIMIT ' . PER_PAGE ." OFFSET $offset");
    $executeIsOk = $req->execute();
    $data = $req->fetchAll();//Données sous forme d'un tableau


//-----------------------------------------------------TIPS-----------------------------------------------------------------
  

    //Pagination des TIPS
    $reqCount2 = "SELECT COUNT(id_tips) as count FROM newtips";
    $statement2 = $bdd->prepare($reqCount2);
    $statement2->execute($params2);
    $count2 = (int)$statement2->fetch()['count'];
    $pages2 = ceil($count2 / PER_PAGE2);

    $page2 = (int)($_GET['p'] ?? 1); //p peut ne pas être défini donc il prendra 1 par défaut
    $offset2 = ($page2 - 1) * PER_PAGE2;

    //Afficher tout les résultat dans l'odre du plus récent
    //Limite de 10 résultats par page
    $req2 = $bdd->prepare('SELECT * FROM newtips ORDER BY `id_tips` DESC LIMIT ' . PER_PAGE2 ." OFFSET $offset2");
    $executeIsOk2 = $req2->execute();
    $dataTips = $req2->fetchAll();//Données sous forme d'un tableau


?>  