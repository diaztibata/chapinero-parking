<?php

error_reporting(0);
session_start();

$numeroPisos = $_GET["numero"];
$idParqueadero = $_GET["txtCodParqueadero"];
$estePiso = $_GET["estePiso"];

include_once 'model/conexion.php';

if ( ($_SESSION["tipo"] !== "administrador") ) {
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

$nombrepagina = "crear-cp piso-cp";

include 'views/header.php' ?>

<div class="middle-cp">
    <div class="tabla-parking">
        <h2>Lista Parqueaderos</h2>
        <div class="contenedor-tabla">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Pisos</th>
                        <th scope="col">Mostrar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $sentenciaParqueadero = $bd->query("select * from parqueadero");
                    $Parqueadero = $sentenciaParqueadero->fetchAll(PDO::FETCH_OBJ);

                    foreach ($Parqueadero as $datoParqueadero) {
                    ?>

                        <tr>
                            <td>
                                <p><?php echo $datoParqueadero->codigo_parqueadero; ?></p>
                            </td>
                            <td>
                                <p><?php echo $datoParqueadero->codigo_usuario; ?></p>
                            </td>
                            <td>
                                <?php echo $datoParqueadero->nombre_parqueadero; ?>
                            </td>
                            <td>
                                <?php echo $datoParqueadero->telefono; ?>
                            </td>
                            <td>
                                <?php echo $datoParqueadero->direccion; ?>
                            </td>
                            <td>
                                <?php echo $datoParqueadero->pisos; ?>
                            </td>
                            <td>
                                <a href="info-parking.php?codigoParqueadero=<?php echo $datoParqueadero->codigo_parqueadero ?>">ver</a>
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
    <h2>Nuevo Parqueadero</h2>
    <form class="p-4" method="POST" action="controller/create-parking/registrar-parqueadero.php">

        <label>Codigo Parqueadero: </label>
        <input type="text" placeholder="260522NP" id="numero-pisos" name="txtCodParqueadero" required>

        <label>Identificación Usuario: </label>
        <input type="text" placeholder="123.456.789" name="txtCodUsuario" required>

        <label>Nombre Parqueadero: </label>
        <input type="text" placeholder="Nuevo Parqueadero" name="txtNombreParqueadero" required>

        <label>Telefono: </label>
        <input type="text" name="txtTelefono" placeholder="601 543 2198" required>

        <label>Direccion: </label>
        <input type="text" name="txtDireccion" placeholder="Cra 53 #7-53" required>

        <label>Pisos: </label>
        <input type="number" id="numero-pisos" placeholder="1" name="txtPisos" required>

        <input type="hidden" name="oculto" value="1">

        <input type="submit" class="btn-primary" value="Registrar">

    </form>
</div>


<div class="modal">
    <div class="contenedor-form-pisos">
        <h2>Información del piso</h2>
        <form method="POST" action="controller/create-parking/registrar-piso.php">

            <!-- pisos -->
            <div class="input-mitad">
                <label>Codigo parqueadero: </label>
                <input type="text" style="pointer-events: none;" name="txtCodigoParqueadero" value="<?php echo $idParqueadero ?>" required>
            </div>

            <div class="input-mitad">
                <label>Codigo piso: </label>
                <input type="text" style="pointer-events: none;" name="txtCodigoPiso" value="<?php echo $idParqueadero . '-' . $estePiso ?>" required>
            </div>

            <div class="input-tercio">
                <label>Cantidad carros: </label>
                <input type="number" placeholder="10" name="txtCantidadCarros" required>

                <label>Precio carro minuto: </label>
                <input type="number" placeholder="60" name="txtPrecioCarroMinuto" required>

                <label>Precio carro hora: </label>
                <input type="number" placeholder="4000" name="txtPrecioCarroHora" required>

                <label>Precio carro día: </label>
                <input type="number" placeholder="20000" name="txtPrecioCarroDia" required>

                <label>Precio carro mes: </label>
                <input type="number" placeholder="150000" name="txtPrecioCarroMes" required>
            </div>

            <div class="input-tercio">
                <label>Cantidad motos: </label>
                <input type="number" placeholder="10" name="txtCantidadMotos" required>

                <label>Precio Moto minuto: </label>
                <input type="number" placeholder="30" name="txtPrecioMotoMinuto" required>

                <label>Precio Moto hora: </label>
                <input type="number" placeholder="2500" name="txtPrecioMotoHora" required>

                <label>Precio Moto día: </label>
                <input type="number" placeholder="10000" name="txtPrecioMotoDia" required>

                <label>Precio Moto mes: </label>
                <input type="number" placeholder="80000" name="txtPrecioMotoMes" required>
            </div>

            <div class="input-tercio">
                <label>Cantidad bicicletas: </label>
                <input type="number" placeholder="10" name="txtCantidadBicis" required>

                <label>Precio Bici minuto: </label>
                <input type="number" placeholder="10" name="txtPrecioBiciMinuto" required>

                <label>Precio Bici hora: </label>
                <input type="number" placeholder="1000" name="txtPrecioBiciHora" required>

                <label>Precio Bici día: </label>
                <input type="number" placeholder="4000" name="txtPrecioBiciDia" required>

                <label>Precio Bici mes: </label>
                <input type="number" placeholder="34000" name="txtPrecioBiciMes" required>
            </div>

            <input type="hidden" name="txtTotalPiso" value="<?php echo $numeroPisos ?>">
            <input type="hidden" name="txtEstePiso" value="<?php echo $estePiso ?>">
            <input type="hidden" name="oculto" value="1">

            <input type="submit" class="btn-primary" value="Registrar">

        </form>
    </div>

</div>


<?php include 'views/footer.php' ?>