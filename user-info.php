<?php


error_reporting(0);

session_start();

$codigoUsuario = $_GET['identificacion'];
//https://chapinero-parking.000webhostapp.com/user-info.php?identificacion=990756
if((isset($_SESSION["tipo"]) !== "adminstrador")){
     if((isset($_SESSION["ID"]) !== $_GET['identificacion'])){
        //echo "<script>window.location.href='index.php';</script>";
    }
}
include_once 'model/conexion.php';
$sentenciaUsuarios = $bd->prepare("select * from usuarios where identificacion = ?;");
$sentenciaUsuarios->execute([$codigoUsuario]);
$Usuarios = $sentenciaUsuarios->fetch(PDO::FETCH_OBJ);

?>


<?php

$sentenciaVehiculo  = $bd->prepare("select * from vehiculo where codigo_usuario = ?;");
$sentenciaVehiculo->execute([$codigoUsuario]);
$Vehiculo  = $sentenciaVehiculo->fetchAll(PDO::FETCH_OBJ);

?>


<!doctype html>
<html lang="es">

<head>
    <title>CRUD php y mysql b5</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/style/style.css?<?php echo rand(); ?>">
</head>

<body class="info-usuario-cp">
    <style>
        
    .regresar {
      position: fixed;
      top: 20px;
      right: 20px;
      display: block;
      width: 30px;
      height: 30px;
      z-index: 10;
    }

    .regresar img {
      width: 100%;
      height: 100%;
      -o-object-fit: cover;
         object-fit: cover;
    }
    </style>

<a class="regresar" href="controller/login/cerrar.php"><img src="public/img/x.svg" alt="cerrar"></a>

    <section class="contenedor-info-user">
        <img class="logo" src="public/img/logo-chapinero-parking.png" alt="">
        <h2>Bienvenido</h2>

        <div class="datos-usuario">
        
            <p><?php echo $Usuarios->nombre; ?></p>   
            <span class="line"></span>
            <p><?php echo $Usuarios->correo; ?></p>
            <span class="line"></span>
            <p><?php echo $Usuarios->telefono; ?></p>

        </div>


        <div class="vehiculos-for">

            <?php
                foreach ($Vehiculo as $datoVehiculo) {

                    $sentenciaEstacionamiento  = $bd->prepare("select * from estacionamiento where codigo_vehiculo = ?;");
                    $sentenciaEstacionamiento->execute([$datoVehiculo->codigo_vehiculo]);
                    $Estacionamiento  = $sentenciaEstacionamiento->fetch(PDO::FETCH_OBJ);

                    date_default_timezone_set('America/Bogota');
                    $fechaInicio = $Estacionamiento->hora_inicio;
                    $fechaFin = date('Y-m-d H:i:s', time());

                    $date1 = new DateTime($fechaInicio);
                    $date2 = new DateTime($fechaFin);
                    $diff = $date1->diff($date2);

                    $cobroMinuto = $diff->i;
                    $cobroHora = $diff->h;
                    $cobroDia = $diff->d;
                    $cobroMes = $diff->m;
                    $cobroAno = $diff->y;
                    $copyTiempo = "tiempo";

                    $cobroEstacionamiento = ($cobroMinuto * $Estacionamiento->costo_minuto) + ($cobroHora * $Estacionamiento->costo_hora);
                    $valorPagar = $cobroEstacionamiento;
                    $tiempo = $cobroDia;

                    if (($cobroDia >= "1")) {

                        $cobroEstacionamiento = ($cobroDia * $Estacionamiento->costo_dia) + $cobroEstacionamiento;

                    }

                    if (($cobroDia == "0") && ($cobroHora == "6")) {

                        $cobroEstacionamiento = $Estacionamiento->costo_dia;

                    }

            ?>
            <div class="un-vehiculo">
                <h3><?php echo $datoVehiculo->codigo_vehiculo; ?></h3>
                <label for="">Codigo Parqueadero</label>
                <p><?php echo $Estacionamiento->codigo_parqueadero; ?></p>
                <label for="">Número estacionamiento</label>
                <p><?php echo $Estacionamiento->numero_estacionamiento; ?></p>
                <label for="">Hora Inicio</label>
                <p><?php echo $Estacionamiento->hora_inicio; ?></p>
                <label for="">Total a pagar</label>
                <p><?php echo $cobroEstacionamiento; ?></p>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

</body>

</html>