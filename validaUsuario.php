<?php

require('conexion.php');

$usuario = htmlentities($_POST['usuario'], ENT_QUOTES);
$clave = htmlentities($_POST['clave'], ENT_QUOTES);

$sql = "SELECT usuario, nombre, apellido, tipo, activo FROM usuario WHERE usuario = ? AND clave = ?";

$buscar = $con->prepare($sql);

$buscar->execute(array($usuario, $clave));

if($buscar->rowCount() > 0){
	foreach($buscar as $usu){

		session_start();
		$_SESSION['usuario'] = $usu['usuario'];
		$_SESSION['nombre'] = $usu['nombre'];
		$_SESSION['apellido'] = $usu['apellido'];
		$_SESSION['tipo'] = $usu['tipo'];
		$_SESSION['activo'] = $usu['activo'];

		if($_SESSION['tipo'] == "A"){
			header('location:admin.php');
		}
		elseif($_SESSION['tipo'] == "U"){

			if($_SESSION['activo'] == true){
				header('location:usuario.php');
			}else if($_SESSION['activo'] == false){
				header('location:index.php?m=Usuario suspendido por Administrador');
			}
				
		}else{ header('location:index.php?m=Usuario no Registrado'); }

	}
}else{
	header('location:index.php?m=Usuario no valido');  
}
?>