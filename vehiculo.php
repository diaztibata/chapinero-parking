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


$nombrepagina = "vehiculo-cp";

include 'views/header.php'

?>

<div class="middle-cp">
    <div class="tabla-parking">
        <h2>Lista Vehiculos</h2>
        <div class="contenedor-tabla">

            <table>
                <thead>
                    <tr>
                        <th scope="col">Codigo vehiculo</th>
                        <th scope="col">Codigo usuario</th>
                        <th scope="col">tipo vehiculo</th>
                        <th scope="col">marca</th>
                        <th scope="col">contrato mensual</th>
                        <th scope="col">borrar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    include_once "model/conexion.php";
                    $sentenciaVehiculo = $bd->query("select * from vehiculo");
                    $Vehiculo = $sentenciaVehiculo->fetchAll(PDO::FETCH_OBJ);

                    foreach ($Vehiculo as $datoVehiculo) {
                    ?>

                        <tr>
                            <td scope="row"><?php echo $datoVehiculo->codigo_vehiculo; ?></td>
                            <td><?php echo $datoVehiculo->codigo_usuario; ?></td>
                            <td><?php echo $datoVehiculo->tipo_vehiculo; ?></td>
                            <td><?php echo $datoVehiculo->marca; ?></td>
                            <td>
                                <?php
                                if ($datoVehiculo->contrato_mensual == "si") {
                                ?>
                                    <a class="text-success" href="controller/vehiculo/editar-vehiculo.php?txtCodigoVehiculo=<?php echo $datoVehiculo->codigo_vehiculo; ?>&txtContrato=no">
                                        <?php echo $datoVehiculo->contrato_mensual; ?>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a class="text-success" href="controller/vehiculo/editar-vehiculo.php?txtCodigoVehiculo=<?php echo $datoVehiculo->codigo_vehiculo; ?>&txtContrato=si">
                                        <?php echo $datoVehiculo->contrato_mensual; ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Estas seguro de eliminar?');" href="controller/vehiculo/eliminar-vehiculo.php?txtCodigoVehiculo=<?php echo $datoVehiculo->codigo_vehiculo; ?>">Borrar</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="formulario-crear">
<h2>Nuevo Vehiculo</h2>
    <form class="p-4" method="POST" action="controller/vehiculo/registrar-vehiculo.php">

        <label>Codigo Vehiculo: </label>
        <input type="text" placeholder="ABC123" id="numero-pisos" name="txtCodigoVehiculo" required>

        <label>Codigo Usuario: </label>
        <input type="text" placeholder="123.456.789" name="txtCodigoUsuario" required>

        <label>Tipo vehiculo: </label>
        <input type="text" placeholder="carro" name="txtTipoVehiculo" required>

        <label>Marca: </label>
        <input type="text" placeholder="honda" name="txtMarca" required>

        <label>Contrato mensual: </label>
        <input type="text" placeholder="no" name="txtContrato" required>

        <input type="hidden"  name="oculto" value="1">

        <input type="submit" class="btn-primary" value="Registrar">

    </form>
</div>




<?php include 'views/footer.php' ?>