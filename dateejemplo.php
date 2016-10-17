<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
  <script>
        $( document ).ready(function() {
            $('#fecha').datepicker();
        });
  </script>

</head>
<body>
 <form action="" method="post">
    <input type="text" id="fecha" name="fecha" />
 </form>

 <?php
 	if (isset($_POST['date']) && !empty($_POST['date'])) {
 		
 		$dateprev = date_create($_POST['date']);
    $date     = date_format($dateprev, 'Y-m-d');
    echo $date;


 	}
 ?>
 
</body>
</html>