<?php
    require('fpdf.php');
    
    $datos = "Hola mundo";
    include('GeneraQr.php');
    GenerarQrCode($datos, "QR1.png");


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'¡Hola, Mundo!');

    $pdf->Image('QR1.png',40,40,20,0);

    $pdf->Output();

?>