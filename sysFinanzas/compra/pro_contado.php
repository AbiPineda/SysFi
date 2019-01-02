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

        $fecha=date('Y-m-d');
        $hora=date('H:i:s');
        
//        $pa=mysqli_query($conexion,"SELECT * FROM venta_temp");             
//        if(!$row=mysqli_fetch_array($pa)){   
//            header('Location: index.php');
     //   }
}

######### SACAMOS EL VALOR MAXIMO DE LA FACTURA Y LE SUMAMOS UNO ##########
        $pa=mysqli_query($conexion,"SELECT MAX(factura)as maximo FROM factura");               
        if($row=mysqli_fetch_array($pa)){
            if($row['maximo']==NULL){
                $factura='10011011';
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
                                                $pa=mysqli_query($conexion,"SELECT * FROM prov_tmp, proveedor 
                                                WHERE  prov_tmp.proveedor=proveedor.idproveedor");             
                                                while($row=mysqli_fetch_array($pa)){                                                                                                                                                 
                                                    $c_nombre=$row['proveedor'];
                                                    $id_proveedor=$row['idproveedor'];
                                                    $direccion=$row['direccion'];
                                                   
                                                     $fecha_hoy=date("Y-m-d");
                                                    
                                                    ############# FECHA ######################
                                                    if($row['fecha']==NULL){
                                                        
                                                        #$oRuta->consultar('nombre');
                                                        $fechax=$fecha;
                                                    }else{
                                                        $fechax=$row['fecha'];
                                                        
                                                    }
                                                    
                            ?>
                                                                                                                                                                                
                                            <?php } ?>
                                           
                     </table>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <br/>
                  <div class="panel panel-green">
                        <div class="panel-heading">
                             DETALLES DE COMPRA
                        </div>
                        <div class="table-responsive">
                        <div class="panel-body">
                        <center><button onclick="imprimir();" class="btn btn-default"><i class=" fa fa-print "></i> Imprimir</button></center>
                        <div id="imprimeme">
                        <table width="100%">
                            <tr>
                                <td>
                                    <center>
                                   
                                        <img src="../Imagenes/finanzas.png" width="130" height="110"><br>
                                    <strong><?php //echo $nombre_empresa; ?></strong><br>
                                    </center>
                                </td>
                                <td><br>
                                    <strong>DOCUMENTO: </strong><?php //echo $factura; ?><br>
                                    <strong>FECHA: </strong><?php //echo fecha($fecha); ?> 
                                    <strong>HORA: </strong><?php //echo date($hora); ?><br>
                                    <strong>USUARIO/A: </strong><?php //echo $cajero_nombre; ?>
                                </td>
                            </tr>
                            <?php 
                                    $n=mysqli_query($conexion,"SELECT * FROM prov_tmp");               
                                        if(!$rowx=mysqli_fetch_array($n)){
                                            $activar='hidden';
                                            $c_nombre='PROVEEDORES VARIOS';
                                            $id_cliente='0';
                                            $dir='';
                                            $pago='CONTADO';
                                            $fechax=date("Y-m-d");
                            ?>
                            <?php } ?>
                        </table><br>        
                            <strong>Proveedor: </strong><?php //echo $c_nombre; ?><br>
                            <strong>Dirección: </strong><?php //echo $dir; ?><br>                                                                          
                            <strong>Tipo: </strong><?php //echo $pago; ?><br>
                            <strong>Fecha de Compra: </strong><?php //echo $fechax; ?><br><br>                                                                                                                                                                   
                          <table class="table table-striped table-bordered table-hover" width="100%" rules="all"  border="1">
                                            <tr>
                                                <td><strong>CANTIDAD</strong></td>                                              
                                                <td><strong>PRODUCTO</strong></td>
                                                <td><div align="right"><strong>COSTO UNITARIO</strong></div></td>
                                                <td><div align="right"><strong>TOTAL</strong></div></td>
                                            </tr>
                                            <?php 
                                                $item=0;
                                                $neto=0;
                                                $neto_full=0;
                                                $pa=mysqli_query($conexion,"SELECT * FROM compra_tmp, articulos 
                                                WHERE  compra_tmp.id_articulo=articulos.idarticulos");             
                                                while($row=mysqli_fetch_array($pa)){
                                                    $cat=$row['cant'];                                              
                                                    $item=$item+$row['cant'];   
                                                    $cantidad=$row['cant'];
                                                    $codigo=$row['id_articulo'];        
                                                    $cod=$row['codigo'];        
                                                    $precio_venta=strtolower($row['valor']);
                                                  
                                                                                                                                    
                                               
                                                   
                                                        $new=$row['valor'];
                                                    $importe=$row['cant']*$new;
                                                    $neto=$neto+$importe;                                                                                                       
                                                                         
                                                    ###############CALCULOS TOTALES#########################
                                                    $importe_dos=$row['cant']*$new;
                                                    $neto_full=$neto_full+$importe_dos;
                                                    
                                                     mysqli_query($conexion,"INSERT INTO factura (factura,valor,fecha) VALUE ('$factura','$neto','$fecha')");
                                                
                                                    ########################################
                                                    $consultaAr=mysqli_query($conexion,"SELECT * FROM articulos WHERE idarticulos=".$row['id_articulo']."");                
                                                    while($row=mysqli_fetch_array($consultaAr)){
                                                    $p_nombre=$row['nombre'];
                                                    }
                                                    ########################################
                                                    $detalle_sql="INSERT INTO detalle_compra (factura,articulo,codigo, cantidad, valor, importe, tipo, fecha)
                                                                                  VALUES ('$factura','$codigo','$cod','$cantidad','$new','$importe_dos','COMPRA', '$fecha')";
                                                    mysqli_query($conexion,$detalle_sql);
                                                    #########DESCONTAR INVENTARIO################################################################
                                                    $pwa=mysqli_query($conexion,"SELECT stock FROM inventario WHERE id_articulos='$codigo'");             
                                                    if($roww=mysqli_fetch_array($pwa)){
                                                        $stock=$roww['stock'];   
                                                        $new_cant=$roww['stock']+$cantidad;
                                                        mysqli_query($conexion,"UPDATE inventario SET stock='$new_cant' WHERE id_articulos='$codigo'");
                                                    }
                                                    ############### GUARDAMOS EN LA TABLA KARDEX#########################
                                                    $detalle_sql="INSERT INTO kardex (factura, tipo, id_articulos, cantidad, costok, importe, stockk, fecha)
                                                                          VALUES ('$factura','COMPRA','$codigo','$cantidad','$new','$importe_dos','$new_cant','$fecha')";
                                                    mysqli_query($conexion,$detalle_sql);                                                                                                                                                                                                               
                                            ?>
                                            <tr>
                                                
                                                <!--<td><?php echo $codigo; ?></td>-->
                                                <td align="center"><?php echo $cantidad; ?></td>                                                
                                                <td><?php echo $p_nombre;  ?></td>
                                                <td><div align="right">$<?php echo formato($new); ?></div></td>
                                                <td><div align="right">$<?php echo formato($importe_dos); ?></div></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                              <td colspan="3"><div align="right"><strong>Total</strong></div></td>
                                              <td><div align="right"><strong>$ <?php echo formato($neto_full); ?></strong></div></td>
                                            </tr>
                                        </table>
                                        <div class="col-md-12">
                                        <!-- Advanced Tables -->
                                         <br>
                                        <center>
                                            <?php //echo $nombre_empresa; ?><br>
                                            <?php //echo $tel_empresa; ?><br>
                                            <?php //echo $pais_empresa; ?><br>
                                            <?php //echo $dir_empresa; ?><br>
                                        </center>
                 </div>                                                                                                                                
                        </div>
                    </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>            
            </div>
                <?php 
        ######## GUARDAMOS LA INFORMACION DE LA FACTURA EN LA TABLA COMPRA
        $fecha=date('Y-m-d');                   
        $hora=date('H:i:s');
        $mensaje='Compra al "'.$pago.'"';

         
        mysqli_query($conexion,"INSERT INTO resumen_compra (id_proveedor,concepto,factura,clase,valor,tipo,fecha,hora,status) 
            VALUES ('$id_proveedor','$mensaje','$factura','COMPRA','$neto_full','COMPRA','$fecha','$hora','$pago')");

        if ($pago == 'CREDITO')
        {           
            mysqli_query($conexion,"INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora) 
                                       VALUES ('$id_proveedor','$factura','CXP','$neto_full','$fecha','$hora')");          
        }
            else
            {
               mysqli_query($conexion,"INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora) 
                                          VALUES ('$mensaje','$factura','SALIDA','$neto_full','$fecha','$hora')");
            } 
               
                                        
//        mysqli_query($conexion,"DELETE FROM compra_tmp ");
//        mysqli_query($conexion,"DELETE FROM prov_tmp");
    ?>
    
               
           
             <!-- /. PAGE INNER  -->
                                       
        </div>
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->

   
<?php

include_once '../Plantilla/inferior.php';
?>