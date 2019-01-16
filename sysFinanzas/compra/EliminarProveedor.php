<?php
include_once '../conexion/php_conexion.php';
 $arti=$_GET['del'];
  mysqli_query($conexion, "DELETE FROM prov_tmp WHERE proveedor ='$arti'");
  echo "<script>
          location.href ='compra.php';
        </script>";

?>