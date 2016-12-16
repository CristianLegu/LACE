<?php
  include("includes/conexion.php");

  session_start();
   $_SESSION['valueF'] = 'PRODUCTOS';
   $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }  
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Productos | LACE</title>
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>

</head>

<body>

  <div id="wrapper">

    <span style="align: left;">
      <a href="menu.php">
       <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
     </a>
     <h1>Productos</h1>
   </span>

   <form action="guarda.php" action="guarda.php" method="post">

    <div class="col-3">
      <label>
        Nombre Producto
        <input  name="nombre_art" tabindex="1" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Cantidad
        <input  name="cantidad" tabindex="2" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Costo
        <input  name="Costo" tabindex="3" required>
      </label>
    </div>

    <div class="col-3">
      <label>
        Unidad de Medida
      <select tabindex="4" name="u_medida">
        <option>Lts.</option>
        <option>M</option>
        <option>30-40 hrs per week</option>
      </select>
      </label>
  </div>
    <div class="col-3" >
        <label>
          Fecha Stock
          <div  id="fechastock" class="datefield" ><br><br>
     <input id="day" name="diafechastock" maxlength="2" placeholder="DD"  value="" required/>  /              
        <input id="month" name="mesfechastock" maxlength="2" placeholder="MM" value=""  required/> /
            <input id="year" name="aniofechastock" maxlength="4" placeholder="AAAA" value=""  required/> 
        
          </div>

        </label>
 </div>
        <div class="col-3"> 
 <select id="idproveedor"  name="idproveedor" >
        <option  value="0">Seleccionar Proveedor</option>
        <?php
                  
          $query = $con -> query ("SELECT idproveedores, nombre FROM proveedores");
                      
          while ($valores = mysqli_fetch_array($query)) {                        
            echo '<option value="'.$valores[idproveedores].'">'.$valores[nombre].'</option>';

          }
        ?>
      </select>
      
   </div >
     
          <div class="col-3">
        <label>
          Fecha Inicio
          <div name="fechainicio" id="fechainicio" class="datefield"><br><br>
     <input id="day" name="diafechainicio" maxlength="2" placeholder="DD"  value="" required/>  /              
        <input id="month" name="mesfechainicio" maxlength="2" placeholder="MM" value=""  required/> /
            <input id="year" name="aniofechainicio" maxlength="4" placeholder="AAAA" value=""  required/> 
        
          </div>

        </label>
      </div>
          <div class="col-3">
        <label>
          Fecha Termino
          <div name="fechatermino" id="fechatermino" class="datefield"><br><br>
     <input id="day" name="diafechatermino" maxlength="2" placeholder="DD"  value="" required/>  /              
        <input id="month" name="mesfechatermino" maxlength="2" placeholder="MM" value=""  required/> /
            <input id="year" name="aniofechatermino" maxlength="4" placeholder="AAAA" value=""  required/> 
        
          </div>

        </label>
      </div>
          <div class="col-3">
        <label>
          Fecha Caducidad
          <div name="fechacaducidad" id="fechacaducidad" class="datefield"><br><br>
     <input id="day" name="diafechacaducidad" maxlength="2" placeholder="DD"  value="" required/>  /              
        <input id="month" name="mesfechacaducidad" maxlength="2" placeholder="MM" value=""  required/> /
            <input id="year" name="aniofechacaducidad" maxlength="4" placeholder="AAAA" value=""  required/> 
        
          </div>

        </label>
      </div>
    <div class="col-3">
      <label>
        Cotro Prueba
        <input  name="costo_prueba" tabindex="9" required>
      </label>
    </div>
        <div class="col-3">
      <label>
        marca
        <input  name="marca" tabindex="10" required>
      </label>
    </div>

    <div class="col-3">
      <label>
        Prueba Kit
        <input  name="prueba_kit" tabindex="11" required>
      </label>
    </div>

    <div class="col-submit">
      <button type="submit" class="submitbtn">Guardar</button>
    </div>

  </form>

<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>
