<?php
	include 'plantilla2.php';
	include '../conexion/php_conexion.php';

	$modi = $_GET['ir'];

	date_default_timezone_set('America/El_Salvador');
	$fecha_actual2=date("d-m-Y");
	$hora=date("H:i:s");

	$sacar = mysqli_query($conexion, "SELECT
activo.fecha_adquisicion AS fecha,
activo.idactivo AS id,
usuario.nombre AS nombreUser,
departamento.nombre AS dep,

tipo_activo.idclasificacion,
tipo_activo.nombre AS tipo,
encargado.nombre AS encargado,
encargado.apellidos,
activo.precio AS precio,
clasificacion.id_clasificacion as clasi,
clasificacion.nombre as ncla,
activo.tiempo_uso as tiempoMeses,
clasificacion.tiempo_depreciacion AS meses
FROM
activo
INNER JOIN usuario ON activo.idusuario = usuario.idusuario
INNER JOIN departamento ON activo.iddepartamento = departamento.id_departamento

INNER JOIN tipo_activo ON activo.idtipo = tipo_activo.id_tipo
INNER JOIN encargado ON activo.idencargado = encargado.id_encargado
INNER JOIN clasificacion ON tipo_activo.idclasificacion = clasificacion.id_clasificacion

 WHERE activo.idactivo='$modi'");
                                     while ($fila = mysqli_fetch_array($sacar)) {
                                                      $modificar=$fila['id'];
                                                      $clasificacion = $fila['ncla'];
                                                      $fecha1 = $fila['fecha'];
                                                        $partes = explode('-', $fecha1);
                                                $fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";



                                                      $precio = $fila['precio'];
                                                      $tipo = $fila['tipo'];
                                                      $encargado = $fila['encargado'];
                                                      $apellidos = $fila['apellidos'];
                                                      $departamento = $fila['dep'];
                                                      $meses = $fila['meses'];
                                                      $tiempoUso = $fila['tiempoMeses'];

                                                      $veces = $meses-$tiempoUso;


                                                     }
		 
     $fecha_actual=date("Y-m-d");
     $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    // $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");                             

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(249,249,249);
	$pdf->SetFont('Arial','B',10.5);

	
	$pdf->SetX(55);
	$pdf->Cell(90,6,utf8_decode('Clasificación'),0,1,'C',1);
	$pdf->Image('images/clasifi.png', 82, 38, 6 );
	$pdf->SetFont('Arial','',11);
	$pdf->SetX(55);
	$pdf->Cell(90,6,utf8_decode($clasificacion),0,1,'C',0);

	$pdf->Ln(5);

	$pdf->SetFillColor(249,249,249);
	$pdf->SetFont('Arial','B',10.5);
	$pdf->SetX(55);
	$pdf->Cell(90,6,utf8_decode('Tipo'),0,1,'C',1);
	$pdf->Image('images/clasifi.png', 87, 55, 6 );
	$pdf->SetFont('Arial','',11);
	$pdf->SetX(55);
	$pdf->Cell(90,6,utf8_decode($tipo),0,1,'C',0);

	$pdf->Ln(5);
	$pdf->SetX(50);
	$pdf->SetFillColor(249,249,249);
	$pdf->SetFont('Arial','B',10.5);
	$pdf->Cell(50,6,utf8_decode('Fecha de adquisición'),0,0,'C',1);
	$pdf->Image('images/Datee.png', 49, 72, 5 );
	$pdf->Cell(50,6,utf8_decode('Valor del articulo'),0,1,'C',1);
	$pdf->Image('images/dinero.png', 102, 72, 4 );

	
	$pdf->SetX(50);
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(50,6,utf8_decode($fecha),0,0,'C',0);
	$pdf->Cell(50,6,utf8_decode('$'.$precio),0,0,'C',0);
	

	$pdf->Ln(10);
	$pdf->SetFillColor(249,249,249);
	$pdf->SetFont('Arial','B',10.5);
	$pdf->Cell(55,6,utf8_decode('Encargado'),0,0,'C',1);
	$pdf->Image('images/user.png', 17, 87, 6 );
	$pdf->Cell(50,6,utf8_decode('Departamento'),0,0,'C',1);
	$pdf->Image('images/edificio.png', 68, 88, 6 );
	$pdf->Cell(40,6,utf8_decode('Vida útil (Meses)'),0,0,'C',1);
	$pdf->Image('images/etiqueta.png', 112, 88, 6 );
	$pdf->Cell(45,6,utf8_decode('Tiempo de uso (Meses)'),0,1,'C',1);
	$pdf->Image('images/etiqueta.png', 151, 88, 6 );


	$pdf->SetFont('Arial','',11);
	$pdf->Cell(55,6,utf8_decode($encargado . " " . $apellidos),0,0,'L',0);
	$pdf->Cell(50,6,utf8_decode($departamento),0,0,'C',0);
	$pdf->Cell(40,6,utf8_decode($meses),0,0,'C',0);
	$pdf->Cell(40,6,utf8_decode($tiempoUso),0,1,'C',0);

	$pdf->Ln(10);
	$pdf->Cell(80,6,utf8_decode('Método de Línea Recta - Depreciación en Meses'),0,1,'L',0);
	$pdf->Ln(7);
	$pdf->SetX(20);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode('Año'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Valor del activo'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Depreciación'),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('Valor neto'),1,1,'C',1);


	$pdf->SetFont('Arial','',11);
	if ($fila['clasi'] == "1")
                        $veces = 2;
                    if ($fila['clasi'] == "2")
                        $veces = 4;
                    if ($fila['clasi'] == "3")
                        $veces = 5;
                    if ($fila['clasi'] == "4")
                        $veces = 20;
                    if ($fila['clasi'] == "5")
                        $veces = 0;
                    $ano = explode('-', $fila['fecha']);
                    $ano1 = $ano[0];
                    $valor = $precio;
                    $depre = $valor / $veces;
                    $vn = $valor - $depre;

                    //Variables a imprimir

                    for ($i = 0; $i < $veces; $i++) { 
                    	$pdf->SetX(20);
                    	$pdf->Cell(40,6,utf8_decode($i+1),1,0,'C');
                    	$pdf->Cell(50,6,utf8_decode($valor),1,0,'C');
                    	$pdf->Cell(50,6,utf8_decode(round($depre,2)),1,0,'C');
                    	$pdf->Cell(30,6,utf8_decode(round($vn,2)),1,1,'C');

                    	 $vn = $vn - $depre;
                    }


	
	$pdf->Output();
?>