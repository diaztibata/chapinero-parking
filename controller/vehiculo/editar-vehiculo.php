<?php

error_reporting(0);

    if(!isset($_GET['txtCodigoVehiculo'])){
        header('Location: ../../vehiculo.php?mensaje=error');
    }

    include '../../model/conexion.php';
    $codigo_vehiculo = $_GET['txtCodigoVehiculo'];
    $contrato = $_GET['txtContrato'];

    $sentencia = $bd->prepare("UPDATE vehiculo SET contrato_mensual = ? where codigo_vehiculo = ?;");
    $resultado = $sentencia->execute([$contrato, $codigo_vehiculo]);

    if ($resultado === TRUE) {
        echo "<script>window.location.href='../../vehiculo.php';</script>";
    } else {
        echo "<script>window.location.href='../../vehiculo.php';</script>";
    }

?>
