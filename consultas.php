<?php
session_start();
error_reporting(0);

mysql_connect("localhost", "livecamp_cy", "Cop@yermo2014");
mysql_select_db("livecamp_registros");

function ProtectVars($str)
{
  $str = addslashes($str);
  $str = mysql_real_escape_string($str);
  $str = htmlspecialchars($str);
  return $str;
}

foreach($_POST as $param => $value)
{
  $_POST[$param] = ProtectVars($value);
}
foreach($GET as $param => $value)
{
  $_GET[$param] = ProtectVars($value);
}

if(isset($_POST['Username']) && isset($_POST['Password']))
{
  $U = $_POST['Username'];
  $P = $_POST['Password'];
  $Fail = false;
  
  $GetUser = mysql_query("SELECT * FROM members WHERE username = '$U' AND password = '".md5($P)."'");
  if(empty($U) || empty($P))
  {
    echo '<center> <strong>Los datos estan vacios</strong> </center>';
  }
  elseif(mysql_num_rows($GetUser) == 0)
  {

    
    echo '<center><strong>El usuario no existe o la contraseña es incorrecta</strong></center>';
    $Fail = true;
  }
  if($Fail == false)
  {
    if(mysql_num_rows($GetUser) > 0)
    {
      $_SESSION['Username'] = $U;
      $_SESSION['Password'] = $P;
    }
  }
}

if(isset($_SESSION['Username']) && isset($_SESSION['Password']))
{
  $SU = $_SESSION['Username'];
  $SP = $_SESSION['Password'];
  
  $GetUser = mysql_query("SELECT * FROM members WHERE username = '$SU' AND password = '".md5($SP)."'");
  if(mysql_num_rows($GetUser) > 0)
  {
    $lml = mysql_fetch_assoc($GetUser);
    define("User", true);
  }
} else {
  define("User", false);
}

if(isset($_POST['RUsername']) && isset($_POST['ROPassword']) && isset($_POST['RTPassword']))
{
  $RU = $_POST['RUsername'];
  $ROP = $_POST['ROPassword'];
  $RTP = $_POST['RTPassword'];
  $Fail = false;
  
  $GetUser = mysql_query("SELECT * FROM members WHERE username = '$RU'");
  if(mysql_num_rows($GetUser) > 0)
  {
    echo "<center><strong>El usuario $RU ya existe, por favor elige otro </strong></center><br>";
    $Fail = true;
  }
  elseif(empty($RU) || empty($ROP) || empty($RTP))
  {
    echo '<center><strong>Algun dato esta vacio </strong></center><br>';
    $Fail = true;
  }
  elseif($RTP !== $ROP)
  {
    echo '<center><strong>Las dos contraseñas no son iguales </strong></center><br>';
    $Fail = true;
  }
  if($Fail == false)
  {
    mysql_query("INSERT INTO members (username, password) VALUES ('$RU', '".md5($ROP)."')");
    echo '<center><strong>Tu usuario ha sido registrado </strong></center> <br><meta http-equiv="Refresh" content="2;URL=./" />';
  }
}

if($_GET['action'] == 'exit')
{
  session_destroy();
  echo '<meta http-equiv="Refresh" content="0;URL=./" />';
}
?>
  <?php  if(User == true) { ?>
  <label style="font-size: 30px; font-family: Segoe UI;">Bienvenido</label><br>
  <b>Hola, <?php echo $lml['username'];
  echo "<br>";
      

   ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consultas</title>
</head>
<body>

<form action="consultas.php" method="post">

<div class="container">
  <di class="hero-unit">
  <table>
    <tr>
 
      <td><label>Escuela de procedencia &nbsp</label></td>
        <td><select name="procedencia" id="procedencia">
          <option value="Elije una opción">Elije una opción</option>
          <option value="Esc. Hispano Mexicano">Esc. Hispano Mexicano</option>
          <option value="Esc. Educación y Patria">Esc. Educación y Patria</option>
          <option value="Esc. Guadalupe Victoria">Esc. Guadalupe Victoria</option>
          <option value="Esc. Victoria">Esc. Victoria</option>
          <option value="Esc. Hidalgo">Esc. Hidalgo</option>
          <option value="Esc. Yermo y Parres">Esc. Yermo y Parres</option>
          <option value="Esc. Asilo San Luis">Esc. Asilo San Luis</option>
          <option value="Esc. Asilo Santa María">Esc. Asilo Santa María</option>
          <option value="Esc. Frontera">Esc. Frontera</option>
          <option value="Esc. Miguel Hidalgo">Esc. Miguel Hidalgo</option>
        </select> 
        </td>
      <td><input type="submit" value="Buscar"> </td>

    </tr>
  
  </table>
  </di>
</div>



<?php
$conexion=mysql_connect("localhost","livecamp_cy","Cop@yermo2014") or 
  die("Problemas al conectarse");

mysql_select_db("livecamp_registros",$conexion) or
  die("Problemas con la selección en la base de datos");

$registros=mysql_query("SELECT nombre, apellidos, deporte, categoria, rama, rango, aseguradora, folio FROM datos  WHERE procedencia='$_REQUEST[apellidos]'",$conexion) or
  die("Problemas en el select:".mysql_error());

if ($reg=mysql_fetch_array($registros))
{
  echo "Nombre: ".$reg['nombre']."<br>";
  echo "apellidos: ".$reg['apellidos']."<br>";
  echo "Edad: ".$reg['deporte']."<br>";
  echo "Fecha: ".$reg['categoria']."<br>";
  echo "Genero: ".$reg['rama']."<br>";
  echo "Curp: ".$reg['rango']."<br>";
  echo "Ciudad: ".$reg['aseguradora']."<br>";
  echo "Municipio: ".$reg['folio']."<br>";

}
else
{
  echo "Alumno no encontrado.";

}




?>



  
</body>
</html>


  <?php
echo "<br><a href=registro.php>Regresar al menu Principal</a>";
echo "<br><a href=registro.php?action=exit>Cerrar Sesion</a>";
} else {
echo "<h2>No Puedes Ver Esta Pagina, Registrate e inicia sesion</h2><br>";
echo '<meta http-equiv="Refresh" content="0;URL=./" />';

}
?>