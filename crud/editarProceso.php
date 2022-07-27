<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['txtNombre'];
    $cantidad = $_POST['txtCantidad'];
    $tipo = $_POST['txtTipo'];

    $sentencia = $bd->prepare("UPDATE producto SET nombre = ?, cantidad = ?, tipo = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre, $cantidad, $tipo, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>