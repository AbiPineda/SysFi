<?php
    include_once '../conexion/php_conexion.php';
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';

     $modi = $_GET['ir'];
     
 ?>
<head>
    <style>
        input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid rgb(25, 158, 218);
  border-radius: 10px;
}

    </style>
</head>
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!--AQUI TODOO EL CONTENIDO-->
                    <div class="col-md-12">
                        
                         <div class="panel panel-green">
                        <div class="panel-heading">
                             DEPRECIACION
                        </div>
                        <div class="panel-body">   
               
            <div class="row">
                <div class="col-md-12" >
               
                              <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                            <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
                   

                                         <?php
                                    include_once '../conexion/php_conexion.php';
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
                                                       ?>
                                            
                        
                            
                         </div>
                           <div>
                
                <table id="no_imp" class="table table-striped table-bordered">
                    <tbody>
                        <tr class="text-accent-1">
                            
                            <td style="height:10px;" ><div class="col m12">
                                 <div class="input-field col m12">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <label for="textarea1"  class="active" style="font-size:16px">Clasificacion</label><br>
                                        <input type="text" id="ver_cod_depre" name="ver_cod_depre" value="<?php echo $clasificacion ?>"  minlength="8" class="text-center validate" readonly=""   >

                            </div></td>
                            <td style="height:10px;"><div class="col m12">
                                    <div class="input-field col m12">
                                        <i class="fa fa-calendar prefix" aria-hidden="true"></i>
                                        <label for="fecha_pub"  class="active" style="font-size:16px">Fecha Adquisición</label><br>
                                        <input type="text" name="ver_fecha_depre" value="<?php echo $fecha?>"  id="ver_fecha_depre" class="text-center validate" readonly=""   >
                                    </div>
                                </div></td>
                        </tr>
                        <tr class="text-accent-1" >
                            
                            <td style="height:10px;">
                                <div class="input-field col m12">
                                    <i class="fa fa-usd prefix"></i> 
                                    <label for="precioUnitario" style="font-size:16px">Valor del Activo<small></small> </label><br>
                                    <input type="text" name="ver_valor" value="<?php echo $precio; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
                                </div>
                            </td>
                             <td style="height:10px;">
                                <div class="input-field col m12">
                                    <i class="fa fa-info prefix"></i> 
                                    <label for="precioUnitario" style="font-size:16px">Tipo<small></small> </label><br>
                                    <input type="text" name="ver_valor" value="<?php echo $tipo; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
                                </div>
                            </td>
                        </tr>
                        <tr class="text-accent-1" >



                           



                            <td style="height:10px;">
                                <div class="input-field col m12">
                                    
                                    <i class="fa fa-user prefix"></i> <label for="precioUnitario" style="font-size:16px">Encargado<small></small> </label><br>
                                    <input type="text" name="ver_valor" value="<?php echo $encargado . " " . $apellidos; ?>" step="any" id="ver_valor"  class="text-center validate" readonly="">
                                   
                                </div>
                            </td>
                            <td >
                                <div class="input-field col m12">
                                    <i class="fa fa-building-o prefix"></i> <label for="precioUnitario" style="font-size:16px">Departamento<small></small> </label><br>
                                    <input type="text" name="ver_valor" value="<?php echo $departamento; ?>"min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">

                                </div>
                            </td>
                        </tr>
                        <tr class="text-accent-1" >
                           
                            <td >
                                <div class="input-field col m12">
                                    <i class="fa fa-calendar prefix"></i> <label for="precioUnitario" style="font-size:16px">Vida Util (Meses)<small></small> </label><br>
                                    <input type="text" name="ver_valor" value="<?php echo $meses; ?>"min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">

                                </div>
                            </td> 

                            <td style="height:10px;">
                                <div class="input-field col m12">
                                    <i class="fa fa-calendar prefix"></i> <label for="precioUnitario" style="font-size:16px">Tiempo de Uso (Meses)<small></small> </label><br>
                                    <input type="text" name="ver_valor" value="<?php echo $tiempoUso; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">

                                </div>
                            </td>
                            
                        </tr>

                    </tbody>
                </table>
                
            </div>


            <table id="ver_depre_tab" class="table table-striped table-bordered">
                <caption>Metodo de Linea Recta - Depreciación en Meses </caption>
                <thead>
                <th class="text-center" >Año</th>
                <th class="text-center">Valor del Activo</th>
                <th class="text-center">Depreciación</th>
                <th class="text-center">Valor Neto</th>
                </thead>
                <tbody>
                    <a href="../Reportes/detalleDepreDonados.php?ir=<?php echo $modi; ?>"class="btn btn-warning btn-sm">Imprimir</a>
                    <?php
        
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

                    for ($i = 0; $i < $veces; $i++) {
                        ?>
                        <tr>
                            <td class="text-center" > <?php echo ($ano1 + $i+1); ?></td>
                            <td class="text-center" > <?php echo $valor; ?> </td>
                            <td class="text-center" > <?php echo round($depre, 2); ?></td>
                            <td class="text-center" > <?php echo round($vn, 2); ?> </td>
                        </tr> 
                        <?php
                        $vn = $vn - $depre;
                    }
                    ?>
                </tbody>
            </table>

    </div>
                                                                                
                            
                            
                    </div>
                    <!-- /.col-lg-12 FIN DE AQUI TODO EL CONTENIDO -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->




  <?php
   include_once '../Plantilla/inferior.php';

?>