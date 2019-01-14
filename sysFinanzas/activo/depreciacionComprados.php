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
                             DEPRECIACION ACTIVOS COMPRADOS
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
                                <table id="tabla" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                    <th>Correlativo</th>
                                      <th>Activo</th>
                                    <th>Departamento</th>
                                    <th>Precio ($)</th>
                                    
                                    <th>Encargado</th>
                                        <th></th>                                          
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                    	<?php
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
and encargado.id_encargado=activo.idencargado and activo.adquisicion = 'Comprado'
 GROUP BY activo.idactivo 

");
            while ($fila = mysqli_fetch_array($sacar)) {
               $modificar=$fila['id']; 
                

                  
       ?>


      <tr>
                          
                          
                           <td nowrap><?php echo $fila['coInstitucion'] . " " . $fila['coDepartamento'] . " " . $fila['coClasificacion'] . " " . $fila['CoTipo'] . " " . $fila['coActivo']; ?></td>
                           
                            <td><?php echo $fila['ncla']; ?></td>
                               <td><?php echo $fila['dep']; ?></td>
                              
                              <td><?php echo $fila['precio'] ; ?></td>
                              <td><?php echo $fila['encargado'] . " " . $fila['apellidos']; ?></td>
                              
                                  
        <td class="center">
           <a href="depreciacion.php?ir=<?php echo $modificar; ?>"class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
        </td>
                                       
        

       <?php  }?>
      
      </tr>
    </tbody>
  </table>
</div>

</form>
</div>
</td>
</tr>
</table>
</div>
</div>
<button type="submit" class="btn btn-warning btn-circle btn-lg" onclick="location.href='../Reportes/depreComprados.php'"><i class="fa fa-print fa-2"></i></button>

</div>
</div>
</div>
</div>
</div>



<?php
include_once '../Plantilla/inferior.php';
?>

 <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscador");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("th")[0];
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