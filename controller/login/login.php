<?php 

error_reporting(0);

session_start();


$contrasena = $_POST['txtContrasena'];
$id = $_POST['txtIdentificacion'];

include '../../model/conexion.php';

$sentenciaUsuario = $bd->prepare("select * from usuarios where identificacion = ?;");
$sentenciaUsuario->execute([$id]);
$usuario = $sentenciaUsuario->fetch(PDO::FETCH_OBJ);

if(isset($usuario->identificacion)){
    
}else{
    echo "<script>window.location.href='../../index.php';</script>";
}

$_SESSION["identificacion"] = $usuario->identificacion;
$_SESSION["contrasena"] = $usuario->contrasena;



if(($_SESSION["identificacion"] == $_POST['txtIdentificacion']) && ($_SESSION["contrasena"] == $_POST['txtContrasena'])){
    $_SESSION["ID"] = "$usuario->identificacion";
    $_SESSION["tipo"] = $usuario->tipo_usuario; 
    
    if($usuario->tipo_usuario == "administrador"){
        echo "<script>window.location.href='../../create-parking.php';</script>";
    }

    if($usuario->tipo_usuario == "operario"){
        $sentenciaParqueadero = $bd->prepare("select * from parqueadero where codigo_usuario= ?;");
        $sentenciaParqueadero->execute([$id]);
        $Parqueadero = $sentenciaParqueadero->fetch(PDO::FETCH_OBJ);

        $_SESSION["codigo-parqueadero"] = $Parqueadero->codigo_parqueadero;     
        $ir = "../../info-parking.php?codigoParqueadero=" . $Parqueadero->codigo_parqueadero;
        echo "<script>window.location.href='" . $ir ."';</script>";

    }

    if($usuario->tipo_usuario == "usuario"){
        header('Location: ../../user-info.php?identificacion=' . $id);
        $ir = "../../user-info.php?identificacion=" . $id;
        echo "<script>window.location.href='" . $ir ."';</script>";
    }
}


?>