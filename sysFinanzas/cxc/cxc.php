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
$sql = mysqli_query($conexion, "SELECT SUM(valor) as valores FROM abono WHERE cuenta='$id'");
while ($res2 = mysqli_fetch_array($sql)) {
    $abonos = $res2['valores'];
}

$sql = mysqli_query($conexion,"SELECT SUM(total_interes) as to_interes FROM abono WHERE cuenta='$id'");
if ($row = mysqli_fetch_array($sql)) {
    $total_inter=$row['to_interes'];
} else {
    $total_inter=0;
}
?>

<!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->

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
    text: 'Saldo Faltante :<?php echo $deuda - $abonos; ?>'
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
$sql = mysqli_query($conexion, "SELECT valor FROM contable WHERE id_contable='$id'");
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

                        ['<?php echo 'Total Abonos: ' . $res['valores']; ?>', <?php echo $res['valores'] ?>],
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
    text: 'Interes Faltante :<?php echo $interesT-$total_inter; ?>'
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

                        ['<?php echo 'Abono Interes: ' . $res['to_interes']; ?>', <?php echo $res['to_interes'] ?>],
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
    $ver = mysql_query("SELECT valor, interes FROM contable WHERE id='$id'");
    while ($filita = mysql_fetch_array($ver)) {
        # code...
        $intCalculo = $filita['interes'];
        $monto = $filita['valor'];
    }
    //calculo de intereses por mes y abono a capital
    $validar = mysql_query("SELECT * FROM abono WHERE cuenta='$id'");
    if (mysql_num_rows($validar) > 0) {
        # code...
        $calculoValor = ($valor - (($monto - abonos_saldo($id)) * (($intCalculo / 100) / 12)));
        $aboInteres = (($monto - abonos_saldo($id)) * (($intCalculo / 100) / 12));
    } else {
        $calculoValor = $valor - (($monto) * (($intCalculo / 100) / 12));
        $aboInteres = (($monto) * (($intCalculo / 100) / 12));
    }
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');





    mysql_query("INSERT INTO abono (cuenta,valor,fecha,hora,nota,usu,total_interes,proximo_pago,mora) VALUES ('$id','$calculoValor','$fecha','$hora','$nota','$usu','$aboInteres','$proxi','$mora')");

    mysql_query("INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora,usu,consultorio,clase) 
                        VALUES ('Abono CXC No. $id','Sin Observaciones','ENTRADA','$calculoValor','$fecha','$hora','$usu','$id_almacen','CXC')");
    echo mensajes("El Abono a la Cuenta por Cobrar No. " . $id . " por valor de " . $s . " " . formato($valor) . " ha sido registrado con exito", "verde");
}
?>
        <table class="table table-bordered">
            <tr class="info">
            <br/>
            <td><strong>Cuenta por Cobrar: </strong> <span class="badge"><?php echo $id; ?></span><br></td>
            <td><strong>Cuota mensual: </strong> <span class="badge"><?php echo '$' . $cuota; ?></span><br></td>
            <td><strong>Cliente: </strong> <?php echo $c_nombre; ?><br></td>
            <td><strong>Fecha: </strong> <?php echo $fecha . ' ' . $hora; ?></td>
            </tr>
        </table>
        <br><br><br>
        <div class="row">
            <div class="col-md-6 text-info" align="center" style="font-size:16px">
                <div id="container" style="min-width:200px; height: 350px; max-width: 500px; margin: 0 auto"></div>
            </div>
            <div class="col-md-6 text-info" align="center" style="font-size:16px">
                <div id="container1" style="min-width:200px; height: 350px; max-width: 500px; margin: 0 auto"></div>
            </div>


        </div>

        <!-- intereses-->
        <div class="row-fluid">
            <div class="col-md-4 text-danger" align="center" style="font-size:16px">
                <strong>Total de interes</strong><br>
                <strong> <?php echo $s . ' ' . formato($interesT); ?></strong>
            </div>
            <div class="col-md-4 text-info" align="center" style="font-size:16px">
                <strong>Total Abonado</strong><br>
                <strong><?php echo $s . ' ' . formato(abonos_interes($id)); ?></strong>
            </div>
            <div class="col-md-4 text-success" align="center" style="font-size:16px">
                <strong>Saldo Faltante</strong><br>
                <strong><?php echo $s . ' ' . formato($interesT - abonos_interes($id)); ?></strong>
            </div>
        </div><br><br><br>
<?php
$por = abonos_interes($id) * 100 / $interesT;
?>
        <strong><center><?php echo 'Total Abonado: ' . formato($por) . '% || Total Saldo ' . formato(100 - $por) . '%'; ?></center></strong>
        <div class="progress progress-striped active">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $por; ?>%;"></div>
        </div>
        <!--fin de interese-->
        <div class="col-md-3">                                                                                          
            <label>Mora</label>
            <input type="text" name="moraVer" value="<?php echo $verdaderaMora; ?>" autocomplete="off" class="form-control">
        </div>  
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel-body" align="center">                                                                                 
                <a href="index.php">
                    <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-arrow-left fa-2x" title="Regresar"></i>
                    </button></a>
<?php
if ($deuda - abonos_saldo($id) <> 0) {
    echo ' <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#abono"><i class="fa fa-plus fa-2x" title="Agregar Nuevo Abono"></i>
                                      </button>';
}
?>                                                                                                              
            </div>
        </div>
        <div class="col-md-4"></div>    
        <!--  Modals-->
        <div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <input type="text" name="valor" value="1" min="1" max="<?php echo $deuda - abonos_saldo($id); ?>" autocomplete="off" required class="form-control"><br><br>
                                </div>
                                <div class="col-md-6">                                          
                                    <label>Proximo pago:</label>                                             
                                    <input type="date" name="proximo" value="1" min="1" max="<?php echo $deuda - abonos_saldo($id); ?>" autocomplete="off" required class="form-control"><br><br>
                                </div>
                                <div class="col-md-6">                                                                                          
                                    <label>Observaciones</label>
                                    <input type="text" name="nota" autocomplete="off" class="form-control">
                                </div>  
                                <div class="col-md-6">                                                                                          
                                    <label>Mora</label>
                                    <input type="text" name="mora" autocomplete="off" class="form-control">
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
        <!-- End Modals-->


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
                                        <th>FECHA</th>
                                        <th>OBSERVACION</th>
                                        <th>RESPONSABLE</th>                                                                                                                                 
                                        <th><div align="right"><strong>VALOR</strong></div></th>                                                                                        
                                        <th></th>                                                                                       
                                    </tr>
                                </thead>
                                <tbody>
<?php
$sql = mysql_query("SELECT * FROM abono WHERE cuenta='$id'");
while ($row = mysql_fetch_array($sql)) {
    ?>
                                        <tr>
                                            <td><center><?php echo fecha($row['fecha']) . ' - ' . $row['hora']; ?></center></td>
                                    <td><?php echo $row['nota']; ?></td>
                                    <td><?php echo consultar('nom', 'persona', ' doc=' . $row['usu']); ?></td>
                                    <td><div align="right"><?php echo $s . ' ' . formato($row['valor']) ?></div></td>
                                    <td></td>
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