<?php
      header('Content-Type: text/html; charset=iso-8859-1');
      echo htmlspecialchars("", ENT_QUOTES, 'utf-8');
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Men&uacute; Productos | LACE </title>
  <link rel="shortcut icon" href="img/icon.png"> 
  <link rel="stylesheet" type="text/css" media="all" href="css/styles-menu.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.min.css">
</head>

<body>

<nav id="hola">
  <ul>     
    <li><p>
          <a href="menu.html">
            <img src="img/logo2.png"  id="logo">
          </a>
        </p>
          
    </li>
    
    <li>
      <h1>Productos</h1>  
    </li>
      <p>
        <form name="formulario" action="" onSubmit="enviarDatos(); return false">
          <li><input type="text" placeholder="Buscar..." name="busca" id="busca"></li>
        </form>  
      </p>  
    <li></li>  
    <li>
      <a href="pacientes.php" class="add"><img src="img/addpac.png"></a>
    </li>
  </ul>
</nav>
  		

      <table id="customers">
        <tr>
          <th>Folio</th>
          <th>Nombre</th>
          <th>Informaci&oacute;n</th>
          <th>Stock</th>
          <th>Agregar</th>
        </tr>

<?php
  include("includes/conexion.php");

  $con = mysqli_connect($host, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }
/*Verifica si el campo busca esta vacio*/
    if(empty($_GET['busca'])){
      
            $sql = "SELECT 
                    idpacientes, 
                    nombre 
                  FROM pacientes" ;
          }

    else{
        $pac = $_GET['busca'];
        $search = '%'.$pac.'%';

        $sql = "SELECT 
                    idpacientes, 
                    nombre 
                  FROM pacientes
                WHERE nombre LIKE '$search'" ;  
        }

    

         $query = $con -> query($sql);

         while ($fila = $query -> fetch_array()){
         $nombre = $fila['1'];
 ?>
        <tr>
          <td><?php echo $fila['0']; ?></td>
          <td><?php echo $nombre; ?></td>
          <td><a href= "pacientes.php? p=<?php echo $fila['0'] ?>">Ver</a> </td>
          <td><a href= "analisis.php? p=<?php echo $fila['0'] ?>">Agregar</a> </td>
        </tr>

<?php } 
  mysqli_close($con);
?>
      </table>
  


<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>