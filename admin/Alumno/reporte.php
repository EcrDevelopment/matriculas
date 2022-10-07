<?php
require('../fpdf/fpdf.php');
require('../include/session2.php');

$nn=$_GET['nn'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../../img/Colegio.jpg' , 10 ,8, 10 , 13,'JPG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, $nn, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(65, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE USUARIOS ', 0);
$pdf->Ln(12);
$pdf->SetFont('Arial', 'B', 12);


$pdf->Cell(8,10,'______________________________________________________________________________',0);
$pdf->Cell(15, 8, '#', 0);
$pdf->Cell(25, 8, 'Curso', 0);
$pdf->Cell(22, 8, 'Nota 1', 0);
$pdf->Cell(22, 8, 'Nota 2', 0);
$pdf->Cell(22, 8, 'Nota 3', 0);
$pdf->Cell(22, 8, 'Nota 4', 0);
$pdf->Cell(22, 8, 'Nota 5', 0);
$pdf->Cell(22, 8, 'Promedio', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 10);
//CONSULTA
mysql_query("SET NAMES 'utf8'");
$productos = mysql_query("SELECT cursos.curso,notas.* FROM cursos,notas WHERE cursos.id_curso=notas.id_curso AND notas.id_alumno='".$_GET['id']."'");
$item = 0;
$totaluni = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(38, 8,$productos2['curso'], 0);
    $pdf->Cell(22, 8,$productos2['n1'], 0);
	$pdf->Cell(22, 8, $productos2['n2'], 0);
    $pdf->Cell(22, 8, $productos2['n3'], 0);
	$pdf->Cell(22, 8, $productos2['n4'], 0);
	$pdf->Cell(22, 8, $productos2['n5'], 0);
	$pdf->Cell(22, 8, ($productos2['n1']+$productos2['n2']+$productos2['n3']+$productos2['n4']+$productos2['n5'])/5, 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(160,8,'',0);
$pdf->Output();
?>