
 <?php
 
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
    ?>
        <!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
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
                            <form name="form2" action="" method="post">
                                    
                           </form>
                    </div>
                 
                </div>
               
               
            <div class="row">
                <div class="col-md-12" >
               
                              <div class="col-md-14">
                                    <form class="form-horizontal" role="form">

                                        
                                            <label class="col-md-1 control-label">Código:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="codigo">
                                            </div>

                                            <label class="col-md-1 control-label">Nombre:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>

                                        <br>
                                            <br>
                                            
                                            <br>
                                            <label class="col-md-1 control-label">Categoria:</label>
                                            <div class="col-md-2">
                                              
                                      <select class="custom-select" name="categoria" id="categoria" style="width: 100%; height:36px;">
                                        <?php
                                        include_once '../conexion/php_conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from categoria");
                                        ?>
                                        <option>Categorias:</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               $prove = $row['idcategoria'];
                                            echo '<option value=' . "$row[0]" . '>' . $row[1] . '</option>';
                                        }
                                       
                                        ?>
                                    </select>
                                    </div>
                                        
                                         <label class="col-md-1 control-label">Marca:</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="marca">
                                            </div>

                                            <label class="col-md-1 control-label">Proveedor:</label>
                                            <div class="col-md-2">
                                              
                                      <select class="custom-select" name="proveedor" id="proveedor" style="width: 100%; height:36px;">
                                        <?php
                                        include_once '../conexion/php_conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from proveedor");
                                        ?>
                                        <option>Seleccione:</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               $prove = $row['idproveedor'];
                                            echo '<option value=' . "$row[0]" . '>' . $row[1] . '</option>';
                                        }
                                       
                                        ?>
                                    </select>
                                    </div>

                                       
                                        <div class="col-md-12">
                        <br>
                         <div class="panel panel-green">
                         <br>

                                         
                                        

                                           <label class="col-md-2 control-label">Cantidad:</label>
                                            <div class="col-md-2">
                                        <input type="number" min="0" class="form-control" name="cantidad">
                                            </div>

                                             <label class="col-md-2 control-label">Valor:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="valor">
                                            </div>

                                            <br>
                                            <br>
                                            <br>

                                              <label class="col-md-2 control-label">Stock Minimo:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="minimo">
                                            </div>
                                             <label class="col-md-2 control-label">Precio de Venta:</label>
                                            <div class="col-md-2">
                                                
                                                <input type="number" min="0" class="form-control" name="pv">
                                            </div>
                             
                          <br>
                           <br>
                            
                         </div>
                       
                                           
                                            </div>
                                            </div>
                                           
                                      

                                    

                                        <div class="form-group" align="center" >
                                            <div class="col-md-12">
                                            <br>
                                <button type="submit" class="btn btn-primary btn-lg" name="btnGuardar">Guardar Articulo</button>
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

    $codigo = $_REQUEST['codigo'];
    $nombre = $_REQUEST['nombre'];
    $marca = $_REQUEST['marca'];
    $cantidad = $_REQUEST['cantidad'];
    $valor = $_REQUEST['valor'];
   $proveedor= $_REQUEST['proveedor'];
    $categoria = $_REQUEST['categoria'];
     $minimo = $_REQUEST['minimo'];
      
       $pv= $_REQUEST['pv'];

      
      
   $estado = "s";
  
   
    mysqli_query($conexion, "INSERT INTO articulos(codigo,nombre,cantidad,valor,marca,estado,idproveedor,idcategoria) VALUES('$codigo','$nombre','$cantidad','$valor','$marca','$estado','$proveedor','$categoria')");

    $sacar = mysqli_query($conexion, "SELECT * from articulos");
            while ($fila = mysqli_fetch_array($sacar)) {  
                 $id=$fila['idarticulos'];  
                } 
     
      mysqli_query($conexion, "INSERT INTO inventario(id_articulos,stock,stockMinimo,pv) VALUES('$id','$cantidad','$minimo','$pv')");

 }
?>

<?php

include_once '../Plantilla/inferior.php';
?>
 