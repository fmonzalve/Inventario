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
$pdf->Cell(0,4,'ACTA DE ENTREGA DE EQUIPOS',0,0,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Arial','b',8);
$pdf->Cell(40,8,'FECHA DE ENTREGA',0,0,'C');
$pdf->SetFont('Arial','',8);

$mydate=getdate(date("U"));
$fecha = "$mydate[mday]/$mydate[mon]/$mydate[year]";

$pdf->Cell(50,8,$fecha,1,0,'C');

$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Arial','b',8);
$pdf->Cell(40,8,'CANTIDAD SOLICITADA',1,0,'C');
$pdf->Cell(100,8,'DESCRIPCION EQUIPOS',1,0,'C');
$pdf->Cell(50,8,'CANTIDAD ENTREGADA',1,0,'C');

//Ciclo for
for ($i = 0; $i <  count($_SESSION['productos']); $i++) {
    $pdf->SetFont('Arial','',8);
    $pdf->Ln();
    $pdf->Cell(40,8,$_SESSION['cantidades'][$i],1,0,'C');
    $pdf->Cell(100,8,$_SESSION['productos'][$i] ,1,0,'C');
    $pdf->Cell(50,8,$_SESSION['cantidades'][$i],1,0,'C');
}
//End for


$pdf->Ln();$pdf->Ln();

$pdf->Cell(100,4,' ',0,0,'C');
$pdf->Cell(0,8,$_SESSION['funcionario'],1,0,'C');

$pdf->Ln();$pdf->Ln();

$pdf->Cell(40,4,'DEPARTAMENTO ',0,0,'C');
$pdf->Cell(25,4,' ',0,0,'C');
$pdf->Cell(50,4,'UNIDAD ',0,0,'C');
$pdf->Cell(25,4,' ',0,0,'C');
$pdf->Cell(50,4,'FIRMA RECEPTOR ',0,0,'C');

$pdf->Ln();

$pdf->Cell(40,8,$_SESSION['departamento'],1,0,'C');
$pdf->Cell(25,4,' ',0,0,'C');
$pdf->Cell(50,8,$_SESSION['unidad'],1,0,'C');
$pdf->Cell(25,4,' ',0,0,'C');
$pdf->Cell(50,8,'',1,0,'C');

$pdf->Ln();$pdf->Ln();

$pdf->Cell(40,8,' ',0,0,'C');
$pdf->Cell(25,8,' ',0,0,'C');
$pdf->Cell(50,8,$fecha,1,0,'C');
$pdf->Cell(25,8,' ',0,0,'C');
$pdf->Cell(50,8,'  ',0,0,'C');

$pdf->Ln();$pdf->Ln();$pdf->Ln();


$pdf->Ln();
$pdf->Cell(40,4,' ',0,0,'C');
$pdf->Cell(25,4,' ',0,0,'C');
$pdf->Cell(125,4,'V. B. '.$_SESSION['nombre'] ,'T',0,'C');

$pdf->Ln();
$pdf->Cell(40,4,' ',0,0,'C');
$pdf->Cell(25,4,' ',0,0,'C');
$pdf->Cell(125,4,$_SESSION['cargo'] ,'',0,'C');




$pdf->Output();
?>