<?php

 
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//conectar a la base de datos 
$conexion=mysqli_connect("localhost", "root", "", "bd_finanzas");
$consulta="SELECT * FROM usuario WHERE usuario = '$usuario' && contrasena = '$clave'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);


foreach ($conexion->query($consulta) as $row) {
        $tipo = $row["tipoUsuario"];
    }
   
if ($filas>0) {
            
        
        if ($tipo == 'administrador') { 
        /// lo redirecciona al index administraqdor
      
      header("location:../Inicio/index.php");  
        }
    }
else {
         
	header("location:../IniciarSesion/login.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>

