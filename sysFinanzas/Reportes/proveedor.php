<?php 
	include 'plantilla2.php';
	include '../conexion/php_conexion.php';


	$sacar1 = mysqli_query($conexion, "SELECT * FROM proveedor");
     
    $fecha_actual=date("d/m/Y");                              

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(45,6,utf8_decode('Lista de Proveedores'),0,0,'C');
	$pdf->Cell(220,5, utf8_decode($fecha_actual),0,1,'C');

	$pdf->Ln(5);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',12);

	

	$pdf->Cell(5,6,utf8_decode('#'),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode('PROVEEDOR'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('CONTACTO'),1,0,'C',1);
	$pdf->Cell(25,6,utf8_decode('TELEFONO'),1,0,'C',1);
	$pdf->Cell(75,6,utf8_decode('DIRECCION'),1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	while ($fila = mysqli_fetch_array($sacar1)) {
             
             
                 $pdf->Cell(5,6, utf8_decode($fila['idproveedor']),1,0,'C');
                 $pdf->Cell(35,6, utf8_decode($fila['proveedor']),1,0,'C');   
                 $pdf->Cell(50,6, utf8_decode($fila['contacto']),1,0,'C'); 
                 $pdf->Cell(25,6, utf8_decode($fila['telefono']),1,0,'C');  
                 $pdf->Cell(75,6, utf8_decode($fila['direccion']),1,1,'C'); 

	}
	
	
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();


 ?>