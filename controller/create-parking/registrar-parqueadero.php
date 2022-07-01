<?php

error_reporting(0);
    //print_r($_POST);
    /*
    if(empty($_POST["oculto"]) || empty($_POST["txtCodigoUser"]) || empty($_POST["txtNombreParqueadero"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtPisos"])){
        header('Location: ../../index.php?mensaje=falta');
        exit();
    }*/

    include_once '../../model/conexion.php';
    
    $CodigoParqueadero = $_POST["txtCodParqueadero"];
    $CodUsuario = $_POST["txtCodUsuario"];
    $NombreParqueadero = $_POST["txtNombreParqueadero"];
    $Telefono = $_POST["txtTelefono"];
    $Direccion = $_POST["txtDireccion"];
    $Pisos = $_POST["txtPisos"];
    
    $sentenciaCrearParqueadero = $bd->prepare("INSERT INTO parqueadero(codigo_parqueadero, codigo_usuario, nombre_parqueadero, telefono, direccion, pisos) VALUES (?,?,?,?,?,?);");
    $resultadoParquadero = $sentenciaCrearParqueadero->execute([$CodigoParqueadero,$CodUsuario,$NombreParqueadero,$Telefono, $Direccion, $Pisos]);

    if ($resultadoParquadero === TRUE) {
        $ir = "../../crear-piso.php?mensaje=registrado&numero=" . $Pisos . '&txtCodParqueadero=' . $CodigoParqueadero . '&estePiso=1';
        echo "<script>window.location.href='" . $ir . "';</script>";

    } else {
        echo "<script>window.location.href='../../create-parking.php';</script>";
        exit();
    }
    
?>