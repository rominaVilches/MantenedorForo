<?php
    require('conexion.php');

    $usuario = $_POST['usuario'];

    $sql1 = "SELECT usuario FROM usuario WHERE usuario = ? ";
    
    $consulta = $con->prepare($sql1);

    $consulta->execute(array($usuario));

    if($consulta->num_rows == 0){
        $tipo = 'U';
        $activo = true;

        //Agregar usuario
        $sql = "INSERT INTO usuario (usuario, clave, nombre, apellido, tipo, imagen, nacionalidad, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $agregar = $con->prepare($sql);

        $arreglo = array($_POST['usuario'], $_POST['clave'], $_POST['nombre'], $_POST['apellido'], $tipo, $_FILES['imagen']['name'], $_POST['nacionalidad'], $activo);
        
        $agregar->execute($arreglo);

        if($agregar){
            move_uploaded_file($_FILES['imagen']['tmp_name'],"imagenes/".$_FILES['imagen']['name']);
            header('location:index.php?m=Usuario Registrado con éxito');
        }else{
            header('location:index.php?m=Usuario no registrado');
        }
    }else{
        header('location:index.php?m=Usuario ya registrado, intente ingresar');
    }
?>