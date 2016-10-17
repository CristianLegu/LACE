<?php
	include("includes/conexion.php");
	session_start();
	if(isset($_SESSION['valueF'])){
		 $sesion = $_SESSION['valueF'];
		 //echo $sesion;
	//	 $idup = $_SESSION['idup'];
	}



switch ($sesion) {
	case 'BIOMETRIA':
	
 		if (isset($_POST['nombre_m']) && !empty($_POST['nombre_m']) &&
	 		isset($_POST['domicilio_m']) && !empty($_POST['domicilio_m']) &&
	 		isset($_POST['telefono_m']) && !empty($_POST['telefono_m']))
		{
			$nombre   = utf8_decode($_POST['nombre_m']);
			$direccion   = utf8_decode($_POST['domicilio_m']);
			$ciudad   = utf8_decode($_POST['ciudad_m']);
			$estado   = utf8_decode($_POST['estado_m']);
			$telefono  = utf8_decode($_POST['telefono_m']);
			$nombre_hosp  = utf8_decode($_POST['nombre_h']);
			$domicilio_hos = utf8_decode($_POST['domicilio_h']);

			$mysqli = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
			 echo "Falló la conexión:".mysqli_connect_error();
			}

			$sql = "INSERT INTO medicos (nombre, domicilio_medi, ciudad_medi, estado_medi,
							telefono_medi, hospital, direccion_hospital)
				 VALUES('$nombre', '$direccion', '$ciudad', '$estado',
					 '$telefono', '$nombre_hosp', '$domicilio_hos');";

			if( mysqli_query($mysqli, $sql)){

			}else{
			 echo "Error ".mysqli_error($mysqli);
			}

			mysqli_close($mysqli);

			include("includes/alert_me.html");
		}
		else
		{
			echo "Error";
		}

		break;



}
 unset ($_SESSION['valueF']);
 unset ($_SESSION['idup']);

?>