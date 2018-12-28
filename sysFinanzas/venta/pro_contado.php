<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';
 include_once '../Plantilla/encabezado.php';
  include_once '../Plantilla/menuLateral.php';

if(!empty($_GET['valor_recibido']) and !empty($_GET['neto'])){
        $valor_recibido=$_GET['valor_recibido'];
        $netoO=$_GET['neto'];
        $pago=$_GET['pago'];
        $neto=$netoO;
        if ($_GET['pago']=='CONTADO') {
            # code...
        }else{
        $intereR=$_GET['interes'];
        $mesR=$_GET['mes'];
         }

        $fecha=date('Y-m-d');
        $hora=date('H:i:s');
        
        $pa=mysqli_query($conexion,"SELECT * FROM venta_temp");             
        if(!$row=mysqli_fetch_array($pa)){   
            header('Location: index.php');
        }
}

######### SACAMOS EL VALOR MAXIMO DE LA FACTURA Y LE SUMAMOS UNO ##########
        $pa=mysqli_query($conexion,"SELECT MAX(factura)as maximo FROM factura");               
        if($row=mysqli_fetch_array($pa)){
            if($row['maximo']==NULL){
                $factura='12548741';
            }else{
                $factura=$row['maximo']+1;
            }
        }
?>


        <!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
        <div id="page-wrapper">
            <div class="container-fluid">
               <table width="95%" rules="all" border="1">
                            <?php 
                                                $item=0;
                                                $pa=mysqli_query($conexion,"SELECT * FROM cliente_temp, tb_cliente 
                                                WHERE  cliente_temp.id_cliente=tb_cliente.id_cliente");             
                                                while($row=mysqli_fetch_array($pa)){                                                                                                                                                 
                                                    $c_nombre=$row['nombre_cliente'];
                                                    $id_cliente=$row['id_cliente'];
                                                    $direccion=$row['dir_cliente'];
                                                     $fecha_hoy=date("Y-m-d");
                                                    
                                                    ############# FECHA ######################
                                                    if($row['fecha']==NULL){
                                                        
                                                        #$oRuta->consultar('nombre');
                                                        $fechax=$fecha;
                                                    }else{
                                                        $fechax=$row['fecha'];
                                                        
                                                    }
                                                   
//                                                    ############# STATUS BASIC ######################
//                                                    if($row['status']==NULL){
//                                                        
//                                                         $statusx='CONTADO';
//                                                    }else{
//                                                        $statusx=$row['status'];
//                                                        
//                                                    }
//                                                    
//                                                    ############# STATUS FULL ######################
//                                                    if($row['status']==NULL){
//                                                        
//                                                         $status='CONTADO';
//                                                    }else{
//                                                        $status=$row['status'];
//                                                        
//                                                    }
//                                                    $pame=strftime( "%Y-%m-%d-%H-%M-%S", time() );      
//                                
//                                    if($row['fecha']==$pame){
//                                                    $status='si';
//                                                }                                                                                               
//                                                elseif($row['fecha']>$pame){
//                                                    $status='CREDITO';
//                                                }
                            ?>
                                                                                                                                                                                
                                            <?php } ?>
                                           
                     </table>
            <div class="row">
                <div class="col-md-8">
                    <!-- Advanced Tables -->
                    <div class="panel panel-green">
                        <div class="panel-heading">
                             INFORMACION DE FACTURA
                        </div>
                        <!--Prueba-->
                        <br/>
                       <div class="row">
                           <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-print fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Total</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <div class="panel-body">
                            <div style=" bg-color: red;font-size:20px"><?php echo '$'.formato($neto); ?> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                  <?php  if ($_GET['pago']=='CONTADO') {?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-angellist fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Recibido</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <br/>
                                 <div style=" bg-color: blue;font-size:20px"><?php echo '$'.formato($valor_recibido); ?> </div>
                              
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                  <?php }else{?>
                           <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Prima</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <br/>
                                 <div style=" bg-color: blue;font-size:20px"><?php echo '$'.formato($valor_recibido); ?> </div>
                              
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                  <?php }?>
                           <?php  if ($_GET['pago']=='CONTADO') {?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Vuelto</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <div style=" bg-color: green;font-size:20px"><?php echo '$'.formato($valor_recibido-$neto); ?> </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                           <?php }?>
                <div class="col-lg-3 col-md-6">
                  
                </div>
            </div>
                        <!--fin pureba-->
                        <div class="panel-body">
                        <center><button onclick="imprimir();" class="btn btn-default"><i class=" fa fa-print "></i> Imprimir</button></center><br>
                        <?php if ($_GET['pago']=='CONTADO') { }else{?>
                        <center> <button type="submit" class="btn btn-primary" onclick="location.href='./contrato.php?ir=<?php echo $id_cliente;?>&fac=<?php echo $factura;?>'">Contrato</button></center><br>
                        <?php }?>
                            <div class="table-responsive">  
                                    <table  width="100%" style="border: 1px solid #660000; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 10px;">
                                     <tr>
                                        <td>
                                            <center>
                                                <img src="../Imagenes/finanzas.png" width="75px" height="75px"><br>
                                            <!--<strong><?php //echo $nombre_empresa; ?></strong><br>-->
                                            </center>                                                    
                                        </td>
                                        <td>
                                        <td align="center">                     
                                            <div style="font-size: 25px;"><strong><em><?php// echo $nombre_empresa; ?></em></strong></div>
                                            <div style="font-size: 14px;"><strong>Almacen: <?php //echo $nombre_Almacen; ?></strong></div>
                                            <!--<strong><?php //echo $nombre_empresa; ?></strong><br>-->                                                 
                                        </td>                                                  
                                        </td>
                                        <td>
                                             <div style="font-size: 12px;" align="right">
                                                    <strong>DOCUMENTO: </strong><?php //echo $factura; ?><br>
                                                    <strong>FECHA: </strong><?php //echo //fecha($fecha); ?> | 
                                                    <strong>HORA: </strong><?php //echo date($hora); ?><br>
                                                    <strong>USUARIO/A: </strong><?php //echo $cajero_nombre; ?>
                                            </div>
                                        </td>
                                     </tr>                          
                                    </table>
                            </div>
                            <?php 
                                    $n=mysqli_query($conexion,"SELECT * FROM cliente_temp");               
                                        if(!$rowx=mysqli_fetch_array($n)){
                                            $activar='hidden';
                                            $c_nombre='CONSUMIDOR FINAL';
                                            $id_cliente='0';
                                            $direccion='';
                                            $pago='CONTADO';
                                            $fecha_hoy=date("Y-m-d");
                            ?>
                            <?php } ?>
                            <br>
                            <div id="imprimeme">
                             <br><br><br><br><br><br>
                            <table class="table" width="425px" style="border: 1px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 10px;">
                                        <tr>
                                            <td colspan="4">
                                            <div style="font-size: 14px;" align="right"><?php //echo fecha($fecha); ?></div><br>                                             
                                            </td>
                                        </tr>
                                         <tr>
                                            <td align="center">                                             
                                            </td>
                                            <td class="text-default">
                                                <div class="<?php echo $activar; ?>">     
                                                <strong> &nbsp;&nbsp;Nombre: <?php echo $c_nombre; ?></strong><br>
                                                <strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección: <?php echo $direccion; ?></strong><br>                                                                          
                                                <strong></strong><br>
                                                <strong></strong><br>
                                                </div>                                                                                                                                     
                                            </td>
                                         </tr>
                                                                      
                            </table>
                            <br>
                            <div style="width:100%; height:275px; overflow: auto;">      
                            <table class="table" width="425px" style="border: 1px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 10px;">
                                            <?php 
                                                $item=0;
                                                $neto=0;
                                                $neto_full=0;
                                                mysqli_query($conexion,"INSERT INTO factura (factura,valor,fecha) VALUE ('$factura','$netoO','$fecha')");
                                                    
                                                $pa=mysqli_query($conexion,"SELECT * FROM venta_temp, inventario 
                                                WHERE  venta_temp.id_articulo=inventario.id_articulos");             
                                                while($row=mysqli_fetch_array($pa)){                                             
                                                    $cat=$row['cantidad'];   
                                                    $item=$item+$row['cantidad'];   
                                                    $cantidad=$row['cantidad'];
                                                    $id_art=$row['id_articulo'];        
                                                    $codigo=$row['id_articulo'];        
                                                         
                                                    $precio_venta=$row['pv'];
                                                  
                                                     $new=$row['pv'];
                                                                                                                                                           
                                                   
                                                    
                                                    ########################################
                                                  
                                                    $importe_dos=$row['cantidad']*$new;
                                                    $neto_full=$neto_full+$importe_dos;
                                                    
                                                    ###############CALCULOS TOTALES#########################
                                                    $importe=$row['cantidad']*$new;
                                                    $neto=$neto+$importe;
                        $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos=".$row['id_articulo']."");                
                        while($rowCon=mysqli_fetch_array($consultaAr)){
                                                   
                            $p_nombre=$rowCon['nombre'];
                            $costo=$rowCon['valor'];
                        }
                                                    $cost_total=$row['cantidad']*$costo;
                                                    
                                                    ########################################
                                                      
                                                   $detalles_sql='';
                                                    mysqli_query($conexion,"INSERT INTO detalle (factura, articulo, codigo, cantidad, valor, importe, tipo, fecha)
                                                                              VALUES ('$factura','$id_art','$codigo','$cantidad','$new','$importe_dos','VENTA','$fecha')");
                                                    
                                                    #########DESCONTAR INVENTARIO################################################################
                                                     $pwa=mysqli_query($conexion,"SELECT * FROM inventario WHERE id_articulos='$codigo'");             
                                                    if($roww=mysqli_fetch_array($pwa)){
                                                        $stock=$roww['stock'];  
                                                        $new_cant=$roww['stock']-$cantidad;
                                                        mysqli_query($conexion,"UPDATE inventario SET stock='$new_cant' WHERE id_articulos='$codigo'");
                                                    } 
                                                    ############### GUARDAMOS EN LA TABLA KARDEX#########################
                                                    $detalle_sql="INSERT INTO kardex (factura, tipo, id_articulos, cantidad, costoK, importe, stockk, fecha)
                                                                          VALUES ('$factura','VENTA','$id_art','$cantidad','$costo','$cost_total','$new_cant','$fecha')";
                                                    mysqli_query($conexion,$detalle_sql);                                                                                                                                                                                                            
                                            ?>
                                            <tr>
                                                <td width="5%" align="left"><?php echo $cantidad; ?></td>                                                
                                                <td width="75%"><?php echo  $p_nombre;  ?></td>
                                                <td><div align="right">$<?php echo formato($new); ?></div></td>
                                                <td width="20%"><div align="right"></div></td>
                                                <td width="2%"><div align="right"></div></td>
                                                <td><div align="right">$<?php echo formato($importe_dos); ?></div></td>
                                            </tr>
                                                <?php } ?>
                                        </table>
                                        </div>
                                        <br>

                                        <table class="table" width="450px" style="border: 0px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 12px;">
                                          <tr>
                                               <td colspan="4" align="right" class="text-default" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;<?php echo formato($netoO); ?></td>
                                            </tr>
                                         <tr>
                                               <td colspan="4" align="right" class="text-danger" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;<?php echo formato(0); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right" class="text-danger" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;<?php echo formato(0); ?></td>
                                            </tr>
                                            <tr>
                                               <td colspan="4" align="right" class="text-danger" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;<?php echo formato(0); ?></td>                                                                                                                    
                                            </tr>
                                             <tr>
                                               <td colspan="4" align="right" class="text-danger" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;<?php echo formato(0); ?></td>                                                                                                                    
                                            </tr>
                                            <tr>
                                               <td colspan="4" align="right" class="text-danger" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;<?php echo formato(0); ?></td>                                                                                                                    
                                            </tr>  
                                             <tr>
                                               <td colspan="4" align="right" class="text-default" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;<?php echo formato($netoO); ?></td>                                                                                                                    
                                            </tr>                            
                                        </table>    
                                        
                                         <div class="row">
                                                      
            </div>                                                                                                                         
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <?php 
        ######## GUARDAMOS LA INFORMACION DE LA FACTURA EN LAS TABLAS
        $fecha=date('Y-m-d');                   
        $hora=date('H:i:s');
        $mensaje='Venta al "'.$pago.'"';
      
       mysqli_query($conexion,"INSERT INTO resumen (id_clientes,concepto,factura,clase,valor,tipo,fecha,hora,status) 
                                  VALUES ('$id_cliente','$mensaje','$factura','VENTA','$netoO','VENTA','$fecha','$hora','$pago')");
        if ($pago == 'CREDITO'){  
             $guardax=$netoO-$valor_recibido;
             $interesG=($intereR/100)/12;
        $mx=round(($guardax*$interesG*(pow((1+$interesG),($mesR))))/((pow((1+$interesG),($mesR)))-1),2);
             $totalint=0;
        for($i=1;$i<=$mesR;$i++)
        {
                $totalint=round($totalint+($guardax*$interesG),2);
                number_format($guardax*$interesG,2,",",".");
                number_format($mx-($guardax*$interesG),2,",",".");
 
                $guardax=$guardax-($mx-($guardax*$interesG));
        }


        $guarda=$netoO-$valor_recibido;
        $interesG=($intereR/100)/12;
        $interesAg=round($guarda*$interesG,2);
        $m=round(($guarda*$interesG*(pow((1+$interesG),($mesR))))/((pow((1+$interesG),($mesR)))-1),2);

           
            mysqli_query($conexion,"INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora,interes,cuota,to_interes) 
                                       VALUES ('$id_cliente','$factura','CXC','$guarda','$fecha','$hora','$intereR','$m','$totalint')");          
        }
            else
            {
                mysqli_query($conexion,"INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora) 
                                           VALUES ('$mensaje','$factura','ENTRADA','$netoO','$fecha','$hora')");
            } 

       mysqli_query($conexion,"DELETE FROM venta_temp");
       mysqli_query($conexion,"DELETE FROM cliente_temp");
    ?>    
            
               
           
             <!-- /. PAGE INNER  -->
                                       
        </div>
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->

   
<?php

include_once '../Plantilla/inferior.php';
?>