 <?php
 
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
    include_once '../correlativos/Conexion.php';
include_once '../correlativos/correlativos.php';

    Conexion::abrir_conexion();

if (isset($_REQUEST['btnGuardar'])) {
    $nombre = $_REQUEST['nombre'];
    $abreviatura = $_REQUEST['abreviatura'];
    $nit = $_REQUEST['nit'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    $conexion = Conexion::obtener_conexion();
    $correlativo = correlativos::obtener_correlativo($conexion, 'institucion');
    
    $sql = "INSERT INTO institucion (nombre,abreviatura,ideTributaria,direccion,telefono,correlativo) VALUES ('$nombre', '$abreviatura', '$nit', '$direccion', '$telefono', '$correlativo')";
     $sentencia = $conexion->prepare($sql);
     $resultado = $sentencia->execute();
     
     echo '<script>location.href ="registroInstitucion.php";</script>';
     
     
}else{

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
                             Registrar Institución
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
               
                              <div class="col-md-14">
                                    <form class="form-horizontal" role="form">

                                        
                                            
                                            <label class="col-md-3 control-label">Nombre de Institución:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>

                                            <label class="col-md-1 control-label">Abreviatura:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="abreviatura">
                                            </div>

                                        <br>
                                            <br>
                                            
                                            
                                        
                                         <label class="col-md-1 control-label">NIT:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="nit">
                                            </div>

                                             <label class="col-md-1 control-label">Dirección:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="direccion">
                                            </div>

                                             <label class="col-md-1 control-label">Telefono:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="telefono">
                                            </div>


                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Institución</button>
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


<?php } ?>
<?php

include_once '../Plantilla/inferior.php';
?>
 