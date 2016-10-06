<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Pacientes|LACE</title>
<link rel="shortcut icon" href="img/icon.png"> 
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
</head>

<body>

  <div id="wrapper">

    <span>
    <a href="menu.html">
    	<img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
    </a>
    	<h1>Pacientes</h1>
    </span>

  </div>
      <table id="customers">
        <tr>
          <th>Folio</th>
          <th>Nombre</th>
          <th>Perfil</th>
          <th>Análisis</th>
        </tr>

         <?php
          include("includes/conexion.php");
             $con = mysql_connect($host,$user,$pwd) or die("Error en el Server: ".mysql_error()); 
                mysql_select_db($db,$con)or die("Error con BD: ".mysql_error());
                $query = mysql_query("SELECT idpacientes, nombre FROM pacientes", $con) or die(mysql_error());

             $result = mysql_query ($query);
             while ($fila = mysql_fetch_array($result)){
          ?>
        <tr>
          <td><?php echo $fila['0']; ?></td>
          <td><?php echo $fila['1']; ?></td>
          <td><a href= "pacientes.php? idpac=<?php echo $fila['0'] ?>">Ver</a> </td>
          <td><a href= "analisis.php? idpac=<?php echo $fila['0'] ?>">Agregar</a> </td>
        </tr>

        <?php } ?>
      </table>
  <div class="col-submit">
    <button class="submitbtn">Guardar</button>
  </div>
  


<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>