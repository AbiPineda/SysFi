
 <?php
 
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
    include_once '../conexion/php_conexion.php'; 
    include_once '../correlativos/Conexion.php';
    include_once '../correlativos/correlativos.php';
    include_once '../modelo/departamento.php';
    include_once '../modelo/clasificacion.php';
    include_once '../modelo/tipo_activo.php';
    include_once '../modelo/encargado.php';

 Conexion::abrir_conexion();

if (isset($_REQUEST['btnGuardar'])) {
    $institucion = $_REQUEST['institucion'];
    $departamento = $_REQUEST['departamento'];
    $tipo_activo = $_REQUEST['tipo'];
    $encargado = $_REQUEST['encargado'];
    $meses = $_REQUEST['tiempo'];
    $observaciones = $_REQUEST['observacion'];
    $fecha = $_REQUEST['fecha'];
    $descripcion  = $_REQUEST['descripcion'];
    $cantidad  = $_REQUEST['cantidad'];
    $precio =$_REQUEST['precio']; 
    
    
    $conexion = Conexion::obtener_conexion();
    
 
 
    $correlativo = correlativos::obtener_correlativo($conexion, 'activo');
    $sql = "INSERT INTO activo (idtipo,iddepartamento,idusuario,idencargado,correlativo, fecha_adquisicion,descripcion,estado,observaciones,precio,tiempo_uso) "
                                   . "VALUES ( '$tipo_activo', '$departamento',  '1', '$encargado', '$correlativo', '$fecha', '$descripcion', 'ACTIVO', '$observaciones','$precio','$meses');";
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();
 
    
    echo '<script>location.href ="registroActivo.php";</script>';
} else {
    $lista_clasificacion = correlativos::lista_clasificacion(Conexion::obtener_conexion());
    $lista_institucion = correlativos::lista_institucion(Conexion::obtener_conexion());
    $lista_depatamento = correlativos::lista_departamento(Conexion::obtener_conexion());
    $lista_tipo = correlativos::lista_tipo(Conexion::obtener_conexion());
    $lista_encargado = correlativos::lista_encargado(Conexion::obtener_conexion());
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
                             Registrar Activo Fijo
                        </div>
                        <div class="panel-body">
             <div class="col-md-8">
			 <div class="alert alert-default" align="center">                           
                            <form name="form2" action="" method="post">
                                    
                           </form>
                    </div>
                 
                </div>
               
               
            <div class="row">
                <div class="col-md-18" >
               
                              <div class="col-md-12">
                                    <form class="form-horizontal" role="form" method="GET" autocomplete="off" id="formulario">

                                        <label class="col-md-4 control-label">Nombre de Institución:</label>
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

                                    <label class="col-md-4 control-label">Departamento:</label>
                                            <div class="col-md-6">
                                              
                                      <select class="custom-select" name="departamento" id="departamento" style="width: 100%; height:36px;">
                                        <?php
                                        include_once '../conexion/php_conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from departamento");
                                        ?>
                                        <option>Seleccione:</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               $prove = $row['id_departamento'];
                                            echo '<option value=' . "$row[0]" . '>' . $row[2] . '</option>';
                                        }
                                       
                                        ?>
                                    </select>
                                    </div>

                                    <br>
                                    <br>

                                    <label class="col-md-4 control-label">Encargado:</label>
                                            <div class="col-md-6">
                                              
                                      <select class="custom-select" name="encargado" id="encargado" style="width: 100%; height:36px;">
                                        <?php
                                        include_once '../conexion/php_conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from encargado");
                                        ?>
                                        <option>Seleccione:</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               $prove = $row['id_encargado'];
                                            echo '<option value=' . "$row[0]" . '>' . $row[1] . '>' . $row[2] . '</option>';
                                        }
                                       
                                        ?>
                                    </select>
                                    </div>

                                     <br>
                                    <br>

                                    <label class="col-md-4 control-label">Tipo de Activo:</label>
                                            <div class="col-md-6">
                                              
                                      <select class="custom-select" name="tipo" id="tipo" style="width: 100%; height:36px;">
                                        <?php
                                        include_once '../conexion/php_conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from tipo_activo");
                                        ?>
                                        <option>Seleccione:</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               $prove = $row['id_tipo'];
                                            echo '<option value=' . "$row[0]" . '>' . $row[1] . '</option>';
                                        }
                                       
                                        ?>
                                    </select>
                                    </div>

                                     <div class="col-md-12">
                                        <br>
                                        <div class="panel panel-green">
                                            

<br>
                                            <label class="col-md-3 control-label">Fecha de Adquisición:</label>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="fecha" required="">
                                            </div>

                                            <label class="col-md-2 control-label">Tiempo de Uso:</label>
                                            <div class="col-md-2">
                                                <input type="number" min="1" class="form-control" name="tiempo" placeholder="*Meses" required="">
                                            </div>
                                            <br>
                                            <br>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <div class="panel panel-green">
                                            <br>
                                            

                                            <label class="col-md-1 control-label">Cantidad:</label>
                                            <div class="col-md-2">
                                                <input type="number" min="1" class="form-control" name="cantidad" placeholder="*Unidad" required="">
                                            </div>

                                            <label class="col-md-1 control-label">Precio:</label>
                                            <div class="col-md-2">
                                                <input type="number" min="1" class="form-control" name="precio" placeholder="*Precio($)" required="">
                                            </div>

                                            <label class="col-md-2 control-label">Observación:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="observacion" placeholder="*Digite observación" required="">
                                            </div>

                                    
                                            <br>
                                             <br>
                                        
                                         </div>
                                            </div>

                                             <div class="col-md-12">
                                        <br>
                                        <div class="panel panel-green">
                                            <br>
                                            

                                            <label class="col-md-2 control-label">Descripción:</label>
                                            <div class="col-md-3">
                                              
                                               <textarea rows="2" cols="100" name="descripcion" form="formulario" placeholder="Digite descripcion del Activo"></textarea>
                                            </div>

                                    
                                            <br>
                                             <br>
                                             <br>
                                        
                                         </div>
                                        </div>
                                           
                                     
                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Activo</button>
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
 