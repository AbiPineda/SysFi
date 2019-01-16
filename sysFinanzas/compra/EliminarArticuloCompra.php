<?php
include_once '../conexion/php_conexion.php';
 $arti=$_GET['del'];
  mysqli_query($conexion, "DELETE FROM compra_tmp WHERE id_articulo ='$arti'");
  echo "<script>
          location.href ='compra.php';
        </script>";

?>