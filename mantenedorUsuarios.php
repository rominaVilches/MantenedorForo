<?php
    require("conexion.php");
    session_start();

    if(!isset($_SESSION['nombre']) || $_SESSION['tipo'] != 'A'){
        header('location:loginForo.php?m=Su sessión ha caducado');
    }

    $nombreUsuario = $_SESSION['nombre'].' '. $_SESSION['apellido'];

    if(isset($_GET['n'], $_GET['u'])){
        if($_GET['n'] == true){
            $sql = "UPDATE usuario set activo = 0 WHERE usuario  = ? ";
            $modificar = $con->prepare($sql);
            $modificar->execute(array($_GET['u']));
            header('location:mantenedorUsuarios.php?m=Estado Actualizado - Inactivo - Usuario:'.' '.$_GET['u']);
        }else if($_GET['n'] == false){
            $sql = "UPDATE usuario set activo = 1 WHERE usuario  = ? ";
            $modificar = $con->prepare($sql);
            $modificar->execute(array($_GET['u']));
            header('location:mantenedorUsuarios.php?m=Estado Actualizado - Activo - Usuario:'.' '.$_GET['u']);
        }else{
            header('location:mantenedorUsuarios.php?m=Estado NO Actualizado');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mantenedor Usuarios</title>
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
			<a href="admin.php" class="linkMenuAdmin">Foro Administrador</a>
			<a class="linkMenuAdminNombre"><?php echo  $nombreUsuario; ?></a>
		</div>
	</div>
	<h2> <?php if(isset($_GET['m'])){ echo $_GET['m'];} ?>  </h2>
	<table id="tabMant">
        <thead>
            <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th colspan="2">Activo/Inactivo</th>
            </tr>
        </thead>
	<?php 
        //Listar
        $sql = "SELECT usuario, nombre, apellido, activo FROM usuario WHERE usuario != 'rvilches';";
		$listar = $con->query($sql);

        foreach($listar as $fila){
            $nombre = $fila['nombre'].' '.$fila['apellido'];
    ?>
        <tr>
            <td class="tablaMant"><?php echo $fila['usuario']; ?></td>
            <td class="tablaMant"><?php echo $nombre ?></td>
              <?php
                    if($fila['activo'] == true){ ?>
                        <td><span class="spanActivo" >Activo</span></td> 
                        <td><a class= "linkActivo" href="mantenedorUsuarios.php?n=<?php echo $fila['activo']; ?>&u=<?php echo $fila['usuario']; ?>">Inactivar</a></td> 
              <?php }else if($fila['activo'] == false){ ?>
                        <td><span class="spanActivo" >Inactivo</span></td>
                        <td><a class= "linkActivo" href="mantenedorUsuarios.php?n=<?php echo $fila['activo']; ?>&u=<?php echo $fila['usuario']; ?>">Activar</a></td>
              <?php } }?>
		</tr>	
    </table>
    <footer>
		<span> Romina Vilches Sección - 348 </span>
	</footer>
</body>
</html>