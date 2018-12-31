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
                             INVENTARIO
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
                                            <th>CODIGO</th>
                                            <th>ARTICULO</th>
                                            <th>PRECIO DE VENTA</th>                                           
                                            <th>STOCK</th>
                                            <th></th>                                          
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                    	<?php
        $sacar = mysqli_query($conexion, "SELECT
articulos.idarticulos,
articulos.codigo,
articulos.nombre,
inventario.pv,
inventario.stock
FROM
articulos
INNER JOIN inventario ON inventario.id_articulos = articulos.idarticulos
");
            while ($fila = mysqli_fetch_array($sacar)) {
               $modificar=$fila['idarticulos']; 
                 $codigo=$fila['codigo'];  
                 $nombre=$fila['nombre'];  
                 $pv=$fila['pv'];  
                 $stock=$fila['stock'];  
       ?>


       <tr>
        <th><?php echo $codigo;?></th>
        <td><?php echo $nombre;?></td>
        <td><?php echo $pv;?></td>
        <td><?php echo $stock;?></td>
        <td class="center">
           <a href="modificarInventario.php?ir=<?php echo $modificar; ?>"class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
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
<button type="button" class="btn btn-warning btn-circle btn-lg" onClick="window.location='PDFinventario.php'"><i class="fa fa-print fa-2" title="Inventario PDF"></i>
                            </button> 
</div>
</div>
</div>
</div>
</div>



<?php
include_once '../Plantilla/inferior.php';
?>
 