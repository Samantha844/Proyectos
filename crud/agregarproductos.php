<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtCantidad"]) || empty($_POST["txtTipo"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $cantidad = $_POST["txtCantidad"];
    $tipo = $_POST["txtTipo"];
    
    $sentencia = $bd->prepare("INSERT INTO producto(nombre,cantidad,tipo) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$cantidad,$tipo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>