<?php

error_reporting(0);

session_start();

if ( isset( $_SESSION['ID'] ) ) {
    
    if(($_SESSION["tipo"] == "usuario")){
        echo "<script>window.location.href='index.php';</script>";
    }


} else {
    echo "<script>window.location.href='../../index.php';</script>";
}

$nombrepagina = "cobrar-cp info-cp";

include 'views/header.php';
include_once 'model/conexion.php';

$codigoEstacionamiento = $_GET['codigo-estacionamiento'];

?>

<?php

$sentenciaEstacionamiento = $bd->prepare("select * from estacionamiento where codigo_estacionamiento = ?;");
$sentenciaEstacionamiento->execute([$codigoEstacionamiento]);
$Estacionamiento = $sentenciaEstacionamiento->fetch(PDO::FETCH_OBJ);

$sentenciaVehiculo = $bd->prepare("select * from vehiculo where codigo_vehiculo = ?;");
$sentenciaVehiculo->execute([$Estacionamiento->codigo_vehiculo]);
$Vehiculo = $sentenciaVehiculo->fetch(PDO::FETCH_OBJ);

date_default_timezone_set('America/Bogota');
$fechaInicio = $Estacionamiento->hora_inicio;
$fechaFin = date('Y-m-d H:i:s', time());

$date1 = new DateTime($fechaInicio);
$date2 = new DateTime($fechaFin);
$diff = $date1->diff($date2);

//echo "<br>" . $fechaInicio . " | " . $fechaFin;
//echo "<br><br>";

$cobroMinuto = $diff->i;
$cobroHora = $diff->h;
$cobroDia = $diff->d;
$cobroMes = $diff->m;
$cobroAno = $diff->y;
$copyTiempo = "tiempo";

//echo $cobroMinuto . " minuto ". $cobroHora . " hora ". $cobroDia . " dia ". $cobroMes . " mes ". $cobroAno . " año ";


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



<div class="middle-cp">
    <div class="tabla-parking">
        <h2>Lista Estacionamiento</h2>
        <div class="contenedor-tabla">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">vehiculo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Costo minuto</th>
                        <th scope="col">Costo hora</th>
                        <th scope="col">Costo día</th>
                        <th scope="col">Costo mes</th>
                        <th scope="col">Hora Inicio</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $sentenciaEstacionamientoC  = $bd->prepare("select * from estacionamiento where codigo_parqueadero = ?;");
                    $sentenciaEstacionamientoC->execute([$Estacionamiento->codigo_parqueadero]);
                    $EstacionamientoC  = $sentenciaEstacionamientoC->fetchAll(PDO::FETCH_OBJ);

                    foreach ($EstacionamientoC as $datoEstacionamientoC) {
                    ?>

                        <tr>
                            <form method="POST" action="controller/estacionamiento/editar.php?codigo-estacionamiento=<?php echo $datoEstacionamientoC->codigo_estacionamiento ?>&codigo-park=<?php echo $datoEstacionamientoC->codigo_parqueadero ?>">
                                <td>
                                    <p><?php echo $datoEstacionamientoC->numero_estacionamiento; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $datoEstacionamientoC->tipo_vehiculo; ?></p>
                                </td>
                                <td>
                                    <input type="text" name="txtEstado" style="pointer-events: none;" required value="<?php echo $datoEstacionamientoC->estado; ?>">
                                </td>
                                <td>
                                    <input type="text" name="txtCostoMinuto" required value="<?php echo $datoEstacionamientoC->costo_minuto; ?>">
                                </td>
                                <td>
                                    <input type="text" name="txtCostoHora" required value="<?php echo $datoEstacionamientoC->costo_hora; ?>">
                                </td>
                                <td>
                                    <input type="text" name="txtCostoDia" required value="<?php echo $datoEstacionamientoC->costo_dia; ?>">
                                </td>
                                <td>
                                    <input type="text" name="txtCostoMes" required value="<?php echo $datoEstacionamientoC->costo_mes; ?>">
                                </td>
                                <td>
                                    <p><?php echo $datoEstacionamientoC->hora_inicio; ?></p>
                                </td>
                                <td>
                                    <input type="text" name="txtCodigoVehiculo" required value="<?php echo $datoEstacionamientoC->codigo_vehiculo; ?>">
                                </td>
                                <td>
                                    <input type="submit" class="btn-primary" value="OCUPAR">
                                    <a href="cobro-estacionamiento.php?codigoParqueadero=<?php echo $datoEstacionamientoC->codigo_parqueadero; ?>&codigo-estacionamiento=<?php echo $datoEstacionamiento->codigo_estacionamiento; ?>">COBRAR</a>
                                </td>
                            </form>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="modal">
    <a class="regresar" href="info-parking.php?codigoParqueadero=<?php echo $Estacionamiento->codigo_parqueadero; ?>"><img src="public/img/x.svg" alt="cerrar"></a>
    <div class="contenedor-form-pisos">
        <h2>Cobrar vehiculo de placa  <span style="color: #da8f03;"><?php echo $Estacionamiento->codigo_vehiculo; ?></span></h2>
        <form method="POST" action="controller/estacionamiento/cobro.php">

            <label>Codigo estacionamiento: </label>
            <input type="text" style="pointer-events: none;"  name="txtNumeroEstacionamiento" required value="<?php echo $Estacionamiento->numero_estacionamiento; ?>">

            <label>Tipo: </label>
            <input type="text" style="pointer-events: none;" name="txtTipoVehiculo" required value="<?php echo $Estacionamiento->tipo_vehiculo; ?>">

            <label style="display: none;">Estado: </label>
            <input type="hidden" name="txtEstado" required value="<?php echo $Estacionamiento->estado; ?>">

            <label>placa: </label>
            <input type="text" style="pointer-events: none;"  name="txtCodigoVehiculo" required value="<?php echo $Estacionamiento->codigo_vehiculo; ?>">

            <label>Hora inicio: </label>
            <input type="text" name="txtHoraInicio" style="pointer-events: none;"  required value="<?php echo $Estacionamiento->hora_inicio; ?>">

            <label>Hora final: </label>
            <input type="text" name="txtHoraFinal" style="pointer-events: none;"  required value="<?php echo $fechaFin; ?>">

            <label>Total a pagar: <?php echo $tiempo; ?> </label>
            <input type="text" style="pointer-events: none;"  name="txtTotalPagar" required value="<?php echo $valorPagar; ?>">

            <input type="hidden" name="codigo-parqueadero" value="<?php echo $Estacionamiento->codigo_parqueadero; ?>">
            <input type="hidden" name="codigo" value="<?php echo $Estacionamiento->codigo_estacionamiento; ?>">
            <input type="submit" class="btn-primary" value="confirmar pago">

        </form>
    </div>
</div>



<?php include 'views/footer.php' ?>