<?php
  include("includes/conexion.php");
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Médicos - LACE</title>
<link rel="shortcut icon" href="img/icon.png"> 
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
</head>
<?php

  $con = mysqli_connect($host, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }
/*Verifica si el campo busca esta vacio*/
    if(empty($_GET['m'])){
            $pac = ' ';
            session_start();
               $_SESSION['valueF'] = 'MEDICOS';
          }

    else{
        $pac = $_GET['m'];  
        session_start();
               $_SESSION['valueF'] = 'MEDICOSUP';
               $_SESSION['idup'] = $pac;
        }

        $sql = "SELECT *
                  FROM medicos
                  WHERE idmedicos = '$pac'" ;

         $query  = mysqli_query($con, $sql);
         $fila   = mysqli_fetch_array($query, MYSQLI_ASSOC);
 ?>

<body>

  <div id="wrapper">

<span style="align: left;">
<a href="menu.html">
	<img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
</a>
	<h1>M&eacute;dicos</h1>
</span>
   
  <form action="guarda.php" method="post">

  <div class="col-2">
    <label>
      Nombre
      <input  name="nombre_m" tabindex="1" required value="<?php echo utf8_encode($fila['nombre']); ?>">
    </label>
  </div>
 <div class="col-2">
    <label>
      Domicilio Médico
      <input  name="domicilio_m" tabindex="2" required value="<?php echo utf8_encode($fila['domicilio_medi']); ?>">
    </label>
  </div>
  <div class="col-3">
    <label>
      Ciudad
      <input  name="ciudad_m" tabindex="3" value="<?php echo utf8_encode($fila['ciudad_medi']); ?>">
    </label>
  </div>
  <div class="col-3">
    <label>
      Estado
      <input  name="estado_m" tabindex="4" value="<?php echo utf8_encode($fila['estado_medi']); ?>">
    </label>
  </div>
  <div class="col-3">
    <label>
      Teléfono
       <input  name="telefono_m" tabindex="5" required  placeholder="(XXX) XXX XX XX" value="<?php echo utf8_encode($fila['telefono_medi']); ?>">
  </div>
  
  <div class="col-2">
    <label>
      Nombre del Hospital
      <input  name="nombre_h" tabindex="6" value="<?php echo utf8_encode($fila['hospital']); ?>">
    </label>
  </div>
  <div class="col-2">
    <label>
      Domicilio Hospital
      <input  name="domicilio_h" tabindex="7" value="<?php echo utf8_encode($fila['direccion_hospital']); ?>">
    </label>
  </div>

  <div class="col-submit">
    <button class="submitbtn">Guardar</button>
  </div>
  
  </form>
  </div>
<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>