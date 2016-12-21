<?php  
      include("includes/conexion.php");
      $mysqli = mysqli_connect($host, $user, $pwd, $db);

      if (mysqli_connect_errno()) {
       echo "Falló la conexión: IF".mysqli_connect_error();
      }
      


$sql    =    "SELECT idpropio FROM analisis order by idpropio desc"; 
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
    $pacientes_idpacientes = 1;
    $medicos_idmedicos = $_POST["idmedico"];
    $number        = count($_POST["pruebas"]);  

 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["pruebas"][$i] != ''))  
echo "entro";
           {  
          //  $hola = 1;
             $mysqli = mysqli_connect($host, $user, $pwd, $db);
      if (mysqli_connect_errno()) {
      // echo "Falló la conexión:".mysqli_connect_error();
      }
      echo $prueba          =  $_POST["pruebas"][$i];
      echo $resultado       =  $_POST["resultado"][$i];
      echo $unidades        =  $_POST["unidades"][$i];
      echo $valorreferencia =  $_POST["valorreferencia"][$i];
      echo $comentario      =  $_POST["comentario"][$i];
      echo $observaciones   =  $_POST["observaciones"][$i];

         //       $sql = "INSERT INTO analisis(idanalisis, area, departamento, estudio, pruebas, observaciones, pacientes_idpacientes, medicos_idmedicos ) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";  
            $sql = "INSERT INTO analisis ( area, departamento, estudio, prueba, resultado, unidades, valorreferencia, comentario, observaciones, fecha, pacientes_idpacientes, medicos_idmedicos, idpropio) 
                    VALUES( '$area', '$departamento', '$estudio', '$prueba', '$resultado', '$unidades','$valorreferencia',        '$comentario','$observaciones', '$fecha', '$pacientes_idpacientes', '$medicos_idmedicos', '$idpropio')";  
              if( mysqli_query($mysqli, $sql)){

     }else{
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


 echo $idpropio;

 session_start();
 $_SESSION['idpropio'] = $idpropio;
 include('reporte.php');
 ?>
