
 <?php
 
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
    include_once '../conexion/php_conexion.php'; 
    include_once '../correlativos/Conexion.php';
    include_once '../correlativos/correlativos.php';
    include_once '../modelo/departamento.php';

    Conexion::abrir_conexion();

if (isset($_REQUEST['btnGuardar'])) {
    $nombre = $_REQUEST['departamento'];
    $institucion = $_REQUEST['institucion'];
    $conexion = Conexion::obtener_conexion();
    $correlativo = correlativos::obtener_correlativo($conexion, "departamento where idinstitucion = '$institucion'");
    
    $sql = "INSERT INTO departamento (nombre,correlativo,idinstitucion) VALUES ('$nombre', '$correlativo','$institucion')";
     $sentencia = $conexion->prepare($sql);
     $resultado = $sentencia->execute();
     echo '<script>location.href ="registroDepartamento.php";</script>';
     
     
}else{
$lista_institucion = correlativos::lista_institucion(Conexion::obtener_conexion());
?>
       
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
                             Registrar Departamento
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
                                    <form class="form-horizontal" role="form" action="registroDepartamento.php" method="GET" autocomplete="off">

                                        <label class="col-md-3 control-label">Nombre de Institución:</label>
                                            <div class="col-md-6">
                                              
                                      <select class="custom-select" name="institucion" id="institucion" style="width: 100%; height:36px;">
                                        <?php
                                        include_once '../conexion/php_conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from institucion");
                                        ?>
                                        <option>Seleccione:</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               $prove = $row['idinstitucion'];
                                            echo '<option value=' . "$row[0]" . '>' . $row[1] . '</option>';
                                        }
                                       
                                        ?>
                                    </select>
                                    </div>
                                              <br>
                                              <br>
                                            <label class="col-md-3 control-label">Nombre de Departamento:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="departamento" required="">
                                            </div>

                                        <br>
                                        

                                     
                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Departamento</button>
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
 