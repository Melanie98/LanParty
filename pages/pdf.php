<?php

    require('classes/fpdf.php');


    include 'header.php';
    echo"<a href=\"javascript:history.go(-1)\">Terug</a>";
    session_start();
    $_SESSION['winkelmandje'];

    $db = new DBHelper();


    $pdf = new FPDF();
    $pdf->AddPage();
    //$pdf->Image(URL::to('/').'/img/logo.jpg',19,20,35);
    define('EURO',chr(128));
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetY('70');
    $pdf->SetX('19');
    $pdf->Cell(90, 25, 'Naam: '.$cusName);
    $pdf->SetY('100');
    $pdf->SetX('19');

    //De cell is gewoon een div waar je als eerste aangeeft 90 breed 25 lang
    $pdf->Cell(90, 25, 'Factuurdatum: '.$var['orderDate']);
    $pdf->SetY('110');
    $pdf->SetX('19');
    $pdf->SetY('140');
    $pdf->SetX('20');
    $pdf->Cell(90, 25, 'Productnaam: '.$var['productName']);
    $pdf->SetX('60');
    $pdf->Cell(90, 25, 'Product beschrijving: '. $var['productDesc']);
    $pdf->SetX('100');
    $pdf->SetX('140');
    $pdf->Cell(90, 25, 'Stukprijs: '.$var['totalAmount']);
    $pdf->SetX('170');
    $pdf->Cell(90, 25, 'Bedrag excl BTW: ');
    $pdf->SetY('150');
    $pdf->SetX('20');
    $pdf->Output('I');

    if(empty($pdf))
    {
    header('location: login.php');
    }
?>