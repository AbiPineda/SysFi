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
                        <div class="panel panel-success">
                        <div class="panel-heading">
                             NUEVA COMPRA
                        </div>
                        <div class="panel-body">
             <div class="col-md-8">
			 <div class="alert alert-default" align="center">                           
                            <form name="form2" action="" method="post">
                                     <div class="input-group">
                                    <span class="input-group-addon">PROVEEDOR:</span>
                                    <input type="text" list="browsers1" name="buscar_cliente" autocomplete="off" class="form-control" required>
                                    <datalist id="browsers1">
                                        <?php
                                            $pa=mysqli_query($conexion,"SELECT * FROM proveedor 
                                            WHERE proveedor.idproveedor");                
                                            while($row=mysqli_fetch_array($pa)){
                                                echo '<option value="'.$row['proveedor'].'">';                                          
                                            }
                                        ?> 
                                    </datalist>
                                    </div>
                                </form>
                    </div>
                 
                </div>
                <div class="col-md-4">
                         <div class="panel-body" align="center">                                                                                 
                            <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-2x"></i>
                            </button>
                            </button>
                                                                                                            
                  </div>
                </div>
                 <div class="col-md-12">
                    <?php
                    if(!empty($_POST['fecha'])){
                        $fecha=limpiar($_POST['fecha']);
                        $ncodigof=limpiar($_POST['ncodigof']);
                        mysqli_query("UPDATE prov_tmp SET fecha='$fecha' WHERE proveedor='$ncodigof' and usu='$usu'");
                    }
                    
                    if(!empty($_POST['status'])){
                        $status=limpiar($_POST['status']);
                        $ncodigos=limpiar($_POST['ncodigos']);
                        mysqli_query("UPDATE prov_tmp SET status='$status' WHERE proveedor='$ncodigos' and usu='$usu'");
                    }
                    
                    if(!empty($_POST['status'])){
                        $statusx=limpiar($_POST['status']);
                        $ncodigos=limpiar($_POST['ncodigos']);
                        mysqli_query("UPDATE prov_tmp SET status='$statusx' WHERE proveedor='$ncodigos' and usu='$usu'");
                    }
                
                    if(!empty($_POST['buscar_cliente'])){
                        $buscarc=$_POST['buscar_cliente'];
                        $poa=mysqli_query($conexion,"SELECT proveedor.idproveedor FROM proveedor 
                        WHERE (proveedor.idproveedor='$buscarc' or proveedor.proveedor='$buscarc') GROUP BY proveedor.proveedor");  
                        if($roow=mysqli_fetch_array($poa)){
                            $codigoo=$roow['idproveedor'];
                            #$oRuta=new Consultar_Ruta($roow['ruta']);
                            $pa=mysqli_query($conexion,"SELECT * FROM prov_tmp WHERE proveedor='$codigoo'");    
                            if($row=mysqli_fetch_array($pa)){
                                
                                mysqli_query($conexion,"UPDATE prov_tmp SET fecha='$fecha' WHERE proveedor='$codigoo'");
                            }else{
                                mysqli_query($conexion,"INSERT INTO prov_tmp (proveedor, fecha) VALUES ('$codigoo','$fecha')");   
                            }
                        }else{
                            echo mensajes('El Proveedor que Busca no se encuentra Registrado en la Base de Datos','rojo');    
                        }
                    }                                                           
                ?>
                 <!-- /. ROW  -->
            </div>
               
            <div class="row">
                <div class="col-md-12">
                        <?php 
                                $neto=0;$item=0;
                                $pa=mysqli_query($conexion,"SELECT * FROM prov_tmp, proveedor WHERE prov_tmp.proveedor=proveedor.idproveedor");                
                                while($row=mysqli_fetch_array($pa)){
                                    $provee=$row['idproveedor'];
                                    ############# FECHA ######################
                                    if($row['fecha']==NULL){
                                        
                                        #$oRuta->consultar('nombre');
                                        $fecha=$fecha;
                                    }else{
                                        $fecha=$row['fecha'];
                                        
                                    }
                                  
                                    
                                    $pame=strftime( "%Y-%m-%d-%H-%M-%S", time() );                                      
                                   
                                    
                            ?>
                                <div class="col-md-6">
                                    <form class="form-horizontal" role="form">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nombre:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $row['proveedor']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Precedencia:</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" disabled="" value="<?php echo $row['direccion']; ?>" name="dir">
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
                                            $pa=mysqli_query($conexion,"SELECT*FROM articulos INNER JOIN inventario ON articulos.idarticulos=inventario.id_articulos
INNER JOIN proveedor ON proveedor.idproveedor=articulos.idproveedor WHERE proveedor.idproveedor='$provee'");               
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
                        $new_cant=$_POST['new_cant'];
                        $ncodigo=$_POST['ncodigo'];
                        mysqli_query($conexion,"UPDATE compra_tmp SET cant='$new_cant' WHERE id_articulo='$ncodigo'");
                    }
                     if(!empty($_POST['new_pv'])){
                        $new_pv=limpiar($_POST['new_pv']);
                        $pvcodigo=limpiar($_POST['pvcodigo']);
                        mysqli_query("UPDATE compra_tmp SET p_compra='$new_pv' WHERE articulo='$pvcodigo' and usu='$usu'");
                    }
                    
                    if(!empty($_POST['ncodigo_ref'])){
                        $referencia=limpiar($_POST['referencia']);
                        $ref_ant=limpiar($_POST['ref_ant']);
                        $ncodigo=limpiar($_POST['ncodigo_ref']);
                        
                        if($referencia==''){
                            mysqli_query("UPDATE compra_tmp SET ref='' WHERE articulo='$ncodigo' and usu='$usu' and ref='$ref_ant'");
                        }else{
                            $pa=mysqli_query("SELECT * FROM compra_tmp WHERE compra_tmp.ref='$referencia'");             
                            if($row=mysqli_fetch_array($pa)){
                                echo mensajes('El Numero de Referencia "'.$referencia.'" Esta siendo usada','rojo');
                            }else{
                                mysqli_query("UPDATE compra_tmp SET ref='$referencia' WHERE articulo='$ncodigo' and usu='$usu' and ref='$ref_ant'");
                            }
                        }
                        
                    }   

                    if(!empty($_POST['buscar'])){
                        $buscar=$_POST['buscar'];
                        $poa=mysqli_query($conexion,"SELECT articulos.idarticulos FROM articulos 
                        WHERE (articulos.idarticulos LIKE '$buscar%' or articulos.nombre LIKE '$buscar%') GROUP BY articulos.nombre");   
                        if($roow=mysqli_fetch_array($poa)){
                            $codigo=$roow['idarticulos'];
                            $pa=mysqli_query($conexion,"SELECT * FROM compra_tmp WHERE id_articulo='$codigo'");   
                            if($row=mysqli_fetch_array($pa)){
                                $cant=$row['cantidad']+1;
                                mysqli_query($conexion,"UPDATE compra_tmp SET cant='$cant' WHERE id_articulo='$codigo'");
                            }else{
                                mysqli_query($conexion,"INSERT INTO compra_tmp (id_articulo, cant) VALUES ('$codigo','1')");    
                            }
                        }else{
                            echo mensajes('El Producto que Busca no se encuentra Registrado en la Base de Datos','rojo');   
                        }
                    }                                                           
                ?>
                <div class="table-responsive">                                
                        <table class="table table-striped">
                            <tr class="well-dos">
                                <td><strong>CODIGO</strong></td>
                                <!--<td><strong>Referencia</strong></td>-->
                                <td><strong>PRODUCTO</strong></td>
                                <td><strong><center>CANT.</center></strong></td>
                                <td><strong><div align="right">COSTO</div></strong></td>
                                <td><strong><div align="right">TOTAL</div></strong></td>
                                <td></td>
                            </tr>
                            <?php 
                                $neto=0;$item=0;
                                $pa=mysqli_query($conexion,"SELECT * FROM compra_tmp, articulos WHERE  compra_tmp.id_articulo=articulos.idarticulos");              
                                while($row=mysqli_fetch_array($pa)){
                                    $item=$item+$row['cant'];                                   
                                    $defecto=strtolower($row['valor']);
                                    $valor=$row['valor'];                                    
                                    
                                        $new=$row['valor'];
                                    
                                    ###############CALCULOS TOTALES#########################
                                    $importe=$row['cant']*$new;
                                    $neto=$neto+$importe;
//                                    $oArticulo=new Consultar_Articulos($row['articulo']);
                       $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos=".$row['id_articulo']."");                
                        while($rows=mysqli_fetch_array($consultaAr)){
                            ?>
                            <tr>
                             <td align="center"><span class="label label-info"> <?php echo $rows['codigo']; ?></span></td>                                                             
                                <td><?php echo $rows['nombre'];  ?></td>
                                <td>
                                    <center>
                                        <a href="#m<?php echo $rows['idarticulos']; ?>" role="button" class="btn btn-success btn-mini" data-toggle="modal" title="Cambiar Cantidad">
                                            <strong><?php echo $item; ?></strong>
                                        </a>
                                    </center>
                                </td>
                                <td>
                                 <center>
                                        <a href="#p<?php echo $row['articulo']; ?>" role="button" class="btn btn-primary btn-mini" data-toggle="modal" title="Cambiar Costo">
                                            <strong><?php echo '$'.formato($new); ?></strong>
                                        </a>
                                </center>
                                </td>
                                <td><div align="right"><?php echo '$'.formato($importe); ?></div></td>                                
                                <td>
                                    <center>                           
                                        <a href="index.php?del=<?php echo $rows['idarticulos']; ?>"  class="btn btn-danger" title="Eliminar">
                                            <i class="fa fa-times" ></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>                                                       
                            </div>
                      <!--  Modals-->
                                 <div class="modal fade" id="m<?php echo $rows['idarticulos']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Actualizar Cantidad<br>[<?php echo $rows['nombre'];  ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                            <div class="col-md-3" > 
                                            
                                            </div>
                                            <div class="col-md-6" >                                         
                                                <input type="hidden" name="ncodigo" value="<?php echo $rows['idarticulos']; ?>">
                                                <strong>Nueva Cantidad</strong><br>
                                                <input type="number"  class="form-control" name="new_cant" min="1" value="<?php echo $row['cantidad'] ?>" autocomplete="off" required>
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
     
                     <!-- End Modals-->                                                                                                     
                                <?php } } ?>
                        </table>                                
                    </div>
                    <!-- COBROS -->
                    <div class="span4">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <center><strong>TOTAL</strong>
                                    <pre><h2 class="text-success" align="center">$<?php echo formato($neto); ?></h2></pre>
                                    
                                </td>
                            </tr>
                        </table>
                        <?php if($neto<>0){ ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div align="center">
                                        <a href="#contado" role="button" class="btn btn-primary btn-lg" data-toggle="modal">
                                            <i class="icon-shopping-cart icon-white"></i> <strong>Realizar Operación</strong>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php } ?>
                    </div>
                    <!--  Modals-->
                                 <div class="modal fade" id="contado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_contado.php" method="get">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Seguridad</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">                                       
                                                                                    
                                            <strong>COMPRA</strong><br>
                                             <div class="alert alert-danger">
                                                <h4>¿Esta Seguro de Procesar esta operación?<br> 
                                                una vez completada no podra ser editada.</h4>
                                            </div>
                                               <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Forma de Pago</span>
                                               <select class="form-control" name="pago">
                                                    <option value="CONTADO">CONTADO</option>
                                                    <option value="CREDITO">CREDITO</option>
                                                </select>                                               
                                             </div><br>
                                             </div>                                           
                                            <input type="hidden" value="<?php echo $neto; ?>" name="valor_recibido">
                                            <input type="hidden" value="<?php echo $neto; ?>" name="neto">  
                                                                                                                                                        
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
                <!-- /. ROW  -->      
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->

      
<?php

include_once '../Plantilla/inferior.php';
?>