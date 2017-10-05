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
    $pdf->Cell(80);
    // Titre
    $pdf->Cell(0,10,'Air Azur',0,1,'C');
    $pdf->Ln(20);
    $pdf->Cell(80);
    $pdf->Cell(0,10,'Récapitulatif de reservation',0,1,'C');
    $pdf->Ln(20);
    /*
    $pdf->Cell(0, 10, utf8_decode('Réservation n°'.$reservations["idReservation"]),0,1,'C');
    $pdf->Ln(15);
     * 
     */
    $pdf->Cell(40,10,"Vol : ".$reservations["idVols"],0,0);
    $pdf->Line($pdf->GetX(),$pdf->GetY()+5, $pdf->GetX()+160, $pdf->GetY()+5);
    $pdf->Ln();
    $pdf->Line($pdf->GetX(), $pdf->GetY()-5, $pdf->GetX(), $pdf->GetY()+200);
    $pdf->Cell(0,10,"Nom : ".$reservations["nomClient"]." ".$reservations["prenomClient"],0,0,'C');
    $pdf->Ln(10);
    $pdf->Cell(0,10,"Adresse : ".$reservations["adresseClient"]." ".$reservations["codePostalClient"]." ".$reservations["villeClient"],0,0,'C');
    $pdf->Ln(10);
    $pdf->Cell(0,10,"Places : ".$reservations["nbPlaceReservee"],0,0,'C');
    $pdf->Ln(10);
    $pdf->Cell(0,10,"Prix : ".$reservations["prixTotal"]."€",0,0,'C');
// affiche du texte
    /*
    $pdf->Cell(40, 10, 'Réservation n°'.$reservations["idReservation"]);
    $pdf->Ln();
    $pdf->Cell(40,10,"Vol : ".$reservations["idVols"]);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(40,10,"Nom : ".$reservations["nomClient"]);
    $pdf->Ln();
    $pdf->Cell(40,10,"Prenom : ".$reservations["prenomClient"]);
    */
// Enfin, le document est terminé et envoyé au navigateur grâce à Output().
    $pdf->Output();
    ob_end_flush();

?>