<?php

error_reporting(0);


    //print_r($_POST);
    /*
    if(empty($_POST["oculto"]) || empty($_POST["txtCodigoUser"]) || empty($_POST["txtNombreParqueadero"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtPisos"])){
        header('Location: ../../index.php?mensaje=falta');
        exit();
    }*/

    include_once '../../model/conexion.php';
    
    $CodigoVehiculo = $_POST["txtCodigoVehiculo"];
    $CodUsuario = $_POST["txtCodigoUsuario"];
    $TipoVehiculo = $_POST["txtTipoVehiculo"];
    $Marca = $_POST["txtMarca"];
    $ContratoMensual = $_POST["txtContrato"];
    
    $sentenciaCrearVehiculo = $bd->prepare("INSERT INTO vehiculo(codigo_vehiculo, codigo_usuario, tipo_vehiculo, marca, contrato_mensual) VALUES (?,?,?,?,?);");
    $resultadoVehiculo = $sentenciaCrearVehiculo->execute([$CodigoVehiculo, $CodUsuario, $TipoVehiculo, $Marca, $ContratoMensual]);

    if ($resultado === TRUE) {
        echo "<script>window.location.href='../../vehiculo.php';</script>";
    } else {
        echo "<script>window.location.href='../../vehiculo.php';</script>";
    }
    
?>