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
                             REFERENCIAS PERSONALES
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
                                    $sacar = mysqli_query($conexion, "SELECT
tb_cliente.id_cliente,
tb_cliente.nombre_cliente,
tb_cliente.dir_cliente,
tb_cliente.dui,
tb_cliente.tel,
referencias.nombre1,
referencias.telefono1,
referencias.direccion1,
referencias.nombre2,
referencias.telefono2,
referencias.direccion2,
referencias.idcliente
FROM
tb_cliente

INNER JOIN referencias ON referencias.idcliente = tb_cliente.id_cliente
 WHERE id_cliente='$modi'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                                      $modificar=$fila['id_cliente'];
                                                      $nombre=$fila['nombre_cliente'];
                                                      $dui=$fila['dui'];
                                                      
                                                      $nombre1=$fila['nombre1'];
                                                      $telefono1=$fila['telefono1'];
                                                      $direccion1=$fila['direccion1'];
                                                      
                                                      
                                                      $nombre2=$fila['nombre2'];
                                                      $telefono2=$fila['telefono2'];
                                                      $direccion2=$fila['direccion2'];

                                                       ?>
                                            <label class="col-md-1 control-label">CLIENTE:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="cliente" value="<?php echo $nombre; ?>" disabled>
                                            </div>

                                            <label class="col-md-1 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $dui; ?>" disabled>
                                            </div>
                                            
                                             <div class="col-md-12">
                                        <br>
                                        <div class="panel panel-green">
                                            

<br>
                                             <label class="col-md-2 control-label">NOMBRE:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $nombre1; ?>" disabled>
                                            </div>
                                             <label class="col-md-2 control-label">TELEFONO:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $telefono1; ?>" disabled>
                                            </div>
                                             <br>
                                             <br>
                                             <label class="col-md-2 control-label">DIRECCIÓN:</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $direccion1; ?>" disabled>
                                            </div>
                                            <br>
                                            <br>

                                        </div>
                                    </div>

                          <br>
                           <br>
                           
                          <br>
                           <br>
                          <br>
                           <br>
                           
                          <br>
                           <br>
                           
                            <div class="col-md-12">
                                        <br>
                           <div class="panel panel-green">
                                            

<br>
                                             <label class="col-md-2 control-label">NOMBRE:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $nombre2; ?>" disabled>
                                            </div>
                                             <label class="col-md-2 control-label">TELEFONO:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $telefono2; ?>" disabled>
                                            </div>
                                             <br>
                                             <br>
                                             <label class="col-md-2 control-label">DIRECCION:</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $direccion2; ?>" disabled>
                                            </div>
                                            <br>
                                            <br>

                                        </div>
                                    </div>

                            
                         </div>
                   
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <a href="Clientes.php"class="btn btn-warning btn-sm x3" ><i class="fa fa-arrow-circle-o-left"></i></a>
                                            </div>
                                        </div>
                                         <?php
                                
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

