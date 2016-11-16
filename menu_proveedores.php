<?php
      header('Content-Type: text/html; charset=iso-8859-1');
      echo htmlspecialchars("", ENT_QUOTES, 'utf-8');
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Men&uacute; Proveedores | LACE </title>
  <link rel="shortcut icon" href="img/icon.png"> 
  <link rel="stylesheet" type="text/css" media="all" href="css/styles-menu.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.min.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/paginacion.css">
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
      <h1>Proveedores</h1>  
    </li>
      <p>
        <form name="formulario" action="" onSubmit="enviarDatos(); return false">
          <li><input type="text" placeholder="Buscar..." name="busca" id="busca"></li>
        </form>  
      </p>   
    <li>
      <a href="proveedores.php" class="add"><img src="img/addprov.png"></a>
    </li>
  </ul>
</nav>
  		

      <table id="customers">
        <tr>
          <th>Folio</th>
          <th>Nombre</th>
          <th>Perfil</th>
        </tr>

<?php
  include("includes/conexion.php");
/******PAGINACION EJEMPLO******/
  $con = mysqli_connect($host, $user, $pwd, $db);
  $total_paginas = 0;
    if(empty($_GET['busca'])){
       $resultados_pagina = 10;

      if (isset($_GET["pagina"])) {
        if (is_string($_GET["pagina"])) {
          if (is_numeric($_GET["pagina"])) {
            if ($_GET["pagina"] == 1) {
              header("Location: menu_pacientes.php");
              die();
            }
            else{
              $pagina = $_GET["pagina"];
            }
          }
          else{
             header("Location: menu_proveedores.php");
             die();
          }
        }
      }
      else{
        $pagina = 1;
      }

      $empezar_desde = ($pagina-1) * $resultados_pagina;



      

      if (mysqli_connect_errno()) {
        echo "Falló la conexión: ".mysqli_connect_error();
        }

        $sql = "SELECT 
                    idproveedores, 
                    nombre 
                  FROM proveedores";
        $query = $con -> query($sql);
        $total_registros = mysqli_num_rows($query);
        $total_paginas = ceil($total_registros / $resultados_pagina); 

        $sql2 =   "SELECT 
                    idproveedores, 
                    nombre 
                  FROM proveedores
                  LIMIT $empezar_desde, $resultados_pagina";
        $query2 = $con -> query($sql2);

       
}
    else{

        $pac = $_GET['busca'];  
        $search = '%'.$pac.'%';

        $sql = "SELECT 
                idproveedores, 
                nombre 
              FROM proveedores
            WHERE nombre LIKE '$search'" ;
        $query2 = $con -> query($sql);

        }

         

         while ($fila = $query2 -> fetch_array()){
         $nombre = $fila['1'];
 ?>
        <tr>
          <td><?php echo $fila['0']; ?></td>
          <td><?php echo $nombre; ?></td>
          <td><a href= "proveedores.php? prov=<?php echo $fila['0'] ?>">Ver</a> </td>
        </tr>

<?php } 
  mysqli_close($con);
?>
      </table>


    



<div class="center">
  <ul class="pagination">
       <?php
//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
//Nota: X = $total_paginas
for ($i=1; $i<=$total_paginas; $i++) {
  //En el bucle, muestra la paginación
  
  
  echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
  
}; ?>
  </ul>
</div>
  


<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>