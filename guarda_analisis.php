<?php
	include("includes/conexion.php");
	session_start();
	if(isset($_SESSION['valueA'])){
		 $sesion = $_SESSION['valueA'];
		 echo $sesion;
	//	 $idup = $_SESSION['idup'];
	}



switch ($sesion) {
	case 'HECES':
	
 		/*if (isset($_POST['nombre_m']) && !empty($_POST['nombre_m']) &&
	 		isset($_POST['domicilio_m']) && !empty($_POST['domicilio_m']) &&
	 		isset($_POST['telefono_m']) && !empty($_POST['telefono_m']))
		{*/
			$color            = utf8_decode($_POST['color']);
			$consistencia     = utf8_decode($_POST['consistencia']);
			$moco             = utf8_decode($_POST['moco']);
			$pus              = utf8_decode($_POST['pus']);
			$sangre_fresca    = utf8_decode($_POST['sangre_fresca']);
			$para_pri_muestra = utf8_decode($_POST['para_pri_muestra']);
			$para_seg_muestra = utf8_decode($_POST['para_seg_muestra']);
			$idpacientes      = '1';
			$idmedicos        = '1';
			$mysqli = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
			 echo "Falló la conexión:".mysqli_connect_error();
			}

			$sql = "INSERT INTO heces (color, consistencia, moco, pus,
							sangre_fresca, para_pri_muestra, para_seg_muestra, idpacientes,
							idmedicos)
				 VALUES('$color', '$consistencia', '$moco', '$pus',
					 '$sangre_fresca', '$para_pri_muestra', '$para_seg_muestra'
					 , '$idpacientes' , '$idmedicos');";

			if( mysqli_query($mysqli, $sql)){

			}else{
			 echo "Error ".mysqli_error($mysqli);
			}

			mysqli_close($mysqli);

		//	include("includes/alert_analisis.html");
		/*}
		else
		{
			echo "Error";
		}*/

		break;



}
 unset ($_SESSION['valueF']);
 unset ($_SESSION['idup']);

?>