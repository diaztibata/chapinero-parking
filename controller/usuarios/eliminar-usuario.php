<?php 

error_reporting(0);

    if(!isset($_GET['codigo'])){
        //header('Location: ../../usuarios.php?mensaje=error');
        exit();
    }

    include '../../model/conexion.php';
    $codigo_usuario = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM usuarios where identificacion = ?;");
    $resultado = $sentencia->execute([$codigo_usuario]);

    if ($resultado === TRUE) {
        echo "<script>window.location.href='../../usuarios.php';</script>";
    } else {
        echo "<script>window.location.href='../../usuarios.php';</script>";
    }
    
?>