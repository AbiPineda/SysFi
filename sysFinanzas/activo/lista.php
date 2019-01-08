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
                             ACTIVOS REGISTRADOS
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
                                            <th>CORRELATIVOS</th>
                                            <th>ACTIVO</th>
                                            <th>DEPARTAMENTO</th>
                                            <th>ENCARGADO</th>                                          
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
               $coInstitucion=$fila['coInstitucion'];
               $coDepartamento=$fila['coDepartamento'];
               $coClasificacion=$fila['coClasificacion'];
               $CoTipo=$fila['CoTipo'];
               $coActivo=$fila['coActivo'];

               //Nombre de Institucion, departamento, activo
                 $nombreActivo=$fila['nombreActivo'];  
                 $nombreInstituciion=$fila['nombreInstituciion'];  
                 $nombreDepartamento=$fila['nombreDepartamento']; 

                  //Nombre de Encargado
                  $nombre=$fila['nombre']; 
                  $apellidos=$fila['apellidos']; 

                  //otros datos del activo
                  $fecha_adquisicion = $fila['fecha_adquisicion'];
                  $precio = $fila['precio'];  
                  $estado = $fila['estado']; 
                  $meses = $fila['tiempo_depreciacion']; 
                  $anio = $fila['vidautil']; 
                  
       ?>


       <tr>
        <th><?php echo $coInstitucion . " " . $coDepartamento . " " . $coClasificacion . " " . $CoTipo . " " . $coActivo; ?></th>
        <td><?php echo $nombreActivo;?></td>
        
        <td><?php echo $nombreDepartamento;?></td>
        <td><?php echo $nombre . " " . $apellidos; ?></td>
        <td style="visibility: hidden"><?php echo $fecha_adquisicion; ?></td>
        <td style="visibility: hidden"><?php echo $precio; ?></td>
        <td style="visibility: hidden"><?php echo $anio; ?></td>
        <td style="visibility: hidden"><?php echo $meses; ?></td>
        
                                       
        

       <?php  }?>
      
      </tr>
    </tbody>
  </table>
</div>

</form>
<!--DATOS SELECCIONADOS-->
    <form>
        <div class="col-lg-4">
         <label style="color: black">Activo Seleccionado<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="correlativo" name="correlativo" disabled><br>
          <br>
          <input type="text" class="form-control" id="activo" name="activo" disabled>
           <input type="hidden" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion" >
           <input type="hidden" class="form-control" id="precio" name="precio" >
           <input type="hidden" class="form-control" id="anio" name="anio" >
           <input type="hidden" class="form-control" id="meses" name="meses" >
          
          <br>
          
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div></form>

           <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                    <button type="button" class="btn btn-primary" name="btnGuardar" id="btnGuardar" onClick="agregarTabla()">  <i class="fa fa-shopping-cart"></i> Consultar Activo</button>
             
                </div>

                 <br>       
                 <br>
                   <br> 
                     <br> 
                       <br>  
                 <div class="table-responsive" align="center">   
                                <table id="tablaPP" class="table table-striped table-bordered table-hover table-condensed table-striped">
                                    <thead>
                                      <tr><th colspan="8" align="center">DEPRECIACION DEL ACTIVO - METODO DE LINEA RECTA</th></tr>
                                        <tr>
                                            <th>ACTIVO</th>
                                            <th>FECHA DE ADQUISICIÓN</th>
                                             <th>PRECIO</th>
                                              <th>ANUAL</th>
                                               <th>MENSUAL</th>
                                                <th>VALOR NETO</th> 
                                                                                            
                                     
                                                                                    
                                        </tr>
                                       
                                    </thead>
                                     <tbody class="tabla_ajax"> 
  

    </tbody>
</div>
</td>
</tr>
</table>
</div>
</div>
</div>
<button type="submit" class="btn btn-warning btn-circle btn-lg" onclick="location.href='invetarioPDF.php'"><i class="fa fa-print fa-2"></i></button>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

  <script>
            var table = document.getElementById('tabla');
            for(var i = 1; i<table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                    
                    document.getElementById("correlativo").value = this.cells[0].innerHTML;
                    document.getElementById("activo").value = this.cells[1].innerHTML;
                     document.getElementById("fecha_adquisicion").value = this.cells[4].innerHTML;
                     document.getElementById("precio").value = this.cells[5].innerHTML;
                     document.getElementById("anio").value = this.cells[6].innerHTML;
                     document.getElementById("meses").value = this.cells[7].innerHTML;
               };
            }
            </script>


             <script>
               function agregarTabla(){
                   //alert('si');

                   //se muestran en input
                   var activo = $('#activo').val();
                   var fecha_adquisicion = $('#fecha_adquisicion').val();
                    var precio = $('#precio').val();
                    var anio = $('#anio').val();
                    var meses = $('#meses').val();

                    var depreAnual = parseFloat(precio)/parseFloat(anio);
                    var depreMensual = parseFloat(precio)/parseFloat(meses);

                    var neto = parseFloat(precio)-parseFloat(depreAnual);
                   
                  
                    

                    var tabla = $('#tablaPP');
                    
              
                    var datos = "<tr>"+
                            "<td>"+activo+"</td>"+
                            "<td>"+fecha_adquisicion+"</td>"+
                            "<td>"+precio+"</td>"+
                            "<td>"+parseFloat(depreAnual).toFixed(2)+"</td>"+
                            "<td>"+parseFloat(depreMensual).toFixed(2)+"</td>"+
                            "<td>"+parseFloat(neto).toFixed(2)+"</td>"+
                            
                            "</tr>";
                    
                    tabla.append(datos);
                    }
                    
                </script>
