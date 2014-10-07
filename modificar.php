<HTML>
<HEAD>
<TITLE>Borrar2.php</TITLE>
<LINK href="hojadeestilo.css" rel="stylesheet" type="text/css">

</HEAD>
<BODY>
<?php 

$id =$_POST['id'];
$nombre_resp =$_POST['nombre_resp'];
$apellidos_resp =$_POST['apellidos_resp'];
$cel_resp =$_POST['cel_resp'];
$correo_resp =$_POST['correo_resp'];
$fb =$_POST['face'];
$tw =$_POST['twitter'];
$entrenador =$_POST['entrenador'];
$deporte =$_POST['deporte'];
$categoria =$_POST['categoria'];
$rama =$_POST['rama'];
$rango =$_POST['rango'];
$cinta =$_POST['cinta'];
$nombre =$_POST['nombre'];
$apellidos =$_POST['apellidos'];
$edad =$_POST['edad'];
$fecha =$_POST['fecha'];
$genero =$_POST['genero'];
$curp =$_POST['curp'];
$nivel =$_POST['nivel'];
$aseguradora =$_POST['aseguradora'];
$folio =$_POST['folio'];
$procedencia =$_POST['procedencia'];
$responsable =$_POST['responsable'];
$cel =$_POST['cel'];
$enfermedad =$_POST['enfermedad'];
$enfermedades =$_POST['enfermedades'];



  

$link= mysql_connect("localhost","livecamp_cy","Cop@yermo2014");
mysql_select_db("livecamp_registros",$link);
$sSQL= "UPDATE datos SET nombre_resp='$nombre_resp', apellidos_resp='$apellidos_resp', cel_resp='$cel_resp', correo_resp='$correo_resp', fb='$fb', tw='$tw', entrenador='$entrenador', deporte='$deporte', categoria='$categoria', rama='$rama', rango='$rango', cinta='$cinta', nombre='$nombre', apellidos='$apellidos', edad='$edad', fecha='$fecha', genero='$genero', curp='$curp',nivel='$nivel', aseguradora='$aseguradora', folio='$folio', procedencia='$procedencia', responsable='$responsable', cel='$cel',enfermedad='$enfermedad', enfermedades='$enfermedades' WHERE id='$id'";    
mysql_query($sSQL,$link);
mysql_close($link); 



 ?>

<h1><div align="center">Registro Modificado</div></h1>
<div align="center"><a href="bajas%20y%20modificaciones.php">Regresar</a></div>

</BODY>
</HTML>


