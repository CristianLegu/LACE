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
case 'CLINICA':
	
 		/*if (isset($_POST['nombre_m']) && !empty($_POST['nombre_m']) &&
	 		isset($_POST['domicilio_m']) && !empty($_POST['domicilio_m']) &&
	 		isset($_POST['telefono_m']) && !empty($_POST['telefono_m']))
		{*/
			
			$glucosa     	        = utf8_decode($_POST['glucosa']);
			$urea       	        = utf8_decode($_POST['urea']);
			$creatinina       	    = utf8_decode($_POST['creatinina']);
			$acido_urico     	    = utf8_decode($_POST['acido_urico']);
			$colesterol_tot  	    = utf8_decode($_POST['colesterol_tot']);
			$esteres_col    	    = utf8_decode($_POST['esteres_col']);
			$lipidos_tot            = utf8_decode($_POST['lipidos_tot']);
			$trigliceridos   	    = utf8_decode($_POST['trigliceridos']);
		    $glucosa_post     	    = utf8_decode($_POST['glucosa_post']);
	     	$proteinas_tot          = utf8_decode($_POST['proteinas_tot']);
			$albuminas              = utf8_decode($_POST['albuminas']);
			$globulinas             = utf8_decode($_POST['globulinas']);
			$relacion_ag            = utf8_decode($_POST['relacion_ag']);
			$transaminasa_go        = utf8_decode($_POST['transaminasa_go']);
			$transaminasa_gp        = utf8_decode($_POST['transaminasa_gp']);
			$fosfatasa_acida        = utf8_decode($_POST['fosfatasa_acida']);
			$fosfatasa_alcalina     = utf8_decode($_POST['fosfatasa_alcalina']);
			$fosfatasa_prostatica   = utf8_decode($_POST['fosfatasa_prostatica']);
			$dehidrogenasa_lactica  = utf8_decode($_POST['dehidrogenasa_lactica']);
			$billi_directa          = utf8_decode($_POST['billi_directa']);
			$billi_indirecta        = utf8_decode($_POST['billi_indirecta']);
			$amilasa                = utf8_decode($_POST['amilasa']);
			$idmedicos              = utf8_decode($_POST['idmedico']);
			
			$mysqli = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
			 echo "Falló la conexión:".mysqli_connect_error();
			}

			$sql = "INSERT INTO clinica (glucosa, urea, creatinina, acido_urico, colesterol_tot,
							esteres_col, lipidos_tot, trigliceridos, glucosa_post, proteinas_tot, albuminas, globulinas, relacion_ag, transaminasa_go, transaminasa_gp, fosfatasa_acida, fosfatasa_alcalina, fosfatasa_prostatica, dehidrogenasa_lactica, billi_directa, billi_indirecta, amilasa, idpacientes, idmedicos)
				 VALUES('$glucosa', '$urea', '$creatinina', '$acido_urico', '$colesterol_tot',
					 '$esteres_col', '$lipidos_tot', '$trigliceridos', '$glucosa_post'
					 , '$proteinas_tot' , '$albuminas' , '$globulinas' , '$relacion_ag' ,                '$transaminasa_go' , '$transaminasa_gp' , '$fosfatasa_acida' , '$fosfatasa_alcalina' , '$fosfatasa_prostatica' , '$dehidrogenasa_lactica' ,       '$billi_directa' , '$billi_indirecta' , '$amilasa' , '$idpacientes', '$idmedicos');";

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


case 'BIOMETRIA':
	
 		/*if (isset($_POST['nombre_m']) && !empty($_POST['nombre_m']) &&
	 		isset($_POST['domicilio_m']) && !empty($_POST['domicilio_m']) &&
	 		isset($_POST['telefono_m']) && !empty($_POST['telefono_m']))
		{*/
			
			$eritrocitos     	 	  = utf8_decode($_POST['eritrocitos']);
			$hemoglobina       	 	  = utf8_decode($_POST['hemoglobina']);
			$hematocrito       	   	  = utf8_decode($_POST['hematocrito']);
			$h_g_m          	 	  = utf8_decode($_POST['h_g_m']);
			$v_g_m  	 		 	  = utf8_decode($_POST['v_g_m']);
			$c_h_g_m   	 		      = utf8_decode($_POST['c_h_g_m']);
			$plaquetas          	  = utf8_decode($_POST['plaquetas']);
			$anomalias_eritrociticas  = utf8_decode($_POST['anomalias_eritrociticas']);
		    $leucocitos    	 	      = utf8_decode($_POST['leucocitos']);
			$neotrofilos_uno    	  = utf8_decode($_POST['neotrofilos_uno']);
			$neotrofilos_dos    	  = utf8_decode($_POST['neotrofilos_dos']);
			$segmentados_uno       	  = utf8_decode($_POST['segmentados_uno']);
			$segmentados_dos   		  = utf8_decode($_POST['segmentados_dos']);
			$en_banda_uno 		   	  = utf8_decode($_POST['en_banda_uno']);
			$en_banda_dos     		  = utf8_decode($_POST['en_banda_dos']);
		    $juveniles_uno     	      = utf8_decode($_POST['juveniles_uno']);
		    $juveniles_dos     	      = utf8_decode($_POST['juveniles_dos']);
		    $mielocitos_uno      	  = utf8_decode($_POST['mielocitos_uno']);
			$mielocitos_dos    		  = utf8_decode($_POST['mielocitos_dos']);
			$linfocitos_uno           = utf8_decode($_POST['linfocitos_uno']);
			$linfocitos_dos       	  = utf8_decode($_POST['linfocitos_dos']);
			$monocitos_uno            = utf8_decode($_POST['monocitos_uno']);
			$monocitos_dos       	  = utf8_decode($_POST['monocitos_dos']);
			$eosinofilos_uno   	      = utf8_decode($_POST['eosinofilos_uno']);
			$eosinofilos_dos 		  = utf8_decode($_POST['eosinofilos_dos']);
			$basofilos_uno     		  = utf8_decode($_POST['basofilos_uno']);
			$basofilos_dos            = utf8_decode($_POST['basofilos_dos']);
			$anomalias_leucocitarias = utf8_decode($_POST['anomalias_leucocitarias']);
			$idmedicos                = utf8_decode($_POST['idmedico']);
			
			$mysqli = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
			 echo "Falló la conexión:".mysqli_connect_error();
			}

			$sql = "INSERT INTO biometria_hematica (eritrocitos, hemoglobina, hematocrito, h_g_m, v_g_m,
							c_h_g_m, plaquetas, anomalias_eritrociticas, leucocitos, neotrofilos_uno, neotrofilos_dos, segmentados_uno, segmentados_dos, en_banda_uno, en_banda_dos, juveniles_uno, juveniles_dos, mielocitos_uno, mielocitos_dos, linfocitos_uno, linfocitos_dos, monocitos_uno, monocitos_dos, eosinofilos_uno, eosinofilos_dos, basofilos_uno, basofilos_dos, anomalias_leucocitarias, idpacientes, idmedicos)
				 VALUES('$eritrocitos', '$hemoglobina', '$hematocrito', '$h_g_m', '$v_g_m',
					 '$c_h_g_m', '$plaquetas', '$anomalias_eritrociticas', '$leucocitos'
					 , '$neotrofilos_uno' , '$neotrofilos_dos' , '$segmentados_uno' , '$segmentados_dos' , '$en_banda_uno' ,       '$en_banda_dos' , '$juveniles_uno' , '$juveniles_dos' , '$mielocitos_uno' , '$mielocitos_dos' , '$linfocitos_uno' , '$linfocitos_dos' , '$monocitos_uno' , '$monocitos_dos', '$eosinofilos_uno' , '$eosinofilos_dos' ,'$basofilos_uno' , '$basofilos_dos','$anomalias_leucocitarias' ,'$idpacientes', '$idmedicos');";

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

case 'COPROLOGICO':
	
 		/*if (isset($_POST['nombre_m']) && !empty($_POST['nombre_m']) &&
	 		isset($_POST['domicilio_m']) && !empty($_POST['domicilio_m']) &&
	 		isset($_POST['telefono_m']) && !empty($_POST['telefono_m']))
		{*/
			
			$color_pri     	   = utf8_decode($_POST['color_pri']);
			$moco_pri          = utf8_decode($_POST['moco_pri']);
			$pus_pri       	   = utf8_decode($_POST['pus_pri']);
			$consistencia_pri  = utf8_decode($_POST['consistencia_pri']);
			$sangre_pri  	   = utf8_decode($_POST['sangre_pri']);
			$residuos_pri      = utf8_decode($_POST['residuos_pri']);
			$color_seg         = utf8_decode($_POST['color_seg']);
			$moco_seg          = utf8_decode($_POST['moco_seg']);
		    $pus_seg           = utf8_decode($_POST['pus_seg']);
			$consistencia_seg  = utf8_decode($_POST['consistencia_seg']);
			$sangre_seg    	   = utf8_decode($_POST['sangre_seg']);
			$residuos_seg      = utf8_decode($_POST['residuos_seg']);
			$ph_pri   		   = utf8_decode($_POST['ph_pri']);
			$billi_pri 		   = utf8_decode($_POST['billi_pri']);
			$uro_pri     	   = utf8_decode($_POST['uro_pri']);
		    $sang_oculta_pri   = utf8_decode($_POST['sang_oculta_pri']);
		    $azucares_pri      = utf8_decode($_POST['azucares_pri']);
		    $reductores_pri    = utf8_decode($_POST['reductores_pri']);
			$ph_seg    		   = utf8_decode($_POST['ph_seg']);
			$billi_seg         = utf8_decode($_POST['billi_seg']);
			$uro_seg       	   = utf8_decode($_POST['uro_seg']);
			$sang_oculta_seg   = utf8_decode($_POST['sang_oculta_seg']);
			$azucares_seg      = utf8_decode($_POST['azucares_seg']);
			$reductores_seg    = utf8_decode($_POST['reductores_seg']);
			$ex_micros         = utf8_decode($_POST['ex_micros']);
			$idmedicos         = utf8_decode($_POST['idmedico']);
			
			$mysqli = mysqli_connect($host, $user, $pwd, $db);
			if (mysqli_connect_errno()) {
			 echo "Falló la conexión:".mysqli_connect_error();
			}

			$sql = "INSERT INTO coprologico (color_pri, moco_pri, pus_pri, consistencia_pri, sangre_pri,
							residuos_pri, color_seg, moco_seg, pus_seg, consistencia_seg, sangre_seg, residuos_seg, ph_pri, billi_pri, uro_pri, sang_oculta_pri, azucares_pri, reductores_pri, ph_seg, billi_seg, uro_seg, sang_oculta_seg, azucares_seg, reductores_seg, ex_micros, idpacientes, idmedicos)
				 VALUES('$color_pri', '$moco_pri', '$pus_pri', '$consistencia_pri', '$sangre_pri',
					 '$residuos_pri', '$color_seg', '$moco_seg', '$pus_seg', '$consistencia_seg' ,       '$sangre_seg' , '$residuos_seg' , '$ph_pri' , '$billi_pri' , '$uro_pri' ,       '$sang_oculta_pri' , '$azucares_pri' , '$reductores_pri' , '$ph_seg' ,          '$billi_seg' , '$uro_seg' , '$sang_oculta_seg' , '$azucares_seg', '$reductores_seg', '$ex_micros' ,'$idpacientes', '$idmedicos');";

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