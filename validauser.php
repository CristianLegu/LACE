<?php 
  include("includes/conexion.php");
 $con = mysqli_connect($host, $user, $pwd, $db);
          if (mysqli_connect_errno()) {
            echo "Falló la conexión:".mysqli_connect_error();
          }
$password = 'hola';

          $sql = "SELECT *
                  FROM usuarios
                  WHERE n_user = '$Usuario' AND contrasena = '$password'" ;

         $query  = mysqli_query($con, $sql);
         $fila   = mysqli_fetch_array($query, MYSQLI_ASSOC);
       echo $fila['n_user'];
