<?php
include_once '../conexion/php_conexion.php';
 $arti=$_GET['del'];
  mysqli_query($conexion, "DELETE FROM ventac_temp WHERE id_articulo ='$arti'");
  echo "<script>
          location.href ='credito.php';
        </script>";

?>