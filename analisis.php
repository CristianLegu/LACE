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
    $idpropio = 1;
		$sql    = "SELECT * FROM analisis where idpropio = '$idpropio' "; 
        $query  = mysqli_query($mysqli, $sql);
        $fila = $mysqli->query($sql);
        $fila1 = mysqli_fetch_array($query);
		mysqli_close($mysqli);
          ?>
                 <script language='javascript'>
				  var i = 1;
					
				  
			</script>	
<!doctype html>
 <html lang="en-US">  
      <head>  
           <title>Análisis</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <meta charset="utf-8">
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <h2 align="center">Análisis</h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name" method="post" action="index.php">  
                     
                     <div >
    					<label >
      					  Área
      						<input name="area" value="<?php if($fila1 != null) { echo $fila1 [1]; }?>" style="background-color:powderblue; ">
    					</label>
  					 </div>
  					 <div >
      					<label >
      					  Departamento
      						<input name="departamento" value="<?php if($fila1 != null) { echo $fila1 [2]; }?>" style="background-color:powderblue; ">
    					</label>
  					 </div>
    				 <div >
      					<label >
     					  Estudio
    						  <input name="estudio" value="<?php if($fila1 != null) { echo $fila1 [2]; }?>" style="background-color:powderblue; ">
    					</label>
  					</div>
        
                          <div class="table-responsive">  
                              
                         <?php  if($fila == null) { ?>
                          <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="pruebas[]" placeholder="Prueba" class="form-control name_list"  /></td>  
                                         <td><input type="text" name="resultado[]" placeholder="Resultado" class="form-control name_list" /></td>  
                                         <td><input type="text" name="unidades[]" placeholder="Unidades" class="form-control name_list" /></td>  
                                         <td><input type="text" name="valorreferencia[]" placeholder="Valor de referencia" class="form-control name_list" /></td>  
                                         <td><input type="text" name="comentario[]" placeholder="Comentario" class="form-control name_list" /></td> 
                                         <td><input type="text" name="observaciones[]" placeholder="Observaciones" class="form-control name_list" /></td> 
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button></td>  
                                         
                                    </tr>  
                               </table>  
                               <?php 
      
                            
      }
      else{ ?>
         <table class="table table-bordered" id="dynamic_field">  
  <?php  while (  $row = mysqli_fetch_array($fila, MYSQLI_ASSOC)) {
  ?>                                              <?php $renglon = "row".$i; ?>
                                          <tr id="<?php echo $renglon; ?>" >  
                                         <td><input type="text" name="pruebas[]" placeholder="Prueba" class="form-control name_list" value="<?php  echo $row ['prueba'] ?> " /></td>  
                                         <td><input type="text" name="resultado[]" placeholder="Resultado" class="form-control name_list" value="<?php  echo $row ['resultado'] ?> " /></td>  
                                         <td><input type="text" name="unidades[]" placeholder="Unidades" class="form-control name_list" value="<?php  echo $row ['unidades'] ?> " /></td>  
                                         <td><input type="text" name="valorreferencia[]" placeholder="Valor de referencia" class="form-control name_list" value="<?php  echo $row ['valorreferencia'] ?> " /></td>  
                                         <td><input type="text" name="comentario[]" placeholder="Comentario" class="form-control name_list" value="<?php  echo $row ['comentario'] ?> " /></td> 
                                         <td><input type="text" name="observaciones[]" placeholder="Observaciones" class="form-control name_list" value="<?php  echo $row ['observaciones'] ?> " /></td> 
                                         <?php if ($cont == 1) { ?>
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button></td>  
                                         <?php } else { ?>
										 <td><button type="button" name="remove" id="<?php echo $i; ?>" class="btn btn-danger btn_remove">X</button></td>
                                         <?php } ?>
                                    </tr>  
                             <script language='javascript'>
                           
				              var i = i + 1;
				             </script>	

                               <?php $cont++; $i++;
									} ?>
									   </table> 
     							<?php	 }   $i ;   ?>
                      
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="GUARDAR" />  
                                
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  

 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="pruebas[]" placeholder="Prueba" class="form-control name_list" /></td><td><input type="text" name="resultado[]" placeholder="Resultado" class="form-control name_list" /></td><td><input type="text" name="unidades[]" placeholder="Unidades" class="form-control name_list" /></td><td><input type="text" name="valorreferencia[]" placeholder="Valor de referencia" class="form-control name_list" /></td><td><input type="text" name="comentario[]" placeholder="Comentario" class="form-control name_list" /></td>  <td><input type="text" name="observaciones[]" placeholder="Observaciones" class="form-control name_list" /></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  



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