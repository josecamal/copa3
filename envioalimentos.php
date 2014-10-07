<?php 

$escuela=$_POST['escuela'];
$desayuno=$_POST['desayuno'];
$almuerzo=$_POST['almuerzo'];
$cena=$_POST['cena'];




$conexion=mysql_connect('localhost','livecamp_cy','Cop@yermo2014')
  or die("Problemas en la conexion");
mysql_select_db("livecamp_registros",$conexion) or
  die("Problemas en la seleccion de la base de datos");
mysql_query("INSERT INTO alimentacion(escuela,desayuno,almuerzo,cena) 
	values('$escuela','$desayuno','$almuerzo','$cena')",$conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);
echo " <h1>se guardaron los datos con exito</h1>";
 ?>
 <html>
<head>
<script>
var url="superuser.php"
function redirecionar(){
	location.href=url
}
setTimeout("redirecionar()",1000);
	</script>
</head>
<title></title>
<body></body>
</html>