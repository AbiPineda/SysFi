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
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             VENTAS, COMPRAS, CXC Y CXP
                        </div>
                        <div class="panel-body">
                         <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <?php 
                                            $salida=0;$entrada=0;$cxp=0;$cxc=0;
                                            $sql=mysqli_query($conexion,"SELECT * FROM contable");
                                            while($row=mysqli_fetch_array($sql)){
                                                if($row['tipo']=='ENTRADA'){
                                                    $entrada=$entrada+$row['valor'];
                                                }elseif($row['tipo']=='SALIDA' or $row['tipo']=='CXC'){
                                                    $salida=$salida+$row['valor'];
                                                }elseif($row['tipo']=='CXP'){
                                                    
                                                }
                                            }
                                        ?>
                                        <div class="row-fluid">
                                            <div class="col-md-4 text-success"  align="center">
                                                <strong>Total Entrada</strong><br>
                                                <strong><?php echo '$'.formato($entrada); ?></strong>
                                            </div>
                                            <div class="col-md-4 text-danger" align="center">
                                                <strong>Total Salida</strong><br>
                                                <strong><?php echo '$'.formato($salida); ?></strong>
                                            </div>
                                            <div class="col-md-4" align="center">
                                                <strong>Total Ganancia</strong><br>
                                                <strong><?php echo '$'.formato($entrada-$salida); ?></strong>
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
                                            <th>RESPONSABLE</th>
                                            <th></th>                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php 
                                                $sql=mysqli_query($conexion,"SELECT * FROM contable ".$where);
                                                while($row=mysqli_fetch_array($sql)){
                                                    if($row['tipo']=='ENTRADA'){
                                                        $tipo='<span class="label label-success">Entrada</span>';
                                                    }elseif($row['tipo']=='SALIDA'){
                                                        $tipo='<span class="label label-danger">SALIDA</span>';
                                                    }elseif($row['tipo']=='CXC'){
                                                        $tipo='<span class="label label-info">Cuentas por Cobrar</span>';
                                                    }elseif($row['tipo']=='CXP'){
                                                        $tipo='<span class="label label-warning">Cuentas por Pagar</span>';
                                                    }
                                                    $oCliente=new Consultar_Clientes($row['concepto1']);
                                                    $oProveedor=new Consultar_Proveedor($row['concepto1']);
                                                    if($row['tipo']=='CXC'){
                                                       $c_nombre=$oCliente->consultar('nombre');
                                                    }
                                                    elseif($row['tipo']=='CXP'){
                                                        $c_nombre=$oProveedor->consultar('nombre');
                                                    }
                                                    else
                                                    {
                                                       $c_nombre=$row['concepto1'];     
                                                    }                                                  
                                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $c_nombre; ?></td>
                                            <td><center><?php echo $tipo; ?></center></td>
                                            <td><center><?php echo fecha($row['fecha']).' '.$row['hora']; ?></center></td>
                                            <td><div align="right"><?php echo $s.' '.formato($row['valor']); ?></div></td>
                                            <td><?php echo consultar('nom','persona',' doc='.$row['usu']); ?></td>
                                            <td>
                                                <center>
                                                <?php if($row['tipo']=='CXC'){ ?>
                                                    <a href="cxc.php?id=<?php echo $row[0]; ?>" class="btn btn btn-danger btn-xs"><strong>Abonar</strong></a>
                                                <?php }elseif($row['tipo']=='CXP'){ ?>
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
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->

      
<?php

include_once '../Plantilla/inferior.php';
?>