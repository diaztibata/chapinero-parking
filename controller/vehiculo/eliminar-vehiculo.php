<?php 

error_reporting(0);

    if(!isset($_GET['txtCodigoVehiculo'])){
        header('Location: ../../vehiculo.php?mensaje=error');
        exit();
    }

    include '../../model/conexion.php';
    $codigo_vehiculo = $_GET['txtCodigoVehiculo'];

    $sentencia = $bd->prepare("DELETE FROM vehiculo where codigo_vehiculo = ?;");
    $resultado = $sentencia->execute([$codigo_vehiculo]);

    if ($resultado === TRUE) {
        echo "<script>window.location.href='../../vehiculo.php';</script>";
    } else {
        echo "<script>window.location.href='../../vehiculo.php';</script>";
    }
    
?>