
<?php
session_start();
require('fpdf.php');

class PDF extends FPDF
{
    // En-tête
    function Header()
    {
        // Police Arial gras 15
        $this->SetFont('Arial','B',20);
        // Décalage à droite
        $this->Cell(65);
        // Titre
        $this->Cell(30,10,'Fiche Intervention');
        // Saut de ligne
        $this->Ln(20);
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}



    $bdd = mysqli_connect("localhost", 'assistant' , 'assistant', "cashcash");
    
    $reqclient = "SELECT * FROM client WHERE numero_client = ".$_SESSION['numClient'];
    $resultclient = mysqli_query($bdd, $reqclient);
    $row = $resultclient->fetch_array(MYSQLI_ASSOC);

    $reqtech = "SELECT nom, prenom FROM technicien WHERE matricule = ".$_SESSION['matricule_technicien1'];
    $resulttech = mysqli_query($bdd, $reqtech);
    $rowtech = $resulttech->fetch_array(MYSQLI_ASSOC);

    $reqInter = "SELECT numero_intervention FROM intervention WHERE matricule_technicien = ".$_SESSION['matricule_technicien1']." AND numero_client = ".$_SESSION['numClient'];
    $resultInter = mysqli_query($bdd, $reqInter);
    $rowInter = $resultInter->fetch_array(MYSQLI_ASSOC);


    
    $reqinter = "SELECT date_visite, heure_visite FROM intervention WHERE numero_intervention = ".$rowInter['numero_intervention'];
    $resultinter = mysqli_query($bdd, $reqinter);
    $rowinter = $resultinter->fetch_array(MYSQLI_ASSOC);

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',15);


    $pdf->Cell(0,10,'Numero Intervention : ');
    $pdf->Cell(-142);
    $pdf->Cell(0, 10, $rowInter['numero_intervention']);
    $pdf->Ln(20);

    $pdf->Cell(0,10,'Nom Technicien : ');
    $pdf->Cell(-150);
    $pdf->Cell(0, 10, $rowtech['nom']);
    $pdf->Ln(10);

    $pdf->Cell(0,10,'Prenom Technicien : ');
    $pdf->Cell(-144);
    $pdf->Cell(0, 10, $rowtech['prenom']);
    $pdf->Ln(20);

    $pdf->Cell(0,10,'Nom du Client : ');
    $pdf->Cell(-153);
    $pdf->Cell(0, 10, $row['nom']);
    $pdf->Ln(10);

    $pdf->Cell(0,10,'Prenom du Client : ');
    $pdf->Cell(-147);
    $pdf->Cell(0, 10, $row['prenom']);
    $pdf->Ln(10);

    $pdf->Cell(0,10,'Adresse : ');
    $pdf->Cell(-168);
    $pdf->Cell(0, 10, $row['adresse']);
    $pdf->Ln(10);

    $pdf->Cell(0,10,'Numero telephone : ');
    $pdf->Cell(-145);
    $pdf->Cell(0, 10, $row['telephone']);
    $pdf->Ln(10);

    $pdf->Cell(0,10,'Email : ');
    $pdf->Cell(-170);
    $pdf->Cell(0, 10, $row['email']);
    $pdf->Ln(20);

    $pdf->Cell(0,10,'Date de la visite : ');
    $pdf->Cell(-150);
    $pdf->Cell(0, 10, $rowinter['date_visite']);
    $pdf->Ln(10);

    $pdf->Cell(0,10,'Heure de la visite : ');
    $pdf->Cell(-148);
    $pdf->Cell(0, 10, $rowinter['heure_visite']);
    $pdf->Ln(10);
    $pdf->Output();
?>
