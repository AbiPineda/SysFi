<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';
include_once '../Plantilla/encabezado.php';
  include_once '../Plantilla/menuLateral.php';
$fecha=date('Y-m-d');
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
                             CONSUMIDOR FINAL
                        </div>
                        <div class="panel-body">
             <div class="col-md-8">
			 <div class="alert alert-default" align="center">                           
                            <form name="form2" action="" method="post">
                                     <div class="input-group">
                                    <span class="input-group-addon">CLIENTE:</span>
                                    <input type="text" list="browsers1" name="buscar_cliente" autocomplete="off" class="form-control" required>
                                    <datalist id="browsers1">
                                        <?php
                                            $pa=mysqli_query($conexion,"SELECT * FROM tb_cliente WHERE tb_cliente.id_cliente");                
                                            while($row=mysqli_fetch_array($pa)){
                                                echo '<option value="'.$row['nombre_cliente'].'">';                                          
                                            }
                                       ?> 
                                    </datalist>
                                    </div>
                                </form>
                    </div>
                 
                </div>
                <div class="col-md-4">
                         <div class="panel-body" align="center">                                                                                 
                            <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-2x" onclick="location.href='./registroCliente.php'" title="Agregar Nuevo Cliente"></i>
                            </button>

                                                                                                        
                  </div>
                </div>
                 <div class="col-md-12">
                    <?php
              
                
                    if(!empty($_POST['buscar_cliente'])){
                        $buscarc= $_POST['buscar_cliente'];
                        $poa=mysqli_query($conexion,"SELECT tb_cliente.id_cliente FROM tb_cliente
                       WHERE (tb_cliente.id_cliente='$buscarc' or tb_cliente.nombre_cliente='$buscarc') GROUP BY tb_cliente.nombre_cliente");  
                        if($roow=mysqli_fetch_array($poa)){
                            $codigoo=$roow['id_cliente'];
                            #$oRuta=new Consultar_Ruta($roow['ruta']);
                            $pa=mysqli_query($conexion,"SELECT * FROM cliente_temp WHERE id_cliente='$codigoo'");    
                            if($row=mysqli_fetch_array($pa)){
                                
                                mysqli_query($conexion,"UPDATE cliente_temp SET fecha='$fecha' WHERE id_cliente='$codigoo'");
                            }else{
                                mysqli_query($conexion,"INSERT INTO cliente_temp (id_cliente, fecha) VALUES ('$codigoo','$fecha')");   
                            }
                        }else{
                            echo mensajes('El Cliente que Busca no se encuentra Registrado en la Base de Datos','rojo');    
                        }
                    }                                                           
                ?>
                 <!-- /. ROW  -->
            </div>
               
            <div class="row">
                <div class="col-md-12">
               
                        <?php 
                        $ocultar=mysqli_query($conexion,"SELECT * FROM cliente_temp");
                        if (mysqli_num_rows($ocultar)>0) {
                                $neto=0;$item=0;
                                $pa=mysqli_query($conexion,"SELECT * FROM cliente_temp, tb_cliente WHERE cliente_temp.id_cliente=tb_cliente.id_cliente");                
                                while($row=mysqli_fetch_array($pa)){
                                    ############# FECHA ######################
                                    if($row['fecha']==NULL){
                                        
                                        #$oRuta->consultar('nombre');
                                        $fecha=$fecha;
                                    }else{
                                        $fecha=$row['fecha'];
                                        
                                    }
                                   
                                    
                                    $pame=strftime( "%Y-%m-%d-%H-%M-%S", time() );                                      
                                    if($row['fecha']==$pame){
                                                    $status='si';
                                                }                                                                                               
                                                elseif($row['fecha']>$pame){
                                                    $status='<a href="#" role="button" class="btn btn-danger" data-toggle="modal" title="Cambiar Status">
                                                                <strong>CREDITO</strong>
                                                        </a> ';
                                                }
                                    
                            ?>
                              <div class="col-md-6">
                                    <form class="form-horizontal" role="form">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nombre:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $row['nombre_cliente']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Precedencia:</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" disabled="" value="<?php echo $row['dir_cliente']; ?>" name="dir">
                                            </div>
                                        </div>
                                    </form>
                            </div>
                             <div class="col-md-6">
                                    <form class="form-horizontal" role="form">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Fecha:</label>
                                                <div class="input-group m-t-10">
                                                    <input type="email" id="example-input2-group2" value="<?php echo $row['fecha']; ?>" name="example-input2-group2" class="form-control" disabled="">
                                                    <span class="input-group-btn">
                                            
                                             
                                            </span>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group" align="center">
                                          
                                        </div>
                                    </form>
                            </div>
                
                                                                                                                 
                        <?php } }?>
          <div class="col-md-12">              
<!--######################################## ARTICULOS ############################################################################################## -->
                    <div class="alert alert-success" align="center">                
                            <form name="form2" action="" method="post">
                                     <div class="input-group">
                                    <span class="input-group-addon">ARTICULO:</span>
                                    <input type="text" autofocus list="browsers" name="buscar" autocomplete="off" class="form-control" required>
                                    <datalist id="browsers">

                                        <?php
                                            $buscar=$_POST['buscar'];
                                            $in=mysqli_query($conexion,"SELECT * FROM inventario, articulos 
                                            WHERE articulos.idarticulos=inventario.id_articulos");               
                                            while($row=mysqli_fetch_array($in)){
                                                echo '<option value="'.$row['nombre'].'">';
                                            }
                                        ?> 
                                    </datalist>
                                     </div>
                            </form>
                    </div>
                    <?php
                    ######### ACTUALIZACION DE LA CANTIDAD #############
                    if(!empty($_POST['new_cantidad'])){
                        $new_cantidad=$_POST['new_cantidad'];
                        $ncodigo=$_POST['ncodigo'];
                        
                        $iv=mysqli_query($conexion,"SELECT * FROM inventario WHERE id_articulos='$ncodigo'");                
                        if($row=mysqli_fetch_array($iv)){
                            $stock=$row['stock'];
                            if ($stock == 0 and $new_cantidad > $stock){
                                 $cantidadf='0';

                            }
                            else if ($stock == $row['stockMinimo'] and $new_cantidad > $row['stockMinimo']){
                                      $cantidadf=$stock;
                        $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos='$ncodigo'");                
                        while($row=mysqli_fetch_array($consultaAr)){
                                      echo mensajes('El Articulo '.$row['nombre'].' se encuentra en Existencia '.$stock.'','rojo');
                        }

                            }
                            else if ($stock >= $row['stockMinimo'] and $new_cantidad >= $row['stock']){
                                      $cantidadf=$stock;
                   $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos='$ncodigo'");                
                        while($row=mysqli_fetch_array($consultaAr)){
                                      echo mensajes('El Articulo '.$row['nombre'].' se encuentra en Existencia '.$stock.'','rojo');
                        }
                            }  
                            else {
                                $cantidadf=$new_cantidad;

                            }
                        } 

                        if ($stock==0) {
                            $cantidadfx='1';
                        }
                        else{
                             $cantidadfx=$new_cantidad;
                        }

                        mysqli_query($conexion,"UPDATE venta_temp SET cantidad='$cantidadf' WHERE id_articulo='$ncodigo'");
                    }
                  
                    
                    ///despues veremos si es necesario
                    if(!empty($_POST['desc'])){
                        $desc=limpiar($_POST['desc']);
                        $ncodigod=limpiar($_POST['ncodigod']);
                         mysql_query("INSERT INTO desc_tmp (descuento, almacen, usu) VALUES ('$desc','$id_almacen','$usu')");
                    } 
                    //**************************************

                    if(!empty($_POST['buscar'])){
                        $buscar=$_POST['buscar'];
                        $pro=mysqli_query($conexion,"SELECT * FROM articulos 
                        WHERE (articulos.idarticulos LIKE '$buscar%' or articulos.nombre LIKE '$buscar%'  or articulos.codigo LIKE '$buscar%') GROUP BY articulos.nombre");   
                        if($roow=mysqli_fetch_array($pro)){
                            $codigo=$roow['idarticulos'];

                        $i=mysqli_query($conexion,"SELECT * FROM inventario WHERE id_articulos='$codigo'");
                        if ($row=mysqli_fetch_array($i)) {
                            if ($row['stock'] == 0) {
                        $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos='$ncodigo'");                
                        while($row=mysqli_fetch_array($consultaAr)){
                                    echo mensajes('El Articulo '.$row['nombre'].' se encuentra con Existencia "0"','rojo');
                           }
                            }   
                            else if ($row['stock'] <= $row['stockMinimo'] ) {
                                
                                $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos='$ncodigo'");                
                        while($row=mysqli_fetch_array($consultaAr)){
                             echo mensajes('El Articulo '.$row['nombre'].' se encuentra con Existencia '.$row['stock'].'','rojo');
                                      
                            } 
                                
                                 $pa=mysqli_query($conexion,"SELECT * FROM venta_temp WHERE id_articulo='$codigo'");   
                                    if($row=mysqli_fetch_array($pa)){
                                        $cantidad=$row['cantidad'];
                                        mysqli_query($conexion,"UPDATE venta_temp SET cantidadidad='$cantidad' WHERE id_articulo='$codigo'");
                                    }else{
                                        mysql_query($conexion,"INSERT INTO venta_temp (id_articulo, cantidad) VALUES ('$codigo','1')");    
                                    }
                            }
                            else{
                                  $pa=mysqli_query($conexion,"SELECT * FROM venta_temp WHERE id_articulo='$codigo'");   
                                    if($row=mysqli_fetch_array($pa)){
                                        $cantidad=$row['cantidad']+1;
                                        mysqli_query($conexion,"UPDATE venta_temp SET cantidad='$cantidad' WHERE id_articulo='$codigo'");
                                    }else{
                                        mysqli_query($conexion,"INSERT INTO venta_temp (id_articulo, cantidad) VALUES ('$codigo','1')");    
                                    }

                            }
                           
                        }

                        }else
                        {
                            echo mensajes('El Producto que Busca no se encuentra Registrado en la Base de Datos','rojo');   
                        }
                    }                                                           
                ?>
                 <!--//////<?php
//////                    $descuento=''; 
//////                    $obs=mysql_query("SELECT * FROM desc_tmp WHERE almacen='$id_almacen'");               
//////                         if(!$rows=mysql_fetch_array($obs)){ 
//////                                    $obs='0';
//////                                }else{
//////                                    $obs=$rows['descuento'];
//////                                }
                                                                                                    
                ?>-->
                <div class="table-responsive">                                
                        <table class="table table-striped">
                            <tr class="well-dos">
                                <td><strong>CODIGO</strong></td>
                                <!--<td><strong>Referencia</strong></td>-->
                                <td><strong>PRODUCTO</strong></td>
                                <td><strong><center>CANT.</center></strong></td>
                                <td><strong><div align="right">P.VENTA</div></strong></td>
                                <td><strong><div align="right">TOTAL</div></strong></td>
                                <td></td>
                            </tr>
                            <?php 
                                $neto=0;$item=0;$total=0;
                                $pa=mysqli_query($conexion,"SELECT * FROM venta_temp, inventario WHERE  venta_temp.id_articulo=inventario.id_articulos");              
                                while($row=mysqli_fetch_array($pa)){
                                    $item=$item+$row['cantidad'];                                   
                                    $defecto=strtolower($row['pv']);
                                    $valor=$row['pv'];

                                     ############### manejo de STOCK#########################
                                    if ($row['stock'] == 0) {
                                        $aviso=' <a href="#m'.$row['id_articulo'].'" role="button" class="btn btn-danger btn-mini" data-toggle="modal" title="Cambiar Cantidad" accesskey="c">
                                            <strong>Sin stock</strong>
                                        </a>';
                                    }
                                    else{
                                        $aviso=' <a href="#m'.$row['id_articulo'].'" role="button" class="btn btn-success btn-mini" data-toggle="modal" title="Cambiar Cantidad" accesskey="c">
                                            <strong>'.$row['cantidad'].'</strong>
                                        </a>';
                                    }
                                     ########################################
                                  
                                    
                                        $new=$row['pv'];
                                   
                                    ###############CALCULOS TOTALES#########################
                                    // $importe=$row['cantidad']*$new; no entendia ese new
                                    $importe=$row['cantidad']*$new;
                                    $neto=$neto+$importe;
                                    
                                   // $oArticulo=new Consultar_Articulos($row['articulo']);
                                    
                    $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos=".$row['id_articulo']."");                
                        while($row=mysqli_fetch_array($consultaAr)){
                            ?>
                            <tr>
                             <td align="center"><span class="label label-info"> <?php echo $row['codigo']; ?></span></td>                                                             
                                <td><?php echo $row['nombre'];  ?></td>
                                <td>
                                    <center>
                                      <?php echo $aviso; ?>
                                    </center>
                                </td>
                                <td>
                                <div align="right">
                                        <a  href="#p<?php echo $row['idarticulos']; ?>" role="button" class="btn btn-primary btn-mini" data-toggle="modal" title="Cambiar Precio" accesskey="p">
                                            <strong><?php echo '$ '.formato($new); ?></strong>
                                        </a>
                                </div>
                                </td>
                                <td><div align="right"><strong><?php echo '$'.formato($importe); ?></div></strong></td>                                
                                <td>
                                    <center>                           
                                        <a href="index.php?del=<?php echo $row['id_articulo']; ?>"  class="btn btn-danger" title="Eliminar">
                                            <i class="fa fa-times" ></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        
                      <!--  Modals-->
                                 <div class="modal fade" id="m<?php echo $row['idarticulos']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Actualizar Cantidad<br>[<?php echo $row['nombre'];  ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                            <div class="col-md-4" > 
                                            
                                            </div>
                                            <div class="col-md-4" >                                         
                                                <input type="hidden" name="ncodigo" value="<?php echo $row['idarticulos'];?>">
                                                <strong>Nueva Cantidad</strong><br>
                                                <input type="number" class="form-control" name="new_cantidad" min="1" value="<?php echo $row['cantidad'] ?>" autocomplete="off" required>
                                            </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar Cantidad</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                      <?php }?>
                     <!-- End Modals-->
                                                                                                               
                            <?php } ?>
                        </table>                                
                    </div>
                    <!-- COBROS -->
                    <div class="span4">
                     <div class="table-responsive">
                        <table border="0" class="table">
                             <tr>
                                <td colspan="4"><div align="right"><strong>Sub Total</strong></div></td>
                                <td><div align="right"><strong>$ <?php echo formato($neto); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3"><div align="right">
                                     <?php
                                     $d=0;
                                     if(!empty($_GET['ddes'])){
                                        $ddes=limpiar($_GET['ddes']);
                                            if($ddes>=0){
                                                $d=$_GET['ddes'];    
                                            }
                                        }

                                            $descuento=$neto*$d/100;
                                            $total=$neto-$descuento;
                                        ?>
                                     <form name="form3" method="get" action="index.php">
                                                <button type="submit" class="btn btn-default">Aplicar Descuento</button></div>
                                </td>
                                 <td colspan="2" width="15%"><div align="right">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input type="number" class="form-control" min="0" max="99" name="ddes" id="ddes" value="<?php //echo $_SESSION['ddes']; ?>">
                                                </div></div>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                    <td colspan="3"><div align="right">
                                     <?php
                                     $iv=0;
                                     if(!empty($_GET['iva'])){
                                        $iva=$_GET['iva'];
                                            if($iva>=0){
                                                $iv=$_GET['iva'];    
                                            }
                                        }

                                            $impuesto=$neto*$iv/100;
                                            
                                        ?>
                                     <form name="form3" method="get" action="index.php">
                                                <button type="submit" class="btn btn-default">Aplicar IVA</button></div>
                                </td>
                                 <td colspan="2" width="15%"><div align="right">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input type="number" class="form-control" min="0" max="99" name="iva" id="iva" value="<?php //echo $_SESSION['iva']; ?>">
                                                </div></div>
                                    </form>
                                </td>
                                <td></td>
                            </tr>                                                               
                            </div>
                        </table>
                    </div>
                    </div>
                    <div class="span4">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <center><strong>TOTAL</strong>
                                    <pre><h2 class="text-success" align="center">$ <?php echo formato($total+$impuesto); ?></h2></pre>
                                    
                                </td>
                            </tr>
                        </table>
                        <?php if($neto<>0){ ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div align="center">
                                    <div class="row">
                                    <div class="col-md-6">
                                     <i class="fa fa-plus icon-white"></i> <strong>FORMA DE PAGO FACTURA</strong><br>
                                        <a href="#factura1" role="button" class="btn btn-primary btn-lg" data-toggle="modal">
                                            <i class="fa fa-list icon-white"></i> <strong>CONTADO</strong>
                                        </a>
                                        <a href="#factura2" role="button" class="btn btn-primary btn-lg" data-toggle="modal">
                                            <i class="fa fa-list icon-white"></i> <strong>CREDITO</strong>
                                        </a>
                                    </div>
                                    
                                        
                                    </div>
                                        
                                         
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php } ?>
                    </div>
                    <!--  Modals-->
                    <!--factura 1 para el contado-->
                                <div class="modal fade" id="factura1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_contado.php" method="get">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary text-center no-boder bg-color-red">
                                                <div class="panel-footer back-footer-red">
                                                    TOTAL FACTURA
                                                </div>
                                                <div class="panel-body">
                                                    <div style=" bg-color: red;font-size:50px"><?php echo '$'.formato($total+$impuesto); ?></div>
                                                </div>                           
                                            </div>
                                        </div>                                       
                                            <br>
                                             <strong>Dinero Recibido</strong><br>
                                              <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                             <div class="input-group">
                                                <span class="input-group-addon"><?php echo '$'; ?></span>
                                                <input type="number" class="form-control input-lg" name="valor_recibido" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required><br>                                         
                                                <span class="input-group-addon">.00</span>
                                             </div><br>

                                              <div class="input-group">
                                                <span class="input-group-addon">Forma de Pago</span>
                                               <select class="form-control" name="pago">
                                                    <option value="CONTADO">CONTADO</option>
                                                </select>                                               
                                             </div><br>

                                            <!--<input type="hidden" value="<?php echo $neto; ?>" name="valor_recibido">-->
                                            <input type="hidden" value="<?php echo $total+$impuesto; ?>" name="neto">  
                                            <input type="hidden" value="<?php echo $impuesto; ?>" name="impuesto">  
                                           </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Procesar</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals para contado-->
                     <!--  Modals-->
                    <!--factura 1 para el credito-->
                                <div class="modal fade" id="factura2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_contado.php" method="get">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary text-center no-boder bg-color-red">
                                                <div class="panel-footer back-footer-red">
                                                    TOTAL FACTURA
                                                </div>
                                                <div class="panel-body">
                                                    <div style=" bg-color: red;font-size:50px"><?php echo '$'.formato($total+$impuesto); ?></div>
                                                </div>                           
                                            </div>
                                        </div>                                       
                                            <br>
                                             <strong>PRIMA</strong><br>
                                              <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                             <div class="input-group">
                                                <span class="input-group-addon"><?php echo '$'; ?></span>
                                                <input type="number" class="form-control input-lg" name="valor_recibido" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required><br>                                         
                                                <span class="input-group-addon">.00</span>
                                             </div><br>

                                              <div class="input-group">
                                                <span class="input-group-addon">Forma de Pago</span>
                                               <select class="form-control" name="pago">
                                                    <option value="CREDITO">CREDITO</option>
                                                </select>                                               
                                             </div>
                                             <br>
                                              <div class="input-group">
                                                <span class="input-group-addon">MESES</span>
                                               <select class="form-control" name="mes">
                                                    <option value="6">6 MESES</option>
                                                     <option value="12">12 MESES</option>
                                                      <option value="18">18 MESES</option>
                                                       <option value="24">24 MESES</option>
                                                        <option value="30">30 MESES</option>
                                                         <option value="42">42 MESES</option>
                                                </select>                                              
                                             </div>
                                             <br>
                                              <div class="input-group">
                                              <span class="input-group-addon">INTERES</span>
                                                 <input type="number" class="form-control input-lg" name="interes" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required>                                         
                                                <span class="input-group-addon">.00</span>
                                              </div>
                                             

                                            <!--<input type="hidden" value="<?php echo $neto; ?>" name="valor_recibido">-->
                                            <input type="hidden" value="<?php echo $total+$impuesto; ?>" name="neto">  
                                            <input type="hidden" value="<?php echo $impuesto; ?>" name="impuesto">  
                                           </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Procesar</button>

                                             <button type="submit" class="btn btn-primary" onclick="location.href='./contrato.php'">Contrato</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals para contado-->
                    
                </div>
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