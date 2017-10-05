<?php

function creerPDF($uneReservation) {
    require('fpdf/fpdf.php');

// instancie un objet de type FPDF qui permet de créer le PDF
    $pdf = new FPDF();
// ajoute une page
    $pdf->AddPage();
// définit la police courante
    $pdf->SetFont('Arial', 'B', 16);
//ajoute une image
    $pdf->Image('./images/avion.jpg',10,10, 64, 48);
// affiche du texte
    $pdf->Cell(40, 10, 'Réservation n°'.$uneReservation["idReservation"]);
    $pdf->Ln();
    $pdf->Cell(40,10,"Vol : ".$uneReservation["idVols"]);
    $pdf->Ln();
// Enfin, le document est terminé et envoyé au navigateur grâce à Output().
    $pdf->Output();
}
