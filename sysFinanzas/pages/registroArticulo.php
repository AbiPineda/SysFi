
 <?php
 
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
    ?>
        <!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
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
                            <form name="form2" action="" method="post">
                                    
                           </form>
                    </div>
                 
                </div>
               
               
            <div class="row">
                <div class="col-md-12" >
               
                              <div class="col-md-12">
                                    <form class="form-horizontal" role="form">

                                        
                                            <label class="col-md-1 control-label">Código:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="codigo">
                                            </div>

                                            <label class="col-md-1 control-label">Nombre:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>

                                       
                                            <label class="col-md-1 control-label">Marca:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="marca">
                                            </div>
                                        

                                       
                                        <div class="col-md-12">
                        <br>
                         <div class="panel panel-green">
                         <br>

                                           <label class="col-md-2 control-label">Cantidad:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="cantidad">
                                            </div>

                                             <label class="col-md-1 control-label">Valor:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="valor">
                                            </div>

                                             <label class="col-md-2 control-label">Stock Minimo:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="minimo">
                                            </div>
                                             <label class="col-md-1 control-label">Precio de Venta:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="pv">
                                            </div>
                             
                          <br>
                           <br>
                            
                         </div>
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Articulo</button>
                                            </div>
                                        </div>
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
    if (isset($_REQUEST['btnGuardar'])) {
    include_once '../conexion/php_conexion.php';

    $codigo = $_REQUEST['codigo'];
    $nombre = $_REQUEST['nombre'];
    $marca = $_REQUEST['marca'];
    $cantidad = $_REQUEST['cantidad'];
    $valor = $_REQUEST['valor'];
    $unidad = $_REQUEST['unidad'];
      
   $estado = "s";
  
   
    mysqli_query($conexion, "INSERT INTO articulos(codigo,nombre,cantidad,valor,marca,estado,unidad) VALUES('$codigo','$nombre','$cantidad','$valor','$marca','$estado','$minimo')");
    
} 
?>

<?php

include_once '../Plantilla/inferior.php';
?>
 