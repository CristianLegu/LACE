<?php
         header('Content-Type: text/html; charset=iso-8859-1');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Pacientes|LACE</title>
  <link rel="shortcut icon" href="img/icon.png"> 
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.min.css">
</head>

<body>

  <div id="wrapper">

  	<span style="align: left;">
      <a href="menu.html">
        <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
      </a>
      <h1>Pacientes</h1>
      <div class="col-2">
      	<button class="submitbtn">Agregar Paciente</button>
      </div>
      
    </span> 	
  		
  		<input type="text" placeholder="Buscar...">
            
  </div>

      <table id="customers">
        <tr>
          <th>Folio</th>
          <th>Nombre</th>
          <th>Perfil</th>
          <th>An&aacute;lisis</th>
        </tr>

         <?php
          include("includes/conexion.php");
             $con = mysql_connect($host,$user,$pwd) or die("Error en el Server: ".mysql_error()); 
                mysql_select_db($db,$con)or die("Error con BD: ".mysql_error());
                $query = mysql_query("SELECT idpacientes, nombre FROM pacientes", $con) or die(mysql_error());

             while ($fila = mysql_fetch_array($query)){
            $nombre = $fila['1'];
          ?>
        <tr>
          <td><?php echo $fila['0']; ?></td>
          <td><?php echo $nombre; ?></td>
          <td><a href= "pacientes.php? idpac=<?php echo $fila['0'] ?>">Ver</a> </td>
          <td><a href= "analisis.php? idpac=<?php echo $fila['0'] ?>">Agregar</a> </td>
        </tr>

        <?php } ?>
      </table>
  


<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>