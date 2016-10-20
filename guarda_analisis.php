<?php
	include("includes/conexion.php");
	session_start();
	if(isset($_SESSION['valueA'])){
		 $sesion = $_SESSION['valueA'];
		
	//	 $idup = $_SESSION['idup'];
		 $idpacientes = $_SESSION['idpaciente'];
		// echo $idpacientes;
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
			$para_ter_muestra = utf8_decode($_POST['para_ter_muestra']);
			$idmedicos        = utf8_decode($_POST['idmedico']);
			$mysqli = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
			 echo "Falló la conexión:".mysqli_connect_error();
			}

			$sql = "INSERT INTO heces (color, consistencia, moco, pus,
							sangre_fresca, para_pri_muestra, para_seg_muestra, para_ter_muestra, idpacientes,
							idmedicos)
				 VALUES('$color', '$consistencia', '$moco', '$pus',
					 '$sangre_fresca', '$para_pri_muestra', '$para_seg_muestra', '$para_ter_muestra'
					 , '$idpacientes' , '$idmedicos');";

			if( mysqli_query($mysqli, $sql)){

			}else{
			 echo "Error ".mysqli_error($mysqli);
			}

			mysqli_close($mysqli);

			include("includes/alert_analisis.php");
		/*}
		else
		{
			echo "Error";
		}*/

		break;

case 'ORINA':
	
 		/*if (isset($_POST['nombre_m']) && !empty($_POST['nombre_m']) &&
	 		isset($_POST['domicilio_m']) && !empty($_POST['domicilio_m']) &&
	 		isset($_POST['telefono_m']) && !empty($_POST['telefono_m']))
		{*/
			
			$volumen     	 = utf8_decode($_POST['volumen']);
			$color       	 = utf8_decode($_POST['color']);
			$olor       	 = utf8_decode($_POST['olor']);
			$aspecto     	 = utf8_decode($_POST['aspecto']);
			$sedimiento  	 = utf8_decode($_POST['sedimiento']);
			$densidad    	 = utf8_decode($_POST['densidad']);
			$ph          	 = utf8_decode($_POST['ph']);
			$proteinas   	 = utf8_decode($_POST['proteinas']);
		    $glucosa     	 = utf8_decode($_POST['glucosa']);
	     	$cetona      	 = utf8_decode($_POST['cetona']);
			$billirrubina    = utf8_decode($_POST['billirrubina']);
			$sangre          = utf8_decode($_POST['sangre']);
			$nitritos        = utf8_decode($_POST['nitritos']);
			$urobilinogeno   = utf8_decode($_POST['urobilinogeno']);
			$solidos_totales = utf8_decode($_POST['solidos_totales']);
			$sedimientos     = utf8_decode($_POST['sedimientos']);
			$idmedicos       = utf8_decode($_POST['idmedico']);
			
			$mysqli = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
			 echo "Falló la conexión:".mysqli_connect_error();
			}

			$sql = "INSERT INTO orina (volumen, color, olor, aspecto, sedimiento,
							densidad, ph, proteinas, glucosa, cetona, billirrubina, sangre, nitritos, urobilinogeno, solidos_totales, sedimientos, idpacientes, idmedicos)
				 VALUES('$volumen', '$color', '$olor', '$aspecto', '$sedimiento',
					 '$densidad', '$ph', '$proteinas', '$glucosa'
					 , '$cetona' , '$billirrubina' , '$sangre' , '$nitritos' , '$urobilinogeno' ,       '$solidos_totales' , '$sedimientos' , '$idpacientes', '$idmedicos');";

			if( mysqli_query($mysqli, $sql)){

			}else{
			 echo "Error ".mysqli_error($mysqli);
			}

			mysqli_close($mysqli);

			include("includes/alert_analisis.php");
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