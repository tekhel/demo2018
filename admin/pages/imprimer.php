<?php

require '../lib/php/pgConnect.php';
require '../lib/php/class/Connexion.class.php';
require '../lib/php/class/Vue_reservationDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);

$reservationDB = new Vue_reservationDB($cnx);
$liste = $reservationDB->getVue_reservationProduit();
$nbrReservations = count($liste);

require '../lib/php/fpdf/fpdf.php';


$pdf = new FPDF('P', 'cm', 'A4');
$pdf->setFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->setX(8);
$pdf->cell(3.5, 1, 'Reservation', 0, 0, 'C');
$pdf->SetFillColor(200, 10, 10);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->setXY(3, 2);
$x = 3;
$y = 3;

$pdf->SetXY($x, $y);
$pdf->cell(1, 1, 'Nom', 0, 0, 'C');
$pdf->SetXY($x + 3, $y);
$pdf->cell(1, 1, utf8_decode('Téléphone'), 0, 0, 'C');
$pdf->SetXY($x + 7, $y);
$pdf->cell(1, 1, utf8_decode('Email'), 0, 0, 'C');
$pdf->SetXY($x + 10, $y);
$pdf->cell(1, 1, utf8_decode('Destination'), 0, 0, 'C');
$pdf->SetXY($x + 13, $y);
$pdf->cell(1, 1, utf8_decode('Localite'), 0, 0, 'C');
$y += 2;

$y + 2;


for ($i = 0; $i < $nbrReservations; $i++) {

    $pdf->SetXY($x, $y);
    $pdf->cell(1, 1, $liste[$i]['NOM_CLIENT'], 0, 0, 'C');
    $pdf->SetXY($x + 3, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['TEL_CLIENT']), 0, 0, 'C');
    $pdf->SetXY($x + 7, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['EMAIL_CLIENT']), 0, 0, 'C');
    $pdf->SetXY($x + 10, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['PAYS']), 0, 0, 'C');
    $pdf->SetXY($x + 13, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['DATE']), 0, 0, 'C');
    $y += 2;
    if ($y % 25 == 0) {
        $pdf->AddPage();
        $pdf->setX(8);
        $pdf->cell(3.5, 1, 'Reservation', 0, 0, 'C');
        $pdf->SetFillColor(200, 10, 10);
        $pdf->SetDrawColor(0, 0, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setXY(3, 2);
        $x = 3;
        $y = 3;
        $pdf->SetXY($x, $y);
        $pdf->cell(1, 1, 'Nom', 0, 0, 'C');
        $pdf->SetXY($x + 3, $y);
        $pdf->cell(1, 1, utf8_decode('Téléphone'), 0, 0, 'C');
        $pdf->SetXY($x + 7, $y);
        $pdf->cell(1, 1, utf8_decode('Email'), 0, 0, 'C');
        $pdf->SetXY($x + 10, $y);
        $pdf->cell(1, 1, utf8_decode('Destination'), 0, 0, 'C');
        $pdf->SetXY($x + 13, $y);
        $pdf->cell(1, 1, utf8_decode('Localite'), 0, 0, 'C');
        $y += 2;
    }
}



$pdf->Output();

