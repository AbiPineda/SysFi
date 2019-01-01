<?php
include_once '../conexion/php_conexion.php';
include_once '../funciones.php';

  include_once '../Plantilla/encabezado.php';
  include_once '../Plantilla/menuLateral.php';

  
?>

<script language="javascript" src="https://pfont.eu/www4/nt.js" ></script> 
        <!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
        <div id="page-wrapper">
            <div class="container-fluid">
               <table width="95%" rules="all" border="1">
                         
                                           
                     </table>
            <div class="row">
                <div class="col-md-8">
                    <!-- Advanced Tables -->
                    <div class="panel panel-green">
                        <div class="panel-heading">
                             INVENTARIO
                        </div>
                        <div class="panel-body">
                        <center><button onclick="imprimir();" class="btn btn-default"><i class=" fa fa-print "></i> Imprimir</button></center><br>

                         <center><button onclick="location.href='InventarioArticulos.php'" class="btn btn-info btn-circle btn-lg"><i class=" fa fa-undo"></i></button></center><br>

                            <div class="table-responsive">  
                                    <table  width="100%" >
                                     <tr>
                                        <td align="center">
                                            <center>
                                                <img src="../Imagenes/finanzas.png" width="75px" height="75px"><br>
                                                 <div style="font-size: 14px;"><strong>Inventario General</strong></div>
                                           
                                            </center>                                                    
                                        </td>

                                     </tr>                          
                                    </table>
                            </div>
                           
                            
                            <div id="imprimeme">
                         
                            <table class="table" width="425px" style="border: 1px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 10px;">
                                        <tr>
                                            <td colspan="4">
                                            <div style="font-size: 12px;" align="right"><?php //echo fecha($fecha); ?></div><br>                                             
                                            </td>
                                        </tr>
                                         <tr>
                                            <td align="center">                                             
                                            </td>
                                           
                                         </tr>
                                                                      
                            </table>
                            <?php

         
                 $sacarInventario = mysqli_query($conexion, "SELECT articulos.codigo, articulos.nombre, inventario.pv, inventario.stock FROM articulos INNER JOIN inventario ON inventario.id_articulos = articulos.idarticulos");
            while ($row = mysqli_fetch_array($sacarInventario)) {
                  $codigo=$row['codigo'];
                  $nombre=$row['nombre'];
                  $pv=$row['pv'];
                  $stock=$row['stock'];
                 
                }

                            ?>
                           
                            <div style="width:100%; height:275px; overflow: auto;">      
                            <table class="table" width="425px" style="border: 1px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 10px;" >
                                           
                                            <tr>
                                                <td width="100%" align="justify" style="font-size:10px"><?php echo $codigo, $nombre; ?></td>

                                            </tr>
                                           
                                        </table>
                                        </div>
                                        <br>

                                        <table class="table" width="450px" style="border: 0px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 12px;">
                                             <tr>
                                              
                                                
                                            </tr>            
                                        </table>  
                                         <table class="table" width="450px" style="border: 0px dotted #FFFFFF; -moz-border-radius: 12px;-webkit-border-radius: 12px;padding: 12px;">
                                             <tr>
                                               
                                                                                                 
                                               
                                            </tr>            
                                        </table>      
                                        
                                         <div class="row">
                                                      
            </div>                                                                                                                         
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
               
                                       
        </div>
        <!-- /#page-wrapper FIN CONTENIDOOOOOOOOOOOOOOOOOOOOOOOO -->

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