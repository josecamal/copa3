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
    echo '<center> <strong style="color:white; background:red;font-weight:bold;padding:4px;border-radius:4px;">Los datos estan vacios</strong> </center>';
  }
  elseif(mysql_num_rows($GetUser) == 0)
  {

    
    echo '<center><strong style="color:white; background:red;font-weight:bold;padding:4px;border-radius:4px;">El usuario no existe o la contraseña es incorrecta</strong></center>';
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
    echo '<center><strong>Tu usuario ha sido registrado </strong></center> <br><meta http-equiv="Refresh" content="2;URL=registro.php" />';
  }
}

if($_GET['action'] == 'exit')
{
  session_destroy();
  echo '<meta http-equiv="Refresh" content="0;URL=registro.php" />';
}
?>

<!-- Principal -->

<!DOCTYPE HTML>
<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Sistema para registro</title>
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

   <style type="text/css">

.container3 {
  margin: 0px auto;
  width: 640px;
  margin-top: 200px;
  border:2px solid red;
}
   

   </style>

    <style>
.google-maps {
position: relative;
padding-bottom: 55%; // This is the aspect ratio
height: 0;
overflow: hidden;
}
.google-maps iframe {
position: absolute;
top: 1;
left:2%!important;
height: 75% !important;
width: 95% !important;

}
</style>

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
						<li class="active"><a href="">Inicia Sesión</a></li>
						<li><a href="convocatorias.php">Convocatorias</a></li>

						

						
					</ul>
				</div>	
			</div>
		</div>
	</div>
<center>
	
		<div class="container">
			<?php if(User == false) { ?>
			
<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <title>Sistema para registro</title>
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" href="css/estilos.css">
  
  <!--  API -->

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style>
.google-maps {
position: relative;
padding-bottom: 55%; // This is the aspect ratio
height: 0;
overflow: hidden;
}
.google-maps iframe {
position: absolute;
top: 1;
left:2%!important;
height: 75% !important;
width: 95% !important;

}
</style>
    
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 40 }
      #map_canvas { height: 100% }
    </style>
    <style type="text/css">
    h1{
      color:white !important;
      width: 1000px;
      height: 40px;
      margin-top: -80px;
    }
    </style>

    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAlqjh0XU-2ZSxA4jRgqqYnj4fnzL0zQRc&sensor=false">
    </script>

    
</head>


<body>
      

  
  <div class="container">

    <div class="hero-unit">
      <br><h1 class="container">Sistema de Registro para Deportistas</h1>
      <div class="span4">
        
        
      <h3>¡Corre hasta alcanzar la meta!</3>
      <strong><h3>Ubicación de nuestro plantel</h3></strong>
      <div class="google-maps">
        
        <center> <iframe style="border-radius:50px" width="525" height="150" overflow:"scroll;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Asociacion+Miguel+Hidalgo,+A.C.,+Campeche,+M%C3%A9xico&amp;aq=0&amp;oq=asociacion+miguel&amp;sll=19.832,-90.555421&amp;sspn=0.003154,0.004823&amp;ie=UTF8&amp;hq=asociacion+miguel+hidalgo+ac&amp;hnear=Campeche,+M%C3%A9xico&amp;t=m&amp;ll=19.832439,-90.552835&amp;spn=0.009083,0.01339&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe><small>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;
       
  <a href="https://www.google.com/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Asociacion+Miguel+Hidalgo,+A.C.,+Campeche,+M%C3%A9xico&amp;aq=0&amp;oq=asociacion+miguel&amp;sll=19.832,-90.555421&amp;sspn=0.003154,0.004823&amp;ie=UTF8&amp;hq=asociacion+miguel+hidalgo+ac&amp;hnear=Campeche,+M%C3%A9xico&amp;t=m&amp;ll=19.832439,-90.552835&amp;spn=0.009083,0.01339&amp;z=16&amp;iwloc=A" style="color:white;text-align:left">Ver mapa más grande</a></small> </center>
      
      </div><br><br>



        <section class="container">
        <div class="login">
          <center>
            
            
<!-- Inicio de sesion -->
<form action="" method="POST">

              
              
              </form> 
          </section>

<strong></strong>
      
    </div>
    </div>

      
    
  </div></center></di></div>
<div>


    

    <center> 
    <footer>
      <table>
        <tr>
          <td><center> Escuela Particular Inc. Miguel Hidalgo <br> Avenida Lopez Mateos #337 Col. Prado <br> CP:24030 Tel:981-81-2-54-20 y 981-81-2-57-30</center></td>
          <td> <img src="img/escudo_colegio.png" width="60px" height="100px"></td>
          <td> <center>Elaborado por:</center><center> Edgar Vásquez  - Jose Caamal</center>
        Alumnos del Instituto Tecnológico de Campeche</td>
        </tr>
        </table>
    </footer>
  </center>
      <div class="container2" aling="center" >
    
      
        
          <form action="" method="POST">

            
          <table class="">

          <center></td></center>
          
            <table >

      <tr><h2>Inicia Sesión</h2>
        <tr><img src="img/logo_nuevo.png" width="200px" height="100px"></tr>
      <tr><td><label for=""></label></td>
        <td><input type="text" name="Username" placeholder="Escribe tu usuario" / class="u"> </td></tr>
      
      <tr>
        <td><label for=""></label> </td>
        <td><input type="password" name="Password" placeholder="Escribe tu contraseña" class="p" /></td>
      </tr>
      <tr>
        <td colspan="2"><center><input type="submit" value="iniciar sesion" class="btn btn-primary btn-medium" /> </center></td>
      </tr>
    </table>
            
            </center>
        </form>
      </div>
    


  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

  </div>
  
  
  </body>
  </html>
    </div>
	
	
	
		
<?php } 

  if(User == true) { 


  ?>
  <label style="font-size: 30px; font-family: Segoe UI;">Bienvenido</label><br>
  <b><i class="icon-blue icon-user"></i>Hola,<?php echo $lml['username'];
  echo "<br>";
      

   ?>

  </b><br>

    <center><h2>Seleccione una acción</h2></center>
    <br>
    <br><br><br><br><br>
    <br><br>
    <div class="">
    <table>
      <tr><td>
      
      <form action="formulario.php" method="POST">
      <center><div class="consulta">
        <h4>Registrar alumnos</h4>
        <input type="submit" value="Registrar" class="btn btn-primary btn-primary"></div></center>
        </form></td>
        <td> <?php 
    if ($lml['username']== "Yermo2014") {
      echo '<meta http-equiv="Refresh" content="0;URL=superuser.php" />';
    } 
    if ($lml['username']== "ed") {
      echo '<meta http-equiv="Refresh" content="0;URL=superuser.php" />';
    } 
      if ($lml['username']== "Hispano") {
      
      echo '<form action="pdf2/Hispano.php" method="POST" target="_blank">
      <center><div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary"  >
      </div></center>
    </form>';
    } if ($lml['username']== "Patria"){
      echo '<form action="pdf2/Patria.php" method="POST" target="_blank">
     <center> <div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary" >
      </div></center>
    </form>';


    } if ($lml['username']== "Guadalupe") {
        echo '<form action="pdf2/guadalupe_victoria.php" method="POST" target="_blank">
     <center> <div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary"></Center>
      </div></center>
    </form>';
      } if ($lml['username']== "Victoria") {
        echo '<form action="pdf2/victoria.php" method="POST" target="_blank">
      <center><div class="consulta">

        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Hidalgo") {
        echo '<form action="pdf2/Hidalgo.php" method="POST" target="_blank">
      <center><div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Yermo") {
        echo '<form action="pdf2/YermoyParres.php" method="POST" target="_blank">
      <center><div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Asilo") {
        echo '<form action="pdf2/AsiloSL.php" method="POST" target="_blank">
      <center><div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Frontera") {
        echo '<form action="pdf2/Esc_Frontera.php" method="POST" target="_blank">
     <center> <div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } 

      if ($lml['username']== "Mhidalgo") {
        
        echo '<form action="pdf2/Esc_MiguelHidalgo.php" method="POST" target="_blank">
     <center> <div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';


      } 

      if ($lml['username']== "Stmaria") {
        
        echo '<form action="pdf2/Asilo_StMaria.php" method="POST" target="_blank">
      <center><div class="consulta">
        <h4>Imprimir relacion de participantes</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';


      } 
?>
    
<tr><td>
       
        <?php 
    if ($lml['username']== "Yermo2014") {
      
    } 
    if ($lml['username']== "ed") {
      
    } 
      if ($lml['username']== "Hispano") {
      
      echo '<form action="hispanobajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary"  >
      </div></center>
    </form>';
    } if ($lml['username']== "Patria"){
      echo '<form action="bajasPatria.php" method="POST" >
     <center> <div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary" >
      </div></center>
    </form>';


    } if ($lml['username']== "Guadalupe") {
        echo '<form action="guadalupebajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-large">
      </div><center>
    </form>';
      } if ($lml['username']== "Victoria") {
        echo '<form action="victoriabajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Hidalgo") {
        echo '<form action="Hidalgobajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Yermo") {
        echo '<form action="bajas y modificaciones.php" method="POST">
      <center><div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Asilo") {
        echo '<form action="AsiloSLbajas.php" method="POST" >
     <center> <div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Frontera") {
        echo '<form action="Fronterabajas.php" method="POST" target=">
     <center> <div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } 

      if ($lml['username']== "Mhidalgo") {
        
        echo '<form action="MiguelHidalgobajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';


      } 

      if ($lml['username']== "Stmaria") {
        
        echo '<form action="StMariabajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Bajas Y Modificaciones</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';


      } 
?>
</td> <td>
  <?php 
    if ($lml['username']== "Yermo2014") {
      
    } 
    if ($lml['username']== "ed") {
      
    } 
      if ($lml['username']== "Hispano") {
      
      echo '<form action="hispanobajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary"  >
      </div></center>
    </form>';
    } if ($lml['username']== "Patria"){
      echo '<form action="bajasPatria.php" method="POST" >
     <center> <div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary" >
      </div></center>
    </form>';


    } if ($lml['username']== "Guadalupe") {
        echo '<form action="guadalupebajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-large">
      </div><center>
    </form>';
      } if ($lml['username']== "Victoria") {
        echo '<form action="victoriabajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Hidalgo") {
        echo '<form action="Hidalgobajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Yermo") {
        echo '<form action="bajas y modificaciones.php" method="POST">
      <center><div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Asilo") {
        echo '<form action="AsiloSLgafete.php" method="POST" >
     <center> <div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } if ($lml['username']== "Frontera") {
        echo '<form action="Fronterabajas.php" method="POST" target=">
     <center> <div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';
      } 

      if ($lml['username']== "Mhidalgo") {
        
        echo '<form action="MiguelHidalgobajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';


      } 

      if ($lml['username']== "Stmaria") {
        
        echo '<form action="StMariabajas.php" method="POST" >
      <center><div class="consulta">
        <h4>Ver Gafetes De Los Alumos</h4>
        <input type="submit" value="Consultar" class="btn btn-primary">
      </div></center>
    </form>';


      } 
?>
    </form></td></tr>


</div>

      </div>
      
    

    


    <div class="container2">
<center><tr><td>
	<tr><td>
</td></tr>
</table>
</tr>
</table></center>

</div>
<div class="container">
  
</div>

          
<br>
<a href="?action=exit" class="btn btn-danger btn-small"><i class="icon-white icon-off"></i> Cerrar sesión</a>
 
<br>
<br>
<br>
<br>
<br>

<hr>
  <center> 
    <footer>
      <table >
        <tr>
          <td><center> Escuela Particular Inc. Miguel Hidalgo <br> Avenida Lopez Mateos #337 Col. Prado <br> CP:24030 Tel:981-81-2-54-20 y 981-81-2-57-30</center></td>
          <td> <img src="img/escudo_colegio.png" width="60px" height="100px"></td>
          <td> <center>Elaborado por:</center><center> Edgar Vásquez  - Jose Caamal</center>
        Alumnos del Instituto Tecnológico de Campeche</td>
        </tr>
        
    </footer>
  </center>




  <?php 


} ?>












