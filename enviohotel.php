<?php 
$escuela =$_POST['escuela'];
$hoteluno=$_POST['hoteluno'];
$cantidaduno=$_POST['cantidaduno'];
$hoteldos= $_POST['hoteldos'];
$cantidaddos=$_POST['cantidaddos'];
$hoteltres=$_POST['hoteltres'];
$cantidadtres=$_POST['cantidadtres'];





$conexion=mysql_connect('localhost','livecamp_cy','Cop@yermo2014')
  or die("Problemas en la conexion");
mysql_select_db("livecamp_registros",$conexion) or
  die("Problemas en la seleccion de la base de datos");
mysql_query("INSERT INTO hoteles(escuela,hoteluno,cantidaduno,hoteldos,cantidaddos,hoteltres,cantidadtres) 
	values('$escuela','$hoteluno','$cantidaduno','$hoteldos','$cantidaddos','$hoteltres','$cantidadtres')",$conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);
echo "<h1>Hotel Resgistrado con exito</h1>";
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