<?php 
    session_start();
    include_once "../php_conexion.php";
    include_once "../funciones.php";
    include_once "../class_buscar.php";
    if($_SESSION['cod_user']){
    }else{
        header('Location: ../../php_cerrar.php');
    }
    if(!empty($_GET['detalle'])){
        $proveedor=$_GET['detalle'];
    }else{
        header('Location:error.php');
    }
    $usu=$_SESSION['cod_user'];
    $pa=mysql_query("SELECT * FROM cajero WHERE usu='$usu'");               
    while($row=mysql_fetch_array($pa)){
        $id_almacen=$row['almacen'];
        $oAlamacen=new Consultar_Deposito($id_almacen);
        $nombre_Almacen=$oAlamacen->consultar('nombre');
    }
    
    $oPersona=new Consultar_Cajero($usu);
    $cajero_nombre=$oPersona->consultar('nom');
    $fecha=date('Y-m-d');
    $hora=date('H:i:s');
    
    ######### TRAEMOS LOS DATOS DE LA EMPRESA #############
        $pa=mysql_query("SELECT * FROM empresa WHERE id=1");                
        if($row=mysql_fetch_array($pa)){
            $nombre_empresa=$row['empresa'];
            $nit_empresa=$row['nit'];
            $dir_empresa=$row['direccion'];
            $tel_empresa=$row['tel'].'-'.$row['fax'];
            $pais_empresa=$row['pais'].' - '.$row['ciudad'];
        }
        if(!empty($_GET['del'])){
        $id=$_GET['del'];
        mysql_query("UPDATE articulos SET prov='' WHERE id='$id'");
        header('location:prov_pro.php');
    }
         $oProveedor=new Consultar_Proveedor($proveedor);
       
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $nombre_empresa; ?></title>
	<!-- Bootstrap Styles-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="../../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
</head>
<body>
    <div id="wrapper">
         <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo $_SESSION['user_name']; ?></a>
            </div>
 
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> My Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../php_cerrar.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Almacen: <?php echo $nombre_Almacen; ?> :: Fecha de Acceso : <?php echo fecha(date('Y-m-d')); ?>
</div>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <?php include_once "../../menu/m_proveedor.php"; ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-info">
                        <div class="panel-heading">
                            PROVEEDOR: <?php echo $oProveedor->consultar('nombre'); ?> 
                        </div>
                        <div class="panel-body">
                    <!-- Advanced Tables -->                    
                            <div class="table-responsive">
                             <?php 
                                 if(!empty($_POST['id'])){                                               
                                    $id=limpiar($_POST['id']);                                                                                                          
                                    if(empty($_POST['id'])){
                                        mysql_query("DELETE FROM pro_prov WHERE articulo='$id'");
                                        echo mensajes('Categoria "" Creada con Exito','verde');
                                    }else{
                                        mysql_query("DELETE FROM pro_prov WHERE articulo='$id'");
                                        echo mensajes('Articulo desligado con Exito','verde');
                                        }
                                }
                            ?>
                            <hr/>
                            <div style="font-size: 12px;" align="center">
                                <strong>DETALLE DE LOS PRODUCTOS QUE PERTENECEN AL PROVEEDOR <?php echo $oProveedor->consultar('nombre'); ?><br>
                            </div>
                            <hr/>
                                <table class="table table-striped table-bordered table-hover"  width="100%" rules="all"  border="1">                                    
                                    <thead>
                                        <tr class="info">                                                                                                                                                                          
                                            <th>CODIGO</th>                                                                                                                                                                           
                                            <th>ARTICULO</th>                                                                                                                                                                           
                                            <th>COSTO</th>                                                                                                                                                                           
                                            <th></th>                                                                                                                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                            $pa=mysql_query("SELECT articulos.valor, articulos.codigo, articulos.prov, pro_prov.articulo FROM pro_prov, articulos WHERE proveedor='$proveedor' AND articulo=articulos.id");              
                                            while($row=mysql_fetch_array($pa)){
                                                $oArticulo=new Consultar_Articulos($row['articulo']);

                                          ?>
                                        <tr>
                                            <td><?php echo $row['codigo']; ?></td> 
                                            <td><?php echo $oArticulo->consultar('nombre'); ?></td> 
                                            <td><?php echo $s.''.formato($row['valor']); ?></td>
                                            <td><a href="#" data-toggle="modal" data-target="#eliminar<?php echo $row['articulo']; ?>" class="btn btn-danger btn-sm" title="Desligar de Proveedor"> <i class="fa fa-times" ></i></a></td> 
                                        </tr>
                                        <!-- Modal -->                     
                                                <div class="modal fade" id="eliminar<?php echo $row['articulo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <form name="contado" action=" " method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $row['articulo']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                                    
                                                                            <h3 align="center" class="modal-title" id="myModalLabel">Seguridad</h3>
                                                                        </div>
                                                            <div class="panel-body">
                                                            <div class="row" align="center">                                       
                                                                                                        
                                                                <strong>Hola! <?php echo $cajero_nombre; ?></strong><br><br>
                                                                <div class="alert alert-danger">
                                                                    <h4>¿Esta Seguro de Realizar esta Acción?<br> 
                                                                    Quiere dar de Baja el Articulo <strong>[ <?php echo $oArticulo->consultar('nombre'); ?> ] 
                                                                    del proveedor <?php echo $oProveedor->consultar('nombre'); ?></strong>.</h4>
                                                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                              
                                                            </div> 
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                               <button type="submit" class="btn btn-primary">Aceptar</button>                                                           
                                                            </div>                                       
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                         <!-- End Modals-->                                                                                                                       
                                        <?php } ?>
                                    </tbody>                                    
                                </table><br><br><br><br>
                                     <hr/>
                                     <center>
                                        <strong><?php echo $nombre_empresa; ?></strong><br>
                                        <strong><?php echo $tel_empresa; ?></strong><br>
                                        <strong><?php echo $pais_empresa; ?></strong><br>
                                        <strong><?php echo $dir_empresa; ?></strong><br>
                                    </center>
                            </div>                                                                     
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                 </div>
                    </div> 
           
                                
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="../../assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
