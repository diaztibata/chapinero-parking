<?php

error_reporting(0);

    date_default_timezone_set('America/Bogota');

    if(!isset($_GET['codigo-estacionamiento'])){
        //header('Location: ../../info-parking.php?codigoParqueadero=' . $CodigoParqueadero);
    }
    include '../../model/conexion.php';
    
    $codigo = $_POST['codigo'];
    $CodigoParqueadero = $_POST['codigo-parqueadero'];
    $Estado = $_POST['txtEstado'];
    $Codigo = $_POST['codigo'];
    $HoraInicio = $_POST['txtHoraInicio'];
    $HoraFinal = $_POST['txtHoraFinal'];
    $TotalPagar = $_POST['txtTotalPagar'];


    $sentencia = $bd->prepare("UPDATE estacionamiento SET estado = ?, hora_inicio = ?, codigo_vehiculo = ? where codigo_estacionamiento = ?;");
    $resultado = $sentencia->execute(['Libre', '', '', $codigo]);

    //print_r($_POST);

    if ($resultado === TRUE) {
        echo "<script>window.location.href='" . "../../info-parking.php?codigoParqueadero=" . $CodigoParqueadero . "';</script>";
    } else {
        echo "<script>window.location.href='" . "../../info-parking.php?codigoParqueadero=" . $CodigoParqueadero . "';</script>";
        exit();
    }
    
?>
