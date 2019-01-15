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
                             CARTERA DE CREDITOS A CLIENTE
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
                                            <label class="col-md-1 control-label">Cliente:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="cliente" value="<?php echo $nombre; ?>" disabled>
                                            </div>

                                            <label class="col-md-1 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $dui; ?>" disabled>
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
                                            <th>Interes</th>
                                            <th>Total de interes</th>
                                            <th>Cuota</th>
                                            <th>Historial</th> 
                                            <th>Abonar</th> 
                                            <th>Contrato y garantía</th> 
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                      <?php
        $sacar = mysqli_query($conexion, "SELECT*FROM tb_cliente INNER JOIN contable ON tb_cliente.id_cliente=contable.concepto1 WHERE contable.concepto1='$modi' AND tipo='CXC'");
            while ($fila = mysqli_fetch_array($sacar)) {
             
                 $tipo=$fila['tipo'];  
                 $fecha=$fila['fecha'];
                 $valor=$fila['valor'];  
                  $interes=$fila['interes'];
                    $total_interes=$fila['to_interes']; 
                    $cuota=$fila['cuota']; 
                     $id=$fila['id_contable']; 
                         
       ?>


       <tr>
        <th><?php echo $tipo;?></th>
        <td><?php echo $fecha;?></td>
        <td><?php echo $valor;?></td>
        <td><?php echo $interes.'%';?></td>
       
        <td><?php echo $total_interes;?></td>
        
        <td><?php echo $cuota;?></td>
        <td class="center">
            <a href="abonos.php?x=<?php echo $id; ?>&ir=<?php echo $modi; ?>"class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
        </td>  
        <td class="center">
            <?php
             $estadoSacar = mysqli_query($conexion, "SELECT*FROM abono WHERE cuenta='$id'");
             if (mysqli_num_rows($estadoSacar)>0) {
                 
             
            while ($fila = mysqli_fetch_array($estadoSacar)) { 
                $estado=$fila['estado'];
            }
            if ($estado=='Finalizado') {
            ?>
             <a href="" class="btn btn btn-success btn-xs"><strong>Finalizado</strong></a>
            <?php }else{?>
            <a href="../cxc/cxc.php?id=<?php echo $id; ?>" class="btn btn btn-danger btn-xs"><strong>Pagar</strong></a>
             <?php }}else{?>
            <a href="../cxc/cxc.php?id=<?php echo $id; ?>" class="btn btn btn-danger btn-xs"><strong>Pagar</strong></a>
             <?php }?>
        </td>
        

            <?php   }?>

            <td class="center">
            <a href="../Reportes/contrato.php?x=<?php echo $id; ?>&ir=<?php echo $modi; ?>"class="btn btn-warning btn-sm">Contrato</a>
            <a href="../Reportes/garantia.php?x=<?php echo $id; ?>&ir=<?php echo $modi; ?>"class="btn btn-warning btn-sm">Garantia</a>
        </td> 
      
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