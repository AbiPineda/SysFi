<?php 

	include 'plantilla2.php';
	include '../conexion/php_conexion.php';
$sacar1 = mysqli_query($conexion, 'SELECT
contable.hora,
contable.fecha,
contable.valor,
contable.tipo,
contable.concepto2,
contable.concepto1,
contable.id_contable,
tb_cliente.id_cliente,
tb_cliente.nombre_cliente,
tb_cliente.dir_cliente,
tb_cliente.dui,
tb_cliente.tel,
factura.id_fac,
resumen.id_clientes
FROM
contable
INNER JOIN factura ON contable.concepto2 = factura.factura
INNER JOIN resumen ON resumen.factura = factura.factura
INNER JOIN tb_cliente ON resumen.id_clientes = tb_cliente.id_cliente
WHERE
contable.tipo = "CXC"
GROUP BY
contable.id_contable
ORDER BY
contable.id_contable ASC
');

date_default_timezone_set('America/El_Salvador');



    $fecha_actual=date("d/m/Y");                              

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(58,6,utf8_decode('Cartera de Cliente'),0,0,'C');
	$pdf->Cell(210,5, utf8_decode($fecha_actual),0,1,'C');

	$pdf->Ln(5);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);
	

	//contable
  while ($filas = mysqli_fetch_array($sacar1)){

     $cxc= $filas['id_contable'];
      $idclie= $filas['id_cliente'];

      $fecha=$filas['fecha'];
            $hora=$filas['hora'];
        $valor=$filas['valor'];
$pdf->SetTextColor(72, 61, 139);


$clien=mysqli_query($conexion, "SELECT
tb_cliente.nombre_cliente,
tb_cliente.dir_cliente,
tb_cliente.tel
FROM
tb_cliente
WHERE
tb_cliente.id_cliente = $idclie");

while ($cli=mysqli_fetch_array($clien)) {
  $clieNom=$cli['nombre_cliente'];
  $tel=$cli['tel'];
  $dire=$cli['dir_cliente'];

}

      $pdf->Cell(40,10,'-------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 
      $pdf->SetTextColor(0, 0, 0);


      $pdf->Cell(50,10,'Cuenta por Cobrar:'.' '.$cxc,0,0,'L'); 

      $pdf->Cell(90,10,'Cliente:'.' '.$clieNom,0,0,'L'); 

      $pdf->Cell(48,10,'Telefono:'.' '.$tel,0,1,'L'); 

      $pdf->Cell(110,10,'Direccion:'.' '.$dire,0,0,'L'); 



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
abono.cuenta = $cxc
");
                  //para verificar si existen abonos

           $abono2=mysqli_query($conexion,"SELECT
abono.id_abono,
abono.cuenta,
abono.proximo_pago
FROM
abono
WHERE
abono.cuenta = $cxc
ORDER BY
abono.id_abono DESC LIMIT 1
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
                 $pdf->Cell(25,6, utf8_decode('$'.$abo['valor']),1,1,'C'); 

$totaB+=$abo['valor'];
	}
}else{
                   $pdf->Cell(165,6, utf8_decode('No Se Han Realizado Abonos'),1,1,'C'); 

}
    $pdf->Ln(3);


	
                   $pdf->Cell(40,10,'Total Deuda:'.' $'.$valor,0,0,'L'); 
      			$pdf->Cell(60);
$faltante=$valor - $totaB;

if ($faltante==0) {
 $pdf->SetTextColor(0, 0, 205);

      $pdf->Cell(50,10,'Credito Cancelado',0,1,'L'); 
}else{
 $pdf->SetTextColor(255, 0, 0);

      $pdf->Cell(50,10,'Saldo Faltante:'.' $'.$faltante,0,1,'L'); 

       }

       //mora
       if($faltante!=0){
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
 $pdf->SetTextColor(255, 0, 0);
              $pdf->Cell(170,10,'MORA: '.'Dias desde el vencimiento: '.$dias.' Dias',1,1,'C'); 


       }else {
        $pdf->SetTextColor(0, 0, 205);


              $pdf->Cell(170,10,'PAGO AL DIA',1,1,'C'); 
       }
     }
   }

       //



//$pdf->SetTextColor(72, 61, 139);


           // $pdf->Cell(40,10,'-------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 
            $pdf->SetTextColor(0, 0, 0);


}

  

     


		$pdf->Output();

 ?>