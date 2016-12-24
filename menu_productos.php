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
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles-menu.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.min.css">
  <script type="text/javascript" src="js/script.js"></script>
</head>

<body>

<nav id="hola">
  <ul>
    <li><p>
          <a href="menu.php">
            <img src="img/logo2.png"  id="logo">
          </a>
        </p>

    </li>

    <li>
      <h1>Productos</h1>
    </li>
      <p>
        <form name="formulario" action="" onSubmit="enviarDatos(); return false" autocomplete="off">
          <li><input type="text" placeholder="Buscar..." name="busca" id="busca"></li>
        </form>
      </p>
    <li>
      <a href="productos.php" class="add"><img src="img/addprod.png" alt="Agregar Productos"></a>
    </li>
  </ul>
</nav>


      <table class="sortable" id="sorter">
        <tr>
          <th>Folio</th>
          <th>Nombre</th>
          <th>Stock</th>
          <th class="nosort">Agregar</th>
        </tr>

<?php
  include("includes/conexion.php");

  $con = mysqli_connect($host, $user, $pwd, $db);
  $paginationCtrls = '';
  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }
/*Verifica si el campo busca esta vacio*/
    if(empty($_GET['busca'])){
              $sql = "SELECT
              count(idinventario)
              FROM inventario";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_row($result);
      $rows = $row[0];
      $page_rows = 15;

      $last= ceil($rows/$page_rows);

      if($last < 1){
        $last = 1;
      }

      $pagenum = 1;

      if(isset($_GET['pn'])){
      	  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
      }

      if ($pagenum < 1) {
        $pagenum = 1;
      } else if ($pagenum > $last) {
        $pagenum = $last;
      }

      $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

      $sql = "SELECT  idinventario,
                      nombre_art,
                      cantidad
              FROM inventario
              ORDER BY idinventario
              ASC $limit";
      $query = mysqli_query($con, $sql);



      if($last != 1){
          if($pagenum > 1){
            $previous = $pagenum - 1;
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Anterior</a> &nbsp; &nbsp; ';

            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                }
	          }
          }

          $paginationCtrls .= ''.$pagenum.' &nbsp; ';

          for($i = $pagenum+1; $i <= $last; $i++){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		        if($i >= $pagenum+4){
			          break;
		        }
	        }

          if ($pagenum != $last) {
                $next = $pagenum + 1;
                $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Siguiente</a> ';
          }
      }

    }
    else{
        $pac = $_GET['busca'];
        $search = '%'.$pac.'%';

        $sql = "SELECT
                    idinventario,
                    nombre_art,
                    cantidad
                  FROM inventario
                WHERE nombre_art LIKE '$search'" ;
                $query = $con -> query($sql);
        }





         while ($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)){
         $nombre = $fila['nombre_art'];
 ?>
        <tr>
          <td><?php echo $fila['idinventario']; ?></td>
          <td><?php echo $nombre; ?></td>
          <td><?php echo $fila['cantidad']; ?></td>
          <td><a href= "productos_agregar.php?prod=<?php echo $fila['idinventario'] ?>">Agregar</a> </td>
        </tr>

<?php }
  mysqli_close($con);
?>
      </table>
    <div id="pagination_controls">
      <?php echo $paginationCtrls; ?>
    </div>


<script type="text/javascript">
  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

  elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>

<script type="text/javascript">
  var sorter=new table.sorter("sorter");
  sorter.init("sorter",1);
</script>

</body>
</html>
