<?php
	include 'plantillaGarantia.php';
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

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(125,10, utf8_decode('Felicidades Usted ha recibido un producto de calidad garantizada.'),0,1,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(190,5, utf8_decode('Su producto está cubierto por un tiempo de_______ a partir de la fecha de compra por daños o desperfectos'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('de fabricación durante el período de garantía.'),0,1,'L');

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetX(22);
	$pdf->Cell(60,6,utf8_decode('PRODUCTO'),1,0,'L',0);
	$pdf->Cell(100,6,utf8_decode(''),1,1,'L',0);
	$pdf->SetX(22);
	$pdf->Cell(60,6,utf8_decode('FACTURA'),1,0,'L',0);
	$pdf->Cell(100,6,utf8_decode(''),1,1,'L',0);
	$pdf->SetX(22);
	$pdf->Cell(60,6,utf8_decode('FECHA DE COMPRA'),1,0,'L',0);
	$pdf->Cell(100,6,utf8_decode(''),1,1,'L',0);
	$pdf->SetX(22);
	$pdf->Cell(60,6,utf8_decode('NOMBRE'),1,0,'L',0);
	$pdf->Cell(100,6,utf8_decode(''),1,1,'L',0);
	$pdf->SetX(22);
	$pdf->Cell(60,6,utf8_decode('DIRECCIÓN'),1,0,'L',0);
	$pdf->Cell(100,6,utf8_decode(''),1,1,'L',0);
 
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(190,5, utf8_decode('Será responsabilidad del cliente el presentar la factura como el presente certificado para hacer valer la garantía, como'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('también tener pleno conocimiento que la garantía no aplicará en los casos que la falla sea por causas que se determinen'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('en las condiciones del certificado que más adelante se detallan, además estar al día en sus pagos (en caso exista un'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('crédito) para poder interponer su reclamo por garantía.'),0,1,'L');
	$pdf->Ln(5);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,5, utf8_decode('Condiciones del certificado'),0,1,'L');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(34,5, utf8_decode('Casos por los que'),0,0,'L');
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(22,5, utf8_decode('NO APLICA'),0,0,'L');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(22,5, utf8_decode('la garantía.'),0,1,'L');

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,5, utf8_decode('Línea blanca'),0,1,'L');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(40,5, utf8_decode('Refrigeración y congeladores:'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('a) Invasión de reptiles, roedores, insectos, polvo y cualquier cuerpo externo; b) Falta de polarización (cuando se '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('anula al tercer pin de la extensión o se usa tomacorrientes de dos clavijas), modificaciones eléctricas; c) Falta '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('de documentación con registro de fecha de compra; d) uso inadecuado o mala aplicación del producto; e) Daños'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode(' en puertas, anaqueles, parrillas, bisagras, pines de soporte, gavetas, originados por peso inadecuado o manejo'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('incorrecto; f) Daños por no respetar el periodo de reposo previo a la conexión en toma corriente; g) Chapas y '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('llaves; h) Dispensadores de agua, haladeras, empaques, rodos, focos o lines (partes plásticas del interior); i)'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('Pinchaduras (abertura de cualquier naturaleza en paredes del congelador o tuberías a causa de objetos corto'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('punsantes) en congeladores de cualquier naturaleza; j) Mantenimientos en sistema de descongelación automá'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('ticos o manuales procesos de limpieza k) No cubrirá aquellos bienes que hayan sido expuestos a cambios de'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('voltaje.'),0,1,'L');
	$pdf->Ln(5);

	$pdf->Cell(190,5, utf8_decode('Lavadoras y secadoras'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('a) Invasión de reptiles, roedores, insectos, polvo y cualquier cuerpo externo; b) Falta de polarización (cuando se '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('anula al tercer pin de la extensión o se usa tomacorrientes de dos clavijas), modificaciones eléctricas; c) Falta '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('de documentación con registro de fecha de compra; d) uso inadecuado o mala aplicación del producto; e) Daños'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('en tinta por cuerpos extraños; f) No respetar la capacidad de peso ropa mojada; g) Daños originados en placas'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode(' electrónicas, tensores y oxidación debido al llenado de la tinta; h) Mala instalación y nivelación del suelo donde'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('se usa la lavadora; i) Deterioro de arenes eléctrico (sistema de cableado principal), mangueras de llenado o '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('drenaje a causa de mordidas de animales, insectos, uso o manejo inadecuado; j) No cubrirá aquellos bienes que '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('hayan sido expuestos a cambios de voltaje. k) Mantenimiento en atrapa motas, ventiladores y problemas '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('relacionados en secadoras y lavadoras.'),0,1,'L');

	$pdf->Ln(5);
	$pdf->Cell(190,5, utf8_decode('Cocinas y planchas de pupusas.'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('a) Invasión de reptiles, roedores, insectos, polvo y cualquier cuerpo externo; b) Falta de polarización (cuando se '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('anula al tercer pin de la extensión o se usa tomacorrientes de dos clavijas), modificaciones eléctricas; c) Falta '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('de documentación con registro de fecha de compra; d) uso inadecuado o mala aplicación del producto; e) Falta'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode(' de mantenimiento o limpieza; f) Modificaciones o malas aplicaciones; g) Válvulas o mangueras para el o '),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('suministro de gas; h) parrillas, quemadores, o accesorios para horno, superficie de metal, heladeras o clavijas'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('para ajustes de gas, niples.'),0,1,'L');

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(60,5, utf8_decode('Madera y camas'),0,1,'L');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(190,5, utf8_decode('Muebles de sala, dormitorio, cocina y comedores.'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('a) Daños por humedad, golpes, acabados de pintura (aplica para sillas de madera o metal); b) Falta de documen'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('tación con registro de fecha de compra; c) Vidrios y espejos; d) Sillas, patas, haladeras, rodos, los cuales se'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode('determine están sibrecargados o se les aplique demasiada fuerza.'),0,1,'L');
	$pdf->Cell(190,5, utf8_decode(''),0,1,'L');
	$pdf->Cell(190,5, utf8_decode(''),0,1,'L');

	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>