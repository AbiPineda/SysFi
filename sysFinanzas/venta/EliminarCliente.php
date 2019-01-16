<?php
include_once '../conexion/php_conexion.php';
 $arti=$_GET['del'];
  mysqli_query($conexion, "DELETE FROM cliente_temp WHERE id_cliente ='$arti'");
  echo "<script>
          location.href ='Vis_ventas.php';
        </script>";

?>