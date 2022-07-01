<?php 

error_reporting(0);

session_start();

if ( ($_SESSION["tipo"] == "operario") ) {
    $ir = "info-parking.php?codigoParqueadero=" . $_SESSION["codigo-parqueadero"];
    echo "<script>window.location.href='". $ir ."';</script>";
    echo $ir;
}

if ( ($_SESSION["tipo"] == "administrador") ) {
    header("Location:create-parking.php");
    echo "<script>window.location.href='create-parking.php';</script>";
    echo $ir;
}

if ( ($_SESSION["tipo"] == "usuario") ) {
    $ir = "user-info.php?identificacion=" . $_SESSION["identificacion"];
    echo "<script>window.location.href='". $ir ."';</script>";
    echo $ir;
}

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

    <body class="login-cp">


<div class="contenedor-login">
    <img class="logo" src="public/img/logo-chapinero-parking.png" alt="">
    <h2>Bienvenido</h2>
    <h4>Ingrese los datos para iniciar sesión</h4>
    <form class="form-login" method="POST" action="controller/login/login.php">

        <label>Identificación</label>
        <input type="text" placeholder="996.522.157" value="" name="txtIdentificacion" required>
                
        <label>Contraseña</label>
        <input type="password" placeholder="******" value="" name="txtContrasena" required>

        <input type="submit" name="login" class="btn-primary" value="INGRESAR">

    </form>
</div>

        
<?php include 'views/footer.php' ?>