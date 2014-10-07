<HTML>
<HEAD>
<TITLE></TITLE>
<LINK href="hojadeestilo.css" rel="stylesheet" type="text/css">

</HEAD>
<BODY>
<?php 


$id= $_GET['id'];


//Conexion con la base
$link = mysql_connect("localhost", "livecamp_cy", "Cop@yermo2014");

//selección de la base de datos con la que vamos a trabajar 
mysql_select_db("livecamp_registros");

//Creamos la sentencia SQL y la ejecutamos
$sSQL="DELETE FROM datos WHERE id ='$id' ";
mysql_query($sSQL,$link);


?>

<h1><div align="center">Registro Borrado</div></h1>
<div align="center"><a href="bajas%20y%20modificaciones.php">Regresar</a></div>

</BODY>
</HTML>