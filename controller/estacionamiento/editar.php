<?php

error_reporting(0);

    date_default_timezone_set('America/Bogota');

    if(!isset($_GET['codigo-estacionamiento'])){
        //header('Location: ../../info-parking.php?codigoParqueadero=' . $CodigoParqueadero);
    }
    include '../../model/conexion.php';
    $CodigoParqueadero = $_GET['codigo-park'];
    $codigo = $_GET['codigo-estacionamiento'];
    $Estado = "ocupado";
    $CostoMinuto = $_POST['txtCostoMinuto'];
    $CostoHora = $_POST['txtCostoHora'];
    $CostoDia = $_POST['txtCostoDia'];
    $CostoMes = $_POST['txtCostoMes'];
    $HoraInicio = date('Y-m-d H:i:s', time());
    $CodigoVehiculo = $_POST['txtCodigoVehiculo'];



    $sentencia = $bd->prepare("UPDATE estacionamiento SET costo_minuto = ?, costo_hora = ?, costo_dia = ?, costo_mes = ?, estado = ?, hora_inicio = ?, codigo_vehiculo = ? where codigo_estacionamiento = ?;");
    $resultado = $sentencia->execute([$CostoMinuto, $CostoHora, $CostoDia, $CostoMes, $Estado, $HoraInicio, $CodigoVehiculo, $codigo]);

    if ($resultado === TRUE) {
        echo "<script>window.location.href='" . "../../info-parking.php?codigoParqueadero=" . $CodigoParqueadero . "';</script>";
    } else {
        echo "<script>window.location.href='" . "../../info-parking.php?codigoParqueadero=" . $CodigoParqueadero . "';</script>";
        exit();
    }
    
?>
