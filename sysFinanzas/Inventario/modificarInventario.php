<?php
include_once '../conexion/php_conexion.php';
include_once '../Plantilla/encabezado.php';
include_once '../Plantilla/menuLateral.php';

$modi = $_GET['ir'];
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!--AQUI TODOO EL CONTENIDO-->
            <div class="col-md-12">
                <br/>
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Registrar Articulo
                    </div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="alert alert-default" align="center">                           

                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12" >

                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                        <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>


                                                                                <?php
                                        include_once '../conexion/php_conexion.php';
                                        $sacar = mysqli_query($conexion, "SELECT
articulos.codigo,
articulos.nombre,
inventario.pv,
articulos.idarticulos
FROM
articulos
INNER JOIN inventario ON inventario.id_articulos = articulos.idarticulos WHERE idarticulos='$modi'");
                                        while ($fila = mysqli_fetch_array($sacar)) {
                                            $modificar = $fila['idarticulos'];
                                            $codigo = $fila['codigo'];
                                            $nombre = $fila['nombre'];
                                             $pv = $fila['pv'];


                                                ?>
                                                <label class="col-md-1 control-label">Código:</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" autocomplete="off">
                                                </div>

                                                <label class="col-md-1 control-label">Nombre:</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" autocomplete="off">
                                                </div>

                                                <label class="col-md-1 control-label">Precio:</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="pv" value="<?php echo $pv; ?>" autocomplete="off">
                                                </div>


                                                </div>
                                                <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                                <br>
                                                <button type="submit" class="btn btn-primary btn-lg" name="btnEnviar">Guardar Articulo</button>
                                            </div>
                                        </div>
                                    </form>       
                                </div>





                                        
        <?php
    }

?>
                             
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
</div>




<?php
include_once '../Plantilla/inferior.php';



if (isset($_REQUEST['btnEnviar'])) {
    $modi = $_REQUEST['tirar'];
    include_once '../conexion/php_conexion.php';


    $codigo = $_REQUEST['codigo'];
    $nombre = $_REQUEST['nombre'];
    
    $pv = $_REQUEST['pv'];
    
    mysqli_query($conexion, "UPDATE articulos INNER JOIN inventario ON inventario.id_articulos = articulos.idarticulos SET codigo='$codigo',nombre='$nombre',pv='$pv'WHERE idarticulos='$modi'");

    
    echo "<script>
          location.href ='InventarioArticulos.php';
        </script>";
}
?>