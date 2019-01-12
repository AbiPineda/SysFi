<?php
	include 'plantillaFactura.php';
	include '../conexion/php_conexion.php';

	$id = $_GET['x'];

	$sql = mysqli_query($conexion, "SELECT * FROM contable WHERE id_contable='$id' and tipo='CXC'");
    if ($row = mysqli_fetch_array($sql)) {
    	$idCont=$row['id_contable'];
        $concepto1 = $row['concepto1'];
        $fecha = $row['fecha'];
        $intento = explode("-", $row['fecha']);
        $a = $intento[2];
        $concepto2 = $row['concepto2'];
        $hora = $row['hora'];
        $deuda = $row['valor'];
        $inte = $row['interes'];
        $cuota = $row['cuota'];
        $interesT = $row['to_interes'];
        $plazo=$row['meses'];
        $abonoAC=$row['valor'];
        $conCliente = (int) $row['concepto1'];
        $cliente = mysqli_query($conexion, "SELECT*FROM tb_cliente WHERE id_cliente='$conCliente'");

        while ($roww = mysqli_fetch_array($cliente)) {
        	 $idCliente = $roww['id_cliente'];
            $c_nombre = $roww['nombre_cliente'];
            $dui=$roww['dui'];
            $telefono=$roww['tel'];
            $direccion=$roww['dir_cliente'];

            $otra = mysqli_query($conexion, "SELECT*FROM abono WHERE cuenta='$idCont'"); 

            while ($rowww = mysqli_fetch_array($otra)) {
           
            $abonoAC=$rowww['valor'];
            $fechaAbono=$rowww['fecha'];
           
            $partes=explode('-', $fechaAbono);
            $fechaa="{$partes[2]}-{$partes[1]}-{$partes[0]}";

        }

        }
}
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A5');

	$pdf->SetFont('Arial','',11);
	$pdf->Cell(100,5, utf8_decode('Nombre: _____________________________'),0,0,'L');

	$pdf->SetFont('Arial','B',11);  
                 $pdf->SetXY(28,35);
                 $pdf->Cell(65,5, utf8_decode($c_nombre),0,0,'C'); 

    $pdf->SetFont('Arial','',11);      
	$pdf->SetX(100);
	$pdf->Cell(45,5, utf8_decode('DUI: ______________'),0,0,'L');

	$pdf->SetFont('Arial','B',11);  
                 $pdf->SetXY(90,35);
                 $pdf->Cell(65,5, utf8_decode($dui),0,0,'C'); 			

    $pdf->SetFont('Arial','',11); 
	$pdf->SetX(145);
	$pdf->Cell(45,5, utf8_decode('Teléfono: ______________'),0,1,'L');

	$pdf->SetFont('Arial','B',11);  
                 $pdf->SetXY(145,35);
                 $pdf->Cell(65,5, utf8_decode($telefono),0,1,'C');

    $pdf->SetFont('Arial','',11); 
	$pdf->Cell(90,17, utf8_decode('Dirección: ________________________'),0,0,'L');

	$pdf->SetFont('Arial','B',11);  
                 $pdf->SetXY(20,46);
                 $pdf->Cell(65,5, utf8_decode($direccion),0,0,'C');

    $pdf->SetFont('Arial','',11);
    $pdf->SetXY(85,44); 
	$pdf->Cell(40,10, utf8_decode('Cuota mensual: ____________'),0,0,'L');

	$pdf->SetFont('Arial','B',11);  
                 $pdf->SetXY(90,46);
                 $pdf->Cell(65,5, utf8_decode('$'.$cuota),0,0,'C');


    $pdf->SetFont('Arial','',11);
	$pdf->SetX(145);
	$pdf->Cell(45,5, utf8_decode('Abono a cuenta: ___________'),0,0,'L');

	$pdf->SetFont('Arial','B',11);  
                 $pdf->SetXY(152,46);
                 $pdf->Cell(65,5, utf8_decode('$'.$abonoAC),0,0,'C');

	//$pdf->SetXY(155,58);
	//$pdf->Cell(45,5, utf8_decode('Fecha:'),0,1,'L');

	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(150,100);
	$pdf->Cell(65,5, utf8_decode('Emitido:'.' '.$fechaa),0,0,'C');
	$pdf->SetY(120);
	$pdf->Cell(150,5, utf8_decode('Para evitar los recargos por mora le recomendamos hacer sus pagos puntuales.'),0,1,'L');


	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>