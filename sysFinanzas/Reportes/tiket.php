<?php
include "fpdf/fpdf.php";
	include '../conexion/php_conexion.php';

	$id = $_GET['x'];

	$sacar1 = mysqli_query($conexion, "SELECT
abono.id_abono,
abono.cuenta,
abono.valor,
abono.fecha,
abono.hora,
abono.nota,
abono.total_interes,
abono.proximo_pago,
abono.mora,
abono.estado,
tb_cliente.nombre_cliente,
contable.valor as valor2
FROM
abono
INNER JOIN contable ON abono.cuenta = contable.id_contable
INNER JOIN factura ON contable.concepto2 = factura.factura
INNER JOIN resumen ON resumen.factura = factura.factura
INNER JOIN tb_cliente ON resumen.id_clientes = tb_cliente.id_cliente
WHERE
abono.id_abono = $id");




	$row = mysqli_fetch_array($sacar1);

$cuenta=$row['cuenta'];

	$numer=mysqli_query($conexion,  "SELECT
abono.id_abono,
abono.cuenta,
abono.valor

FROM
abono
WHERE
abono.cuenta = 15
");
	$con=0;

	while (	$r = mysqli_fetch_array($numer)) {
$r['id_abono'];
$con++;
$totaB+=$r['valor'];

	}

$pdf = new FPDF($orientation='P',$unit='mm', array(45,350));
$pdf->AddPage();

$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(2);
$pdf->setX(2);
$pdf->Cell(5,$textypos," AlMACENES PRADO");
	$pdf->Ln(5);
$pdf->Cell(5,$textypos,"SAN VICENTE");
$pdf->Ln(5);
$pdf->Cell(5,$textypos,"TIKET #: $id");
$pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20

$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'=========================================================');
	$pdf->Ln(5);
$pdf->setX(2);

$pdf->Cell(5,5,'FECHA:    '.$row['fecha']);
	$pdf->Ln(5);
$pdf->setX(2);
$pdf->Cell(5,5,'CLIENTE: '.$row['nombre_cliente']);
	$pdf->Ln(5);
$pdf->setX(2);



$pdf->Cell(5,5,'MONTO VENTA:    '.$row['valor2']);
	$pdf->Ln(5);
	$pdf->setX(2);

	$pdf->Cell(5,5,'=========================================================');

$deuda=($row['valor2'])-$totaB;

$pdf->SetFont('Arial','',7);    //Letra Arial, negrita (Bold), tam. 20

$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'VALOR ABONADO: '.$row['valor']);
$pdf->Ln(5);
	$pdf->setX(2);
	$pdf->Cell(5,$textypos,'CUOTA:                    '.$con);
	$pdf->Ln(5);
	$pdf->setX(2);
	$pdf->Cell(5,$textypos,'PROXIMA CUOTA:  '.$row['proximo_pago']);
$pdf->Ln(5);
	$pdf->setX(2);
	$pdf->Cell(5,$textypos,'SALDO FALTANTE: '.$deuda);

$total =0;
$off = $textypos+6;

$textypos=$off+6;
$pdf->setX(2);
$pdf->Cell(5,$textypos+6,'GRACIAS POR PREFERIRNOS ');
$pdf->output();