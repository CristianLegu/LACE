<?php
      header('Content-Type: text/html; charset=iso-8859-1');
      echo htmlspecialchars("", ENT_QUOTES, 'utf-8');

?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Men&uacute; An&aacute;lisis | LACE </title>
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles-menu.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-switch.min.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/paginacion.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <style>
  .text {font-size:10; font-family:Arial, Tahoma, sans-serif; color:#0072C6; text-decoration:none}
  .text:hover {font-size:10; font-family:Arial, Tahoma, sans-serif; color:#005B99; text-decoration:none}
  </style>
  <!-- Pantalla de carga-->
  <script type="text/javascript">
    window.onload = detectarCarga;
      function detectarCarga(){
        document.getElementById("cargando").style.visibility="hidden";
      }
  </script>
  <!-- Pantalla de carga-->
</head>

<body>
  <!-- Pantalla de carga-->
        <div id="cargando">
          <div class="cssload-thecube">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
          </div>
        </div>
  <!-- Pantalla de carga-->
<nav id="hola">
  <ul>
    <li><p>
          <a href="menu.php">
            <img src="img/logo2.png"  id="logo">
          </a>
        </p>

    </li>

    <li>
      <h1>An&aacute;lisis</h1>
    </li>
      <p>
        <form name="formulario" action="" onSubmit="enviarDatos(); return false" autocomplete="off">
          <li><input type="text" placeholder="Buscar..." name="busca" id="busca"></li>
        </form>
      </p>
    <li>
      <a  href= "analisis.php?p=<?php echo $_GET['p']?>&pro=<?php echo 0 ?>" class="add"><img src="img/addpac.png"></a>
    </li>
  </ul>
</nav>


      <table class="sortable" id="sorter">
        <tr>
          <th>Estudio</th>
          <th>Fecha</th>
          <th>M&eacute;dico</th>
          <th>An&aacute;lisis</th>
        </tr>

<?php
  include("includes/conexion.php");
  $con = mysqli_connect($host, $user, $pwd, $db);
  $paginationCtrls = '';
  if (mysqli_connect_errno()) {
        echo "Falló la conexión: ".mysqli_connect_error();
        }
  if(empty($_GET['busca'])){

      $sql = "SELECT
              count(idpacientes)
              FROM pacientes";
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

      $sql = "SELECT  estudio,
                      fecha,
                      medicos_idmedicos,
                      idpropio
              FROM analisis";
      $query = mysqli_query($con, $sql);



       $sqlcuenta = "SELECT
              count(idpropio)
              FROM analisis";
      $resultado = mysqli_query($con, $sqlcuenta);
      $registros = mysqli_fetch_row($resultado);
      $registros = $row[0];

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

    }else{
          $pac = $_GET['busca'];
          $search = '%'.$pac.'%';
          $sql = "SELECT
                   idpacientes,
                   nombre
                  FROM pacientes
                  WHERE nombre LIKE '$search'" ;
          $query = $con -> query($sql);
    }


     if($registros!= null){

         $idpropio = 0;

      while ($fila = mysqli_fetch_array($query, MYSQLI_ASSOC)){

      $sql1 = "SELECT nombre
              FROM   medicos
              where  idmedicos = '$fila[medicos_idmedicos]'";
               $query1 = mysqli_query($con, $sql1);
               $fila1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);

 ?>
        <tr>
        <?php if($idpropio !=  $fila['idpropio'] ) { ?>
          <td><?php echo $fila['estudio']; ?></td>
          <td><?php echo $fila['fecha']; ?></td>
          <td><?php echo $fila1['nombre']; ?> </td>
          <td><a class="text" href= "analisis.php?p=<?php echo $_GET['p']?> & pro=<?php echo $fila['idpropio'] ?> " ><strong>Editar</strong></a> </td>
        </tr>
         <?php $idpropio = $fila['idpropio'];  } ?>
<?php }
  mysqli_close($con);
}
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
  sorter.init("sorter",0);
</script>

</body>
</html>
