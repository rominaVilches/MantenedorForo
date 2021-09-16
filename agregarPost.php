<?php
    require("conexion.php");
    session_start();

    $fecha = date('Y-m-d');

    //Agregar post
    $sql = "INSERT INTO foro (id, usuario, fecha, mensaje) VALUES (?, ?, ?, ?)";

    $agregar = $con->prepare($sql);

    $arreglo = array(null, $_SESSION['usuario'], $fecha, $_POST['mensaje']);
        
    $agregar->execute($arreglo);

    if($agregar && $_SESSION['tipo'] == 'U'){
        header('location:usuario.php?m=Post publicado por: '.$_SESSION['usuario']);
    } else if($agregar && $_SESSION['tipo'] == 'A'){
        header('location:admin.php?m=Post publicado por Administrador: '.$_SESSION['usuario']);
    }
?>