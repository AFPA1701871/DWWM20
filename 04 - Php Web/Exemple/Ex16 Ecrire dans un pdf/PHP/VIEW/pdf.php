<?php
require "./FPDF/fpdf.php";
// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new FPDF('P','mm','A4');
// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
// Polices par défaut : Helvetica taille 9
$pdf->SetFont('Helvetica','',9);
// Couleur par défaut : noir
$pdf->SetTextColor(0);
// couleur de fond de la cellule : gris clair
$pdf->setFillColor(230,230,230);

// Cellule avec les données 
$pdf->Cell(75,6,'Test',0,1,'L',1);    
$pdf->Write(6,"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae at dolorum atque molestias voluptatum est repudiandae sunt consectetur culpa, quis, ullam consequuntur ab nisi optio, ratione enim aspernatur? Quibusdam, facilis.");   
$pdf->Ln(10); // saut de ligne 10mm
$pdf->Output('F', './test.pdf');
