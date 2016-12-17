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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
</head>
<?php

  $con = mysqli_connect($host, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }
/*Verifica si el campo busca esta vacio*/
    if(empty($_GET['p'])){
            $pac = ' ';
            session_start();
               $_SESSION['valueF'] = 'PACIENTES';
          }

    else{
        $pac = $_GET['p'];
        session_start();
               $_SESSION['valueF'] = 'PACIENTESUP';
               $_SESSION['idup'] = $pac;
        }

        $sql = "SELECT *
                  FROM pacientes
                  WHERE idpacientes = '$pac'" ;

         $query  = mysqli_query($con, $sql);
         $fila   = mysqli_fetch_array($query, MYSQLI_ASSOC);
         $nacimiento = utf8_encode($fila['fecha_nac']);
         if ($nacimiento != null) {
            list($año, $mes, $dia) = explode('-', $nacimiento);
        }
        else{
          $año = '';
          $mes = '';
          $dia = '';
        }
 ?>
<body>
  <div id="wrapper">

    <span style="align: left;">
      <a href="menu.html">
       <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
     </a>
     <h1>Pacientes</h1>
   </span>

   <form action="guarda.php" method="post" autocomplete="off">

    <div class="col-2">
      <label>
        Nombre
        <input value="<?php echo utf8_encode($fila['nombre']); ?>" name="nombre" tabindex="1" required >
      </label>
    </div>
    <div class="col-2">
      <label>
        Dirección
        <input  name="direccion" tabindex="2" required value="<?php echo utf8_encode($fila['direccion']); ?>">
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
        <input name="estado" tabindex="4" required value="<?php echo utf8_encode($fila['estado']); ?>">
      </label>
    </div>
    <div class="col-3">
      <label>
        Código Postal
        <input  name="cp" tabindex="5" maxlength="5" value="<?php echo utf8_encode($fila['codigo_postal']); ?>">
      </div>

      <div class="col-3">
        <label>
          Teléfono
          <input  name="telefono" tabindex="6" placeholder="XXX XXX XX XX"
            value="<?php echo utf8_encode($fila['telefono']); ?>" pattern="[0-9 | \s]*">

        </label>
      </div>
      <div class="col-3">
        <label >
          Fecha de Nacimiento
          <div id="date1" class="datefield" ><br><br>
     <input id="day" name="dia" maxlength="2" placeholder="DD"  value="<?php echo $dia; ?>" required/>  /
        <input id="month" name="mes" maxlength="2" placeholder="MM" value="<?php echo $mes; ?>"  required/> /
            <input id="year" name="anio" maxlength="4" placeholder="AAAA" value="<?php echo $año; ?>"  required/>
          </div>

        </label>
      </div>
      <div class="col-3">
        <label>
          Email
          <input  name="email" tabindex="8" value="<?php echo $fila['email']; ?>" type="email">
        </label>
      </div>
      <div class="col-3">
       <label>Sexo</label>
         <center  style="position:relative; margin-bottom:8px">
          <?php
                  if ($fila['sexo'] == 'M'){
                    $s = 'checked';
                  }
                  else{
                    $s = '';
                  }
          ?>
            <div class="onoffswitch">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"
              <?php echo $s; ?>>
              <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>

                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </center>
      </div>
     <div class="col-3">
      <label>
        Tipo de sangre
        <input  name="sangre" tabindex="9" value="<?php echo $fila['tipo_sangre']; ?>">
      </label>
    </div>

    <div class="col-3">
      <center id="dynamic_field">
        <button type="button" name="add" id="add" class="rfc">Agregar RFC</button>
      </center>
    </div>

    <div style="padding-left: 10px;" id="dynamic_field">
    </div>

    <div class="col-submit">
      <button type="submit" class="submitbtn">Guardar</button>
    </div>

  </form>

</body>
</html>

<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>

 <script type="text/javascript">
 var i=0;
 $(document).ready(function(){
      $('#add').click(function(){
        if(i==0){
           $('#dynamic_field').append(
             '<div class="col-1"> <label><input placeholder="Razón Social" id="razon"/></label></div>'+
             '<div class="col-1"> <label><input placeholder="RFC" id="rfc"/></label></div>'+
             '<div class="col-1"> <label><input placeholder="Dirección Fiscal" id="dir_fiscal"/></label></div>');
             document.getElementById("add").style.background='#CE0202';
              $('#add').remove();
             i=1;
        }
      });


 });

 </script>

<script type="text/javascript">
  $('#date1 input').autotab_magic().autotab_filter('numeric');
  $('#date1 input').datepicker()
</script>
