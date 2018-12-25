<?php
include_once '../conexion/php_conexion.php';
$fecha=date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                <div class="row">
                    <!--AQUI TODOO EL CONTENIDO-->
                    <div class="col-md-12">
                        <br/>
                         <div class="panel panel-green">
                        <div class="panel-heading">
                             CONSUMIDOR FINAL
                        </div>
                        <div class="panel-body">
             <div class="col-md-8">
			 <div class="alert alert-default" align="center">                           
                            <form name="form2" action="" method="post">
                                     <div class="input-group">
                                    <span class="input-group-addon">CLIENTE:</span>
                                    <input type="text" list="browsers1" name="buscar_cliente" autocomplete="off" class="form-control" required>
                                    <datalist id="browsers1">
                                        <?php
                                            $pa=mysqli_query($conexion,"SELECT * FROM tb_cliente WHERE tb_cliente.id_cliente");                
                                            while($row=mysqli_fetch_array($pa)){
                                                echo '<option value="'.$row['nombre_cliente'].'">';                                          
                                            }
                                       ?> 
                                    </datalist>
                                    </div>
                                </form>
                    </div>
                 
                </div>
                <div class="col-md-4">
                         <div class="panel-body" align="center">                                                                                 
                            <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-2x" title="Agregar Nuevo Cliente"></i>
                            </button>

                                                                                                        
                  </div>
                </div>
                 <div class="col-md-12">
                    <?php
              
                
                    if(!empty($_POST['buscar_cliente'])){
                        $buscarc= $_POST['buscar_cliente'];
                        $poa=mysqli_query($conexion,"SELECT tb_cliente.id_cliente FROM tb_cliente
                       WHERE (tb_cliente.id_cliente='$buscarc' or tb_cliente.nombre_cliente='$buscarc') GROUP BY tb_cliente.nombre_cliente");  
                        if($roow=mysqli_fetch_array($poa)){
                            $codigoo=$roow['id_cliente'];
                            #$oRuta=new Consultar_Ruta($roow['ruta']);
                            $pa=mysqli_query($conexion,"SELECT * FROM cliente_temp WHERE id_cliente='$codigoo'");    
                            if($row=mysqli_fetch_array($pa)){
                                
                                mysqli_query($conexion,"UPDATE cliente_temp SET fecha='$fecha' WHERE id_cliente='$codigoo'");
                            }else{
                                mysqli_query($conexion,"INSERT INTO cliente_temp (id_cliente, fecha) VALUES ('$codigoo','$fecha')");   
                            }
                        }else{
                            echo mensajes('El Cliente que Busca no se encuentra Registrado en la Base de Datos','rojo');    
                        }
                    }                                                           
                ?>
                 <!-- /. ROW  -->
            </div>
               
            <div class="row">
                <div class="col-md-12">
               
                        <?php 
                        $ocultar=mysqli_query($conexion,"SELECT * FROM cliente_temp");
                        if (mysqli_num_rows($ocultar)>0) {
                                $neto=0;$item=0;
                                $pa=mysqli_query($conexion,"SELECT * FROM cliente_temp, tb_cliente WHERE cliente_temp.id_cliente=tb_cliente.id_cliente");                
                                while($row=mysqli_fetch_array($pa)){
                                    ############# FECHA ######################
                                    if($row['fecha']==NULL){
                                        
                                        #$oRuta->consultar('nombre');
                                        $fecha=$fecha;
                                    }else{
                                        $fecha=$row['fecha'];
                                        
                                    }
                                   
                                    
                                    $pame=strftime( "%Y-%m-%d-%H-%M-%S", time() );                                      
                                    if($row['fecha']==$pame){
                                                    $status='si';
                                                }                                                                                               
                                                elseif($row['fecha']>$pame){
                                                    $status='<a href="#" role="button" class="btn btn-danger" data-toggle="modal" title="Cambiar Status">
                                                                <strong>CREDITO</strong>
                                                        </a> ';
                                                }
                                    
                            ?>
                              <div class="col-md-6">
                                    <form class="form-horizontal" role="form">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nombre:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $row['nombre_cliente']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Precedencia:</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" disabled="" value="<?php echo $row['dir_cliente']; ?>" name="dir">
                                            </div>
                                        </div>
                                    </form>
                            </div>
                             <div class="col-md-6">
                                    <form class="form-horizontal" role="form">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Fecha:</label>
                                                <div class="input-group m-t-10">
                                                    <input type="email" id="example-input2-group2" value="<?php echo $row['fecha']; ?>" name="example-input2-group2" class="form-control" disabled="">
                                                    <span class="input-group-btn">
                                            
                                             
                                            </span>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group" align="center">
                                          
                                        </div>
                                    </form>
                            </div>
                            
                                                                                
                            
                             <!--  Modals-->
                                 <div class="modal fade" id="fecha<?php //echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Cambiar Fecha de Entrega<br>[<?php //echo $row['nombre']; ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                            <div class="col-md-3" > 
                                            
                                            </div>
                                            <div class="col-md-6" >                                         
                                                <input type="hidden" name="ncodigof" value="<?php //echo $row['id']; ?>">
                                                <strong>Nueva Fecha</strong><br>
                                                <input type="date" class="form-control" name="fecha" min="1" value="<?php //echo $row['fecha'] ?>" autocomplete="off" required>
                                            </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals-->
                     <!--  Modals-->
                                 <div class="modal fade" id="status<?php //echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Cambiar Tipo<br>[<?php //echo $row['nombre']; ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                         <div class="alert alert-danger" align="center">
                                                <h4>¿Esta Seguro de Cambiar esta operación?<br> 
                                                </h4>
                                            </div>  
                                        <div class="row" align="center">
                                            <div class="col-md-3" > 
                                            
                                                </div>
                                            <div class="col-md-6" >                                             
                                                <select class="form-control" name="status" value="<?php //echo $row['rut']; ?>">
                                                    <option value="CREDITO">CREDITO</option>
                                                    <option value="CONTADO">CONTADO</option>
                                                </select>                                               
                                                <input type="hidden" name="ncodigos" value="<?php //echo $row['id']; ?>">                                                                                             
                                            </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals-->                                                                                               
                        <?php } }?>
          <div class="col-md-12">              
<!--######################################## ARTICULOS ############################################################################################## -->
                    <div class="alert alert-success" align="center">                
                            <form name="form2" action="" method="post">
                                     <div class="input-group">
                                    <span class="input-group-addon">ARTICULO:</span>
                                    <input type="text" autofocus list="browsers" name="buscar" autocomplete="off" class="form-control" required>
                                    <datalist id="browsers">

                                        <?php
//                                            $buscar=$_POST['buscar'];
//                                            $in=mysql_query("SELECT * FROM inventario, articulos 
//                                            WHERE articulos.id=inventario.articulo and inventario.almacen='$id_almacen'");               
//                                            while($row=mysql_fetch_array($in)){
//                                                echo '<option value="'.$row['nombre'].'">';
//                                            }
                                        ?> 
                                    </datalist>
                                     </div>
                            </form>
                    </div>
                    <?php
                    ######### ACTUALIZACION DE LA CANTIDAD #############
//                    if(!empty($_POST['new_cant'])){
//                        $new_cant=limpiar($_POST['new_cant']);
//                        $ncodigo=limpiar($_POST['ncodigo']);
//                        $iv=mysql_query("SELECT * FROM inventario WHERE articulo='$ncodigo'");                
//                        if($row=mysql_fetch_array($iv)){
//                            $stock=$row['stock'];
//                            if ($stock == 0 and $new_cant > $stock){
//                                 $cantf='0';
//
//                            }
//                            else if ($stock == $row['stock_min'] and $new_cant > $row['stock_min']){
//                                      $cantf=$stock;
//                                      $oArticulo=new Consultar_Articulos($ncodigo);
//                                      echo mensajes('El Articulo '.$oArticulo->consultar('nombre').' se encuentra en Existencia '.$stock.'','rojo');
//
//                            }
//                            else if ($stock >= $row['stock_min'] and $new_cant >= $row['stock']){
//                                      $cantf=$stock;
//                                      $oArticulo=new Consultar_Articulos($ncodigo);
//                                      echo mensajes('El Articulo '.$oArticulo->consultar('nombre').' se encuentra con Existencia '.$stock.'','rojo');
//
//                            }  
//                            else {
//                                $cantf=$new_cant;
//
//                            }
//                        } 
//
//                        if ($stock==0) {
//                            $cantfx='1';
//                        }
//                        else{
//                             $cantfx=$new_cant;
//                        }
//
//                        mysql_query("UPDATE caja_tmp SET cant='$cantf' WHERE articulo='$ncodigo' and usu='$usu'");
//                    }
//                    ##########################################################
//                    if(!empty($_POST['new_pv'])){
//                        $new_pv=limpiar($_POST['new_pv']);
//                        $especial=limpiar($_POST['especial']);
//                        $pvcodigo=limpiar($_POST['pvcodigo']);
//                        if ($new_pv=='n') {
//                            $newp=$especial;
//                        }
//                        else{
//                            $newp=$new_pv;
//                        }
//
//                        mysql_query("UPDATE caja_tmp SET p_mayor='$newp' WHERE articulo='$pvcodigo' and usu='$usu'");
//                    }
//                    
//                    if(!empty($_POST['ncodigo_ref'])){
//                        $referencia=limpiar($_POST['referencia']);
//                        $ref_ant=limpiar($_POST['ref_ant']);
//                        $ncodigo=limpiar($_POST['ncodigo_ref']);
//                        
//                        if($referencia==''){
//                            mysql_query("UPDATE caja_tmp SET ref='' WHERE articulo='$ncodigo' and usu='$usu' and ref='$ref_ant'");
//                        }else{
//                            $pa=mysql_query("SELECT * FROM caja_tmp WHERE caja_tmp.ref='$referencia'");             
//                            if($row=mysql_fetch_array($pa)){
//                                echo mensajes('El Numero de Referencia "'.$referencia.'" Esta siendo usada','rojo');
//                            }else{
//                                mysql_query("UPDATE caja_tmp SET ref='$referencia' WHERE articulo='$ncodigo' and usu='$usu' and ref='$ref_ant'");
//                            }
//                        }
//                        
//                    } 
//                    if(!empty($_POST['desc'])){
//                        $desc=limpiar($_POST['desc']);
//                        $ncodigod=limpiar($_POST['ncodigod']);
//                         mysql_query("INSERT INTO desc_tmp (descuento, almacen, usu) VALUES ('$desc','$id_almacen','$usu')");
//                    } 
//
//                    if(!empty($_POST['buscar'])){
//                        $buscar=limpiar($_POST['buscar']);
//                        $pro=mysql_query("SELECT * FROM articulos 
//                        WHERE (articulos.id LIKE '$buscar%' or articulos.nombre LIKE '$buscar%'  or articulos.codigo LIKE '$buscar%') GROUP BY articulos.nombre");   
//                        if($roow=mysql_fetch_array($pro)){
//                            $codigo=$roow['id'];
//
//                        $i=mysql_query("SELECT * FROM inventario WHERE articulo='$codigo'");
//                        if ($row=mysql_fetch_array($i)) {
//                            if ($row['stock'] == 0) {
//                                 $oArticulo=new Consultar_Articulos($codigo);
//                                echo mensajes('El Articulo '.$oArticulo->consultar('nombre').' se encuentra con Existencia "0"','rojo');
//                            }
//                            else if ($row['stock'] <= $row['stock_min'] ) {
//                                $oArticulo=new Consultar_Articulos($codigo);
//                                 echo mensajes('El Articulo '.$oArticulo->consultar('nombre').' se encuentra con Existencia '.$row['stock'].'','rojo');
//                                $pa=mysql_query("SELECT * FROM caja_tmp WHERE articulo='$codigo' and usu='$usu' and ref=''");   
//                                    if($row=mysql_fetch_array($pa)){
//                                        $cant=$row['cant'];
//                                        mysql_query("UPDATE caja_tmp SET cant='$cant' WHERE articulo='$codigo' and usu='$usu'");
//                                    }else{
//                                        mysql_query("INSERT INTO caja_tmp (articulo, cant, usu) VALUES ('$codigo','1','$usu')");    
//                                    }
//                            }
//                            else{
//                                  $pa=mysql_query("SELECT * FROM caja_tmp WHERE articulo='$codigo' and usu='$usu' and ref=''");   
//                                    if($row=mysql_fetch_array($pa)){
//                                        $cant=$row['cant']+1;
//                                        mysql_query("UPDATE caja_tmp SET cant='$cant' WHERE articulo='$codigo' and usu='$usu'");
//                                    }else{
//                                        mysql_query("INSERT INTO caja_tmp (articulo, cant, usu) VALUES ('$codigo','1','$usu')");    
//                                    }
//
//                            }
//                           
//                        }
//
//                        }else
//                        {
//                            echo mensajes('El Producto que Busca no se encuentra Registrado en la Base de Datos','rojo');   
//                        }
//                    }                                                           
//                ?>
                 <!--//<?php
//                    $descuento=''; 
//                    $obs=mysql_query("SELECT * FROM desc_tmp WHERE almacen='$id_almacen'");               
//                         if(!$rows=mysql_fetch_array($obs)){ 
//                                    $obs='0';
//                                }else{
//                                    $obs=$rows['descuento'];
//                                }
                                                                                                    
                ?>-->
                <div class="table-responsive">                                
                        <table class="table table-striped">
                            <tr class="well-dos">
                                <td><strong>CODIGO</strong></td>
                                <!--<td><strong>Referencia</strong></td>-->
                                <td><strong>PRODUCTO</strong></td>
                                <td><strong><center>CANT.</center></strong></td>
                                <td><strong><div align="right">P.VENTA</div></strong></td>
                                <td><strong><div align="right">TOTAL</div></strong></td>
                                <td></td>
                            </tr>
                            <?php 
//                                $neto=0;$item=0;$total=0;
//                                $pa=mysql_query("SELECT * FROM caja_tmp, inventario WHERE caja_tmp.usu='$usu' and caja_tmp.articulo=inventario.articulo");              
//                                while($row=mysql_fetch_array($pa)){
//                                    $item=$item+$row['cant'];                                   
//                                    $defecto=strtolower($row['pv']);
//                                    $valor=$row['pv'];
//
//                                     ############### manejo de STOCK#########################
//                                    if ($row['stock'] == 0) {
//                                        $aviso=' <a href="#m'.$row['articulo'].'" role="button" class="btn btn-danger btn-mini" data-toggle="modal" title="Cambiar Cantidad" accesskey="c">
//                                            <strong>Sin stock</strong>
//                                        </a>';
//                                    }
//                                    else{
//                                        $aviso=' <a href="#m'.$row['articulo'].'" role="button" class="btn btn-success btn-mini" data-toggle="modal" title="Cambiar Cantidad" accesskey="c">
//                                            <strong>'.$row['cant'].'</strong>
//                                        </a>';
//                                    }
//                                    ########################################
//                                    if($row['ref']==NULL){
//                                        $referencia='Sin Referencia';
//                                    }else{
//                                        $referencia=$row['ref'];
//                                    }
//                                     if($row['p_mayor']==NULL){
//                                        $new=$row['pv'];
//                                    }else{
//                                        $new=$row['p_mayor'];
//                                    }
//                                    ###############CALCULOS TOTALES#########################
//                                    $importe=$row['cant']*$new;
//                                    $neto=$neto+$importe;
//                                    
//                                    $oArticulo=new Consultar_Articulos($row['articulo']);
                            ?>
                            <tr>
                             <td align="center"><span class="label label-info"> <?php echo $row['codigo']; ?></span></td>                                                             
                                <td><?php //echo $oArticulo->consultar('nombre');  ?></td>
                                <td>
                                    <center>
                                      <?php //echo $aviso; ?>
                                    </center>
                                </td>
                                <td>
                                <div align="right">
                                        <a  href="#p<?php //echo $row['articulo']; ?>" role="button" class="btn btn-primary btn-mini" data-toggle="modal" title="Cambiar Precio" accesskey="p">
                                            <strong><?php //echo $s.' '.formato($new); ?></strong>
                                        </a>
                                </div>
                                </td>
                                <td><div align="right"><strong><?php //echo $s.' '.formato($importe); ?></div></strong></td>                                
                                <td>
                                    <center>                           
                                        <a href="index.php?del=<?php //echo $row['articulo']; ?>"  class="btn btn-danger" title="Eliminar">
                                            <i class="fa fa-times" ></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                           
                      <!--  Modals-->
                                 <div class="modal fade" id="m<?php //echo $row['articulo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Actualizar Cantidad<br>[<?php //echo $oArticulo->consultar('nombre');  ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                            <div class="col-md-4" > 
                                            
                                            </div>
                                            <div class="col-md-4" >                                         
                                                <input type="hidden" name="ncodigo" value="<?php //echo $row['articulo']; ?>">
                                                <strong>Nueva Cantidad</strong><br>
                                                <input type="number" class="form-control" name="new_cant" min="1" value="<?php //echo $row['cant'] ?>" autocomplete="off" required>
                                            </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar Cantidad</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals-->
                     <!--  Modals-->
                                 <div class="modal fade" id="p<?php //echo $row['articulo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="form1" method="post" action="">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                        <h3 align="center" class="modal-title" id="myModalLabel">Cambiar Precio<br>[<?php //echo $oArticulo->consultar('nombre');  ?>]</h3>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                            <div class="col-md-6" >                                         
                                                <input type="hidden" name="pvcodigo" value="<?php //echo $row['articulo']; ?>">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Precios</span>
                                                        <select class="form-control" name="new_pv" autocomplete="off" required>
                                                            <option value="n">---SELECCIONE---</option>
                                                            <option value="<?php //echo $row['pmy'] ?>"><?php //echo $s.' '.formato($row['pmy']) ?> [P.MAYOR]</option>
                                                            <option value="<?php //echo $row['pv'] ?>"><?php //echo $s.' '.formato($row['pv']) ?> [P.VENTA]</option>                                            
                                                        </select>                                               
                                                </div>
                                            </div>
                                             <div class="col-md-6" >                                         
                                                <div class="input-group">
                                                    <span class="input-group-addon">Precio Especial</span>
                                                        <input type="number" min="0" step="any" class="form-control" name="especial" autocomplete="off"><br>                                             
                                                </div>
                                            </div>                                                                                                                    
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar Precio</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals-->                                                                                             
                            <?php //} ?>
                        </table>                                
                    </div>
                    <!-- COBROS -->
                    <div class="span4">
                     <div class="table-responsive">
                        <table border="0" class="table">
                             <tr>
                                <td colspan="4"><div align="right"><strong>Sub Total</strong></div></td>
                                <td><div align="right"><strong>$ <?php //echo formato($neto); ?></strong></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3"><div align="right">
                                     <?php
//                                     $d=0;
//                                     if(!empty($_GET['ddes'])){
//                                        $ddes=limpiar($_GET['ddes']);
//                                            if($ddes>=0){
//                                                $d=$_GET['ddes'];    
//                                            }
//                                        }
//
//                                            $descuento=$neto*$d/100;
//                                            $total=$neto-$descuento;
                                        ?>
                                     <form name="form3" method="get" action="index.php">
                                                <button type="submit" class="btn btn-default">Aplicar Descuento</button></div>
                                </td>
                                 <td colspan="2" width="15%"><div align="right">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input type="number" class="form-control" min="0" max="99" name="ddes" id="ddes" value="<?php //echo $_SESSION['ddes']; ?>">
                                                </div></div>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                    <td colspan="3"><div align="right">
                                     <?php
//                                     $iv=0;
//                                     if(!empty($_GET['iva'])){
//                                        $iva=limpiar($_GET['iva']);
//                                            if($iva>=0){
//                                                $iv=$_GET['iva'];    
//                                            }
//                                        }
//
//                                            $impuesto=$neto*$iv/100;
                                            
                                        ?>
                                     <form name="form3" method="get" action="index.php">
                                                <button type="submit" class="btn btn-default">Aplicar IVA</button></div>
                                </td>
                                 <td colspan="2" width="15%"><div align="right">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input type="number" class="form-control" min="0" max="99" name="iva" id="iva" value="<?php //echo $_SESSION['iva']; ?>">
                                                </div></div>
                                    </form>
                                </td>
                                <td></td>
                            </tr>                                                               
                            </div>
                        </table>
                    </div>
                    </div>
                    <div class="span4">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <center><strong>TOTAL</strong>
                                    <pre><h2 class="text-success" align="center">$ <?php //echo formato($total+$impuesto); ?></h2></pre>
                                    
                                </td>
                            </tr>
                        </table>
                        <?php if($neto<>0){ ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div align="center">
                                    <div class="row">
                                    <div class="col-md-6">
                                     <i class="fa fa-plus icon-white"></i> <strong>FORMA DE PAGO FACTURA</strong><br>
                                        <a href="#factura1" role="button" class="btn btn-primary btn-lg" data-toggle="modal">
                                            <i class="fa fa-list icon-white"></i> <strong>CONTADO</strong>
                                        </a>
                                        <a href="#factura2" role="button" class="btn btn-primary btn-lg" data-toggle="modal">
                                            <i class="fa fa-list icon-white"></i> <strong>CREDITO</strong>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                      <i class="fa fa-plus icon-white"></i> <strong>FORMA DE PAGO TIKET</strong><br>
                                       <a href="#ticket" role="button" class="btn btn-warning btn-lg" data-toggle="modal">
                                            <i class="fa fa-shopping-cart icon-white"></i> <strong>CONTADO</strong>
                                        </a> 
                                        <a href="#ticket2" role="button" class="btn btn-warning btn-lg" data-toggle="modal">
                                            <i class="fa fa-shopping-cart icon-white"></i> <strong>CREDITO</strong>
                                        </a> 
                                    </div>
                                        
                                    </div>
                                        
                                         
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php } ?>
                    </div>
                    <!--  Modals-->
                    <!--factura 1 para el contado-->
                                <div class="modal fade" id="factura1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_contado.php" method="get">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary text-center no-boder bg-color-red">
                                                <div class="panel-footer back-footer-red">
                                                    TOTAL FACTURA
                                                </div>
                                                <div class="panel-body">
                                                    <div style=" bg-color: red;font-size:50px"><?php echo $s.' '.formato($total+$impuesto); ?></div>
                                                </div>                           
                                            </div>
                                        </div>                                       
                                            <br>
                                             <strong>Dinero Recibido</strong><br>
                                              <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                             <div class="input-group">
                                                <span class="input-group-addon"><?php echo $s; ?></span>
                                                <input type="number" class="form-control input-lg" name="valor_recibido" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required><br>                                         
                                                <span class="input-group-addon">.00</span>
                                             </div><br>

                                              <div class="input-group">
                                                <span class="input-group-addon">Forma de Pago</span>
                                               <select class="form-control" name="pago">
                                                    <option value="CONTADO">CONTADO</option>
                                                </select>                                               
                                             </div><br>

                                            <!--<input type="hidden" value="<?php echo $neto; ?>" name="valor_recibido">-->
                                            <input type="hidden" value="<?php echo $total+$impuesto; ?>" name="neto">  
                                            <input type="hidden" value="<?php echo $impuesto; ?>" name="impuesto">  
                                           </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Procesar</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals para contado-->
                     <!--  Modals-->
                    <!--factura 1 para el credito-->
                                <div class="modal fade" id="factura2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_contado.php" method="get">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary text-center no-boder bg-color-red">
                                                <div class="panel-footer back-footer-red">
                                                    TOTAL FACTURA
                                                </div>
                                                <div class="panel-body">
                                                    <div style=" bg-color: red;font-size:50px"><?php echo $s.' '.formato($total+$impuesto); ?></div>
                                                </div>                           
                                            </div>
                                        </div>                                       
                                            <br>
                                             <strong>PRIMA</strong><br>
                                              <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                             <div class="input-group">
                                                <span class="input-group-addon"><?php echo $s; ?></span>
                                                <input type="number" class="form-control input-lg" name="valor_recibido" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required><br>                                         
                                                <span class="input-group-addon">.00</span>
                                             </div><br>

                                              <div class="input-group">
                                                <span class="input-group-addon">Forma de Pago</span>
                                               <select class="form-control" name="pago">
                                                    <option value="CREDITO">CREDITO</option>
                                                </select>                                               
                                             </div>
                                             <br>
                                              <div class="input-group">
                                                <span class="input-group-addon">MESES</span>
                                               <select class="form-control" name="mes">
                                                    <option value="6">6 MESES</option>
                                                     <option value="12">12 MESES</option>
                                                      <option value="18">18 MESES</option>
                                                       <option value="24">24 MESES</option>
                                                        <option value="30">30 MESES</option>
                                                         <option value="42">42 MESES</option>
                                                </select>                                              
                                             </div>
                                             <br>
                                              <div class="input-group">
                                              <span class="input-group-addon">INTERES</span>
                                                 <input type="number" class="form-control input-lg" name="interes" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required>                                         
                                                <span class="input-group-addon">.00</span>
                                              </div>
                                             

                                            <!--<input type="hidden" value="<?php echo $neto; ?>" name="valor_recibido">-->
                                            <input type="hidden" value="<?php echo $total+$impuesto; ?>" name="neto">  
                                            <input type="hidden" value="<?php echo $impuesto; ?>" name="impuesto">  
                                           </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Procesar</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals para contado-->
                      <!--  Modals-->
                                 <div class="modal fade" id="ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_ticket.php" method="get">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary text-center no-boder bg-color-red">
                                                <div class="panel-footer back-footer-red">
                                                    TOTAL TICKET
                                                </div>
                                                <div class="panel-body">
                                                    <div style=" bg-color: red;font-size:50px"><?php echo $s.' '.formato($total+$impuesto); ?></div>
                                                </div>                           
                                            </div>
                                        </div>                                       
                                            <br>
                                             <strong>Dinero Recibido</strong><br>
                                              <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                             <div class="input-group">
                                                <span class="input-group-addon"><?php echo $s; ?></span>
                                                <input type="number" class="form-control input-lg" name="valor_recibido" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required><br>                                         
                                                <span class="input-group-addon">.00</span>
                                             </div><br>
                                              <div class="input-group">
                                                <span class="input-group-addon">Forma de Pago</span>
                                               <select class="form-control" name="pago">
                                                    <option value="CONTADO">CONTADO</option>
                                                </select>                                               
                                             </div><br>                                               
                                            <!--<input type="hidden" value="<?php echo $neto; ?>" name="valor_recibido">-->
                                            <input type="hidden" value="<?php echo $total+$impuesto; ?>" name="neto">  
                                           </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Procesar</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals-->
                     <!--  Modals-->
                                 <div class="modal fade" id="ticket2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form name="contado" action="pro_ticket.php" method="get">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                        <div class="panel-body">
                                        <div class="row" align="center">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary text-center no-boder bg-color-red">
                                                <div class="panel-footer back-footer-red">
                                                    TOTAL TICKET
                                                </div>
                                                <div class="panel-body">
                                                    <div style=" bg-color: red;font-size:50px"><?php echo $s.' '.formato($total+$impuesto); ?></div>
                                                </div>                           
                                            </div>
                                        </div>                                       
                                            <br>
                                             <strong>Dinero Recibido</strong><br>
                                              <div class="col-md-3">
                                               </div>
                                              <div class="col-md-6">
                                             <div class="input-group">
                                                <span class="input-group-addon"><?php echo $s; ?></span>
                                                <input type="number" class="form-control input-lg" name="valor_recibido" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required><br>                                         
                                                <span class="input-group-addon">.00</span>
                                             </div><br>
                                              
                                              <div class="input-group">
                                                <span class="input-group-addon">Forma de Pago</span>
                                               <select class="form-control" name="pago">
                                                    <option value="CREDITO">CREDITO</option>
                                                </select>                                               
                                             </div>
                                             <br>
                                              <div class="input-group">
                                                <span class="input-group-addon">MESES</span>
                                               <select class="form-control" name="mes">
                                                    <option value="6">6 MESES</option>
                                                     <option value="12">12 MESES</option>
                                                      <option value="18">18 MESES</option>
                                                       <option value="24">24 MESES</option>
                                                        <option value="30">30 MESES</option>
                                                         <option value="42">42 MESES</option>
                                                </select>                                              
                                             </div>
                                             <br>
                                              <div class="input-group">
                                              <span class="input-group-addon">INTERES</span>
                                                 <input type="number" class="form-control input-lg" name="interes" required min="0" step="any" min="<?php echo $neto_full; ?>"  autocomplete="off" required>                                         
                                                <span class="input-group-addon">.00</span>
                                              </div>
                                                                                            
                                            <!--<input type="hidden" value="<?php echo $neto; ?>" name="valor_recibido">-->
                                            <input type="hidden" value="<?php echo $total+$impuesto; ?>" name="neto">  
                                           </div>                                                                                                              
                                        </div> 
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Procesar</button>
                                        </div>                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                     <!-- End Modals-->
                </div>
            </div>   
                       
                    </div>
                    <!-- /.col-lg-12 FIN DE AQUI TODO EL CONTENIDO -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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
