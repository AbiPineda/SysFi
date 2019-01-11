<?php
	include 'plantilla.php';
	include '../conexion/php_conexion.php';

	$modi = $_GET['ir'];
	
	$sacar = mysqli_query($conexion, "SELECT*FROM tb_cliente INNER JOIN contable ON tb_cliente.id_cliente=contable.concepto1 WHERE contable.concepto1='$modi' AND tipo='CXC'");
			while ($fila = mysqli_fetch_array($sacar)) {
			    $modificar = $fila['id_cliente'];
			    $nombreCliente = $fila['nombre_cliente'];
			    $valor=$fila['valor'];
			    $dui = $fila['dui'];
			    $interes=$fila['interes'];


			    $micadena=strval($valor);

			}
    

     $sacar2 = mysqli_query($conexion, "SELECT * FROM institucion");
     while ($fila = mysqli_fetch_array($sacar2)) {
				 $id=$fila['idInstitucion'];
				 $nomInstitucion=$fila['nombre']; 
                 $abre=$fila['abreviatura']; 
                 $dire=$fila['direccion'];  
                 $idtribu=$fila['ideTributaria'];                                
	}	 
     $fecha_actual=date("Y-m-d");
     $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
     $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");                             

	
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','',11);
	$pdf->Cell(100,5, utf8_decode('Yo ________________________________'),0,1,'L');

                 $pdf->SetFont('Arial','B',11);  
                 $pdf->SetXY(16,38);
                 $pdf->Cell(65,5, utf8_decode( $nombreCliente),0,0,'C');                                 
		
   	$pdf->SetFont('Arial','',11);
   	$pdf->SetXY(86,38);
   	$pdf->Cell(120,5, utf8_decode('mayor de edad, DECLARO QUE DEBO Y PAGARÉ SIN PROTESTO'),0,1,'L');
   	$pdf->Cell(170,5, utf8_decode('e incondicionalmente a la sociedad salvadoreña denominada'),0,1,'L');
 
                 $pdf->SetFont('Arial','B',11);
                 $pdf->SetXY(117,43);
                 $pdf->Cell(63,5, utf8_decode($abre),0,0,'L');                                 
	

	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(181,43);
	$pdf->Cell(25,5, utf8_decode('que puede '),0,1,'L');
	$pdf->Cell(20,5, utf8_decode('abreviarse'),0,1,'L');
  
                 $pdf->SetFont('Arial','B',11);
                 $pdf->SetXY(30,48);
                 $pdf->Cell(65,5, utf8_decode($nomInstitucion),0,0,'L');                                 
	

	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(68,48);
	$pdf->Cell(25,5, utf8_decode('del domicilio de'),0,1,'L');	
	  
                 $pdf->SetFont('Arial','B',11);
                 $pdf->SetXY(97,48);
                 $pdf->Cell(30,5, utf8_decode($dire),0,0,'L');                                 
			

	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(120,48);
	$pdf->Cell(25,5, utf8_decode('con número de Identificación Tributaria'),0,1,'L');

				 $pdf->SetFont('Arial','B',11);
				 $pdf->Cell(37,5, utf8_decode($idtribu),0,0,'L');

	$pdf->SetFont('Arial','',11);
	$pdf->SetX(45);
	$pdf->Cell(25,5, utf8_decode('la cantidad de'),0,0,'L');


				$pdf->SetFont('Arial','B',11);
			    $pdf->SetX(70);		
				$pdf->Cell(25,5, utf8_decode('$'.$valor.' '.'dólares'),0,0,'L');

	$pdf->SetFont('Arial','',11);
	$pdf->SetX(95);
	$pdf->Cell(110,5, utf8_decode('que devengará el interés convencional y nominal mensual del'),0,1,'L');	

				$pdf->SetFont('Arial','B',11);		 	
				$pdf->Cell(9,5, utf8_decode($interes.'%'),0,0,'L');	

	$pdf->SetFont('Arial','',11);
	$pdf->SetX(17);
	$pdf->Cell(191,5, utf8_decode('ajustables y pagaderos al vencimiento, que se adeudarán desde este día hasta la fecha de pago del presente'),0,1,'L');
	$pdf->Cell(150,5, utf8_decode('pagaré, ambas fechas inclusive. En caso de mora reconoceré un interés adicional del'),0,0,'L');	

				$pdf->SetFont('Arial','B',11);
			    $pdf->SetX(159);			 	
				$pdf->Cell(12,5, utf8_decode('5%'),0,0,'L');

	$pdf->SetFont('Arial','',11);
	$pdf->SetX(166);	
	$pdf->Cell(151,5, utf8_decode('mensual sobre saldos'),0,1,'L');		
	$pdf->Cell(195,5, utf8_decode('en mora. El pago se hará en dólares de los Estados Unidos de América, sin deducción alguna por impuestos o'),0,1,'L');
	$pdf->Cell(102,5, utf8_decode('cualquier otra causa. Dicho pago deberá ser efectuado en'),0,0,'L');

				$pdf->SetFont('Arial','B',11);
				$pdf->SetX(91);
                $pdf->Cell(64,5, utf8_decode($dire),0,0,'C');

    $pdf->SetFont('Arial','',11);
	$pdf->SetX(135);
	$pdf->Cell(50,5, utf8_decode('o en cualquier otro lugar de'),0,1,'L'); 

				$pdf->SetFont('Arial','B',11);
                $pdf->Cell(37,5, utf8_decode($nomInstitucion),0,0,'L');

    $pdf->SetFont('Arial','',11);
    $pdf->SetX(47);			
	$pdf->Cell(160,5, utf8_decode('el día de fecha de pago; en requerir notificación previa de cobro. Será a mi cargo cualquier'),0,1,'L');
	$pdf->Cell(196,5, utf8_decode(' el cobro judicial o extrajudicial de este pagaré, incluyendo los costos procesales y las denominadas personales'),0,1,'L');
	$pdf->Cell(160,5, utf8_decode('aun cuando de conformidad a las reglas generales no sea condenado a su pago, y faculto a'),0,0,'L');

				 $pdf->SetFont('Arial','B',11);
                 $pdf->SetX(170);
                 $pdf->Cell(55,5, utf8_decode($nomInstitucion),0,1,'L'); 	


    $pdf->SetFont('Arial','',11);			
	$pdf->Cell(195,5, utf8_decode('para que designe a la persona que depositaria de los bienes que se me embarguen,a quien relevo de la obligación'),0,1,'L');
	$pdf->Cell(196,5, utf8_decode('de rendir fianza y cuentas. Para cualquier acción o procedimiento legal o judicial relacionado con este pagaré'),0,1,'L');	
	$pdf->Cell(35,5, utf8_decode('señalo la ciudad de'),0,0,'L');

				 $pdf->SetFont('Arial','B',11);
				 $pdf->SetX(46);
                 $pdf->Cell(64,5, utf8_decode($dire),0,0,'L'); 


    $pdf->SetFont('Arial','',11);
    $pdf->SetX(72);			
	$pdf->Cell(135,5, utf8_decode('Republica de El Salvador, como domicilio especial y me someto a la '),0,1,'L');
	$pdf->Cell(135,5, utf8_decode('jurisdicción de los tribunales de dicha ciudad.'),0,1,'L');

	$pdf->SetFont('Arial','',10);
	$pdf->SetXY(115,210);
	$pdf->Cell(135,5, utf8_decode('Dado en San Vicente,'),0,1,'L');
	$pdf->SetXY(150,210);
	$pdf->Cell(135,5, utf8_decode($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y').'.'),0,1,'L');

	$pdf->SetY(250);
	$pdf->Cell(135,5, utf8_decode('F._____________________________'),0,1,'L');

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>