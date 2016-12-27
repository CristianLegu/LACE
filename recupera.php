<?php

foreach($_GET as $loc=>$item) $_GET[$loc] = urldecode(base64_decode($item));
include("includes/conexion.php");
$con = mysqli_connect($host, $user, $pwd, $db);

$url = "";
$idpr   = 0;
$idpac  = 0;
$idmed  = 0;

  if( isset($_GET['idpr']) && isset($_GET['idpac']) && isset($_GET['idm']) ){
        $idpr   = $_GET['idpr'];
        $idpac  = $_GET['idpac'];
        $idmed  = $_GET['idm'];

        $url = 'www.laboratorioslace.com/reporte.php?idpac='.urlencode(base64_encode($idpac)).'&idpr='.urlencode(base64_encode($idpr)).'&idm='.urlencode(base64_encode($idmed));
        
        if( mysqli_connect_errno() ){
          echo "Falló la conexión: ".mysqli_connect_error();
        }else{
          $sql = "SELECT nombre, email
                    FROM pacientes 
                    WHERE idpacientes = '$idpac'";
          $query = $con -> query($sql);
          while ($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $nombrePac  = $fila['nombre'];
            $email      = $fila['email'];
            echo "NombrePac: ".$nombrePac." emailpac:".$email." url: ".$url;

            /*require_once('includes/AttachMailer.php'); 

        
                $mailer = new AttachMailer("administracion@aboratorioslace.com", $email, "Análisis",
                "Usted podrá encontrar sus análisis en la siguiente dirección: ".$url);
                $mailer->send() ? "Enviado": "Problema al enviar";
            
              

      */

          }
          mysqli_close($con);
        }
        
        
    }

    


    if(isset($_GET['u'])){

      $id = $_GET['u'];


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
          $mailer = new AttachMailer("administracion@aboratorioslace.com", $correo, "Recuperación de contraseña LACE",
          $msj."\n   Usuario ".$user." Contraseña: ".$pass);
          $mailer->send() ? "Enviado": "Problema al enviar";
          }
            

      */

      }
      mysqli_close($con);
    }
    
?>