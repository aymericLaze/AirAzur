<?php

function creerPDF($uneReservations,$unVol) {


    require('modele/fpdf/fpdf.php');
// instancie un objet de type FPDF qui permet de créer le PDF
    ob_start();
    $pdf = new FPDF();
// ajoute une page
    $pdf->AddPage();
// définit la police courante
    $pdf->SetFont('Arial', 'B', 16);
//ajoute une image
    $pdf->Image('./images/avion.jpg', 10, 10, 64, 48);
    $pdf->Cell(80);
    // Titre
    $pdf->Cell(0, 10, 'Air Azur', 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Cell(80);
    $pdf->Cell(0, 10, 'Récapitulatif de reservation', 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Cell(40, 10, utf8_decode("Réservation n°" . $uneReservations["idReservation"]), 0, 0);
    $pdf->Line($pdf->GetX()+5, $pdf->GetY() + 5, $pdf->GetX() + 160, $pdf->GetY() + 5);
    $pdf->Ln();
    $pdf->Line($pdf->GetX(), $pdf->GetY() - 5, $pdf->GetX(), $pdf->GetY() + 200);
    $pdf->Cell(0, 10, "Vol : " . $unVol["idVols"], 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Cell(0, 10, utf8_decode("Départ : " . $unVol["aeroportDepart"]. " ".$unVol["dateDepart"]), 0, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(0, 10, utf8_decode("Arrivée : " . $unVol["aeroportArrivee"]. " ".$unVol["dateArrivee"]), 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Cell(0);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, utf8_decode("Nom : " . $uneReservations["nomClient"] . " " . $uneReservations["prenomClient"]), 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Cell(0, 10, utf8_decode("Adresse : " . $uneReservations["adresseClient"] . " " . $uneReservations["codePostalClient"] . " " . $uneReservations["villeClient"]), 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Cell(0, 10, "Places : " . $uneReservations["nbPlaceReservee"], 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Cell(0, 10, utf8_decode("Prix : " . $uneReservations["prixTotal"] . utf8_encode(chr(128))), 0, 0, 'C');
    //ouverture sur le navigateur
    $pdf->Output();
    ob_end_flush();
}

?>