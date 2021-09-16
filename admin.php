<?php
require('conexion.php');

session_start();
if(!isset($_SESSION['nombre']) || $_SESSION['tipo'] != 'A'){
	header('location:loginForo.php?m=Su sessión ha caducado');
}

$nombreUsuario = $_SESSION['nombre'].' '. $_SESSION['apellido'];
$user = $_SESSION['usuario'];


if(isset($_GET['n'])){
    $sql = "DELETE FROM foro WHERE id  = ? ";

    $elimina = $con->prepare($sql);

    $elimina->execute(array($_GET['n']));

    header('location:admin.php?m=Post Eliminado');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagina Admin</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-sacale=1.0">
	<link rel="stylesheet" href="css/estilo.css" />
	<script src="js/validacion.js" ></script>
</head>
<body>
	<div class="menu">
		<a href="admin.php" class="textMenu"><header>Foro Abierto Administrador</header></a>
		<div class="links">
			<a href="cerrarSesion.php" class="linkMenuAdmin">Cerrar Sesión</a>
			<a href="mantenedorUsuarios.php" class="linkMenuAdmin">Mantenedor Usuarios</a>
			<a class="linkMenuAdminNombre"><?php echo  $nombreUsuario; ?></a>
		</div>
	</div>
	<h2> <?php if(isset($_GET['m'])){ echo $_GET['m'];} ?>  </h2>
	<table>
	<?php 
        //Listar
        $sql = "SELECT u.nombre, u.apellido, f.fecha, f.id, f.mensaje FROM foro as f inner join usuario as u on u.usuario=f.usuario order by f.fecha desc";
		$listar = $con->query($sql);

        foreach($listar as $fila){
			$fecha = date('d-m-Y', strtotime($fila['fecha']));
    ?>
        <tr>
			<td id="col1"><?php echo $fila['nombre'].' '.$fila['apellido'] ?> <br> <?php echo $fecha; ?> <br> <a class="linkEliminar" href="admin.php?n=<?php echo $fila['id']; ?>">Eliminar</a></td>
			<td><?php echo $fila['mensaje']; ?></td>
		</tr>	
		<?php  } ?>
		<tr>
			<td colspan="2">
			<form name="form3" id="form3" method="post" action="agregarPost.php" onSubmit="return validaPost();">
				<div class="d">
					<textarea name="mensaje" id="mensaje" onBlur="obligatorioPost('mensaje','errorMensaje');"></textarea>
					<span id="errorMensaje" class="textoError"></span>
				</div>
				<div>
					<input type="submit" name="btnPublicar" id="btnPublicar" value="Publicar">
				</div>
			</form>
			</td>
		</tr>
	</table>
	<footer>
		<span> Romina Vilches Sección - 348 </span>
	</footer>
</body>
</html>