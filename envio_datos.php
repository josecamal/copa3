<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enviar correo</title>
</head>

<body> 

	



<?php 
error_reporting(0);

$rutaser="gafetes";
$ruttemp=$_FILES["imagen"]["tmp_name"];
$nombreImagen=$_FILES["imagen"]["name"];
$rutdest=$rutaser."/".$nombreImagen;
move_uploaded_file($ruttemp,$rutdest);

$nombre_resp = $_POST["nombre_resp"];
$apellidos_resp = $_POST["apellidos_resp"];
$cel_resp = $_POST["cel_resp"];
$correo_resp = $_POST["correo_resp"];
$fb = $_POST["face"];
$tw = $_POST["twitter"];

$entrenador = $_POST["entrenador"];
$deporte = $_POST["deporte"];
$categoria = $_POST["categoria"];
$rama = $_POST["rama"];
$cinta =$_POST["cinta"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$edad = $_POST["edad"];
$fecha = $_POST["fecha"];
$genero = $_POST["genero"];
$curp = $_POST["curp"];
$nivel = $_POST["nivel"];
$aseguradora = $_POST["aseguradora"];
$folio = $_POST["folio"];
$procedencia = $_POST["procedencia"];
$responsable = $_POST["responsable"];
$cel = $_POST["cel"];
$enfermedad = $_POST["enfermedad"];
$enfermedades = $_POST["enfermedades"];



$conexion=mysql_connect("localhost","root","")
or die("problemas en la conexion");
mysql_select_db("registros",$conexion) or
die("problemas en la seleccion de base de datos");
mysql_query("INSERT INTO datos(nombre_resp,apellidos_resp,cel_resp,correo_resp,fb,tw,entrenador,deporte,categoria,rama,cinta,nombre,apellidos,edad,fecha,genero,curp,nivel,aseguradora,folio,procedencia,responsable,cel,enfermedad,enfermedades,archivo)
values('{$nombre_resp}','{$apellidos_resp}','{$cel_resp}','{$correo_resp}','{$fb}','{$tw}','{$entrenador}','{$deporte}','{$categoria}','{$rama}','{$cinta}','{$nombre}','{$apellidos}','{$edad}','{$fecha}','{$genero}','{$curp}','{$nivel}','{$aseguradora}','{$folio}','{$procedencia}','{$responsable}','{$cel}','{$enfermedad}','{$enfermedades}','{$rutdest}')",$conexion);   

mysql_close($conexion);
echo"Registro Agregado Correctamente.";




  

  
 ?> 



	
</body>
</html>