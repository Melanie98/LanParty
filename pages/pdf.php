<?php

    require('../class/fpdf.php');

    include '../class/Crud.php';
    include '../class/LoginHandler.php';


    session_start();




    $pdf = new FPDF();
    $pdf->AddPage();
    //$pdf->Image('/img/logo.jpg',19,20,35);
    define('EURO',chr(128));
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(40,10,'Factuur lanparty Landstede Harderwijk');
    $pdf->SetY('30');
    $pdf->SetX('19');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40,10,'Westeinde 33');
    $pdf->SetY('35');
    $pdf->SetX('19');
    $pdf->Cell(40,10,'3844DD Harderwijk');
    $pdf->SetY('40');
    $pdf->SetX('19');
    $pdf->Cell(40,10,'088-850 78 00');
    $pdf->SetY('55');
    $pdf->SetX('19');
    $pdf->Cell(90, 25, 'Factuurdatum: '/*.$var['orderDate']*/);
    //timestamp

    $pdf->SetY('70');
    $pdf->SetX('19');

    //De cell is gewoon een div waar je als eerste aangeeft 90 breed 25 lang
    $pdf->Cell(90, 25, 'Adres gegevens leerling: '/*.$cusName*/);
    $pdf->SetY('110');
    $pdf->SetX('19');
    $pdf->SetY('140');
    $pdf->SetX('20');
    $pdf->Cell(90, 25, 'Productnaam: '/*.$var['productName']);
    $pdf->SetX('60');
    $pdf->Cell(90, 25, 'Product beschrijving: '/*. $var['productDesc']*/);
    $pdf->SetX('100');
    $pdf->SetX('140');
    $pdf->Cell(90, 25, 'Stukprijs: '/*.$var['totalAmount']*/);
    $pdf->SetX('170');
    $pdf->Cell(90, 25, 'Bedrag excl BTW: ');
    $pdf->SetY('150');
    $pdf->SetX('20');
    $pdf->SetY('200');
    $pdf->SetX('150');
    $pdf->Cell(90, 25, 'Totaalprijs ');
    $pdf->Output('I');

    if(empty($pdf))
    {
    header('location: login.php');
    }
?>