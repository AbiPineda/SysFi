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
                             CLIENTES REGISTRADOS
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
                                            <th>NOMBRE COMPLETO</th>
                                            <th>DIRECCION</th>
                                            <th>DUI</th>                                           
                                            <th>TELEFONO</th>
                                            <th></th>                                          
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                    	<?php
        $sacar = mysqli_query($conexion, "SELECT * FROM tb_cliente");
            while ($fila = mysqli_fetch_array($sacar)) {
               $modificar=$fila['id_cliente']; 
                 $nombre=$fila['nombre_cliente'];  
                 $direccion=$fila['dir_cliente'];  
                 $dui=$fila['dui'];
                 $telefono=$fila['tel']; 

                  
       ?>


       <tr>
        <th><?php echo $nombre;?></th>
        <td><?php echo $direccion;?></td>
        <td><?php echo $dui;?></td>
        <td><?php echo $telefono;?></td>
        <td class="center">
           <a href="verCliente.php?ir=<?php echo $modificar; ?>"class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
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
 <a href="../Reportes/carteracliente.php" target="_blank">
<button  class="btn btn-warning btn-circle btn-lg" ><i class="fa fa-print fa-2"></i></button><a>

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