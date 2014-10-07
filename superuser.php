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
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	
	<script type="text/javascript"src="js/jquery.js"> </script>
	<script type="text/javascript"src="js/jquery-1.10.2.js"> </script>
	<script type="text/javascript"src="js/bootstrap.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
  $("#hide").click(function(){
    $("#element").hide();
  });
  $("#show").click(function(){
    $("#element").show();
  });
});
</script>
<style type="text/css">
	#element{
		border-radius: 5px;
		float: center;
	}
</style>

<script type="text/javascript">
$(document).ready(function(){
  $("#hide2").click(function(){
    $("#element2").hide();
  });
  $("#show2").click(function(){
    $("#element2").show();
  });
});
</script>
<style type="text/css">
	#element{
		border-radius: 5px;
		float: center;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide3").click(function(){
    $("#element3").hide();
  });
  $("#show3").click(function(){
    $("#element3").show();
  });
});
</script>
<style type="text/css">
	#element{
		border-radius: 5px;
		float: center;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide4").click(function(){
    $("#element4").hide();
  });
  $("#show4").click(function(){
    $("#element4").show();
  });
});
</script>
<style type="text/css">
	#element{
		border-radius: 5px;
		float: center;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide5").click(function(){
    $("#element5").hide();
  });
  $("#show5").click(function(){
    $("#element5").show();
  });
});
</script>
<style type="text/css">
	#element{
		border-radius: 5px;
		float: center;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide6").click(function(){
    $("#element6").hide();
  });
  $("#show6").click(function(){
    $("#element6").show();
  });
});
</script>
<style type="text/css">
	#element{
		border-radius: 5px;
		float: center;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide7").click(function(){
    $("#element7").hide();
  });
  $("#show7").click(function(){
    $("#element7").show();
  });
});
</script>
<style type="text/css">
  #element{
    border-radius: 5px;
    float: center;
  }
</style>

</head>

<body>
	<br>
	<h2>SELECCIONA UNA ACCION</h2>
	<div>
		<center>
    <table>
			<tr><br>

				<br>
				<br>


	<td><a href="#" id="show" class="btn btn-primary btn-large"style='width:150px; height:50px'><FONT FACE="arial" SIZE=3 COLOR=white>
Imprimir El Registro por escuelas</FONT></a></td>
	<td><a href="#" id="show2" class="btn btn-primary btn-large"style='width:150px; height:50px'><FONT FACE="arial" SIZE=3 COLOR=white>Impimir El Registro por deporte</FONT></a></td>
  <td><a href="#" id="show6"class="btn btn-primary btn-large"style='width:150px; height:50px'><FONT FACE="arial" SIZE=3 COLOR=white>Imprimir El Registro De Deportes Por Escuela</FONT></a></td>
	<td><a href="#" id="show3"class="btn btn-primary btn-large"style='width:150px; height:50px'><FONT FACE="arial" SIZE=3 COLOR=white>Imprimir El Registro Por Entrenador</FONT></a></td>
  <td><a href="#" id="show4"class="btn btn-primary btn-large"style='width:150px; height:50px'><FONT FACE="arial" SIZE=3 COLOR=white>Imprimir El Registro Servicios Medicos</FONT></a></td>  
  <td><a href="#" id="show5"class="btn btn-primary btn-large"style='width:150px; height:50px'><FONT FACE="arial" SIZE=3 COLOR=white>Registro De Hoteles</FONT></a></td>
	<td><a href="#" id="show7"class="btn btn-primary btn-large"style='width:150px; height:50px'><FONT FACE="arial" SIZE=3 COLOR=white>Registro De Alimentación</FONT></a></td>
</tr>
</table></center>
</div>
<br>
<br>
	<center><img src="data:image/jpeg;base64,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" height="700" width="600" alt="">
</center>
<div id="element" style="display: none;">
   
  <center> <form method="post" action="">
       <h3>Selecciona una escuela:</h3> <br/>
       
				<td>
          <a href="pdf2/Hispano.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Hispano Mexico</a>
          <a href="pdf2/Patria.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Educación Y Patria</a>
          <a href="pdf2/guadalupe_victoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc. guadalupe victoria</a>
          <a href="pdf2/victoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Victoria</a>
          <a href="pdf2/Hidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Hidalgo</a>

       </td>
       <br>
    <table>
      <br>
        <td>
            <a href="pdf2/YermoyParres.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Yermo Y Parres</a>
            <a href="pdf2/AsiloSL.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc. Asilo San Luis</a>
            <a href="pdf2/Esc_Frontera.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc. Frontera</a>
            <a href="pdf2/Esc_MiguelHidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Miguel Hidalgo</a>
            <a href="pdf2/Asilo_StMaria.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Asilo Santa Maria</a>

   </td>
   </table>
   <br>
<table>
        
        <td><div id="close"><a href="#" id="hide" class="btn btn-danger btn-large">cerrar</a></div></tr>

        <div></div></center>
        </tr>
</table>
    </form>
</div>
<div id="element2" style="display: none;">
   
  <center> <form method="post" action="">
       <h3>Selecciona un deporte</h3> <br/>
       
				<td>
          <a href="pdf2/futbol.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
					<a href="pdf2/basquetbol.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>	
				  <a href="pdf2/voleybol.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewdo</a>


        </td>

        <table>
        
        <br/><br/>
        <td><div id="close"><a href="#" id="hide2" class="btn btn-danger btn-large">cerrar</a></div></tr>

        <div></div></center>
        </tr>
</table>

    </form>
</div>
<div id="element3" style="display: none;">
   
  <center> <form method="post" action="">
       <h3>Selecciona una categoria:</h3> <br/>
       
				<td>
          <a href="pdf2/entrenador_futbol.php" id="" class="btn btn-primary btn-medium" target="_blank">Entrenadores de Futbol</a>
          <a href="pdf2/entrenador_basquetbol.php" id="" class="btn btn-primary btn-medium" target="_blank">Entrenadores de Basquetbol</a>
          <a href="pdf2/entrenador_voleybol.php" id="" class="btn btn-primary btn-medium" target="_blank">Entrenadores de Voleybol</a>
          <a href="pdf2/entrenador_ajedrez.php" id="" class="btn btn-primary btn-medium" target="_blank">Entrenadores de Ajedrez</a>
          <a href="pdf2/entrenador_takewndo.php" id="" class="btn btn-primary btn-medium" target="_blank">Entrenadores de Takewndo</a>

          
        </td>
<table>
       
        <br/><br/>
        <td><div id="close"><a href="#" id="hide3" class="btn btn-danger btn-large">cerrar</a></div></tr>

        <div></div></center>
        </tr>
</table>
    </form >
</div>
<div id="element4" style="display: none;">
   
  <center> <form method="post" action="">
        
       
        <h3>Informes Medicos:</h3> <br/>
       <td><a href="pdf2/medico.php" id="" class="btn btn-primary btn-medium" target="_blank">General</a></td>
        <td>
          <a href="pdf2/medicohispano.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Hispano Mexico</a>
          <a href="pdf2/medicopatria.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Educación Y Patria</a>
          <a href="pdf2/medicoguadalupe.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc. guadalupe victoria</a>
          <a href="pdf2/medicovictoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Victoria</a>
          <a href="pdf2/medicohidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Hidalgo</a>

       </td>
       <br>
    <table>
      <br>
        <td>
            <a href="pdf2/medicoyermoyparres.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Yermo Y Parres</a>
            <a href="pdf2/medicoAsiloSL.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc. Asilo San Luis</a>
            <a href="pdf2/medicofrontera.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc. Frontera</a>
            <a href="pdf2/medicoMiguelHidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Miguel Hidalgo</a>
            <a href="pdf2/medicoStMaria.php" id="" class="btn btn-primary btn-medium" target="_blank">Esc.Asilo Santa Maria</a>

   </td>
   </table>
<table>
       
        <br/><br/>
        <td><div id="close"><a href="#" id="hide4" class="btn btn-danger btn-large">cerrar</a></div></tr>

        <div></div></center>
        </tr>
</table>
    </form >
</div>


<div id="element6" style="display: none;">
   
  <center> <form method="post" action="">
       <h3></h3> <br/>

       
				<td>
          <h4>Relación De Alumnos Por Deporte De La Esc.Asilo San Luis</h4>
					<a href="pdf2/futbol_asilosanluis.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_asilosanluis.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_asilosanluis.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_asilosanluis.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_asilosanluis.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
				
				</td>
         <td>
          <h4>Relación De Alumnos Por Deporte De La Esc. Hispano Mexicano</h4>
          <a href="pdf2/futbol_hispano.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_hispano.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_hispano.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_hispano.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_hispano.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
         </td>
         <td>
           <h4>Relación De Alumnos Por Deporte De La Esc. Educación y Patria</h4>
          <a href="pdf2/futbol_educacionypatria.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_educacionypatria.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_educacionypatria.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_educacionypatria.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_educacionypatria.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
         </td>
         <td>
          <h4>Relación De Alumnos Por Deporte De La Esc. Guadalupe Victoria</h4>
          <a href="pdf2/futbol_guadalupe.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_guadalupe.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_guadalupe.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_guadalupe.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_guadalupe.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
          </td>
          <td>
            <h4>Relación De Alumnos Por Deporte De La Esc. Victoria</h4>
          <a href="pdf2/futbol_victoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_victoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_victoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_victoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_victoria.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
            </td>
            <td>
              <h4>Relación De Alumnos Por Deporte De La Esc. Hidalgo</h4>
          <a href="pdf2/futbol_hidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_hidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_hidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_hidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_hidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
            </td>
            <td>
               <h4>Relación De Alumnos Por Deporte De La Esc. Yermo y Parres</h4>
          <a href="pdf2/futbol_yermoyparres.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_yermoyparres.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_yermoyparres.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_yermoyparres.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_yermoyparres.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
            </td>
            <td>
              <h4>Relación De Alumnos Por Deporte De LaEsc. Frontera</h4>
          <a href="pdf2/futbol_frontera.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_frontera.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_frontera.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_frontera.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_frontera.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
            </td>
            <td>
              <h4>Relación De Alumnos Por Deporte De La Esc. Asilo Santa María</h4>
          <a href="pdf2/futbol_asilomaria.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_asilomaria.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_asilomaria.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_asilomaria.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_asilomaria.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
            </td>
            <td>
              <h4>Relación De Alumnos Por Deporte De La Esc. Miguel Hidalgo</h4>
          <a href="pdf2/futbol_mhidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Futbol</a>
          <a href="pdf2/basquetbol_mhidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Basquetbol</a>
          <a href="pdf2/voleybol_mhidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Voleybol</a>
          <a href="pdf2/ajedrez_mhidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Ajedrez</a>
          <a href="pdf2/takewndo_mhidalgo.php" id="" class="btn btn-primary btn-medium" target="_blank">Takewndo</a>
  
            </td>


				<br>
			
<table>
        <tr>
        <br/><br/>
        
		<td> <td><div id="close"><a href="#" id="hide6" class="btn btn-danger btn-large">cerrar</a></div></tr>


        <div></div></center>
        </tr>
</table>
    </form>
</div>
<div id="element5" style="display: none;">
   
  <center> <form action="enviohotel.php" method="post">
       <h3>Ingresa los datos correspondietes:</h3> <br/>

       
        <td>
          <label>Nombre de la escuela </label><h3></h3>
          <select name="escuela" required>
          <option value="">Elije una opción</option>
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
        
          <td><label>Nombre del hotel</label>
          <input type="text" name="hoteluno">
          <label>Personas hospedadas</label>
          <input type="text" name="cantidaduno" size="3"></td>
          <label style="color:red">en caso de que la delegacion este en mas de un hotel rellenar lo siguiente</label>
          <td><label>Nombre del hotel2</label>
          <input type="text" name="hoteldos">
          <label>Personas hospedadas</label>
          <input type="text" name="cantidaddos" size="3"></td>
          <td><label>Nombre del hotel3</label>
          <input type="text" name="hoteltres">
          <label>Personas hospedadas</label>
          <input type="text" name="cantidadtres" size="3"></td>
            

        </td>
        <br>
      
<table>
        <tr><td><input type="submit" class="btn btn-primary btn-large" value="Guardar"></td>
        <br/><br/>
        <td><a href="pdf2/hospedaje.php" id="" class="btn btn-primary btn-large" target="_blank">ver PDF</a></td>
    <td> <td><div id="close"><a href="#" id="hide5" class="btn btn-danger btn-large">cerrar</a></div></tr>


        <div></div></center>

        </tr>
</table>

    </form>

</div>
<div id="element7" style="display: none;">
   
  <center> <form action="envioalimentos.php" method="post">
       <h3>Ingresa los datos correspondietes:</h3> <br/>

       
        <td>
          <label>Escuela</label><select name="escuela" required>
          <option value="">Elije una opción</option>
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


        <label>cantidad de paquetes</label>
        <label>desayuno</label><input type="text" name="desayuno">
        <label >Almuerzo</label><input type="text" name="almuerzo">
        <label>Cena</label><input type="text" name="cena">
        
        </td>
        <br>
      
<table>
        <tr><td><input type="submit" class="btn btn-primary btn-large" value="Guardar"></td>
        <br/><br/>
        <td><a href="pdf2/alimentacion.php" id="" class="btn btn-primary btn-large" target="_blank">ver PDF</a></td>
    <td> <td><div id="close"><a href="#" id="hide7" class="btn btn-danger btn-large">cerrar</a></div></tr>


        <div></div></center>
        </tr>
</table>
    </form>
</div>
        </td>
        <br>
      
<table>
        

        <div></div></center>

        </tr>
</table>

    </form>

</div>

    

	<script type="text/javascript"src="/beta3/js/jquery.js"> </script>
	<script type="text/javascript"src="/beta3/js/jquery-1.10.2.js"> </script>
	<script type="text/javascript"src="/beta3/js/bootstrap.js"> </script>
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
