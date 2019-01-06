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
                                            <label class="col-md-1 control-label">Proveedor:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="cliente" value="<?php echo $nombre; ?>" disabled>
                                            </div>

                                            <label class="col-md-1 control-label">Telefono:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $tel; ?>" disabled>
                                            </div>  

                          <br>
                           <br>
                            
                         </div>
                          <table id="tabla" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tipo de venta</th>
                                            <th>Fecha de credito</th>
                                            <th>Valor</th>
                                            
                                            <th>Historial</th> 
                                            <th>Abonar</th> 
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                      <?php
        $sacar = mysqli_query($conexion, "SELECT*FROM proveedor INNER JOIN contable ON proveedor.idproveedor=contable.concepto1 WHERE contable.concepto1='$modi' AND tipo='CXP'");
            while ($fila = mysqli_fetch_array($sacar)) {
             
                 $tipo=$fila['tipo'];  
                 $fecha=$fila['fecha'];
                 $valor=$fila['valor'];  
                
                     $id=$fila['id_contable']; 
                         
       ?>


       <tr>
        <th><?php echo $tipo;?></th>
        <td><?php echo $fecha;?></td>
        <td><?php echo $valor;?></td>
        
        <td class="center">
            <a href="abonos.php?x=<?php echo $id; ?>&ir=<?php echo $modi; ?>"class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
        </td>  
        <td class="center">
      
            <a href="../cxc/cxp.php?id=<?php echo $id; ?>" class="btn btn btn-danger btn-xs"><strong>Pagar</strong></a>
            
        </td>
        

            <?php   }?>
      
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