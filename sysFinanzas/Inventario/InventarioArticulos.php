<?php
 include_once '../conexion/php_conexion.php';
    include_once '../Plantilla/encabezado.php';
    include_once '../Plantilla/menuLateral.php';
?>
<!-- Page Content CONTEDIDOOOOOOOOOOOOOOOOOOOOOOOO -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
          
           <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-green">
                        <div class="panel-heading">
                             INVENTARIO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                              <table width="100%" border="0">
                                  <tr>
                                    <td width="50%">
                                        <div align="right">
                                        <form method="post" action="" enctype="multipart/form-data" name="form1" id="form1">
                                          <div class="input-group">

                                          	</datalist>
                                            </td>
                                            <td width="20%">
            
                                      <div class="wrap">
              <script src="./js/jquery.min.js" ></script>
            <script src="./js/buscaresc.js"></script>
         <div class="search">
            <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que está buscando?">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
      </div>
                                          </div>
                                        </form>
                                        </div>
                                    </td>
                                  </tr>
                                </table><br>                           
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>CODIGO</th>
                                            <th>ARTICULO</th>
                                            <th>PRECIO DE VENTA</th>                                           
                                            <th>STOCK</th>
                                            <th></th>                                          
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                    	<?php
        $sacar = mysqli_query($conexion, "SELECT
articulos.codigo,
articulos.nombre,
inventario.pv,
inventario.stock
FROM
inventario
INNER JOIN articulos ON inventario.id_articulos = articulos.idarticulos");
            while ($fila = mysqli_fetch_array($sacar)) {
                 
                 $codigo=$fila['codigo'];  
                 $nombre=$fila['nombre'];  
                 $pv=$fila['pv'];  
                 $stock=$fila['stock'];  
       ?>
       <tr>
        <th scope="row"><?php echo $codigo;?></th>
        <td data-title="Released"><?php echo $nombre;?></td>
        <td data-title="Studio"><?php echo $pv;?></td>
        <td data-title="Worldwide Gross"><?php echo $stock;?></td>
        </td>

       <?php  }?>
      
      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

                            




<?php
include_once '../Plantilla/inferior.php';
?>
 