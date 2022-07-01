<!doctype html>
<html lang="es">

    <head>
        <title>CRUD php y mysql b5</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="public/style/style.css?<?php echo rand(); ?>">
    </head>


    <?php

    error_reporting(0);
    
    if( is_null($nombrepagina) ){
        $nombrepagina = "chapinero-parking";
    }
    
    ?>
    <body class="<?php echo $nombrepagina ?>">

        <section class="contenedor-cp">

            <nav class="contenedor-menu-cp">
                <img class="logo" src="public/img/logo-chapinero-parking.png" alt="">
                <h5>MENU</h5>
                <dl>
                    <dt><a href="create-parking.php" class="parqueadero">Parqueaderos</a></dt>
                    <dt><a href="vehiculo.php" class="vehiculos">Vehiculos</a></dt>
                    <dt><a href="usuarios.php" class="usuarios">Usuarios</a></dt>
                    <dt><a href="controller/login/cerrar.php" class="sesion">Cerrar Sesión</a></dt>
                </dl>
            </nav>