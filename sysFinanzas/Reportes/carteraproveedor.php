<?php 

	include 'plantilla2.php';
	include '../conexion/php_conexion.php';
$sacar1 = mysqli_query($conexion, 'SELECT
contable.id_contable,
contable.concepto1,
contable.concepto2,
contable.tipo,
contable.valor,
contable.fecha,
contable.hora,
proveedor.proveedor
FROM
contable
INNER JOIN factura ON contable.concepto2 = factura.factura
INNER JOIN resumen_compra ON resumen_compra.factura = factura.factura
INNER JOIN proveedor ON resumen_compra.id_proveedor = proveedor.idproveedor
WHERE
contable.tipo = "CXP"
ORDER BY
contable.id_contable ASC');




    $fecha_actual=date("d/m/Y");                              

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(45,6,utf8_decode('Cartera de Proveedores'),0,0,'C');
	$pdf->Cell(220,5, utf8_decode($fecha_actual),0,1,'C');

	$pdf->Ln(5);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);
	

	//contable
  while ($filas = mysqli_fetch_array($sacar1)){

     $cxp= $filas['id_contable'];
      $prov= $filas['proveedor'];
      $fecha=$filas['fecha'];
            $hora=$filas['hora'];
        $valor=$filas['valor'];


      $pdf->Cell(40,10,'-------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 

      $pdf->Cell(30,10,'Cuenta por pagar:'.' '.$cxp,0,0,'L'); 
      			$pdf->Cell(20);

      $pdf->Cell(48,10,'Proveedor:'.' '.$prov,0,0,'L'); 

  			$pdf->Cell(14);

      $pdf->Cell(40,10,'Fecha de Credito:'.' '.$fecha.' '.$hora,0,1,'L');


      //abono------------------
      //
      $abono=mysqli_query($conexion,"SELECT
abono.id_abono,
abono.cuenta,
abono.valor,
abono.fecha,
abono.hora,
abono.nota
FROM
abono
WHERE
abono.cuenta = $cxp;
");
          
          $pdf->Cell(40,10,'ABONOS REALIZADOS',0,1,'L'); 

    
	$pdf->Cell(60,6,utf8_decode('FECHA'),1,0,'C',1);
	$pdf->Cell(80,6,utf8_decode('OBSERVACION'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('VALOR'),1,1,'C',1);

$totaB=0;
	while ($abo = mysqli_fetch_array($abono)) {

                 $pdf->Cell(60,6, utf8_decode($abo['fecha'].' '.$abo['hora']),1,0,'C');   
                 $pdf->Cell(80,6, utf8_decode($abo['nota']),1,0,'C'); 
                 $pdf->Cell(25,6, utf8_decode($abo['valor']),1,1,'C'); 

$totaB+=$abo['valor'];
	}

	
                   $pdf->Cell(40,10,'Total Deuda:'.' '.$valor,0,0,'L'); 
      			$pdf->Cell(60);
$faltante=$valor - $totaB;

if ($faltante==0) {
 $pdf->SetTextColor(0, 0, 205);

      $pdf->Cell(50,10,'Credito Cancelado',0,1,'L'); 
}else{
 $pdf->SetTextColor(255, 0, 0);

      $pdf->Cell(50,10,'Saldo Faltante:'.' '.$faltante,0,1,'L'); 

       }

$pdf->SetTextColor(0, 0, 0);


            $pdf->Cell(40,10,'-------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 
}

  

     


		$pdf->Output();

 ?>