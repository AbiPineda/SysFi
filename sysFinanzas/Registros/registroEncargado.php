
<?php
include_once '../conexion/php_conexion.php';
include_once '../Plantilla/encabezado.php';
include_once '../Plantilla/menuLateral.php';
include_once '../correlativos/Conexion.php';
include_once '../correlativos/correlativos.php';

Conexion::abrir_conexion();

if (isset($_REQUEST['btnGuardar'])) {
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellidos'];
    $dui = $_REQUEST['dui'];
    $nit = $_REQUEST['nit'];

    $conexion = Conexion::obtener_conexion();
    $correlativo = correlativos::obtener_correlativo($conexion, 'encargado');

    $sql = "INSERT INTO encargado (nombre,apellidos,dui,nit) VALUES ('$nombre','$apellido','$dui','$nit')";
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();

    echo '<script>location.href ="registroEncargado.php";</script>';
} else {
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <head>
        <style>
      table th {
      text-align: center;
    }
     table td {
      text-align: center;
    }
            </style>
    </head>
    <!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!--AQUI TODOO EL CONTENIDO-->
                <div class="col-md-12">
                    <br/>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            REGISTRAR ENCARGADO
                        </div>
                        <div class="panel-body">
                            


                            <div class="row">
                                <div class="col-md-12" >

                                    <div class="col-md-12">
                                        <form class="form-horizontal" role="form" autocomplete="off">


                                            <label class="col-md-2 control-label">Nombre:</label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Ej. Juan Jose" class="form-control" name="nombre" onkeypress="return soloLetras(event);" id="fnamep" required="">
                                            </div>


                                            <label class="col-md-2 control-label">Apellidos:</label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Ej. Franco Pocasangre" class="form-control" name="apellidos" required="">
                                            </div>

                                            <br>
                                            <br>

                                            <label class="col-md-2 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" id="dui" placeholder="Ej. 99999999-9" required="">
                                            </div>



                                            <label class="col-md-4 control-label">NIT:</label>
                                            <div class="col-md-4">

                                                <input type="text" class="form-control" name="nit" id="nit"  placeholder="Ej. 9999-999999-999-9" required="">
                                            </div>


                                            <div class="form-group" align="center" >
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-outline btn-success btn-lg btn-block" name="btnGuardar">Guardar Encargado</button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>




                                </div>
                                <!-- /.col-lg-12 FIN DE AQUI TODO EL CONTENIDO -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->


                    <?php

                }
                ?>
                      <div class="col-md-12">
                <br>
                <!-- Advanced Tables -->
                <div class="panel panel-green">
                    <div class="panel-heading" align="center">
                        ENCARGADOS
                    </div>
                    <div class="panel-body" align="center">
                        <div class="table-responsive" align="center">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="50%">
                                        <div align="right">
                                            <form method="post" action="" enctype="multipart/form-data" name="form1" id="form1">
                                                <div class="input-group">

                                                  </td>
                                                   
                                                    <td width="20%">

                                                        <input type="text" class="redondeado" id="buscador" onkeyup="myFunction()" placeholder="Buscar..">
                                                </td>
                                                </div>
                                            </form>
                                        </div>
                                         
                                    
                                </tr>
                            </table>
                            <br>                           
                            <table id="tabla"  class="table table-striped table-bordered table-hover table-condensed table-striped" style="font-size:12px">
                                <thead>
                                    <tr>
                                        
                                        <th>NOMBRE</th>
                                        <th>APELLIDOS</th>
                                        <th>DUI</th>                                           
                                        <th>NIT</th>
                                        <th></th>
                                                                                 
                                    </tr>
                                </thead>
                                <tbody class="buscar">
                                    <?php
                                    $sacar = mysqli_query($conexion, "SELECT * FROM encargado");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['id_encargado'];
                                        $nombre = $fila['nombre'];
                                        $apellidos = $fila['apellidos'];
                                        $dui = $fila['dui'];
                                        $nit = $fila['nit'];
                                       
                                        
                                        ?>


                                        <tr>
                                            <td><?php echo $nombre; ?></td>
                                          <td><?php echo $apellidos; ?></td>
                                            <td><?php echo $dui; ?></td>
                                            <td><?php echo $nit; ?></td>
                                           
                                            <td class="center">
                                                <a href="modificarEncargado.php?ir=<?php echo $modificar; ?>"class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                            </td>



                                        <?php } ?>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        </form>
                                <button class="btn btn-warning btn-circle btn-lg"><i class="fa fa-print fa-2"></i></button>
                  
                    </div>
                    </td>
                    </tr>
                    </table>
                </div>
            </div>

                <script type="text/javascript">
                    $("#telefono").mask("0000-0000");
                    $("#dui").mask("00000000-0");
                    $("#nit").mask("0000-000000-000-0");

                </script>

                <script>
                    function soloLetras(e) {
                        textoArea = document.getElementById("fnamep").value;
                        var total = textoArea.length;
                        if (total == 0) {
                            key = e.keyCode || e.which;
                            tecla = String.fromCharCode(key).toString();
                            letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; //Se define todo el abecedario que se quiere que se muestre.
                            especiales = [8, 9, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

                            tecla_especial = false
                            for (var i in especiales) {
                                if (key == especiales[i]) {
                                    tecla_especial = true;
                                    break;
                                }
                            }

                            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                                return false;
                                alert('No puedes comenzar escribiendo numeros');
                            }
                        }
                    }
                </script>


                <?php

                include_once '../Plantilla/inferior.php';
                ?>
 