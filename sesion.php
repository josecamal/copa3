<?php
session_start();
error_reporting(0);

mysql_connect("localhost", "root", "root");
mysql_select_db("practicas_login");

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
		echo 'Los datos estan vacios';
	}
	elseif(mysql_num_rows($GetUser) == 0)
	{

		
		echo 'El usuario no existe o la contrase&ntilde;a es incorrecta';
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
		echo "El usuario $RU ya existe, por favor elige otro<br>";
		$Fail = true;
	}
	elseif(empty($RU) || empty($ROP) || empty($RTP))
	{
		echo 'Algun dato esta vacio a&uacute;n<br>';
		$Fail = true;
	}
	elseif($RTP !== $ROP)
	{
		echo 'Las dos contrase&ntilde;as no son iguales<br>';
		$Fail = true;
	}
	if($Fail == false)
	{
		mysql_query("INSERT INTO members (username, password) VALUES ('$RU', '".md5($ROP)."')");
		echo 'Tu usuario ha sido registrado<br><meta http-equiv="Refresh" content="2;URL=./" />';
	}
}

if($_GET['action'] == 'exit')
{
	session_destroy();
	echo '<meta http-equiv="Refresh" content="0;URL=./" />';
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo User == true ? $lml['username'] : 'A&uacute;n sin entrar'; ?></title>
	<style type="text/css">body{font-family:Segoe UI;}</style>
</head>
<body>
	<?php if(User == false) { ?>
	<label style="font-size: 30px; font-family: Segoe UI;"><br>Ingresar</label><br>
	<form action="" method="POST">
		Nombre de usuario:<br>
		<input type="text" name="Username" placeholder="Nombre de usuario" /><br>
		Contraseña:<br>
		<input type="password" name="Password" placeholder="********" /><br>
		<input type="submit" value="Entrar" />
	</form>
	<label style="font-size: 30px; font-family: Segoe UI;">Registrate</label><br>
	<form action="" method="POST">
		Nombre de usuario:<br>
		<input type="text" name="RUsername" placeholder="Nombre de usuario" /><br>
		Contraseña:<br>
		<input type="password" name="ROPassword" placeholder="*********" /><br>
		Verificar contraseña:<br>
		<input type="password" name="RTPassword" placeholder="*********" /><br>
		<input type="submit" value="Registrarme" />
	</form>
	<?php } if(User == true) { ?>
	<label style="font-size: 30px; font-family: Segoe UI;">Bienvenido</label><br>
	<b>Hola, <?php echo $lml['username']; ?></b><br>
	<a href="?action=exit">Salir</a>
	<?php } ?>
</body>
</html>