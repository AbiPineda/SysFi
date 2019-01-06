
 <?php
 
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


        <!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
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
                            <form name="form2" action="" method="post">
                                    
                           </form>
                    </div>
                 
                </div>
               
               
            <div class="row">
                <div class="col-md-12" >
               
                              <div class="col-md-12">
                                    <form class="form-horizontal" role="form" autocomplete="off">

                                        
                                            <label class="col-md-1 control-label">Nombre:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nombre" onkeypress="return soloLetras(event);" id="fnamep" required="">
                                            </div>
                                           

                                            <label class="col-md-1 control-label">Apellidos:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="apellidos" required="">
                                            </div>

                                        <br>
                                        <br>
                                       
                                            <label class="col-md-1 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" id="dui" placeholder="99999999-9" required="">
                                            </div>
                                        

                                       
                                            <label class="col-md-1 control-label">NIT:</label>
                                            <div class="col-md-4">
                                                
                                                <input type="text" class="form-control" name="nit" id="nit"  placeholder="9999-999999-999-9" required="">
                                            </div>
                                      

                                    

                                     
                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Encargado</button>
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
 