<?php 
	include 'plantilla2.php';
	include '../conexion/php_conexion.php';


	$sacar1 = mysqli_query($conexion, "SELECT articulos.idarticulos, articulos.codigo, articulos.nombre, inventario.pv, inventario.stock
FROM articulos INNER JOIN inventario ON inventario.id_articulos = articulos.idarticulos
WHERE
inventario.stock >= 1
");
     
    $fecha_actual=date("d/m/Y");                              

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(90,6,utf8_decode('Listado de Productos en Existencia'),0,0,'C');
	$pdf->Cell(150,5, utf8_decode($fecha_actual),0,1,'C');

	$pdf->Ln(10);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);

	

	$pdf->Cell(35,6,utf8_decode('CODIGO'),1,0,'C',1);
	$pdf->Cell(70,6,utf8_decode('NOMBRE'),1,0,'C',1);
	$pdf->Cell(65,6,utf8_decode('PRECIO DE VENTA'),1,0,'C',1);
	$pdf->Cell(20,6,utf8_decode('STOCK'),1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	while ($fila = mysqli_fetch_array($sacar1)) {
             
             
                 $pdf->Cell(35,6, utf8_decode($fila['codigo']),1,0,'C');
                 $pdf->Cell(70,6, utf8_decode($fila['nombre']),1,0,'C');   
                 $pdf->Cell(65,6, utf8_decode($fila['pv']),1,0,'C'); 
                 $pdf->Cell(20,6, utf8_decode($fila['stock']),1,1,'C'); 

	}
	
	
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();


 ?>