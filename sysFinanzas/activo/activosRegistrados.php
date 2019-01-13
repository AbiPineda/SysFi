<?php
 include_once '../conexion/php_conexion.php';
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';

?>
<!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->

<head>
    <style>
input {
 width: 250px;
 padding: 5px;
}
.redondeado {
 border-radius: 5px;
}
#div1 {
     overflow:scroll;
     height:500px;
     width:1000px;
}
    </style>
</head>
<div id="page-wrapper"  align="center">
    <div class="container-fluid"  align="center">
        <div class="row" align="center">

            <div class="col-md-12">
                <br>
                <!-- Advanced Tables -->
                <div class="panel panel-green">
                    <div class="panel-heading" align="center">
                       ACTIVOS
                    </div>
                    <div class="panel-body" align="center">
                        <div class="table-responsive">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="50%">
                                        <div align="right">
                                            <form method="post" action="" enctype="multipart/form-data" name="form1" id="form1">
                                                <div class="input-group">

                                                    </datalist>
                                                    </td>
                                                    <td width="20%">

                                                        <input type="text" class="redondeado" id="buscador" onkeyup="myFunction()" placeholder="Buscar..">
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table><br>  
                            <div id="div1" class="table-responsive">                         
                            <table id="tabla" class="table table-striped table-bordered table-hover table-condensed table-striped">
                                <thead>
                                    <tr>
                                         <th>CORRELATIVO</th>
                                         <th>ACTIVO</th>
                                         <th>DEPARTAMENTO</th>
                                         <th>ENCARGADO</th>
                                         <th>FECHA DE ADQUISICIÓN</th>
                                         <th>PRECIO</th>
                                         <th>VIDA UTIL (AÑOS)</th>
                                         <th>VIDA UTIL (MESES)</th>
                                                                                 
                                    </tr>
                                </thead>
                                <tbody class="buscar">
                                    <?php
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
                                                ?>


                                                <tr>
                                                    <th nowrap><?php echo $coInstitucion . " " . $coDepartamento . " " . $coClasificacion . " " . $CoTipo . " " . $coActivo; ?></th>
                                                    <td nowrap><?php echo $nombreActivo; ?></td>

                                                    <td nowrap><?php echo $nombreDepartamento; ?></td>
                                                    <td nowrap><?php echo $nombre . " " . $apellidos; ?></td>
                                                    <td nowrap><?php echo $fecha; ?></td>
                                                    <td nowrap><?php echo $precio; ?></td>
                                                    <td nowrap><?php echo $anio; ?></td>
                                                    <td ><?php echo $meses; ?></td>




                                                <?php } ?>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>

                        </form>
                    </div>
                    </td>
                    </tr>
                    </table>
                </div>
            </div>
            <button type="submit" class="btn btn-warning btn-circle btn-lg" onclick="location.href='../Reportes/activos.php'"><i class="fa fa-print fa-2"></i></button>

        </div>
    </div>
</div>
</div>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscador");
  filter = input.value.toUpperCase();
        table = document.getElementById("tabla");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>       


<?php
include_once '../Plantilla/inferior.php';
?>