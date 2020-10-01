<?php

session_start();

require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('logo.jpeg',10,7,30);

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,'',0,0,'R');
$pdf->Cell(130,4,'MINISTERIO DE VIVIENDA Y URBANISMO',0,0,'C');
$pdf->SetFont('Arial','',5);
$pdf->Cell(30,4,'',0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Ln();

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,'',0,0,'R');
$pdf->Cell(130,4,'SERVIU VI REGION DE O"HIGGINS',0,0,'C');
$pdf->SetFont('Arial','',5);
$pdf->Cell(30,4,'N. INTERNO',0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Ln();

$pdf->Cell(30,4,'',0,0,'C');
$pdf->Cell(130,4,'DEPTO ADMINISTRACION Y FINANZAS',0,0,'C');
$pdf->Cell(30,4,$_SESSION['date'],1,0,'C');
$pdf->Ln();

$pdf->Cell(0,4,'',0,0,'C');
$pdf->Ln();

$pdf->Ln();

$pdf->SetFont('Arial','bu',12);
$pdf->Cell(0,4,'REPORTE INVENTARIO',0,0,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Arial','b',8);
$pdf->Cell(40,8,'FECHA REPORTE',0,0,'C');
$pdf->SetFont('Arial','',8);

$mydate=getdate(date("U"));
$fecha = "$mydate[mday]/$mydate[mon]/$mydate[year]";

$pdf->Cell(50,8,$fecha,1,0,'C');

$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Arial','b',8);
$pdf->Cell(55,8,'PRODUCTO',1,0,'C');
$pdf->Cell(60,8,'STOCK DISPONIBLE',1,0,'C');
$pdf->Cell(40,8,'VALOR UNITARIO',1,0,'C');
$pdf->Cell(40,8,'VALOR TOTAL',1,0,'C');


//Ciclo for


//End for


$pdf->Ln();$pdf->Ln();
$pdf->Ln();$pdf->Ln();




$pdf->Ln();$pdf->Ln();

$pdf->Cell(40,4,'GENERADO POR ',0,0,'C');

$pdf->Ln();

$pdf->Ln();$pdf->Ln();



$pdf->Ln();$pdf->Ln();$pdf->Ln();

$pdf->Ln();
$pdf->Cell(40,4,' ',0,0,'C');
$pdf->Cell(25,4,' ',0,0,'C');
$pdf->Cell(100,4,'NOMBRE Y FIRMA RECEPCION INFORME','T',0,'C');




$pdf->Output();
?>
