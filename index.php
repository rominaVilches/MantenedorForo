<!DOCTYPE html>
<html>
<head>
	<title>Login Usuarios</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-sacale=1.0">
	<link rel="stylesheet" href="css/estilo.css" />
	<script src="js/validacion.js" ></script>
</head>
<body>
	<div class="menu">
		<header>Foro Abierto</header>
	</div>
	<h2> <?php if(isset($_GET['m'])){ echo $_GET['m']; } ?>  </h2>
	<form name="form1" id="form1" method="post" action="validaUsuario.php" onSubmit="return validaLogin();">
		<div class="d">
			<label class="label" for="usuario">Usuario:</label>
			<input type="text" name="usuario" id="usuario" onBlur="obligatorioLogin('usuario','errorUsuario');"/>
			<span id="errorUsuario" class="textoError"></span>
		</div>
		<div class="d">
			<label class="label" for="clave">Clave:</label>
			<input type="password" name="clave" id="clave" onBlur="obligatorioLogin('clave','errorClave');"/>
			<span id="errorClave" class="textoError"></span>
		</div>
		<div>
			<input type="submit" name="btnIngresar" id="btnIngresar" value="Ingresar">
		</div>
	</form>
	<span>Si no posee una cuenta, <a href="registro.html">puede registrarse acá</a></span>
</body>
</html>