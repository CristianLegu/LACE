<?php
  include("includes/conexion.php");
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Pacientes - LACE</title>
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>

</head>
<?php
  include("includes/conexion.php");

  $con = mysqli_connect($host, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }
/*Verifica si el campo busca esta vacio*/
    if(empty($_GET['p'])){
            $pac = ' ';
          }

    else{
        $pac = $_GET['p'];  
        }

        $sql = "SELECT *
                  FROM pacientes
                  WHERE idpacientes = '$pac'" ;

         $query  = mysqli_query($con, $sql);
         $fila   = mysqli_fetch_array($query, MYSQLI_ASSOC);
 ?>
<body>
  <div id="wrapper">

    <span style="align: left;">
      <a href="menu.html">
       <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
     </a>
     <h1>Pacientes</h1>
   </span>

   <form action="guarda.php" method="post">

    <div class="col-2">
      <label>
        Nombre
        <input value="<?php echo $fila['nombre']; ?>" name="nombre" tabindex="1" required >
      </label>
    </div>
    <div class="col-2">
      <label>
        Dirección
        <input  name="direccion" tabindex="2" required value="<?php echo $fila['direccion']; ?>">
      </label>
    </div>

    <div class="col-3">
      <label>
        Ciudad
        <input  name="ciudad" tabindex="3" required value="<?php echo $fila['ciudad']; ?>">
      </label>
    </div>
    <div class="col-3">
      <label>
        Estado
        <input name="estado" tabindex="4" required value="<?php echo $fila['estado']; ?>">
      </label>
    </div>
    <div class="col-3">
      <label>
        Código Postal
        <input  name="cp" tabindex="5" value="<?php echo $fila['codigo_postal']; ?>">
      </div>

      <div class="col-4">
        <label>
          Teléfono
          <input  name="telefono" tabindex="6" type="tel"  placeholder="(XXX) XXX XX XX" 
            value="<?php echo $fila['telefono']; ?>">
        </label>
      </div>
      <div class="col-4">
        <label>
          Fecha de Nacimiento
          <input  name="nacimiento" tabindex="7" required value="<?php echo $fila['fec_nac']; ?>">
        </label>
      </div>
      <div class="col-2">
        <label>
          Email
          <input  name="email" tabindex="8" value="<?php echo $fila['email']; ?>">
        </label>
      </div>
      <div class="col-2">
       <label>Sexo</label>
         <center  style="position:relative; margin-bottom:8px">
            <div class="onoffswitch">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
              <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </center>
      </div>
     <div class="col-2">
      <label>
        Tipo de sangre 
        <input  name="sangre" tabindex="9" value="<?php echo $fila['tipo_sangre']; ?>">
      </label>
    </div>
   <?php
      session_start();
      $_SESSION['value'] = 'PA';
    ?>

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
