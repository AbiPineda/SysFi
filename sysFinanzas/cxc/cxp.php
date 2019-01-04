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

    $sql = mysqli_query($conexion, "SELECT * FROM contable WHERE id_contable='$id' and tipo='CXP'");
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
        $conProveedor = (int) $row['concepto1'];
        $cliente = mysqli_query($conexion, "SELECT*FROM proveedor WHERE idproveedor='$conProveedor'");

        while ($roww = mysqli_fetch_array($cliente)) {
            $c_nombre = $roww['proveedor'];
        }
    } else {
       echo "<script>
          location.href ='cobros.php';
        </script>";
    
    }
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
<script type="text/javascript" src="../Highcharts-4.1.5/js/themes/dark-green.js"></script>
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



<div id="page-wrapper">
    <div class="container-fluid">
<?php
                if(!empty($_POST['valor'])){
                    $valor=$_POST['valor'];
                    if(!empty($_POST['nota'])){
                        $nota=$_POST['nota'];
                    }else{
                        $nota='Sin Observaciones';
                    }
                    
                    $fecha=date('Y-m-d');
                    $hora=date('H:i:s');

                    
                    mysqli_query($conexion,"INSERT INTO abono (cuenta,valor,fecha,hora,nota) VALUES ('$id','$valor','$fecha','$hora','$nota')");
                    mysqli_query($conexion,"INSERT INTO contable (concepto1,concepto2,tipo,valor,fecha,hora,clase,observacion) 
                    VALUES ('Abono CXP No. $id','$concepto2','SALIDA','$valor','$fecha','$hora','CXP','Sin Observaciones')");
                    
                    echo mensajes("El Abono a la Cuenta por Pagar No. ".$id." por valor de ".$s." ".formato($valor)." ha sido registrado con exito","verde");
                
                 
    echo "<script>
          location.href ='cxp.php?id=$id';
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
<strong class="col-md-3">Cuenta por Pagar:</strong>
<div class="col-md-2">
<input class="form-control" id="" type="text" value="<?php echo $id;?>" disabled> 
</div>

</div>
<div class="col-md-12 text-info" style="font-size:16px">
<strong class="col-md-1">Proveedor: </strong>
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
            <div class="col-md-1 text-info" align="center" style="font-size:16px"></div>
            <div class="col-md-10 text-info" align="center" style="font-size:16px">
                <div id="container" style="min-width:200px; height: 400px; max-width: 700px; margin: 0 auto"></div>
            </div>
            <div class="col-md-1 text-info" align="center" style="font-size:16px"></div>
        </div>

        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel-body" align="center">                                                                                 
                <a href="../cxc/cobros.php">
                    <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-arrow-left fa-2x" title="Regresar"></i>
                    </button></a>
               
<?php
if ($deuda-$abonos <> 0) {
    echo ' <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#abono"><i class="fa fa-plus fa-2x" title="Agregar Nuevo Abono"></i>
                                      </button>';
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

                            <h3 align="center" class="modal-title" id="myModalLabel">Registrar<br><?php echo 'Cuenta por Pagar No. ' . $id; ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">                                       
                                <div class="col-md-6">                                          
                                    <label>Valor del Abono:</label>                                             
                                    <input type="text" name="valor" value="1" min="1" max="<?php //echo $deuda - abonos_saldo($id); ?>" autocomplete="off" required class="form-control"><br><br>
                                </div>
                               
                                <div class="col-md-6">                                                                                          
                                    <label>Observaciones</label>
                                    <input type="text" name="nota" autocomplete="off" class="form-control">
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
                                                                                                                                                                      
                                        <th><div align="right"><strong>VALOR</strong></div></th>                                                                                        
                                                                                                                            
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

