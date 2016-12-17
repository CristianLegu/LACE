
<!doctype html>
 <html>  
      <head>  
           <title>Análisis</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name" method="post" action="index.php">  
                      <div >
    <label >
      Área
      <input name="area" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
      <label >
      Departamento
      <input name="departamento" style="background-color:powderblue; ">
    </label>
  </div>
    <div >
      <label >
      Estudio
      <input name="estudio" style="background-color:powderblue; ">
    </label>
  </div>
        
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="pruebas[]" placeholder="Prueba" class="form-control name_list" /></td>  
                                         <td><input type="text" name="resultado[]" placeholder="Resultado" class="form-control name_list" /></td>  
                                         <td><input type="text" name="unidades[]" placeholder="Unidades" class="form-control name_list" /></td>  
                                         <td><input type="text" name="valorreferencia[]" placeholder="Valor de referencia" class="form-control name_list" /></td>  
                                         <td><input type="text" name="comentario[]" placeholder="Comentario" class="form-control name_list" /></td> 
                                         <td><input type="text" name="observaciones[]" placeholder="Observaciones" class="form-control name_list" /></td> 
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Aregar</button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                                 <button class="submitbtn">GUARDAR</button>
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
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