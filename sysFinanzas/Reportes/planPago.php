<?php 
	include 'plantilla4.php';
	include '../conexion/php_conexion.php';


	$sacar1 = mysqli_query($conexion, "SELECT
articulos.nombre,
articulos.valor,
inventario.pv
FROM
articulos
INNER JOIN inventario ON inventario.id_articulos = articulos.idarticulos");

$prim=$_POST['prima2'];
$inte=$_POST['interes2'];

     
    $fecha_actual=date("d/m/Y");                              

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L');


	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(140,6,utf8_decode('Plan de Pago Mesual'),0,0,'C');
	$pdf->Cell(150,5, utf8_decode($fecha_actual),0,1,'C');

	$pdf->Ln(10);

	$pdf->Cell(60,6,utf8_decode('Prima:').' $'.$prim,0,0,'C');
	$pdf->Cell(60,6,utf8_decode('Interes:').' '.$inte.'%',0,1,'C');
	$pdf->Ln(10);



	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);


	$pdf->Cell(60,6,utf8_decode('ARTICULO'),1,0,'C',1);
	$pdf->Cell(40,6,utf8_decode('PRECIO DE VENTA'),1,0,'C',1);
	$pdf->Cell(29,6,utf8_decode('6 MESES'),1,0,'C',1);
   $pdf->Cell(29,6,utf8_decode('12 MESES'),1,0,'C',1);
	$pdf->Cell(29,6,utf8_decode('18 MESES'),1,0,'C',1);
	$pdf->Cell(29,6,utf8_decode('24 MESES'),1,0,'C',1);
	$pdf->Cell(29,6,utf8_decode('30 MESES'),1,0,'C',1);
	$pdf->Cell(29,6,utf8_decode('36 MESES'),1,1,'C',1);


	$pdf->SetFont('Arial','',10);
	while ($fila = mysqli_fetch_array($sacar1)) {

////////
///


  // $articulo = $('#insumo');
                   $valor1 =$fila['pv'];
                   /////////////////////////////////////

                    $prima =$prim ;
                   
                  
                    $costo = ($valor1) - ($prima);
                   
                   //si el iva es 13%, le sumo el iva al costo 
                    $iva = 0.13;
                    $iva1 = ($costo) * ($iva);
                    $costoConIva = ($costo) + ($iva1);

                    //sumarle el interes al costo con iva que tenia
                    $interes = ($inte)/100;
                    $interes1 = ($costoConIva) * ($interes);
                    $calculo = ($costoConIva) + ($interes1);

                    $seis = ($calculo)/6;
                    $doce = ($calculo)/12;
                    $diesiocho = ($calculo)/18;
                    $veinticuatro = ($calculo)/24;
                    $treinta = ($calculo)/30;
                    $treintaseis = ($calculo)/36;
//

	$pdf->Cell(60,6,utf8_decode($fila['nombre']),1,0,'C');
	$pdf->Cell(40,6,utf8_decode('$'.$fila['valor']),1,0,'C');
	$pdf->Cell(29,6,utf8_decode('$'.round($seis,2)),1,0,'C');
   $pdf->Cell(29,6,utf8_decode('$'.round($doce,2)),1,0,'C');
	$pdf->Cell(29,6,utf8_decode('$'.round($diesiocho,2)),1,0,'C');
	$pdf->Cell(29,6,utf8_decode('$'.round($veinticuatro,2)),1,0,'C');
	$pdf->Cell(29,6,utf8_decode('$'.round($treinta,2)),1,0,'C');
	$pdf->Cell(29,6,utf8_decode('$'.round($treintaseis,2)),1,1,'C');



	}
	
	
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();


 ?>