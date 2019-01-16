<?php
include_once '../conexion/php_conexion.php';
 $arti=$_GET['del'];
  mysqli_query($conexion, "DELETE FROM clientcred_tmp WHERE id_cliente ='$arti'");
  echo "<script>
          location.href ='credito.php';
        </script>";

?>