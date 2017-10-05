<?php
    require('modele/fpdf/fpdf.php');
// instancie un objet de type FPDF qui permet de créer le PDF
    ob_start();
    $pdf = new FPDF();
// ajoute une page
    $pdf->AddPage();
// définit la police courante
    $pdf->SetFont('Arial', 'B', 16);
//ajoute une image
    $pdf->Image('./images/avion.jpg',10,10, 64, 48);
    $pdf->Ln(4);
// affiche du texte
    $pdf->Cell(40, 10, 'Réservation n°'.$reservations["idReservation"]);
    $pdf->Ln();
    $pdf->Cell(40,10,"Vol : ".$reservations["idVols"]);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(40,10,"Nom : ".$reservations["nomClient"]);
    $pdf->Ln();
    $pdf->Cell(40,10,"Prenom : ".$reservations["prenomClient"]);
    
// Enfin, le document est terminé et envoyé au navigateur grâce à Output().
    $pdf->Output();
    ob_end_flush();
?>