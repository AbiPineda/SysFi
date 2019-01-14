<?php
	include 'pantilla3.php';
	include '../conexion/php_conexion.php';

	 $sacar = mysqli_query($conexion, "SELECT
                            institucion.correlativo as coInstitucion,
                            departamento.correlativo as coDepartamento,
                            clasificacion.correlativo as coClasificacion,
                            tipo_activo.correlativo as CoTipo,
                            activo.correlativo as coActivo,
                            tipo_activo.nombre as nombreActivo,
                            departamento.nombre as nombreDepartamento,
                            institucion.nombre as nombreInstituciion,
                            encargado.nombre ,
                            encargado.apellidos,
                            activo.fecha_adquisicion,
                            activo.precio,
                            activo.tiempo_uso,
                            activo.estado,
                            clasificacion.tiempo_depreciacion,
                            clasificacion.vidautil

                            FROM
                            activo
                            INNER JOIN departamento ON activo.iddepartamento = departamento.id_departamento
                            INNER JOIN institucion ON departamento.idinstitucion = institucion.idInstitucion
                            INNER JOIN tipo_activo ON activo.idtipo = tipo_activo.id_tipo
                            INNER JOIN clasificacion ON tipo_activo.idclasificacion = clasificacion.id_clasificacion
                            INNER JOIN encargado ON activo.idencargado = encargado.id_encargado");
                                           
     
    $fecha_actual=date("d/m/Y");                              

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','Letter');

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(45,6,utf8_decode('Lista de activos registrados.'),0,0,'C');
	$pdf->SetX(230);
	$pdf->Cell(40,5, utf8_decode('Fecha:'.' '.$fecha_actual),0,1,'C');

	$pdf->Ln(5);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',10);

	$pdf->SetX(20);
	$pdf->Cell(50,6,utf8_decode('CORRELATIVOS'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('ACTIVO'),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode('DEPARTAMENTO'),1,0,'C',1);
	$pdf->Cell(55,6,utf8_decode('ENCARGADO'),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode('F. ADQUISICIÓN'),1,0,'C',1);
	$pdf->Cell(20,6,utf8_decode('PRECIO'),1,1,'C',1);
	 while ($fila = mysqli_fetch_array($sacar)) {

                                                //correlativos
                                                $coInstitucion = $fila['coInstitucion'];
                                                $coDepartamento = $fila['coDepartamento'];
                                                $coClasificacion = $fila['coClasificacion'];
                                                $CoTipo = $fila['CoTipo'];
                                                $coActivo = $fila['coActivo'];

                                                //Nombre de Institucion, departamento, activo
                                                $nombreActivo = $fila['nombreActivo'];
                                                $nombreInstituciion = $fila['nombreInstituciion'];
                                                $nombreDepartamento = $fila['nombreDepartamento'];

                                                //Nombre de Encargado
                                                $nombre = $fila['nombre'];
                                                $apellidos = $fila['apellidos'];

                                                //otros datos del activo
                                                $fecha_adquisicion = $fila['fecha_adquisicion'];
                                                $precio = $fila['precio'];
                                                $estado = $fila['estado'];
                                                $meses = $fila['tiempo_depreciacion'];
                                                $anio = $fila['vidautil'];


                                                $partes = explode('-', $fecha_adquisicion);
                                                $fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";


    $pdf->SetFont('Arial','',10);
    $pdf->SetX(20);
	$pdf->Cell(50,6, utf8_decode($coInstitucion.'-'.$coDepartamento.'-'.$coClasificacion.'-'.$CoTipo.'-'.$coActivo),1,0,'C');
	$pdf->Cell(50,6, utf8_decode($nombreActivo),1,0,'L');
	$pdf->Cell(35,6, utf8_decode($nombreDepartamento),1,0,'L');
	$pdf->Cell(55,6, utf8_decode($nombre.' '.$apellidos),1,0,'L');
    $pdf->Cell(30,6, utf8_decode($fecha),1,0,'C');
    $pdf->Cell(20,6, utf8_decode('$'.$precio),1,1,'C');
                                              

                                            }

	

	
	
	


	
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>