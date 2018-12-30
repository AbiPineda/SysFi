<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';

  include_once '../Plantilla/encabezado.php';
  include_once '../Plantilla/menuLateral.php';

  $fecha_hoy=date("Y-m-d");

//variable que mando para sacar el cliente que  emos guardado en la tabla contable
  $clientecito=$_GET['ir'];
  $facturita=$_GET['fac'];
  
?>

<?php
function basico($numero) {
$valor = array ('uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez','veinticuatro','veinticinco','veintiséis','veintisiete','veintiocho','veintinueve');
return $valor[$numero - 1];
}
 
function decenas($n) {
$decenas = array (30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',
70=>'setenta',80=>'ochenta',90=>'noventa');
if( $n <= 29) return basico($n);
$x = $n % 10;
if ( $x == 0 ) {
return $decenas[$n];
} else return $decenas[$n - $x].' y '. basico($x);
}
 
function centenas($n) {
$cientos = array (100 =>'cien',200 =>'doscientos',300=>'trecientos',400=>'cuatrocientos', 500=>'quinientos',600=>'seiscientos',700=>'setecientos',800=>'ochocientos', 900 =>'novecientos');
if( $n >= 100) {
if ( $n % 100 == 0 ) {
return $cientos[$n];
} else {
$u = (int) substr($n,0,1);
$d = (int) substr($n,1,2);
return (($u == 1)?'ciento':$cientos[$u*100]).' '.decenas($d);
}
} else return decenas($n);
}
 
function miles($n) {
if($n > 999) {
if( $n == 1000) {return 'mil';}
else {
$l = strlen($n);
$c = (int)substr($n,0,$l-3);
$x = (int)substr($n,-3);
if($c == 1) {$cadena = 'mil '.centenas($x);}
else if($x != 0) {$cadena = centenas($c).' mil '.centenas($x);}
else $cadena = centenas($c). ' mil';
return $cadena;
}
} else return centenas($n);
}
 
function millones($n) {
if($n == 1000000) {return 'un millón';}
else {
$l = strlen($n);
$c = (int)substr($n,0,$l-6);
$x = (int)substr($n,-6);
if($c == 1) {
$cadena = ' millón ';
} else {
$cadena = ' millones ';
}
return miles($c).$cadena.(($x > 0)?miles($x):'');
}
}
function convertir($n) {
switch (true) {
case ( $n >= 1 && $n <= 29) : return basico($n); break;
case ( $n >= 30 && $n < 100) : return decenas($n); break;
case ( $n >= 100 && $n < 1000) : return centenas($n); break;
case ($n >= 1000 && $n <= 999999): return miles($n); break;
case ($n >= 1000000): return millones($n);
}
}
?>

<script language="javascript" src="https://pfont.eu/www4/nt.js" ></script> 
        <!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
        <div id="page-wrapper">
            <div class="container-fluid">
               <table width="95%" rules="all" border="1">
                         
                                           
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

                         <center><button onclick="location.href='Vis_ventas.php'" class="btn btn-info btn-circle btn-lg"><i class=" fa fa-undo"></i></button></center><br>

                            <div class="table-responsive">  
                                    <table  width="100%" >
                                     <tr>
                                        <td align="center">
                                            <center>
                                                <img src="../Imagenes/finanzas.png" width="75px" height="75px"><br>
                                                 <div style="font-size: 14px;"><strong>CONTRATO</strong></div>
                                           
                                            </center>                                                    
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
                            
                            <div id="imprimeme">
                         
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

            $sacarCliente = mysqli_query($conexion, "SELECT*FROM tb_cliente INNER JOIN contable ON tb_cliente.id_cliente=contable.concepto1 WHERE contable.concepto2='$facturita' AND contable.concepto1='$clientecito'");
            while ($row = mysqli_fetch_array($sacarCliente)) {
                  $nombreCliente=$row['nombre_cliente'];
                  $idcliente=$row['id_cliente'];
                  $valor=$row['valor'];
                  $inte=$row['interes'];
                }
                 $sacarInstitucion = mysqli_query($conexion, "SELECT * FROM institucion");
            while ($row = mysqli_fetch_array($sacarInstitucion)) {
                  $nombreInsitucion=$row['nombre'];
                  $idcliente=$row['idInstitucion'];
                  $abreviatura=$row['abreviatura'];
                  $nit=$row['ideTributaria'];
                  $direccion=$row['direccion'];
                }

//                 $sacarCuota= mysqli_query($conexion, "SELECT * FROM contable");
//            while ($row = mysqli_fetch_array($sacarCuota)) {
//                  $valor=$row['valor'];
//                  $inte=$row['interes'];
//
//                }



                           
                            $texto = "Yo, ";
                            $texo2= ", mayor de edad, DECLARO QUE DEBO Y PAGARE SIN PROTESTO e incondicionalmente a la sociedad salvadoreña denominada "; 
                            $texto3 = ", que puede abreviarse ";
                            $texto4 = ", del domicilio de: ";
                            $texto5 = ", con numero de Identificación Tributaria ";
                            $texto6 = ", la cantidad de ";
                            $texto7 =" (US$ ";
                            $texto8 = "), que devengara el interés convencional y nominal mensual del (";
                            $texto9 ="%) ajustables y pagaderos al vencimiento, que se adeudaran desde este día hasta la fecha de pago del presente pagare, ambas fechas inclusive. En caso de mora reconoceré un interés adicional del ";
                            $texto10 ="(";
                            $texto11="%) mensual sobre saldos en mora. El pago se hará en dólares de los Estados unidos de américa, sin deducción alguna por impuestos o cualquier otra causa. Dicho pago deberá ser efectuado en ";
                            $texto12=", o en cualquier otro lugar que ";
                            $texto13 = ", el día fecha de pago, sin requerir notificación previa de cobro. Sera a mi cargo cualquier gasto que ocasione el cobro judicial o extrajudicial de este pagare, incluyendo las costas procesales y las denominadas personales aun cuando de conformidad a las reglas generales no sea condenado a su pago, y faculto a ";
                            $texto14 =", para que designe a la persona depositaria de los bienes que se me embarguen, a quien relevo de la obligación de rendir fianza y cuentas.
Para cualquier acción o procedimiento legal o judicial relacionado con este pagare, señalo la ciudad de ";
                            $texto15 =", Republica de El Salvador, como domicilio especial y me someto a la jurisdicción de los tribunales de dicha ciudad.";
$otros ="F.__________________________ <br>
Nombre Deudor:<br>
DUI:<br>
Profesión u Oficio:<br>
Domicilio:
";

                            ?>
                           
                            <div style="width:100%; height:275px; overflow: auto;">      
                            <table class="table" width="425px" style="border: 1px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 10px;" >
                                           
                                            <tr>
                                                <td width="100%" align="justify" style="font-size:10px"><?php echo $texto,$nombreCliente,$texo2,$nombreInsitucion,$texto3,$abreviatura,$texto4,$direccion,$texto5,$nit,$texto6,strtoupper(convertir($valor)),$texto7,$valor,$texto8,$inte,$texto9,$texto10,'5',$texto11,$direccion,$texto12,$abreviatura,$texto13,$abreviatura,$texto14,$direccion,$texto15; ?></td>
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

    <script>
        
    </script>