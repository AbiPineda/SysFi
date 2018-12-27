<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';

  include_once '../Plantilla/encabezado.php';
  include_once '../Plantilla/menuLateral.php';

 

   setlocale(LC_ALL, 'es_ES').': ';
   $fecha_hoy= iconv('ISO-8859-1', 'UTF-8', strftime('%A %d de %B de %Y', time()));
    
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
                             CONTRATO
                        </div>
                        <div class="panel-body">
                        <center><button onclick="imprimir();" class="btn btn-default"><i class=" fa fa-print "></i> Imprimir</button></center><br>
                         
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
                                            <div style="font-size: 12px;" align="right"><?php //echo fecha($fecha); ?></div><br>                                             
                                            </td>
                                        </tr>
                                         <tr>
                                            <td align="center">                                             
                                            </td>
                                            <td class="text-default">
                                                <div class="<?php echo $activar; ?>">     
                                                <strong> &nbsp;&nbsp;Nombre: <?php echo $c_nombre; ?></strong><br>
                                                <strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección: <?php echo $direccion; ?></strong><br>                      
                                                </div>                                                                                                                                     
                                            </td>
                                         </tr>
                                                                      
                            </table>
                            <?php

            $sacarCliente = mysqli_query($conexion, "SELECT * FROM tb_cliente");
            while ($row = mysqli_fetch_array($sacarCliente)) {
                  $nombreCliente=$row['nombre_cliente'];
                  $idcliente=$row['id_cliente'];
                }
                 $sacarInstitucion = mysqli_query($conexion, "SELECT * FROM institucion");
            while ($row = mysqli_fetch_array($sacarInstitucion)) {
                  $nombreInsitucion=$row['nombre'];
                  $idcliente=$row['idInstitucion'];
                  $abreviatura=$row['abreviatura'];
                  $nit=$row['ideTributaria'];
                  $direccion=$row['direccion'];
                }


                           
                            $texto = "Yo, ";
                            $texo2= ", mayor de edad, DECLARO QUE DEBO Y PAGARE SIN PROTESTO e incondicionalmente a la sociedad salvadoreña denominada "; 
                            $texto3 = ", que puede abreviarse ";
                            $texto4 = ", del domicilio de: ";
                            $texto5 = ", con numero de Identificación Tributaria ";
                            $texto6 = ", la cantidad de CUATROCIENTOS OCHENTA Y TRES CON 68/100 DOLARES DE LOS ESTADOS UNIDOS DE AMERICA (US$483.68), que devengara el interés convencional y nominal mensual del CUATRO CON 75/100 por ciento (4.75%) ajustables y pagaderos al vencimiento, que se adeudaran desde este día hasta la fecha de pago del presente pagare, ambas fechas inclusive. En caso de mora reconoceré un interés adicional del dieciséis 95/100 por ciento (16.95%) mensual sobre saldos en mora.
                                El pago se hará en dólares de los Estados unidos de américa, sin deducción alguna por impuestos o cualquier otra causa. Dicho pago deberá ser efectuado en San Salvador, o en cualquier otro lugar que GMG COMERCIAL EL SALVADOR, S.A DE C.V determine, el día fecha de pago, sin requerir notificación previa de cobro. Sera a mi cargo cualquier gasto que ocasione el cobro judicial o extrajudicial de este pagare, incluyendo las costas procesales y las denominadas personales aun cuando de conformidad a las reglas generales no sea condenado a su pago, y faculto a GMG COMERCIAL EL SALVADOR, S.A DE C.V, para que designe a la persona depositaria de los bienes que se me embarguen, a quien relevo de la obligación de rendir fianza y cuentas.
Para cualquier acción o procedimiento legal o judicial relacionado con este pagare, señalo la ciudad de San Salvador, Republica de El Salvador, como domicilio especial y me someto a la jurisdicción de los tribunales de dicha ciudad.";

$fechaActual = "Dado en San Salvador, a los 13 días del mes de diciembre de 2018";
$otros ="F.__________________________
Nombre Deudor:
DUI:
Profesión u Oficio:
Domicilio:
";

                            ?>
                            <br>
                            <div style="width:100%; height:275px; overflow: auto;">      
                            <table class="table" width="425px" style="border: 1px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 10px;" >
                                           
                                            <tr>
                                                <td width="100%" align="justify" style="font-size:10px"><?php echo $texto,$nombreCliente,$texo2,$nombreInsitucion,$texto3,$abreviatura,$texto4,$direccion,$texto5,$nit,$texto6; ?></td>
                                            </tr>
                                           
                                        </table>
                                        </div>
                                        <br>

                                        <table class="table" width="450px" style="border: 0px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 12px;">
                                             <tr>
                                               <?php
                                                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                                                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
                                               ?>

                                                 <td width="100%" align="right" style="font-size:10px">Dado en San Salvador, <?php echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');?></td>                                                
                                               
                                            </tr>            
                                        </table>  
                                         <table class="table" width="450px" style="border: 0px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 12px;">
                                             <tr>
                                               
                                                 <td width="100%" align="left" style="font-size:10px"><?php echo $otros; ?></td>                                                
                                               
                                            </tr>            
                                        </table>      
                                        
                                         <div class="row">
                                                      
            </div>                                                                                                                         
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
               
                                       
        </div>
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->

<?php

include_once '../Plantilla/inferior.php';
?>
 
<script>
        function imprimir(){
          var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
          var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
          ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
          ventana.document.close();  //cerramos el documento
          ventana.print();  //imprimimos la ventana
          ventana.close();  //cerramos la ventana
        }
    </script>