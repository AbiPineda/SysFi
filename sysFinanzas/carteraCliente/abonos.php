<?php
    include_once '../conexion/php_conexion.php';
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';

     $modi = $_GET['ir'];
     $cuenta=$_GET['x'];
     
           $estadoSacar = mysqli_query($conexion, "SELECT*FROM abono WHERE cuenta='$cuenta'");
           if (mysqli_num_rows($estadoSacar)>0) {
            while ($fila = mysqli_fetch_array($estadoSacar)) { 
                $estado=$fila['estado'];
            }
           } else {
                $inco = mysqli_query($conexion,"SELECT * FROM contable WHERE id_contable='$cuenta'");
                    while ($filita = mysqli_fetch_array($inco)) {
                        $estado=$filita['estadoC'];
                    }
               
            }


 ?>

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!--AQUI TODOO EL CONTENIDO-->
                    <div class="col-md-12">
                        <br/>
                         <div class="panel panel-green">
                        <div class="panel-heading">
                             CARTERA DE CREDITOS DE CLIENTE
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
                                    $sacar = mysqli_query($conexion, "SELECT*FROM tb_cliente WHERE id_cliente='$modi'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                                      $modificar=$fila['id_cliente'];
                                                      $nombre=$fila['nombre_cliente'];
                                                      $dui=$fila['dui'];

                                                       ?>
                                            <div class="row">
                                            <div class="col-md-5">
                                                 <label >Cliente:</label>
                                                <input type="text" class="form-control" name="cliente" value="<?php echo $nombre; ?>" disabled>
                                            </div>
                                            <div class="col-md-2">
                                                 <label>DUI:</label>
                                                <input type="text" class="form-control" name="dui" value="<?php echo $dui; ?>" disabled>
                                            </div> 
                                            
                                            <div class="col-md-4">
                                    
                                                <label >Estado del Credito:</label>
                                                <?php if ($estado=='Finalizado'){?>
                                                <input type="text" class="form-control" name="dui" value="Finalizado" disabled>
                                                <?php }elseif($estado=='EnProceso'){?>
                                                 <input type="text" class="form-control" name="dui" value="En proceso" disabled>
                                                <?php }else{?>
                                                 <input type="text" class="form-control" name="dui" value="Incobrable" disabled>
                                                <?php }?>
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
                                            <th>Mora</th> 
                                           
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
                    $mora=$fila['mora']; 
 
                         
       ?>


       <tr>
        <th><?php echo $valor;?></th>
        <td><?php echo $fecha;?></td>
        <td><?php echo $nota;?></td>
        <?php if ($mora==0) {
                ?>
        <td>NO PAGO MORA</td>
        <?php }else{?>
        <td>PAGO MORA</td>
        <?php }?>
       <?php  }?>
      </tr>
    </tbody>
  </table>
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <a href="lista_clientes.php"class="btn btn-warning btn-sm x3" ><i class="fa fa-arrow-circle-o-left"></i></a>
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