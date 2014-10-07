
<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head><!-- required from lib -->
  
   
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
     <script type="text/javascript" src="./js/jquery.validationEngine.js"></script>

    <!-- required from lib -->
  
  
  <!--  the LiveValidation source to be tested -->
  
   
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
	<script type="text/javascript">

function slctr(texto,valor){
	this.texto = texto
	this.valor = valor
}
//******categorias*****//
var Futbol=new Array()
	Futbol[0] = new slctr('- -Categoria - -')
	Futbol[1] = new slctr("Poni",'Poni')
	Futbol[2] = new slctr("Infantil",'Infantil')
	Futbol[3] = new slctr("Secundaria",'Secundaria')
	Futbol[4] = new slctr("Preparatoria",'Preparatoria')


var Basquetbol=new Array()
    Basquetbol[0] = new slctr('- -Categoria - -')
	Basquetbol[1] = new slctr("Poni",'Poni')
	Basquetbol[2] = new slctr("Infantil",'Infantil')
	Basquetbol[3] = new slctr("Secundaria",'Secundaria')
	Basquetbol[4] = new slctr("Preparatoria",'Preparatoria')
	
var Voleybol=new Array()
    Voleybol[0] = new slctr('- -Categoria - -')
	Voleybol[1] = new slctr("Infantil",'Infantil')
	Voleybol[2] = new slctr("Secundaria",'Secundaria')
	Voleybol[3] = new slctr("Preparatoria",'Preparatoria')
	



var Ajedrez=new Array()
    Ajedrez[0] = new slctr('- -Categoria - -')
	Ajedrez[1] = new slctr("Primaria en equipo de 1ro a 3ro", 'primaria_en_equipo_1ro_a_3ro')
	Ajedrez[2] = new slctr("Primaria en equipo de 4to a 6to",'primaria_en_equipo_4to_a_6to ')
	Ajedrez[3] = new slctr("Primaria individual de 1ro a 3ro",'primaria_individual_1ro_a_3ro')
	Ajedrez[4] = new slctr("Primaria individual de 4to a 6to",'primaria_individual_4to_a_6to ')
	Ajedrez[5] = new slctr("Secundaria en equipo",'Secundaria_en_equipo')
	Ajedrez[6] = new slctr("Secundaria individual",' Secundaria_individual')
	Ajedrez[7] = new slctr("Preparatoria individual",' Preparatoria')

	var Takewndo=new Array()
    Takewndo[0] = new slctr('- -Categoria - -')
	Takewndo[1] = new slctr("Infantil (6-7 años)",'inf_seis_a_siete ')
	Takewndo[2] = new slctr("Infantil(8-9años)",'inf_ocho_a_nueve')
	Takewndo[3] = new slctr("Infantil(10-11 años)",'inf_diez_a_once ')
	Takewndo[4] = new slctr("Sub12(12-13 años)",'sub_doce')
	Takewndo[5] = new slctr("Cadetes(14-15 años)",'cadetes')
	Takewndo[6] = new slctr("Junior(16-17 años)",'junior')
	


//*******subcategorias*******************
var Poni = new Array()
	Poni[0] = new slctr('- -Rama- -')
	Poni[1] = new slctr("Mixto",null)
	Poni[2] = new slctr("Varonil" ,null)
	Poni[3] = new slctr("Femenil" ,null)

var Infantil = new Array()
	Infantil[0] = new slctr('- -Rama- -')
	Infantil[1] = new slctr("Mixto",null)
	Infantil[2] = new slctr("Varonil" ,null)
	Infantil[3] = new slctr("Femenil" ,null)

var Secundaria = new Array()
	Secundaria[0] = new slctr('- -Rama- -')
	Secundaria[1] = new slctr("Mixto",null)
	Secundaria[2] = new slctr("Varonil" ,null)
	Secundaria[3] = new slctr("Femenil" ,null)

var Preparatoria = new Array()
	Preparatoria[0] = new slctr('- -Rama- -')
	Preparatoria[1] = new slctr("Mixto",null)
	Preparatoria[2] = new slctr("Varonil" ,null)
	Preparatoria[3] = new slctr("Femenil" ,null)

var primaria_en_equipo_1ro_a_3ro = new Array()
	primaria_en_equipo_1ro_a_3ro[0] = new slctr('- -Rama- -')
	primaria_en_equipo_1ro_a_3ro[1] = new slctr("Mixto",null)
	primaria_en_equipo_1ro_a_3ro[2] = new slctr("Varonil" ,null)
	primaria_en_equipo_1ro_a_3ro[3] = new slctr("Femenil" ,null)

var primaria_en_equipo_4to_a_6to = new Array()
	primaria_en_equipo_4to_a_6to[0] = new slctr('- -Rama- -')
	primaria_en_equipo_4to_a_6to[1] = new slctr("Mixto",null)
	primaria_en_equipo_4to_a_6to[2] = new slctr("Varonil" ,null)
	primaria_en_equipo_4to_a_6to[3] = new slctr("Femenil" ,null)

var primaria_individual_1ro_a_3ro = new Array()
	primaria_individual_1ro_a_3ro[0] = new slctr('- -Rama- -')
	primaria_individual_1ro_a_3ro[1] = new slctr("Mixto",null)
    primaria_individual_1ro_a_3ro[2] = new slctr("Varonil" ,null)
	primaria_individual_1ro_a_3ro[3] = new slctr("Femenil" ,null)

var primaria_individual_4to_a_6to = new Array()
	primaria_individual_4to_a_6to[0] = new slctr('- -Rama- -')
	primaria_individual_4to_a_6to[1] = new slctr("Mixto",null)
    primaria_individual_4to_a_6to[2] = new slctr("Varonil" ,null)
	primaria_individual_4to_a_6to[3] = new slctr("Femenil" ,null)

var Secundaria_en_equipo = new Array()
	Secundaria_en_equipo[0] = new slctr('- -Rama- -')
	Secundaria_en_equipo[1] = new slctr("Mixto",null)
    Secundaria_en_equipo[2] = new slctr("Varonil" ,null)
	Secundaria_en_equipo[3] = new slctr("Femenil" ,null)

var Secundaria_individual = new Array()
	 Secundaria_individual[0] = new slctr('- -Rama- -')
	 Secundaria_individual[1] = new slctr("Mixto",null)
     Secundaria_individual[2] = new slctr("Varonil" ,null)
	 Secundaria_individual[3] = new slctr("Femenil" ,null)




var inf_seis_a_siete = new Array()
inf_seis_a_siete [0] = new slctr('- -Rama- -')
inf_seis_a_siete [1] = new slctr("Varonil" ,'_Varonil')
inf_seis_a_siete [2] = new slctr("Femenil" ,'_Femenil')

var inf_ocho_a_nueve = new Array()
inf_ocho_a_nueve [0] = new slctr('- -Rama- -')
inf_ocho_a_nueve [1] = new slctr("Varonil" ,'_Varonil')
inf_ocho_a_nueve [2] = new slctr("Femenil" ,'_Femenil')

var inf_diez_a_once = new Array()
inf_diez_a_once  [0] = new slctr('- -Rama- -')
inf_diez_a_once  [1] = new slctr("Varonil" ,'_Varonil')
inf_diez_a_once  [2] = new slctr("Femenil" ,'_Femenil')
	
var sub_doce = new Array()
 sub_doce  [0] = new slctr('- -Rama- -')
 sub_doce  [1] = new slctr("Varonil" ,'_Varonil')
 sub_doce  [2] = new slctr("Femenil" ,'_Femenil')

 var cadetes = new Array()
 cadetes [0] = new slctr('- -Rama- -')
 cadetes  [1] = new slctr("Varonil" ,'_Varonil')
 cadetes  [2] = new slctr("Femenil" ,'_Femenil')		

var junior = new Array()
 junior [0] = new slctr('- -Rama- -')
 junior  [1] = new slctr("Varonil" ,'_Varonil')
 junior  [2] = new slctr("Femenil" ,'_Femenil')		



var _Varonil = new Array()
	_Varonil[0] = new slctr('- -Color De Cinta- -')
	_Varonil[1] = new slctr("Blanca" ,null)
	_Varonil[2] = new slctr("Naranja" ,null)
	_Varonil[3] = new slctr("Rojo o marron " ,null)
	_Varonil[4] = new slctr("Amarilla" ,null)
	_Varonil[5] = new slctr("Verde" ,null)
	_Varonil[6] = new slctr("Azul" ,null)
	_Varonil[7] = new slctr("Negra" ,null)

	var _Femenil = new Array()
	_Femenil[0] = new slctr('- -Color De Cinta- -')
	_Femenil[1] = new slctr("Blanca" ,null)
	_Femenil[2] = new slctr("Naranja" ,null)
    _Femenil[3] = new slctr("Rojo o marron " ,null)
	_Femenil[4] = new slctr("Amarilla" ,null)
	_Femenil[5] = new slctr("Verde" ,null)
	_Femenil[6] = new slctr("Azul" ,null)
	_Femenil[7] = new slctr("Negra" ,null)







function slctryole(cual,donde){
	if(cual.selectedIndex != 0){
		donde.length=0
		cual = eval(cual.value)
		for(m=0;m<cual.length;m++){
			var nuevaOpcion = new Option(cual[m].texto);
			donde.options[m] = nuevaOpcion;
			if(cual[m].valor != null){
				donde.options[m].value = cual[m].valor
			}
			else{
				donde.options[m].value = cual[m].texto
			}
		}
	}
}
</script>   
<script type="text/javascript">
        function toggle(elemento) {
          
               if(elemento.value=="si"){
                   document.getElementById("uno").style.display = "block";
                   document.getElementById("dos").style.display = "none";
               }else{
                   if(elemento.value=="no"){
                        document.getElementById("uno").style.display = "none";
                        document.getElementById("dos").style.display = "block";
                    }  
                }
            

           }
</script> 

 </head>

  <body>
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
<hr>
<form action="envio_datos.php" method="post" enctype="multipart/form-data" id="myform">
			<table>	
				<tr>
					<td colspan="2"><h3><center><strong></strong></center></h3></td>
				</tr>
				<tr>
					<td><label for="nom_resp">  Nombre(s) </label></td>
					<td><input type="text" name="nombre_resp" id="nom_resp"  autofocus onChange="conMayusculas(this)" class="required">
						

					 </td>
					<td><label for="apellidos_resp">&nbsp &nbsp &nbspApellidos(s)  </label></td>
			<td><input type="text" name="apellidos_resp" id="apellidos_resp" required onChange="conMayusculas(this)">
				


			</td>
			<td><label for="cel_resp"> &nbsp &nbsp &nbspCelular </label></td>
			<td><input type="text" name="cel_resp" id="cel_resp" REQUIRED onkeypress="return justNumbers(event);"> </td>
				</tr>
				<tr>
					<td><label for="correo_resp"><center> Correo  electrónico &nbsp</center></label></td>
			<td><input type="email" name="correo_resp" id="correo_resp" REQUIRED> </td>
			<td><label for="face_resp"> <center>&nbsp &nbsp Cuenta de  Facebook &nbsp</center></label></td>
			<td><input type="text" name="face" id="face"> </td>
			<td><label for="twitter_resp"><center>&nbsp &nbsp Cuenta de  &nbspTwitter &nbsp </center></label></td>
			<td><input type="text" name="twitter" id="twitter_resp" placeholder="@usuario"> </td>
            
				</tr>
			</table>
			<hr>

			<br>


		<center><a id="go_paso_b" href="" class="btn btn-info btn-primary">Siguiente</a></center>
	</div>

		
		
	

	<div id="form_paso_b" class="hide">
		
<h2>Datos del deporte</h2>
<hr>
<table>
	<tr>
		<td><label for="entrenador">Nombre del Entrenador &nbsp</label> </td>
                <td><input type="text" name="entrenador" id="entrenador" onChange="conMayusculas(this)" /></td>
                <td> <label>&nbsp &nbsp &nbspDeporte </label></td>
				<td><select name="deporte" id="deporte"onchange="slctryole(this,this.form.categoria)">>
					<option>- - eliga una opción - -</option>
		                 <option value="Futbol">Futbol</option>
		                 <option value="Basquetbol">Basquetbol</option>
		                 <option value="Voleybol">Voleybol</option>
		                 <option value="Ajedrez">Ajedrez</option>
		                 <option value="Takewndo">Takewndo</option>
				</select> </td>

	</tr>
	<tr>
		<td><label>Categoria </label></td>
				<td><select name="categoria" id="categoria" onchange="slctryole(this,this.form.rama)">
				<option>- - - - - -</option>
				
				</select> </td>
				<td><label >&nbsp &nbsp &nbspRama </label></td>
				<td><select name="rama" id="rama"onchange="slctryole(this,this.form.cinta)">
				<option>- - - - - -</option>
				
				</select> </td>
	</tr>
	<tr>
		<td><label>Cinta</label></td>
				
				<td><select name="cinta" id="cinta">
					
		            <option>- - - -</option>
					
				</select></td>
	</tr>
</table>
<hr>
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
		<td><label for="nombre">Nombre(s)</label></td>
		<td><input type="text" name="nombre" id="nombre"  autofocus REQUIRED onChange="conMayusculas(this)"></td>
		<td><center> <label for="apellidos" id="apellido"> Apellido(s) </label> </center></td>
		<td><input type="text" name="apellidos" id="apellidos" required onChange="conMayusculas(this)"></td>
		<td><center><label for="edad">Edad </label></center></td>
		<td><input type="text" name="edad" maxlength="2" id="edad" REQUIRED onkeypress="return justNumbers(event);"></td>
	</tr>
	<tr>
		<td><label for="datePicker">Fecha de nacimiento</label></td>
		<td><input type="date" name="fecha" id="datePicker" REQUIRED></td>
		<td><center><label>Sexo</label></center></td>
		<td><label ><input type="radio" name="genero" id="genero" value="hombre"> Hombre </label> <label><input type="radio" 
            id="genero" name="genero" value="mujer"> Mujer</label></td>
		<td><center><label for="curp"> CURP </label></center></td>
		<td><input type="text" name="curp" id="curp" REQUIRED  title ="Verifique su curp, al parecer no tiene un formato valido"onChange="conMayusculas(this)"></td>
	</tr>
	<tr>
		<td><label>Nivel académico </label></td>
		<td><select name="nivel" id="nivel">
				<option>Selecciona una opción</option>
				<option value="Primaria"> Primaria</option> 
				<option value="Secundaria"> Secundaria</option>
				<option value="Preparatoria">Preparatoria</option>
				</select></td>
		<td><label for="afiliacion">Aseguradora </label></td>
		<td><input type="text" id="aseguradora" name="aseguradora" placeholder="Aseguradora" onChange="conMayusculas(this)"></td>
		<td><label >&nbsp &nbsp Folio de afiliacion</label></td>
		<td><input type="text" placeholder="N. de folio" name="folio" onChange="conMayusculas(this)"></td>
		<td></td>
	</tr>
	<tr>
	<td><label>Escuela de procedencia &nbsp</label></td>
	<td><select name="procedencia" id="procedencia">
					<?php 
		  if ($lml['username']== "ed") {
			
			echo '<option value="Elije una opción">Todas</option>';
		}

		if ($lml['username']== "Hispano") {
			
			echo '<option value="Esc. Hispano Mexicano">Esc. Hispano Mexicano</option>';
		}
		if ($lml['username']== "Patria") {
			
			echo '<option value="Esc. Educación y Patria">Esc. Educación y Patria</option>';
		}
		if ($lml['username']== "Guadalupe") {
			
			echo '<option value="Esc. Guadalupe Victoria">Esc. Guadalupe Victoria</option>';
		}
		if ($lml['username']== "Victoria") {
			
			echo '<option value="Esc. Victoria">Esc. Victoria</option>';
		}
		if ($lml['username']== "Hidalgo") {
			
			echo '<option value="Esc. Hidalgo">Esc. Hidalgo</option>';
		}
		if ($lml['username']== "Yermo") {
			
			echo '<option value="Esc. Yermo y Parres">Esc. Yermo y Parres</option>';
		}
		if ($lml['username']== "Asilo") {
			
			echo '<option value="Esc. Asilo San Luis">Esc. Asilo San Luis</option>';
		}
		if ($lml['username']== "Frontera") {
			
			echo '<option value="Esc. Frontera">Esc. Frontera</option>';
		}
		if ($lml['username']== "Stmaria") {
			
			echo '<option value="Esc. Asilo Santa María">Esc. Asilo Santa María</option>';
		}
		if ($lml['username']== "Mhidalgo") {
			
			echo '<option value="Esc. Miguel Hidalgo">Esc. Miguel Hidalgo</option>';
		}
		?>
					
		
					
					
					
					
					
					
				</select> </td>

	<td><label for="responsable">Directora</label></td>
	<td><input type="text" name="responsable" id="responsable" REQUIRED onChange="conMayusculas(this)"></td>
	<td><label for="cel">&nbsp &nbsp &nbsp Celular </label></td>
	<td><input type="text" name="cel"  id="cel" onkeypress="return justNumbers(event);"></td>
	</tr>
<tr>
	<td><label for="enfermedad">¿Padece de alguna enfermedad? </label></td>
	<td><center><input type="radio" name="enfermedad" id="enfermedad" onclick="toggle(this)" value="si"> Si <input type="radio" name="enfermedad" id="enfermedad02" onclick="toggle(this)" value="no"> No</center></td>
	<td><div id="uno" style="display:none">
				<label > Medicamentos </label>
			<textarea name="enfermedades" id="enfermedades" placeholder="¿Medicamentos que ingieres / alergico alguno?" cols="30" rows="2"></textarea></div></td>
	

</tr>
<tr>
	<td>Foto</td>
	<td><label>Favor De Renombrar La Foto Del Alumno Con Sus Nombres</label></td>
	<td colspan="2"><input type="file" name="imagen"/></td>
	
</tr>
</table>
		<hr	>
		<center>
		
		<a id="back_paso_b" href="" class="btn btn-info btn-primary">Regresar</a>	
		<input type="submit"  class="btn btn-info btn-primary" value="Terminar Registro" />	
		</center>
			<!--
			 -->

		<br>
	<br>
	<br>
	
	</div>
		
	</form>

</div>






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

 