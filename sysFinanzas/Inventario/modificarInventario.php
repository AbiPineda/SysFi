<?php
    include_once '../conexion/php_conexion.php';
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';

     $modi = $_GET['ir'];


 ?>

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!--AQUI TODOO EL CONTENIDO-->
                    <div class="col-md-12">
                        <br/>
                         <div class="panel panel-green">
                        <div class="panel-heading">
                             Registrar Articulo
                        </div>
                        <div class="panel-body">
             <div class="col-md-8">
			 <div class="alert alert-default" align="center">                           
                            
                    </div>
                 
                </div>
               
               
            <div class="row">
                <div class="col-md-12" >
               
                              <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                    	    <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
                   

                                         <?php
                                    include_once '../conexion/php_conexion.php';
                                    $sacar = mysqli_query($conexion, "SELECT*FROM articulos WHERE idarticulos='$modi'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['idarticulos'];
                                        $codigo = $fila['codigo'];
                                        $nombre = $fila['nombre'];
                                        $cantidad = $fila['cantidad'];
                                        $valor = $fila['valor'];
                                        $marca = $fila['marca'];
                                      


                                         $sacar1 = mysqli_query($conexion, "SELECT*FROM inventario, articulos WHERE idinventario='$modi' and id_articulos=idarticulos");
                                    while ($fila = mysqli_fetch_array($sacar1)) {
                                        $modificar = $fila['idinventario'];
                                        $stock = $fila['stock'];
                                       
                                        
                                        ?>
                                            <label class="col-md-1 control-label">Código:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>">
                                            </div>

                                            <label class="col-md-1 control-label">Nombre:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                                            </div>

                                        <div class="col-md-12">
                                         <br>
                                          <div class="panel panel-green">
                                         <br>

                                          <label class="col-md-1 control-label">Marca:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="marca" value="<?php echo $marca; ?>">
                                            </div>
                                        

                                           <label class="col-md-1 control-label">Cantidad:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="cantidad" value="<?php echo $cantidad; ?>">
                                            </div>

                                             <label class="col-md-1 control-label">Valor:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="valor" value="<?php echo $valor; ?>">
                                            </div>

                                             

                                            <label class="col-md-1 control-label">Stock:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="stock" value="<?php echo $stock; ?>">
                                            </div>
                             
                          <br>
                           <br>
                            
                         </div>
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnEnviar">Guardar Articulo</button>
                                            </div>
                                        </div>
                                         <?php
                                }
                            }
                                ?>
                                    </form>
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



if (isset($_REQUEST['btnEnviar'])) {
    $modi = $_REQUEST['tirar'];
    include_once '../conexion/php_conexion.php';

    
     $codigo =$_REQUEST['codigo'];
     $nombre = $_REQUEST['nombre'];
     $cantidad = $_REQUEST['cantidad'];
     $valor = $_REQUEST['valor'];
     $marca = $_REQUEST['marca'];
     
      $stock = $_REQUEST['stock'];



    mysqli_query($conexion, "UPDATE articulos SET codigo='$codigo',nombre='$nombre',cantidad='$cantidad',valor='$valor',marca='$marca' WHERE idarticulos='$modi'");

   mysqli_query($conexion, "UPDATE inventario SET stock='$stock' WHERE idinventario='$modi'");
   
        echo "<script>
          location.href ='InventarioArticulos.php';
        </script>";
} 

?>