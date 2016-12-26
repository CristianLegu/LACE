<?php
	include("includes/conexion.php");
	session_start();
	if(isset($_SESSION['valueF'])){
		 $sesion = $_SESSION['valueF'];
	}



switch ($sesion) {
	case 'PROVEEDOR':
			if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
			isset($_POST['direccion']) && !empty($_POST['direccion']) &&
			isset($_POST['rfc']) && !empty($_POST['rfc'])
			)
			{
			$encontro=0;
			      
			$con = mysqli_connect($host, $user, $pwd, $db);
			                   
			                if (mysqli_connect_errno()) {
			    echo "Falló la conexión: ".mysqli_connect_error();
			             }
			            $nombre 	   	= utf8_decode($_POST['nombre']);
						$direccion 		= utf8_decode($_POST['direccion']);
						$telefono		= utf8_decode($_POST['telefono']);
						$telefono2      = utf8_decode($_POST['telefono2']);
						$rfc			= utf8_decode($_POST['rfc']);
						$web	       	= utf8_decode($_POST['web']);
						$email	        = utf8_decode($_POST['email']);
			            
          
         		 $sql = "SELECT nombre
                    FROM proveedores
                    WHERE nombre = '$nombre'" ;

                $query  = mysqli_query($con, $sql);
                while($fila = mysqli_fetch_array($query)){
    
                        $nom = $fila[0];           
                       if($nombre==$nom)
                       {
                        $encontro=1;
                       }
                  
                } 
                mysqli_close($con); 
    			if($encontro==1){
    
                   include("includes/alert_existe.php");	   
    			}              

				else{ 
			


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

				include("includes/alert.php");

				}
			}
			else{
				echo "Error";

			}
		break;

	case 'PROVEEDORUP':
			$con = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
    		echo "Falló la conexión: ".mysqli_connect_error();
        	}
        	$nombre 	   	= utf8_decode($_POST['nombre']);
			$direccion 		= utf8_decode($_POST['direccion']);
			$telefono		= utf8_decode($_POST['telefono']);
			$telefono2		= utf8_decode($_POST['telefono2']);
			$rfc_prov       = utf8_decode($_POST['rfc']);
			$pag_web    	= utf8_decode($_POST['web']);
		    $email	        = utf8_decode($_POST['email']);


		    	if (isset($_POST['nombre']) && !empty($_POST['nombre'])   &&
				isset($_POST['direccion']) && !empty($_POST['direccion']))
				{
					$mysqli = mysqli_connect($host, $user, $pwd, $db);
					if (mysqli_connect_errno()) {
						echo "Falló la conexión:".mysqli_connect_error();
					}
					$idup = $_SESSION['idup'];
				$sql = "UPDATE proveedores
								  set nombre 			= '$nombre', 
						 			  direccion			= '$direccion',
						 			  telefono_uno  	= '$telefono',
						 			  telefono_dos		= '$telefono2',
						 			  rfc_prov 		    = '$rfc_prov',
						 			  pag_web			= '$pag_web',
						 			  e_mail 		    = '$email'
		 									WHERE idproveedores = $idup;";
					if( mysqli_query($mysqli, $sql)){
						//echo "Inserción realizada".mysqli_connect_error();
					}else{
						echo "Error ".mysqli_error($mysqli);
					}
					mysqli_close($mysqli);

					include("includes/alert.php");

				}
				else{

				}
		break;

	case 'USUARIO':
			$encontro=0;
			$con = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
    		echo "Falló la conexión: ".mysqli_connect_error();
        	}
        	$nombre 	   	= utf8_decode($_POST['nombre']);
			$direccion 		= utf8_decode($_POST['direccion']);
			$telefono		= utf8_decode($_POST['telefono']);
			$usuario        = utf8_decode($_POST['user']);
			$pass        	= utf8_decode($_POST['contraseña']);
		    $email	        = utf8_decode($_POST['email']);

		    $sql = "SELECT n_user
                    FROM usuarios
                    WHERE n_user = '$usuario'";
            $query  = mysqli_query($con, $sql);
            while($fila = mysqli_fetch_array($query)){
            	$nom = $fila[0];           
                if($usuario==$nom){
					$encontro=1;
                }
            }
            mysqli_close($con); 

            if($encontro==1){
		   		include("includes/alert_existe.php");	   
		    }
		    else{
		    	if (isset($_POST['nombre']) && !empty($_POST['nombre'])   &&
				isset($_POST['direccion']) && !empty($_POST['direccion']) &&
				isset($_POST['user']) && !empty($_POST['user'])           &&
				isset($_POST['contraseña']) && !empty($_POST['contraseña']))
				{
					$mysqli = mysqli_connect($host, $user, $pwd, $db);
					if (mysqli_connect_errno()) {
						echo "Falló la conexión:".mysqli_connect_error();
					}
					
					$sql = "INSERT INTO respus (respuscol)
								VALUES('$pass');";

					if( mysqli_query($mysqli, $sql)){

						include("includes/password.php");
						$sql = "INSERT INTO usuarios (nombre, direccion, telefono, contrasena, n_user,
															 email)
								VALUES('$nombre', '$direccion', '$telefono', '$password', '$usuario',
										 '$email');";
						if( mysqli_query($mysqli, $sql)){
						include("includes/alert.php");
						}
						else{
							echo "Error ".mysqli_error($mysqli);
						}
						mysqli_close($mysqli);
						
					
					}

					else{
						echo "Error ".mysqli_error($mysqli);
					}

				}
				else{

				}
		    }
		break;

	case 'USUARIOUP':
			$con = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
    		echo "Falló la conexión: ".mysqli_connect_error();
        	}
        	$nombre 	   	= utf8_decode($_POST['nombre']);
			$direccion 		= utf8_decode($_POST['direccion']);
			$telefono		= utf8_decode($_POST['telefono']);
			$usuario        = utf8_decode($_POST['user']);
			$pass  	        = utf8_decode($_POST['contraseña']);
		    $email	        = utf8_decode($_POST['email']);


		    	if (isset($_POST['nombre']) && !empty($_POST['nombre'])   &&
				isset($_POST['direccion']) && !empty($_POST['direccion']) &&
				isset($_POST['user']) && !empty($_POST['user'])           &&
				isset($_POST['contraseña']) && !empty($_POST['contraseña']))
				{
					$mysqli = mysqli_connect($host, $user, $pwd, $db);
					if (mysqli_connect_errno()) {
						echo "Falló la conexión:".mysqli_connect_error();
					}

					
					include("includes/password.php");	  
					$idup = $_SESSION['idup'];
				    $sql = "UPDATE usuarios
								  set nombre 			= '$nombre', 
						 			  direccion			= '$direccion',
						 			  telefono  		= '$telefono',
						 			  contrasena 		= '$password',
						 			  n_user			= '$usuario',
						 			  email 		    = '$email'
		 							  WHERE idusuarios = $idup;";
					if( mysqli_query($mysqli, $sql)){
						//echo "Inserción realizada".mysqli_connect_error();
					}else{
						echo "Error ".mysqli_error($mysqli);
					}
					


						$sql1 = "UPDATE respus
								  set respuscol = '$pass'
						 			 
		 							  WHERE id = $idup;";

					if( mysqli_query($mysqli, $sql1)){
						//echo "Inserción realizada".mysqli_connect_error();
					}else{
						echo "Error ".mysqli_error($mysqli);
					}
					mysqli_close($mysqli);
					include("includes/alert.php");

				}

		break;
	case 'PACIENTES':
			if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
		 	isset($_POST['direccion']) && !empty($_POST['direccion']) &&
		 	isset($_POST['ciudad']) && !empty($_POST['ciudad']) &&
			isset($_POST['estado']) && !empty($_POST['estado']) &&
			isset($_POST['dia']) && !empty($_POST['dia'])	&& 
			isset($_POST['mes']) && !empty($_POST['mes'])	&&
			isset($_POST['anio']) && !empty($_POST['anio'])
			)
			{
				$nombre 		= utf8_decode($_POST['nombre']);
				$direccion 		= utf8_decode($_POST['direccion']);
				$ciudad			= utf8_decode($_POST['ciudad']);
				$estado 		=  utf8_decode($_POST['estado']);
				$cp 			= utf8_decode($_POST['cp']);
				$fijo 			= utf8_decode($_POST['fijo']);
				$dia 			= utf8_decode($_POST['dia']);
				$mes 			= utf8_decode($_POST['mes']);
				$anio 			= utf8_decode($_POST['anio']);
				$email 			= utf8_decode($_POST['email']);
				$sangre			= utf8_decode($_POST['sangre']);
				$movil  		= utf8_decode($_POST['movil']);
				$oficina 		= utf8_decode($_POST['oficina']);
				if(isset($_POST['rfc']) && isset($_POST['razon']) && isset($_POST['fiscal']) ){
					$rfc			= utf8_decode($_POST['rfc']);
					$razonsocial    = utf8_decode($_POST['razon']);
					$direccionfiscal= utf8_decode($_POST['fiscal']);
				}
				else{
					$rfc = '';
					$razonsocial = '';
					$direccionfiscal ='';
				}

				$nacimiento		= $anio.'-'.$mes.'-'.$dia;

				$enc = 0;

				$mysqli = mysqli_connect($host, $user, $pwd, $db);
				if (mysqli_connect_errno()) {
					echo "Falló la conexión:".mysqli_connect_error();
				}


				$nom_consul = '%'.$nombre.'%';


				$sql_nom = "SELECT nombre FROM pacientes WHERE nombre LIKE'$nom_consul';";
				$result = mysqli_query($mysqli, $sql_nom);
				while ( $fila = mysqli_fetch_array($result, MYSQLI_NUM)) {
					$comp_nom = utf8_encode($fila[0]);
					$nombre2 = utf8_encode($nombre);					

					if ($comp_nom==$nombre2) {
						
						$enc = 1;
					}
				}

				if ($enc == 1) {
					include("includes/warning.php");
					
				}
				else
				{
					if (isset($_POST['onoffswitch']) && !empty($_POST['onoffswitch']))
					{
						$sexo = "M";
					}
					else
					{
						$sexo = "F";
					}

					$sql = "INSERT INTO pacientes (nombre, direccion, ciudad, estado, codigo_postal, telefono,
			        								 email, fecha_nac, sexo, tipo_sangre, telefono_movil, tel_oficina,
													 rfc, razonsocial, direccionfiscal)
								VALUES('$nombre', '$direccion', '$ciudad', '$estado', '$cp', '$fijo',
										'$email', '$nacimiento', '$sexo', '$sangre',
										'$movil', '$oficina', '$rfc', '$razonsocial', '$direccionfiscal');";

					if( mysqli_query($mysqli, $sql)){

					}else{
						echo "Error ".mysqli_error($mysqli);
					}

					mysqli_close($mysqli);

					include("includes/alert.php");	
				}
			}
			else
			{
				echo "Error Recibiendo";

			}
		break;

	case 'MEDICOS':
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

				include("includes/alert.php");
			}
			else
			{
				echo "Error";
			}

		break;

	case 'MEDICOSUP':
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

				$idup = $_SESSION['idup'];
				$sql = "UPDATE medicos
								  set nombre 			= '$nombre', 
						 			  domicilio_medi 	= '$direccion',
						 			  ciudad_medi  		= '$ciudad',
						 			  estado_medi 		= '$estado',
						 			  telefono_medi		= '$telefono',
						 			  hospital 		    = '$nombre_hosp',
						 			  direccion_hospital = '$domicilio_hos'
		 									WHERE idmedicos = $idup;";

				if( mysqli_query($mysqli, $sql)){

				}else{
				 echo "Error ".mysqli_error($mysqli);
				}

				mysqli_close($mysqli);

				include("includes/alert.php");
			}
			else
			{
				echo "Error";
			}

		break;

	case 'PACIENTESUP':

				$nombre 		= utf8_decode($_POST['nombre']);
				$direccion 		= utf8_decode($_POST['direccion']);
				$ciudad			= utf8_decode($_POST['ciudad']);
				$estado 		=  utf8_decode($_POST['estado']);
				$cp 			= utf8_decode($_POST['cp']);
				$fijo 			= utf8_decode($_POST['fijo']);
				$dia 			= utf8_decode($_POST['dia']);
				$mes 			= utf8_decode($_POST['mes']);
				$anio 			= utf8_decode($_POST['anio']);
				$email 			= utf8_decode($_POST['email']);
				$sangre			= utf8_decode($_POST['sangre']);
				$movil  		= utf8_decode($_POST['movil']);
				$oficina 		= utf8_decode($_POST['oficina']);
				if(isset($_POST['rfc']) && isset($_POST['razon']) && isset($_POST['fiscal']) ){
					$rfc			= utf8_decode($_POST['rfc']);
					$razonsocial    = utf8_decode($_POST['razon']);
					$direccionfiscal= utf8_decode($_POST['fiscal']);
				}
				else{
					$rfc = '';
					$razonsocial = '';
					$direccionfiscal ='';
				}

				$dia 			= utf8_decode($_POST['dia']);
				$mes 			= utf8_decode($_POST['mes']);
				$anio 			= utf8_decode($_POST['anio']);
				$nacimiento		= $anio.'-'.$mes.'-'.$dia;

				$mysqli = mysqli_connect($host, $user, $pwd, $db);
				if (mysqli_connect_errno()) {
					echo "Falló la conexión:".mysqli_connect_error();
				}

				$idup = $_SESSION['idup'];


				if (isset($_POST['onoffswitch']) && !empty($_POST['onoffswitch']))
				{
					$sexo = "M";
				}
				else
				{
					$sexo = "F";
				}
				
				$sql = "UPDATE pacientes 
								  set nombre 		= '$nombre', 
						 			  direccion 	= '$direccion',
						 			  ciudad  		= '$ciudad',
						 			  estado 		= '$estado',
						 			  codigo_postal	= '$cp',
						 			  telefono 		= '$fijo',
						 			  email 		= '$email',
						 			  fecha_nac		= '$nacimiento',
						 			  sexo 			= '$sexo',
						 			  tipo_sangre	= '$sangre',
									  telefono_movil = '$movil',
									  tel_oficina	= '$oficina',
									  rfc			= '$rfc',
									  razonsocial	= '$razonsocial',
									  direccionfiscal= '$direccionfiscal'
		 									WHERE idpacientes = $idup;";

				if( mysqli_query($mysqli, $sql)){

				}
				else{
					echo "Error ".mysqli_error($mysqli);
				}

				mysqli_close($mysqli);

				include("includes/alert.php");

		break;


case 'PRODUCTOS':


			

				$mysqli = mysqli_connect($host, $user, $pwd, $db);
				if (mysqli_connect_errno()) {
					echo "Falló la conexión:".mysqli_connect_error();
				}

				

if (isset($_POST['nombre_art'])             && !empty($_POST['nombre_art'])   &&
	 		isset($_POST['cantidad'])       && !empty($_POST['cantidad'])       &&
	 		isset($_POST['Costo'])          && !empty($_POST['Costo'])          &&
	 		isset($_POST['u_medida'])       && !empty($_POST['u_medida'])       &&
	 		isset($_POST['costo_prueba'])    && !empty($_POST['costo_prueba'])    &&
	 		isset($_POST['marca'])          && !empty($_POST['marca'])          &&
	 		isset($_POST['prueba_kit'])     && !empty($_POST['prueba_kit']))
			{
				
				$nombre_art		= utf8_decode($_POST['nombre_art']);
				$cantidad 			= utf8_decode($_POST['cantidad']);
				$Costo				= utf8_decode($_POST['Costo']);
				$u_medida 			= utf8_decode($_POST['u_medida']);
				$diafechastock 		= utf8_decode($_POST['diafechastock']);
				$mesfechastock 		= utf8_decode($_POST['mesfechastock']);
				$aniofechastock 	= utf8_decode($_POST['aniofechastock']);
				$diafechainicio		= utf8_decode($_POST['diafechainicio']);
				$mesfechainicio     = utf8_decode($_POST['mesfechainicio']); 
				$aniofechainicio    = utf8_decode($_POST['aniofechainicio']); 
				$diafechatermino	= utf8_decode($_POST['diafechatermino']);
				$mesfechatermino    = utf8_decode($_POST['mesfechatermino']); 
				$aniofechatermino   = utf8_decode($_POST['aniofechatermino']); 
				$diafechacaducidad	= utf8_decode($_POST['diafechacaducidad']);
				$mesfechacaducidad  = utf8_decode($_POST['mesfechacaducidad']); 
				$aniofechacaducidad = utf8_decode($_POST['aniofechacaducidad']); 
				$idproveedores 	    = utf8_decode($_POST['idproveedor']);
				$costo_prueba 		= utf8_decode($_POST['costo_prueba']);
				$marca 				= utf8_decode($_POST['marca']);
				$prueba_kit 		= utf8_decode($_POST['prueba_kit']);


				$fechastock 		= $aniofechastock .'.'.$mesfechastock .'.'.$diafechastock ;
				$fechainicio 		= $aniofechainicio .'.'.$mesfechainicio .'.'.$diafechainicio ;
                $fechatermino 		= $aniofechatermino .'.'.$mesfechatermino .'.'.$diafechatermino ;
                $fechacaducidad 	= $aniofechacaducidad .'.'.$mesfechacaducidad .'.'.$diafechacaducidad ;
				$mysqli = mysqli_connect($host, $user, $pwd, $db);
				if (mysqli_connect_errno()) {
				 echo "Falló la conexión:".mysqli_connect_error();
				}

				$sql = "INSERT INTO inventario (nombre_art, cantidad, Costo, u_medida, idproveedores,
								fechastock, fechainicio, fechatermino, fechacaducidad, costo_prueba, marca, prueba_kit)
					 VALUES('$nombre_art', '$cantidad', '$Costo', '$u_medida', '$idproveedores' ,
						 '$fechastock', '$fechainicio', '$fechatermino', '$fechacaducidad', '$costo_prueba', 
						 '$marca', '$prueba_kit');";

				if( mysqli_query($mysqli, $sql)){

				}else{
				 echo "Error ".mysqli_error($mysqli);
				}

				mysqli_close($mysqli);

				include("includes/alert.php");
			}
			else
			{ 

			}

		break;
}
?>