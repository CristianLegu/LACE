<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
</head>
<body>
<?php
//declaro las funciones que encripta y desencripta la url

function encode_this($string) 
{
$string = utf8_encode($string);
$control = "qwerty"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
$string = $control.$string.$control; //concateno la llave para encriptar la cadena
$string = base64_encode($string);//codifico la cadena
return($string);
} 

function decode_get2($string)
{
$cad = split("[?]",$string); //separo la url desde el ?
$string = $cad[1]; //capturo la url desde el separador ? en adelante
$string = base64_decode($string); //decodifico la cadena
$control = "qwerty"; //defino la llave con la que fue encriptada la cadena,, cambiarla por la que deseamos usar
$string = str_replace($control, "", "$string"); //quito la llave de la cadena

//procedo a dejar cada variable en el $_GET
$cad_get = split("[&]",$string); //separo la url por &
foreach($cad_get as $value)
{
$val_get = split("[=]",$value); //asigno los valosres al GET
$_GET[$val_get[0]]=utf8_decode($val_get[1]);
}
}


//antes de escribir el link encripto la parte de la url que va a contener las variables

$id = encode_this("cx=011073350778563559219 3A9m-vckb5bdk&cof=FORID 3A11&ie=ISO-8859-1&q=encriptar+url&sa=Buscar&siteurl=www.desarrolloweb.com 2Fwiki 2F");

//escribo el link 
echo "<a href='encritar_envio_url.php?".$id."'>Realizar Pruebas</a>"; //hay que armar el link de esta forma



if($_GET)
{	
//recibo la url la decodifico y la dejo en la variable $_GET
decode_get2($_SERVER["REQUEST_URI"]); 
echo "<br>";
//ya puedo hacer uso de la variable $_GET


//Ejemplos
// imprimo la variable $_GET
print_r($_GET);

echo "<br><br><br>";
//accedo a un valor de la variable	
echo "siteurl = ". $_GET[siteurl];
echo "<br>cof = ". $_GET[cof];
}

?>
</body>
</html>