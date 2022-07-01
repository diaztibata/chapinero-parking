<?php

error_reporting(0);

session_start();

if ((($_SESSION["codigo-parqueadero"] !== $_GET['codigoParqueadero']))) {

    if (($_SESSION["tipo"] !== "administrador")) {
        header("Location: index.php");
    }
}
$nombrepagina = "info-cp";
include 'views/header.php';
?>

<?php
include_once 'model/conexion.php';
$codigoParqueadero = $_GET['codigoParqueadero'];

$sentenciaPiso = $bd->prepare("select * from piso where codigo_parqueadero = ?;");
$sentenciaPiso->execute([$codigoParqueadero]);
$Piso = $sentenciaPiso->fetch(PDO::FETCH_OBJ);
//print($persona);

$sentenciaParqueadero  = $bd->prepare("select * from parqueadero where codigo_parqueadero = ?;");
$sentenciaParqueadero->execute([$codigoParqueadero]);
$Parqueadero  = $sentenciaParqueadero->fetch(PDO::FETCH_OBJ);
?>

<div class="middle-cp">
    <div class="contenedor-estacionamiento">
    <?php
    for ($i = 1; $i <= $Parqueadero->pisos; $i++) {
    ?>


            <h3 class="numero-piso">PISO <?php echo $i; ?></h3>
            <div class="contenedor-piso">
                <h4>CARRO</h4>
                <!-- carro -->
                <div class="carro">
                    <?php

                    $sentenciaEstacionamiento  = $bd->prepare("select * from estacionamiento where codigo_parqueadero = ? AND tipo_vehiculo = ? AND codigo_piso = ?;");
                    $sentenciaEstacionamiento->execute([$codigoParqueadero, "carro", $codigoParqueadero . '-' . $i]);
                    $Estacionamiento  = $sentenciaEstacionamiento->fetchAll(PDO::FETCH_OBJ);

                    foreach ($Estacionamiento as $datoEstacionamiento) {
                    ?>

                        <div class="un-estacionamiento <?php echo $datoEstacionamiento->estado; ?>">

                            <form method="POST" action="controller/estacionamiento/editar.php?codigo-estacionamiento=<?php echo $datoEstacionamiento->codigo_estacionamiento ?>&codigo-park=<?php echo $datoEstacionamiento->codigo_parqueadero ?>">
                                <div class="datos-estacionamiento">
                                    <label>Costo minuto</label>
                                    <input type="text" name="txtCostoMinuto" required value="<?php echo $datoEstacionamiento->costo_minuto; ?>">
                                    <label>Costo Hora</label>
                                    <input type="text" name="txtCostoHora" required value="<?php echo $datoEstacionamiento->costo_hora; ?>">
                                    <label>Costo Dia</label>
                                    <input type="text" name="txtCostoDia" required value="<?php echo $datoEstacionamiento->costo_dia; ?>">
                                    <label>Costo Mes</label>
                                    <input type="text" name="txtCostoMes" required value="<?php echo $datoEstacionamiento->costo_mes; ?>">
                                    <label>Hora Inicio</label>
                                    <p><?php echo $datoEstacionamiento->hora_inicio; ?></p>
                                    <input type="submit" class="btn-primary" value="OCUPAR">
                                    <a href="cobro-estacionamiento.php?codigoParqueadero=<?php echo $datoEstacionamiento->codigo_parqueadero; ?>&codigo-estacionamiento=<?php echo $datoEstacionamiento->codigo_estacionamiento; ?>">COBRAR</a>


                                </div>
                                <?php echo $datoEstacionamiento->numero_estacionamiento; ?></br>

                                <input type="hidden" name="txtEstado" style="pointer-events: none;" required value="<?php echo $datoEstacionamiento->estado; ?>">



                                <input type="text" placeholder="PLACA" name="txtCodigoVehiculo" required value="<?php echo $datoEstacionamiento->codigo_vehiculo; ?>">

                            </form>
                        </div>

                    <?php
                    }
                    ?>
        
                </div>
                <!-- final carro -->

                <!-- moto -->
                <h4>MOTO</h4>
                <div class="moto">
                    <?php

                    $sentenciaEstacionamiento  = $bd->prepare("select * from estacionamiento where codigo_parqueadero = ? AND tipo_vehiculo = ? AND codigo_piso = ?;");
                    $sentenciaEstacionamiento->execute([$codigoParqueadero, "moto", $codigoParqueadero . '-' . $i]);
                    $Estacionamiento  = $sentenciaEstacionamiento->fetchAll(PDO::FETCH_OBJ);

                    foreach ($Estacionamiento as $datoEstacionamiento) {
                    ?>

                        <div class="un-estacionamiento <?php echo $datoEstacionamiento->estado; ?>">

                            <form method="POST" action="controller/estacionamiento/editar.php?codigo-estacionamiento=<?php echo $datoEstacionamiento->codigo_estacionamiento ?>&codigo-park=<?php echo $datoEstacionamiento->codigo_parqueadero ?>">
                                <div class="datos-estacionamiento">
                                    <label>Costo minuto</label>
                                    <input type="text" name="txtCostoMinuto" required value="<?php echo $datoEstacionamiento->costo_minuto; ?>">
                                    <label>Costo Hora</label>
                                    <input type="text" name="txtCostoHora" required value="<?php echo $datoEstacionamiento->costo_hora; ?>">
                                    <label>Costo Dia</label>
                                    <input type="text" name="txtCostoDia" required value="<?php echo $datoEstacionamiento->costo_dia; ?>">
                                    <label>Costo Mes</label>
                                    <input type="text" name="txtCostoMes" required value="<?php echo $datoEstacionamiento->costo_mes; ?>">
                                    <label>Hora Inicio</label>
                                    <p><?php echo $datoEstacionamiento->hora_inicio; ?></p>
                                    <input type="submit" class="btn-primary" value="OCUPAR">
                                    <a href="cobro-estacionamiento.php?codigoParqueadero=<?php echo $datoEstacionamiento->codigo_parqueadero; ?>&codigo-estacionamiento=<?php echo $datoEstacionamiento->codigo_estacionamiento; ?>">COBRAR</a>


                                </div>
                                <?php echo $datoEstacionamiento->numero_estacionamiento; ?></br>

                                <input type="hidden" name="txtEstado" style="pointer-events: none;" required value="<?php echo $datoEstacionamiento->estado; ?>">



                                <input type="text" placeholder="PLACA" name="txtCodigoVehiculo" required value="<?php echo $datoEstacionamiento->codigo_vehiculo; ?>">

                            </form>
                        </div>

                    <?php
                    }
                    ?>
                </div>
                <!-- final moto -->


                <!-- bicicleta -->
                <h4>BICICLETA</h4>
                <div class="bicicleta">
                    <?php

                    $sentenciaEstacionamiento  = $bd->prepare("select * from estacionamiento where codigo_parqueadero = ? AND tipo_vehiculo = ? AND codigo_piso = ?;");
                    $sentenciaEstacionamiento->execute([$codigoParqueadero, "bicicleta", $codigoParqueadero . '-' . $i]);
                    $Estacionamiento  = $sentenciaEstacionamiento->fetchAll(PDO::FETCH_OBJ);

                    foreach ($Estacionamiento as $datoEstacionamiento) {
                    ?>

                        <div class="un-estacionamiento <?php echo $datoEstacionamiento->estado; ?>">

                            <form method="POST" action="controller/estacionamiento/editar.php?codigo-estacionamiento=<?php echo $datoEstacionamiento->codigo_estacionamiento ?>&codigo-park=<?php echo $datoEstacionamiento->codigo_parqueadero ?>">
                                <div class="datos-estacionamiento">
                                    <label>Costo minuto</label>
                                    <input type="text" name="txtCostoMinuto" required value="<?php echo $datoEstacionamiento->costo_minuto; ?>">
                                    <label>Costo Hora</label>
                                    <input type="text" name="txtCostoHora" required value="<?php echo $datoEstacionamiento->costo_hora; ?>">
                                    <label>Costo Dia</label>
                                    <input type="text" name="txtCostoDia" required value="<?php echo $datoEstacionamiento->costo_dia; ?>">
                                    <label>Costo Mes</label>
                                    <input type="text" name="txtCostoMes" required value="<?php echo $datoEstacionamiento->costo_mes; ?>">
                                    <label>Hora Inicio</label>
                                    <p><?php echo $datoEstacionamiento->hora_inicio; ?></p>
                                    <input type="submit" class="btn-primary" value="OCUPAR">
                                    <a href="cobro-estacionamiento.php?codigoParqueadero=<?php echo $datoEstacionamiento->codigo_parqueadero; ?>&codigo-estacionamiento=<?php echo $datoEstacionamiento->codigo_estacionamiento; ?>">COBRAR</a>


                                </div>
                                <?php echo $datoEstacionamiento->numero_estacionamiento; ?></br>

                                <input type="hidden" name="txtEstado" style="pointer-events: none;" required value="<?php echo $datoEstacionamiento->estado; ?>">



                                <input type="text" placeholder="PLACA" name="txtCodigoVehiculo" required value="<?php echo $datoEstacionamiento->codigo_vehiculo; ?>">

                            </form>
                        </div>

                    <?php
                    }
                    ?>
                </div>
                <!-- final bicicleta -->
           


    </div>

    <?php
    }
    ?>

</div>





<?php include 'views/footer.php' ?>