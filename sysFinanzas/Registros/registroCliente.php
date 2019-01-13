
 <?php
 
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
    ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<head>
    <style>
       /* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

input#miArchivo{
  color: transparent;
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
                             Registrar Cliente
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
                                            <div class="col-md-11">
                                                <input type="text" class="form-control" name="nombreCliente" onkeypress="return soloLetras(event);" id="fnamep" required="">
                                            </div>

                                            <br>
                                            <br>
                                            <br>
                                            <label class="col-md-1 control-label">Dirección:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="dir" required="">
                                            </div>


                                            <label class="col-md-1 control-label">DUI:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dui" id="dui" placeholder="99999999-9" required="">
                                            </div>



                                            <label class="col-md-1 control-label">Telefono:</label>
                                            <div class="col-md-2">

                                                <input type="text" class="form-control" name="tel" id="telefono"  placeholder="9999-9999" required="">
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <div class="panel panel-green">
                                                    <br>
                                                    <div class="col-md-2">
                                                        <label class="col-md-1 control-label">Presentó:</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="container" style=>Constancia de Salario
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        
                                                        <div class="col-md-1">
                                                        <div class="form-group">
                                                          
                                                            <div class="input-group">

                                                                <input name="imagenConstancia" type="file" onChange="ver(form.file.value)" required accept="image/jpg,image/png,image/jpeg"> 
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->

                                                    </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="container">Remesa Familiar
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <div class="col-md-1">
                                                        <div class="form-group">
                                                          
                                                            <div class="input-group">

                                                                <input name="imagenRemesa" type="file" onChange="ver(form.file.value)" required accept="image/jpg,image/png,image/jpeg"> 
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->

                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="container">Recibo de Luz
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                          
                                                            <div class="input-group">

                                                                <input name="imagenRecibo" type="file" onChange="ver(form.file.value)" required accept="image/jpg,image/png,image/jpeg"> 
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->

                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                <div class="panel panel-green">


                                                    <br>
                                                    <label class="col-md-3 control-label">Referencias Personales:</label>
                                                    <br>
                                                    <br>

                                                    <label class="col-md-3 control-label">Nombre Completo:</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="nombreR1" placeholder="Ej. Juana Maria Lopéz Arias" required="">
                                                    </div>
                                                    
                                                    <label class="col-md-1 control-label">Telefono:</label>
                                                    <div class="col-md-2">

                                                        <input type="text" class="form-control" name="telefonoRef1" id="telefonoRef1"  placeholder="9999-9999" required="">
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <label class="col-md-3 control-label">Lugar de Trabajo:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="trabajoR1" placeholder="Ej. Ministerio de Educación, San Vicente" required="">
                                                    </div>
                                                    <br>
                                                    <br>
                                                     <br>
                                                      <br>
                                                    <label class="col-md-3 control-label">Nombre Completo:</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="nombreR2" placeholder="Ej. Juana Maria Lopéz Arias" required="">
                                                    </div>
                                                    
                                                    <label class="col-md-1 control-label">Telefono:</label>
                                                    <div class="col-md-2">

                                                        <input type="text" class="form-control" name="telefonoRef2" id="telefonoRef2"  placeholder="9999-9999" required="">
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <label class="col-md-3 control-label">Lugar de Trabajo:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="trabajoR2" placeholder="Ej. Ministerio de Educación, San Vicente" required="">
                                                    </div>
                                 
                                                    <br>
                                                    <br>

                                                </div>
                                            </div>



                                            <div class="form-group" align="center" >
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Cliente</button>
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

                         if (isset($_REQUEST['btnGuardar'])) {
                             include_once '../conexion/php_conexion.php';

                             $nombre = $_REQUEST['nombreCliente'];
                             $direccion = $_REQUEST['dir'];
                             $dui = $_REQUEST['dui'];
                             $telefono = $_REQUEST['tel'];
                             
                              $imagenC = addslashes(file_get_contents($_FILES['imagenConstancia']['tmp_name']));
                              $imagenR = addslashes(file_get_contents($_FILES['imagenRemesa']['tmp_name']));
                              $imagenRec = addslashes(file_get_contents($_FILES['imagenRecibo']['tmp_name']));

                              $nombreR1 = $_REQUEST['nombreR1'];
                              $telefonoRef1 = $_REQUEST['telefonoRef1'];
                              $trabajoR1 = $_REQUEST['trabajoR1'];

                              $nombreR2 = $_REQUEST['nombreR2'];
                              $telefonoRef2 = $_REQUEST['telefonoRef2'];
                              $trabajoR2 = $_REQUEST['trabajoR2'];



                             mysqli_query($conexion, "INSERT INTO tb_cliente(nombre_cliente,dir_cliente,dui,tel) VALUES('$nombre','$direccion','$dui','$telefono')");
                         
                              $sacar = mysqli_query($conexion, "SELECT* FROM tb_cliente");
                                            while ($fila = mysqli_fetch_array($sacar)) {

                                                //sacando id de cliente
                                                $id = $fila['id_cliente'];
                                                }
                                                
                                                mysqli_query($conexion, "INSERT INTO documentos(constancia,remesa,recibo,idcliente) VALUES('$imagenC','$imagenR','$imagenRec','$id')");

                                                mysqli_query($conexion, "INSERT INTO referencias(nombre1,telefono1,direccion1,nombre2,telefono2,direccion2,idcliente) VALUES('$nombreR1','$telefonoRef1','$trabajoR1','$nombreR2','$telefonoRef2','$trabajoR2','$id')");
                         
                         }
                         ?>

                         <script type="text/javascript">
                            $("#telefono").mask("0000-0000");
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
 