<?php

include("includes/encript.php");

if($_GET)
{	
//recibo la url la decodifico y la dejo en la variable $_GET
decode_get2($_SERVER["REQUEST_URI"]); 
//ya puedo hacer uso de la variable $_GET
//Ejemplos
// imprimo la variable $_GET

echo "iduser = ". $_GET['u'];

}
if(isset($_GET['u'])){

$id = $_GET['u'];
include("includes/conexion.php");
$con = mysqli_connect($host, $user, $pwd, $db);

			if (mysqli_connect_errno()) {
    		echo "Falló la conexión: ".mysqli_connect_error();
        	}
 $sql = "SELECT
                   u.n_user,
                   u.email,
                   r.respuscol
                  FROM usuarios u
                  join respus r on u.idusuarios = r.id
                  where u.idusuarios = '$id'" ;
          $query = $con -> query($sql);

while ($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)){
         $correo = $fila['email'];
         $user = $fila['n_user'];
         $pass = $fila['respuscol'];
         echo "correo: ".$correo."usuario: ".$user."contraseña".$pass;

/*require_once('includes/AttachMailer.php'); 

     while ($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)){
         $correo = $fila['email'];
         $user = $fila['n_user'];
         $pass = $fila['contrasena'];
    $mailer = new AttachMailer("administracion@lace.com.mx", $correo, "Recuperación de contraseña LACE",
    $msj."\n   Usuario ".$user." Contraseña: ".$pass);
    $mailer->send() ? "Enviado": "Problema al enviar";
     }
       mysqli_close($con);*/



}
}
?>