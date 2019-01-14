<?php
	include 'pantilla3.php';
	include '../conexion/php_conexion.php';

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
clasificacion.id_clasificacion AS clasi,
clasificacion.nombre AS ncla,
departamento.correlativo AS coDepartamento,
clasificacion.correlativo AS coClasificacion,
tipo_activo.correlativo AS CoTipo,
activo.correlativo AS coActivo,
institucion.correlativo as coInstitucion
FROM
activo
INNER JOIN usuario ON activo.idusuario = usuario.idusuario
INNER JOIN departamento ON activo.iddepartamento = departamento.id_departamento
INNER JOIN tipo_activo ON activo.idtipo = tipo_activo.id_tipo
INNER JOIN encargado ON activo.idencargado = encargado.id_encargado
INNER JOIN clasificacion ON tipo_activo.idclasificacion = clasificacion.id_clasificacion ,
institucion
WHERE tipo_activo.id_tipo=activo.idtipo and activo.iddepartamento=departamento.id_departamento
and encargado.id_encargado=activo.idencargado and activo.adquisicion = 'Donado'
 GROUP BY activo.idactivo");
                                           
     
    $fecha_actual=date("d/m/Y");                              

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','Letter');

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(95,6,utf8_decode('Lista de depreciación de activos donados.'),0,0,'C');



	$pdf->Ln(10);

	$pdf->SetFillColor(0,186,211);
	$pdf->SetFont('Arial','B',10);

	$pdf->SetX(20);
	$pdf->Cell(50,6,utf8_decode('CORRELATIVOS'),1,0,'C',1);
	$pdf->Cell(80,6,utf8_decode('ACTIVO'),1,0,'C',1);
	$pdf->Cell(35,6,utf8_decode('DEPARTAMENTO'),1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('PRECIO'),1,0,'C',1);
	$pdf->Cell(55,6,utf8_decode('ENCARGADO'),1,1,'C',1);

	while ($fila = mysqli_fetch_array($sacar)) {
               $modificar=$fila['id']; 

                                               


    $pdf->SetFont('Arial','',10);
    $pdf->SetX(20);
	$pdf->Cell(50,6, utf8_decode($fila['coInstitucion'] . " " . $fila['coDepartamento'] . " " . $fila['coClasificacion'] . " " . $fila['CoTipo'] . " " . $fila['coActivo']),1,0,'C');
	$pdf->Cell(80,6, utf8_decode($fila['ncla']),1,0,'L');
	$pdf->Cell(35,6, utf8_decode($fila['dep']),1,0,'L');
    $pdf->Cell(20,6, utf8_decode( '$'.$fila['precio']),1,0,'C');
	$pdf->Cell(55,6, utf8_decode($fila['encargado'] . " " . $fila['apellidos']),1,1,'L');
   
                                              

                                            }

	

	
	$pdf->SetFont('Arial','',10);
	
	
	
	
	$pdf->Output();
?>