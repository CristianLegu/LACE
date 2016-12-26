<?php
  include("includes/conexion.php");

?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Proveedores - LACE</title>
<link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles2.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
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
<?php


  $con = mysqli_connect($host, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }
    foreach($_GET as $loc=>$item) $_GET[$loc] = urldecode(base64_decode($item));
/*Verifica si el campo busca esta vacio*/
    if(empty($_GET['prov'])){
            $pac = ' ';
            session_start();
              $_SESSION['valueF'] = 'PROVEEDOR';
          }

    else{
        $pac = $_GET['prov'];
        session_start();
               $_SESSION['valueF'] = 'PROVEEDORUP';
               $_SESSION['idup'] = $pac;
        }

        $sql = "SELECT *
                  FROM Proveedores
                  WHERE idproveedores = '$pac'" ;

         $query  = mysqli_query($con, $sql);
         $fila   = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
  <div id="wrapper">

<span style="align: left;">
<a href="menu_proveedores.php">
	<img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
</a>
	<h1>Proveedores</h1>
</span>

  <form action="guarda.php" method="post" autocomplete="off">

  <div class="col-2">
    <label>
      Nombre
      <input  name="nombre" tabindex="1" required value="<?php echo utf8_encode($fila['nombre']); ?>" style="text-transform:capitalize;">
    </label>
  </div>
  <div class="col-2">
    <label>
      Dirección
      <input  name="direccion" tabindex="2" required value="<?php echo utf8_encode($fila['direccion']); ?>" style="text-transform:capitalize;">
    </label>
  </div>

  <div class="col-3">
    <label>
      Teléfono 1
      <input placeholder="XXX XXX XX XX" pattern="[0-9 | \s]*" name="telefono" tabindex="3" value="<?php echo utf8_encode($fila['telefono_uno']); ?>">
    </label>
  </div>
  <div class="col-3">
    <label>
      Teléfono 2
      <input    name="telefono2" tabindex="4" placeholder="XXX XXX XX XX" pattern="[0-9 | \s]*" value="<?php echo utf8_encode($fila['telefono_dos']); ?>">
    </label>
  </div>
  <div class="col-3">
    <label>
      R.F.C
       <input  name="rfc" tabindex="5" maxlength="13" required value="<?php echo utf8_encode($fila['rfc_prov']); ?>" style="text-transform:uppercase;">
  </div>

  <div class="col-4">
    <label>
      Página Web
      <input  name="web" tabindex="6" value="<?php echo utf8_encode($fila['pag_web']); ?>" style="text-transform:lowercase;">
    </label>
  </div>
  <div class="col-4">
    <label>
      E-mail
      <input  type="email" name="email" tabindex="7" placeholder="nombre@dominio.com" value="<?php echo ($fila['e_mail']); ?>" style="text-transform:lowercase;">
    </label>
  </div>

  <div class="col-submit">
    <button type="submit" class="submitbtn">Guardar</button>
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
