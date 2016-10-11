<?php
	include("includes/conexion.php");
	session_start();
	if(isset($_SESSION['guarda'])){
		 $Variable = $_SESSION['guarda'];
	}
		if ( $Variable == 'P' ) {

	if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	 	isset($_POST['direccion']) && !empty($_POST['direccion']) &&
	 	isset($_POST['rfc']) && !empty($_POST['rfc'])
		)
	{

		$nombre 	   	= utf8_decode($_POST['nombre']);
		$direccion 		= utf8_decode($_POST['direccion']);
		$telefono		  = utf8_decode($_POST['telefono']);
		$telefono2    = utf8_decode($_POST['telefono2']);
		$rfc			    = utf8_decode($_POST['rfc']);
		$web	       	= utf8_decode($_POST['web']);
		$email	        = utf8_decode($_POST['email']);


		$mysqli = mysqli_connect($host, $user, $pwd, $db);
		if (mysqli_connect_errno()) {
			echo "Falló la conexión:".mysqli_connect_error();
		}



		$sql = "INSERT INTO proveedores (nombre, direccion, telefono_uno, telefono_dos, rfc_prov,
        								 pag_web, e_mail)
					VALUES('$nombre', '$direccion', '$telefono', '$telefono2', '$rfc',
							'$web', '$email');";



		if( mysqli_query($mysqli, $sql)){
			//echo "Inserción realizada".mysqli_connect_error();
		}else{
			echo "Error ".mysqli_error($mysqli);
		}

		mysqli_close($mysqli);

		include("alert.php");

	}
	else{
		echo "Error";

	}
	}

	if ( $Variable == 'E' ) {

	if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['direccion']) && !empty($_POST['direccion']) &&
	isset($_POST['user']) && !empty($_POST['user']) &&
 isset($_POST['contraseña']) && !empty($_POST['contraseña'])
	)
	{

	$nombre 	   	= utf8_decode($_POST['nombre']);
	$direccion 		= utf8_decode($_POST['direccion']);
	$telefono 		= utf8_decode($_POST['telefono']);
	$user     	  = utf8_decode($_POST['user']);
	$contraseña   = utf8_decode($_POST['contraseña']);
	$email		    = utf8_decode($_POST['email']);


	$mysqli = mysqli_connect($host, $user, $pwd, $db);
	if (mysqli_connect_errno()) {
		echo "Falló la conexión:".mysqli_connect_error();
	}



	$sql = "INSERT INTO empleados (nombre, direccion, telefono, contraseña, n_user,
											e_mail)
				VALUES('$nombre', '$direccion', '$telefono', '$contraseña', '$user',
					'$email');";



	if( mysqli_query($mysqli, $sql)){
		//echo "Inserción realizada".mysqli_connect_error();
	}else{
		echo "Error ".mysqli_error($mysqli);
	}

	mysqli_close($mysqli);

	include("alert.html");

	}
	else{
	echo "Error";

	}
	}

if ( $Variable == 'M' ){
	echo 'M';
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
=======
	session_start();
		$sesion = $_SESSION['value'];

switch ($sesion) {
	case 'PA':
/*GUARDA PACIENTES*/
		if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
		 	isset($_POST['direccion']) && !empty($_POST['direccion']) &&
		 	isset($_POST['ciudad']) && !empty($_POST['ciudad']) &&
			isset($_POST['estado']) && !empty($_POST['estado']) &&
			isset($_POST['nacimiento']) && !empty($_POST['nacimiento'])
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

>>>>>>> origin/master

			if (isset($_POST['onoffswitch']) && !empty($_POST['onoffswitch']))
			{
				$sexo = "M";
			}
			else
			{
				$sexo = "F";
			}

			$sql = "INSERT INTO pacientes (nombre, direccion, ciudad, estado, codigo_postal,
	        								 telefono, email, fecha_nac, sexo, tipo_sangre)
						VALUES('$nombre', '$direccion', '$ciudad', '$estado', '$cp',
								'$telefono', '$email', '$nacimiento', '$sexo', '$sangre');";

			if( mysqli_query($mysqli, $sql)){

			}else{
				echo "Error ".mysqli_error($mysqli);
			}

			mysqli_close($mysqli);

			include("includes/alert_pa.html");

		}
		else
		{
			echo "Error";

		}

		session_destroy();
		break;

/*GUARDA MEDICOS*/
	case 'M':

<<<<<<< HEAD
/*VERIFICA EL CHECKED SI ES HOMBRE O MUJER, A PARTIR DE AHI SE GUARDA EN LA BD*/
		if (isset($_POST['onoffswitch']) && !empty($_POST['onoffswitch']))
=======
		if (isset($_POST['nombre_m']) && !empty($_POST['nombre_m']) &&
		 	isset($_POST['domicilio_m']) && !empty($_POST['domicilio_m']) &&
		 	isset($_POST['telefono_m']) && !empty($_POST['telefono_m'])
			)
>>>>>>> origin/master
		{
			$nombre 		= utf8_decode($_POST['nombre_m']);
			$direccion 		= utf8_decode($_POST['domicilio_m']);
			$ciudad			= utf8_decode($_POST['ciudad_m']);
			$estado 		= utf8_decode($_POST['estado_m']);
			$telefono		= utf8_decode($_POST['telefono_m']);
			$nombre_hosp 	= utf8_decode($_POST['nombre_h']);
			$domicilio_hos	= utf8_decode($_POST['domicilio_h']);

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
<<<<<<< HEAD

		$sql = "INSERT INTO pacientes (nombre, direccion, ciudad, estado, codigo_postal,
        								 telefono, email, fecha_nac, sexo, tipo_sangre)
					VALUES('$nombre', '$direccion', '$ciudad', '$estado', '$cp',
							'$telefono', '$email', '$nacimiento', '$sexo', '$sangre');";

			echo $nombre."-";
			echo $direccion."-";
			echo $ciudad."-";
			echo $estado."-";
			echo $cp."-";
			echo $telefono."-";
			echo $nacimiento."-";
			echo $email."-";
			echo $sexo."-";
			echo $sangre;
		/*
		if( mysqli_query($mysqli, $sql)){
			//echo "Inserción realizada".mysqli_connect_error();
		}else{
			echo "Error ".mysqli_error($mysqli);
		}
		*/
			echo "Error ";
		mysqli_close($mysqli);

		include("alert.html");

	}
	else{
		echo "Error";

	}
	}
=======

		session_destroy();
		break;
}


>>>>>>> origin/master

?>
