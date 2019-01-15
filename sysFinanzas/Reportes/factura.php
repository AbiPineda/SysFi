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

$facturita= mysqli_query($conexion,"SELECT c.concepto1, c.valor, c.fecha,d.valor as pUni,d.cantidad, a.nombre,d.importe
    FROM contable c INNER JOIN detalle d ON d.factura=c.concepto2
INNER JOIN articulos a ON a.idarticulos=d.articulo WHERE d.factura='$factura'");

while ($w= mysqli_fetch_array($facturita)){
   $total=$w['valor'];
    $pdf->SetXY(110,30);
    $pdf->SetFillColor(249,249,249);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40,6,utf8_decode('CONDIC. DE PAGO:'),0,0,'L',1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(40,6, utf8_decode($w['concepto1']),1,1,'L');
    $pdf->SetXY(110,36);
    $pdf->SetFillColor(249,249,249);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(40,6,utf8_decode('FECHA:'),0,0,'L',1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(40,6, utf8_decode($w['fecha']),1,1,'L');

    $pdf->Ln(10);
    $pdf->SetFillColor(0,186,211);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,6,utf8_decode('CANTIDAD'),1,0,'C',1);
    $pdf->Cell(65,6,utf8_decode('DESCRIPCIÓN'),1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode('PRECIO UNITARIO'),1,0,'C',1);
    $pdf->Cell(35,6,utf8_decode('VENTAS GRAVADAS'),1,1,'C',1);
}
    $pdf->SetFont('Arial','',9);
   // $pdf->MultiCell(20,6, utf8_decode('Tolerancia Post-Ingesta 75grs. de Glucosa 2hrs.'),1,'L',0,0,0);
   // $pdf->MultiCell(65,6, utf8_decode('Tolerancia Post-Ingesta 75grs. de Glucosa 2hrs.'),1,'L',0,0);
$facturita1= mysqli_query($conexion,"SELECT c.concepto1, c.valor, c.fecha,d.valor as pUni,d.cantidad, a.nombre,d.importe
    FROM contable c INNER JOIN detalle d ON d.factura=c.concepto2
INNER JOIN articulos a ON a.idarticulos=d.articulo WHERE d.factura='$factura'");

    while ($rw = $facturita1->fetch_assoc()) {
    $pdf->Cell(20,6, utf8_decode($rw['cantidad']),1,0,'C');
    $pdf->Cell(65,6, utf8_decode($rw['nombre']),1,0,'C');
    $pdf->Cell(30,6, utf8_decode($rw['pUni']),1,0,'C');
    $pdf->Cell(35,6, utf8_decode($rw['importe']),1,1,'C');
    }
    $pdf->Ln(10);
$pdf->Cell(35,6,utf8_decode('Total'),1,1,'C',1);
$pdf->Cell(35,6, utf8_decode($total),1,0,'L');
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>