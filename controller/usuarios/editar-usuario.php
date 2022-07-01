<?php

error_reporting(0);

/*
    if(!isset($_GET['txtCodigo'])){
        header('Location: ../../vehiculo.php?mensaje=error');
    }
*/

    $identificacion = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $correo = $_POST['txtCorreo'];
    $contrasena = $_POST['txtPass'];
    $telefono = $_POST['txtTelefono'];
    $tipoUsuario = $_POST['txtCargo'];

    echo $contrasena;
    include '../../model/conexion.php';

    $sentencia = $bd->prepare("UPDATE usuarios SET nombre = ?, correo = ?, contrasena = ?, telefono = ?, tipo_usuario = ? where identificacion = ?;");
    $resultado = $sentencia->execute([$nombre, $correo, $_POST['txtPass'], $telefono, $tipoUsuario, $identificacion]);

    if ($resultado === TRUE) {
        echo "<script>window.location.href='../../usuarios.php';</script>";
    } else {
        echo "<script>window.location.href='../../usuarios.php';</script>";
    }

?>
