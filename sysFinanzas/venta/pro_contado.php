<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';

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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Finanzas</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Vista_venta.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

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

    </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
