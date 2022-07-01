<?php

error_reporting(0);

    //print_r($_POST);
    /*
    if(empty($_POST["oculto"]) || empty($_POST["txtCodigoUser"]) || empty($_POST["txtNombreParqueadero"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtPisos"])){
        header('Location: ../../index.php?mensaje=falta');
        exit();
    }*/


    include_once '../../model/conexion.php';
    
    $CodigoPiso = $_POST["txtCodigoPiso"];
    $CodigoParqueadero = $_POST["txtCodigoParqueadero"];
    $CantidadCarros = $_POST["txtCantidadCarros"];
    $CantidadMotos = $_POST["txtCantidadMotos"];
    $CantidadBicis = $_POST["txtCantidadBicis"];


    $PrecioCarroMinuto = $_POST["txtPrecioCarroMinuto"];
    $PrecioCarroHora = $_POST["txtPrecioCarroHora"];
    $PrecioCarroDia = $_POST["txtPrecioCarroDia"];
    $PrecioCarroMes = $_POST["txtPrecioCarroMes"];

    $PrecioMotoMinuto = $_POST["txtPrecioMotoMinuto"];
    $PrecioMotoHora = $_POST["txtPrecioMotoHora"];
    $PrecioMotoDia = $_POST["txtPrecioMotoDia"];
    $PrecioMotoMes = $_POST["txtPrecioMotoMes"];

    $PrecioBiciMinuto = $_POST["txtPrecioBiciMinuto"];
    $PrecioBiciHora = $_POST["txtPrecioBiciHora"];
    $PrecioBiciDia = $_POST["txtPrecioBiciDia"];
    $PrecioBiciMes = $_POST["txtPrecioBiciMes"];

    //$Pisos = $_POST["txtPisos"];

    $TotalPisos = $_POST["txtTotalPiso"];
    $EstePiso = $_POST["txtEstePiso"] + 1;
    
    

    $sentenciaCrearPiso = $bd->prepare("INSERT INTO piso(codigo_piso, codigo_parqueadero, cantidad_carro, cantidad_moto, cantidad_bicis) VALUES (?,?,?,?,?);");
    $resultadoPiso = $sentenciaCrearPiso->execute([$CodigoPiso,$CodigoParqueadero,$CantidadCarros,$CantidadMotos,$CantidadBicis]);
    
    //estacionamiento carro
    for ($i = 1; $i <= $CantidadCarros; $i++) {

        $codigoEstacionamientoCarro = $CodigoPiso . '-C-' . $i; 

        $sentenciaCrearEstacionamientoCarro = $bd->prepare("INSERT INTO estacionamiento(codigo_estacionamiento, codigo_piso, codigo_parqueadero, numero_estacionamiento, tipo_vehiculo, estado, costo_minuto, costo_hora, costo_dia, costo_mes, hora_inicio, codigo_vehiculo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
        $resultadoEstacionamientoCarro = $sentenciaCrearEstacionamientoCarro->execute([$codigoEstacionamientoCarro, $CodigoPiso, $CodigoParqueadero, 'C-' . $i, 'carro','Libre', $PrecioCarroMinuto, $PrecioCarroHora, $PrecioCarroDia, $PrecioCarroMes, '', '']);
    }

    //estacionamiento moto
    for ($i = 1; $i <= $CantidadMotos; $i++) {

        $codigoEstacionamientoMoto = $CodigoPiso . '-M-' . $i; 

        $sentenciaCrearEstacionamientoMoto = $bd->prepare("INSERT INTO estacionamiento(codigo_estacionamiento, codigo_piso, codigo_parqueadero, numero_estacionamiento, tipo_vehiculo, estado, costo_minuto, costo_hora, costo_dia, costo_mes, hora_inicio, codigo_vehiculo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
        $resultadoEstacionamientoMoto = $sentenciaCrearEstacionamientoMoto->execute([$codigoEstacionamientoMoto, $CodigoPiso, $CodigoParqueadero, 'M-' . $i, 'moto','Libre', $PrecioMotoMinuto, $PrecioMotoHora, $PrecioMotoDia, $PrecioMotoMes, '', '']);
    }

    //estacionamiento bicis
    for ($i = 1; $i <= $CantidadBicis; $i++) {

        $codigoEstacionamientoBici = $CodigoPiso . '-B-' . $i; 

        $sentenciaCrearEstacionamientoBici = $bd->prepare("INSERT INTO estacionamiento(codigo_estacionamiento, codigo_piso, codigo_parqueadero, numero_estacionamiento, tipo_vehiculo, estado, costo_minuto, costo_hora, costo_dia, costo_mes, hora_inicio, codigo_vehiculo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
        $resultadoEstacionamientoBici = $sentenciaCrearEstacionamientoBici->execute([$codigoEstacionamientoBici, $CodigoPiso, $CodigoParqueadero, 'B-' . $i, 'bicicleta','Libre', $PrecioBiciMinuto, $PrecioBiciHora, $PrecioBiciDia, $PrecioBiciMes, '', '']);
    }

    if ($resultadoPiso === TRUE) {
        if($TotalPisos >= $EstePiso){
            header('Location: ../../crear-piso.php?mensaje=registrado&numero=' . $TotalPisos . '&txtCodParqueadero=' . $CodigoParqueadero . '&estePiso='. $EstePiso);
            
            $ir = "../../crear-piso.php?mensaje=registrado&numero=" . $TotalPisos . '&txtCodParqueadero=' . $CodigoParqueadero . '&estePiso='. $EstePiso;
            echo "<script>window.location.href='" . $ir . "';</script>";
        }else{
            $ir = "../../info-parking.php?codigoParqueadero=" . $CodigoParqueadero;
            echo "<script>window.location.href='" . $ir . "';</script>";
        }
    } else {
        echo "<script>window.location.href='../../create-parking.php';</script>";
        exit;
    }
    
?>