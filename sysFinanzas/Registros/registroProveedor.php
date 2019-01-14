
<?php
include_once '../conexion/php_conexion.php';
include_once '../Plantilla/encabezado.php';
include_once '../Plantilla/menuLateral.php';
?>
<!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!--AQUI TODOO EL CONTENIDO-->
            <div class="col-md-12">
                <br/>
                <div class="panel panel-green">
                    <div class="panel-heading">
                        REGISTRAR PROVEEDOR
                    </div>
                    <div class="panel-body">
                       

                        <div class="row">
                            <div class="col-md-14" >

                                <div class="col-md-12">
                                    <form class="form-horizontal" role="form" autocomplete="off">


                                        <label class="col-md-1 control-label">Proveedor:</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="proveedor" onkeypress="return soloLetras(event);" id="fnamep" required="" >
                                        </div>

                                        <label class="col-md-1 control-label">Contacto:</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="contacto" onkeypress="return soloLetras(event);" id="fnamep" required="">
                                        </div>


                                        <br>
                                        <br>
                                        <label class="col-md-2 control-label">Dirección:</label>
                                        <div class="col-md-9">

                                            <input type="text"  class="form-control" name="direccion" required="">
                                        </div>




                                        <br>
                                        <br>

                                        <div class="col-md-12">
                                            <br>
                                            <div class="panel panel-green">
                                                <br>


                                                <label class="col-md-2 control-label">DUI:</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="dui" id="dui" placeholder="99999999-9" required="">
                                                </div>



                                                <label class="col-md-1 control-label">NIT:</label>
                                                <div class="col-md-3">

                                                    <input type="text"  class="form-control" name="nit" id="nit" placeholder="9999-999999-999-9" required="">
                                                </div>

                                                <label class="col-md-1 control-label">Telefono:</label>
                                                <div class="col-md-2">

                                                    <input type="text" class="form-control" name="telefono" id="telefono"  placeholder="9999-9999" required="">
                                                </div>


                                                <br>
                                                <br>

                                            </div>


                                        </div>
                                         <div class="form-group" align="center" >
                                    <div class="col-md-12">
                                        <br>
                                        <button type="submit" class="btn btn-outline btn-success btn-lg btn-block" name="btnGuardar">Guardar Proveedor</button>
                                    </div>
                                </div>
                                    </form>
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
            
            
              <div class="col-md-12">
                <br>
                <!-- Advanced Tables -->
                <div class="panel panel-green">
                    <div class="panel-heading" align="center">
                        PROVEEDORES REGISTRADOS
                    </div>
                    <div class="panel-body" align="center">
                        <div class="table-responsive" align="center">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="50%">
                                        <div align="right">
                                            <form method="post" action="" enctype="multipart/form-data" name="form1" id="form1">
                                                <div class="input-group">

                                                   
                                                   
                                                    <td width="20%">

                                                        <input type="text" class="redondeado" id="buscador" onkeyup="myFunction()" placeholder="Buscar..">
                                                 </td>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br>                           
                            <table id="tabla"  class="table table-striped table-bordered table-hover table-condensed table-striped" style="font-size:12px">
                                <thead>
                                    <tr>
                                        <th>PROVEEDOR</th>
                                        <th>CONTACTO</th>
                                        <th>DUI</th>                                           
                                        <th>NIT</th>
                                       
                                        <th>DIRECCIÓN</th>
                                        <th>TELEFONO</th>                                          
                                    </tr>
                                </thead>
                                <tbody class="buscar">
                                    <?php
                                    $sacar = mysqli_query($conexion, "SELECT * FROM proveedor");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['idproveedor'];
                                        $proveedor = $fila['proveedor'];
                                        $contacto = $fila['contacto'];
                                        $dui = $fila['dui'];
                                        $nit = $fila['nit'];
                                        $direccion = $fila['direccion'];
                                        $telefono = $fila['telefono'];
                                        
                                        ?>


                                        <tr>
                                            <td><?php echo $proveedor; ?></td>
                                            <td><?php echo $contacto; ?></td>
                                            <td><?php echo $dui; ?></td>
                                            <td><?php echo $nit; ?></td>
                                            <td><?php echo $direccion; ?></td>
                                            <td><?php echo $telefono; ?></td>
                                            <td class="center">
                                                <a href="modificarProveedor.php?ir=<?php echo $modificar; ?>"class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                            </td>



                                        <?php } ?>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                          <button class="btn btn-warning btn-circle btn-lg"><i class="fa fa-print fa-2"></i></button>
                    </div>
                    
                </div>
            </div>


            <?php
            if (isset($_REQUEST['btnGuardar'])) {
                include_once '../conexion/php_conexion.php';

                $proveedor = $_REQUEST['proveedor'];
                $contacto = $_REQUEST['contacto'];
                $direccion = $_REQUEST['direccion'];
                $dui = $_REQUEST['dui'];
                $nit = $_REQUEST['nit'];
                $telefono = $_REQUEST['telefono'];

                $estado = "s";


                mysqli_query($conexion, "INSERT INTO proveedor(proveedor,contacto,direccion,dui,nit,telefono,estado) VALUES('$proveedor','$contacto','$direccion','$dui','$nit','$telefono','$estado')");
            }
            ?>


            <script type="text/javascript">
                $("#telefono").mask("0000-0000");
                $("#nit").mask("0000-000000-000-0");
                $("#dui").mask("00000000-0");

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


<script>
$(document).ready(function(){
  $("#buscador").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
