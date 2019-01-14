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
GROUP BY
contable.id_contable
ORDER BY
contable.id_contable ASC');

date_default_timezone_set('America/El_Salvador');



    $fecha_actual=date("d/m/Y");                              

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(58,6,utf8_decode('Cartera de Proveedores'),0,0,'C');
	$pdf->Cell(210,5, utf8_decode($fecha_actual),0,1,'C');

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
$pdf->SetTextColor(72, 61, 139);

      $pdf->Cell(40,10,'-------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 
      $pdf->SetTextColor(0, 0, 0);


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
                  //para verificar si existen abonos

           $abono2=mysqli_query($conexion,"SELECT
abono.id_abono,
abono.cuenta,
abono.proximo_pago

FROM
abono
WHERE
abono.cuenta = $cxp;
"); 
          $pdf->Cell(40,10,'ABONOS REALIZADOS',0,1,'L'); 

   // $a=mysqli_fetch_array($abono);

	$pdf->Cell(60,6,utf8_decode('FECHA'),1,0,'C',1);
	$pdf->Cell(80,6,utf8_decode('OBSERVACION'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('VALOR'),1,1,'C',1);

$totaB=0;

  $abo2 = mysqli_fetch_array($abono2);

  //mora
 $aa=date("Y", strtotime($abo2['proximo_pago']));
 $mm=date("m", strtotime($abo2['proximo_pago']));
 $dd=date("d", strtotime($abo2['proximo_pago']));



$fecha2=$aa.''.$mm.''.$dd;
 $fecha3=date('Ymd'); 

 $mora=($fecha2-$fecha3);
//fin


if(!empty($abo2)){


	while ($abo = mysqli_fetch_array($abono)) {

                 $pdf->Cell(60,6, utf8_decode($abo['fecha'].' '.$abo['hora']),1,0,'C');   
                 $pdf->Cell(80,6, utf8_decode($abo['nota']),1,0,'C'); 
                 $pdf->Cell(25,6, utf8_decode($abo['valor']),1,1,'C'); 

$totaB+=$abo['valor'];
	}
}else{
                   $pdf->Cell(165,6, utf8_decode('No Se Han Realizado Abonos'),1,1,'C'); 

}
    $pdf->Ln(3);


	
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

       //mora
       
       if(!empty($abo2)){
        if($mora<=0){

                        //$pdf->Cell(170,10,'MORA: '.$mora,1,1,'C'); 

 $mora2=($fecha3-$fecha2);
 //$td=date('t');
    $fecha_i=$abo2['proximo_pago'];

$fecha_f=date('Y-m-d'); ;
  $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
  $dias   = abs($dias); $dias = floor($dias);  


  $pdf->Ln(5);
$pdf->SetTextColor(0, 0, 205);
              $pdf->Cell(170,10,'MORA: '.'Dias desde el vencimiento: '.$dias.' Dias',1,1,'C'); 


       }else {
        $pdf->SetTextColor(0, 0, 205);


              $pdf->Cell(170,10,'PAGO AL DIA',1,1,'C'); 
       }
     }

       //



//$pdf->SetTextColor(72, 61, 139);


           // $pdf->Cell(40,10,'-------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 
            $pdf->SetTextColor(0, 0, 0);

}

  

     


		$pdf->Output();

 ?>