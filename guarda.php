<?php 
	
	include("includes/conexion.php");


	

	if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	 	isset($_POST['direccion']) && !empty($_POST['direccion']) &&
	 	isset($_POST['ciudad']) && !empty($_POST['ciudad']) &&
		isset($_POST['estado']) && !empty($_POST['estado']) &&
		isset($_POST['nacimiento']) && !empty($_POST['nacimiento'])

		/*FALTA SEXO*/
		) 
	{
		
		$nombre 		= utf8_decode($_POST['nombre']);
		$direccion 		= utf8_decode($_POST['direccion']);
		$ciudad			= utf8_decode($_POST['ciudad']);
		$estado 		= utf8_decode($_POST['estado']);
		$cp 			= utf8_decode($_POST['cp']);
		$telefono		= utf8_decode($_POST['telefono']);
		$nacimiento 	= utf8_decode($_POST['nacimiento']);
		$email 			= utf8_decode($_POST['email']);
		$sangre			= utf8_decode($_POST['sangre']);



		$mysqli = mysqli_connect($host, $user, $pwd, $db);
		if (mysqli_connect_errno()) {
			echo "Falló la conexión:".mysqli_connect_error();
		}
		
		$sql = "INSERT INTO pacientes (nombre, direccion, ciudad, estado, codigo_postal,
        								 telefono, email, fecha_nac, sexo, tipo_sangre)
					VALUES('$nombre', '$direccion', '$ciudad', '$estado', '$cp', 
							'$telefono', '$email', '$nacimiento', 'M', '$sangre');";
		
		
		if( mysqli_query($mysqli, $sql)){
			echo "Inserción realizada".mysqli_connect_error();
		}else{

			echo "Error".mysqli_error($mysqli);
		}
		
		mysqli_close($mysqli);
/*		
		mysql_select_db($db,$con)or die("Error con BD: ".mysql_error());

        $sql = "INSERT INTO pacientes (nombre, direccion, ciudad, estado, codigo_postal,
        								 telefono, tipo_sangre, fecha_nac, sexo)
					values('$nombre', '$direccion', '$ciudad', '$estado', '$cp', 
							'$telefono', '$nacimiento', '$email', 'M');"
	 	$res_query = mysqli_query($con, $sql) or die("No se insertaron");
	 	if ($res_query != null) {
	 		echo "Datos insertados";
	 		mysqli_close
	 	}
*/
	}
	else{
		echo "orror";
			
	}

?>