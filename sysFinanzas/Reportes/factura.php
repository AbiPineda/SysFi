<?php
	include 'plantillaFactura2.php';
	include '../conexion/php_conexion.php';

	$idcliente = $_GET['ir'];
        $factura=$_GET['fac'];

	

	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A5');
$clientecito= mysqli_query($conexion,"SELECT*FROM tb_cliente WHERE id_cliente='$idcliente'");
while ($m= mysqli_fetch_array($clientecito)){
	$pdf->SetFillColor(249,249,249);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(25,6,utf8_decode('NOMBRE:'),0,0,'L',1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(70,6, utf8_decode($m['nombre_cliente']),1,1,'L');
    $pdf->SetFillColor(249,249,249);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(25,6,utf8_decode('DUI:'),0,0,'L',1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(70,6, utf8_decode($m['dui']),1,1,'L');
    $pdf->SetFillColor(249,249,249);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(25,6,utf8_decode('DIRECCIÓN:'),0,0,'L',1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(70,6, utf8_decode($m['dir_cliente']),1,1,'L');
}
    $pdf->SetXY(110,30);
    $pdf->SetFillColor(249,249,249);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40,6,utf8_decode('CONDIC. DE PAGO:'),0,0,'L',1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(40,6, utf8_decode(''),1,1,'L');
    $pdf->SetXY(110,36);
    $pdf->SetFillColor(249,249,249);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40,6,utf8_decode('FECHA:'),0,0,'L',1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(40,6, utf8_decode(''),1,1,'L');

    $pdf->Ln(10);
    $pdf->SetFillColor(0,186,211);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,6,utf8_decode('CANTIDAD'),1,0,'C',1);
    $pdf->Cell(65,6,utf8_decode('DESCRIPCIÓN'),1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode('PRECIO UNITARIO'),1,0,'C',1);
    $pdf->Cell(35,6,utf8_decode('VENTAS GRAVADAS'),1,1,'C',1);

    $pdf->SetFont('Arial','',9);
   // $pdf->MultiCell(20,6, utf8_decode('Tolerancia Post-Ingesta 75grs. de Glucosa 2hrs.'),1,'L',0,0,0);
   // $pdf->MultiCell(65,6, utf8_decode('Tolerancia Post-Ingesta 75grs. de Glucosa 2hrs.'),1,'L',0,0);
    $pdf->Cell(20,6, utf8_decode(''),1,0,'L');
    $pdf->Cell(65,6, utf8_decode(''),1,0,'L');
    $pdf->Cell(30,6, utf8_decode(''),1,0,'L');
    $pdf->Cell(35,6, utf8_decode(''),1,0,'L');

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>