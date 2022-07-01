<?php

error_reporting(0);

    //print_r($_POST);
    /*
    if(empty($_POST["oculto"]) || empty($_POST["txtCodigoUser"]) || empty($_POST["txtNombreParqueadero"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtPisos"])){
        header('Location: ../../index.php?mensaje=falta');
        exit();
    }*/

    include_once '../../model/conexion.php';
    
    $Identificacion = $_POST["txtIdentificacion"];
    $Nombre = $_POST["txtNombre"];
    $Correo = $_POST["txtCorreo"];
    $Contrasena = $_POST["txtContrasena"];
    $Telefono = $_POST["txtTelefono"];
    $TipoUsuario = $_POST["txtTipoUsuario"];
    
    $sentenciaCrearUsuario = $bd->prepare("INSERT INTO usuarios(identificacion, nombre, correo, contrasena, telefono, tipo_usuario) VALUES (?,?,?,?,?,?);");
    $resultadoUsuario = $sentenciaCrearUsuario->execute([$Identificacion, $Nombre, $Correo, $Contrasena, $Telefono, $TipoUsuario]);
    
  
    echo "<script>window.location.href='../../usuarios.php';</script>";
    
?>