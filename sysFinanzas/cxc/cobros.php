<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';
include_once '../Plantilla/encabezado.php';
include_once '../Plantilla/menuLateral.php';
$fecha = date('Y-m-d');
?>
<?php
$salida = 0;
$entrada = 0;
$cxp = 0;
$cxc = 0;
$sql = mysqli_query($conexion, "SELECT * FROM contable");
while ($row = mysqli_fetch_array($sql)) {
    if ($row['tipo'] == 'ENTRADA') {
        $entrada = $entrada + $row['valor'];
    } elseif ($row['tipo'] == 'SALIDA' or $row['tipo'] == 'CXC') {
        $salida = $salida + $row['valor'];
    } elseif ($row['tipo'] == 'CXP') {
        
    }
}
?>

<?php
$entradasql = mysqli_query($conexion, "SELECT valor,fecha FROM contable WHERE tipo='ENTRADA'");


$ejeXEntradas = mysqli_query($conexion, "SELECT tipo,fecha FROM contable WHERE tipo='ENTRADA'");

$salidasql = mysqli_query($conexion, "SELECT valor,fecha FROM contable WHERE tipo='SALIDA' OR tipo='CXC'");
$ejeYsalidas = mysqli_query($conexion, "SELECT tipo,fecha FROM contable WHERE tipo='SALIDA' OR tipo='CXC'");


//
?>
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
            defaultSeriesType: 'line'
    },
            title: {
            text: 'TOTAL ENTRADAS'
            },
            subtitle: {
            text: '$<?php echo $entrada;?>'
            },
            xAxis: {
            // Le pasamos los datos que irán en el eje de las 'X' en JSON
            categories: [<?php while ($rows = mysqli_fetch_array($ejeXEntradas)) { ?>
                '<?php echo $rows['tipo']; ?>',<?php } ?>]
            },
            yAxis: {
            title: {
            text: 'Total de entradas'
            }
            },
            tooltip: {
            enabled: true,
                    formatter: function() {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.x + ': ' + this.y + ' ' + this.series.name;
                    }
            },
            plotOptions: {
            line: {
            dataLabels: {
            enabled: true
            },
                    enableMouseTracking: true
            }
            },
            // Le pasamos los datos en JSON
            series:[{
            name: 'Entradas',
                    data:[<?php while ($row = mysqli_fetch_array($entradasql)) { ?>
    <?php echo $row['valor']; ?>,<?php } ?>]
            }
        ],
       
    });
    });

//========================================================>
    var chart;
    $(document).ready(function() {
    chart = new Highcharts.Chart({
    chart: {
    renderTo: 'salidas',
            defaultSeriesType: 'line'
    },
            title: {
            text: 'TOTAL SALIDAS'
            },
            subtitle: {
            text: '$<?php echo $salida;?>'
            },
            xAxis: {
            // Le pasamos los datos que irán en el eje de las 'X' en JSON
            categories: [<?php while ($rows = mysqli_fetch_array($ejeYsalidas)) { ?>
                '<?php echo $rows['tipo']; ?>',<?php } ?>]
            },
            yAxis: {
            title: {
            text: 'Total de salidas'
            }
            },
            tooltip: {
            enabled: true,
                    formatter: function() {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.x + ': ' + this.y + ' ' + this.series.name;
                    }
            },
            plotOptions: {
            line: {
            dataLabels: {
            enabled: true
            },
                    enableMouseTracking: true
            }
            },
            // Le pasamos los datos en JSON
            series:[{
            name: 'Salidas',
                    data:[<?php while ($row = mysqli_fetch_array($salidasql)) { ?>
    <?php echo $row['valor']; ?>,<?php } ?>]
            }
        ],
       
    });
    });

</script>

<!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <!--                             VENTAS, COMPRAS, CXC Y CXP-->
                        VENTAS,Cuenta por Cobrar
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>


                                    <div class="row-fluid">
                                        <div class="col-md-12 text-success"  align="center">
                                            <div id="container" style="width: 100%; height:200px; margin: 0 auto"></div>
                                        </div>
                                       
                                    </div>
                                </td>
                                   
                            </tr>
                                <tr>
                                   <td>
                                        <div class="row-fluid">
                                        <div class="col-md-12 text-danger" align="center">
                                         <div id="salidas" style="width: 100%; height:200px; margin: 0 auto"></div>
                                           
                                           
                                        </div>
                                       
                                    </div>
                                        
                                </td>  
                            </tr>
                                <tr>
                                     <td>
                                     <div class="row-fluid">
                                        <div class="col-md-12" align="center">
                                            <strong>Total Ganancia</strong><br>
                                            <strong><?php echo '$' . formato($entrada - $salida); ?></strong>
                                        </div>
                                    </div>   
                                </td>
                            </tr>
                        </table>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>DESCRIPCION</th>                                                                                      
                                        <th>TIPO</th>                                                                                     
                                        <th>FECHA REGISTRO</th>
                                        <th>VALOR</th>

                                        <th></th>                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($conexion, "SELECT * FROM contable");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        if ($row['tipo'] == 'ENTRADA') {
                                            $tipo = '<span class="label label-success">Entrada</span>';
                                        } elseif ($row['tipo'] == 'SALIDA') {
                                            $tipo = '<span class="label label-danger">SALIDA</span>';
                                        } elseif ($row['tipo'] == 'CXC') {
                                            $tipo = '<span class="label label-info">Cuentas por Cobrar</span>';
                                        } elseif ($row['tipo'] == 'CXP') {
                                            $tipo = '<span class="label label-warning">Cuentas por Pagar</span>';
                                        }
//                                                    $oCliente=new Consultar_Clientes($row['concepto1']);
//                                                    $oProveedor=new Consultar_Proveedor($row['concepto1']);
                                        $conCliente = (int) $row['concepto1'];
                                        $cliente = mysqli_query($conexion, "SELECT*FROM tb_cliente WHERE id_cliente='$conCliente'");

                                        while ($roww = mysqli_fetch_array($cliente)) {
                                            $c_nombre = $roww['nombre_cliente'];
                                        }
                                        if ($row['tipo'] == 'CXC') {
                                            $c_nombre;
                                        } elseif ($row['tipo'] == 'CXP') {
                                            //$c_nombre=$oProveedor->consultar('nombre');
                                        } else {
                                            $c_nombre = $row['concepto1'];
                                        }
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['id_contable'] ?></td>
                                            <td><?php echo $c_nombre; ?></td>
                                            <td><center><?php echo $tipo; ?></center></td>
                                    <td><center><?php echo $row['fecha']; ?></center></td>
                                    <td><div align="right"><?php echo '$' . formato($row['valor']); ?></div></td>
                                    <td><?php ?>
                                    <center>
    <?php if ($row['tipo'] == 'CXC') { ?>
                                            <a href="cxc.php?id=<?php echo $row[0]; ?>" class="btn btn btn-danger btn-xs"><strong>Abonar</strong></a>
    <?php } elseif ($row['tipo'] == 'CXP') { ?>
                                            <a href="cxp.php?id=<?php echo $row[0]; ?>" class="btn btn btn-danger btn-xs"><strong>Abonar</strong></a>
                                        <?php } ?>
                                    </center>
                                    </td>
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
    </div>
</div>
<!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->


<?php
include_once '../Plantilla/inferior.php';
?>