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

    <script language=""="JavaScript">
    function conMayusculas(field) {
            field.value = field.value.toUpperCase()

       }
       </script>
       <script>
       function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
</script>       

  </head>

  <body>
  	<?php 


$id= $_GET['id'];


//Conexion con la base
$link = mysql_connect("localhost", "livecamp_cy", "Cop@yermo2014");

//selección de la base de datos con la que vamos a trabajar 
mysql_select_db("livecamp_registros");

//Creamos la sentencia SQL y la ejecutamos
$sSQL="SELECT*FROM datos WHERE id ='$id' ";
$datos=mysql_query($sSQL,$link);
$mostrar = mysql_fetch_array($datos);
?>
  <div class="container">
    <div class="navbar navbar-inverse">
      
    </div>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

 
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Registro de alumnos</title>
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
	
	<ul class="breadcrumb">
	<li></li>
  <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
  <li id="paso_a" class="negritas">Datos del responsable de la Delegación<span class="divider">/</span></li>
  <li id="paso_b" >Datos del deporte<span class="divider">/</span></li>
  <li id="paso_c">Datos alumno<span class="divider">/</span></li>

</ul>


<div class="container" id="cont_formularios">
	<div id="form_paso_a">

		<h2>Datos del Responsable de la Delegación</h2>
		<hr/>
       

		<form action="modificar.php" method="post" enctype="multipart/form-data">
			<table>
        	
			<tr>
			<td colspan="2"><h3><center><strong></strong>
			 </h3></center>
			</td>
			</tr>

			<tr>
			<td><label for="nom_resp">  Nombre(s) </label></td>
			<td> <input type="text" name="nombre_resp" id="nom_resp" REQUIRED autofocus onChange="conMayusculas(this)" value="<?php echo$mostrar['nombre_resp'];?>"> </td>
			<td><label for="apellidos_resp">&nbsp &nbsp &nbspApellidos(s)  </label></td>
			<td><input type="text" name="apellidos_resp" id="apellido_resp" required onChange="conMayusculas(this)" value="<?php echo$mostrar['apellidos_resp'];?>"></td>
			<td><label for="cel_resp"> &nbsp &nbsp &nbspCelular </label></td>
			<td><input type="text" name="cel_resp" id="cel_resp" REQUIRED onkeypress="return justNumbers(event);" value="<?php echo$mostrar['cel_resp'];?>"> </td>
        </tr>
     
        <tr>
			<td><label for="correo_resp"><center> Correo  electrónico &nbsp</center></label></td>
			<td><input type="text" name="correo_resp" id="correo_resp" REQUIRED value="<?php echo$mostrar['correo_resp'];?>"> </td>
			<td><label for="face_resp"> <center>&nbsp &nbsp Cuenta de  Facebook &nbsp</center></label></td>
			<td><input type="text" name="face" id="face" value="<?php echo$mostrar['face'];?>"> </td>
			<td><label for="twitter_resp"><center>&nbsp &nbsp Cuenta de  &nbspTwitter &nbsp </center></label></td>
			<td><input type="text" name="twitter" id="twitter_resp" placeholder="@usuario" value="<?php echo$mostrar['twitter'];?>"> </td>
            
		</tr>		
			</table>

			<br>
		<center><a id="go_paso_b" href="" class="btn btn-info btn-primary">Siguiente</a></center>
	</div>

	<div id="form_paso_b" class="hide">
		
<h2>Datos del deporte</h2>
<hr>
<table >
<tr>
            	<td><label for="entrenador">Nombre del Entrenador &nbsp</label> </td>
                <td><input type="text" name="entrenador" id="entrenador" onChange="conMayusculas(this)" / value="<?php echo$mostrar['entrenador'];?>"></td>
                <td> <label>&nbsp &nbsp &nbspDeporte </label></td>
				<td><input type="text" name="deporte" id="deporte" value="<?php echo$mostrar['deporte'];?>">
					
				</select> </td>

            </tr>
			<tr>
				<td><label>Categoria </label></td>
				<td><input type="text" name="categoria" id="categoria" value="<?php echo$mostrar['categoria'];?>">
				</td>
			</tr>
            <tr>
				
			</tr>
			<tr>
				<td style="color:red">
					Solo aplica para Taekwondo *
				</td>
				<td>
					
				</td>
			</tr>
			<tr>
				<td><label >Edad</label></td>
				<td><input type="text" name="rango" id="ed">
					</td>
				<td style="color:red">*</td>
			</tr>
			<tr>
				<td><label>Cinta</label></td>
				
				<td><input type="text" name="cinta" id="cinta" value="<?php echo$mostrar['cinta'];?>">
					</td>
				<td style="color:red">*</td>
			</tr>

			
		</table>

		<!--
		  -->
		<hr/>
		<center>		
		<a id="back_paso_a" href="" class="btn btn-info btn-primary">Regresar</a> <a id="go_paso_c" href="" class="btn btn-info btn-primary">Siguiente</a>
		</center>
		<br>
	<br>
	<br>
	<br>
	</div>



	<div id="form_paso_c" class="hide">
		
			<h2>Datos del alumno</h2>
<hr>
			<table>
			<tr>
				<td><label for="nombre">Nombre(s)</label> </td>
				<td><input type="text" name="nombre" id="nombre"  autofocus REQUIRED onChange="conMayusculas(this)" value="<?php echo$mostrar['nombre'];?>"> </td>
			
				<td> <center> <label for="apellidos" id="apellido"> Apellido(s) </label> </center></td>
				<td><input type="text" name="apellidos" id="apellidos" required onChange="conMayusculas(this)" value="<?php echo$mostrar['apellidos'];?>"> </td>
			
				<td><center><label for="edad">Edad </label> </td>
				<td><input type="text" name="edad" maxlength="2" id="edad" REQUIRED onkeypress="return justNumbers(event);" value="<?php echo$mostrar['edad'];?>"> </td>
		    </tr>
		     <tr>
			
			<td> <label for="datePicker">Fecha de nacimiento</label></td>
			<td><input type="text" name="fecha" id="datePicker" REQUIRED  value="<?php echo$mostrar['fecha'];?>"> </td>
			
			<td><center><label>Sexo</label></center></td>
			<td> <label ><input type="text" name="genero" id="genero"  value="<?php echo$mostrar['genero'];?>"> </label> <label>
             </td>
			
			<td><center><label for="curp"> CURP </label> </td>
			<td> <input type="text" name="curp" id="curp" REQUIRED  title ="Verifique su curp, al parecer no tiene un formato valido"onChange="conMayusculas(this)" value="<?php echo$mostrar['curp'];?>"> </td>
		</tr>
		<tr>
				<td><label>Nivel académico </label></td>
				<td><input type="text" name="nivel" id="nivel" value="<?php echo$mostrar['nivel'];?>">
				
				</td>
				<td><label for="afiliacion">Aseguradora </label></td>
				<td><input type="text" id="aseguradora" name="aseguradora" placeholder="Aseguradora" onChange="conMayusculas(this)" value="<?php echo$mostrar['aseguradora'];?>"></td>
				<td><label >&nbsp &nbsp Folio de afiliacion</label></td>
				<td><input type="text" placeholder="N. de folio" name="folio" onChange="conMayusculas(this)" value="<?php echo$mostrar['folio'];?>"></td>
			</tr>
			
		
			<tr>
				<td><label>Escuela de procedencia &nbsp</label></td>
				<td><input type="text" name="procedencia" id="procedencia" value="<?php echo$mostrar['procedencia'];?>">
					
					
					
					
					
					
				
				</td>
				<td><label for="responsable">Directora</label></td>
				<td><input type="text" name="responsable" id="responsable" REQUIRED onChange="conMayusculas(this)" value="<?php echo$mostrar['responsable'];?>"></td>
				<td><label for="cel">&nbsp &nbsp &nbsp Celular </label></td>
			<td><input type="text" name="cel"  id="cel" onkeypress="return justNumbers(event);" value="<?php echo$mostrar['cel'];?>"> </td>
			</tr>
		<tr>
		<td ><label for="enfermedad">¿Padece de alguna enfermedad? </label></td>
			<td><center><input type="text" name="enfermedad" id="enfermedad"  value="<?php echo$mostrar['enfermedad'];?>"> </td>
			
			<td><label > Medicamentos </label></td>
			<td><input type"text" name="enfermedades" id="enfermedades" placeholder="¿Medicamentos que ingieres / alergico alguno?" cols="30" rows="2" value="<?php echo$mostrar['enfermedades'];?>"></td>
			
		</tr>
		<tr>
			<td>Foto</td>
			<td><label>Favor De Renombrar La Foto Del Alumno Con Sus Nombres</label></td>
			<td colspan="2"><input type="file" name="archivo" /></td>
			<td></td>
		</tr>
           
			</table>
			<hr/>

		<center>
		
		<a id="back_paso_b" href="" class="btn btn-info btn-primary">Regresar</a>	
		<input type="submit"  class="btn btn-info btn-primary" value="Actualizar Registro" />	
		</center>
			<!--
			 -->

		<br>
	<br>
	<br>
	
	</div>
		
	

</div>
</form>


<script type="text/javascript">

$(function(){
	// detectar que botón se esta accionando
	$('body').on('click','#cont_formularios a',function(elemento){
		elemento.preventDefault();

		mostrar = $(this).attr('id');
		
		// Seleccionar la sección a mostrar
		if(mostrar == 'go_paso_b'){
			$('#form_paso_a').hide();
			$('#form_paso_b').show();
		}
		else if(mostrar == 'back_paso_a'){
			$('#form_paso_b').hide();
			$('#form_paso_a').show();
		}
		else if(mostrar == 'go_paso_c'){
			$('#form_paso_c').show();
			$('#form_paso_b').hide();
		}
		else if (mostrar == 'back_paso_b') {
			$('#form_paso_c').hide();
			$('#form_paso_b').show();
		}



		else if(mostrar == 'go_paso_d'){
			$('#form_paso_d').show();
			$('#form_paso_c').hide();
		}
		else if (mostrar == 'back_paso_c') {
			$('#form_paso_c').show();
			$('#form_paso_d').hide();
		}
	});

	// Formulario datos generales y de empresa
		$('#cont_formularios a').validate({
		submitHandler: function(){

		var datos_formulario_a = $('#cont_formularios a').serialize();

		alert(datos_formulario_a);

		return false;
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().append());
		}
	});
});

    
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

