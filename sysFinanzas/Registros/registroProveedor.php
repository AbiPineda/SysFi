
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
                             Registrar Proveedor
                        </div>
                        <div class="panel-body">
             <div class="col-md-8">
			 <div class="alert alert-default" align="center">                           
                            <form name="form2" action="" method="post">
                                    
                           </form>
                    </div>
                 
                </div>
               
               
            <div class="row">
                <div class="col-md-14" >
               
                              <div class="col-md-12">
                                    <form class="form-horizontal" role="form">

                                        
                                            <label class="col-md-1 control-label">Proveedor:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="codigo">
                                            </div>

                                            <label class="col-md-1 control-label">Contacto:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>


<br>
<br>
                                               <label class="col-md-2 control-label">Dirección:</label>
                                            <div class="col-md-9">
                                                
                                                <input type="text"  class="form-control" name="unidad">
                                            </div>
                             

                                       
                                            
  <br>
   <br>
                                       
                                        <div class="col-md-12">
                        <br>
                         <div class="panel panel-green">
                         <br>


                                            <label class="col-md-2 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="marca">
                                            </div>
                                        


                                           <label class="col-md-1 control-label">NIT:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="text"  class="form-control" name="cantidad">
                                            </div>

                                             <label class="col-md-1 control-label">Telefono:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="text" class="form-control" name="valor">
                                            </div>

                                          
                          <br>
                           <br>
                            
                         </div>
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Proveedor</button>
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
  
   
    mysqli_query($conexion, "INSERT INTO articulos(codigo,nombre,cantidad,valor,marca,estado,unidad) VALUES('$codigo','$nombre','$cantidad','$valor','$marca','$estado','$unidad')");
    
} 
?>

<?php

include_once '../Plantilla/inferior.php';
?>