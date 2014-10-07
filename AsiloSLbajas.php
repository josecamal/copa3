<?php
session_start();
error_reporting(0);

mysql_connect("localhost", "root", "");
mysql_select_db("registros");

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
  <b><i class="icon-blue icon-user"></i>Hola, <?php echo $lml['username'];
  echo "<br>";
      

   ?>
<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Sistema de Registro Copa Yermo" />
    
    
    <link rel="stylesheet" href="css/default_layout.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.min.css">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="js_libs/jquery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js_libs/jquery/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="js_libs/bootstrap/jquery-1.8.2.min.js"></script>
  

  </head>

  <body>
  <div class="container">
    <div class="navbar navbar-inverse">
      
    </div>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

 
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <title>Bajas Y Modificaciones</title>
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" href="css/estilos.css">
  
  <!--  API -->

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 40 }
      #map_canvas { height: 100% }
    </style>

    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAlqjh0XU-2ZSxA4jRgqqYnj4fnzL0zQRc&sensor=false">
    </script>
</head>

<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner" >
      <div class="container">
        <a href="#" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar" href="index.php"> </span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a href="index.php" class="brand">Escuela Particular Inc. Miguel Hidalgo</a>
        <div class="nav-collapse">
          <ul class="nav">
            
            <li ><a href="http://www.miguelhidalgocam.edu.mx/">Página Principal</a> </li>
            
            <li><a href="registro.php">Inicia Sesión</a></li>
            <li><a href="convocatorias.php">Convocatorias</a></li>

            

            
          </ul>
        </div>  
      </div>
    </div>
  </div>
  
  
<div class="container" id="cont_formularios">
 <h2>Bajas Y Modificaciones</h2>
      <?php
  /*nos conectamos ala base de datos*/
$conexion= mysql_connect("localhost", "root", "");
if(!$conexion) die ("error al conectar a la base de datos <br/>".mysql_error());
mysql_select_db("registros") OR die ("errorde conexion a la abase de datos");
/*realizamos la consulta ala base de datos*/
$sql="select * from datos where procedencia ='Esc. Asilo San Luis'";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die ("no hay ningun registro para mostrar");

/*despelegamos los registros uno por uno en la tabla*/
echo "<table border=5  cellpadding=6 cellspacing=0 > ";

/*desplegamos los encabaezados,calle 12 numero 57 y 19 samula casa de 2 pisos color blanco  esquina expendio y escuela */
echo "<tr>
   <th colspan=10>Datos de los participantes</th>
   <tr>
   <th></th><th>Nombre</th> <th>Apellidos</th><th>curp</th>
   <th>edad</th><th bgcolor=>fecha De Nacimiento</th><th>Sexo</th><th>Escuela</th><th>Bajas</th><th>Modificar</th></tr>";
   /*los datos*/
   while($row= mysql_fetch_array($result))
   {
    echo"<tr>
    <td></td>
    <td>$row[nombre]</td>
    <td>$row[apellidos]</td> 
    <td>$row[curp] </td>
    <td>$row[edad]</td>
    <td>$row[fecha]</td>
    <td>$row[genero]</td>
    <td>$row[procedencia] </td>

  <td> 
   
    

    <a href=eliminar2.php?id=".$row['ID']." ><img src='eliminar.png' alt='eliminar' width='30' height='30' align='middle' class='icon' title='eliminar'></a> 
      </div> </td>
   



<td>

 <a href=modificaciones.php?id=".$row['ID']."><img src='modificar.png' alt='modificar' width='30' height='30' align='middle' class='icon' title='modificar'></a>  
  
  </div> </td>

     </tr>";


    }
    echo"</table>";
?>



  </div>  
</script>
    <script type="text/javascript" src="js_libs/bootstrap/jquery-ui-1.10.3.custom.js"></script>
  <script type="text/javascript" src="js_libs/bootstrap/validar.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/jquery-ui-1.10.3.custom.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/jquery-ui-1.10.3.custom.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/validar.css">
  
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

