<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';
include_once '../Plantilla/encabezado.php';
include_once '../Plantilla/menuLateral.php';
//$fecha=date('Y-m-d');
if (!empty($_GET['id'])) {
    //soy el id el que te esta salvando la vida en esta pantalla
    $id = $_GET['id'];

    $fechaCon = date('Y-m-d');
//        $x_mora=mysqli_query($conexion,"SELECT proximo_pago FROM abono WHERE cuenta='$id' ORDER BY proximo_pago DESC LIMIT 1");
//            while ($ver=mysqli_fetch_array($x_mora)) {
//                # code...
//                $b= explode("-",$ver['proximo_pago']);
//                $xy=$b[1];
//            }
    //*****************
    //-*****************

    $sql = mysqli_query($conexion, "SELECT * FROM contable WHERE id_contable='$id' and tipo='CXC'");
    if ($row = mysqli_fetch_array($sql)) {
        $concepto1 = $row['concepto1'];
        $fecha = $row['fecha'];
        $intento = explode("-", $row['fecha']);
        $a = $intento[2];
        $concepto2 = $row['concepto2'];
        $hora = $row['hora'];
        $deuda = $row['valor'];
        $inte = $row['interes'];
        $cuota = $row['cuota'];
        $interesT = $row['to_interes'];
        $plazo=$row['meses'];
        $conCliente = (int) $row['concepto1'];
        $cliente = mysqli_query($conexion, "SELECT*FROM tb_cliente WHERE id_cliente='$conCliente'");

        while ($roww = mysqli_fetch_array($cliente)) {
            $c_nombre = $roww['nombre_cliente'];
        }
    } else {
        return header('Location: index.php');
    }
    //*********************
    //**************mora**************
//        if(!empty($_POST['valor'])){
//        $valor=$_POST['valor'];
//        }
//        $diax=date("m");
//        $retraso=date("d");
//        $validar_otra=mysql_query("SELECT * FROM abono WHERE cuenta='$id'");
//        if (mysql_num_rows($validar_otra)>0) {
//            if ($diax==$xy) {
//                # code...
//                $son=$retraso-$a;
//                if ($son>0) {
//                    $x=$son;
//                    //**********ayuda mora*****
//                     //calculo de interes por mes y abono a capital
//                    $ver= mysql_query("SELECT valor, interes, cuota FROM contable WHERE id='$id'");
//                    while ($filita=mysql_fetch_array($ver)) {
//                        # code...
//                        $intCalculo=$filita['interes'];
//                        $monto=$filita['valor'];
//                        $cuota=$filita['cuota'];
//                    }
//                    //calculo de intereses por mes y abono a capital
//                    $validar=mysql_query("SELECT * FROM abono WHERE cuenta='$id'");
//                    if (mysql_num_rows($validar)>0) {
//                        # code...
//
//        $verdaderaMora=round(((($intCalculo/100)/12)*((($cuota-(($monto-abonos_saldo($id))*(($intCalculo/100)/12)))/360)*$x)),4);
//                    }else{
//                        
//                        $verdaderaMora="Primer mes";
//                    }
//                     //*************
//                }else{
//                     $x="No estas en mora";
//                }
//            }else{
//                $verdaderaMora="Esperando pago";
//            }
//        }else{
//            $verdaderaMora="Primer pago de mes";
//        }
    //******************fin mora*********
    //****************
}
?>

<?php
//para la graficas
$sql = mysqli_query($conexion, "SELECT SUM(valor) as valores,estado FROM abono WHERE cuenta='$id'");
while ($res2 = mysqli_fetch_array($sql)) {
    $abonos = $res2['valores'];
    $estadoA=$res2['estado'];
}

$sql = mysqli_query($conexion,"SELECT SUM(total_interes) as to_interes,estado FROM abono WHERE cuenta='$id'");
if ($row = mysqli_fetch_array($sql)) {
    $total_inter=$row['to_interes'];
} else {
    $total_inter=0;
}




   //MORA PARA ABI
   //QUE COMIENCE EL JUEGO PRIMERA VALIDACION
// VALIDAR QUE NO AYAN ABONOS 
 $val_abonos=mysqli_query($conexion, "SELECT*FROM abono WHERE cuenta='$id'");
 if (mysqli_num_rows($val_abonos)>0) {
     
      $mora_ultima=mysqli_query($conexion, "SELECT*FROM abono WHERE cuenta='$id' ORDER BY id_abono DESC LIMIT 1");
     while ($m= mysqli_fetch_array($mora_ultima)){
         $fechaProximoPago=$m['proximo_pago'];
         $Pago=$m['fecha'];
     }
  $fecha = date('Y-m-d');
    $x = explode("-", $fecha);
    $añox = $x[0];
    $mesx = $x[1];
    $diax = $x[2];
    
     $y = explode("-", $fechaProximoPago);
    $añoy = $y[0];
    $mesy = $y[1];
    $diay = $y[2];

    $fecha1 = mktime(0, 0, 0, "$mesy", "$diay", "$añoy");
    $fecha2 = mktime(0, 0, 0, "$mesx", "$diax", "$añox");

    $diferencia = $fecha2 - $fecha1;
    $diasSinMora = $diferencia / (60 * 60 * 24);
    if ($diasSinMora<0) {
        $PagoMora='SIN MORA';
    } else {
        $uno=$cuota*0.05;
        $valor= round($uno*$diasSinMora,2);
        if ($valor==0) {
            $PagoMora=0;
        }else{
           $PagoMora=$valor;
        }
        
        
    }
}else{
    
    $mora_ultima=mysqli_query($conexion, "SELECT*FROM contable WHERE id_contable='$id'");
     while ($m= mysqli_fetch_array($mora_ultima)){
         $fechaCompro=$m['fecha'];
     }
     
 $nuevafecha = strtotime('+1 month', strtotime($fechaCompro));
 $nuevafecha = date('Y-m-d', $nuevafecha);
 
  $fecha = date('Y-m-d');
    $x = explode("-", $fecha);
    $añox = $x[0];
    $mesx = $x[1];
    $diax = $x[2];
    
     $y = explode("-", $nuevafecha);
    $añoy = $y[0];
    $mesy = $y[1];
    $diay = $y[2];

    $fecha1 = mktime(0, 0, 0, "$mesy", "$diay", "$añoy");
    $fecha2 = mktime(0, 0, 0, "$mesx", "$diax", "$añox");

    $diferencia = $fecha2 - $fecha1;
    $diasSinMora = $diferencia / (60 * 60 * 24);
    if ($diasSinMora<0) {
        $PagoMora='SIN MORA';
    } else {
        $uno=$cuota*0.05;
        $valor= round($uno*$diasSinMora,2);
        if ($valor==0) {
            $PagoMora=0;
        }else{
           $PagoMora=$valor;
        }
 
    
    
}
}

   
?>

<!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
<?php
//graficas
$sql = mysqli_query($conexion, "SELECT valor FROM contable WHERE id_contable='$id'");

?>

<script type="text/javascript" src="../Highcharts-4.1.5/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Highcharts-4.1.5/js/highcharts.js"></script>
<script type="text/javascript" src="../Highcharts-4.1.5/js/exporting.js"></script>
<script type="text/javascript" src="../Highcharts-4.1.5/js/themes/grid.js"></script>
<script type="text/javascript">
    var chart;
    $(document).ready(function() {

    chart = new Highcharts.Chart({
    chart: {
    renderTo: 'container',
            defaultSeriesType: 'pie',
    },
            title: {
            text: 'Estadistica de Abonos'
            }, subtitle: {
    text: 'Saldo Faltante :<?php if ($estadoA=='Finalizado'){ echo '0';}else{echo $deuda - $abonos;} ?>'
    },
            tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
            pie: {
            allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                    enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                    }
            }
            },
            // Le pasamos los datos en JSON
            series:[{

            name: 'Abono',
                    data:[<?php
while ($res = mysqli_fetch_array($sql)) {
    ?>

                        ['<?php echo 'Total Deuda: ' . $res['valor']; ?>', <?php echo $res['valor'] ?>],
    <?php
}
?>
<?php
$sql = mysqli_query($conexion, "SELECT SUM(valor) as valores FROM abono WHERE cuenta='$id'");
while ($res = mysqli_fetch_array($sql)) {
    ?>

                        ['<?php if ($estadoA=='Finalizado'){echo 'Total Abonos: ' .$deuda ?>', <?php echo $deuda;}
                        else{echo 'Total Abonos: ' . round($res['valores'],2); ?>', <?php echo round($res['valores'],2);} ?>],
    <?php
}
?>]
            }]
    });
    });</script>

<script type="text/javascript">
    var chart;
    $(document).ready(function() {

    chart = new Highcharts.Chart({
    chart: {
    renderTo: 'container1',
            defaultSeriesType: 'pie',
    },
            title: {
            text: 'Estadistica de Interes'
            }, subtitle: {
    text: 'Interes Faltante :<?php if ($estadoA=='Finalizado'){ echo '0';}else{echo $interesT-$total_inter;} ?>'
    },
            tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
            pie: {
            allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                    enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                    }
            }
            },
            // Le pasamos los datos en JSON
            series:[{

            name: 'Abono',
                    data:[<?php
$sql = mysqli_query($conexion, "SELECT to_interes FROM contable WHERE id_contable='$id'");
while ($res = mysqli_fetch_array($sql)) {
    ?>

                        ['<?php echo 'Total Interes: ' . $res['to_interes']; ?>', <?php echo $res['to_interes'] ?>],
    <?php
}
?>
<?php
$sql = mysqli_query($conexion, "SELECT SUM(total_interes) as to_interes FROM abono WHERE cuenta='$id'");
while ($res = mysqli_fetch_array($sql)) {
    ?>

                        ['<?php if ($estadoA=='Finalizado'){echo 'Abono Interes: ' .$interesT; ?>', <?php echo $interesT;}
                        else{echo 'Abono Interes: ' . round($res['to_interes'],2); ?>', <?php echo round($res['to_interes'],2);} ?>],
    <?php
}
?>]
            }]
    });
    });


</script>

<div id="page-wrapper">
    <div class="container-fluid">
<?php
   if (!empty($_POST['valor'])) {
    $valor = $_POST['valor'];
    $proxi = $_POST['proximo'];
    $mora = $_POST['mora'];
    if (!empty($_POST['nota'])) {
        $nota = $_POST['nota'];
    } else {
        $nota = 'Sin Observaciones';
    }
    //calculo de interes por mes y abono a capital
    $ver = mysqli_query($conexion,"SELECT valor, interes,concepto2 FROM contable WHERE id_contable='$id'");
    while ($filita = mysqli_fetch_array($ver)) {
        # code...
        $intCalculo = $filita['interes'];
        $monto = $filita['valor'];
        $conce2=$filita['concepto2'];
    }
    //calculo de intereses por mes y abono a capital
    $validar = mysqli_query($conexion,"SELECT * FROM abono WHERE cuenta='$id'");
    if (mysqli_num_rows($validar) > 0) {
        # code...
        $calculoValor = round(($valor - (($monto - $abonos) * (($intCalculo / 100) / 12))),3);
        $aboInteres = round((($monto - $abonos) * (($intCalculo / 100) / 12)),3);
    } else {
        $calculoValor = round($valor - (($monto) * (($intCalculo / 100) / 12)),3);
        $aboInteres = round((($monto) * (($intCalculo / 100) / 12)),3);
    }
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    ///*******************Validar la cantidad de cuotas que ha pagados igual que los meses
     $cuentaMeses = mysqli_query($conexion,"SELECT COUNT(id_abono) as mesPagado, estado FROM abono WHERE cuenta='$id'");
     while ($c= mysqli_fetch_array($cuentaMeses)){
        $Cmes=$c['mesPagado']; 
     }
     $ultimoMes=$plazo-$Cmes;
     if ($ultimoMes==1) {
          mysqli_query($conexion,"INSERT INTO abono (cuenta,valor,fecha,hora,nota,total_interes,proximo_pago,mora,estado)"
            . " VALUES ('$id','$calculoValor','$fecha','$hora','$nota','$aboInteres','$proxi','$mora','EnProceso')");

    mysqli_query($conexion,"INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora,clase,observacion) 
                        VALUES ('Abono CXC No. $id','$conce2','ENTRADA','$calculoValor','$fecha','$hora','CXC','Sin Observaciones')");
    echo mensajes("El Abono a la Cuenta por Cobrar No. " . $id . " por valor de " ." $" . formato($valor) . " ha sido registrado con exito", "verde");
    
         
       mysqli_query($conexion,"UPDATE abono SET estado='Finalizado' WHERE cuenta='$id'");
       
     } else {
    mysqli_query($conexion,"INSERT INTO abono (cuenta,valor,fecha,hora,nota,total_interes,proximo_pago,mora,estado)"
            . " VALUES ('$id','$calculoValor','$fecha','$hora','$nota','$aboInteres','$proxi','$mora','EnProceso')");

    mysqli_query($conexion,"INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora,clase,observacion) 
                        VALUES ('Abono CXC No. $id','$conce2','ENTRADA','$calculoValor','$fecha','$hora','CXC','Sin Observaciones')");
    echo mensajes("El Abono a la Cuenta por Cobrar No. " . $id . " por valor de " ." $" . formato($valor) . " ha sido registrado con exito", "verde");
     }    
    echo "<script>
          location.href ='cxc.php?id=$id';
        </script>";
   } 
   
   //para incobrabilidad si ya hizo algun abono
   if (!empty($_POST['si'])) {
    mysqli_query($conexion,"UPDATE abono SET estado='incobrable' WHERE cuenta='$id'");
    mysqli_query($conexion,"UPDATE contable SET estadoC='incobrable' WHERE id_contable='$id'");
     echo "<script>
          location.href ='cxc.php?id=$id';
        </script>";
   }
   //para incobrabilidad si no ha hecho algun abono
   if (!empty($_POST['si2'])) {
    mysqli_query($conexion,"UPDATE contable SET estadoC='incobrable' WHERE id_contable='$id'");
     echo "<script>
          location.href ='cxc.php?id=$id';
        </script>";
   }
   //recuperar cuenta si no hay abonos
   if (!empty($_POST['recu2'])) {
    mysqli_query($conexion,"UPDATE contable SET estadoC='EnProceso' WHERE id_contable='$id'");
     echo "<script>
          location.href ='cxc.php?id=$id';
        </script>";
   }
   //si ya hizo abonos
   if (!empty($_POST['recu'])) {
   mysqli_query($conexion,"UPDATE abono SET estado='EnProceso' WHERE cuenta='$id'");
   mysqli_query($conexion,"UPDATE contable SET estadoC='EnProceso' WHERE id_contable='$id'");
     echo "<script>
          location.href ='cxc.php?id=$id';
        </script>";
   }
?>
<head>
    <style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid rgb(25, 158, 218);
  border-radius: 10px;


}
</style>
</head>
 <div class="row">
     <div class="col-md-12 text-info" style="font-size:16px">
    <br>
<strong class="col-md-3">Cuenta por Cobrar:</strong>
<div class="col-md-2">
<input class="form-control" id="" type="text" value="<?php echo $id;?>" disabled> 
</div>
<strong class="col-md-2">Cuota mensual: </strong>
<div class="col-md-2">
<input class="form-control" id="" type="text" value="<?php echo '$' . $cuota;?>" disabled>
</div>
</div>
<div class="col-md-12 text-info" style="font-size:16px">
<strong class="col-md-1">Cliente: </strong>
<div class="col-md-5">
<input class="form-control" id="" type="text" value="<?php echo $c_nombre;?>" disabled>
</div>
<strong class="col-md-1">Fecha: </strong>
<div class="col-md-3">
<input class="form-control" id="" type="text" value="<?php echo $fecha . ' ' . $hora;?>" disabled>
</div>
</div>
</div>
        
        
        <div class="row">
            <div class="col-md-6 text-info" align="center" style="font-size:16px">
                <div id="container" style="min-width:200px; height: 250px; max-width: 800px; margin: 0 auto"></div>
            </div>
            <div class="col-md-6 text-info" align="center" style="font-size:16px">
                <div id="container1" style="min-width:200px; height: 250px; max-width: 800px; margin: 0 auto"></div>
            </div>


        </div>

        <!--fin de interese-->
        <div class="col-md-3">                                                                                          
            <label>Mora</label>
            <?php if ($estadoA=='Finalizado') {?>
             <input type="text" name="moraVer" value="Finalizado" autocomplete="off" class="form-control">
            <?php }else{?>
            <input type="text" name="moraVer" value="<?php echo $PagoMora; ?>" autocomplete="off" class="form-control">
            <?php }?>
        </div>  
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel-body" align="center">                                                                                 
                <a href="../carteraCliente/lista_clientes.php">
                    <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left fa-2x" title="Regresar"></i>
                    </button></a>
               
<?php
if ($estadoA!=null) {
    
if ($deuda-$abonos <> 0 && $estadoA=='EnProceso') {
    echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#abono"><i class="fa fa-plus fa-2x" title="Agregar Nuevo Abono"></i>
                                      </button>';
    //*****incobrable*******
    echo ' <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#inco"><i class="fa fa-arrow-down fa-2x" title="Agregar Nuevo Abono"></i>
                                      Incobrable</button>';
} elseif($estadoA=='incobrable') {
     echo ' <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#recu"><i class="fa fa-arrow-up fa-2x" title="Agregar Nuevo Abono"></i>
                                      Recuperar</button>';  
    }

}else{
      //aqui es cuando no ha hecho ningun abono
    $inco = mysqli_query($conexion,"SELECT * FROM contable WHERE id_contable='$id'");
    while ($filita = mysqli_fetch_array($inco)) {
        $inEstado=$filita['estadoC'];
    }
    
    if ($inEstado=='EnProceso') {
      echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#abono"><i class="fa fa-plus fa-2x" title="Agregar Nuevo Abono"></i>
                                      </button>';
     //*****incobrable*******
    echo ' <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#inco2"><i class="fa fa-arrow-down fa-2x" title="Agregar Nuevo Abono"></i>
                                      Incobrable</button>';  
    }else{
        //*****recuperar*******
    echo ' <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#recu2"><i class="fa fa-arrow-up fa-2x" title="Agregar Nuevo Abono"></i>
                                      Recuperar</button>';  
    }
     
    
}
?>        
             
            </div>
        </div>
        <div class="col-md-4"></div>    
        <!--  Modals-->
        <div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--<div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
        <form name="forms" method="post" action="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 align="center" class="modal-title" id="myModalLabel">Registrar<br><?php echo 'Cuenta por Cobrar No. ' . $id; ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">                                       
                                <div class="col-md-6">                                          
                                    <label>Valor del Abono:</label>                                             
                                    <input type="text" name="valor" value="<?php echo $cuota;?>" min="1" max="<?php //echo $deuda - abonos_saldo($id); ?>" autocomplete="off" required class="form-control"><br><br>
                                </div>
                                <div class="col-md-6">                                          
                                    <label>Proximo pago:</label>                                             
                                    <input type="date" name="proximo" value="1" min="1" max="<?php //echo $deuda - abonos_saldo($id); ?>" autocomplete="off" required class="form-control"><br><br>
                                </div>
                                <div class="col-md-6">                                                                                          
                                    <label>Observaciones</label>
                                    <input type="text" name="nota" autocomplete="off" class="form-control">
                                </div>  
                                <div class="col-md-6">                                                                                          
                                    <label>Mora</label>
                                    <input type="text" name="mora" value="<?php echo $PagoMora;?>" autocomplete="off" class="form-control">
                                </div> 
                                 <div class="col-md-6">                                                                                          
                                     <label>Total a Pagar: <?php echo $cuota+$PagoMora;?></label>
                                </div> 
                            </div> 
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>                                       
                    </div>
                </div>
            </form>
        </div>
        <!--incobrabilidad-->
        
           <div class="modal fade" id="inco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--<div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
        <form name="forms" method="post" action="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 align="center" class="modal-title" id="myModalLabel">¿Desea pasar la<br><?php echo 'Cuenta por Cobrar No. ' . $id; ?> a incobrablidad?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">                                       
                                <div class="col-md-6">  
                                    <center>
                                                <img src="../Imagenes/finanzas.png" width="75px" height="75px"><br>
                                          <input type="hidden" value="si" name="si">  
                                            </center>  
                                    </div>
                                
                            </div> 
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-warning">Si</button>
                        </div>                                       
                    </div>
                </div>
            </form>
        </div>
        
        <!--sino ha realizado ningun abono-->
        <div class="modal fade" id="inco2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--<div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
        <form name="forms" method="post" action="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 align="center" class="modal-title" id="myModalLabel">¿Desea pasar la<br><?php echo 'Cuenta por Cobrar No. ' . $id; ?> a incobrablidad?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">                                       
                                <div class="col-md-6">  
                                    <center>
                                                <img src="../Imagenes/finanzas.png" width="75px" height="75px"><br>
                                          <input type="hidden" value="si" name="si2">  
                                            </center>  
                                    </div>
                                
                            </div> 
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-warning">Si</button>
                        </div>                                       
                    </div>
                </div>
            </form>
        </div>
       
      
        <!--incobrabilidad-->
        
        <!--RECUPERAR CUENTA INCOBRABLE-->
        <div class="modal fade" id="recu2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--<div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
        <form name="forms" method="post" action="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 align="center" class="modal-title" id="myModalLabel">¿Desea recuperar la<br><?php echo 'Cuenta por Cobrar No. ' . $id; ?>?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">                                       
                                <div class="col-md-6">  
                                    <center>
                                                <img src="../Imagenes/finanzas.png" width="75px" height="75px"><br>
                                          <input type="hidden" value="si" name="recu2">  
                                            </center>  
                                    </div>
                                
                            </div> 
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-warning">Si</button>
                        </div>                                       
                    </div>
                </div>
            </form>
        </div>
        
         <div class="modal fade" id="recu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--<div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
        <form name="forms" method="post" action="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 align="center" class="modal-title" id="myModalLabel">¿Desea recuperar la<br><?php echo 'Cuenta por Cobrar No. ' . $id; ?>?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">                                       
                                <div class="col-md-6">  
                                    <center>
                                                <img src="../Imagenes/finanzas.png" width="75px" height="75px"><br>
                                          <input type="hidden" value="si" name="recu">  
                                            </center>  
                                    </div>
                                
                            </div> 
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-warning">Si</button>
                        </div>                                       
                    </div>
                </div>
            </form>
        </div>
        <!--RECUPERAR CUENTA INCOBRABLE--> 
        
     

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        ABONOS REALIZADOS
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">                                   
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Observacion</th>
                                                                                                                                                                      
                                        <th><div align="right"><strong>Valor</strong></div></th>                                                                                        
                                                                                                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php
$sql = mysqli_query($conexion,"SELECT * FROM abono WHERE cuenta='$id'");
while ($row = mysqli_fetch_array($sql)) {
    ?>
                                        <tr>
                                            <td><center><?php echo $row['fecha'] . ' - ' . $row['hora']; ?></center></td>
                                    <td><?php echo $row['nota']; ?></td>
                                   
                                    <td><div align="right"><?php echo '$' . formato($row['valor']) ?></div></td>
                                
                                    </tr>
<?php } ?>                                                              
                                </tbody>                                    
                            </table>                                                                
                        </div>                            
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  --> 
        <!-- /. ROW  -->
    </div>
</div>
<!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->


<?php
include_once '../Plantilla/inferior.php';
?>

