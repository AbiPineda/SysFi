
 <?php
 
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
    include_once '../conexion/php_conexion.php';
    ?>
    <!-- Inicio del contenido-->
               <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de clientes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <button onclick="imprimir();" class="btn btn-default"><i class=" fa fa-print "></i> Imprimir</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="imprimeme">
                            
                        
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>DUI</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                         <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="buscar">
                                     <?php
                                $sacar1 = mysqli_query($conexion, "SELECT * FROM tb_cliente");
                                    while ($fila = mysqli_fetch_array($sacar1)) {
                                        $id=$fila['id_cliente'];
                                        $nom=$fila['nombre_cliente'];  
                                        $dui=$fila['dui'];
                                        $telefono=$fila['tel'];  
                                        $direccion=$fila['dir_cliente']; 
                                
                                ?>   

                                 <tr>
                
                <th data-title="Released"><?php echo $nom; ?></th>
                <td data-title="Released"><?php echo $dui; ?></td>
                <td data-title="Studio"><?php echo $telefono; ?></td>
                 <td data-title="Studio"><?php echo $direccion; ?></td>
                <td class="text"><a class="btn btn-success fa fa-edit">Modificar</a>
        </td>
              
               
                </td>

       <?php  }?>
      
      </tr>                             
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
        </div>
        <!-- /Fin del contenido -->

<?php

include_once '../Plantilla/inferior.php';
?>

<script>
        function imprimir(){
          var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
          var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
          ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
          ventana.document.close();  //cerramos el documento
          ventana.print();  //imprimimos la ventana
          ventana.close();  //cerramos la ventana
        }
    </script>
 