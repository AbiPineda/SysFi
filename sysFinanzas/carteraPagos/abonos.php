<?php
    include_once '../conexion/php_conexion.php';
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';

     $modi = $_GET['ir'];
     $cuenta=$_GET['x'];


 ?>

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!--AQUI TODOO EL CONTENIDO-->
                    <div class="col-md-12">
                        <br/>
                         <div class="panel panel-green">
                        <div class="panel-heading">
                             CARTERA DE PAGOS A PROVEEDORES
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
                                    $sacar = mysqli_query($conexion, "SELECT*FROM proveedor WHERE idproveedor='$modi'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                                      $modificar=$fila['idproveedor'];
                                                      $nombre=$fila['proveedor'];
                                                      $tel=$fila['telefono'];

                                                       ?>
                                            <div class="row">
                                            <div class="col-md-5">
                                                 <label >Proveedor:</label>
                                                <input type="text" class="form-control" name="cliente" value="<?php echo $nombre; ?>" disabled>
                                            </div>
                                            <div class="col-md-2">
                                                 <label>Telefono:</label>
                                                <input type="text" class="form-control" name="dui" value="<?php echo $tel; ?>" disabled>
                                            </div> 
                                            
                                           
                                            </div>
                          <br>
                            
                         </div>
                          <table id="tabla" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                           <tr>
                                            <th>Abono</th>
                                            <th>Fecha</th>
                                            <th>Nota</th>
                                            
                                           
                                        </tr>                                      
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                      <?php
        $sacar = mysqli_query($conexion, "SELECT*FROM abono WHERE cuenta='$cuenta'");
            while ($fila = mysqli_fetch_array($sacar)) {          
                 $fecha=$fila['fecha'];
                 $valor=$fila['valor'];  
                  $nota=$fila['nota'];
 
                         
       ?>


       <tr>
        <th><?php echo $valor;?></th>
        <td><?php echo $fecha;?></td>
        <td><?php echo $nota;?></td>
      
       <?php  }?>
      </tr>
    </tbody>
  </table>
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                            <a href="../carteraPagos/lista_Proveedores.php"class="btn btn-warning btn-sm x3" ><i class="fa fa-arrow-circle-o-left"></i></a>
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

?>