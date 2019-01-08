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
                             ACTIVOS
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
                            institucion.correlativo as coInstitucion,
                            departamento.correlativo as coDepartamento,
                            clasificacion.correlativo as coClasificacion,
                            tipo_activo.correlativo as CoTipo,
                            activo.correlativo as coActivo,
                            tipo_activo.nombre as nombreActivo,
                            activo.idactivo
                           
                            FROM
                            activo
                            INNER JOIN departamento ON activo.iddepartamento = departamento.id_departamento
                            INNER JOIN institucion ON departamento.idinstitucion = institucion.idInstitucion
                            INNER JOIN tipo_activo ON activo.idtipo = tipo_activo.id_tipo
                            INNER JOIN clasificacion ON tipo_activo.idclasificacion = clasificacion.id_clasificacion
                            INNER JOIN encargado ON activo.idencargado = encargado.id_encargado WHERE activo.idactivo='$modi'");
                                   while ($fila = mysqli_fetch_array($sacar)) {
                                                      $modificar=$fila['idactivo'];
                                                      $coInstitucion=$fila['coInstitucion'];
                                                      $coDepartamento=$fila['coDepartamento'];
                                                      $coClasificacion=$fila['coClasificacion'];
                                                      $CoTipo=$fila['CoTipo'];
                                                      $coActivo=$fila['coActivo'];
                                                      $nombreActivo=$fila['nombreActivo']; 

                                                       ?>
                                            <label class="col-md-1 control-label">Activo:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="cliente" value="<?php echo $nombreActivo; ?>" disabled>
                                            </div>

                                            <label class="col-md-1 control-label">Correlativo:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="dui" value="<?php echo $coInstitucion . " " . $coDepartamento . " " . $coClasificacion . " " . $CoTipo . " " . $coActivo;?>" disabled>
                                            </div>  

                          <br>
                           <br>
                            
                         </div>
                            <?php   }?>
                          <table id="tabla" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tipo de venta</th>
                                            <th>Fecha de credito</th>
                                            <th>Valor</th>
                                            <th>Interes</th>
                                            <th>Total de interes</th>
                                            <th>Cuota</th>
                                            <th>Historial</th> 
                                            <th>Abonar</th> 
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                      <?php
       
                         
       ?>


       <tr>
        
        

         
      
      </tr>
    </tbody>
  </table>
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <a href="lista.php"class="btn btn-warning btn-sm x3" ><i class="fa fa-arrow-circle-o-left"></i></a>
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
   include_once '../Plantilla/inferior.php';

?>