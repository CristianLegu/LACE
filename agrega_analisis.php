<?php  
      include("includes/conexion.php");
      $mysqli = mysqli_connect($host, $user, $pwd, $db);

      if (mysqli_connect_errno()) {
       echo "Falló la conexión: IF".mysqli_connect_error();
      }
     
$idpropio   = $_POST["idpropio"];
$idpaciente = $_POST["idpaciente"];

if ($idpropio == 0) {
      $sql    = "SELECT idpropio FROM analisis order by idpropio desc"; 
      $query  = mysqli_query($mysqli, $sql);
      $fila   = mysqli_fetch_array($query, MYSQLI_ASSOC);
      if($fila == null) {
        $idpropio = 1;
      }
      else{
         $idpropio = $fila['idpropio'] + 1;
      }
    if(isset($_POST['area']) && isset($_POST['departamento'])
    &&  isset($_POST['estudio']) && isset($_POST['idmedico'])
    &&  isset($_POST['pruebas'])
    ){
      $fecha         =  date("Y") . date("m") . date("j") ; 
      $area          = $_POST["area"];
      $departamento  = $_POST["departamento"];
      $estudio       = $_POST["estudio"];
      $comentario       = $_POST["comentario"];
      $pacientes_idpacientes = 1;
      $medicos_idmedicos = $_POST["idmedico"];
      $number        = count($_POST["pruebas"]);  
      if($number > 0)  
      {  
          for($i=0; $i<$number; $i++)  
          {  
             if(trim($_POST["pruebas"][$i] != ''))  
             {  
                $mysqli = mysqli_connect($host, $user, $pwd, $db);
              if(mysqli_connect_errno()) {
                }
                $prueba          =  $_POST["pruebas"][$i];
                $resultado       =  $_POST["resultado"][$i];
                $unidades        =  $_POST["unidades"][$i];
                $valorreferencia =  $_POST["valorreferencia"][$i];
                $observaciones   =  $_POST["observaciones"][$i];

         //       $sql = "INSERT INTO analisis(idanalisis, area, departamento, estudio, pruebas, observaciones, pacientes_idpacientes, medicos_idmedicos ) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";  
                $sql = "INSERT INTO analisis ( area, departamento, estudio, prueba, resultado, unidades, valorreferencia, comentario, observaciones, fecha, pacientes_idpacientes, medicos_idmedicos, idpropio) 
                    VALUES( '$area', '$departamento', '$estudio', '$prueba', '$resultado', '$unidades','$valorreferencia','$comentario','$observaciones', '$fecha', '$pacientes_idpacientes', '$medicos_idmedicos', '$idpropio')";  
                if( mysqli_query($mysqli, $sql)){
                } else{
                  echo "Error antes de cerrar".mysqli_error($mysqli);
                } 
                mysqli_close($mysqli);
            }  
        }  
      }  
      else  
      {  
        echo "Please Enter Name";  
      }  
    }
}
else {
  $eliminar = "DELETE FROM analisis WHERE idpropio = $idpropio;";

  if ($mysqli->query($eliminar) === TRUE) {
    if(isset($_POST['area']) && isset($_POST['departamento'])
    &&  isset($_POST['estudio']) && isset($_POST['idmedico'])
    &&  isset($_POST['pruebas'])
    ){
      $fecha         =  date("Y") . date("m") . date("j") ; 
      $area          = $_POST["area"];
      $departamento  = $_POST["departamento"];
      $estudio       = $_POST["estudio"];
      $comentario       = $_POST["comentario"];
      $pacientes_idpacientes = 1;
      $medicos_idmedicos = $_POST["idmedico"];
      $number        = count($_POST["pruebas"]);  

      if($number > 0)  
      {  
        for($i=0; $i<$number; $i++)  
        {  
           if(trim($_POST["pruebas"][$i] != ''))  
           {  
              $mysqli = mysqli_connect($host, $user, $pwd, $db);
              if (mysqli_connect_errno()) {

              }
              $prueba          =  $_POST["pruebas"][$i];
              $resultado       =  $_POST["resultado"][$i];
              $unidades        =  $_POST["unidades"][$i];
              $valorreferencia =  $_POST["valorreferencia"][$i];
              $observaciones   =  $_POST["observaciones"][$i];

         //       $sql = "INSERT INTO analisis(idanalisis, area, departamento, estudio, pruebas, observaciones, pacientes_idpacientes, medicos_idmedicos ) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";  
              $sql = "INSERT INTO analisis ( area, departamento, estudio, prueba, resultado, unidades, valorreferencia, comentario, observaciones, fecha, pacientes_idpacientes, medicos_idmedicos, idpropio) 
                    VALUES( '$area', '$departamento', '$estudio', '$prueba', '$resultado', '$unidades','$valorreferencia','$comentario','$observaciones', '$fecha', '$pacientes_idpacientes', '$medicos_idmedicos', '$idpropio')";  
              if( mysqli_query($mysqli, $sql)){

              } else{
                echo "Error antes de cerrar".mysqli_error($mysqli);
                }
              mysqli_close($mysqli);
            }  
        }  
      }  
      else  
      {  
        echo "Please Enter Name";  
      }  
     }
    } 
}
   


 //session_start();
 //$_SESSION['idpropio'] = $idpropio;
 //include('reporte.php');
      //echo '<script type="text/javascript">
        //          window.open("reporte.php?id=", "_blank");
          //  </script>';

 ?>

 <script type="text/javascript">
      var prop  = <?php echo $idpropio; ?>;
      var pac   = <?php echo $idpaciente; ?>;
      var med   = <?php echo $medicos_idmedicos; ?>;
      alert(prop+" "+pac+" "+med);
      window.open("reporte.php?idpr=" + prop + "&idpac=" + pac + "&idm=" + med, "_blank");
 </script>