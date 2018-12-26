
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
                             Registrar Cliente
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

                                        
                                            <label class="col-md-2 control-label">Nombre Completo:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="nombreCliente">
                                            </div>

                                        <br>
                                        <br>
                                             <br>
                                            <label class="col-md-1 control-label">Dirección:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="dir">
                                            </div>

                                       
                                            <label class="col-md-1 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui">
                                            </div>
                                        

                                       
                                            <label class="col-md-1 control-label">Telefono:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="text" class="form-control" name="tel">
                                            </div>
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Cliente</button>
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

    $nombre = $_REQUEST['nombreCliente'];
    $direccion = $_REQUEST['dir'];
    $dui = $_REQUEST['dui'];
    $telefono = $_REQUEST['tel'];
  
  
   
    mysqli_query($conexion, "INSERT INTO tb_cliente(nombre_cliente,dir_cliente,dui,tel) VALUES('$nombre','$direccion','$dui','$telefono')");
    
} 
?>

<?php

include_once '../Plantilla/inferior.php';
?>
 