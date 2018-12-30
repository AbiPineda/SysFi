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
                    <div class="panel panel-green">
                        <div class="panel-heading">
                             CREDITO FISCAL
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
                                            $pa=mysqli_query($conexion,"SELECT * FROM tb_cliente
                                            WHERE tb_cliente.id_cliente");                
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
                            <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-2x" title="Agregar Nuevo Cliente"></i>
                            </button>
                                                                                                         
                  </div>
                </div>
                 <div class="col-md-12">
                    <?php
//                    if(!empty($_POST['fecha'])){
//                        $fecha=limpiar($_POST['fecha']);
//                        $ncodigof=limpiar($_POST['ncodigof']);
//                        mysqli_query("UPDATE clientcred_tmp SET fecha='$fecha' WHERE cliente='$ncodigof' and usu='$usu'");
//                    }
//                    
//                    if(!empty($_POST['status'])){
//                        $status=limpiar($_POST['status']);
//                        $ncodigos=limpiar($_POST['ncodigos']);
//                        mysqli_query("UPDATE clientcred_tmp SET status='$status' WHERE cliente='$ncodigos' and usu='$usu'");
//                    }
//                    
//                    if(!empty($_POST['status'])){
//                        $statusx=limpiar($_POST['status']);
//                        $ncodigos=limpiar($_POST['ncodigos']);
//                        mysqli_query("UPDATE clientcred_tmp SET status='$statusx' WHERE cliente='$ncodigos' and usu='$usu'");
//                    }
//                
                    if(!empty($_POST['buscar_cliente'])){
                        $buscarc=$_POST['buscar_cliente'];
                        $poa=mysqli_query($conexion,"SELECT tb_cliente.id_cliente FROM tb_cliente 
                        WHERE (tb_cliente.id_cliente='$buscarc' or tb_cliente.nombre_cliente='$buscarc' ) GROUP BY tb_cliente.nombre_cliente");  
                        if($roow=mysqli_fetch_array($poa)){
                            $codigoo=$roow['id_cliente'];
                            #$oRuta=new Consultar_Ruta($roow['ruta']);
                            $pa=mysqli_query($conexion,"SELECT * FROM clientcred_tmp WHERE id_cliente='$codigoo'");    
                            if($row=mysqli_fetch_array($pa)){
                                
                                mysqli_query($conexion,"UPDATE clientcred_tmp SET fecha='$fecha' WHERE id_cliente='$codigoo'");
                            }else{
                                mysqli_query($conexion,"INSERT INTO clientcred_tmp (id_cliente, fecha) VALUES ('$codigoo','$fecha')");   
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
                                $neto=0;$item=0;
                                $pa=mysqli_query($conexion,"SELECT * FROM clientcred_tmp, tb_cliente WHERE  clientcred_tmp.id_cliente=tb_cliente.id_cliente");                
                                while($row=mysqli_fetch_array($pa)){
                                    ############# FECHA ######################
                                    if($row['fecha']==NULL){
                                        
                                        #$oRuta->consultar('nombre');
                                        $fecha=$fecha;
                                    }else{
                                        $fecha=$row['fecha'];
                                        
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
                                                <input type="text" class="form-control" disabled="" value="<?php echo$row['dir_cliente']; ?>" name="dir">
                                            </div>
                                        </div>
                                    </form>
                            </div>
                             <div class="col-md-6">
                                    <form class="form-horizontal" role="form">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Fecha:</label>
                                                <div class="input-group m-t-10">
                                                    <input type="email" id="example-input2-group2" value="<?php echo $fecha; ?>" name="example-input2-group2" class="form-control" disabled="">
                                                   
                                            </div>
                                            </div>
                                        </div>
                                       
                                    </form>
                            </div>                                 
                                                                                                                      
                            <?php } ?>
                    
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
                                            $pa=mysqli_query($conexion,"SELECT articulos.nombre FROM inventario, articulos 
                                            WHERE articulos.idarticulos=inventario.id_articulos");               
                                            while($row=mysqli_fetch_array($pa)){
                                                echo '<option value="'.$row['nombre'].'">';
                                            }
                                        ?> 
                                    </datalist>
                                     </div>
                            </form>
                    </div>
                    <?php
                    if(!empty($_POST['new_cant'])){
                        $new_cant=limpiar($_POST['new_cant']);
                        $ncodigo=limpiar($_POST['ncodigo']);
                            $iv=mysqli_query("SELECT * FROM inventario WHERE articulo='$ncodigo'");                
                        if($row=mysqli_fetch_array($iv)){
                            $stock=$row['stock'];
                            if ($stock == 0 and $new_cant > $stock){
                                 $cantf='0';

                            }
                            else if ($stock == $row['stock_min'] and $new_cant > $row['stock_min']){
                                      $cantf=$stock;

                            }
                            else if ($stock >= $row['stock_min'] and $new_cant >= $row['stock']){
                                      $cantf=$stock;

                            }  
                            else {
                                $cantf=$new_cant;

                            }
                        } 
                       
                        if ($stock==0) {
                            $cantfx='1';
                        }
                        else{
                             $cantfx=$new_cant;
                        }

                        mysqli_query("UPDATE cajac_tmp SET cant='$cantf' WHERE articulo='$ncodigo' and usu='$usu'");
                    }
                    if(!empty($_POST['new_pv'])){
                        $new_pv=limpiar($_POST['new_pv']);
                        $especial=limpiar($_POST['especial']);
                        $pvcodigo=limpiar($_POST['pvcodigo']);
                        if ($new_pv=='n') {
                            $newp=$especial;
                        }
                        else{
                            $newp=$new_pv;
                        }

                        mysqli_query("UPDATE cajac_tmp SET p_mayor='$newp' WHERE articulo='$pvcodigo' and usu='$usu'");
                    }
                    
                    if(!empty($_POST['ncodigo_ref'])){
                        $referencia=limpiar($_POST['referencia']);
                        $ref_ant=limpiar($_POST['ref_ant']);
                        $ncodigo=limpiar($_POST['ncodigo_ref']);
                        
                        if($referencia==''){
                            mysqli_query("UPDATE cajac_tmp SET ref='' WHERE articulo='$ncodigo' and usu='$usu' and ref='$ref_ant'");
                        }else{
                            $pa=mysqli_query("SELECT * FROM cajac_tmp WHERE cajac_tmp.ref='$referencia'");             
                            if($row=mysqli_fetch_array($pa)){
                                echo mensajes('El Numero de Referencia "'.$referencia.'" Esta siendo usada','rojo');
                            }else{
                                mysqli_query("UPDATE cajac_tmp SET ref='$referencia' WHERE articulo='$ncodigo' and usu='$usu' and ref='$ref_ant'");
                            }
                        }
                        
                    } 
                    if(!empty($_POST['desc'])){
                        $desc=limpiar($_POST['desc']);
                        $ncodigod=limpiar($_POST['ncodigod']);
                         mysqli_query("INSERT INTO desc_tmp (descuento, almacen, usu) VALUES ('$desc','$id_almacen','$usu')");
                    } 

                   if(!empty($_POST['buscar'])){
                        $buscar=limpiar($_POST['buscar']);
                        $pro=mysqli_query("SELECT * FROM articulos 
                        WHERE (articulos.id LIKE '$buscar%' or articulos.nombre LIKE '$buscar%'  or articulos.codigo LIKE '$buscar%') GROUP BY articulos.nombre");   
                        if($roow=mysqli_fetch_array($pro)){
                            $codigo=$roow['id'];

                        $i=mysqli_query("SELECT * FROM inventario WHERE articulo='$codigo'");
                        if ($row=mysqli_fetch_array($i)) {
                            if ($row['stock'] == 0) {
                                 $oArticulo=new Consultar_Articulos($codigo);
                                echo mensajes('El Articulo '.$oArticulo->consultar('nombre').' se encuentra en Existencia "0"','naranja');
                            }
                            else{
                                  $pa=mysqli_query("SELECT * FROM cajac_tmp WHERE articulo='$codigo' and usu='$usu' and ref=''");   
                                    if($row=mysqli_fetch_array($pa)){
                                        $cant=$row['cant']+1;
                                        mysqli_query("UPDATE cajac_tmp SET cant='$cant' WHERE articulo='$codigo' and usu='$usu'");
                                    }else{
                                        mysqli_query("INSERT INTO cajac_tmp (articulo, cant, usu) VALUES ('$codigo','1','$usu')");    
                                    }

                            }
                           
                        }

                        ####################################################################################################    
                          
                        ####################################################################################################

                        }else
                        {
                            echo mensajes('El Producto que Busca no se encuentra Registrado en la Base de Datos','rojo');   
                        }
                    }                                                            
                ?>
                 <!--<?php
                    $descuento=''; 
                    $obs=mysqli_query("SELECT * FROM desc_tmp WHERE almacen='$id_almacen'");               
                         if(!$rows=mysqli_fetch_array($obs)){ 
                                    $obs='0';
                                }else{
                                    $obs=$rows['descuento'];
                                }
                                                                                                    
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
                                    
                                $neto=0;$item=0;$total=0;$iva=0;$xy=0;
                                $pa=mysqli_query("SELECT * FROM cajac_tmp, inventario WHERE cajac_tmp.usu='$usu' and cajac_tmp.articulo=inventario.articulo");              
                                while($row=mysqli_fetch_array($pa)){
                                    $item=$item+$row['cant'];                                   
                                    $defecto=strtolower($row['pv']);
                                    $valor=$row['pv'];

                                     ############### manejo de STOCK#########################
                                    if ($row['stock'] == 0) {
                                        $aviso=' <a href="#m'.$row['articulo'].'" role="button" class="btn btn-danger btn-mini" data-toggle="modal" title="Cambiar Cantidad" accesskey="c">
                                            <strong>Sin stock</strong>
                                        </a>';
                                    }
                                    else{
                                        $aviso=' <a href="#m'.$row['articulo'].'" role="button" class="btn btn-success btn-mini" data-toggle="modal" title="Cambiar Cantidad" accesskey="c">
                                            <strong>'.$row['cant'].'</strong>
                                        </a>';
                                    }
                                    ########################################
                                    if($row['ref']==NULL){
                                        $referencia='Sin Referencia';
                                    }else{
                                        $referencia=$row['ref'];
                                    }
                                     if($row['p_mayor']==NULL){
                                        $new=$row['pv'];
                                    }else{
                                        $new=$row['p_mayor'];
                                    }
                                    ############### IVA #########################
                                   $xy=$iva_emp/100;


                                    ###############CALCULOS TOTALES#########################
                                    $importe=$row['cant']*$new;
                                    $neto=$neto+$importe;
                                    $iva=$neto*$xy;
                                    
                                    $oArticulo=new Consultar_Articulos($row['articulo']);
                            ?>
                            <tr>
                             <td align="center"><span class="label label-info"> <?php echo $row['codigo']; ?></span></td>                                                             
                                <td><?php echo $oArticulo->consultar('nombre');  ?></td>
                                <td>
                                    <center>
                                      <?php echo $aviso; ?>
                                    </center>
                                </td>
                                <td>
                                <div align="right">
                                        <a  href="#p<?php echo $row['articulo']; ?>" role="button" class="btn btn-primary btn-mini" data-toggle="modal" title="Cambiar Precio" accesskey="p">
                                            <strong><?php echo $s.' '.formato($new); ?></strong>
                                        </a>
                                </div>
                                </td>
                                <td><div align="right"><strong><?php echo $s.' '.formato($importe); ?></div></strong></td>                                
                                <td>
                                    <center>                           
                                        <a href="credito.php?del=<?php echo $row['articulo']; ?>"  class="btn btn-danger" title="Eliminar">
                                            <i class="fa fa-times" ></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                           
                      <!--  Modals-->
                                 <div class="modal fade" id="m<?php echo $row['articulo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Actualizar Cantidad<br>[<?php echo $oArticulo->consultar('nombre');  ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                            <div class="col-md-4" > 
                                            
                                            </div>
                                            <div class="col-md-4" >                                         
                                                <input type="hidden" name="ncodigo" value="<?php echo $row['articulo']; ?>">
                                                <strong>Nueva Cantidad</strong><br>
                                                <input type="number" class="form-control" name="new_cant" min="1" value="<?php echo $row['cant'] ?>" autocomplete="off" required>
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
                     <!-- End Modals-->
                     <!--  Modals-->
                                 <div class="modal fade" id="p<?php echo $row['articulo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Cambiar Precio<br>[<?php echo $oArticulo->consultar('nombre');  ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                            <div class="col-md-6" >                                         
                                                <input type="hidden" name="pvcodigo" value="<?php echo $row['articulo']; ?>">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Precios</span>
                                                        <select class="form-control" name="new_pv" autocomplete="off" required>
                                                            <option value="n">---SELECCIONE---</option>
                                                            <option value="<?php echo $row['pmy'] ?>"><?php echo $s.' '.formato($row['pmy']) ?> [P.MAYOR]</option>
                                                            <option value="<?php echo $row['pv'] ?>"><?php echo $s.' '.formato($row['pv']) ?> [P.VENTA]</option>                                            
                                                        </select>                                               
                                                </div>
                                            </div>
                                             <div class="col-md-6" >                                         
                                                <div class="input-group">
                                                    <span class="input-group-addon">Precio Especial</span>
                                                        <input type="number" min="0" step="any" class="form-control" name="especial" autocomplete="off"><br>                                             
                                                </div>
                                            </div>                                                                                                                    
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar Precio</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals-->                                                                                             
                            <?php } ?>
                        </table>                                
                    </div>
                    <!-- COBROS -->
                    <div class="span4">
                     <div class="table-responsive">
                        <table border="0" class="table">
                             <tr>
                                <td colspan="4"><div align="right"><strong>Suma</strong></div></td>
                                <td><div align="right"><strong>$ <?php echo formato($neto); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"><div align="right"><strong>IVA</strong></div></td>
                                <td><div align="right"><strong>$ <?php echo formato($iva); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"><div align="right"><strong>Sub Total</strong></div></td>
                                <td><div align="right"><strong>$ <?php echo formato($neto+$iva); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"><div align="right"><strong>(-) IVA Retenido</strong></div></td>
                                <td><div align="right"><strong>$ <?php echo formato(0); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"><div align="right"><strong>Ventas Excentas</strong></div></td>
                                <td><div align="right"><strong>$ <?php echo formato(0); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"><div align="right"><strong>Total</strong></div></td>
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
                                <td><div align="right"><strong>$ <?php echo formato($total+$iva); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3"><div align="right">
                                   
                                     <form name="form3" method="get" action="index.php">
                                                <button type="submit" class="btn btn-default">Aplicar Descuento</button></div>
                                </td>
                                 <td colspan="2" width="15%"><div align="right">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input type="number" class="form-control" min="0" max="99" name="ddes" id="ddes" value="<?php echo $_SESSION['ddes']; ?>">
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
                        <!--<table class="table table-bordered">
                            <tr>
                                <td>
                                    <center><strong>TOTAL</strong>
                                    <pre><h2 class="text-success" align="center">$ <?php echo formato($total); ?></h2></pre>
                                    
                                </td>
                            </tr>
                        </table>-->
                        <?php if($neto<>0){ ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div align="center">
                                        <a href="#factura" role="button" class="btn btn-primary btn-lg" data-toggle="modal">
                                            <i class="fa fa-list icon-white"></i> <strong>FACTURAR</strong>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php } ?>
                    </div>
                    <!--  Modals-->
                                 <div class="modal fade" id="factura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_cont_cred.php" method="get">
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
                                                    <div style=" bg-color: red;font-size:50px"><?php echo $s.' '.formato($total+$iva); ?></div>
                                                </div>                           
                                            </div>
                                        </div>                                       
                                            <br>
                                             <strong>Dinero Recibido</strong><br>
                                              <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                             <div class="input-group">
                                                <span class="input-group-addon"><?php echo $s; ?></span>
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
                                            <input type="hidden" value="<?php echo $total; ?>" name="neto">  
                                            <input type="hidden" value="<?php echo $iva; ?>" name="iva">  
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
                     <!-- End Modals-->
                </div>
                </div>
              </div>
               </div>
                </div> 
                </div>
            </div>   
                       
                    </div>
                    <!-- /.col-lg-12 FIN DE AQUI TODO EL CONTENIDO -->
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->

      
<?php

include_once '../Plantilla/inferior.php';
?>