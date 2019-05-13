<?php

require '../lib/php/pgConnect.php';
require '../lib/php/class/Connexion.class.php';
require '../lib/php/class/ContactDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);

$contactDB = new ContactDB($cnx);
$liste = $contactDB->getVue_contact();
$nbrContacts = count($liste);

require '../lib/php/fpdf/fpdf.php';


$pdf = new FPDF('L', 'cm', 'A4');
$pdf->setFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->setX(8);
$pdf->cell(3.5, 1, 'Contact', 0, 0, 'C');
$pdf->SetFillColor(200, 10, 10);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->setXY(3, 2);
$x = 3;
$y = 2;

$pdf->SetXY($x, $y);
$pdf->cell(1, 1, 'Nom', 0, 0, 'C');
$pdf->SetXY($x + 5, $y);

$pdf->cell(1, 1, utf8_decode('Date'), 0, 0, 'C');
$pdf->SetXY($x + 11, $y);
$pdf->cell(1, 1, utf8_decode('Email'), 0, 0, 'C');
$pdf->SetXY($x + 16, $y);
$pdf->cell(1, 1, utf8_decode('Texte'), 0, 0, 'C');
$y += 2;

$y + 2;


for ($i = 0; $i < $nbrContacts; $i++) {

    $pdf->SetXY($x, $y);
    $pdf->cell(1, 1, $liste[$i]['NOM'], 0, 0, 'C');
    $pdf->SetXY($x + 5, $y);

    $pdf->cell(1, 1, utf8_decode($liste[$i]['DATE_DEMANDE']), 0, 0, 'C');
    $pdf->SetXY($x + 11, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['MAIL']), 0, 0, 'C');
    $pdf->SetXY($x + 16, $y);

    $pdf->MultiCell(0, 1, utf8_decode($liste[$i]['TEXTE']), 0, 'L', false);
    if ($x > 23) {
        $y += 3;
    }

    $y += 3;
    if ($y % 19 == 0) {
        $pdf->AddPage();
        $pdf->setX(8);
        $pdf->cell(3.5, 1, 'Reservation', 0, 0, 'C');
        $pdf->SetFillColor(200, 10, 10);
        $pdf->SetDrawColor(0, 0, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setXY(3, 2);
        $x = 3;
        $y = 2;
        $pdf->SetXY($x, $y);
        $pdf->cell(1, 1, 'Nom', 0, 0, 'C');
        $pdf->SetXY($x + 5, $y);

        $pdf->cell(1, 1, utf8_decode('Date'), 0, 0, 'C');
        $pdf->SetXY($x + 11, $y);
        $pdf->cell(1, 1, utf8_decode('Email'), 0, 0, 'C');

        $pdf->SetXY($x + 16, $y);

        $pdf->cell(1, 1, utf8_decode('Texte'), 0, 0, 'C');
        $y += 2;
    }
}



$pdf->Output();


