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
                        Registrar Encargado
                    </div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="alert alert-default" align="center">                           

                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12" >

                                <div class="col-md-12">
                                    <form action="" method="post">
                                        <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>


                                        <?php
                                        include_once '../conexion/php_conexion.php';
                                        $sacar = mysqli_query($conexion, "SELECT*FROM encargado WHERE id_encargado='$modi'");
                                        while ($fila = mysqli_fetch_array($sacar)) {
                                            $modificar = $fila['id_encargado'];

                                            $nombre = $fila['nombre'];
                                            $apellidos = $fila['apellidos'];
                                            $dui = $fila['dui'];
                                            $nit = $fila['nit'];
                                            ?>
                                            <label class="col-md-2 control-label">Nombre:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                                            </div>

                                            <label class="col-md-2 control-label">Apellidos:</label>
                                            <div class="col-md-4">
                                                <input type="text" value="<?php echo $apellidos; ?>" class="form-control" name="apellidos">
                                            </div>

                                            <br>
                                            <br>

                                            <label class="col-md-2 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" id="dui" value="<?php echo $dui; ?>" >
                                            </div>



                                            <label class="col-md-4 control-label">NIT:</label>
                                            <div class="col-md-4">

                                                <input type="text" class="form-control" name="nit" id="nit" value="<?php echo $nit; ?>">
                                            </div>



                                            <div class="form-group" align="center" >
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary btn-lg" name="btnEnviar">Guardar Encargado</button>
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                        </form>
                                    </div>


                                </div>

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

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $dui = $_REQUEST['dui'];
    $nit = $_REQUEST['nit'];


    mysqli_query($conexion, "UPDATE encargado SET nombre='$nombre',apellidos='$apellidos',dui='$dui',nit='$nit' WHERE id_encargado='$modi'");


    echo "<script>
          location.href ='registroEncargado.php';
        </script>";
}
?>