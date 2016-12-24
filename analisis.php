<?php   include("includes/conexion.php");
         $mysqli = mysqli_connect($host, $user, $pwd, $db);
      if (mysqli_connect_errno()) {
      // echo "Falló la conexión:".mysqli_connect_error();
      }
          else{
      // echo "Error ".mysqli_error($mysqli);
       }
  $cont = 1;
  $i = 1;
  if ($_GET['pro'] != 0){


    $idpropio = $_GET['pro'];
		$sql    = "SELECT * FROM analisis where idpropio = '$idpropio' ";
        $query  = mysqli_query($mysqli, $sql);
        $fila = $mysqli->query($sql);
        $fila1 = mysqli_fetch_array($query);
		mysqli_close($mysqli);
          ?>

		<?php    }
		else{ $fila = null;
         $fila1 = null;}?>

				   <script language='javascript'>
				  var i = 1;
			</script>
<!doctype html>
 <html lang="en-US">
      <head>
           <title>Análisis</title>
           <script src="js/jquery.min.js"></script>
           <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
           <link rel="shortcut icon" href="img/icon.png">
 		       <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
           <meta charset="utf-8">
      </head>
      <body>
      <span style="align: left;">
        <a href="menu_pacientes.php">
	        <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
        </a>

        <h1 align="center">Análisis</h1>
      </span>
           <div class="container">
                <div class="form-group">
                     <form name="add_name" id="add_name" method="post" action="agrega_analisis.php " ALIGN=center>
      <div>

      <label >
         <select id="idmedico"  name="idmedico" >

        <option  value="<?php $idmedico ?>" >Seleccionar Médico</option>
        <?php
          $mysqli = mysqli_connect($host, $user, $pwd, $db);
          $querymedicos = $mysqli -> query ("SELECT idmedicos, nombre FROM medicos");

          while ($valores =  mysqli_fetch_array($querymedicos, MYSQLI_ASSOC)) {
            echo '<option value="'.$valores[idmedicos].'">'.$valores[nombre].'</option>';
          }
          mysqli_close($mysqli);
        ?>
        </select>
      </label>
      </div>
      <div>
    	 <label>
      				Área
      			  <input name="area" value="<?php if($fila1 != null) { echo $fila1 [1]; }?>" style="background-color:powderblue; "required>
    	 </label>
  		 </div>
  				<div >
      			<label >
      					Departamento
      					<input name="departamento" value="<?php if($fila1 != null) { echo $fila1 [2]; }?>" style="background-color:powderblue; "required>
    				</label>
  				</div>
    	    <div >
      			<label >
     					  Estudio
    						<input name="estudio" value="<?php if($fila1 != null) { echo $fila1 [3]; }?>" style="background-color:powderblue; "required>
    				</label>
  				</div>

          <div class="table-responsive">

<?php  if($fila == null) { ?>
          <table class="table table-bordered" id="dynamic_field">
            <tr>
              <td><input type="form-control"  name="pruebas[]" placeholder="Prueba" class="form-control name_list"   /></td>
              <td><input type="form-control" name="resultado[]" placeholder="Resultado" class="form-control name_list" /></td>
              <td><input type="form-control" name="unidades[]" placeholder="Unidades" class="form-control name_list" /></td>
              <td><input  type="form-control" name="valorreferencia[]" placeholder="Valor de referencia" class="form-control name_list" /></td>

              <td><input  type="form-control" name="observaciones[]" placeholder="Observaciones" class="form-control name_list" /></td>
              <td><button type="button" name="add" id="add" class="agregar">Agregar</button></td>
            </tr>
          </table>
<?php
      }
      else{ ?>
         <table class="table table-bordered" id="dynamic_field">
  <?php  while (  $row = mysqli_fetch_array($fila, MYSQLI_ASSOC)) {
  ?>                                              <?php $renglon = "row".$i; ?>
                                          <tr id="<?php echo $renglon; ?>" >
                                         <td><input type="form-control" name="pruebas[]" placeholder="Prueba" class="form-control name_list" value="<?php  echo $row ['prueba'] ?> " /></td>
                                         <td><input  type="form-control" name="resultado[]" placeholder="Resultado" class="form-control name_list" value="<?php  echo $row ['resultado'] ?> " /></td>
                                         <td><input type="form-control" name="unidades[]" placeholder="Unidades" class="form-control name_list" value="<?php  echo $row ['unidades'] ?> " /></td>
                                         <td><input  type="form-control" name="valorreferencia[]" placeholder="Valor de referencia" class="form-control name_list" value="<?php  echo $row ['valorreferencia'] ?> " /></td>

                                         <td><input  type="form-control" name="observaciones[]" placeholder="Observaciones" class="form-control name_list" value="<?php  echo $row ['observaciones'] ?> " /></td>
                                         <?php if ($cont == 1) { ?>
                                         <td><button type="button" name="add" id="add" class="agregar">Agregar</button></td>
                                         <?php } else { ?>
										                    <td><button type="button" name="remove" id="<?php echo $i; ?>" class="eliminar btn_remove">X</button></td>
                                         <?php } ?>

                                    </tr>
                             <script language='javascript'>

				              var i = i + 1;
				             </script>

                               <?php $cont++; $i++;
									} ?>
									   </table>
     							<?php	 }   $i ;   ?>




                          </div>

              <div >
              <label >
                  Comentarios
                  <input name="comentario" value="<?php if($fila1 != null) { echo $fila1 [8]; }?>"  style="background-color:powderblue; ">

              </label>
             </div>
              <input name="idpropio" value="<?php if($fila1 != null) { echo $idpropio; } else {$idpropio = 0; echo $idpropio;}?>"  style='display:none;'>
                      <button name="submit1"   class="guardar" >GUARDAR</button>
                     </form>
                </div>
           </div>

      </body>
 </html>

 <script>
 $(document).ready(function(){
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="form-control" name="pruebas[]" placeholder="Prueba" class="form-control name_list" /></td><td><input type="form-control" name="resultado[]" placeholder="Resultado" class="form-control name_list" /></td><td><input type="form-control" name="unidades[]" placeholder="Unidades" class="form-control name_list" /></td><td><input type="form-control" name="valorreferencia[]" placeholder="Valor de referencia" class="form-control name_list" /></td> <td><input type="form-control" name="observaciones[]" placeholder="Observaciones" class="form-control name_list" /></td> <td><button type="button" name="remove" id="'+i+'" class="eliminar btn_remove">X</button></td></tr>');

      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
      $('#submit').click(function(){
           $.ajax({
                url:"agrega_analisis.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                     alert(data);
                     $('#add_name')[0].reset();
                }
           });
      });
 });
 </script>
